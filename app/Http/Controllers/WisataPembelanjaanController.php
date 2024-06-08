<?php

namespace App\Http\Controllers;

use App\Models\Pembelanjaan;
use Illuminate\Http\Request;

class WisataPembelanjaanController extends Controller
{
    public function inputLokasiPembelanjaan(Request $request)
    {
        $data = Pembelanjaan::create($request->except('_token', 'submit'));
        if ($request->hasFile('foto')) {
            // atur lokasi foto
            $request->file('foto')->move('asset/img.maps/', $request->file('foto')->getClientOriginalName());

            // masukan ke variable data
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        $pembelanjaan = Pembelanjaan::all();
        return view('data_lokasi_pembelanjaan', compact(['pembelanjaan']));
    }

    public function outputLokasiPembelanjaan()
    {
        $pembelanjaan = Pembelanjaan::all();
        return view('data_lokasi_pembelanjaan', compact(['pembelanjaan']));
    }

    public function destroy($id)
    {
        $lokasiDelete = Pembelanjaan::find($id);

        if ($lokasiDelete) {
            $lokasiDelete->delete();
            return redirect()->route('lokasipembelanjaan')->with('success', 'Lokasi berhasil dihapus');
        } else {
            return redirect()->route('lokasipembelanjaan')->with('error', 'Lokasi tidak ditemukan');
        }
    }
}
