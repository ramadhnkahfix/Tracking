<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <h5 class="brand-text font-weight-light text-center">Admin</h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dimas Ihsan</a>
        </div>
    </div> -->
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="user-panel nav-item">
            <a href="#" class="nav-link">
            <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2 mr-2" alt="User Image">
                <p>{{auth()->user()->nama}}</p> 
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/change-password')}}" class="nav-link">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/logout')}}" class="nav-link">
                  <i class="fas fa-power-off nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/admin') }}" id="dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/dokumen') }}" id="dokumen" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Document
                    <!-- <i class="fas fa-angle-left right"></i> -->
                </p>
                </a>
                <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Dokumen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Read</p>
                    </a>
                </li>
                </ul> -->
            </li>
            @if(auth()->user()->role == 1 || auth()->user()->role == null)
            <li class="nav-item">
                <a href="{{ url('/admin/history') }}" id="history" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                    History
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/admin/history/selesai') }}" class="nav-link">
                        <i class="fas fa-check-circle nav-icon"></i>
                        <p>Done</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ url('/admin/history/ditolak') }}" class="nav-link">
                        <i class="fas fa-times-circle nav-icon"></i>
                        <p>Rejected</p>
                        </a>
                    </li> -->
                </ul>
            </li>
            @endif
            @if(auth()->user()->role == 1)
            <li class="nav-item">
                <a href="{{ url('/admin/user') }}" id="user" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>User</p>
                </a>
            </li>
            @endif
            @if(auth()->user()->role != 1 && auth()->user()->role != null)
            <li class="nav-item">
                <a href="#" id="history" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                    History
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/admin/approved') }}" class="nav-link">
                        <i class="far fa-check-circle  nav-icon"></i>
                        <p>Approved</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/history/selesai') }}" class="nav-link">
                        <i class="fas fa-check-circle nav-icon"></i>
                        <p>Done</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/rejected') }}" class="nav-link">
                        <i class="fas fa-times-circle nav-icon"></i>
                        <p>Rejected</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>