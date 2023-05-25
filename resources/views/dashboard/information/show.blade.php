@extends('dashboard.layout.main')

@section('title','Dashboard | Detail Informasi Publik')

@section('page-header','Detail Informasi Publik')

@section('css')
<link href="{!! asset('css/style.css') !!}" rel="stylesheet">
@endsection

@section('font')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@500&display=swap" rel="stylesheet">
@endsection

@section('konten')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail
            </div>
            <div class="panel-body">
                @if (session('sukses'))
                    
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('sukses') }}
                </div>
                @endif
                <table class="table table-bordered table-hover epilogue">
                    <form action="/dashboard/information/{{ $inf->slug }}" method="POST" id="form-edit">
                        @csrf
                        @method('PUT')
                    <tr>
                        <th style="width: 30%">Judul</th>
                        <td>
                            <span class="data">{{ $inf->judul }}</span>
                            <div class="form-group hidden @error('judul') has-error has-feedback @enderror" style="margin-bottom:0">
                                <input name="judul" id="judul" class="form-control " value="{{ old('judul', $inf->judul) }}">
                                @error('judul')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('judul')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            <span class="data">{{ $inf->deskripsi }}</span>
                            <div class="form-group hidden @error('deskripsi') has-error has-feedback @enderror" style="margin-bottom:0">
                                <textarea name="deskripsi" id="deskripsi" class="form-control " rows="3">{{ old('deskripsi', $inf->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('deskripsi')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>
                            <span class="data">{{ $inf->tanggal }}</span>
                            <div class="form-group hidden @error('tanggal') has-error has-feedback @enderror" style="margin-bottom:0">
                                <input name="tanggal" type="date" id="tanggal" class="form-control " value="{{ old('tanggal', $inf->tanggal) }}">
                                @error('tanggal')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('tanggal')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                    </tr>
                    <tr>
                        <th>Bidang</th>
                        <td>
                            <span class="data">{{ $inf->division_id == null ? '-' : $inf->division->nama_divisi  }}</span>
                            <div class="form-group hidden @error('division_id') has-error has-feedback @enderror" style="margin-bottom:0">
                                <select name="division_id" id="division_id" class="form-control ">
                                    <option value="" {{ old('division_id', $inf->division_id) < 0 ? ' selected' : ' ' }}>--Pilih--</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ old('division_id', $inf->division_id) == $division->id ? ' selected' : ' ' }}>{{ $division->nama_divisi }}</option>
                                    @endforeach
                                </select>
                                @error('division_id')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" style="padding-right: 15px" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('division_id')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Jenis Informasi</th>
                        <td>
                            <span class="data">{{ $inf->jenis_informasi }}</span>
                            <div class="form-group hidden @error('jenis_informasi') has-error has-feedback @enderror" style="margin-bottom:0">
                                <select name="jenis_informasi" id="jenis_informasi" class="form-control">
                                    <option value="" {{ old('jenis_informasi') != "Berkala" || "Setiap Saat" || "Serta Merta" || "Dikecualikan" ? ' selected' : ' ' }}>--Pilih--</option>
                                    <option value="Berkala" {{ old('jenis_informasi',$inf->jenis_informasi) == "Berkala" ? ' selected' : ' ' }}>Berkala</option>
                                    <option value="Setiap Saat" {{ old('jenis_informasi',$inf->jenis_informasi) == "Setiap Saat" ? ' selected' : ' ' }}>Setiap Saat</option>
                                    <option value="Serta Merta" {{ old('jenis_informasi',$inf->jenis_informasi) == "Serta Merta" ? ' selected' : ' ' }}>Serta Merta</option>
                                    <option value="Dikecualikan" {{ old('jenis_informasi',$inf->jenis_informasi) == "Dikecualikan" ? ' selected' : ' ' }}>Dikecualikan</option>
                                </select>
                                @error('jenis_informasi')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" style="padding-right: 15px" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('jenis_informasi')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Penanggung Jawab/ Penerbit Informasi</th>
                        <td>
                            <span class="data">{{ $inf->penerbit_informasi }}</span>
                            <div class="form-group hidden @error('penerbit_informasi') has-error has-feedback @enderror" style="margin-bottom:0">
                                <input name="penerbit_informasi" id="penerbit_informasi" class="form-control" value="{{ old('penerbit_informasi', $inf->penerbit_informasi) }}">
                                @error('penerbit_informasi')
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                                <span class="sr-only">(error)</span>
                                @enderror
                                @error('penerbit_informasi')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="data">{{ $inf->status }}</span>
                            <div class="form-group hidden @error('status') has-error has-feedback @enderror" style="margin-bottom:0">
                                <select name="status" id="status" class="form-control">
                                    <option value="" {{ old('status') != "Draf" || "Publik"  ? ' selected' : ' ' }}>--Pilih--</option>
                                    <option value="Draf" {{ old('status',$inf->status) == "Draf" ? ' selected' : ' ' }}>Draf</option>
                                    <option value="Publik" {{ old('status',$inf->status) == "Publik" ? ' selected' : ' ' }}>Publik</option>
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
                </form>

                    <tr>
                        <th>File</th>
                        <td>
                            @foreach ($inf->files as $file)
                            
                            
                            <form action="/dashboard/information/file/{{ $file->nama_file }}" method="post" class="d-inline-f">
                                @csrf
                                
                                <a href="/dashboard/preview/{{$file->nama_file}}" target='_blank' style="font-size: 40px; margin-left:5px; margin-top:2px"><i class="fa fa-file-pdf-o" style="color: red" aria-hidden="true"></i></a>  
                                <button class="btn-minus hidden"  onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                                @endforeach
                                <button type="button" class="btn btn-sm hidden  btn-success btn-tambah-file" style="height: 30px;margin-top:15px; margin-left:15px;" data-toggle="modal" data-target="#tambahFile"><i class="fa fa-plus"  aria-hidden="true"></i>  File</button>
                            </form>        
                        </td>
                    </tr>
                </table>

                <div style="display: inline-flex">

                    <button type="button" class="btn btn-success btn-edit">Edit</button>
                    <button type="button" class="btn btn-primary btn-simpan hidden">Simpan</button>
                    <button type="button" class="btn btn-danger btn-batal hidden"  style="margin-left: 7px; ">Batal</button>
                </div>
            </div>
            <!-- Modal Tambah File-->
            <div class="modal fade" id="tambahFile" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="tambahFileStatic" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/information/file/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="information_id" value="{{ $inf->id }}">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="tambahFileStatic"><b>Upload berkas</b></h5>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div id="dynamic_form">

                                    <div class="form-group baru-data" style="margin-top:10px" >
                                        <div class="row">
                                            <div class="col-xs-7 col-lg-7">
                                                <input class="form-file" type="file" name="file[]" id="file" value="{{ old('nama_file') }}" multiple>
                                                <ul>
                                                    <li class="text-muted"><small>Berkas berupa file .pdf</small></li>
                                                    <li class="text-muted"><small>Dapat langsung upload lebih dari 1 berkas</small></li>
                                                    <li class="text-muted"><small>Ukuran tiap berkas maksimal 2mb</small></li>
                                                </ul>
                                                @error('file.*')
                                                  <div class="text-danger">
                                                      {{ $message }}
                                                  </div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" id="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="{!! asset('js/edit-information.js') !!}"></script>

@endsection