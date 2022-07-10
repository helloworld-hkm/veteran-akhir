<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url()?>/admin">Veteran CBT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="<?=base_url()?>/img/icon.ico" width="30px" alt=""></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Main-Menu</li>
              <li >
              <a class="nav-link" href="<?=base_url()?>/admin"><i class="fas fa-home"></i><span>Dashboard</span></a>
                
              </li>
              <li class="menu-header">Manajemen</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url()?>/admin/guru">Guru</a></li>
                  <li><a class="nav-link" href="<?=base_url()?>/admin/siswa">Siswa</a></li>
                  <li><a class="nav-link" href="<?=base_url()?>/admin/mapel">Mata Pelajaran</a></li>
                  <li><a class="nav-link" href="<?=base_url()?>/admin/kelas">Kelas</a></li>
                  <li><a class="nav-link" href="<?=base_url()?>/admin/jurusan">Jurusan</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Relasi</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="bootstrap-alert.html">Guru - Mapel</a></li>
                  <li><a class="nav-link" href="bootstrap-breadcrumb.html">Guru - Kelas</a></li>
                  <li><a class="nav-link" href="bootstrap-badge.html">Kelas - Mapel</a></li>
                 
              
                </ul>
              </li>
              <li><a class="nav-link" href="<?=base_url()?>/admin/ulangan"><i class="fas fa-clipboard"></i> <span>Ulangan</span></a></li>
              <li><a class="nav-link" href="<?=base_url()?>/admin/soal"><i class="fas fa-th-large"></i> <span>Bank Soal</span></a></li>
              
              <li class="menu-header">Laporan</li>
              
              <li><a class="nav-link" href="blank.html"><i class="far fa-file"></i> <span>Hasil Ulangan</span></a></li>
              
              <li class="menu-header">Administrator</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Registrasi</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url()?>/admin/manage/manageGuru">Guru</a></li>
                  <li><a class="nav-link" href="<?=base_url()?>/admin/registerSiswa">Siswa</a></li>
                  <li><a class="nav-link" href="<?=base_url()?>/admin/register">admin</a></li>

                </ul>
              </li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-danger btn-lg btn-block btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </aside>
      </div>