<?php

namespace App\Http\Controllers;

use App\Models\WisataKuliner;
use Illuminate\Http\Request;

class WisataKulinerController extends Controller
{
    public function index()
    {
        $wisata_kuliners = WisataKuliner::all();
        return view('maps', compact(['wisata_kuliners']));
    }
}
