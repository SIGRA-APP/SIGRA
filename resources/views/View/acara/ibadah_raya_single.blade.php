@extends('view.home_layouts.app')
@section('styles')
@endsection
@section('content')

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h1 class="text-capitalize mb-5 text-lg">Ibadah Raya</h1>
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
                        @foreach ($raya as $value)
                        @endforeach
                        <div class="single-blog-item" id="content-to-download">
                            <img src="{{asset( $value->gambar)}}" alt="" class="img-fluid"
                            style="height:60vh; border-radius:15px; display: block; margin-left: auto; margin-right: auto;">
                            <div class="blog-item-content mt-5">
                                <h2 class="mb-4 text-md">{{$value->tema}}</h2>
                                <br>
                                <blockquote class="quote">
                                    {{$value->ayat}}
                                </blockquote>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Jadwal Kegiatan</h4>
                                                <div class="table-responsive">
                                                    <table id="zero_config"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Hari</th>
                                                                <th>{{$value->hari}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>{{$value->tanggal}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jam</th>
                                                                <th>{{$value->waktu}} - Selesai</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Lokasi</th>
                                                                <th>{{$value->lokasi}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Pengkhotbah</th>
                                                                <th>{{$value->pengkothbah}}</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-wrap">
                                    <div class="container pd-0">
                                        <div class="row">
                                            <div class="col-md-16 col-sm-12">
                                                <div class="blog-detail card-box overflow-hidden mb-30">
                                                    <div class="blog-img">
                                                        <img src="vendors/images/img2.jpg" alt="" />
                                                    </div>
                                                    <div class="blog-caption">
                                                        <h4 class="mb-10">
                                                            Detail Kegiatan
                                                        </h4>
                                                        <p style="text-align:justify; color:black;">
                                                            {!! ($value->detail_kegiatan) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
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
    document.getElementById('download-pdf').addEventListener('click', function () {
        var element = document.getElementById('content-to-download');
        html2pdf(element, {
            margin: 1,
            filename: 'ibadah-raya.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
    });
</script>
@endsection
