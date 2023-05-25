<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Information;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() 
    {
        $count['information'] = Information::where('status','publik')->count();
        $count['ditolak'] = Demand::where('status','Ditolak')->count();
       

        

        return view('index',[
            'count' => $count
        ]);
    }
}
