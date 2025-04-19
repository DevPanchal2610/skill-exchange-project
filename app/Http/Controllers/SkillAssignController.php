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
        ]);

        // Get the request and skill
        $req = \App\Models\Request::find($request->request_id);
        $skill = \App\Models\Skill::find($request->skill_id);

        if (!$req || !$skill) {
            return response()->json(['success' => false, 'message' => 'Invalid request or skill.']);
        }

        // Prevent duplicate assignment
        $exists = \App\Models\SkillAssign::where('user_id', $req->user_id)
            ->where('assgin_id', $req->assgin_id)
            ->where('skill_id', $skill->skill_id)
            ->exists();
        if ($exists) {
            return response()->json(['success' => false, 'message' => 'This skill is already assigned for this request.']);
        }

        // Assign the skill (assgin_id is the current user, user_id is the requester)
        $assign = new \App\Models\SkillAssign();
        $assign->user_id = $req->user_id; // the user who requested
        $assign->assgin_id = $req->assgin_id; // the user who is assigning (current user)
        $assign->skill_id = $skill->skill_id;
        $assign->save();

        return response()->json(['success' => true]);
    }

   public function index()
   {
         $skill_assigns = SkillAssign::with(['assigneduser', 'assigner', 'skill'])->get();
         return view('admin.skill_assign', compact('skill_assigns'));
   }
   
}
