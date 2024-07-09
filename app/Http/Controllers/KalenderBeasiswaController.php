<?php

namespace App\Http\Controllers;

use App\Models\kalender_beasiswa;
use App\Models\negara;
use App\Models\tingkat_studi;
use Illuminate\Http\Request;

class KalenderBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = kalender_beasiswa::with('negara', 'tingkat_studi')->get();
        $negara = negara::all();
        $tingkat_studi = tingkat_studi::all();
        return view('kalender_beasiswa.index', ['data' => $data, 'negara' => $negara, 'tingkat_studi' => $tingkat_studi]);
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
        // Debugging line to see the incoming request data
        // dd($request->all());

        $validatedData = $request->validate([
            'tanggal_registrasi' => 'nullable',
            'deadline' => 'nullable',
            'judul' => 'nullable',
            'deskripsi' => 'nullable',
            'jurusan' => 'nullable',
            'jenis_beasiswa' => 'nullable',
            'keuntungan' => 'nullable',
            'umur' => 'nullable',
            'gpa' => 'nullable',
            'tes_english' => 'nullable',
            'tes_bahasa_lain' => 'nullable',
            'tes_standard' => 'nullable',
            'dokumen' => 'nullable',
            'lainnya' => 'nullable',
            'status_tampil' => 'nullable'
        ]);

        $kalenderBeasiswa = kalender_beasiswa::create($validatedData);

        if ($request->has('id_negara')) {
            $kalenderBeasiswa->negara()->attach($request->id_negara);
        }

        if ($request->has('id_tingkat_studi')) {
            $kalenderBeasiswa->tingkat_studi()->attach($request->id_tingkat_studi);
        }

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
    public function edit($id)
{
    $kalenderBeasiswa = kalender_beasiswa::with('negara', 'tingkat_studi')->findOrFail($id);
    $negara = negara::all();
    $tingkat_studi = tingkat_studi::all();

    return view('kalender_beasiswa.edit', compact('kalenderBeasiswa', 'negara', 'tingkat_studi'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_negara' => 'nullable|array',
            'id_tingkat_studi' => 'nullable|array',
            'tanggal_registrasi' => 'nullable',
            'deadline' => 'nullable',
            'judul' => 'nullable',
            'deskripsi' => 'nullable',
            'jurusan' => 'nullable',
            'jenis_beasiswa' => 'nullable',
            'keuntungan' => 'nullable',
            'umur' => 'nullable',
            'gpa' => 'nullable',
            'tes_english' => 'nullable',
            'tes_bahasa_lain' => 'nullable',
            'tes_standard' => 'nullable',
            'dokumen' => 'nullable',
            'lainnya' => 'nullable',
            'status_tampil' => 'nullable'
        ]);

        $kalenderBeasiswa = kalender_beasiswa::findOrFail($id);
        $kalenderBeasiswa->update($validatedData);

        // Sync pivot tables for negara and tingkat_studi
        if ($request->has('id_negara')) {
            $kalenderBeasiswa->negara()->sync($request->id_negara);
        } else {
            $kalenderBeasiswa->negara()->detach();
        }

        if ($request->has('id_tingkat_studi')) {
            $kalenderBeasiswa->tingkat_studi()->sync($request->id_tingkat_studi);
        } else {
            $kalenderBeasiswa->tingkat_studi()->detach();
        }

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
