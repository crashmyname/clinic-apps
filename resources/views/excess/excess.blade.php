@extends('nav.header')
@section('container')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    
    <h4>{{$hariindo}}</h4>
    <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data Permintaan Obat Berlebih</h1>
            <p class="mb-0">Berikut adalah halaman Permintaan</p>
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
                                                                    <select name="emp" id="emp"
                                                                            class="form-control" required>
                                                                            <option value=""> - </option>
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
                                                                        <label>Keluhan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="keluhan"
                                                                            placeholder="Masukan Keluhan sakit" style="text-transform:uppercase;">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jenis Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="jns_obat"
                                                                            class="form-control" required>
                                                                            <option value=""> - </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jumlah</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="number" id="first-name"
                                                                            class="form-control" name="jumlah"
                                                                            placeholder="Masukan Jumlah Obat">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Pemakaian</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_pemakaian"
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
                                                                            placeholder="Masukan Nama" style="text-transform:uppercase;">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Section</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="section"
                                                                            placeholder="Masukan Nama Section" style="text-transform:uppercase;">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Keluhan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="keluhan"
                                                                            placeholder="Masukan Keluhan sakit" style="text-transform:uppercase;">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jenis Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="jns_obat"
                                                                            class="form-control" required>
                                                                            <option value=""> - </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jumlah</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="number" id="first-name"
                                                                            class="form-control" name="jumlah"
                                                                            placeholder="Masukan Jumlah Obat">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Pemakaian</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_pemakaian"
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
                                                        <form class="form form-horizontal" id="FormExcel" action="{{route('import-excess')}}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>FILE EXCEL</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="file" id="file_excel"
                                                                            class="form-control" name="file_excel"
                                                                            >
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="excel" id="importExcess"
                                                                            >Submit</button>
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
                                    <th>Keluhan</th>
                                    <th>Jenis Obat</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Permintaan</th>
                                    <th width="100px">ACTION</th>
                                </tr>
                            </thead>
                            {{-- <tbody>

                                <tr align="center">
                                <td>{{++$no}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td width="200px"><a class="btn btn-success" name="detail" href=""><i class="bi bi-info-circle"></i></a> <a class="btn btn-warning" name="edit" href=""><i class="bi bi-pencil"></i></a> <a class="btn btn-danger" href=""
                                            name="hapus" title="Hapus Data" onclick="return confirm('Apakah yakin mau menghapus data?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                </tr>
                            </tbody> --}}
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
                            <p><a target="_blank" href="http://10.203.68.47:90/iseportal/">PT.Indonesia Stanley Electric</a>. Clinic System</p>
                        </div>
                    </div>
                </div>
            </footer>
</div>
<script>
     $("#emp").change(function() {
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
                    success: function(data) {
                        var options = '';
                        data.forEach(function(m) {
                            options += "<option value='" + m.nama + "'>" + m.nama + "</option>";
                        });
                        $("#nama").html(options);
                    }
                });
            });

            $("#emp").change(function() {
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
                    success: function(data) {
                        var options = '';
                        data.forEach(function(m) {
                            options += "<option value='" + m.kode_section + "'>" + m.kode_section +
                                "</option>";
                        });
                        $("#section").html(options);
                    }
                });
            });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            select: true,
            dom: 'Bfrtip',
            ajax: '{{route('pemakaian-lebih')}}',
            columns: [
                {
                    data:'id_offer',
                    name:'id_offer',
                    render:function(row,data,type,meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data:'nik',
                    name:'nik'
                },
                {
                    data:'nama',
                    name:'nama'
                },
                {
                    data:'kode_section',
                    name:'kode_section'
                },
                {
                    data:'keluhan',
                    name:'keluhan'
                },
                {
                    data:'nama_obat',
                    name:'obat.nama_obat',
                    searchable: true
                },
                {
                    data:'jumlah',
                    name:'jumlah'
                },
                {
                    data:'tgl_pemakaian',
                    name:'tgl_pemakaian'
                },
                {
                    data:'id_offer',
                    name:'action',
                    searchable: false,
                    render:function(row,type,data){
                        var editPemakaianRoute = "{{ url('/editpemakaianobat') }}";
                        return `
                            <a href="${editPemakaianRoute}/${data}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                            <button data-id="${data}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        `;
                    },
                },
            ],
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
            buttons:[
                {
                    extend: 'copy',
                    text:'COPY',
                    exportOptions:{
                        columns:':visible',
                    columnDefs:[{
                        targets: -1,
                        visible: false
                    }]
                    }
                },
                {
                    extend: 'pdf',
                    text:'PDF',
                    exportOptions:{
                        columns:':visible',
                    columnDefs:[{
                        targets: -1,
                        visible: false
                    }]
                    }
                },
                {
                    extend: 'print',
                    text:'CETAK',
                    exportOptions:{
                        columns:':visible',
                    columnDefs:[{
                        targets: -1,
                        visible: false
                    }]
                    }
                },
                {
                    extend: 'csv',
                    text:'CSV',
                    exportOptions:{
                        columns:':visible',
                    columnDefs:[{
                        targets: -1,
                        visible: false
                    }]
                    }
                },
                {
                    extend: 'excel',
                    text:'EXCEL',
                    exportOptions:{
                        columns:':visible',
                    columnDefs:[{
                        targets: -1,
                        visible: false
                    }]
                    }
                },
                {
                    extend: 'colvis',
                    text:'COLUMN VISIBLE',
                    exportOptions:{
                        columns:':visible',
                    columnDefs:[{
                        targets: -1,
                        visible: false
                    }]
                    }
                }
            ]
        });
        $('#importExcess').on('click', function(e){
            e.preventDefault();
            var formExcess = new FormData($('#FormExcel')[0]);
            $.ajax({
                type: 'POST',
                url: '{{route('import-excess')}}',
                data: formExcess,
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                dataType: 'json',
                success: function(response){
                    if(response.status === 200)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Import Excess Data Successfully',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed Import'
                        });
                    }
                },
                error: function(error){
                    console.error(error);
                }
            })
        })
    });
    
</script>
    
@endsection