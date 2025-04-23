<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactThankYou;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        // Send thank you email to user
        Mail::to($data['email'])->send(new ContactThankYou($data));
        // (Optional) You can also notify admin here
        return response()->json(['success' => true, 'message' => 'Thank you for contacting us!']);
    }
}
