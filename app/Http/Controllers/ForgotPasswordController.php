<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot_password_email');
    }

    public function submitEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
        if (!$user || !$user->security_question) {
            return back()->withErrors(['email' => 'No user found or security question not set.']);
        }
        return view('auth.forgot_password_question', [
            'email' => $user->email,
            'security_question' => $user->security_question
        ]);
    }

    public function verifyAnswer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'security_answer' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || strtolower(trim($user->security_answer)) !== strtolower(trim($request->security_answer))) {
            return back()->withErrors(['security_answer' => 'Incorrect answer.'])->withInput();
        }
        return view('auth.forgot_password_reset', ['email' => $user->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login')->with('status', 'Password reset successful. Please login.');
    }
}
