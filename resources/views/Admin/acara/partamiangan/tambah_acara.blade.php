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
                                    Formulir Acara/Event
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Partamiangan
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
                        <h4 class="text-blue h4">Jadwal Partamiangan</h4>
                        <br>
                    </div>
                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kegiatan</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="kegiatan" placeholder="Partamiangan Minggu I" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Petugas</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="petugas" placeholder="Pdt. Agus Marpaung" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tempat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="tempat" placeholder="Rumah Inang M.Situmeang" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Tangal dan Waktu</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control datetimepicker" name="tanggal_waktu" placeholder="Pilih tanggal" type="text" />
                        </div>
                    </div>
                    <!-- <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="file" />
            </div>
        </div> -->
                    <div class="col-12">
                        <label class="form-label"><strong>Deskripsi Singkat</strong></label>
                        <textarea class="form-control" name="deskripsi_singkat" placeholder="Masukkan detail persembahan..."></textarea>
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