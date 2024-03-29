@extends('admin.layouts.master')
@section('title','Detail Document')

@section('style')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$dokumen->nama_instansi}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/dokumen') }}">Document</a></li>
                <li class="breadcrumb-item active">Detail Document</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Dokumen Diterima</h3>
                            @if($dokumen->status != 3 && $dokumen->approve == 1)
                            <a href="#upload" class="text-danger" data-toggle="modal">
                                <button type="button" class="btn btn-sm btn-primary">Upload</button>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Preview</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_dokumen as $dd)
                                <tr>
                                    <td>{{$dd->file}}</td>
                                    <td align="center" style="width:10%">
                                    <a href="#preview-{{$dd->id_detail_dokumen}}" class="text-danger" data-toggle="modal">
                                        <button type="button" class="btn btn-sm btn-primary">PREVIEW</button>
                                    </a>
                                        <!-- <iframe src="{{url('/preview/'.$dd->id_detail_dokumen)}}" width="600" heigth="400">Preview</iframe> -->
                                    </td>
                                    <td align="center" style="width: 20%">
                                        <a href="{{url('/download/dokumen/'.$dd->id_detail_dokumen)}}" class="text-danger">
                                            <button type="button" class="btn btn-sm btn-success">DOWNLOAD</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Preview</th>
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
    @if($data != null)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Dokumen Balasan</h3>
                            @if($dokumen->status != 3)
                            <a href="#kirim" class="text-danger" data-toggle="modal">
                                <button type="button" class="btn btn-sm btn-primary">KIRIM</button>
                            </a>
                            @endif
                        </div>
                        @if(session('status'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="selesai" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    @if($dokumen->status != 3)
                                    <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dokumen_selesai as $ds)
                                <tr>
                                    <td>{{$ds->file}}</td>
                                    <td>{{date('d F Y', strtotime($ds->tanggal))}}</td>
                                    <td>{{$ds->author}}</td>
                                    @if($dokumen->status != 3)
                                    <td align="center" style="width: 20%">
                                        <a href="#update-{{$ds->id_dokumen_selesai}}" class="text-warning" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-warning">UPDATE</button>
                                        </a>
                                        <a href="#hapus-{{$ds->id_dokumen_selesai}}" class="text-danger" data-toggle="modal">
                                            <button type="button" class="btn btn-sm btn-danger">HAPUS</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Dokumen</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    @if($dokumen->status != 3)
                                    <th>Aksi</th>
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
    @endif
    </div><!-- /.container-fluid -->
</section>

<!-- Modal Upload Data-->
<div class="modal small fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/dokumen/upload-balasan')}}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="user" value="{{auth()->user()->nama}}">
                <input type="hidden" name="id" value="{{$dokumen->id_dokumen}}">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Upload Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </div>
                <div class="modal-body modal-body-upload">
                    <button type="button" class="btn btn-sm btn-outline-primary" style="float: right" id="tambah"><i class="fas fa-plus"> Tambah</i></button>
                    <br>
                    <div class="form-group col-12">
                        <label>Subject</label>
                        @php
                            if($dokumen->kategori == 1){
                                $subject = "Kepabeanan";
                            }
                            else if($dokumen->kategori == 2){
                                $subject = "Cukai";
                            }
                            else if($dokumen->kategori == 3){
                                $subject = "Umum";
                            }
                        @endphp
                        <input type="text" class="form-control" readonly value="{{$subject}}">
                    </div>
                    <div class="form-group col-12">
                        <input type="hidden" value="1" id="no">
                        <label id="label-upload">File Dokumen</label>
                        <input type="file" name="file[]" class="form-control" accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx" required><br>
                        <small>format: .doc, .docx, .pdf .jpg, .jpeg, .xls, .xlsx</small>
                    </div>
                    <div class="file"></div>
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

<!-- Modal Preview -->
@foreach($detail_dokumen as $dd)
<div class="modal fade show" id="preview-{{$dd->id_detail_dokumen}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Preview {{$dd->file}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </div>
                <div class="modal-body" style="height:600px">
                    <embed src="{{url('/preview/'.$dd->id_detail_dokumen)}}" style="height:100%" width="100%" heigth="100%"></embed>
                </div>

                <!-- <div class="modal-footer modal-footer-upload">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> 
                    <button type="submit" class="btn btn-primary"  id="modalDelete">Simpan</a>
                </div> -->
        </div>
    </div>
</div>
<!-- End Modal Preview -->
@endforeach
@foreach($dokumen_selesai as $ds)
<!-- Modal Update Data-->
<div class="modal small fade" id="update-{{$ds->id_dokumen_selesai}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/dokumen/edit-balasan')}}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$ds->id_dokumen_selesai}}">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Update Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

                </div>
                <div class="modal-body modal-body-upload">
                    <div class="form-group col-12">
                        <label>Dokumen Sebelumnya</label>
                        <input type="text" class="form-control" name="old" readonly value="{{$ds->file}}">
                    </div>
                    <div class="form-group col-12">
                        <input type="hidden" value="1" id="no">
                        <label id="label-upload">Dokumen Baru</label>
                        <input type="file" name="file" class="form-control" accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx" required><br>
                        <small>format: .doc, .docx, .pdf .jpg, .jpeg, .xls, .xlsx</small>
                    </div>
                </div>
                <div class="file"></div>
                <div class="modal-footer modal-footer-upload">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> 
                    <button type="submit" class="btn btn-primary">Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Update Data -->
@endforeach
@foreach($dokumen_selesai as $ds)
<!-- Modal Delete Data-->
<div class="modal small fade" id="hapus-{{$ds->id_dokumen_selesai}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('/dokumen/delete-balasan/'.$ds->id_dokumen_selesai)}}" method="get">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Hapus Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus dokumen "{{$ds->file}}" ?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button> 
                    <button type="submit" class="btn btn-primary"  id="modalDelete">Ya</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Delete Data -->
@endforeach
@foreach($dokumen_selesai as $ds)
<!-- Modal Kirim Dokumen -->
<div class="modal small fade" id="kirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{url('/dokumen/notifemail/'.$dokumen->id_dokumen), $dokumen->id_dokumen}}" method="get">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Kirim Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin mengirim dokumen ke email {{$dokumen->email}} ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button> 
                <button type="submit" class="btn btn-primary" >Ya</button>        
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
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
                        '<input type="file" name="file[]" accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx" required><br>'+
                        '<small>format: .doc, .docx, .pdf .jpg, .jpeg, .xls, .xlsx</small>'+
                        '</div>';
            $('.file').append(el);
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

      $("#selesai").DataTable({
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