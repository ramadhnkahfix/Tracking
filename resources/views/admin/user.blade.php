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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $usr)
                                <tr id="{{$usr->id_user}}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $usr->nama }}</td>
                                    <td>{{ $usr->jabatan->nama }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td id="kd-{{$usr->id_user}}" align="center" style="width: 20%">
                                        @if( $usr->status == null || $usr->status == 0 )
                                            <button class="btn btn-secondary btn-sm status" type="button" id="status-{{$usr->id_user}}">Disable</button>
                                        @else
                                            <button class="btn btn-success btn-sm status" type="button" id="status-{{$usr->id_user}}">Active</button>
                                        @endif
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
                                    <th>Status</th>
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ url('/admin-user')}}" method="post">
            {{ csrf_field()}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select name="id_jabatan" class="form-control" required>
                        <option selected disabled>Pilih Jabatan</option>
                        @foreach($jabatan as $jbt)
                            <option value="{{$jbt->id_jabatan}}">{{$jbt->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm 10">
                        <input type="password" class="form-control" id="password" name="password" required>    
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="remember_token">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button> 
                <button type="submit" class="btn btn-primary" >Tambah</a>    
            </form>
            </div>
        </div>
    </div>
</div>

@foreach($user as $usr)
<!-- Modal Status USer -->
<div class="modal small fade" id="status-{{$usr->id_user}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Ganti Status</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menonaktifkan user {{$usr->nama}} ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button> 
                <a href="{{url('user/status/')}}{{$usr->id_user}}">
                    <button type="button" class="btn btn-primary" >Ya</button>
                </a>    
            </div>
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
        $('#user').addClass('active');

        $('.status').on('click', function(){
            var disable = '<button class="btn btn-secondary btn-sm status" type="button" id="status-{{$usr->id_user}}">Disable</button>';
            var active = '<button class="btn btn-success btn-sm status" type="button" id="status-{{$usr->id_user}}">Active</button>';
            
            let id = $(this).attr('id').slice(7);
            var token = $('meta[name="csrf-token"]').attr('content');
            var url = '/admin-user/status';

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: token,
                    id : id
                },
                success: function(results){
                    if (results.data.status == 1){

                        // $('#status-'+id).remove();
                        // $('tr td#kd-'+id).append(active);
                        $('#status-'+id).removeClass('btn-secondary');
                        $('#status-'+id).addClass('btn-success');
                        document.getElementById('status-'+id).textContent = "Active";

                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Status User berhasil disimpan.',
                        showConfirmButton: false,
                        timer: 2000
                        });
                        
                    }
                    else {
                        // $('#status-'+id).remove();
                        // $('tr td#kd-'+id).append(disable);
                        $('#status-'+id).removeClass('btn-success');
                        $('#status-'+id).addClass('btn-secondary');
                        document.getElementById('status-'+id).textContent = "Disable";

                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Status User berhasil disimpan.',
                        showConfirmButton: false,
                        timer: 2000
                        });
                    }
                }
            });
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