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


    <style>
      body {
          position: relative;
      }

      html {
        scroll-behavior: smooth;
    }
    </style>

    @if ($errors->any())
        <script language="javascript">
          window.location.href = "/#permohonan-informasi"
        </script>
    @endif

    <title>PPID DISPORA JABAR</title>
  </head>
  <body  id="home" data-bs-spy="scroll" data-bs-target="#navbar-example">
   {{-- Navbar --}}
   <nav id="navbar-example" class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm" style="background-color: white">
    <div class="container ">
      <a class="navbar-brand" href="#home">
        <img src="{{asset('image/frontend/brand-ppid.png')}}" alt="" width="80">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item me-2">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="#tentang-ppid">Tentang PPID</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="#informasi-publik">Informasi Publik</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="#permohonan-informasi">Permohonan Informasi</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
   {{-- End Navbar --}}


    {{-- jumbotron --}}
    <section class="jumbotron bg-light">
      <div class="container mb-5">
        <div class="row">
          <div class="col-9 col-md-9">

            <img src="{{ asset('image/frontend/ppid-banner.png') }}" alt="PPID IMAGE" class="img-fluid" >
          </div>
          <div class="col-3 col-md-3">
            <img src="{{ asset('image/frontend/character-16.svg') }}" alt="PPID IMAGE Ilustration" style="opacity:0.9" >
          </div>
        </div>
      
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L48,53.3C96,75,192,117,288,122.7C384,128,480,96,576,85.3C672,75,768,85,864,101.3C960,117,1056,139,1152,144C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    {{-- end jumbotron --}}

    {{-- section tentang ppid --}}
    <section id="tentang-ppid" class="pt-5rem">
      <div class="container">
        <div class="col-md-6 ">
          <img src="{{ asset('image/frontend/Tentang-ppid.png')}}" alt="tentang-ppid" width="55%">
        </div>
        <div class="row justify-content-center mt-4">
          <div class="col-5 col-md-5">
            <img src="{{ asset('image/frontend/017-drawkit-support-woman-colour.svg') }}" alt="tentang ppid ilustrasi" >
          </div>
          <div class="col-12 col-md-7 text-center">
            <h4>Apa itu PPID?</h4>
            <p><strong>PPID</strong> adalah kepanjangan dari Pejabat Pengelola Informasi dan Dokumentasi, yang berfungsi sebagai pengelola dan penyampai dokumen yang dimiliki oleh Badan Publik sesuai dengan amanat UU 14/2008 tentang Keterbukaan Informasi Publik. Dengan keberadaan PPID maka masyarakat yang akan menyampaikan permohonan informasi lebih mudah dan tidak berbelit karena dilayani lewat satu pintu.</p>
          </div>
        </div>
      </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f8f9fb" fill-opacity="1" d="M0,256L34.3,261.3C68.6,267,137,277,206,266.7C274.3,256,343,224,411,202.7C480,181,549,171,617,160C685.7,149,754,139,823,160C891.4,181,960,235,1029,256C1097.1,277,1166,267,1234,240C1302.9,213,1371,171,1406,149.3L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
    </section>
    {{-- end section tentang ppid --}}

    {{-- section informasi publik --}}
    <section id="informasi-publik" class="pt-5rem bg-light">
    <div class="container "> 
          <div class="row justify-content-end">
          
            <div class="col-md-6 ">
              <img src="{{ asset('image/frontend/informasi-publik.png')}}" class="float-end" alt="informasi-publik" width="70%">
              </div>
          </div>
            <div class="row justify-content-center mt-5">
              <div class=" col-md-3  mb-3">
                <div class="lingkaran bg-warning text-white">

                    <h5 class="card-title pt-5"> <u>Daftar Informasi Publik</u></h5>
                    <h6 class="card-subtitle pt-1">Jumlah : {{ $count['information'] }}</h6>
                    <a href="/information" class="btn btn-sm btn-primary mt-3">Lihat</a>


                </div>
              </div>
             
              <div class=" col-md-3 mb-3 ">
                <div class="lingkaran text-white" style="background-color: #d9544f">
                  <h5 class="card-title pt-5"> <u>Permohonan Informasi Ditolak</u></h5>
                  <h6 class="card-subtitle pt-1">Jumlah : {{ $count['ditolak'] }}</h6>
                  <a href="/information/demand/rejected" class="btn btn-sm btn-primary mt-3 ">Lihat</a>
                </div>
              </div>

            </div>
    
    </div> 
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,186.7C384,192,480,224,576,234.7C672,245,768,235,864,218.7C960,203,1056,181,1152,181.3C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    {{-- end section informasi publik --}}

    {{-- section permohonan informasi --}}
    <section id="permohonan-informasi" class="pt-5rem">
      <div class="container">
        <form action="/demand" method="POST" enctype="multipart/form-data">
          @csrf
          
        
          <div class="col-md-6 ">
            <img src="{{ asset('image/frontend/permohonan-informasi.png')}}"  alt="informasi-publik" width="80%">
          </div>
          <div class="row mt-3">
            @if (session('sukses'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-md-6">
                @csrf
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="nama" class="form-label">Nama lengkap</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama sesuai KTP">
                      @error('nama')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="nik" class="form-label">NIK/No KTP</label>
                      <input type="text" maxlength="16" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="320xxx">
                      @error('nik')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="no_hp" class="form-label">No Hp</label>
                      <input type="text" maxlength="12" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="08xxx">
                      @error('no_hp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@gmail.com">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>


                    <div class="col-12">
                      <label for="Alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="Alamat" name="alamat" placeholder="Alamat tinggal">
                      @error('alamat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-12 mb-3">
                      <label for="gambar_ktp" class="form-label">Foto KTP</label>
                      <input class="form-control @error('gambar_ktp') is-invalid @enderror" type="file" name="gambar_ktp" id="gambar_ktp">
                      <span class="form-text">File berupa foto dan maksimal 2mb</span>
                      @error('gambar_ktp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>

                  
                  </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="permohonan_informasi" class="form-label">Permohonan informasi</label>
                  <textarea class="form-control @error('permohonan_informasi') is-invalid @enderror" name="permohonan_informasi" id="permohonan_informasi" rows="3"></textarea>
                  @error('permohonan_informasi')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tujuan" class="form-label">Tujuan</label>
                  <textarea class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" id="tujuan" rows="3"></textarea>
                  @error('tujuan')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="dapat" class="form-label">Cara mendapatkan</label>
                  <select id="dapat" name="dapat" class="form-select form-select-sm @error('dapat') is-invalid @enderror">
                    <option value="" selected>--Pilih--</option>
                    <option value="Hardcopy">Hardcopy</option>
                    <option value="Softcopy">Softcopy</option>
                  </select>
                  @error('dapat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="beri" class="form-label">Cara memberikan</label>
                  <select id="beri" name="beri" class="form-select form-select-sm @error('beri') is-invalid @enderror">
                    <option value="" selected>--Pilih--</option>
                    <option value="Mengambil langsung">Mengambil langsung</option>
                    <option value="Email">Email</option>
                    <option value="Pos">Pos</option>
                    <option value="Dikirim">Dikirim</option>
                  </select>
                  @error('beri')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>
          </div>
          <div class="col-12 mb-5">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
        
        <div class="d-flex justify-content-center">
         
          <div class="col-md-5 mb-3  mt-5 pt-5">
            @if (session('null'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('null') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/demand/check_demand" method="POST">
              @csrf
              <div class="input-group ">
                <input type="text" class="form-control" name="kode_permohonan" placeholder="Masukkan kode permohonan" aria-label="Masukkan kode permohonan" aria-describedby="btnCekPermohonan">
                <button class="btn btn-success" type="submit" id="btnCekPermohonan">Cek Permohonan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f8f9fb" fill-opacity="1" d="M0,224L48,224C96,224,192,224,288,208C384,192,480,160,576,149.3C672,139,768,149,864,165.3C960,181,1056,203,1152,213.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    {{-- end section permohonan informasi --}}


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

   
  </body>
</html>