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
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Formulir Gereja
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Sejarah
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
                        <h4 class="text-blue h4">Sejarah</h4>
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

                <form action="{{ url('/' . $nama_gereja . '/admin/gereja/sejarah/add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar Gereja</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="gambar_gereja" />
                            @if(isset($sejarah->gambar_gereja))
                            <img src="{{ asset('storage/' . $sejarah->gambar_gereja) }}" alt="Gambar Gereja" width="100">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal Dibuat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" name="tanggal_dibuat" value="{{ $sejarah->tanggal_dibuat ?? '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Judul</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="judul" value="{{ $sejarah->judul ?? 'Sejarah Gereja HKBP' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Gereja</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="nama_gereja" value="{{ $nama_gereja }}" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Didirikan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" name="kapan_didirikan" value="{{ $sejarah->kapan_didirikan ?? '' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pendiri</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pendiri" value="{{ $sejarah->pendiri ?? 'Augus Theis' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="lokasi" value="{{ $sejarah->lokasi ?? 'Jl. ABC DEF' }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kutipan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="kutipan" value="{{ $sejarah->kutipan ?? $data_home->gereja->kutipan }}" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"><strong>Buat Detail Sejarah</strong></label>
                        <textarea class="form-control tinymce-editor" name="description">{{ $sejarah->description ?? '' }}</textarea>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <!-- Default Basic Forms End -->
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection