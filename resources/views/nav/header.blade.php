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
                @case ('Data Outsorching')
                    Data Outsorching
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
                @case ('Data Pemakaian Obat')
                    Data Pemakaian Obat
                    @break
                @default
                    Dashboard
                    @break
            @endswitch
            - Clinic System
    </title>

    <link rel="stylesheet" href="{{asset('/template/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/assets/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/pages/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{asset('asset/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/font-awesome.min.css')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/img/clinic.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/img/clinic.png')}}">
    <script src="{{asset('asset/jquery-3.7.0.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            header: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

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
                            <a href="{{route('dashboard')}}">
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
                        <li class="sidebar-item {{$title == "Dashboard" ? 'active' : ''}}">
                            <a href="{{route('dashboard')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>     
                        <li class="sidebar-item has-sub {{$title == 'Data Obat' || $title == 'Data Alat' || $title == 'Data User' || $title == 'Data Outsorching' ? 'active' : ''}}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu {{$title == 'Data Obat' || $title == 'Data Alat' || $title == 'Data User' || $title == 'Data Outsorching' ? 'active' : ''}}">
                                <li class="submenu-item {{$title == 'Data Obat' ? 'active' : ''}}">
                                    <a href="{{route('data-obat')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Data Obat</span>
                                    </a>
                                </li>   
                                <li class="submenu-item {{ $title == 'Data Alat' ? 'active' : ''}}">
                                    <a href="{{route('data-alat')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Data Alat</span>
                                    </a>
                                </li> 
                                <li class="submenu-item {{$title == 'Data Outsorching' ? 'active' : ''}}">
                                    <a href="{{route('data-os')}}" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data OS</span>
                                    </a>
                                </li>  
                                <li class="submenu-item {{$title == 'Data User' ? 'active' : ''}}">
                                    <a href="{{route('data-user')}}" class='submenu-link'>
                                        <i class="bi bi-person-plus-fill"></i>
                                            <span>Data User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item {{$title == 'Data HW' ? 'active' : ''}}">
                            <a href="{{route('data-hw')}}" class='sidebar-link'>
                                <i class="bi bi-person-heart"></i>
                                <span>Data Pengambilan HW</span>
                            </a>
                        </li>
                        <li class="sidebar-item has-sub {{$title == 'Tambah Pemakaian' || $title == 'Tambah Pemakaian Manual' ? 'active' : ''}}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Data Permintaan Obat</span>
                            </a>
                            <ul class="submenu {{$title == 'Tambah Pemakaian' || $title == 'Tambah Pemakaian Manual' ? 'active' : ''}}">
                                <li class="submenu-item {{$title == 'Tambah Pemakaian' ? 'active' : ''}}">
                                    <a href="{{route('form-pemakaian')}}" class='submenu-link'>
                                        <i class="bi bi-capsule"></i>
                                            <span>Tambah Permintaan</span>
                                    </a>
                                </li>   
                                <li class="submenu-item {{$title == 'Tambah Pemakaian Manual' ? 'active' : ''}}">
                                    <a href="{{route('form-pemakaian-manual')}}" class='submenu-link'>
                                        <i class="bi bi-gear-wide-connected"></i>
                                            <span>Tambah Manual</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
                        <li class="sidebar-item {{$title == 'Data Pemakaian Obat' ? 'active' : ''}}">
                            <a href="{{route('pemakaian-obat')}}" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical"></i>
                                <span>Data Permintaan Obat</span>
                            </a>
                        </li>   
                        <li class="sidebar-item {{$title == 'Excess Data' ? 'active' : ''}}">
                            <a href="{{route('pemakaian-lebih')}}" class='sidebar-link'>
                            <i class="bi bi-capsule-pill"></i>
                                <span>Excess Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{$title == 'Peminjaman Alat' ? 'active' : ''}}">
                            <a href="{{route('peminjaman-alat')}}" class='sidebar-link'>
                                <i class="bi bi-hdd-network"></i>
                                <span>Data Peminjaman Alat</span>
                            </a>
                        </li>    
                            <li class="sidebar-item {{$title == 'Karyawan Istirahat' ? 'active' : ''}}">
                                <a href="{{route('istirahat')}}" class='sidebar-link'>
                                <i class="bi bi-hospital"></i>
                                    <span>Karyawan Istirahat</span>
                                </a>
                            </li>     
                        <li class="sidebar-item {{$title == 'Data MCU' ? 'active' : ''}}">
                            <a href="{{route('data-mcu')}}" class='sidebar-link'>
                                <i class="bi bi-files"></i>
                                <span>Data MCU</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{$title == 'RM Karyawan' ? 'active' : ''}}">
                            <a href="{{route('data-rm')}}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                                <span>RM Karyawan</span>
                            </a>
                        </li>   
                            <li class="sidebar-item has-sub {{$title == "Report Weekly Pemakaian" || $title == "Report Monthly Pemakaian" || $title == "Report Weekly Istirahat" || $title == "Report Monthly Istirahat" ? 'active' : ''}}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-folder-fill"></i>
                                <span>Report</span>
                            </a>
                            <ul class="submenu {{$title == "Report Weekly Pemakaian" || $title == "Report Monthly Pemakaian" || $title == "Report Weekly Istirahat" || $title == "Report Monthly Istirahat" ? 'active' : ''}}">
                                <li class="submenu-item {{$title == "Report Weekly Pemakaian" ? 'active' : ''}}">
                                    <a href="{{route('reportweeklyp')}}" class="submenu-link"
                                    >Report Weekly Pemakaian</a>
                                </li>
                                <li class="submenu-item {{$title == "Report Monthly Pemakaian" ? 'active' : ''}}">
                                    <a href="{{route('reportmonthlyp')}}" class="submenu-link"
                                    >Report Monthly Pemakaian</a>
                                </li>    
                                <li class="submenu-item {{$title == "Report Weekly Istirahat" ? 'active' : ''}}">
                                    <a href="{{route('reportweeklyi')}}" class="submenu-link"
                                    >Report Weekly Istirahat</a>
                                </li> 
                                <li class="submenu-item {{$title == "Report Monthly Istirahat" ? 'active' : ''}}">
                                    <a href="{{route('reportmonthlyi')}}" class="submenu-link"
                                    >Report Monthly Istirahat</a>
                                </li>   
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="" id="buttonLogout" class='sidebar-link'>
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

    <script src="{{ asset('template/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/simple-datatables.js') }}"></script>

    <script src="{{ asset('template/assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/filepond.js') }}"></script>
    <script src="{{ asset('template/assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/sweetalert2.js') }}"></script>
    {{-- CDN DATATABLE --}}
    <script src="{{asset('asset/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('asset/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('asset/datatable/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('asset/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('asset/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('asset/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('asset/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('asset/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('asset/datatable/buttons.colVis.min.js')}}"></script>
    {{-- <script src="https://cdn.datatables.net/scroller/2.3.0/js/dataTables.scroller.min.js"></script> --}}
    <script src="{{asset('asset/datatable/dataTables.select.min.js')}}"></script>


<script type="text/javascript">
    document.getElementById('buttonLogout').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title : 'Logout',
            text : 'Are you sure want Logout?',
            icon : 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Logout!',
        }).then((result)=>{
            if(result.isConfirmed){
                document.getElementById('logout').submit();
            }
        })
    })
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