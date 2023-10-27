<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
            @switch ($title)
                @case ('Dashborad')
                    Dashboard
                    @break
                @case ('Data Obat')
                    Data Obat
                    @break
                @case ('Data Alat')
                    Data Alat
                    @break
                @case ('Data User')
                    Data User
                    @break
                @case ('Data HW')
                    Data HW
                    @break
                @case ('Data MCU')
                    Data MCU
                    @break
                @case ('Tambah Pemakaian')
                    Tambah Pemakaian
                    @break
                @case ('Tambah Pemakaian Manual')
                    Tambah Pemakaian Manual
                    @break
                @case ('Excess Data')
                    Excess Data
                    @break
                @case ('Data Peminjaman Alat')
                    Data Peminjaman Alat
                    @break
                @case ('RM Karyawan')
                    Rekam Medis Karyawan
                    @break
                @case ('Karyawan Istirahat')
                    Karyawan Istirahat
                    @break
                @case ('Report Weekly Pemakaian')
                    Report Weekly Pemakaian
                    @break
                @case ('Report Monthly Pemakaian')
                    Report Monthly Pemakaian
                    @break
                @case ('Report Weekly Istirahat')
                    Report Weekly Istirahat
                    @break
                @case ('Report Monthly Istirahat')
                    Report Monthly Istirahat
                    @break
                @default
                    Dashboard
                    @break
            @endswitch
            - Clinic System
    </title>

    <link rel="stylesheet" href="{{asset('/template/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('/template/assets/css/main/app-dark.css')}}">
    <link rel="stylesheet" href="{{asset('/template/assets/extensions/@fortawesome/fontawesome-free/css/fontawesome.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/datatable/jquery.dataTables.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('/datatable/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/template/assets/css/shared/iconly.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{asset('/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/img/clinic.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/img/clinic.png')}}">
    <script src="{{asset('jquery-3.4.1.min.js')}}"></script>

    <style>
        .dataTables_wrapper {
    font-family: tahoma;
    font-size: 14px;
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}
.table {
    font-family: tahoma;
    font-size: 14px;
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}
    </style>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{asset('/img/ise.png')}}" alt="Logo" width="80px" srcset="">
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        @if ($title == "Dashboard")
                        <li class="sidebar-item active">
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @endif
                        @if ($title == "Data Obat" || $title == "Data Alat" || $title == "Data User")       
                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu active">
                            @if ($title == "Data Obat")
                                <li class="submenu-item active">
                                    <a href="{{route('data-obat')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Data Obat</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('data-obat')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Data Obat</span>
                                    </a>
                                </li>                               
                            @endif
                            @if ($title == "Data Alat")    
                                <li class="submenu-item active">
                                    <a href="{{route('data-alat')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Data Alat</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('data-alat')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Data Alat</span>
                                    </a>
                                </li>
                            @endif
                            @if($title == "Data Outsorching")    
                                <li class="submenu-item active">
                                    <a href="" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data OS</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data OS</span>
                                    </a>
                                </li>
                            @endif
                            @if($title == "Data User")    
                                <li class="submenu-item active">
                                    <a href="{{route('data-user')}}" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data User</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('data-user')}}" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data User</span>
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </li>
                        @else
                            <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu">
                            @if($title == "Data Obat")
                                <li class="submenu-item active">
                                    <a href="{{route('data-obat')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Data Obat</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('data-obat')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Data Obat</span>
                                    </a>
                                </li>
                            @endif
                            @if($title == "Data Alat")    
                                <li class="submenu-item active">
                                    <a href="{{route('data-alat')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Data Alat</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('data-alat')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Data Alat</span>
                                    </a>
                                </li>
                            @endif
                            @if($title == "Data Outsorching")    
                                <li class="submenu-item active">
                                    <a href="" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data OS</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data OS</span>
                                    </a>
                                </li>
                            @endif
                            @if($title == "Data User")    
                                <li class="submenu-item active">
                                    <a href="{{route('data-user')}}" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data User</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('data-user')}}" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data User</span>
                                    </a>
                                </li>
                            @endif
                            </ul>
                        </li>
                        @endif
                        @if($title == "Data HW")
                        <li class="sidebar-item active">
                            <a href="{{route('data-hw')}}" class='sidebar-link'>
                                <i class="bi bi-person-heart"></i>
                                <span>Data Pengambilan HW</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{route('data-hw')}}" class='sidebar-link'>
                                <i class="bi bi-person-heart"></i>
                                <span>Data Pengambilan HW</span>
                            </a>
                        </li>
                        @endif
                        @if($title == "Tambah Pemakaian" || $title == "Tambah Pemakaian Manual")
                        <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Data Permintaan Obat</span>
                            </a>
                            <ul class="submenu active">
                            @if($title == "Tambah Pemakaian")
                                <li class="submenu-item active">
                                    <a href="{{route('form-pemakaian')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Tambah Permintaan</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('form-pemakaian')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Tambah Permintaan</span>
                                    </a>
                                </li>
                            @endif    
                            @if($title == "Tambah Pemakaian Manual")
                                <li class="submenu-item active">
                                    <a href="{{route('form-pemakaian-manual')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Tambah Manual</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('form-pemakaian-manual')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Tambah Manual</span>
                                    </a>
                                </li>
                            @endif    
                            </ul>
                        </li>
                        @else
                            <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Data Permintaan Obat</span>
                            </a>
                            <ul class="submenu">
                            @if($title == "Tambah Pemakaian")
                                <li class="submenu-item active">
                                    <a href="{{route('form-pemakaian')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Tambah Permintaan</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('form-pemakaian')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Tambah Permintaan</span>
                                    </a>
                                </li>
                            @endif
                            @if($title == "Tambah Pemakaian Manual")    
                                <li class="submenu-item active">
                                    <a href="{{route('form-pemakaian-manual')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Tambah Manual</span>
                                    </a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('form-pemakaian-manual')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Tambah Manual</span>
                                    </a>
                                </li>
                            @endif    
                            </ul>
                        </li>
                        @endif
                        @if($title == "Data Pemakaian Obat")
                        <li class="sidebar-item active">
                            <a href="{{route('pemakaian-obat')}}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical"></i>
                                <span>Data Permintaan Obat</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{route('pemakaian-obat')}}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical"></i>
                                <span>Data Permintaan Obat</span>
                            </a>
                        </li>
                        @endif
                        @if($title == "Excess Data")    
                        <li class="sidebar-item active">
                            <a href="{{route('pemakaian-lebih')}}" class='sidebar-link'>
                            <i class="bi bi-capsule-pill"></i>
                                <span>Excess Data</span>
                            </a>
                        </li>
                        @else
                            <li class="sidebar-item">
                                <a href="{{route('pemakaian-lebih')}}" class='sidebar-link'>
                                <i class="bi bi-capsule-pill"></i>
                                <span>Excess Data</span>
                            </a>
                        </li>
                        @endif
                        @if($title == "Peminjaman Alat")
                        <li class="sidebar-item active">
                            <a href="{{route('peminjaman-alat')}}" class='sidebar-link'>
                                <i class="bi bi-hdd-network"></i>
                                <span>Data Peminjaman Alat</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{route('peminjaman-alat')}}" class='sidebar-link'>
                                <i class="bi bi-hdd-network"></i>
                                <span>Data Peminjaman Alat</span>
                            </a>
                        </li>
                        @endif
                        @if($title == "Karyawan Istirahat")    
                            <li class="sidebar-item active">
                                <a href="{{route('istirahat')}}" class='sidebar-link'>
                                <i class="bi bi-hospital"></i>
                                    <span>Karyawan Istirahat</span>
                                </a>
                            </li>
                        @else    
                            <li class="sidebar-item">
                                <a href="{{route('istirahat')}}" class='sidebar-link'>
                                    <i class="bi bi-hospital"></i>
                                    <span>Karyawan Istirahat</span>
                                </a>
                            </li>
                        @endif
                        @if($title == "Data MCU")        
                        <li class="sidebar-item active">
                            <a href="{{route('data-mcu')}}" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Data MCU</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{route('data-mcu')}}" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Data MCU</span>
                            </a>
                        </li>
                        @endif
                        @if($title == "RM Karyawan")
                        <li class="sidebar-item active">
                            <a href="{{route('data-rm')}}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                                <span>RM Karyawan</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a href="{{route('data-rm')}}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                                <span>RM Karyawan</span>
                            </a>
                        </li>
                        @endif
                        @if($title == "Report Weekly Pemakaian" || $title == "Report Monthly Pemakaian" || $title == "Report Weekly Istirahat" || $title == "Report Monthly Istirahat")    
                            <li class="sidebar-item has-sub active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Report</span>
                            </a>
                            <ul class="submenu active">
                            @if($title == "Report Weekly Pemakaian")
                                <li class="submenu-item active">
                                    <a href="{{route('reportweeklyp')}}" class="submenu-link"
                                    >Report Weekly Pemakaian</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportweeklyp')}}" class="submenu-link"
                                    >Report Weekly Pemakaian</a>
                                </li>
                            @endif
                            @if($title == "Report Monthly Pemakaian")
                                <li class="submenu-item active">
                                    <a href="{{route('reportmonthlyp')}}" class="submenu-link"
                                    >Report Monthly Pemakaian</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportmonthlyp')}}" class="submenu-link"
                                    >Report Monthly Pemakaian</a>
                                </li>
                            @endif
                            @if($title == "Report Weekly Istirahat")    
                                <li class="submenu-item active">
                                    <a href="{{route('reportweeklyi')}}" class="submenu-link"
                                    >Report Weekly Istirahat</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportweeklyi')}}" class="submenu-link"
                                    >Report Weekly Istirahat</a>
                                </li>
                            @endif
                            @if($title == "Report Monthly Istirahat")    
                                <li class="submenu-item active">
                                    <a href="{{route('reportmonthlyi')}}" class="submenu-link"
                                    >Report Monthly Istirahat</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportmonthlyi')}}" class="submenu-link"
                                    >Report Monthly Istirahat</a>
                                </li>
                            @endif    
                            </ul>
                        </li>
                        @else
                            <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Report</span>
                            </a>
                            <ul class="submenu">
                            @if($title == "Report Weekly Pemakaian")
                                <li class="submenu-item active">
                                    <a href="{{route('reportweeklyp')}}" class="submenu-link"
                                    >Report Weekly Pemakaian</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportweeklyp')}}" class="submenu-link"
                                    >Report Weekly Pemakaian</a>
                                </li>
                            @endif
                            @if($title == "Report Monthly Pemakaian")    
                                <li class="submenu-item active">
                                    <a href="{{route('reportmonthlyp')}}" class="submenu-link"
                                    >Report Monthly Pemakaian</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportmonthlyp')}}" class="submenu-link"
                                    >Report Monthly Pemakaian</a>
                                </li>
                            @endif
                            @if($title == "Report Weekly Istirahat")    
                                <li class="submenu-item active">
                                    <a href="{{route('reportweeklyi')}}" class="submenu-link"
                                    >Report Weekly Istirahat</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportweeklyi')}}" class="submenu-link"
                                    >Report Weekly Istirahat</a>
                                </li>
                            @endif
                            @if($title == "Report Monthly Istirahat")    
                                <li class="submenu-item active">
                                    <a href="{{route('reportmonthlyi')}}" class="submenu-link"
                                    >Report Monthly Istirahat</a>
                                </li>
                            @else    
                                <li class="submenu-item">
                                    <a href="{{route('reportmonthlyi')}}" class="submenu-link"
                                    >Report Monthly Istirahat</a>
                                </li>
                            @endif    
                            </ul>
                        </li>
                        @endif
                        <li class="sidebar-item">
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout').submit(); return confirm('Apakah yakin anda ingin Logout?');" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                            <form action="{{route('logout')}}" id="logout" method="post">
                            @csrf
                            </form>
                        </li>
                </div>
            </div>
        </div>
    </div>

    @yield('container')

