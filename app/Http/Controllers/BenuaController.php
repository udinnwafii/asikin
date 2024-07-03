<?php

namespace App\Http\Controllers;

use App\Models\Benua;
use Illuminate\Http\Request;

class BenuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Benua::all();
        return view('benua.index', compact('data'));
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
        $validasiData = $request->validate([
            'nama' => 'required'
        ]);

        $simpan = Benua::create($validasiData);
        return redirect('/benua')->with('success', 'Record created successfully!');
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
        $data = Benua::findOrFail($id);
        return view('benua.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'nama' => 'required',
    ]);

    $data = Benua::findOrFail($id);
    $data->update($validatedData);

    return redirect('/benua')->with('success', 'Record updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Benua::findOrFail($id);
        $data->delete();
        return redirect('/benua')->with('success', 'Record deleted successfully!');
    }
}
