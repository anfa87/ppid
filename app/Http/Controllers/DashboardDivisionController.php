<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Information;
use Illuminate\Http\Request;

class DashboardDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Division::all()->count() > 0) {
            $kode_divisi = Division::latest()->first();
            $kode_divisi = $kode_divisi->kode_divisi;
            $kode_divisi = preg_replace("/[^0-9]/","",$kode_divisi);
            $kode_divisi = $kode_divisi + 1;
            if (strlen($kode_divisi) == 3 ) {
                $kode_divisi = $kode_divisi;
            } elseif (strlen($kode_divisi) == 2)  {
                $kode_divisi = '0'. $kode_divisi;
            } else {
                $kode_divisi = '00'. $kode_divisi;
            }
            
            $kode_divisi = 'BID'.$kode_divisi;
           
            $divisions = Division::all();
            return view('dashboard.division.index',[
                'divisions' => $divisions,
                'kode_divisi' => $kode_divisi,
            ]);
        } else {
            $divisions = Division::all();
            $kode_divisi = 'BID001';
            return view('dashboard.division.index',[
            'divisions' => $divisions,
            'kode_divisi' => $kode_divisi,
        ]);
        }

        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'kode_divisi' => 'required|unique:divisions',
            'nama_divisi' => 'required|max:100|',
            
            
        ],
        [
            'kode_divisi.required' => 'Harap masukkan kode bidang!',
            'kode_divisi.unique' => 'Kode bidang sudah digunakan!',
            'nama_divisi.required' => 'Harap masukkan nama bidang!',
            'nama_divisi.max' => 'Nama bidang maksimal 100 karakter!',
            

        ]);

        Division::create($dataValid);

        return redirect('/dashboard/division')->with('sukses', 'Data berhasil ditambahkan!');
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {

        $dataValid = $request->validate([
            'kode_divisi' => 'required',
            'nama_divisi' => 'required|max:100',
            
            
        ],
        [
            'kode_divisi.required' => 'Harap masukkan kode bidang!',
            'nama_divisi.required' => 'Harap masukkan nama bidang!',
            'nama_divisi.max' => 'Nama bidang maksimal 100 karakter!',
            

        ]);

        Division::where('id', $division->id)
            ->update($dataValid);

        return redirect('/dashboard/division')->with('sukses', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        Information::where('division_id',$division->id)->update(['division_id' => null ]);
        Division::destroy($division->id);

        return redirect('/dashboard/division')->with('sukses', 'Data berhasil dihapus!');
    }
}
