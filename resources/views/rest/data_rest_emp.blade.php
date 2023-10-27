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
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data Karyawan Istirahat</h1>
            <p class="mb-0">Berikut adalah halaman Karyawan Istirahat</p>
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
                                    <h5 class="modal-title">Input Data Karyawan Istirahat</h5>
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
                                                    <h4 class="card-title">Form Istirahat</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data" action="{{route('input-rest')}}">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>NIK</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input list="datalist" class="form-control" name="nik" id="nik" required>
                                                                        <datalist id="datalist">
                                                                                <option value=""> - </option>
                                                                                    <option value="">  </option>
                                                                                </datalist>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Keluhan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="keluhan"
                                                                            placeholder="Masukan Keluhan Karyawan" style="text-transform:uppercase">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Penanganan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                            <textarea name="penanganan" id="first-name" class="form-control" cols="30" rows="5" value="Masukan Penanganan yang dilakukan" style="text-transform:uppercase;"></textarea>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Istirahat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_rest"
                                                                            >
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jam Istirahat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <p>Untuk format jam dari jam 12 malem sampai jam 12 siang adalah <b>AM</b> dan untuk jam 12 siang sampai jam 12 malem adalah <b>PM</b></p>
                                                                        <input type="time" id="first-name"
                                                                            class="form-control" name="jam"
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
                                                        <form class="form form-horizontal" action="{{route('import-mcu')}}" method="post"
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
                <!-- </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Keluhan</th>
                                    <th>Penanganan</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Istirahat</th>
                                    <th>Waktu Selesai</th>
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
    $(document).ready(function () {
        $('#datatables').DataTable({
            processing: true,
            serverside: true,
            ajax: '{{ route('pemakaian-obat') }}',
            columns:[
                {
                    data: 'id_pemakaian',
                    name: 'id_pemakaian',
                    render:function(data, type, row, meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'kode_section', name: 'section'},
                {data: 'keluhan', name: 'keluhan'},
                {data: 'nama_obat', name: 'nama_obat'},
                {data: 'jumlah', name: 'jumlah'},
                {data: 'tgl_pemakaian', name: 'tgl_pemakaian'},
                {
                    data: 'id_pemakaian',
                    name: 'action',
                    // orderable: false,
                    render: function(data, type, row) {
                        var editPemakaianRoute = "{{ url('/editpemakaianobat') }}";
                        return `
                            <a href="${editPemakaianRoute}/${data}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                            <button data-id="${data}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        `;
                    },
                },
            ],
            lengthMenu: [10, 25, 50, 100, 100000],
            dom: 'Blfrtip',
            buttons:[
                {
                    extend: 'copy',
                    text:'COPY',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'pdf',
                    text:'PDF',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'print',
                    text:'CETAK',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'csv',
                    text:'CSV',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'excel',
                    text:'EXCEL',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'colvis',
                    text:'COLUMN VISIBLE',
                    exportOptions:{
                        columns:[0,1,2,3,4,5,6,7]
                    }
                }
            ]
        });
    });
     $("#emp").change(function(){
            // variabel dari nilai combo box kendaraan
            var emp = $("#emp").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_data.php",
                data: "emp="+emp,
                success: function(data){
                   $("#nama").html(data);
                }
            });
        });

        $("#emp").change(function(){
            // variabel dari nilai combo box merk
            var sect = $("#emp").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_sect.php",
                data: "emp="+sect,
                success: function(data){
                    $("#section").html(data);
                }
            });
        });
</script>
    
@endsection