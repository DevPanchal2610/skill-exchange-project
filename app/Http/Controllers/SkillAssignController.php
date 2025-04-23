<?php

namespace App\Http\Controllers;

use App\Models\SkillAssign;
use Illuminate\Http\Request;

class SkillAssignController extends Controller
{
    public function assignForRequest(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'request_id' => 'required|exists:requests,request_id',
            'skill_id' => 'required|exists:skills,skill_id',
            'user_skill_id' => 'required|exists:skills,skill_id',
        ]);

        // Get the request and skill
        $req = \App\Models\Request::find($request->request_id);
        $skill = \App\Models\Skill::find($request->skill_id);
        $userSkill = \App\Models\Skill::find($request->user_skill_id);

        if (!$req || !$skill || !$userSkill) {
            return response()->json(['success' => false, 'message' => 'Invalid request or skill.']);
        }

        // Prevent duplicate assignment
        $exists = \App\Models\SkillAssign::where('user_id', $req->user_id)
            ->where('assgin_id', $req->assgin_id)
            ->where('skill_id', $skill->skill_id)
            ->where('user_skill_id', $userSkill->skill_id)
            ->exists();
        if ($exists) {
            return response()->json(['success' => false, 'message' => 'This skill exchange already exists.']);
        }

        // Assign the skill (assgin_id is the current user, user_id is the requester)
        $assign = new \App\Models\SkillAssign();
        $assign->user_id = $req->user_id; // the user who requested
        $assign->assgin_id = $req->assgin_id; // the user who is assigning (current user)
        $assign->skill_id = $skill->skill_id;
        $assign->user_skill_id = $userSkill->skill_id; // new column
        $assign->save();

        // Delete the request from the requests table
        $req->delete();

        return response()->json(['success' => true, 'message' => 'Skills exchanged successfully!']);
    }

    // Fetch all skills for a given user (for AJAX dropdown)
    public function getUserSkills($userId)
    {
        $user = \App\Models\User::with('skills')->find($userId);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.']);
        }
        return response()->json(['success' => true, 'skills' => $user->skills]);
    }

   public function index()
   {
         $skill_assigns = SkillAssign::with(['assigneduser', 'assigner', 'skill'])->get();
         return view('admin.skill_assign', compact('skill_assigns'));
   }
   
}
