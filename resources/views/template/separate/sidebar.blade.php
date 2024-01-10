<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('auth.dashboard') }}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/rpl.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text text-black font-weight-semibold">B-Kita</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('auth.dashboard') }}" class="nav-link @if (Request::segment(1) == '')
                active
            @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @can('isAdmin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('isAdmin')
                <li class="nav-item">
                  <a href="{{ route('guru_bk.index') }}" class="nav-link @if (Request::segment(1) == 'guru_bk')
                      active
                  @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Guru BK</p>
                  </a>
                </li>
                @endcan
                @cannot('isSiswa')
                <li class="nav-item">
                    <a href="{{ route('siswa.index') }}" class="nav-link @if (Request::segment(1) == 'siswa')
                        active
                    @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                @endcannot
                @can('isAdmin')
                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}" class="nav-link @if (Request::segment(1) == 'kelas')
                        active
                    @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelas</p>
                    </a>
                </li>
                @endcan
            </ul>
          </li>
          @endcan
        <li class="nav-item">
            <a href="#" class="nav-link @if (Request::segment(1) == 'konseling')
                active
            @endif">
              <i class="nav-icon fas fa-share"></i>
              <p>
                Bimbingan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('konseling.index') }}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Data Bimbingan</p>
                </a>
              </li>
              @can('isGuruBK')
              <li class="nav-item">
                <a href="{{ route('konseling.req', Auth::user()->id) }}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Request Konsul</p>
                </a>
              </li>
              @endcan
              @can('isSiswa')
              <li class="nav-item">
                <a href="{{ route('konseling.history', ['siswa_id' => Auth::user()->id]) }}" class="nav-link @if (Request::segment(2) == 'history')
                    active
                @endif">
                  <i class="fa fa-print nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @if (Request::segment(1) == 'pelanggaran')
                active
            @endif">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pelanggaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pelanggaran.index') }}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Data Pelanggaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
