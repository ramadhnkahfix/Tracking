<style type="text/css">
  .gambar{
    text-align: right;
    width: 70%;
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
            <form action="">
              <div class="form-group">
                <label for=""><h4>Tracking Documents</h4></label>
                <input type="email" class="form-control form-control-lg" id="" placeholder="Isikan Kode Unik">
              </div>
              <div class="form-group mt-4 mb-2">
                <div class="captcha">
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </button>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-4">
                  <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <hr style="padding: 0;margin: 0; border-width: 2px; border-color:  #ffb300">
      
    </div>
  </div>
</div>

@endsection