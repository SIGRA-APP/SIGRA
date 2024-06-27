@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">List Jadwal Partamiangan</h4>
        <a href="{{url('acara/partamiangan/tambah_acara')}}" class="btn btn-primary pull-right"
            style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>
    <form class="row" accept="get" style="margin-left: 3px; padding:20px;">
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Kegiatan</label>
            <input type="text" name="kegiatan" value="{{Request::get('kegiatan')}}" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Tanggal</label>
            <input type="date" name="tanggal_waktu" value="{{Request::get('tanggal_waktu')}}" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Petugas</label>
            <input type="text" name="petugas" value="{{Request::get('petugas')}}" class="form-control">
        </div>


        <div class="col-md-1"
            style="display:flex; justify-content:space-between; gap:2px; width:4%; height:4%; margin-top:2.7%;">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{url('acara/partamiangan')}}" class="btn btn-secondary">Reset</a>
        </div>

    </form><!-- Vertical Form -->
    <!-- Bordered table  start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Petugas</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($view as $value)
                <tr>
                    <td class="table-plus">{{$value->kegiatan}}</td>
                    <td>{{$value->tanggal_waktu}}</td>
                    <td>{{$value->tempat}}</td>
                    <td>{{$value->petugas}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more" style="margin-left:25px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list" >
                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Lihat</a>
                                <a class="dropdown-item" href="edit_kas"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="collapse collapse-box" id="border-table">
            <div class="code-box">
                <div class="clearfix">
                    <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"
                        data-clipboard-target="#border-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
                    <a href="#border-table" class="btn btn-primary btn-sm pull-right" rel="content-y"
                        data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                </div>
                <pre><code class="xml copy-pre" id="border-table-code">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
    </tr>
  </tbody>
</table>
							</code></pre>
            </div>
        </div>
    </div>
    <!-- Bordered table End -->
</div>
<!-- Simple Datatable End -->

@endsection
@section('script')
@endsection
