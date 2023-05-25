@extends('dashboard.layout.main')

@section('title','Dashboard | Data Users')

@section('page-header','Data Users')


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
                Data Users
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="/dashboard/users/status/update/{{ $user->username }}" method="post">
                                      
                                        @csrf
                                        <select class="form-control form-select-status" name="status" onchange="this.form.submit();">
                                            <option value="unverified" {{ $user->status == 'unverified' ? ' selected' : ' ' }}>Unverified</option>
                                            <option value="admin" {{ $user->status == 'admin' ? ' selected' : ' ' }}>Admin</option>
                                            <option value="superadmin" {{ $user->status == 'superadmin' ? ' selected' : ' ' }}>Superadmin</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form action="/dashboard/users/{{ $user->username }}" method="POST" style="display: inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-circle btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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