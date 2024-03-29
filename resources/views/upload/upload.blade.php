@extends('layouts.master')

@section('content')
  
<div class="container">
  <div class="row-lg-12 my-2">
    <div class="card">
      <div class="card-header" style="background-color: #02275d">
        <h3 style="color: #ffff; text-align: left; font-weight: bold; padding: 0; margin: 0;">
        Upload Documents
        </h3>
      </div>
      <hr style="padding: 0;margin: 0; border-width: 3px; border-color:  #ffb300">
      <div class="card-body py-3">
        <div class="row my-2">
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-lg px-2 py-2" data-toggle="modal" style="color: white" data-target="#modalupload">Upload Document</button>
          </div>
        </div>
        @if(session('status'))
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif
        <div class="row">
            <div class="col-6">
            </br>
            <h5>Note:</h5>
            <p>* Mohon untuk login terlebih dahulu.</p>
            <p>* Pastikan Anda mengisi alamat email dengan benar.</p>
            <p>* Informasi lebih lanjut akan dikirim ke email yang Anda input.</p>
            </div>
        </div>
      </div>
      <hr style="padding: 0;margin: 0; border-width: 2px; border-color:  #ffb300">
      
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary">  
              <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body modal-body-upload">
          <form action="{{url('/upload')}}" method="POST" enctype="multipart/form-data">
          @csrf
                <button type="button" class="btn btn-primary" style="float: right" id="tambah"><span style="color:#fff"><i class="fas fa-plus"></i> Tambah</span></button>
                <br>
                <div class="form-group">
                  <label for="nama">Nama/Instansi</label>
                  <input type="text" style="width:100%" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" style="width:100%" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tujuan Dokumen</label>
                    <select style="width:100%" name="user_role" required>
                    <option selected disabled>Pilih Seksi yang Dituju</option>
                        <option value="2">Subbagian Umum</option>
                        <option value="3">Seksi PKC I</option>
                        <option value="4">Seksi PKC II</option>
                        <option value="5">Seksi Perbendaharaan</option>
                        <option value="6">Seksi Kepatuhan Internal</option>
                        <option value="7">Seksi PLI</option>
                        <option value="8">Seksi Intelijen dan Penindakan</option>
                        <option value="9">Seksi Penyidikan Barang Hasil Penindakan</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" style="width:100%" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="subject">Kategori Dokumen</label>
                  <select style="width:100%" name="kategori">
                      <option value="1">Kepabeanan</option>
                      <option value="2">Cukai</option>
                      <option value="3">Umum</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="hidden" value="1" id="no">
                  <label id="label-upload">Upload File</label><br>
                  <input type="file" name="file[]" accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx" required><br>
                  <small>format: .doc, .docx, .pdf .jpg, .jpeg, .xls, .xlsx</small>
                </div>
                <div class="file"></div>
                <!-- <div class="form-group control-group increment" >
                  <input type="file" name="filename[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  </div>
                </div>
                <div class="clone hide">
                  <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                  </div>
                </div> -->
          </div>
          <div class="modal-footer modal-footer-upload">
              <button type="button" class="btn btn-secondary" style="color: white" data-dismiss="modal" aria-hidden="true">Batal</button> 
              <button type="submit" class="btn btn-primary" style="color: white">Upload</button>
          </div>
        </form>
      </div>
  </div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function(){

  $('#tambah').on('click', function(){
            let no = document.getElementById('no').value;
            document.getElementById('label-upload').innerHTML = "Upload File 1";
            no++;
            console.log("error");

            let el = '<div class="form-group">'+
                        '<label>Upload File '+no+'</label><br>'+
                        '<input type="file" name="file[]" accept=".doc,.docx,.pdf,.jpg,.jpeg,.xls,.xlsx" required><br>'+
                        '<small>format: .doc, .docx, .pdf .jpg, .jpeg, .xls, .xlsx</small>'+
                        '</div>';
            $('.file').append(el);
            document.getElementById('no').value = no;

    });
  });

</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script> -->

@endsection