<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("colors/list",["entities"=>Color::paginate(20)]);
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

        $color=new Color();
        $color->name=$request->name;
        $color->hexa_code=$request->hexa_code;

        $color->save();
        return redirect()->route("colors")->with("success","color created");
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
        return view("colors/edit",["entity"=>Color::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        $color=Color::findOrFail($id);
        $color->name=$request->name;
        $color->hexa_code=$request->hexa_code;

        $color->save();
        return redirect()->route("colors")->with("success","Color updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color=Color::findOrFail($id);
        $color->delete();

        return redirect()->route("colors")->with("success","color deleted");
    }
}
