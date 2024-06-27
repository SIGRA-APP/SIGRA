@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Sejarah</h4>
        <a href="{{url('gereja/sejarah/add')}}" class="btn btn-primary pull-right"
            style="float: right; margin-top: -5px; margin-bottom:8px;"> Buat Baru</a>
    </div>
    <form class="row" accept="get">
        <div class="col-md-1" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">ID</label>
            <input type="text" name="id" value="{{Request::get('id')}}" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Minggu</label>
            <input type="text" name="minggu" value="{{Request::get('minggu')}}" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Tanggal</label>
            <input type="date" name="tangga" value="{{Request::get('tanggal')}}" class="form-control">
        </div>
        <div class="col-md-2" style="margin-bottom: 10px;">
            <label for="inputNanme4" class="form-label">Total</label>
            <input type="text" name="total" value="{{Request::get('total')}}" class="form-control">
        </div>


        <div class="col-md-1"
            style="display:flex; justify-content:space-between; gap:2px; width:4%; height:4%; margin-top:2.7%;">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{url('keuangan/persembahan/list_keuangan')}}" class="btn btn-secondary">Reset</a>
        </div>

    </form><!-- Vertical Form -->
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Judul</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td class="table-plus"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Lihat</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <td colspan="5">No records found</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
<!-- Simple Datatable End -->

@endsection
@section('script')
@endsection
