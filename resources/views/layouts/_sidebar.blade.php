<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{url('/')}}" class="logo m-0 float-start">SIGRA<span class="text-primary">.</span></a>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                @if (Auth::user()->role == 'super-admin')
                <li class="dropdown">
                    <a href="{{ route('info.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span><span class="mtext">Gereja</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('list-admin.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-people-fill"></span><span class="mtext">Admin Gereja</span>
                    </a>
                </li>
                @endif
                <li class="dropdown">
                    <a href="{{url('home/tambah_home')}}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-clipboard"></span><span class="mtext">Informasi</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{url('admin/warta/list_warta')}}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-file-post"></span><span class="mtext">Warta Jemaat</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('list_ayat') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-collection"></span><span class="mtext">Ayat Harian</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span><span class="mtext">Laporan Keuangan</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{route('listmingguan')}}">Keuangan Mingguan</a>
                        </li>
                        <li><a href="{{route('listbulanan')}}">Arus Kas Bulanan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-calendar-event"></span><span class="mtext">Formulir Acara/Event</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{route('listupcoming')}}">Upcoming</a>
                        </li>
                        <li><a href="{{ route('listAcara') }}">Ibadah Raya</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-house-fill"></span><span class="mtext">Formulir Gereja</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{url('admin/gereja/sejarah/add')}}">Sejarah</a>
                        </li>
                        <li><a href="{{url('admin/gereja/pendeta/list')}}">Struktural (Pendeta)</a></li>
                        <li><a href="{{url('admin/gereja/bph/list')}}">Struktural (BPH dan Rekan)</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>



</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Admin Panel</h4>
                        </div>
                    </div>
                </div>
            </div>
