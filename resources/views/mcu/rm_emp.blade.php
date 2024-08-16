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
            <h1 class="h3 mt-0 mb-0 text-gray-800">Rekam Medis Karyawan</h1>
            <p class="mb-0">Berikut adalah halaman Rekam Medis Karyawan</p>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <!-- <th>Divisi</th>
                                    <th>Dept</th> -->
                                    <th>Section</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Golongan Darah</th>
                                    <!-- <th>Nomor HP</th> -->
                                    <th>Email</th>
                                    <th width="150px">ACTION</th>
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
                            <p><a target="_blank" href="http://10.203.68.47:90/iseportal/">PT.Indonesia Stanley Electric</a>. Clinic System</p>
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
            responsive: true,
            select: true,
            ajax: '{{ route('data-rm') }}',
            columns:[
                {
                    data: 'noid',
                    name: 'noid',
                    render:function(data, type, row, meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'kode_section', name: 'section'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                {data: 'blood_type', name: 'golongan_darah'},
                {data: 'work_email', name: 'email'},
                // {data: 'action', name: 'action'},
                {
                    data: 'nik',
                    name: 'action',
                    // orderable: false,
                    render: function(data, type, row) {
                        return `
                        <a class="btn btn-success btn-sm" href="detail_rm?emp=" title="Info Obat" target="_blank"><i class="bi bi-pc-display-horizontal"></i></a>
                            |
                        <a class="btn btn-primary btn-sm" href="detail_rmk?emp=" title="Info MCU" target="_blank"><i class="bi bi-display"></i><a/>
                        `;
                    },
                },
            ],
            lengthMenu: [10, 25, 50, 100, {{$totalData}}],
            dom: 'Blfrtip',
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
    });
</script>
@endsection