<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.css"/>
 
    
    

 
    
    
  
    {{-- style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <title>PPID DISPORA JABAR - Permohonan Informasi Ditolak</title>
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

    <div class="container p-3" style="margin-top: 2rem">
        <h3>Daftar Permohonan Informasi Ditolak</h3>
        <div class="card mt-3 p-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example">
                  <thead>
                      <tr>
                          <th>Permohonan Informasi</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($demands as $demand)
                      <tr>
                          <td>{{ $demand->permohonan_informasi }}</td>
                          <td>{{ $demand->created_at->format('d/m/Y') }}</td>
                          <td>{{ $demand->status }}</td>
                          <td>{{ $demand->keterangan }}</td>
                        
                      
                      </tr>
                      @endforeach
                      
                  </tbody>
              </table>
          </div>
          <!-- /.table-responsive -->
          </div>
        </div>
       
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.js"></script>

    
    <script>
      $(document).ready(function () {
        $('#example').DataTable();
      });
    </script>



  </body>
</html>