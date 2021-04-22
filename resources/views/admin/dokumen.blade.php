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
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    @if(auth()->user()->role == 1 || auth()->user()->role == null)
                                    <th>Aksi</th>
                                    @endif
                                    @if(auth()->user()->role != 1 && auth()->user()->role != null)
                                    <th>Detail</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dokumen as $dok)
                                <tr>
                                    <td>{{ $dok->nama_instansi }}</td>
                                    <td>{{ $dok->email }}</td>
                                    <td>
                                        @if( $dok->kategori == 1 )
                                            <p>Kepabeanan</p>
                                        @elseif( $dok->kategori == 2 )
                                            <p>Cukai</p>
                                        @elseif( $dok->kategori == 3 )
                                            <p>Umum</p>
                                        @endif
                                    </td>
                                    <td>{{ date('d F Y', strtotime($dok->tanggal)) }}</td>
                                    @if(auth()->user()->role == 1 && auth()->user()->role == null)
                                    <td align="center">@if($dok->status == 1)
                                            <button class="btn btn-secondary btn-sm" type="button">Diterima</button>
                                        @elseif($dok->status == 2)
                                            <button class="btn btn-info btn-sm" type="button">Diproses</button>
                                        @elseif($dok->status == 3)
                                            <button class="btn btn-success btn-sm" type="button">Selesai</button>
                                        @endif
                                    </td>
                                    @endif
                                    @if(auth()->user()->role != 1 && auth()->user()->role != null)
                                    <td align="center">
                                        <a href="{{ url('/admin/approve/'.$dok->id_dokumen) }}" class="text-primary mr-2">
                                            <button type="button" class="btn btn-sm btn-info" onclick="return confirm('Apakah anda yakin akan mengapprove dokumen?')">APPROVE</button>
                                        </a>
                                        <a href="#reject-{{$dok->id_dokumen}}" class="text-primary mr-2" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-danger">REJECT</button>
                                        </a>
                                    </td>
                                    @endif
                                    <td align="center" style="width: 20%">
                                        @if(auth()->user()->role == null && $dok->id_dokumen_selesai == null)
                                        <!-- <a href="#status-{{$dok->id_dokumen}}" class="text-primary mr-2" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-success">STATUS</button>
                                        </a> -->
                                        <!-- <a href="#reject-{{$dok->id_dokumen}}" class="text-primary mr-2" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-danger">REJECT</button>
                                        </a> -->
                                        @endif
                                        
                                        <a href="{{ route('detail.dokumen', $dok->id_dokumen) }}" class="text-danger">
                                            <button type="button" class="btn btn-sm btn-primary">DETAIL</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Nama Instansi</th>
                                    <th>Email</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    @if(auth()->user()->role == 1 || auth()->user()->role == null)
                                    <th>Aksi</th>
                                    @endif
                                    @if(auth()->user()->role != 1 && auth()->user()->role != null)
                                    <th>Detail</th>
                                    @endif
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
@foreach($dokumen as $dok)
<div class="modal small fade" id="reject-{{$dok->id_dokumen}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('reject.status', $dok->id_dokumen) }}" method="post">
            {{csrf_field()}}
            @method('patch')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Dokumen Reject</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </div>
                <div class="modal-body modal-body-upload">
                    <div class="form-group col-12">
                        <textarea name="alasan" id="" cols="30" rows="10" class="ckeditor form-control" placeholder="Isikan Alasan" required></textarea>
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
@endforeach
<!-- End Modal Status Data -->

<!-- Modal Dokumen Reject -->
@foreach($dokumen as $dok)
<div class="modal small fade" id="status-{{$dok->id_dokumen}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('update.status', $dok->id_dokumen) }}" method="post">
            {{csrf_field()}}
            @method('patch')
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Ganti Status</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

                </div>
                <div class="modal-body modal-body-upload">
                    <div class="form-group col-12">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" readonly value="{{$dok->subject}}">
                    </div>
                    <div class="form-group col-12">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option selected disabled>Pilih Status</option>
                            <option value="1">Diterima</option>
                            <option value="2">Diproses</option>
                            <option value="3">Selesai</option>
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
@endforeach
<!-- End Modal Dokumen Reject -->
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