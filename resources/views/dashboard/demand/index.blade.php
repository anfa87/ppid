@extends('dashboard.layout.main')

@section('title','Dashboard | Permohonan Informasi')
@section('page-header','Permohonan Informasi')


@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

    

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('konten')

<div class="row">

    
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Permohonan Informasi
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#buatLaporan" style="float:right; margin-top:-5px" >Buat laporan</button>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @if (session('sukses'))
                    
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('sukses') }}
                </div>
                @endif
                @if (session('gagal'))
                    
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('gagal') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Kode Permohonan</th>
                                <th>Tanggal</th>
                                <th>NIK/No KTP</th>
                                <th>Permohonan Informasi</th>
                                <th>Status</th>
                                <th>Diproses Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demands as $demand)
                            <tr>
                                <td>{{ $demand->kode_permohonan }}</td>
                                <td>{{ $demand->created_at->format('d/m/Y') }}</td>
                                <td>{{ $demand->nik }}</td>
                                <td>{{ $demand->permohonan_informasi }}</td>
                                <td>
                                    @if ($demand->status == 'Belum diproses')
                                        <span class="blm-diproses">{{ $demand->status }}</span>
                                    @elseif($demand->status == 'Diterima')
                                        <span class="diterima">{{ $demand->status }}</span>
                                    @else
                                        <span class="ditolak">{{ $demand->status }}</span>
                                    @endif
                                  
                                </td>
                                <td>{{ $demand->user == null ? '-' : $demand->user->name }}</td>
                                <td>
                                    <a href="/dashboard/demand/{{ $demand->kode_permohonan }}" class="btn btn-sm btn-circle btn-info" style="margin-bottom: 5px"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <form action="/dashboard/demand/{{ $demand->kode_permohonan }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-circle btn-danger mb-1" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>

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

<!-- Modal Tahun -->
<div class="modal fade" id="buatLaporan"  data-keyboard="false" tabindex="-1" aria-labelledby="tambahDivisiStatic" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <form action="/dashboard/demand/report" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="tambahDivisiStatic">Buat laporan pertahun</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    
                    <div class="form-group @error('nama_divisi') has-error has-feedback @enderror">
                      <label for="tahun" class="form-label">Tahun</label>
                      <input type="number" maxlength="4" class="form-control " id="nama_divisi" name="tahun" autofocus value="{{ old('tahun') }}" required>
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
                    <button type="submit" id="button" class="btn btn-success">Buat</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
              responsive: 'true',
              ordering: 'false',

        });
    });
        
   
</script>
@endsection