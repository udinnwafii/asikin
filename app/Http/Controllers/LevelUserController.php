<?php

namespace App\Http\Controllers;

use App\Models\level_user;
use Illuminate\Http\Request;

class LevelUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = level_user::all();
        return view('level_user.index', compact('data'));
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

        $simpan = level_user::create($validasiData);
        return redirect('/level_user')->with('success', 'Record created successfully!');
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
        $data = level_user::findOrFail($id);
        return view('level_user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'nama' => 'required',
    ]);

    $data = level_user::findOrFail($id);
    $data->update($validatedData);

    return redirect('/level_user')->with('success', 'Record updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = level_user::findOrFail($id);
        $data->delete();
        return redirect('/level_user')->with('success', 'Record deleted successfully!');
    }
}