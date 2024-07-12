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
          <h1 class="text-capitalize mb-5 text-lg">Warta Jemaat</h1>

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
            @foreach($warta as $value)
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<img src="{{ asset($value->gambar) }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">{{$value->judul}}</h4>
						<p class="mb-4">{{ Illuminate\Support\Str::words($value->deskripsi, 25, '...') }}</p>
						<a href= "{{ url('/' . $nama_gereja . '/view/postingan/warta_single/'.$value->id) }}"
						class="read-more">Selengkapnya  <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>

@endsection
@section('script')
@endsection
