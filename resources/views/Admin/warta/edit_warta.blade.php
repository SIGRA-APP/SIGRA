<!-- resources/views/admin/warta/edit_warta.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Warta Jemaat</div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                    <!-- Formulir untuk mengedit warta jemaat -->
                    <form action="{{ route('warta.update', $warta->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" value="{{ $warta->judul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <input type="text" name="deskripsi" class="form-control" value="{{ $warta->deskripsi }}" required>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi:</label>
                            <textarea name="isi" class="form-control" rows="4" required>{{ $warta->isi }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection