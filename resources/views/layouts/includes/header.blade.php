<style type="text/css">
	#just-line-break {
  		white-space: pre-line;
	}
	.form-control {
    width: 60%;
    height: calc(0.75em + 0.75rem + 2px);
    font-weight: 550;
    border: 1px solid #02275d;
  }
  .form-control:-moz-focusring {
    color: transparent;
    text-shadow: 0 0 0 #02275d;
  }
  .form-control:focus {
    color: #02275d;
    background-color: #fff;
    border-color: #ffb300;
    outline: 0;
    box-shadow: 0 0 0 0.1rem #02275d;
  }
  .form-control::placeholder {
    color: #02275d;
    opacity: 1;
  }
  .btn {
    color: #02275d;
    border: unset;
    padding: 0.1rem 0.3rem;
  }
  .btn:hover {
    color: #ffb300;
    text-decoration: none;
  }
  .btn:focus,
  .btn.focus {
    outline: 0;
    box-shadow: 0 0 0 0.1rem #ffb300;
  }
  .btn-outline-success {
    color: #ffb300;
    border-color: #ffb300;
  }
  .btn-outline-success:hover {
    color: #ffb300;
    background-color: #02275d;
    border-color: #ffb300;
  }
  .btn-outline-success:focus,
  .btn-outline-success.focus {
    box-shadow: 0 0 0 0.1rem #ffb300;
  }
  .btn-outline-success:not(:disabled):not(.disabled):active,
  .btn-outline-success:not(:disabled):not(.disabled).active,
  .show > .btn-outline-success.dropdown-toggle {
    color: #ffb300;
    background-color: #02275d;
    border-color:#ffb300;
  }
  .btn-outline-success:not(:disabled):not(.disabled):active:focus,
  .btn-outline-success:not(:disabled):not(.disabled).active:focus,
  .show > .btn-outline-success.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.1rem #ffb300;
  }
  .teks-left{
    text-align: center;
  }
  .cari-right{
    text-align: right;
  }
  @media(min-width: 768px){
    .teks-left{
      text-align: left;
    }
    .cari-right{
      text-align: right;
    }
  }
</style>

<header style="background-color: #f8f9fa">
<div class="container py-3">
	<div class="row">
	    <div class="my-2 col-lg-1">
	      <a href="{{url('/')}}"><img src="{{asset('assets/img/logo_kemenkeu.png')}}" width="87" height="77" style="display: block; margin: auto;"></a>
	    </div>
	    <div class="my-2 col-lg-5 teks-left" style="line-height: normal">
          <p style="margin: 0; padding: 0; font-weight: bold; font-size: 17px">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</p>
    			<p style="margin: 0; padding: 0; font-weight: bold; font-size: 17px">DIREKTORAT JENDERAL BEA DAN CUKAI</p>
    			<p style="margin: 0; padding: 0; font-weight: bold; font-size: 13px">KANTOR WILAYAH DJBC JAWA TIMUR II</p>
    			<p style="margin: 0; padding: 0; font-weight: bold; font-size: 13px">KPPBC TIPE MADYA CUKAI KEDIRI</p>
	    </div>
	    <div class="col-lg-4">
	  
	    </div>
	    <div class="col-lg-2">
	      	<form class="my-4" style="display: flex" action="#" method="GET">
            @csrf
            <input type= "hidden" name= "_token" value= " {!! csrf_token() !!}">
            <input class="form-control" type="search" placeholder="cari" aria-label="Search" name="query" required="" 
            style="width: 100%">
            <button class="btn btn-outline-success" type="submit" ><i class="fas fa-search"></i></button>
          </form>   
	    </div>
  	</div>
</div>
</header>
