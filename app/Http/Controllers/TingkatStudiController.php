<?php

namespace App\Http\Controllers;

use App\Models\tingkat_studi;
use Illuminate\Http\Request;

class TingkatStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tingkat_studi::all();
        return view('tingkat_studi.index', compact('data'));
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

        $simpan = tingkat_studi::create($validasiData);
        return redirect('/tingkat_studi')->with('success', 'Record created successfully!');
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
        $data = tingkat_studi::findOrFail($id);
        return view('tingkat_studi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'nama' => 'required',
    ]);

    $data = tingkat_studi::findOrFail($id);
    $data->update($validatedData);

    return redirect('/tingkat_studi')->with('success', 'Record updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = tingkat_studi::findOrFail($id);
        $data->delete();
        return redirect('/tingkat_studi')->with('success', 'Record deleted successfully!');
    }
}
