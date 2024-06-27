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
        <h4 class="text-blue h4">List Upcoming Event</h4>
        <a href="{{route('tambah_upcoming')}}" class="btn btn-primary pull-right"
            style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>

    <!-- Vertical Form -->
    <!-- Bordered table start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul / Keterangan</th>
                    <th scope="col">Tanggal dan Waktu</th>
                    <th scope="col">Detail Kegiatan</th>
                    <th scope="col">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($upcomingEvents as $index => $event)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $event->judul }}</td>
                        <td>{{ $event->tanggal }} {{ $event->waktu }}</td>
                        <td>{!! Str::words($event->detail_kegiatan, 25, '...') !!}</td>
                        <td>{{ $event->lokasi }}</td>
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


