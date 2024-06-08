<?php

namespace App\Http\Controllers;

use App\Models\Pembelanjaan;
use App\Models\Titiklokasi;
use App\Models\WisataKuliner;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class TitiklokasiController extends Controller
{
    public function index()
    {
        $titiklokasis = Titiklokasi::all();
        $wisata_kuliners = WisataKuliner::all();
        $wisata_pembelanjaans = Pembelanjaan::all();
        return view('maps', compact(['titiklokasis', 'wisata_kuliners', 'wisata_pembelanjaans']));
    }

    public function read()
    {
        $titiklokasis = Titiklokasi::all();
        return view('tambahlokasi', compact(['titiklokasis']));
    }

    public function create(Request $request)
    {


        Titiklokasi::create($request->except('_token', 'submit'));
        $titiklokasis = Titiklokasi::all();
        return view('tambahlokasi', compact(['titiklokasis']));
    }

    public function inputLokasiWisata(Request $request)
    {
        Titiklokasi::create($request->except('_token', 'submit'));
        $titiklokasis = Titiklokasi::all();
        return view('data_lokasi_wisata', compact(['titiklokasis']));
    }

    public function outputLokasiWisata()
    {
        $titiklokasis = Titiklokasi::all();
        return view('data_lokasi_wisata', compact(['titiklokasis']));
    }
    public function destroy($id)
    {
        $lokasiDelete = Titiklokasi::find($id);
        $lokasiDelete->delete();
        return redirect('/tambahlokasi');
    }
}
