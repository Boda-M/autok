<?php

namespace App\Http\Controllers;

use App\Models\Sebvalto;
use Illuminate\Http\Request;

class SebvaltoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("sebvaltok/list",["entities"=>Sebvalto::paginate(20)]);
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
        $sebvalto=new Sebvalto();
        $sebvalto->name=$request->name;

        $sebvalto->save();
        return redirect()->route("sebvaltok")->with("success","Sebváltó ltrehozva"); 
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
        return view("sebvaltok/edit",["entity"=>Sebvalto::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);
        $sebvalto=Sebvalto::findOrFail($id);
        $sebvalto->name=$request->name;
        $sebvalto->save();

        return redirect()->route("sebvaltok")->with("success","Sebváltó módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sebvalto=Sebvalto::findOrFail($id);
        $sebvalto->delete();
        return redirect()->route("sebvaltok")->with("success","sebvalto törölve");
    }
}
