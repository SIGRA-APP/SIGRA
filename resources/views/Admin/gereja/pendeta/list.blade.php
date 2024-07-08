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
        <h4 class="text-blue h4">List Pendeta</h4>
        <a href="{{ url('/' . $nama_gereja . '/admin/gereja/pendeta/add') }}" class="btn btn-primary pull-right"
            style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>
    <!-- Bordered table  start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Deskripsi Singkat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendeta as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->nama_pendeta }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->deskripsi_singkat }}</td>
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
