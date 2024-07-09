<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/SDM-LOGO.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Sdm Polri</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->      
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>                          
          </ul>
        </li>        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Surat Masuk
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('surat-masuk-suratBiasa') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Biasa</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('surat-masuk-suratRahasia') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Rahasia</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('surat-masuk-telegram') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Telegram</p>
              </a>
            </li>                           
            <li class="nav-item">
                <a href="{{ url('surat-masuk-notaDinas') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nota Dinas</p>
              </a>
            </li>                           
            <li class="nav-item">
                <a href="{{ url('surat-masuk-suratPerintah') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Perintah</p>
              </a>
            </li>                           
            <li class="nav-item">
                <a href="{{ url('surat-masuk-suratKeputusan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Keputusan</p>
              </a>
            </li>                                                                  
          </ul>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Surat Keluar
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">8</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="surat-keluar-keluarBiasa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Biasa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="surat-keluar-rahasiaKeluar" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Rahasia</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="surat-keluar-telegram" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Telegram</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="surat-keluar-notaDinasKel" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nota Dinas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="surat-keluar-suratPerintahKel" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Perintah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="surat-keluar-SIJ" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>SIJ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="surat-keluar-SIC" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>SIC</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="surat-keluar-Rekomendasi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekomendasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="surat-keluar-suratKeputusanKel" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Keputusan</p>
              </a>
            </li>
          </ul>
        </li>                              
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  