<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\State;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add_city(Request $r)
    {
        $r->validate([
            'state'=>'required|exists:states,state_id',
            'city'=>'required|unique:cities,city_name'
        ]);
        $table=new city();
        $table->state_id=$r->state;
        $table->city_name=$r->city;
        $table->save();
        return redirect()->back()->with('success','City inserted successfully!!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function delete_city($id)
    {
         City::where('city_id', $id)->update(['isactive' => 0]);
         return redirect()->back()->with('success', 'City deactivated successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $city = City::find($id);
        $states = State::all();
        return view('admin.edit_city', compact('city', 'states'));
    }
    
    public function update(Request $request)
    {
        $city = City::find($request->city_id);
        $city->city_name = $request->city_name;
        $city->state_id = $request->state_id;
        $city->isactive = $request->has('isactive') ? 1 : 0;
        $city->save();
    
        return redirect('/city')->with('success', 'City updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
