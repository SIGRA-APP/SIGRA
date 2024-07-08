@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Formulir Warta Jemaat</h4>
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
                                    Warta Jemaat
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
                <form method="post" enctype="multipart/form-data" action="{{ url('/' . $nama_gereja . '/admin/warta/simpan_warta') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pilih Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gambar_option" id="defaultGambar" value="default" checked>
                                <label class="form-check-label" for="defaultGambar">
                                    Gunakan Gambar Default
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gambar_option" id="customGambar" value="custom">
                                <label class="form-check-label" for="customGambar">
                                    Unggah Gambar Sendiri
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row custom-gambar">
                        <label class="col-sm-12 col-md-2 col-form-label">Unggah Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="gambar" type="file" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Judul</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="judul" placeholder="Warta Jemaat" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Deskripsi Singkat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" name="tanggal" placeholder="" />
                        </div>
                    </div>
                    <br>
                    <h4 class="text-blue h4">Pelayanan Pagi</h4>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pengkotbah Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pengkotbah_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Liturgis Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="liturgis_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Singers Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="singers_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pemusik Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pemusik_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tamborin Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="tamborin_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Penyambut Jemaat Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="penyambut_jemaat_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Operator Camera Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="operator_camera_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Operator Computer Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="operator_computer_pagi" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Operator Sound Pagi</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="operator_sound_pagi" placeholder="" />
                        </div>
                    </div>
                    <br>
                    <h4 class="text-blue h4">Pelayanan Siang</h4>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pengkotbah Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pengkotbah_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Liturgis Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="liturgis_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Singers Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="singers_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Pemusik Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pemusik_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tamborin Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="tamborin_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Penyambut Jemaat Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="penyambut_jemaat_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Operator Camera Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="operator_camera_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Operator Computer Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="operator_computer_siang" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Operator Sound Siang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="operator_sound_siang" placeholder="" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label"><strong>Tata Ibadah</strong></label>
                        <textarea class="form-control tinymce-editor" name="tata_ibadah" placeholder="Masukkan detail Tata Ibadah..."></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label"><strong>Laporan Persembahan</strong></label>
                        <textarea class="form-control tinymce-editor" name="laporan_persembahan" placeholder="Masukkan detail Laporan Persembahan..."></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label"><strong>Laporan Perpuluhan</strong></label>
                        <textarea class="form-control tinymce-editor" name="laporan_perpuluhan" placeholder="Masukkan detail Laporan Perpuluhan..."></textarea>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const defaultGambarRadio = document.getElementById('defaultGambar');
                        const customGambarRadio = document.getElementById('customGambar');
                        const customGambarInput = document.querySelector('.custom-gambar');

                        function toggleGambarInput() {
                            if (customGambarRadio.checked) {
                                customGambarInput.style.display = 'block';
                            } else {
                                customGambarInput.style.display = 'none';
                            }
                        }

                        defaultGambarRadio.addEventListener('change', toggleGambarInput);
                        customGambarRadio.addEventListener('change', toggleGambarInput);

                        toggleGambarInput(); // Initial call
                    });
                </script>
            </div>
            <!-- Default Basic Forms End -->
        </div>
    </div>
</div>
@endsection