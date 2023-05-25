@extends('dashboard.layout.main')

@section('title','Dashboard | Tambah Informasi Publik')
@section('page-header','Tambah Informasi Publik')

@section('css')
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
@endsection

@section('konten')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Tambah Informasi Publik
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="/dashboard/information" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6">
                            <div class="form-group @error('judul') has-error has-feedback @enderror">
                                <label for="judul">Judul</label>
                                <input name="judul" id="judul" class="form-control" value="{{ old('judul') }}">
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
                            <div class="form-group @error('deskripsi') has-error has-feedback @enderror">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
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

                            <div class="form-group @error('tanggal') has-error has-feedback @enderror">
                                <label for="tanggal">Tanggal</label>
                                <input name="tanggal" type="date" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
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

                            <div id="dynamic_form">

                                <div class="form-group  baru-data">
                                    <label for="file" >Upload Berkas</label>
                                    <div class="row">
                                        <div class="col-xs-7 col-lg-7">
                                            <input class="form-file" type="file" name="file[]" id="file"  multiple >
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
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="form-group @error('division_id') has-error has-feedback @enderror">
                                <label for="division_id">Bidang</label>
                                <select name="division_id" id="division_id" class="form-control">
                                    <option value="" {{ old('division_id') < 0 ? ' selected' : ' ' }}>--Pilih--</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? ' selected' : ' ' }}>{{ $division->nama_divisi }}</option>
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
                            <div class="form-group @error('jenis_informasi') has-error has-feedback @enderror">
                                <label for="jenis_informasi">Jenis Informasi</label>
                                <select name="jenis_informasi" id="jenis_informasi" class="form-control">
                                    <option value="" {{ old('jenis_informasi') != "Berkala" || "Setiap Saat" || "Serta Merta" || "Dikecualikan" ? ' selected' : ' ' }}>--Pilih--</option>
                                    <option value="Berkala" {{ old('jenis_informasi') == "Berkala" ? ' selected' : ' ' }}>Berkala</option>
                                    <option value="Setiap Saat" {{ old('jenis_informasi') == "Setiap Saat" ? ' selected' : ' ' }}>Setiap Saat</option>
                                    <option value="Serta Merta" {{ old('jenis_informasi') == "Serta Merta" ? ' selected' : ' ' }}>Serta Merta</option>
                                    <option value="Dikecualikan" {{ old('jenis_informasi') == "Dikecualikan" ? ' selected' : ' ' }}>Dikecualikan</option>
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
                            
                            <div class="form-group @error('penerbit_informasi') has-error has-feedback @enderror">
                                <label for="penerbit_informasi">Penanggung Jawab/ Penerbit Informasi</label>
                                <input name="penerbit_informasi" id="penerbit_informasi" class="form-control" value="{{ old('penerbit_informasi') }}">
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

                            <div class="form-group @error('status') has-error has-feedback @enderror">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" {{ old('status') != "Draf" || "Publik"  ? ' selected' : ' ' }}>--Pilih--</option>
                                    <option value="Draf" {{ old('status') == "Draf" ? ' selected' : ' ' }}>Draf</option>
                                    <option value="Publik" {{ old('status') == "Publik" ? ' selected' : ' ' }}>Publik</option>
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
                            
                        </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-12">

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection