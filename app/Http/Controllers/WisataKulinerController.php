<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use Exception;
use Illuminate\Http\Request;

class WisataKulinerController extends Controller
{
    public function inputLokasiKuliner(Request $request)
    {
        Kuliner::create($request->except('_token', 'submit'));
        $wisata_kuliner = Kuliner::all();
        return view('data_lokasi_kuliner', compact(['wisata_kuliner']));
    }

    public function outputLokasiKuliner()
    {
        $wisata_kuliner = Kuliner::all();
        return view('data_lokasi_kuliner', compact(['wisata_kuliner']));
    }
}
