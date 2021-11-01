@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    <h5><b>Jasa Voyage Charter</b></h5>

                    {{-- Jasa Voyage Charter --}}
                    <div class="row mb-3">
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
                    <h5><b>Jasa Time Charter</b></h5>

                    <div class="row mb-4">
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

                    {{-- Jasa Container --}}
                    <h5><b>Jasa Container</b></h5>
                    <div class="row mb-4">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_container1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-container/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_container2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-container/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_container3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-container/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_container4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-container/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_container5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-container/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jasa General Cargo --}}
                    <h5><b>Jasa General Cargo</b></h5>
                    <div class="row mb-4">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_cargo1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-general-cargo/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_cargo2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-general-cargo/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_cargo3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-general-cargo/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_cargo4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-general-cargo/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_cargo5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-general-cargo/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jasa Kapal Layar --}}
                    <h5><b>Jasa Kapal Layar</b></h5>
                    <div class="row mb-4">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_kapallayar1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-kapal-layar/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_kapallayar2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-kapal-layar/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_kapallayar3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-kapal-layar/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_kapallayar4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-kapal-layar/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_kapallayar5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/jasa-kapal-layar/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jasa Gudang PKG --}}
                    <h5><b>Jasa Gudang PKG</b></h5>
                    <div class="row mb-4">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_gudangpkg1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/gudang-pkg/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_gudangpkg2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/gudang-pkg/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_gudangpkg3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/gudang-pkg/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_gudangpkg4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/gudang-pkg/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_gudangpkg5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/gudang-pkg/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jasa Rekap Alih Stok --}}
                    <h5><b>Jasa Rekap Alih Stok</b></h5>
                    <div class="row mb-4">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_rekapalihstok1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-alih-stok/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_rekapalihstok2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-alih-stok/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_rekapalihstok3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-alih-stok/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_rekapalihstok4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-alih-stok/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_rekapalihstok5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-alih-stok/?cat=5">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jasa Rekap Tarip Franco --}}
                    <h5><b>Jasa Rekap Tarip Franco</b></h5>
                    <div class="row mb-4">
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 89, 150)">
                                <div class="card-body">
                                    <h4>Masih Lama</h4>
                                    <p>jumlah: {{ $len_data_rekaptaripfranco1 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-tarip-franco/?cat=1">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(35, 150, 54)">
                                <div class="card-body">
                                    <h4>< dari 1 tahun</h4>
                                    <p>jumlah: {{ $len_data_rekaptaripfranco2 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-tarip-franco/?cat=2">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(176, 185, 38)">
                                <div class="card-body">
                                    <h4>< 6 bulan</h4>
                                    <p>jumlah: {{ $len_data_rekaptaripfranco3 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-tarip-franco/?cat=3">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 123, 35)">
                                <div class="card-body">
                                    <h4>< 3 bulan</h4>
                                    <p>jumlah: {{ $len_data_rekaptaripfranco4 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-tarip-franco/?cat=4">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl col-md-6">
                            <div class="card text-white" style="background-color: rgb(150, 35, 35)">
                                <div class="card-body">
                                    <h4>Perlu Dipantau</h4>
                                    <p>jumlah: {{ $len_data_rekaptaripfranco5 }}</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/rekap-tarip-franco/?cat=5">View Details</a>
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
