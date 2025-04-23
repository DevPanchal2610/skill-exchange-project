<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EmailVerificationController extends Controller
{
    public function verify($token)
    {
        Log::info('Email verification attempt with token: ' . substr($token, 0, 20) . '...');
        // Look up the token in the email_verifications table
        $verification = \App\Models\EmailVerification::where('token', $token)->first();
        if (!$verification) {
            Log::error('Email verification failed: token not found');
            return redirect('/login')->with('error', 'Invalid or expired verification link.');
        }
        $data = json_decode($verification->data, true);

        // Check if user already exists (in case of repeated link use)
        if (\App\Models\User::where('email', $data['email'])->exists()) {
            return redirect('/login')->with('error', 'This email is already registered. Please log in.');
        }

        $user = new \App\Models\User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'] ?? null;
        $user->address = $data['address'] ?? null;
        $user->city_id = $data['city_id'];
        $user->security_question = $data['security_question'];
        $user->security_answer = $data['security_answer'];
        $user->isactive = $data['isactive'] ?? 1;
        $user->isadmin = $data['isadmin'] ?? 0;
        $user->email_verified_at = now();

        // Handle profile picture if present
        if (!empty($data['profile_picture_name']) && !empty($data['profile_picture_content'])) {
            $filename = $data['profile_picture_name'];
            $content = base64_decode($data['profile_picture_content']);
            $path = 'uploads/profile_picture/' . $filename;
            Storage::disk('public')->put($path, $content);
            $user->profile_picture = 'storage/' . $path;
        }

        $user->save();
        // Delete the verification record
        $verification->delete();
        Auth::login($user);
        return redirect()->route('skills.form1')->with('success', 'Email verified successfully! Please add your skills.');
    }
}
