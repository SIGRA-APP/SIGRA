@extends('view.home_layouts.app')
@section('styles')

@endsection
@section('content')

@php
use Carbon\Carbon;
@endphp

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h1 class="text-capitalize mb-5 text-lg">Warta Jemaat</h1>

                    <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">News details</a></li>
          </ul> -->
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        @foreach ($wartas as $value)

                        <div class="single-blog-item" id="content-to-download">
                            <p>{{$value->gambar}}</p>
                            <img src="{{ asset($value->gambar) }}" alt="" class="img-fluid" style="height:60vh; width:120vh; border-radius:15px; display: block; margin-left: auto; margin-right: auto;">

                            <div class="blog-item-content mt-5">
                                <div class="blog-item-meta mb-3">
                                    <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i>
                                        {{$value->tanggal}}</span>
                                </div>

                                <h2 class="mb-4 text-md">{{$value->judul}}</h2>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Jadwal Pelayanan Minggu
                                                    {{ \Carbon\Carbon::parse($value->tanggal)->format('d-m-Y') }}
                                                </h4>
                                                <div class="table-responsive">
                                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Pelayan</th>
                                                                <th>Pagi (08:00)</th>
                                                                <th>Siang(14:00)</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Pengkotbah</th>
                                                                <th>{{$value->pengkotbah_pagi}}</th>
                                                                <th>{{$value->pengkotbah_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Liturgis</th>
                                                                <th>{{$value->liturgis_pagi}}</th>
                                                                <th>{{$value->liturgis_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Singers</th>
                                                                <th>{{$value->singers_pagi}}</th>
                                                                <th>{{$value->singers_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Pemusik</th>
                                                                <th>{{$value->pemusik_pagi}}</th>
                                                                <th>{{$value->pemusik_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Tamborin</th>
                                                                <th>{{$value->tamborin_pagi}}</th>
                                                                <th>{{$value->tamborin_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Penyambut Jemaat</th>
                                                                <th>{{$value->penyambut_jemaat_pagi}}</th>
                                                                <th>{{$value->penyambut_jemaat_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Operator Camera</th>
                                                                <th>{{$value->operator_camera_pagi}}</th>
                                                                <th>{{$value->operator_camera_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Operator Computer</th>
                                                                <th>{{$value->operator_computer_pagi}}</th>
                                                                <th>{{$value->operator_computer_siang}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Operator Sound</th>
                                                                <th>{{$value->operator_sound_pagi}}</th>
                                                                <th>{{$value->operator_sound_siang}}</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="blog-wrap">
                                    <div class="container pd-0">
                                        <div class="row">
                                            <div class="col-md-16 col-sm-16">
                                                <div class="blog-detail card-box overflow-hidden mb-30">
                                                    <div class="blog-img">
                                                        <img src="vendors/images/img2.jpg" alt="" />
                                                    </div>
                                                    <div class="blog-caption">
                                                        <h4 class="mb-10">
                                                            Tata Ibadah
                                                        </h4>
                                                        <p style="text-align:justify;">
                                                            {!! ($value->tata_ibadah) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-wrap">
                                    <div class="container pd-0">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="blog-detail card-box overflow-hidden mb-30">
                                                    <div class="blog-img">
                                                        <img src="vendors/images/img2.jpg" alt="" />
                                                    </div>
                                                    <div class="blog-caption">
                                                        <h4 class="mb-10">
                                                            Laporan Persembahan
                                                        </h4>
                                                        <p>
                                                            {!!$value->laporan_persembahan!!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-wrap">
                                    <div class="container pd-0">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="blog-detail card-box overflow-hidden mb-30">
                                                    <div class="blog-img">
                                                        <img src="vendors/images/img2.jpg" alt="" />
                                                    </div>
                                                    <div class="blog-caption">
                                                        <h4 class="mb-10">
                                                            Laporan Perpuluhan
                                                        </h4>
                                                        <p>
                                                            {!!$value->laporan_perpuluhan!!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <button id="download-pdf" class="btn btn-primary mt-5">Download PDF</button>
                </div>



            </div>
        </div>
    </div>
    </div>
</section>



@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById('download-pdf').addEventListener('click', function() {
        var element = document.getElementById('content-to-download');
        html2pdf(element, {
            margin: 1,
            filename: 'warta-jemaat.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2,
                logging: true,
                dpi: 192,
                letterRendering: true
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        });
    });
</script>

@endsection