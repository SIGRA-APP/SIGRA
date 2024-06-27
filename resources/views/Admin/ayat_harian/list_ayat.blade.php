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
            <h4 class="text-blue h4">List Ayat Harian</h4>
            <a href="{{ url('/' . $nama_gereja . '/admin/ayat_harian/tambah_ayat') }}" class="btn btn-primary pull-right"
                style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
        </div>
        <!-- Vertical Form -->
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Ayat</th>
                        <th>Tema</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ayat as $data)
                        <tr>
                            <td class="table-plus">{{ $data->Ayat }}</td>
                            <td>{{ $data->Tema }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>{!! Str::limit($data->Detail, 25) !!}</td>

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
