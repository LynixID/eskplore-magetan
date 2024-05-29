<?php

namespace App\Http\Controllers;

use App\Models\AkunAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BuatAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function login()
    {
        return view('hlmn-login');
    }

    function buatAkun()
    {
        return view('buat-akun');
    }

    function loginPost(Request $request){
        $request->validate([
            'nama_depan' =>'required',
            'id_admin' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect(route('beranda'));
}
    }

function buatAkunPost(Request $request){
    $request->validate([
        'nama_depan' => 'required',
        'nama_belakang' => 'required',
        'alamat_email' => 'required|email',
        'password' => 'required',
        'id_admin' => 'required'
    ]);

    $data['nama_depan'] = $request->nama_depan;
    $data['nama_belakang'] = $request->nama_belakang;
    $data['alamat_email'] = $request->alamat_email;
    $data['password'] = Hash::make($request->password); 
    $data['id_admin'] = $request->id_admin;

    AkunAdmin::create($data);

    return redirect()->route('login')->with(['success' => 'Data Berhasil Disimpan!']);
}

};