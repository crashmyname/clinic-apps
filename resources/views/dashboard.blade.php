@extends('nav/header')
@section('styles')
<link rel="stylesheet" href="{{asset('/template/assets/css/main/app.css')}}">
<link rel="stylesheet" href="{{asset('/template/assets/css/main/app-dark.css')}}">
<link rel="stylesheet" href="{{asset('/template/assets/extensions/@fortawesome/fontawesome-free/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/datatable/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/datatable/buttons.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('/template/assets/css/shared/iconly.css')}}">
<link rel="stylesheet" href="{{asset('/template/assets/extensions/sweetalert2/sweetalert2.min.css')}}"/>
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/img/clinic.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/img/clinic.png')}}">
@endsection
@section('container')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Dashboard Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="bi bi-capsule d-flex justify-content-center align-items-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="p_obat">
                                        <h6 class="text-muted font-semibold">Total Obat</h6>
                                        <h6 class="font-extrabold mb-0">{{$obat->Count()}}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a  href="user">
                                        <h6 class="text-muted font-semibold">Total User</h6>
                                        <h6 class="font-extrabold mb-0">{{$user->Count()}}</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="bi bi-capsule-pill d-flex justify-content-center align-items-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="max_keluhan">
                                        <h6 class="text-muted font-semibold">Keluhan</h6>
                                        <h6 class="font-extrabold mb-0">{{$pemakaian->Count()}}</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <!-- <i class="iconly-boldProfile"></i> -->
                                            <i class="bi bi-boxes d-flex justify-content-center align-items-center"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="data_alat">
                                        <h6 class="text-muted font-semibold">Alat</h6>
                                        <h6 class="font-extrabold mb-0">{{$alat->Count()}}</h6>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="max_obat">
                                        <h6 class="text-muted font-semibold">Pemakaian Obat</h6>
                                        <h6 class="font-extrabold mb-0">{{$pemakaian->Count()}}</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="karyawan_istirahat">
                                        <h6 class="text-muted font-semibold">Data Emp Istirahat</h6>
                                        <h6 class="font-extrabold mb-0">{{$rest->Count()}}</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <a href="{{route('data-mcu')}}">
                                        <h6 class="text-muted font-semibold">Data MCU</h6>
                                        <h6 class="font-extrabold mb-0">{{$mcu->Count()}}</h6></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
    <div class="card">
        <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="{{asset('storage/post-image/'. auth()->user()->foto)}}" alt="Face 1">
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold" style="text-transform:uppercase;">
                        {{auth()->user()->name == 'administrator' ? '' : 'Admin'}}
                    </h5>
                    <h6 class="text-muted mb-0">{{"@".auth()->user()->name}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection
@section('scripts')
<script src="{{asset('jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/template/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('/template/assets/js/app.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/horizontal-layout.js')}}"></script>
<!-- <script src="style.js"></script> -->

<!-- Need: Apexcharts -->
<script src="{{asset('/template/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('/template/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/simple-datatables.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('/template/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/sweetalert2.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="{{asset('/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.flash.min.js')}}"></script>
<script src="{{asset('/datatable/jszip.min.js')}}"></script>
<script src="{{asset('/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.colVis.min.js')}}"></script>
@endsection