@extends('admin.layouts.master')

@section('title','Dashboard')

@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row">
        
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