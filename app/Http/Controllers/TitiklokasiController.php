<?php

namespace App\Http\Controllers;

use App\Models\Titiklokasi;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class TitiklokasiController extends Controller
{
    public function index()
    {
        $titiklokasis = Titiklokasi::all();
        return view('maps', compact(['titiklokasis']));
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

    public function destroy($id)
    {

        $lokasiDelete = Titiklokasi::find($id);
        $lokasiDelete->delete();
        return redirect('/tambahlokasi');
    }
}
