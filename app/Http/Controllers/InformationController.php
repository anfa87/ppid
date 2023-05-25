<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index() 
    {
        $information = Information::where('status','publik')->get();
        return view('information.index',[
            'information' => $information
        ]);
    }


    public function show(Information $information)
    {
        return view('information.detail_information',[
            'inf' => $information,
        ]);
    }

    public function previewPdf(File $file)
    {
        
        return view('dashboard.information.prefiew-pdf',[
            'file' => $file
        ]);
    }
}
