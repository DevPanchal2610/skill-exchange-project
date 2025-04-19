<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city_id = $request->city_id;
        $user->security_question = $request->security_question;
        $user->security_answer = $request->security_answer;
        $user->isactive = 1;
        $user->isadmin = 0;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $user->profile_picture = 'storage/uploads/profile_picture/' . $filename;
            $file->storeAs('uploads/profile_picture', $filename, 'public');
        }

        $user->save();

        Auth::login($user);
        session()->flash('success', 'Registration successful. Now, add your skills!');
        return redirect()->route('skills.form');
    }
}
