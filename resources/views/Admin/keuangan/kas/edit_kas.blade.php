@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Edit Arus Kas</h4>
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
    <form method="POST" action="{{ route('update_kas', $aruskas->id) }} enctype=" multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $aruskas->judul }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="periode" name="periode" value="{{ $aruskas->periode }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggal_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $aruskas->created_at }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="tanggal_akhir" class="col-sm-2 col-form-label">Tanggal Berakhir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ $aruskas->updated_at }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="total" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="total" name="total" value="{{ $aruskas->total }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="detail_kas" class="col-sm-2 col-form-label">Detail Arus Kas</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="detail_kas" name="detail_kas" rows="3">{{ $aruskas->detail_kas }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="image_file" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
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