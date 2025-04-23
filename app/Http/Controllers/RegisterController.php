<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/'
            ],
            'password_confirmation' => 'required',
            'city_id' => 'required|exists:cities,city_id',
            'security_question' => 'required|string',
            'security_answer' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'city_id.exists' => 'The selected city is invalid.',
        ]);

        // Prepare data for email verification
        $data = $request->only([
            'name', 'email', 'password', 'city_id', 'security_question', 'security_answer', 'phone', 'address'
        ]);
        $data['password'] = $request->password; // keep as plain for hashing later
        $data['isactive'] = 1;
        $data['isadmin'] = 0;
        // Handle profile picture if present
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $data['profile_picture_name'] = time() . '.' . $file->getClientOriginalExtension();
            $data['profile_picture_content'] = base64_encode(file_get_contents($file->getRealPath()));
        }
        // Generate a short random token
        $token = bin2hex(random_bytes(32));
        // Store registration data as JSON in the DB
        \App\Models\EmailVerification::create([
            'token' => $token,
            'data' => json_encode($data),
            'created_at' => now(),
        ]);
        $userStub = (object)[ 'name' => $data['name'], 'email' => $data['email'] ];
        Log::info('About to send verification email to: ' . $data['email'] . ' with token: ' . $token);
        Mail::to($data['email'])->send(new \App\Mail\VerifyEmail($userStub, $token));
        Log::info('Verification email sent to: ' . $data['email']);

        return redirect()->route('login')->with('success', 'Registration initiated! Please check your email to verify your address and complete registration.');
    }
}
