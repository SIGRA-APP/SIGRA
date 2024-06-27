<header>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/' . $nama_gereja) }}">
                <img style="width:15vw; height:15vh;" src="{{ url('images/sigra.png') }}" alt="" class="img-fluid">
            </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/' . $nama_gereja) }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Postingan <i class="icofont-thin-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown05">
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/postingan/warta') }}">Warta Jemaat</a></li>
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/postingan/ayat') }}">Ayat Harian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Acara / Event <i class="icofont-thin-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown05">
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/acara/akan_datang') }}">Akan Datang</a></li>
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/acara/ibadah_raya') }}">Ibadah Raya</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Keuangan <i class="icofont-thin-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown05">
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/keuangan/mingguan') }}">Keuangan Mingguan</a></li>
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/keuangan/bulanan') }}">Keuangan Bulanan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">BPH <i class="icofont-thin-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown03">
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/bph/bph') }}">BPH</a></li>
                            <li><a class="dropdown-item" href="{{ url('/' . $nama_gereja . '/bph/gembala') }}">Pendeta / Gembala</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/' . $nama_gereja . '/sejarah') }}">Sejarah</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
