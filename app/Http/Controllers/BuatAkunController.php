<?php

namespace App\Http\Controllers;

use App\Models\AkunAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
            return redirect()->route('beranda');
        }

        return redirect(route('login'))->withInput()->withErrors(['error' => 'Data yang dimasukkan salah']);
    }

    function buatAkunPost(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat_email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
            'id_admin' => 'required',
        ]);

        $allowedIds = ['233307101', '233307102', '233307112', '233307117'];

        if (!in_array($request->id_admin, $allowedIds)) {
            return back()->withErrors(['error' => 'ID yang diinputkan salah.']);
        }

        if ($request->password != $request->password_confirmation) {
            return back()->withErrors(['error' => 'Password dan konfirmasi password tidak sama.']);
        }

        $data['nama_lengkap'] = strtolower($request->nama_lengkap);
        $data['alamat_email'] = $request->alamat_email;
        $data['password'] = Hash::make($request->password);
        $data['id_admin'] = $request->id_admin;

        $akun_admin = AkunAdmin::create($data);
        return redirect()->route('login');
    }
    
    public function gantiPassword()
    {
        return view('ganti-password');
    }
    
    public function gantiPasswordPost(Request $request)
    {
        $request->validate([
            'alamat_email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
    
        $akun_admin = $request->input('alamat_email');
        $akun_admin = AkunAdmin::where('alamat_email', $akun_admin)->first();
    
        if ($akun_admin) {
            $akun_admin->update([
                'password'=> Hash::make($request->password),
            ]);
        }
        return redirect()->route('login');
    } }

    
//     public function verifikasi()
// {
//     $captcha = Str::random(6);
//     Session::put('captcha', $captcha);

//     return view('verifikasi', [
//         'captcha' => $captcha,
//     ]);
// }

// public function verifikasiKode(Request $request)
// {
//     $captcha = Session::get('captcha');
//     if (!$captcha || $captcha != $request->input('captcha')) {
//         return back()->withErrors(['error' => 'Kode captcha salah.']);
//     }

//     $kodeVerifikasi = $request->input('kode_verifikasi');
//     if (!$kodeVerifikasi) {
//         return back()->withErrors(['error' => 'Kode verifikasi tidak boleh kosong.']);
//     }

//     if ($kodeVerifikasi == 'kode_verifikasi_benar') {
//         Session::put('kode_verifikasi_benar', true); 
//         return redirect()->route('gantiPassword');
//     } else {
//         return back()->withErrors(['error' => 'Kode verifikasi salah.']);
//     }
// }