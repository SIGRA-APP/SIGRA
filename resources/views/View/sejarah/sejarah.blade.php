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
          <span class="text-white">Sejarah</span>
          <h1 class="text-capitalize mb-5 text-lg">{{$data_home->gereja->nama_gereja}}</h1>
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
		<div class="single-blog-item">
        @foreach ($sejarah as $value)
        <img src="{{ asset('storage/'.$value->gambar_gereja) }}" alt="" class="img-fluid" style="height:60vh; width:120vh; border-radius:15px; display: block; margin-left: auto; margin-right: auto;">

			<div class="blog-item-content mt-5">
				<div class="blog-item-meta mb-3">
					<span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i> {{$value->tanggal_dibuat}}</span>
				</div>

				<h2 class="mb-4 text-md">{{$value->judul}}</h2>
                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="zero_config"
                                                        class="table table-striped table-bordered no-wrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Didirikan</th>
                                                                <th>{{$value->kapan_didirikan}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Pendiri</th>
                                                                <th>{{$value->pendiri}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th>lokasi</th>
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
				<p style="color:black; text-align:justify;">{!! $value->description !!}</p>

			    </div>
			</div>
		</div>
        @endforeach
	</div>
</div>
            </div>
        </div>
    </div>
</section>



@endsection
@section('script')
@endsection
