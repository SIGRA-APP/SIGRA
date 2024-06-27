@extends('layouts.app')

@section('styles')
<!-- Tambahkan style jika diperlukan -->
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
                                    Upcoming Event
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
                        <h4 class="text-blue h4">Tambah Acara Baru</h4>
                        <br>
                    </div>
                </div>
                <form method="post" href="{{ url('/' . $nama_gereja . '/admin/acara/upcoming/tambah_upcoming') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Judul / Keterangan</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="judul" class="form-control" type="text" placeholder="Acara Pemberkatan" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Hari</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="hari" class="form-control" placeholder="Pemberkatan pasangan Agus dan Santi" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="tanggal" class="form-control" placeholder="Pilih tanggal" type="date" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Waktu</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="waktu" class="form-control" placeholder="Pilih tanggal" type="time" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Lokasi</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="lokasi" class="form-control" placeholder="GKII..." type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input name="gambar" class="form-control" type="file" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"><strong>Detail Kegiatan</strong></label>
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
<!-- Tambahkan script jika diperlukan -->
@endsection
