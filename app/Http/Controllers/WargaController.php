<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $feedback = Feedback::all();
        return view('home', compact('feedback'));
    }
}
