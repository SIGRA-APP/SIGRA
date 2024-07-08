@extends('layouts.app')

@section('styles')
@endsection

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<style>
    .small-text {
        font-size: 12px;
        /* Atur ukuran font sesuai kebutuhan */
    }
</style>
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Data Arus Kas Bulanan</h4>
        <a href="{{ url('/' . $nama_gereja . '/admin/keuangan/bulanan/tambah_bulanan') }}" class="btn btn-primary pull-right" style="float: right; margin-top: -5px; margin-bottom:8px;">Buat Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bulanan as $index => $item)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Simple Datatable End -->
@endsection

@section('script')
@endsection