<script src="{{asset('/template/assets/js/bootstrap.js')}}"></script>
<script src="{{asset('/template/assets/js/app.js')}}"></script>
<script src="{{asset('/template/assets/js/pages/horizontal-layout.js')}}"></script>
<!-- <script src="style.js"></script> -->

<!-- Need: Apexcharts -->
{{-- <script src="{{asset('/template/assets/extensions/apexcharts/apexcharts.min.js')}}"></script> --}}
<script src="{{asset('/template/assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
{{-- <script src="{{asset('/datatable/jquery.dataTables.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.flash.min.js')}}"></script>
<script src="{{asset('/datatable/jszip.min.js')}}"></script>
<script src="{{asset('/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('/datatable/buttons.colVis.min.js')}}"></script>
<script src="{{asset('/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/datatable/responsive.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#postLink').click(function(e) {
            e.preventDefault(); // Mencegah hyperlink melakukan navigasi standar

            // Data yang ingin Anda kirim dalam permintaan POST
            var postData = {
                _token: '{{ csrf_token() }}', // Token CSRF
            };

            $.post("{{route('logout')}}", postData, function(response) {
                // Tanggapan dari server
                console.log(response);
                // Anda dapat menambahkan kode lain untuk menangani tanggapan di sini
            });
        });
    });
</script>
<script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>

</body>

</html>