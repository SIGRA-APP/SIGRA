<footer class="footer section gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <img src="{{ url('images/sigra.png') }}" alt="" class="img-fluid">
                    </div>
                    <p style="text-align:justify;">{{ optional(optional($data_home)->gereja)->kutipan ?? '' }}</p>
                    @guest
                    <a class="nav-item">
                        <a class="btn btn-primary" href="{{ url('/' . $nama_gereja .'/login') }}" style="border-radius: 20px; background-color:black;">Login</a>
                    </a>
                    @endguest
                    @auth
                    <a class="nav-item">
                        <a class="btn btn-primary" href="{{ url('/' . $nama_gereja .'/admin/warta/list_warta') }}" style="border-radius: 20px; background-color:black;">Panel Admin</a>
                    </a>
                    @endauth
                </div>
            </div>

            <!-- Map Location -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4>Lokasi Gereja</h4>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15946.063278661328!2d99.0604216!3d2.3313769!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e05c95f52b829%3A0xed938e8b08109ff8!2sGKII%20Balige!5e0!3m2!1sid!2sid!4v1716742426351!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
