@extends('admin.layouts.master')
@section('title','Detail Document')
@section('page-title', 'Detail Document')
@section('style')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('page')
<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ url('/dokumen') }}">Document</a></li>
<li class="breadcrumb-item active">Detail Document</li>
@endsection

@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Gudang Garam</h3>
                            <a href="#upload" class="text-danger" data-toggle="modal">
                                <button type="button" class="btn btn-sm btn-primary">Upload</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td align="center" style="width: 20%">
                                        <a href="{{url('/download/dokumen')}}" class="text-danger">
                                            <button type="button" class="btn btn-sm btn-success">DOWNLOAD</button>
                                        </a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Dokumen</th>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Dokumen Selesai</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td></td>
                                    <td align="center" style="width: 20%">
                                        <a href="#update" class="text-danger" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-warning">UPDATE</button>
                                        </a>
                                        <a href="#hapus" class="text-danger">
                                            <button type="button" class="btn btn-sm btn-danger">HAPUS</button>
                                        </a>
                                    </td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Dokumen</th>
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
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Upload Data-->
<div class="modal small fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/dokumen/upload-balasan')}}" method="post">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Ganti Status</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

                </div>
                <div class="modal-body modal-body-upload">
                    <button type="button" class="btn btn-sm btn-outline-primary" style="float: right" id="tambah"><i class="fas fa-plus"> Tambah</i></button>
                    <br>
                    <div class="form-group col-12">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" readonly value="Subject">
                    </div>
                    <div class="form-group col-12">
                        <input type="hidden" value="1" id="no">
                        <label id="label-upload">File Dokumen</label>
                        <input type="file" name="file[]" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer modal-footer-upload">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> 
                    <button type="submit" class="btn btn-primary"  id="modalDelete">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Upload Data -->

<!-- Modal Delete Data-->
<div class="modal small fade" id="status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/dokumen/status')}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Status</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

                </div>
                <div class="modal-body">
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
<!-- End Modal Delete Data -->
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

        $('#tambah').on('click', function(){
            let no = document.getElementById('no').value;
            document.getElementById('label-upload').innerHTML = "File Dokumen 1";
            no++;

            let el = '<div class="form-group col-12">'+
                        '<label>File Dokumen '+no+'</label>'+
                        '<input type="file" class="form-control" name="file[]" required>'+
                        '</div>';

            let footer = '<div class="modal-footer modal-footer-upload">'+
                            '<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>'+
                            '<button type="submit" class="btn btn-primary"  id="modalDelete">Simpan</a>'+
                        '</div>';
            
            $('.modal-footer-upload').remove();
            $('.modal-body-upload').append(el,footer);
            document.getElementById('no').value = no;
        });
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