<!-- resources/views/admin/ayat_harian/ayatharian.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Ayat Harian</div>

                <div class="card-body">
                    <!-- Tampilkan daftar ayat harian -->
                    @if ($ayat->count() > 0)
                    <ul>
                        @foreach ($ayat as $item)
                        <li>{{ $item->ayat }} - {{ $item->keterangan }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p>Tidak ada ayat harian.</p>
                    @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Tambah Ayat Harian Baru</div>

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
                    <!-- Formulir untuk menambahkan ayat harian baru -->
                    <form action="{{ route('ayat.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="ayat">Ayat:</label>
                            <input type="text" name="ayat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Ayat Harian</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection