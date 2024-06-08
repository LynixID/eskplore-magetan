<?php

namespace App\Http\Controllers;

use App\Models\Pembelanjaan;
use Illuminate\Http\Request;

class WisataPembelanjaanController extends Controller
{
    public function inputLokasiPembelanjaan(Request $request)
    {
        Pembelanjaan::create($request->except('_token', 'submit'));
        $pembelanjaan = Pembelanjaan::all();
        return view('data_lokasi_pembelanjaan', compact(['pembelanjaan']));
    }

    public function outputLokasiPembelanjaan()
    {
        $pembelanjaan = Pembelanjaan::all();
        return view('data_lokasi_pembelanjaan', compact(['pembelanjaan']));
    }
}
