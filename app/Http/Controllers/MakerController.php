<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Maker;
 
class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('makers/list', ['entities' => Maker::all()]);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maker =new Maker();
        $maker->name = $request->input('name');
        $maker->logo = $request->input('name').".png";
        $maker->save();
        return redirect()->route('makers')->with("success","sikeres létrehozás");
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
        return view("makers/edit",["entity"=>Maker::find($id)]);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $maker=Maker::findOrFail($id);
        $maker->name=$request->name;
        $maker->logo = $request->logo;
        
        $maker->save();
        return redirect()->route('makers')->with('success', 'Gyártó módosítva.');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maker=Maker::findOrFail($id);
        $maker->delete();

        return redirect()->route("makers")->with('success', 'Element deleted successfully.');
    }
}
 