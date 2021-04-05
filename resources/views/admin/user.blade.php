@extends('admin.layouts.master')
@section('title','User')
@section('page-title', 'User')
@section('style')
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('page')
<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
<li class="breadcrumb-item active">User</li>
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
                        <a href="#tambah" data-toggle="modal">
                            <button class="btn btn-sm btn-outline-primary" style="float:right"><i class="fas fa-plus"> Tambah</i></button>
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                @foreach($user as $usr)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->jabatan->nama_jabatan }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td align="center" style="width: 20%">
                                        <form action="#" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">
                                                DELETE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
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

<!-- Modal Add USer -->
<div class="modal small fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>

            </div>
            <div class="modal-body">
            <form action="{{ url('/admin-user')}}" method="post">
            {{ csrf_field()}}
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select name="id_jabatan" class="form-control">
                        <option selected>Pilih Jabatan</option>
                        @foreach($jabatan as $jbt)
                            <option value="{{$jbt->id}}">{{$jbt->nama_jabatan}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm 10">
                        <input type="password" class="form-control" id="password" name="password">    
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="remember_token">
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Tambah</a>    
            </form>
            </div>
        </div>
    </div>
</div>

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

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

  <script>
    $(document).ready(function(){
        $('#user').addClass('active');
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