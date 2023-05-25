<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.register');
    }

    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'username' => 'required|min:3|max:100|unique:users|alpha_dash',
            'name' => 'required|min:3|max:100',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:100|confirmed',
            'password_confirmation' => 'required|min:8|max:100'
        ],
        [
            'username.required' => 'Username harus diisi!',
            'username.min' => 'Username minimal 3 karakter!',
            'username.max' => 'Username maksimal 100 karakter!',
            'username.unique' => 'Username sudah digunakan!',
            'username.alpha_dash' => 'Username tidak boleh mengandung spasi!',
            'name.required' => 'Nama Lengkap harus diisi!',
            'name.min' => 'Nama Lengkap minimal 3 karakter!',
            'name.max' => 'Nama Lengkap maksimal 100 karakter!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'password.max' => 'Password maksimal 100 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            'password_confirmation.required' => 'Konfirmasi password harus diisi!',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter!',
            'password_confirmation.max' => 'Konfirmasi password maksimal 100 karakter!',

        ]);

        $dataValid['password'] = Hash::make($dataValid['password']);

        $countUsers = User::all()->count();
        if ($countUsers == 0 ) {
            $dataValid['status'] = 'superadmin';
        }

       

        User::create($dataValid);
        

        return redirect('/login')->with('sukses', 'Akun berhasil didaftarkan!!');

    }
}
