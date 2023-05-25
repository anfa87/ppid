<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Division;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::all();
        return view('dashboard.information.index',[
            'information' => $information
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('dashboard.information.create',[
            'divisions' => $divisions
        ]);
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
            'judul' => 'required|max:150|unique:Information',
            'tanggal' => 'required|date',
            'deskripsi'=> 'required|max:1000',
            'jenis_informasi' => 'required',
            'penerbit_informasi' => 'required',
            'status' => 'required',
            'division_id' => 'required',
            'file.0' => 'required|mimes:pdf|file|max:2048',
            'file.*' => 'mimes:pdf|file|max:2048',
        ],
        [
            'judul.required' => 'Harap masukkan judul!',
            'judul.max' => 'Judul maksimal 150 karakter!',
            'judul.unique' => 'Judul sudah digunakan!',
            'tanggal.required' => 'Harap masukkan tanggal!',
            'tanggal.date' => 'Format tanggal salah!',
            'deskripsi.required' => 'Harap masukkan deskripsi!',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter!',
            'jenis_informasi.required' => 'Harap pilih jenis informasi!',
            'penerbit_informasi.required' => 'Harap masukkan penanggung jawab/ penerbit informasi!',
            'status.required' => 'Harap piih status!',
            'division_id.required' => 'Harap piih divisi!',
            'file.0.required' => 'Harap pilih file!',
            'file.0.mimes' => 'Harap hanya masukkan file pdf!',
            'file.0.max' => 'Ukuran file tidak boleh lebih dari 2 mb!',
            'file.*.mimes' => 'Harap hanya masukkan file pdf!',
            'file.*.max' => 'Ukuran file tidak boleh lebih dari 2 mb!'

            

        ]);

        $slug = SlugService::createSlug(Information::class, 'slug', $request->judul);
        
        
        $dataValid['slug'] = $slug;

        $countInf= Information::all()->count();
        if ($countInf == 0 ) {
            $dataValid['kode_informasi'] = 'INF001';
            Information::create($dataValid);
        } else {
            $information = Information::latest()->first();
            $kode_informasi = $information->kode_informasi;
            
            $kode_informasi = preg_replace("/[^0-9]/","",$kode_informasi);
            $kode_informasi = $kode_informasi + 1;
            if (strlen($kode_informasi) == 3 ) {
                $kode_informasi = 'INF'.$kode_informasi;
            } elseif (strlen($kode_informasi) == 2)  {
                $kode_informasi = 'INF0'. $kode_informasi;
            } else {
                $kode_informasi = 'INF00'. $kode_informasi;
            }

            $dataValid['kode_informasi'] = $kode_informasi;
            Information::create($dataValid);
        };

      

        
        $information_id = Information::all()->last();
       
        $information_id = $dataValid['information_id'] = $information_id->id;

        

        $array = 0;
        foreach ($dataValid['file'] as $key => $value) {

           $array++;
        }

        
    
        
        for ($i=0; $i < $array ; $i++) { 
            $dataValid['path'][$i] = $request->file('file')[$i]->store('information-files/'.$dataValid['kode_informasi']);
            $dataValid['nama_file'][$i] = $request->file('file')[$i]->hashName();
          
            File::create([
                'nama_file' =>  $dataValid['nama_file'][$i],
                'path' =>  $dataValid['path'][$i],
                'information_id' => $information_id  
            ]);
        }


       


        return redirect('/dashboard/information')->with('sukses', 'Data baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        $divisions = Division::all();
        return view('dashboard.information.show',[
            'inf' => $information,
            'divisions' => $divisions
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $rules =[
            'tanggal' => 'required|date',
            'deskripsi'=> 'required|max:1000',
            'jenis_informasi' => 'required',
            'penerbit_informasi' => 'required',
            'status' => 'required',
            'division_id' => 'required'
        ];

        $message =[
            'tanggal.required' => 'Harap masukkan tanggal !',
            'tanggal.date' => 'Format tanggal salah !',
            'deskripsi.required' => 'Harap masukkan deskripsi !',
            'deskripsi.max' => 'Deskripsi maksimal 1000 karakter !',
            'jenis_informasi.required' => 'Harap pilih jenis informasi !',
            'penerbit_informasi.required' => 'Harap masukkan penanggung jawab/ penerbit informasi!',
            'status.required' => 'Harap piih status !',
            'division_id.required' => 'Harap piih divisi !'

        ];

        if ($request->judul != $information->judul) {
            $rules['judul'] = 'required|max:150|unique:Information';
            $message['judul.required'] = 'Harap masukkan judul !';
            $message['judul.max'] = 'Judul maksimal 150 karakter !';
            $message['judul.unique'] = 'Judul sudah digunakan !';

            $slug = SlugService::createSlug(Information::class, 'slug', $request->judul);

            $dataValid = $request->validate($rules,$message);


            $dataValid['slug'] = $slug;
            $dataValid['kode_informasi'] = $information->kode_informasi;

    
            Information::where('id', $information->id)
                ->update($dataValid);
    
            return redirect("/dashboard/information/$slug")->with('sukses', 'Data berhasil diperbaharui!');
            
        }

        
        
        

        $dataValid = $request->validate($rules,$message);

        $dataValid['kode_informasi'] = $information->kode_informasi;

        Information::where('id', $information->id)
            ->update($dataValid);

        return redirect("/dashboard/information/$information->slug")->with('sukses', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        File::where('information_id', $information->id)->delete();

        Storage::deleteDirectory('information-files/'.$information->kode_informasi);
        

        Information::destroy($information->id);

        return redirect('/dashboard/information')->with('sukses', 'Data berhasil dihapus!');
    }

    public function previewPdf(File $file)
    {
        
        return view('dashboard.information.prefiew-pdf',[
            'file' => $file
        ]);
    }
}
