@extends('dashboard.layout.main')

@section('title','Dashboard | Informasi Publik')


@section('page-header','Informasi Publik')



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
                Data Informasi Publik
                <a href="/dashboard/information/create" class="btn btn-sm btn-primary" style="float:right; margin-top:-5px" >Tambah</a>
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
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Jenis Informasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($information as $inf)
                            <tr>
                                <td>{{ $inf->judul }}</td>
                                <td>{{ $inf->tanggal }}</td>
                                <td>{{ $inf->jenis_informasi }}</td>
                                <td>{{ $inf->status }}</td>
                                <td>
                                    <a href="/dashboard/information/{{ $inf->slug }}" class="btn btn-sm btn-circle btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <form action="/dashboard/information/{{ $inf->slug }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-circle btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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