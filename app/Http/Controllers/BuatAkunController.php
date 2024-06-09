<?php

namespace App\Http\Controllers;

use App\Models\AkunAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

    public function berandaadmin()
    {
        return view('berandaadmin');
    }

    function loginPost(Request $request)
{
    $credentials = $request->validate([
        'id_admin' => ['required'],
        'nama_lengkap' => ['required'],
        'password' => ['required'],
    ]);

    $akun_admin = AkunAdmin::where('id_admin', $request->id_admin)
        ->where('nama_lengkap', $request->nama_lengkap)
        ->first();

    if (!$akun_admin) {
        return back()->withErrors([
            'id_admin' => 'ID admin, nama lengkap atau kata laluan tidak sah.',
        ]);
    }

    if (!Hash::check($request->password, $akun_admin->password)) {
        return back()->withErrors([
            'password' => 'Kata laluan tidak sah.',
        ]);
    }

    // Login successful, redirect to admin dashboard
    return redirect()->route('berandaadmin');
}

    function buatAkunPost(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required',
        'alamat_email' => 'required|email',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required',
        'id_admin' => 'required',
    ]);

    $allowedIds = ['233307101', '233307102', '233307112', '233307117'];

    if (!in_array($request->id_admin, $allowedIds)) {
        return back()->withErrors(['id_admin' => 'ID yang diinputkan salah.']);
    }

    if ($request->password != $request->password_confirmation) {
        return back()->withErrors(['password' => 'Password dan konfirmasi password tidak sama.']);
    }

    $data['nama_lengkap'] = strtolower($request->nama_lengkap);
    $data['alamat_email'] = $request->alamat_email;
    $data['password'] = Hash::make($request->password);
    $data['id_admin'] = $request->id_admin;

    $akun_admin = AkunAdmin::create($data);
    return redirect()->route('login');
}
}