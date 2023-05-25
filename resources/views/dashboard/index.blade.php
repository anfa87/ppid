@extends('dashboard.layout.main')


@section('title','Dashboard')

@section('page-header','Dashboard')



@section('konten')

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-files-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $count['information'] }}</div>
                        <div>Informasi Publik</div>
                    </div>
                </div>
            </div>
            <a href="/dashboard/information">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Selengkapnya</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bell fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $count['masuk'] }}</div>
                        <div>Permohonan Masuk</div>
                    </div>
                </div>
            </div>
            <a href="/dashboard/demand/status/belum diproses">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Selengkapnya</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $count['diterima'] }}</div>
                        <div>Permohonan Diterima</div>
                    </div>
                </div>
            </div>
            <a href="/dashboard/demand/status/diterima">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Selengkapnya</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-times fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $count['ditolak'] }}</div>
                        <div>Permohonan Ditolak</div>
                    </div>
                </div>
            </div>
            <a href="/dashboard/demand/status/ditolak">
                <div class="panel-footer">
                    <span class="pull-left">Lihat Selengkapnya</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

@endsection
