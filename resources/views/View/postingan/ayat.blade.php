@extends('view.home_layouts.app')
@section('styles')
@endsection
@section('content')

<style>
  .fixed-size-image {
    width: 300px;
    /* Set width sesuai keinginan Anda */
    height: 200px;
    /* Set height sesuai keinginan Anda */
    object-fit: cover;
    /* Memastikan gambar akan memotong bagian yang tidak muat sambil mempertahankan proporsi */
  }
</style>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-5 text-lg">Ayat Renungan Harian</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Department</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section service-2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 text-center">
        <div class="section-title">
          <div class="divider mx-auto my-4"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 ">
        @foreach ($ayat as $value)
        <div class="department-block mb-5">
          <img src="{{ asset($value->gambar) }}" width="250px" alt="" class="img-fluid ">
          <div class="content">
            <h4 class="mt-4 mb-2 title-color">{{$value->Ayat}}</h4>
            <p class="mb-4">{{$value->Tema}}</p>
            <a href="{{ url('/' . $nama_gereja . '/view/postingan/ayat_single/'.$value->id) }}" class="read-more">Selengkapnya <i class="icofont-simple-right ml-2"></i></a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection
@section('script')
@endsection