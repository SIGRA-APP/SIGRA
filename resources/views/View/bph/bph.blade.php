@extends('view.home_layouts.app')
@section('styles')
@endsection
@section('content')


<style>
  .fixed-size-img {
    width: 300px;
    /* Tentukan lebar tetap sesuai kebutuhan Anda */
    height: 300px;
    /* Tentukan tinggi tetap sesuai kebutuhan Anda */
    object-fit: cover;
    /* Memastikan gambar tidak terdistorsi */
    border-radius: 25px;
    /* Tambahkan border-radius jika diperlukan */
  }
</style>


<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">BPH</span>
          <h1 class="text-capitalize mb-5 text-lg">Badan Pengurus Harian</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">All Doctors</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-title">
          <h2>BPH</h2>
          <div class="divider mx-auto my-4"></div>
        </div>
      </div>
    </div>
    <div class="row shuffle-wrapper portfolio-gallery">
      @foreach ($data_bph as $value)
      <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
        <div class="position-relative doctor-inner-box">
          <div class="doctor-profile">
            <div class="doctor-img">
              <img src="{{ asset($value->gambar) }}" alt="bph-image" class="img-fluid w-100 fixed-size-img" style="border-radius:25px;">
            </div>
          </div>
          <div class="content mt-3">
            <h4 class="mb-0"><a>{{$value->nama}}</a></h4>
            <p>{{$value->jabatan}}
              <br>
              {{$value->deskripsi_singkat}}
            </p>
          </div>
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