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
        <h4 class="text-blue h4">List Gereja</h4>
        <a href="{{ url('/' . $nama_gereja . '/info/create') }}" class="btn btn-primary pull-right" style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>
    <!-- Vertical Form -->
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Nama Gereja</th>
                    <th>Kutipan</th>
                    <th>Ibadah Online</th>
                    <th>Waktu Ibadah</th>
                    <th>Contact Person</th>
                    <th class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gereja as $inf)
                <tr>
                    <td class="table-plus">{{ $inf->id }}</td>
                    <td><a class="text-info" href="{{ url('/' . $inf->nama_gereja) }}">{{$inf->nama_gereja }}</a></td>
                    <td>{{ $inf->kutipan }}</td>
                    <td>{{ $inf->online }}</td>
                    <td>{{ $inf->sesi }}</td>
                    <td>{{ $inf->kontak }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="btn-1">
                                <a href="{{ url('/' . $inf->nama_gereja . '/info/edit/' . $inf->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </div> &nbsp;&nbsp;&nbsp;
                            <div class="btn-2">
                                <form action="{{ url('/' . $inf->nama_gereja . '/info/destroy' . $inf->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </td>
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