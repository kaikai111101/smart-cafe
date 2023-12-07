@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])
@section('content')
@php 
//  dd($tableData);
@endphp
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Total Shipments</h5>
                        <h2 class="card-title">Performance</h2>
                    </div>
                    
                    <div class="col-sm-6">
                        <div>
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                    <input type="radio" name="options" checked>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Yearly</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" id="1">
                                    <input type="radio" class="d-none d-sm-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Monthly</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <br/>
                        <br/>

                        <div >

                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-primary btn-simple" id="2">
                                    <input type="radio" name="options" checked>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Total Revenue</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple active" id="3">
                                    <input type="radio" class="d-none d-sm-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Total Transaksi</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-primary btn-simple" id="4">
                                    <input type="radio" class="d-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Total Menu</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-tap-02"></i>
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="chartBig1"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Tabel Penjualan</h4>
              <p class="card-category">Daftar Penjualan Tahun Ini</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">

            <table id="datatable" class="display nowrap table" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tanggal Penjualan</th>
                        <th>Kode Penjualaan</th>
                        <th>Nama Customer</th>
                        <th>Nilai Penjualan</th>
                    </tr>
                </thead>
            </table>
        </div>
        </div>

    </div>

</div>
@endsection

