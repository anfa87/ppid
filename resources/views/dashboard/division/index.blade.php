@extends('dashboard.layout.main')

@section('title','Dashboard | Data Bidang')

@section('page-header','Data Bidang')


@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

@endsection

@section('konten')

<div class="row">

    
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Bidang Dispora
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahDivisi" style="float:right; margin-top:-5px" >Tambah</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @if (session('sukses'))
                    
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('sukses') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Kode Bidang</th>
                                <th>Nama Bidang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                            <tr>
                                <td>{{ $division->kode_divisi }}</td>
                                <td>{{ $division->nama_divisi }}</td>
                                <td>
                                    <form action="/dashboard/division/{{ $division->kode_divisi }}" method="POST" style="display: inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-circle btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                    <button class="btn btn-circle btn-success" data-toggle="modal" data-target="#editDivisi{{ $division->kode_divisi }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade " id="editDivisi{{ $division->kode_divisi }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editDivisiStatic" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/dashboard/division/{{ $division->kode_divisi }}" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h5 class="modal-title" id="editDivisiStatic">Edit Bidang</h5>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group @error('kode_divisi') has-error has-feedback @enderror">
                                                    <label for="kode_divisi" class="form-label">Kode Bidang</label>
                                                    <input type="text" class="form-control" id="kode_divisi" name="kode_divisi" value="{{ $division->kode_divisi }}" readonly required>
                                                    @error('kode_divisi')
                                                    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                                    <span id="namaDivisiError" class="sr-only">(error)</span>
                                                    @enderror
                                                    @error('kode_divisi')
                                                      <div class="text-danger">
                                                          {{ $message }}
                                                      </div>
                                                    @enderror
                                                  </div>
                                                <div class="form-group @error('nama_divisi') has-error has-feedback @enderror">
                                                  <label for="nama_divisi" class="form-label">Nama Bidang</label>
                                                  <input type="text" class="form-control " id="nama_divisi" name="nama_divisi" aria-describedby="namaDivisiError" autofocus value="{{ $division->nama_divisi }}">
                                                  @error('nama_divisi')
                                                  <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                                  <span id="namaDivisiError" class="sr-only">(error)</span>
                                                  @enderror
                                                  @error('nama_divisi')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                  @enderror
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" id="button" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahDivisi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="tambahDivisiStatic" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/dashboard/division" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="tambahDivisiStatic">Tambah Bidang</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group @error('kode_divisi') has-error has-feedback @enderror"">
                        <label for="kode_divisi" class="form-label">Kode Bidang</label>
                        <input type="text" class="form-control" id="kode_divisi" name="kode_divisi" value="{{ $kode_divisi }}" readonly required>
                        @error('kode_divisi')
                        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                        <span id="kodeDivisiError" class="sr-only">(error)</span>
                          <div class="text-danger">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    <div class="form-group @error('nama_divisi') has-error has-feedback @enderror">
                      <label for="nama_divisi" class="form-label">Nama Bidang</label>
                      <input type="text" class="form-control " id="nama_divisi" name="nama_divisi" aria-describedby="namaDivisiError" autofocus value="{{ old('nama_divisi') }}">
                      @error('nama_divisi')
                      <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span id="namaDivisiError" class="sr-only">(error)</span>
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="button" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('javascript')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables/dataTables.bootstrap.min.js') }}"></script>
@endsection

@section('javascript2')
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>
@endsection