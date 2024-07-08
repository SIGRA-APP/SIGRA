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
                                    Form
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Ibadah Raya
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
                        <h4 class="text-blue h4">Ibadah Raya</h4>
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
                
                <form method="post" action="{{ url('/' . $nama_gereja . '/admin/acara/ibadah_raya/tambah_acara') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="gambar" class="form-control" type="file" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="judul" class="form-control" type="text" placeholder="nama_kegiatan" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tema</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="tema" class="form-control" placeholder="Merayakan Natal Penuh Kasih" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_waktu" class="col-sm-12 col-md-2 col-form-label">Ayat</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="ayat" id="ayat" class="form-control" placeholder="Masukkan Ayat" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Hari</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="hari" class="form-control" placeholder="Senin" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="tanggal" class="form-control" placeholder="25-12-2024" type="date" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Waktu</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="waktu" class="form-control" placeholder="20:00" type="time" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="lokasi" class="form-control" placeholder="GKII Balige" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pengkothbah</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="pengkothbah" class="form-control" placeholder="Pdt. August Theis" type="text" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"><strong>Detail Singkat Kegiatan</strong></label>
                        <textarea name="detail_kegiatan" class="form-control tinymce-editor" placeholder="Masukkan detail persembahan..."></textarea>
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
