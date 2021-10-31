@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <p>Jasa Voyage Charter</p>

                    {{-- Jasa Voyage Charter --}}
                    <div class="row mb-5">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_voyage1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-voyage-charter/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_voyage2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-voyage-charter/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_voyage3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-voyage-charter/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_voyage4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-voyage-charter/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_voyage5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-voyage-charter/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jasa Time Charter --}}
                    <p>Jasa Time Charter</p>
                    <div class="row">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_time1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-time-charter/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_time2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-time-charter/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_time3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-time-charter/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_time4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-time-charter/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_time5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-time-charter/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
