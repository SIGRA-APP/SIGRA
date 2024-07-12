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
        <h4 class="text-blue h4">List Admin Gereja</h4>
        <a href="{{ url('/' . $nama_gereja . '/list-admin/create') }}" class="btn btn-primary pull-right"
            style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>
    <!-- Vertical Form -->
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gereja</th>
                    <th class="datatable-nosort">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admin as $u)
                    <tr>
                        <td class="table-plus">{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->gereja->nama_gereja}} </td>
                        <td>
                            <a href="{{ url('/' . $nama_gereja . '/list-admin/' . $u->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ url('/' . $nama_gereja . '/list-admin/' . $u->id . '/destroy') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="admin_id" value="{{$u->id}}">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Hapus</button>
                            </form>
                            <input type="hidden" name="id_admin" value="{{$u->id}}">
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
