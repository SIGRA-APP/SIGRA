@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="mobile-menu-overlay"></div>

<div class="secondaryx-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Formulir Berita</h4>
                        <br>
                    </div>
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
                <form method="post" action="{{ url('berita/dukacita/insert_berita') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Judul / Keterangan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="judul" placeholder="Berita Duka Cita" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Tanggal
                            dan Waktu</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control datetimepicker" name="tanggal" placeholder="Pilih tanggal" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="image_file" type="file" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"><strong>Detail Berita</strong></label>
                        <textarea class="form-control tinymce-editor" name="detail_berita" placeholder="Masukkan detail berita..."></textarea>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- Default Basic Forms End -->
            @endsection
            @section('script')
            @endsection