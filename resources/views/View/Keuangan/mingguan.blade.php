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
                    <h1 class="text-capitalize mb-5 text-lg">Laporan Keuangan Mingguan</h1>

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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <br>
                <br>
                <br>

                <h4 class="card-title">Laporan Keuangan Mingguan</h4>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th>Gereja</th>
                                <th>Nama Minggu</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mingguan as $value)
                            <tr>
                                <td>{{$value->gereja->nama_gereja}}</td>
                                <td>{{$value->nama_minggu}}</td>
                                <td>{{$value->tanggal}}</td>
                                <td>{{$value->jumlah}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
