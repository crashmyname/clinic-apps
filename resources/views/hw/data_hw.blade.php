@extends('nav/header')
@section('container')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    
    <h4>
    {{$hariindo}}
    </h4>
    <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data HW</h1>
            <p class="mb-0">Berikut adalah halaman HW</p>
            @if(session()->has('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('berhasil')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('update'))  
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('delete')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Cover Page</h6>
                    <button type="button" class="btn btn-outline-success block" data-bs-toggle="modal"
                        data-bs-target="#border-less">
                        Tambah Data
                    </button>
                    <!-- BorderLess Modal Modal -->
                    <div class="modal fade text-left modal-lg centered" id="border-less" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Input Data HW</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row match-height">
                                        <div class="col-md-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Form Input</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>NIK</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select name="emp" id="emp"
                                                                            class="form-control" required>
                                                                            <option value=""> - </option>
                                                                            @foreach ($result as $data)
                                                                            <option value="{{$data['nik']}}">{{$data['nik']}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Nama Karyawan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select class="form-control" name="nama" id="nama">

                                                                    </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Section</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select class="form-control" name="section" id="section">

                                                                    </select>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tanggal"
                                                                            >
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="simpan"
                                                                            onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                                        <button type="reset"
                                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#border-less2">
                        Tambah Data Manual
                    </button>
                    <!-- BorderLess Modal Modal -->
                    <div class="modal fade text-left modal-lg centered" id="border-less2" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Input Data Pemakaian</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row match-height">
                                        <div class="col-md-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Form Input</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>NIK</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="emp"
                                                                            placeholder="Masukan NIK">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Nama</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="nama"
                                                                            placeholder="Masukan Nama">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Section</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="section"
                                                                            placeholder="Masukan Nama Section">
                                                                    </div>
                                                                    <!-- <div class="col-md-4">
                                                                        <label>Bulan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <select type="text" name="bulan"
                                                                            class="form-control" required>
                                                                            <option value="<?php echo $a = date("m"); 
                                                                             ?>"><?php 
                                                                             $a = date("m"); 
                                                                             if ($a == 01) {
                                                                                # code...
                                                                                echo "Januari";
                                                                             }elseif ($a == 02) {
                                                                                # code...
                                                                                echo "Februari";
                                                                             }elseif ($a == 03) {
                                                                                # code...
                                                                                echo "Maret";
                                                                             }elseif ($a == 04) {
                                                                                # code...
                                                                                echo "April";
                                                                             }elseif ($a == 05) {
                                                                                # code...
                                                                                echo "Mei";
                                                                             }elseif ($a == 06) {
                                                                                # code...
                                                                                echo "Juni";
                                                                             }elseif ($a == 07) {
                                                                                # code...
                                                                                echo "Juli";
                                                                             }elseif ($a == '08') {
                                                                                # code...
                                                                                echo "Agustus";
                                                                             }elseif ($a == '09') {
                                                                                # code...
                                                                                echo "September";
                                                                             }elseif ($a == '10') {
                                                                                # code...
                                                                                echo "Oktober";
                                                                             }elseif ($a == 11) {
                                                                                # code...
                                                                                echo "November";
                                                                             }else {
                                                                                # code...
                                                                                echo "Desember";
                                                                             }
                                                                             ?></option>
                                                                            <option value="01">Januari</option>
                                                                            <option value="02">Februari</option>
                                                                            <option value="03">Maret</option>
                                                                            <option value="04">April</option>
                                                                            <option value="05">Mei</option>
                                                                            <option value="06">Juni</option>
                                                                            <option value="07">Juli</option>
                                                                            <option value="08">Agustus</option>
                                                                            <option value="09">September</option>
                                                                            <option value="10">Oktober</option>
                                                                            <option value="11">November</option>
                                                                            <option value="12">Desember</option>
                                                                        </select>
                                                                    </div> -->
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tanggal"
                                                                            >
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="simpan"
                                                                            onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                                        <button type="reset"
                                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <button type="button" class="btn btn-outline-success block" data-bs-toggle="modal"
                        data-bs-target="#border-less3">
                        Tambah Data Excel
                    </button>
                    <!-- BorderLess Modal Modal -->
                    <div class="modal fade text-left modal-lg centered" id="border-less3" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Input Data Dengan Excel</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row match-height">
                                        <div class="col-md-12 col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Form Input</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" action="{{route('import-excel')}}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>FILE EXCEL</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="file" id="first-name"
                                                                            class="form-control" name="file_excel"
                                                                            placeholder="Masukan Data Alat">
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="excel"
                                                                            onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                                        <button type="reset"
                                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Section</th>
                                    <th>Bulan</th>
                                    <th>Tanggal</th>
                                    <th width="100px">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
            <footer class="">
                <div class="container-fluid fixed-bottom">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>Copyright &copy; 2023-2024</p>
                        </div>
                        <div class="float-end">
                            <p><a target="_blank" href="http://10.203.68.7:90/iseportal/">PT.Indonesia Stanley Electric</a>. Clinic System</p>
                        </div>
                    </div>
                </div>
            </footer>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    var dataTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax : "{{route('data-mcu')}}",
        // URL untuk meminta data dari server
        columns: [
            // Konfigurasi kolom
            { "data": null,"sortable": false, 
            render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }  
    },
            { data: "nik", name: "nik"},
            { data: "no_rm", name: "no_rm"},
            { data: "factory", name: "factory" },
            { data: "tgl_pemeriksaan", name: "tgl_pemeriksaan" },
            { data: "status_gizi", name: "status_gizi"},
            { data: "buta_warna", name: "buta_warna"},
            { data: "anamnesa", name: "anamnesa"},
            { data: "radiology_test", name:"radiology_test"},
            { data: "dokter", name: "dokter"},
            { data: "fitness_s", name: "fitness_s"},
            { data: "keterangan", name: "keterangan"},
            // ...
        ],
        lengthMenu: [10, 25, 50, 100, 100000],
            dom: 'Blfrtip',
            buttons:[
                {
                    extend: 'copy',
                    text:'COPY',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'pdf',
                    text:'PDF',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'print',
                    text:'CETAK',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'csv',
                    text:'CSV',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'excel',
                    text:'EXCEL',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'colvis',
                    text:'COLUMN VISIBLE',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                }
            ]
    });
});

        $("#emp").change(function(){
            var emp = $("#emp").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('DataApi') }}",
                data: {
                    _token: csrfToken,
                    emp: emp,
                },
                success: function(data){
                    var options = '';
                    data.forEach(function (m) {
                        options += "<option value='" + m.nama + "'>" + m.nama + "</option>";
                    });
                    $("#nama").html(options);
                }
            });
        });

        $("#emp").change(function(){
            var sect = $("#emp").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('DataApiSection') }}",
                data: {
                    _token: csrfToken,
                    emp: sect,
                },
                success: function(data){
                    var options = '';
                    data.forEach(function (m) {
                        options += "<option value='" + m.kode_section + "'>" + m.kode_section + "</option>";
                    });
                    $("#section").html(options);
                }
            });
        });
    
</script>
    
@endsection