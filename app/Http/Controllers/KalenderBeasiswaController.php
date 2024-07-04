<?php

namespace App\Http\Controllers;

use App\Models\kalender_beasiswa;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Http\Request;

class KalenderBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = kalender_beasiswa::with('kategori', 'user')->get();
        $kategori = Kategori::all();
        $user = User::all();
        return view('kalender_beasiswa.index', ['data' => $data, 'kategori' => $kategori, 'user' => $user]);
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
        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'id_user' => 'required',
            'tanggal_registrasi' => 'required',
            'deadline' => 'required',
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'jurusan' => 'required',
            'jenis_beasiswa' => 'required',
            'keuntungan' => 'required',
            'umur' => 'required',
            'gpa' => 'required',
            'tes_english' => 'nullable',
            'tes_bahasa_lain' => 'nullable',
            'tes_standard' => 'nullable',
            'dokumen' => 'nullable',
            'lainnya' => 'nullable',
            'status_tampil' => 'required'
        ]);

        kalender_beasiswa::create($validatedData);

        return redirect()->route('kalender_beasiswa.index')->with('success', 'Kalender Beasiswa created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'id_user' => 'required',
            'tanggal_registrasi' => 'required',
            'deadline' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'jurusan' => 'required',
            'jenis_beasiswa' => 'required',
            'keuntungan' => 'required',
            'umur' => 'required',
            'gpa' => 'required',
            'tes_english' => 'required',
            'tes_bahasa_lain' => 'required',
            'tes_standard' => 'required',
            'dokumen' => 'required',
            'lainnya' => 'required',
            'status_tampil' => 'required'
        ]);

        $kalenderBeasiswa = kalender_beasiswa::findOrFail($id);
        $kalenderBeasiswa->update($validatedData);

        return redirect()->route('kalender_beasiswa.index')->with('success', 'Kalender Beasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kalenderBeasiswa = kalender_beasiswa::findOrFail($id);
        $kalenderBeasiswa->delete();

        return redirect()->route('kalender_beasiswa.index')->with('success', 'Kalender Beasiswa deleted successfully.');
    }
}
