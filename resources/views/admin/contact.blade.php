@extends('admin.layouts.master')
@section('title','Contact')
@section('page-title', 'Contact')
@section('style')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('page')
<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Document</li>
@endsection

@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <a href="#tambah" data-toggle="modal">
                            <button class="btn btn-primary">Tambah Data</button>
                        </a>
                    </div> -->
                    <div class="card-body">
                        <p style="font-weight: bold">
                            KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br>

                            DIREKTORAT JENDERAL BEA DAN CUKAI<br>

                            KANTOR WILAYAH DJBC JAWA TIMUR II<br>

                            KPPBC TIPE MADYA CUKAI KEDIRI
                        </p>
                        <p>Alamat : Jl. Diponegoro No.23 Kota Kediri 64123</p>
                        <p>No Telp : +6281133355511</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('script')
<script src="{{ asset('/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
@endsection