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
                    <h1 class="text-capitalize mb-5 text-lg">Renungan Harian</h1>
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
                        @foreach ($ayats as $value)

                        @endforeach
                        <div class="single-blog-item" id="content-to-download">
                            <img src="{{ asset($value->gambar) }}" alt="" class="img-fluid"
                            style="height:60vh;border-radius:15px; display: block; margin-left: auto; margin-right: auto;">

                            <div class="blog-item-content mt-5">
                                <div class="blog-item-meta mb-3">
                                    <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i>
                                        {{$value->tanggal}}</span>
                                </div>

                                <h2 class="mb-4 text-md">{{$value->Ayat}}</h2>
                                <br>
                                <blockquote class="quote">
                                    {{$value->Tema}}
                                </blockquote>
                                <br>
                                <div class="blog-caption">
                                    <h4 class="mb-10">
                                        Renungan
                                    </h4>
                                    <p style="text-align:justify;">
                                        {!! $value->Detail !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="download-pdf" class="btn btn-primary mt-5">Download PDF</button>

                </div>
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
            filename: 'ayat-harian.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
    });
</script>

@endsection
