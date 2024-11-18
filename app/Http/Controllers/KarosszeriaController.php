<?php

namespace App\Http\Controllers;

use App\Models\Karosszeria;
use Illuminate\Http\Request;

class KarosszeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('karosszeriak/list', ['entities' => Karosszeria::paginate(20)]); // "/list" idk kell e -->igen mert az view/karosszeriak folder fájlja
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
        $karosszeria =new Karosszeria();
        $karosszeria->name = $request->input('name');
        $karosszeria->save();
        return redirect()->route('karosszeriak')->with("success","sikeres létrehozás");
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
        return view("karosszeriak/edit",["entity"=>Karosszeria::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        $karosszeria=Karosszeria::findOrFail($id);
        $karosszeria->name=$request->name;

        $karosszeria->save();
        return redirect("karosszeriak")->with('success','Karosszéria módosítva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karosszeria=Karosszeria::findOrFail($id);
        $karosszeria->delete();

        return redirect('karosszeriak')->with('success', 'Karosszéria törölve');
    }
}
