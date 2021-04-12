@extends('admin.layouts.master')
@section('page-title','Dashboard')
@section('title','Dashboard')
@section('style')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row justify-content-between">
            <div class="col-md-2 col-sm-6 col-12">
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Messages</span>
                    <span class="info-box-number">1,410</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$data[1]}}</h3>

                        <p>Dokumen Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$data[2]}}</h3>

                        <p>Dokumen Diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$data[3]}}</h3>

                        <p>Dokumen Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <section class="col-lg-12 connectedSortable ui-sortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                <div class="card-header ui-sortable-handle bg-primary" style="cursor: move;">
                    <h3 class="card-title">
                    <i class="fas fa-file mr-1"></i>
                    Dokumen
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Nama Instansi</th>
                                    <th>Subject</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data[0] as $dok)
                                <tr>
                                    <td>{{ $dok->nama_instansi }}</td>
                                    <td>{{ $dok->subject }}</td>
                                    <td>{{ date('d F Y', strtotime($dok->tanggal)) }}</td>
                                    <td align="center">@if($dok->status == 1)
                                            Diterima
                                        @elseif($dok->status == 2)
                                            Diproses
                                        @elseif($dok->status == 3)
                                            Selesai
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

  @endsection

@section('script')

<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#dashboard').addClass('active');
        });
        $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
    </script>

@endsection