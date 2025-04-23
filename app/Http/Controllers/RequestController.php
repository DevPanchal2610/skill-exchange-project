<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = ModelsRequest::with(['user','assigner','skill'])->get();
        return view('admin.request', compact('requests'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $user_id=session('id');
        $request = new ModelsRequest();
        $request->user_id = $user_id;
        $request->assgin_id = $r->assgin_id;
        $request->skill_id = $r->skill_id;
        $request->save();
        return redirect()->back()->with('success', 'Skill request sent successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Request $request)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $req = \App\Models\Request::find($id);
        if (!$req) {
            return response()->json(['success' => false, 'message' => 'Request not found.'], 404);
        }
        $req->delete();
        return response()->json(['success' => true, 'message' => 'Request deleted successfully.']);
    }
}
