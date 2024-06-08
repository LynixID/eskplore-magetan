<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::get();
        //dd(Feedback::all());
        return view('feedback', compact('feedback'));
    }

    public function proses_hapus($id): RedirectResponse
    {
        //get product by ID
        $data = Feedback::findOrFail($id);
        // dd($data);
        //delete product
        $data->delete();

        //redirect to index
        return redirect()->route('feedback')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function proses_tambah(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'pesan' => 'required',
        ]);

        $nama = $request->nama_depan . ' ' . $request->nama_belakang;
        Feedback::create([
            'name' => $nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect('/')->with('succes', 'Feddback berhasil dikiri');
    }
}
