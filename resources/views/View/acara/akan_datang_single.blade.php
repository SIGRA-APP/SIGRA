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
                    <h1 class="text-capitalize mb-5 text-lg">Acara Akan Datang</h1>
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
                        @foreach ($upcomings as $value)

                        @endforeach
                        <div class="single-blog-item" id="content-to-download">
                            <img src="{{asset($value->gambar)}}" alt="" class="img-fluid" style="height:60vh; border-radius:15px; display: block; margin-left: auto; margin-right: auto;">

                            <div class="blog-item-content mt-5">
                                <h2 class="mb-4 text-md">{{$value->judul}}</h2>
                                <br>
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
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <p class="mb-4 text-md" style="color:black">Deskripsi Kegiatan</p>

                                <p class="detail-kegiatan" style="text-align:justify;">{!! $value->detail_kegiatan !!}</p>
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
            margin:       1,
            filename:     'acara-akan-datang.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
    });
</script>
@endsection
