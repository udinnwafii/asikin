<?php

namespace App\Http\Controllers;

use App\Models\benua;
use App\Models\negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = negara::with('benua')->get();
        $benua = benua::all();
        return view('negara.index', ['data' => $data, 'benua' => $benua]);
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
    $validate = $request->validate([
        'nama' => 'required',
        'id_benua' => 'required',
    ]);

    Negara::create($validate);

    return redirect('/negara')
        ->with('success', 'Berhasil Melakukan Pengiriman');
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
        $benua = benua::all();
        $data = negara::findOrFail($id);

        return view('negara.edit', compact('data', 'benua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = negara::findOrFail($id);

        $validate = $request->validate([
            'nama' => 'required',
            'id_benua' => 'required'
        ]);
    
        $data->update($validate);
        return redirect('/negara')->with('success', 'Berhasil mengupdate negara');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $negara = negara::findOrFail($id);
        $negara->delete();

        return redirect()->route('negara.index')->with('success', 'Negara deleted successfully.');
    }
}
