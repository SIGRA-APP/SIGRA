@extends('view.home_layouts.app')

@section('styles')
@endsection

@section('content')

<!-- Slider Start -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                    <div class="divider mb-3"></div>
                    <span class="text-uppercase text-sm letter-spacing "><strong>Melayani bukan Dilayani</strong></span>
                    <h1 class="mb-3 mt-3">Selamat Datang di {{$nama_gereja}}</h1>

                    <p class="mb-4 pr-5"><strong>Kami dengan senang hati menyambut Anda di GKII Sangkar NiHuta. Kami berkomitmen untuk melayani dengan penuh kasih dan dedikasi, serta menghadirkan pengalaman ibadah yang bermakna bagi setiap jemaat.</strong></p>
                    <div class="btn-container ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-block d-lg-flex">
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-computer"></i>
                        </div>
                        <span>Ibadah Online</span>
                        <h4 class="mb-3">Ibadah Online</h4>
                        <li class="d-flex justify-content-between">Youtube :
                            <span></span>
                            <a href="{{ optional($data_home)->link ?? '' }}" target="_blank">{{ optional(optional($data_home)->gereja)->online ?? '' }}</a>
                        </li>
                    </div>

                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-ui-clock"></i>
                        </div>
                        <span>Waktu Ibadah</span>
                        <h4 class="mb-3">Sesi Ibadah</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Pagi :
                                <span></span>{{ optional($data_home)->jam_mulai_pagi ? substr($data_home->jam_mulai_pagi, 0, 5) : '' }} -
                                {{ optional($data_home)->jam_selesai_pagi ? substr($data_home->jam_selesai_pagi, 0, 5) : '' }}
                            </li>
                            <li class="d-flex justify-content-between">Siang :
                                <span>{{ optional($data_home)->jam_mulai_siang ? substr($data_home->jam_mulai_siang, 0, 5) : '' }} -
                                    {{ optional($data_home)->jam_selesai_siang ? substr($data_home->jam_selesai_siang, 0, 5) : '' }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="feature-item mb-5 mb-lg-0">
                        <div class="feature-icon mb-4">
                            <i class="icofont-support"></i>
                        </div>
                        <span>Informasi Lebih Lanjut</span>
                        <h4 class="mb-3">Contact Person</h4>
                        <ul class="w-hours list-unstyled">
                            <li class="d-flex justify-content-between">Telepon :
                                <span></span>{{ optional($data_home)->no_telp ?? '' }}
                            </li>
                            <li class="d-flex justify-content-between">Email :
                                <span>{{ optional($data_home)->email ?? '' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section class="cta-section ">
    <div class="container">
        <div class="cta position-relative">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">{{ optional($data_home)->kartu_keluarga ?? '' }}</span>KK
                        <p>Kartu Keluarga</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">{{ optional($data_home)->total_jemaat ?? '' }}</span>+
                        <p>Jemaat</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">{{ optional($data_home)->total_bph ?? '' }}</span>+
                        <p>BPH</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter-stat">
                        <i class="icofont-doctor"></i>
                        <span class="h3">{{ optional($data_home)->total_pendeta ?? '' }}</span>+
                        <p>Pendeta / Gembala</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<br>
<br>
<br>
<br>
<br>

@endsection

@section('script')
@endsection
