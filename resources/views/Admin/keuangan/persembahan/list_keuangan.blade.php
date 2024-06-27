@extends('layouts.app')

@section('styles')
@endsection

@section('content')

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<!-- Simple Datatable start -->
<div class="card-box mb-30">
<div class="pd-20">
        <h4 class="text-blue h4">Data Arus Kas Bulanan</h4>
        <a href="{{ url('/' . $nama_gereja . '/admin/keuangan/mingguan/tambah_mingguan') }}" class="btn btn-primary pull-right"
            style="float: right; margin-top: -5px; margin-bottom:8px;">Buat Baru</a>
    </div>
    <!-- Bordered table start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Minggu</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mingguan as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $item->nama_minggu }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->jumlah }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bordered table End -->
</div>
<!-- Simple Datatable End -->

@endsection

@section('script')
@endsection
