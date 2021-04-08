<style type="text/css">
  .garisbiru{
    border-width: 10px; 
    background-color: #02275d;
  }

  .navbar{
    padding: unset;
  }

  .navbar-light .navbar-nav .nav-link {
    color: #02275d;
    font-size: 90%;
    font-weight: 1000;
  }

  .navbar-light .navbar-nav .nav-link:hover,
  .navbar-light .navbar-nav .nav-link:focus {
    color: #ffb300;
    text-decoration: none;
    background-color: #02275d;
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

<hr style="padding: 0;margin: 0; border-width: 3px; border-color: #02275d">
<hr style="padding: 0;margin: 0; border-width: 3px; border-color:  #ffb300">


<header style="background-color: #f8f9fa">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="float:right">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link px-5" href="{{url('/')}}">TRACKING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link px-5" href="{{url('/upload')}}">UPLOAD</a>
                  </li>
                  @if(!auth()->user())
                  <li class="nav-item">
                    <a class="nav-link px-5" href="{{url('/login')}}">LOGIN</a>
                  </li>
                  @endif
                  @if(auth()->user())
                  <li class="nav-item dropdown">
                    <a class="nav-link px-5" data-toggle="dropdown" href="#">
                    PROFILE
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <i class="fas fa-lock mr-2"></i> Change Password
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="{{url('/logout')}}" class="dropdown-item">
                        <i class="fas fa-power-off mr-2"></i> Logout
                      </a>
                    </div>
                  </li>
                  @endif
                </ul>
                  <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-5" id="ProfilDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      TENTANG KAMI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="ProfilDropdown">
                      <a class="dropdown-item" href="#">Profil</a>
                      <a class="dropdown-item" href="#">Struktur Organisasi</a>
                      <a class="dropdown-item" href="#">Nilai-Nilai Kemenkeu</a>
                      <a class="dropdown-item" href="#">Tugas dan Fungsi DJBC</a>
                      <a class="dropdown-item" href="#">Janji Layanan</a>
                      <a class="dropdown-item" href="#">Wilayah Kerja</a>
                      <a class="dropdown-item" href="#">Peta Kami</a>
                      <a class="dropdown-item" href="{{url('/update-penerimaan')}}">Update Penerimaan</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-5" id="MediaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      MEDIA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="MediaDropdown">
                      <a class="dropdown-item" href="{{url('/berita')}}">Berita</a>
                      <a class="dropdown-item" href="{{url('/pengumuman')}}">Pengumuman</a>
                      <a class="dropdown-item" href="{{url('/artikel')}}">Artikel</a>
                      <a class="dropdown-item" href="{{url('/agenda-kegiatan')}}">Agenda Kegiatan</a>
                      <a class="dropdown-item" href="{{url('/materi-sosialisasi')}}">Materi Sosialisasi</a>
                      <a class="dropdown-item" href="{{url('/foto')}}">Galeri Foto</a>
                      <a class="dropdown-item" href="{{url('/video')}}">Galeri Video</a>
                    </div>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link px-5" href="{{url('/direktori-peraturan')}}">PERATURAN</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-5" href="#" id="FAQDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      FAQ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="FAQDropdown">
                      <a class="dropdown-item" href="{{url('/faq-cukai')}}">Cukai</a>
                      <a class="dropdown-item" href="{{url('/faq-kepabean')}}">Kepabeanan</a>
                      <a class="dropdown-item" href="{{url('/faq-lain-lain')}}">Lain-lain</a>
                    </div>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link px-5" href="{{url('/hubungi')}}">HUBUNGI</a>
                  </li> -->
                </ul>
              </div>
        </nav>
      </div>
    </div>
  </div>
</header>


<hr style="padding: 0;margin: 0; border-width: 3px; border-color: #02275d">