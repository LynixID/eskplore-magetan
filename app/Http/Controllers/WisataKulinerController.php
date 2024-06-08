<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use Exception;
use Illuminate\Http\Request;

class WisataKulinerController extends Controller
{
    public function inputLokasiKuliner(Request $request)
    {
        $data = Kuliner::create($request->except('_token', 'submit'));
        if ($request->hasFile('foto')) {
            // atur lokasi foto
            $request->file('foto')->move('asset/img.maps/', $request->file('foto')->getClientOriginalName());

            // masukan ke variable data
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        $wisata_kuliner = Kuliner::all();
        return view('data_lokasi_kuliner', compact(['wisata_kuliner']));
    }

    public function outputLokasiKuliner()
    {
        $wisata_kuliner = Kuliner::all();
        return view('data_lokasi_kuliner', compact(['wisata_kuliner']));
    }

    public function destroy($id)
    {
        $lokasiDelete = Kuliner::find($id);

        if ($lokasiDelete) {
            $lokasiDelete->delete();
            return redirect()->route('lokasikuliner')->with('success', 'Lokasi berhasil dihapus');
        } else {
            return redirect()->route('lokasikuliner')->with('error', 'Lokasi tidak ditemukan');
        }
    }
}
