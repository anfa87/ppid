<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demand;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::All();
        return view('dashboard.user.index',[
            'users' => $users
        ]);
    }

    public function updateStatus(Request $request, User $user)
    {
        
        User::where('id', $user->id)
        ->update(['status' => $request->status]);
        

        $superadmin = User::where('status', 'superadmin')->count();

        if ($superadmin == 0) {
            User::where('id', $user->id)
            ->update(['status' => 'superadmin']);
            return redirect('/dashboard/users')->with('gagal','Superadmin harus ada min 1 akun!!');
        }
            
        return redirect('/dashboard/users')->with('sukses','Status berhasil diubah!');
        
        
    }



    public function destroy(User $user)
    {
        Demand::where('user_id', $user->id)
        ->update(['user_id' => null]);

        $superadmin = User::where('status', 'superadmin')->count();
        

        if ($user->status == 'superadmin' && $superadmin == 1) {
            
            return redirect('/dashboard/users')->with('gagal','Superadmin harus ada min 1 akun!!');
        }
        
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('sukses', 'Data berhasil dihapus!');
    }
}
