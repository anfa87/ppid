<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Information;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count['information'] = Information::all()->count();
        $count['diterima'] = Demand::where('status','Diterima')->count();
        $count['ditolak'] = Demand::where('status','Ditolak')->count();
        $count['masuk'] = Demand::where('status','Belum diproses')->count();
    
        return view('dashboard.index', [
            'count' => $count
        ]);
    }
   
    
}
