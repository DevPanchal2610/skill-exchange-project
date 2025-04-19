<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    // Show the form for adding skills
    public function showSkillForm()
    {
        // If user already submitted skills, redirect to demo page
        if (session('skills_submitted')) {
            return redirect()->route('user.demo');
        }
        // dd(Auth::user());
        return view('client.skills_form');
    }

    // Store submitted skills
    public function store(Request $request)
    {
        $user = Auth::user(); // Use Auth facade for correct usage

        if (!$user) {
            // Fallback for demo: get the latest user, but handle if no users exist
            $user = \App\Models\User::latest()->first();
            if (!$user) {
                return redirect()->back()->with('error', 'No user found for demo fallback.');
            }
        }

        $skills = $request->input('skills', []);

        if (!$skills) {
            return redirect()->back()->with('error', 'Please add at least one skill.');
        }

        foreach ($skills as $index => $skill) {
            $skillModel = new \App\Models\Skill();
            $skillModel->skill_name = $skill['skill_name'] ?? '';
            $skillModel->description = $skill['description'] ?? '';
            $skillModel->skill_category = $skill['skill_category'] ?? '';
            $skillModel->user_id = $user->id;
            $skillModel->isactive = 1;

            // ✅ Correctly handle file input for nested array
            if ($request->hasFile("skills.$index.skill_image")) {
                $file = $request->file("skills.$index.skill_image");
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('uploads/skill_images', $filename, 'public');
                $skillModel->skill_image = 'storage/uploads/skill_images/' . $filename;
            } else {
                $skillModel->skill_image = null;
            }

            $skillModel->save();
        }

        session(['skills_submitted' => true]);
        return redirect()->route('user.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
