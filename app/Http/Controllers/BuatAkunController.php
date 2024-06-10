<?php

namespace App\Http\Controllers;

use App\Models\AkunAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\OTPMail;


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

    public function kirim()
    {
        return view('verifikasi');
    }
    public function verifikasi()
    {
        return view('verifikasi');
    }
    public function gantiPassword()
    {
        return view('ganti-password');
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
            'password_confirmation' => 'required',
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

    public function kirimOTP(Request $request)
    {
        $request->validate([
            'alamat_email' => 'required|email',
        ]);

        $akun_admin = AkunAdmin::where('alamat_email', $request->alamat_email)->first();

        if (!$akun_admin) {
            return back()->withErrors(['alamat_email' => 'Alamat email tidak terdaftar.']);
        }

        $token = Str::random(60);
        $akun_admin->otp_token = $token;
        $akun_admin->otp_expires_at = now()->addMinutes(30);
        $akun_admin->save();

        Mail::to($request->alamat_email)->send(new OTPMail($token));

        return redirect()->route('verifikasi');
    }

    public function verifikasiOTP(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        $akun_admin = AkunAdmin::where('alamat_email', $request->alamat_email)->first();

        if (!$akun_admin) {
            return back()->withErrors(['alamat_email' => 'Alamat email tidak terdaftar.']);
        }

        if (!$akun_admin->otp_token || $akun_admin->otp_token !== $request->token || $akun_admin->otp_expires_at < now()) {
            return back()->withErrors(['token' => 'Token tidak valid atau telah kadaluarsa.']);
        }

        $akun_admin->otp_token = null;
        $akun_admin->otp_expires_at = null;
        $akun_admin->save();

        return redirect()->route('gantiPassword');
    }

    public function gantiPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $akun_admin = AkunAdmin::where('alamat_email', $request->alamat_email)->first();

        if (!$akun_admin) {
            return back()->withErrors(['alamat_email' => 'Alamat email tidak terdaftar.']);
        }

        $akun_admin->password = Hash::make($request->password);
        $akun_admin->save();

        return redirect()->route('login');
    }
}