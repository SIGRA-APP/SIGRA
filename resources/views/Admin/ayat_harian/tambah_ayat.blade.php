@extends('layouts.app')
@section('styles')
@endsection
@section('content')

<div class="mobile-menu-overlay"></div>

<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Formulir</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Forms
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Ayat Harian
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Formulir Ayat Harian</h4>
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
                <form method="post" action="{{ url('/' . $nama_gereja . '/admin/ayat_harian/tambah_ayat') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Ayat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="Ayat" placeholder="Markus 5:21-43" />
                            @error('Ayat')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tema</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="Tema" placeholder="Mukjizat Ada karena Percaya" type="text" />
                            @error('Tema')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control datetimepicker" name="created_at" placeholder="Pilih tanggal" type="text" />
                            @error('created_at')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="gambar" type="file" />
                            @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"><strong>Isi Renungan Harian</strong></label>
                        <textarea class="form-control tinymce-editor" name="Detail" placeholder="Masukkan detail Ayat Harian..."></textarea>
                        @error('Detail')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            <!-- Default Basic Forms End -->
            </form>
            @endsection
            @section('script')
            @endsection