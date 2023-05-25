<?php

namespace App\Http\Controllers;
use App\Models\File;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    

    public function store(Request $request)
    {

        $dataValid = $request->validate([
            
            'file.0' => 'required|mimes:pdf|file|max:2048',
            'file.*' => 'mimes:pdf|file|max:2048',
        ],
        [
            
            'file.0.required' => 'Harap pilih file !',
            'file.0.mimes' => 'Harap hanya masukkan file pdf !',
            'file.0.max' => 'Ukuran file tidak boleh lebih dari 2 mb !',
            'file.*.mimes' => 'Harap hanya masukkan file pdf !',
            'file.*.max' => 'Ukuran file tidak boleh lebih dari 2 mb !'

            

        ]);

        $information = Information::where('id',$request->information_id)->first();


        $array = 0;
        foreach ($dataValid['file'] as $key => $value) {

           $array++;
        }

        
    
        
        for ($i=0; $i < $array ; $i++) { 
            $dataValid['path'][$i] = $request->file('file')[$i]->store('information-files/'.$information->kode_informasi);
            $dataValid['nama_file'][$i] = $request->file('file')[$i]->hashName();
          
            File::create([
                'nama_file' =>  $dataValid['nama_file'][$i],
                'path' =>  $dataValid['path'][$i],
                'information_id' => $information->id 
            ]);
        }
            return redirect("/dashboard/information/$information->slug")->with('sukses', 'File berhasil ditambahkan!');
    }


    public function destroy(File $file)
    {
        $slug = $file->inf->slug;

        File::where('id', $file->id)->delete();

        Storage::delete($file->path);

        return redirect("/dashboard/information/$slug")->with('sukses', 'File berhasil dihapus!');

    }
}
