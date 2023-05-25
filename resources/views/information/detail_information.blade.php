<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   


    {{-- style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">


    <title>PPID DISPORA JABAR - Detail Informasi Publik</title>
  </head>
  <body class="bg-light">
   {{-- Navbar --}}
   <nav id="navbar-example" class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm" style="background-color: white">
    <div class="container ">
      <a class="navbar-brand" href="/#home">
        <img src="{{asset('image/frontend/brand-ppid.png')}}" alt="" width="80">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-2">
            <a class="nav-link" href="/#home">Home</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="/#tentang-ppid">Tentang PPID</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link active" href="/#informasi-publik">Informasi Publik</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="/#permohonan-informasi">Permohonan Informasi</a>
          </li>
        
          
        </ul>
      </div>
    </div>
  </nav>
   {{-- End Navbar --}}

    <div class="container p-3" style="margin-top:2rem">
        <h3>Detail Informasi Publik</h3>
        <div class="card mt-3 p-3">
            <div class="card-body">
                <table class="table table-bordered table-hover epilogue">
            
                    <tr>
                        <th style="width: 40%">Judul</th>
                        <td>
                            <span class="data">{{ $inf->judul }}</span>
                            
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            <span class="data">{{ $inf->deskripsi }}</span>
                           
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>
                            <span class="data">{{ $inf->tanggal }}</span>
                           
                    </tr>
                    <tr>
                        <th>Bidang</th>
                        <td>
                            <span class="data">{{ $inf->division->nama_divisi  }}</span>
                           
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Informasi</th>
                        <td>
                            <span class="data">{{ $inf->jenis_informasi }}</span>
                            
                        </td>
                    </tr>
                    <tr>
                        <th>Penanggung Jawab/ Penerbit Informasi</th>
                        <td>
                            <span class="data">{{ $inf->penerbit_informasi }}</span>
                            
                        </td>
                    </tr>
                    
               
                    <tr>
                        <th>File</th>
                        <td>
                            @foreach ($inf->files as $file)
                               
                                <a href="/preview/{{$file->nama_file}}" target='_blank' style="font-size: 40px; margin-left:5px; margin-top:2px"><i class="fa fa-file-pdf-o" style="color: red" aria-hidden="true"></i></a>  
                                
                            @endforeach 
                        </td>
                    </tr>
                </table>
            </div>
        </div>
       
        <!-- /.table-responsive -->
    </div>

   


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

   
  </body>
</html>