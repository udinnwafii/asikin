<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\negara;
use App\Models\tingkat_studi;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = kategori::with('tingkat_studi', 'negara')->get();
        $tingkat_studi = tingkat_studi::all();
        $negara = negara::all();
        return view('kategori.index', ['data' => $data, 'tingkat_studi' => $tingkat_studi, 'negara' => $negara]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tingkat_studi' => 'required',
            'id_negara' => 'required'
        ]);

        kategori::create($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_tingkat_studi' => 'required',
            'id_negara' => 'required'
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}