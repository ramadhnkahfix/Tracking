<style type="text/css">
  .gambar{
    text-align: right;
    width: 70%;
  }

  .dropdown-item {
    color: #02275d;
    font-size: 90%;
    font-weight: 700;
  }

  .dropdown-item:hover,
  .dropdown-item:focus {
    color: #ffb300;
    text-decoration: none;
    background-color: #02275d;
  }

  .dropdown-item.active,
  .dropdown-item:active {
    color: #fff;
    text-decoration: none;
    background-color: #ffb300;
  }

  .dropdown-menu {
    border: 1px solid #02275d;
    border-radius: 0.25rem;
    background-color: #f8f9fa;
  }
</style>

@extends('layouts.master')

@section('content')
  
<div class="container">
  <div class="row-lg-12 my-2">
    <div class="card">
      <div class="card-header" style="background-color: #02275d">
        <h3 style="color: #ffff; text-align: left; font-weight: bold; padding: 0; margin: 0;">
        Tracking Documents
        </h3>
      </div>
      <hr style="padding: 0;margin: 0; border-width: 3px; border-color:  #ffb300">
      <div class="card-body py-3">
        <div class="row my-2">
          <div class="col">
            <!-- <form action="/track" method="POST"> -->
            
              <div class="form-group mb-4">
                <div class="col-6">
                  <input type="text" id="kode" class="form-control @error('kode') is-invalid @enderror" name="kode" placeholder="Isikan Kode Unik" required>
                </div>
                @error('kode')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group" id="img-captcha">
                <div class="col-6">
                  <span id="captcha-img">
                    {!! captcha_img() !!}
                  </span>
                  <button type="button" id="reload" class="btn btn-danger ml-2">&#x21bb;</button>
                </div>
              </div>
              <div class="form-group mb-4">
                <div class="col-6">
                <input type="text" id="captcha" name="captcha" placeholder="Isikan Captcha" class="form-control" required>
                  
                  <span class="form-group" id="alert" style="visibility: hidden" role="alert">
                      <input type="hidden" id="cek" value="0">
                      <strong style="color: red">Captcha tidak sesuai.</strong>
                  </span>
                  
                </div>
              </div>
              <div class="form-group col-md-4">
                <button type="submit" id="submit" class="btn btn-info">Submit</button>
              </div>
            <!-- </form> -->
          </div>
        </div>
        <div class="row my-2 col-12">
          <div class="pesan"></div>
        </div>
      </div>
      <hr style="padding: 0;margin: 0; border-width: 2px; border-color:  #ffb300">
      
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
      $('#submit').on('click', function(){
          
          let kode = $('#kode').val();
          let captcha = $('#captcha').val();
          var token = $('meta[name="csrf-token"]').attr('content');
          var url = '/user/track';
          
          $.ajax({
              type: 'POST',
              url: url,
              data: {
                  _token: token,
                  kode : kode,
                  captcha : captcha,
              },
              success: function(results){
                  if (results.success == true){
                      let diterima = '<p>Dokumen yang anda kirimkan telah kami terima.</p>';
                      let diproses = '<p>Dokumen yang anda kirimkan dalam proses pengerjaan.</p>';
                      let selesai = '<p>Dokumen yang anda kirimkan telah selesai dan telah kami kirim ke email anda. Mohon cek email anda.</p>';

                      if(document.getElementById('cek').value == 1){
                        document.getElementById('alert').style.visibility = "hidden";
                      }
                      if(results.data.status == 1){
                        $('.pesan').append(diterima);
                      }
                      else if(results.data.status == 2){
                        $('.pesan').append(diproses);
                      }
                      else if(results.data.status == 3){
                        $('.pesan').append(selesai);
                      }
                      
                      //remove captcha
                      $('#img-captcha').remove();
                      $('#reload').remove();
                      $('#captcha').remove();
                      $('#submit').remove();
                  }
                  else {
                      let gagal = '<p>Mohon periksa kembali kode unik yang anda inputkan dan input captcha dengan benar.</p>';
                      $('.pesan').append(gagal);
                  }
              },
              error: function(err){
               if (err.status == 422) {
                   var errors = JSON.parse(err.responseText);
                   if (errors.captcha) {
                       document.getElementById('alert').style.visibility = "visible";
                       document.getElementById('cek').value = 1;
                   }
               }
           }
          });
      });

      $('#reload').click(function(e){
      // e.preventDefault();
      $.ajax({
        type:'GET',
        url:'{{ url('/reload') }}',
        success:function(data){
          $('#captcha-img').html(data);
        }
      });
    });
      
  });
  
</script>

@endsection