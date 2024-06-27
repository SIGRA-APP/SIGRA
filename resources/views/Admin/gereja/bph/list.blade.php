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
        <h4 class="text-blue h4">List BPH</h4>
        <a href="{{ url('admin/gereja/bph/add') }}" class="btn btn-primary pull-right"
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
                @foreach($bphs as $bph)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $bph->nama }}</td>
                    <td>{{ $bph->jabatan }}</td>
                    <td>{{ $bph->deskripsi_singkat }}</td>
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
