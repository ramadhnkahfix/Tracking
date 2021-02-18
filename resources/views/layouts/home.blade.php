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
            <form action="">
              <div class="form-group mb-2">
                <div class="col-4">
                  <input type="text" class="form-control form-control-lg" id="" placeholder="Isikan Kode Unik">
                </div>
              </div>
              <div class="form-group mt-4 mb-2">
                
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <hr style="padding: 0;margin: 0; border-width: 2px; border-color:  #ffb300">
      
    </div>
  </div>
</div>

@endsection