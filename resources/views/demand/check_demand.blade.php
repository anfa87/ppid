<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@500&display=swap" rel="stylesheet">


    {{-- style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />
    

    <title>PPID DISPORA JABAR - Cek Permohonan Informasi</title>
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
            <a class="nav-link" href="/#informasi-publik">Informasi Publik</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link active" href="/#permohonan-informasi">Permohonan Informasi</a>
          </li>
         
          
        </ul>
      </div>
    </div>
  </nav>
   {{-- End Navbar --}}

  
    <div class="container p-3">
        <h3>Cek Permohonan Informasi</h3>
        
        <div class="row mt-4" style="margin-bottom: 3rem">
            <div class="col-lg-6">
                <div class="card bg-primary mb-3">
                    <div class="card-header">

                        <table  class="table epilogue text-white" style="margin-bottom: 2px">
                            <thead>
                            
                                <tr>
                                    <td style="width: 40%;">Kode Permohonan</td>
                                    <td style="width:1%">:</td>
                                    <td>
                                        {{ $demand->kode_permohonan }}
                                    </td>
                                </tr>
                            </thead>
                            <tr style="border-bottom: rgb(14, 107, 246)">
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>
                                   {{ $demand->created_at->format('d/m/Y')}}
                                </td>
                            </tr>
                        
                        

                        </table>
                    </div>

                </div>
                <div class="card border-primary mb-3" >
                    <div class="card-header text-white bg-primary">
                        <b>Data Pemohon</b>
                    </div>
                    <div class="card-body">
                        <table class="table epilogue">
                          
                              <tr>
                                <td style="width: 25%; font-weight:bold">Nama</th>
                                <td style="width:5%">:</td>
                                <td>
                                    {{ $demand->nama }}
                                </td>
                            </tr>
                       
        
                            <tr>
                                <th>NIK/No KTP</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->nik }}
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>No Hp</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->no_hp }}
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->alamat }}
                                </td>
                            </tr>
                            <tr>
                                <th>Foto KTP</th>
                                <td>:</td>
                                <td>
                                    <a data-fancybox="gallery" href="{{ asset('storage/' . $demand->gambar_ktp) }}">
                                        <img src="{{ asset('storage/' . $demand->gambar_ktp) }}" alt="{{ $demand->nik }}" width="150px">
                                    </a>
                                </td>
                            </tr>
        
                            
                        </table>
        
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-primary">
                    <div class="card-header text-white bg-primary ">
                        <b>Data Permohonan</b>
                    </div>
                    <div class="card-body">
                        @if (session('sukses'))
                            
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('sukses') }}
                        </div>
                        @endif
                        <table style="margin-bottom:50px" class="table epilogue" >
                          
        
                                <tr>
                                  <td style="width: 30%; font-weight:bold">Permohonan Informasi</th>
                                  <td style="width: 5%">:</td>
                                  <td>
                                      {{ $demand->permohonan_informasi }}
                                  </td>
                              </tr>
                          
                            <tr>
                                <th>Tujuan</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->tujuan }}
                                </td>
                            </tr>
                            <tr>
                                <th>Cara Mendapatkan</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->dapat }}
                                </td>
                            </tr>
                            <tr>
                                <th>Cara Memberikan</th>
                                <td>:</td>
                                <td>
                                   {{ $demand->beri }}
                                </td>
                            </tr>
                          
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($demand->status == 'Belum diproses')
                                        <span class="blm-diproses">{{ $demand->status }}</span>
                                    @elseif($demand->status == 'Diterima')
                                        <span class="diterima">{{ $demand->status }}</span>
                                    @else
                                        <span class="ditolak">{{ $demand->status }}</span>
                                    @endif
                                  
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>:</td>
                                <td>
                                   <span>{{ $demand->keterangan }}</span>
                                   
                                </td>
                            </tr>
        
                            
                        </table>
        
                   
        
                    </div>
                </div>
            </div>
        </div>
        <!-- /.table-responsive -->
    </div>
  
   


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

   
  </body>
</html>