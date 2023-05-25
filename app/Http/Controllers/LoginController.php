<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('dashboard.login');
    }

    public function authenticate(Request $request)
    {
        $dataValid = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!'

        ]);


        $count = User::where('username',$request->username)->count();

        if ($count > 0) {
            $user = User::where('username',$request->username)->first();

            
            if(Auth::attempt($dataValid)) {
                if ($user->status === 'unverified') {
                    Auth::logout();

                    $request->session()->invalidate();
            
                    $request->session()->regenerateToken();
                    return redirect('/login')->with('gagal','Akun belum diverifikasi!');

                } else {
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard');
                } 
            }
        } else {
            return back()->with('gagal','Login tidak berhasil!');
        }

        return back()->with('gagal','Login tidak berhasil!');

        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
