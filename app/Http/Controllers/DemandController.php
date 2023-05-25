<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'nama' => 'required|max:100',
            'nik' => 'required|max:16|',
            'email' => 'required|email:dns|max:50',
            'no_hp' => 'required|max:12',
            'alamat' => 'required|max:255',
            'permohonan_informasi' => 'required|max:255',
            'tujuan' => 'required|max:255',
            'gambar_ktp' => 'required|image|file|max:2024',
            'dapat' => 'required',
            'beri' => 'required'
            
            
        ],
        [
            'nama.required' => 'Harap diisi!',
            'nama.max' => 'Maksimal 100 karakter!',
            'nik.required' => 'Harap diisi!',
            'nik.max' => 'Maksimal 16 karakter!',
            'email.required' => 'Harap diisi!',
            'email.email' => 'Email salah!',
            'email.max' => 'Maksimal 50 karakter!',
            'no_hp.required' => 'Harap diisi!',
            'no_hp.max' => 'Maksimal 12 karakter!',
            'alamat.required' => 'Harap diisi!',
            'alamat.max' => 'Maksimal 255 karakter!',
            'permohonan_informasi.required' => 'Harap diisi!',
            'permohonan_informasi.max' => 'Maksimal 255 karakter!',
            'tujuan.required' => 'Harap diisi!',
            'tujuan.max' => 'Maksimal 255 karakter!',
            'gambar_ktp.required' => 'Harap diisi!',
            'gambar_ktp.image' => 'Yang diupload bukan foto!',
            'gambar_ktp.max' => 'Maksimal foto 2mb!',
            'dapat.required' => 'Harap dipilih!',
            'beri.required' => 'Harap dipilih!',
        ]);


        

        $kode_baru = date('d').date('m').date('y');
        
        $kode_baru = $kode_baru. substr($dataValid['nik'],6,4);

        $today = Demand::where('tanggal',date('Y-m-d'))->get()->last();
        
       if ($today) {
           $kode_lama = $today->kode_permohonan;
           $kode_lama = substr($kode_lama,10,3);
           
          

           $kode_lama = $kode_lama + 1;
           
           if (strlen($kode_lama) == 1 ) {
               $kode_lama ='00'.$kode_lama;
           } else if (strlen($kode_lama) == 2) {
            $kode_lama ='0'.$kode_lama;
           } else {
               $kode_lama;
           }

           $kode_baru = $kode_baru.$kode_lama;
       } else{
           $kode_baru = $kode_baru . '001';
       }
       
       $dataValid['tahun'] = date('Y');

       $dataValid['tanggal'] = date('Y-m-d');
      
       $dataValid['kode_permohonan'] = $kode_baru;

       $dataValid['gambar_ktp'] = $request->file('gambar_ktp')->store('ktp-files');

        Demand::create($dataValid);

        return redirect('/#permohonan_informasi')->with('sukses', "Data berhasil ditambahkan! (Kode Permohonan anda : ".$dataValid['kode_permohonan'].") -> Harap catat kode permohonan anda!"  );
    }

    public function checkDemand(Request $request){
        
        $demand = Demand::where('kode_permohonan',$request->kode_permohonan)->first();

        if ($demand == null) {
            return redirect('/#permohonan_informasi')->with('null', "Data permohonan tidak ditemukan!");
          
        } else {
            return view('demand.check_demand',[
                'demand' => $demand
            ]);
        }

       
        
        
        
    }

    public function demandRejected()
    {
        
       $demands = Demand::where('status', 'Ditolak')->latest()->get();
        return view('demand.index',[
            'demands' => $demands
        ]);
    }

}
