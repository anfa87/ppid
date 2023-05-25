<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>PPID - Laporan Permohonan Informasi Masuk</title>
    
    <style type="text/css">


		
        .header {
            width : 980px;
            margin:0 auto;
            background-color : #fff;
           
        }
        .table-header {
            border-bottom : 5px solid # 000; 
            padding: 2px}
        .tengah {
            text-align : center;
            line-height: 5px;
        }

        .table-isi{
            color: #232323;
            border-collapse: collapse;
            font-size: 11pt;
            border: 1px solid rgb(5, 5, 5);
            padding: 5px 5px;
        }

        .border {
            border: 1px solid rgb(5, 5, 5);
            padding: 5px 5px;
        }

       

       
 	</style>
 </head>

<body>
    
   
    <div>
        <div class = "header">
            <table class="table-header" width = "100%">
                  <tr>
                        <td class = "tengah">
                              <h2>LAPORAN DATA MASUK</h2>
                              <h2>PERMOHONAN INFORMASI TAHUN {{ $tahun }}</h2>
                              <h2>DINAS PEMUDA DAN OLAHRAGA</h2>
                              <h2>PROVINSI JAWA BARAT</h2>
                        </td>
                   </tr>
            </table >
       </div>
        
        <hr>
    

            <table align="center" class="table-isi">
                <thead>
                    <tr>
                        <th class="border">No</th>
                        <th class="border">Tanggal</th>
                        <th class="border">Kode Permohonan</th>
                        <th class="border">NIK</th>
                        <th class="border">Nama Lemgkap</th>
                        <th class="border">Permohonan Informasi</th>
                        <th class="border">Tujuan</th>
                        <th class="border">Status</th>
                        <th class="border">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demands as $demand)
                    <tr>
                        <td class="border">{{ $loop->iteration }}</td>
                        <td class="border">{{ $demand->tanggal }}</td>
                        <td class="border">{{ $demand->kode_permohonan }}</td>
                        
                        <td class="border">{{ $demand->nik }}</td>
                        <td class="border">{{ $demand->nama }}</td>
                        <td class="border">{{ $demand->permohonan_informasi }}</td>
                        <td class="border">{{ $demand->tujuan }}</td>
                        <td class="border">{{ $demand->status }}</td>
                        <td class="border">{{ $demand->keterangan }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>


   

</body>

</html>