<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add_states(Request $request)
    {
         $request->validate([
            'state' => 'required|string|max:255|unique:states,state_name',
        ]);

        $state = new State();
        $state->state_name = $request->state;
        $state->save();
        return redirect()->back()->with('success', 'State added successfully!');
    }
     // Show the edit form
     public function edit($id)
     {
         $state = State::findOrFail($id); // Fetch state using the ID
         return view('admin.edit_state', compact('state')); // Pass data to the view
     }
 
     // Handle the update request
     public function update(Request $request)
     {
         $request->validate([
             'state_name' => 'required|string|max:50',
         ]);
         $id=$request->state_id;
         $state = State::findOrFail($id);
         $state->state_name = $request->state_name;
         $state->isactive = $request->has('isactive') ? 1 : 0;
         $state->save();
 
         return redirect('/state')->with('success', 'State updated successfully!');
     }

    /**
     * Show the form for creating a new resource.
     */
    public function delete_state($id)
    {
         State::where('state_id', $id)->update(['isactive' => 0]);
         return redirect()->back()->with('success', 'State deactivated successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
}
