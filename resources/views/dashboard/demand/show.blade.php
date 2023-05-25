@extends('dashboard.layout.main')

@section('title','Dashboard | Detail Permohonan Informasi')
@section('page-header','Detail Permohonan Informasi')

@section('css')
<link href="{!! asset('css/style.css') !!}" rel="stylesheet">
<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />
@endsection

@section('font')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@500&display=swap" rel="stylesheet">
@endsection

@section('konten')
<div class="row " style="margin-bottom: 3rem">
    <div class="col-lg-5">
        <div class="panel-heading bg-primary" style="margin-bottom: 10px; padding-bottom:0 ; border-radius:5px">
            <table  class="table  epilogue" style="margin-bottom: 2px">
                <thead>

                    <tr>
                        <td style="width: 40%;">Kode Permohonan</td>
                        <td style="width:1%">:</td>
                        <td>
                            {{ $demand->kode_permohonan }}
                        </td>
                    </tr>
                </thead>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>
                       {{ $demand->created_at->format('d/m/Y')}}
                    </td>
                </tr>
               

                
            </table>
        </div>
        <div class="panel panel-primary" >
            <div class="panel-heading ">
                <b>Data Pemohon</b>
            </div>
            <div class="panel-body">
                <table style="border:none" class="table epilogue">
                  <thead>

                      <tr>
                        <td style="width: 25%; font-weight:bold">Nama</th>
                        <td style="width:5%">:</td>
                        <td>
                            {{ $demand->nama }}
                        </td>
                    </tr>
                </thead>

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
    <div class="col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading ">
                <b>Data Permohonan</b>
            </div>
            <div class="panel-body">
                @if (session('sukses'))
                    
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('sukses') }}
                </div>
                @endif
                <table style="margin-bottom:50px" class="table epilogue" >
                  
                    <thead>

                        <tr>
                          <td style="width: 25%; font-weight:bold">Permohonan Informasi</th>
                          <td style="width: 5%">:</td>
                          <td>
                              {{ $demand->permohonan_informasi }}
                          </td>
                      </tr>
                  </thead>
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
                    <form action="/dashboard/demand/process/{{ $demand->kode_permohonan }}" method="POST">
                        @csrf
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td>
                            @if ($demand->status == 'Belum diproses')
                                <span class="blm-diproses data">{{ $demand->status }}</span>
                            @elseif($demand->status == 'Diterima')
                                <span class="diterima data">{{ $demand->status }}</span>
                            @else
                                <span class="ditolak data">{{ $demand->status }}</span>
                            @endif
                           <div class="form-group hidden @error('status') has-error has-feedback @enderror" style="margin-bottom: 0">
                            <select name="status" id="status" class="form-control ">
                                <option value="Belum diproses" {{ old('status', $demand->status) == 'Belum diproses' ? ' selected' : ' ' }}>Belum diproses</option>
                                <option value="Diterima" {{ old('status', $demand->status) == 'Diterima' ? ' selected' : ' ' }}>Diterima</option>
                                <option value="Ditolak" {{ old('status', $demand->status) == 'Ditolak' ? ' selected' : ' ' }}>Ditolak</option>
                            </select>
                            @error('status')
                            <span class="glyphicon glyphicon-warning-sign form-control-feedback" style="padding-right: 15px" aria-hidden="true"></span>
                            <span class="sr-only">(error)</span>
                            @enderror
                            @error('status')
                              <div class="text-danger">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>:</td>
                        <td>
                           <span class="data">{{ $demand->keterangan }}</span>
                           <div class="form-group hidden @error('keterangan') has-error has-feedback @enderror" style="margin-bottom:0">
                                <textarea name="keterangan" id="keterangan" class="form-control " rows="3" required>{{ old('keterangan', $demand->keterangan) }}</textarea>
                                @error('keterangan')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('keterangan')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </td>
                    </tr>

                    
                </table>

                <div style="display: inline-flex">

                    <button type="button" class="btn btn-primary btn-proses">Proses permohonan</button>
                    <button type="submit" class="btn btn-primary btn-simpan hidden">Simpan</button>
                    <button type="button" class="btn btn-danger btn-batal hidden"  style="margin-left: 7px; ">Batal</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script src="{!! asset('js/proses-demand.js') !!}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection


