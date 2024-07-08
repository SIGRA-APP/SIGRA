@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="pd-20 card-box mb-30">
    <div class="mb-20">
        <h4 class="text-blue h4">Edit Berita</h4>
    </div>
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
    <form method="POST" action="{{ url('berita/dukacita/update_berita', $duka_cita->id) }} enctype=" multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="judul" class="col-sm-12 col-md-2 col-form-label">Judul</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $duka_cita->judul }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="periode" class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $duka_cita->deskripsi }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggal_mulai" class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
            <div class="col-sm-12 col-md-10">
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $duka_cita->created_at }}">
            </div>
        </div>
        <div class="col-12">
            <label class="form-label"><strong>Detail Berita</strong></label>
            <textarea class="form-control tinymce-editor" name="detail_berita" placeholder="Masukkan detail berita...">{{ $duka_cita->detail_berita }}</textarea>
        </div>
        <div class="form-group row">
            <label for="image_file" class="col-sm-12 col-md-2 col-form-label">Gambar</label>
            <div class="col-sm-12 col-md-10">
                <input type="file" class="form-control-file" id="image_file" name="image_file">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
@endsection