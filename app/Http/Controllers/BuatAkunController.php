<?php

namespace App\Http\Controllers;

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
            'alamat_email' =>'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('alamat_email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('beranda'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function buatAkunPost(Request $request){
        $request->validate([
            'nama_depan'=>'required',
            'nama_belakang' => 'required',
            'alamat_email'=>'required|email|unique:users',
            'password'=>'required',
            'id_admin'=>'required'
        ]);

        $data['nama_depan']= $request->nama_depan;
        $data['nama_belakang']= $request->nama_belakang;
        $data['alamat_email']= $request->alamat_email;
        $data['password']= Hash::make($request->password);
        $data['id_admin']= $request->id_admin;
        $user = AkunAdmin::create($data);
        if(!$user){
            return redirect(route('buat-akun'))->with("error", "Buat akun gagal, coba kembali");
        }
        return redirect(route('login'))->with("success", "Login kembali, min");
    }
}
