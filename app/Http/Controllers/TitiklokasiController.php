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
}
