@extends('admin.layouts.master')

@section('title','Dashboard')

@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row">
        <section class="col-lg-6 connectedSortable ui-sortable">
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
                            @foreach($data as $dok)
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
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

  @endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('#dashboard').addClass('active');
        });
    </script>

@endsection