<?php

namespace App\Http\Controllers;

use App\Models\kalender_beasiswa;
use App\Models\Negara;
use App\Models\tingkat_studi;
use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function homepage()
    {
        $data = kalender_beasiswa::with('negara', 'tingkat_studi')->get();
        $negara = Negara::all();
        $tingkat_studi = tingkat_studi::all();


        return view('frontend.homepage', [
            'data' => $data,
            'negara' => $negara,
            'tingkat_studi' => $tingkat_studi
        ]);
    }

    // public function detail()
    // {
    //     $data = kalender_beasiswa::with('negara', 'tingkat_studi')->get();
    //     $negara = Negara::all();
    //     $tingkat_studi = tingkat_studi::all();

    //     return view('frontend.detail', [
    //         'data' => $data,
    //         'negara' => $negara,
    //         'tingkat_studi' => $tingkat_studi
    //     ]);
    // }

    public function detail($id)
    {
        $data = kalender_beasiswa::with('negara', 'tingkat_studi')->findOrFail($id);
        $negara = Negara::all();
        $tingkat_studi = tingkat_studi::all();
    
        return view('frontend.detail', [
            'data' => $data,
            'negara' => $negara,
            'tingkat_studi' => $tingkat_studi
        ]);
    }
    

    // public function filter(Request $request)
    // {
    //     $query = kalender_beasiswa::query();

    //     if ($request->has('id_tingkat_studi')) {
    //         $query->whereHas('tingkat_studi', function ($q) use ($request) {
    //             $q->whereIn('id', $request->id_tingkat_studi);
    //         });
    //     }

    //     if ($request->has('jenis_beasiswa')) {
    //         $query->whereIn('jenis_beasiswa', $request->jenis_beasiswa);
    //     }

    //     if ($request->has('id_negara')) {
    //         $query->whereHas('negara', function ($q) use ($request) {
    //             $q->whereIn('id', $request->id_negara);
    //         });
    //     }

    //     $filteredData = $query->with('negara', 'tingkat_studi')->get();

    //     return view('frontend.partials.filtered_articles', compact('filteredData'));
    // }
}