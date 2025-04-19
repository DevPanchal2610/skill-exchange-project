<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns|max:255',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()
                ->with('error', true)
                ->with('debug', 'User not found');
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session()->put('fullname', $user->name);
            session()->put('id', $user->id);

            return $user->isadmin == 1 ? redirect('/users') : redirect('/user');
        }

        return redirect()->back()
            ->with('error', true)
            ->with('debug', 'Invalid password');
    }


    public function logout()
    {
        Auth::logout();
        session()->forget('fullname');
        return redirect('/login');
    }
}
