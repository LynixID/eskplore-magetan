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
    public function login()
    {
        return view('hlmn-login');
    }

    public function buatAkun()
    {
        return view('buatAkun');
    }

    public function berandaadmin()
    {
        return view('berandaadmin');
    }

    function loginPost(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required',
        'id_admin' => 'required',
        'password' => 'required',
    ]);

    $nama_lengkap = strtolower($request->nama_lengkap);
    $id_admin = strtolower($request->id_admin);
    $password = $request->password;

    $akun_admin = AkunAdmin::where('nama_lengkap', $nama_lengkap)
        ->where('id_admin', $id_admin)
        ->first();

    if ($akun_admin && Hash::check($password, $akun_admin->password)) {
        $request->session()->put('authenticatedUser', $akun_admin);
        return redirect()->intended(route('beranda'));
    }

    return redirect(route('login'))->with("error", "Data yang dimasukkan salah");
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