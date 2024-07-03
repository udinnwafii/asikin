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
        return view('level_user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('level_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate(
            [
                
                'nama'=> 'required'
                
            ]
        );

        $simpan = level_user::create($validasiData);

        return redirect('/leveluser')->with('success','record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = level_user::findOrFile($id);
        return view('level_user.edit', compact ('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate(
            [
                'nama'=>'required'
            ]
        );

         // Find the record to be updated
        $data = level_user::findOrFile($id);


          // Update the record with the validated data
        $data->update($validasiData);


        // Redirect to a page or return a response
        return redirect('/level_user')->with('success','Record Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = level_user::findOrFile($id);
        $data->delete();
        return redirect('/level_user')->with('success','Record Deleted successfully!');
    }
}
