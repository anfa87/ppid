<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardDemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $demands = Demand::latest()->get();
        return view('dashboard.demand.index',[
            'demands' => $demands
        ]);
    }

    

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand){
        return view('dashboard.demand.show',[
            'demand' => $demand
        ]);
    }

   

    public function process(Request $request, Demand $demand)
    {
        $dataValid = $request->validate([
            'status' => 'required',
            'keterangan' => 'required|max:500',
            
            
        ],
        [
            'status.required' => 'Harap masukkan kode divisi!',
            'keterangan.required' => 'Harap masukkan nama divisi!',
            'keterangan.max' => 'Nama divisi maksimal 500 karakter!',
            

        ]);

        $dataValid['user_id'] = auth()->user()->id;

        Demand::where('id', $demand->id)
            ->update($dataValid);

        return redirect("/dashboard/demand/{$demand->kode_permohonan}")->with('sukses', 'Data permohonan berhasil diproses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        Storage::delete($demand->gambar_ktp);
        Demand::destroy($demand->id);

        return redirect('/dashboard/demand')->with('sukses', 'Data berhasil dihapus!');
    }

    public function demandStatus($demand)
    {
       $demands = Demand::where('status', $demand)->latest()->get();
        return view('dashboard.demand.index',[
            'demands' => $demands
        ]);
    }

    public function report(Request $request)
    {

        $tahun = $request->tahun;
        $demands = Demand::where('tahun',$request->tahun)->latest()->get();
        
        
        if ($demands->count() == 0 ) {
            return redirect('/dashboard/demand')->with('gagal', 'Pembuatan laporan gagal! tidak ada data pada tahun yang dimasukkan!');
        } else {
            $pdf = app('dompdf.wrapper');
            $pdf->setPaper('A4', 'landscape');
            $pdf->loadView('dashboard.demand.report',['demands' => $demands, 'tahun'=> $tahun])->setOptions(['defaultFont' => 'arial']);

    	    return $pdf->download('Laporan-Permohonan_Informasi-Masuk.pdf');
        }
        
        
    }

}
