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
            <button type="button" class="btn btn-primary btn-lg px-2 py-2" data-toggle="modal" data-target="#modalupload">Upload Document</button>
          </div>
        </div>
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
        <form action="" method="POST">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              
                <div class="form-group">
                  <label for="nama">Nama/Instansi</label>
                  <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="file">Upload File</label><br>
                  <input type="file" name="file" accept=".doc,.docx,.pdf" class="" required><br>
                  <small>format: .doc, .docx, .pdf
                </div>
              
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" style="color: white" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" style="color: white">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

@endsection