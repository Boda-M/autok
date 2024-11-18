<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuel;
class FuelsContoller extends Controller
{
    public function index()
    {
        return view ('fuels/list', ['entities' => Fuel::paginate(20)]); // "/list" idk kell e
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        $fuels =new Fuel();
        $fuels->name = $request->input('name');
        $fuels->save();
        return redirect()->route('fuels')->with("success","sikeres létrehozás");
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("fuels/edit",["entity"=>Fuel::find($id)]);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        $fuel=Fuel::findOrFail($id);
        $fuel->name=$request->name;
        
        $fuel->save();
        return redirect()->route('fuels')->with('success', 'Üzemanyag módosítva.');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuel=Fuel::findOrFail($id);
        $fuel->delete();

        return redirect()->route("fuels")->with('success', 'Element deleted successfully.');
    }
}
