@extends('admin.layouts.master')
@section('title','Document')
@section('page-title', 'Document')
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Nama Instansi</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="center" style="width: 20%">
                                        <a href="#status" class="text-primary mr-2" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-success">STATUS</button>
                                        </a>
                                        <a href="{{ url('/detail') }}" class="text-danger">
                                            <button type="button" class="btn btn-sm btn-primary">DETAIL</button>
                                        </a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Nama Instansi</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
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

<!-- Modal Status Data-->
<div class="modal small fade" id="status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/dokumen/status')}}" method="post">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Ganti Status</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

                </div>
                <div class="modal-body modal-body-upload">
                    <div class="form-group col-12">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" readonly value="Subject">
                    </div>
                    <div class="form-group col-12">
                        <label>Status</label>
                        <select class="form-control">
                            <option value="">Diterima</option>
                            <option value="">Diproses</option>
                            <option value="">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> 
                    <button type="submit" class="btn btn-primary"  id="modalDelete">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Status Data -->
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
        $('#dokumen').addClass('active');

        
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