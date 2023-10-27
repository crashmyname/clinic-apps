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
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data Obat</h1>
            <p class="mb-0">Berikut adalah halaman Obat</p>
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
                                    <h5 class="modal-title">Input Data Obat</h5>
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
                                                    <h4 class="card-title">Form Obat</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data" action="{{route('input-obat')}}">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Nama Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="nama_obat"
                                                                            placeholder="Masukan Nama Obat">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Keluhan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="keluhan"
                                                                            placeholder="Masukan Nama Keluhan">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Dosis</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="dosis"
                                                                            placeholder="Masukan Nama dosis">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jenis</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="jenis" id="jenis"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="Kapsul">Kapsul</option>
                                                                            <option value="Tablet">Tablet</option>
                                                                            <option value="Pcs">Pcs</option>
                                                                            <option value="Box">Box</option>
                                                                            <option value="Fls">Fls</option>
                                                                            <option value="Kolf">Kolf</option>
                                                                            <option value="Botol">Botol</option>
                                                                            <option value="Tube">Tube</option>
                                                                            <option value="Roll">Roll</option>
                                                                            <option value="Pack">Pack</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Factory</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="factory" id="factory"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1">Factory 1</option>
                                                                            <option value="2">Factory 2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Foto Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="foto">
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
                <!-- </div> -->
                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#border-less5">
                        Tambah Stock Obat
                    </button>
                    <!-- BorderLess Modal Modal -->
                    <div class="modal fade text-left modal-lg centered" id="border-less5" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Input Data Stock</h5>
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
                                                    <h4 class="card-title">Form Stock Obat</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data" action="{{route('input-stock')}}">
                                                            @csrf
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Nama Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="id_obat"
                                                                            class="form-control" required>
                                                                            <option value=""> - </option>
                                                                            @foreach ($obat as $data)
                                                                            <option value="{{$data->id_obat}}"> {{$data->nama_obat}}  FACT({{$data->factory}}) </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Stock Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="number" id="first-name"
                                                                            class="form-control" name="stock"
                                                                            placeholder="Masukan Stock Obat">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Harga</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="number" id="first-name"
                                                                            class="form-control" name="harga"
                                                                            placeholder="Masukan Harga">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Factory</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="factory" id="factory"
                                                                            class="form-control" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1">Factory 1</option>
                                                                            <option value="2">Factory 2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Masuk Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_in_obat"
                                                                            >
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Kadaluwarsa Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_kadaluwarsa"
                                                                            >
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="simpanstock"
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
                                    <th>Nama Obat</th>
                                    <th>Keluhan</th>
                                    <th>Stock</th>
                                    <th>Jenis</th>
                                    <th>Dosis</th>
                                    <th>Factory</th>
                                    <th>Gambar</th>
                                    <th width="100px">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock as $data)
                                <tr align="center">
                                <td>{{++$no}}</td>
                                <td>{{$data->nama_obat}}</td>
                                <td>{{$data->keluhan}}</td>
                                <td>{{$data->stock}}</td>
                                <td>{{$data->jenis}}</td>
                                <td>{{$data->dosis}}</td>
                                <td>{{$data->factory}}</td>
                                <td><img src="{{asset('storage/obat/'.$data->foto)}}" width="40%" alt=""></td>
                                <td width="180px">
                                    <a class="btn btn-success" href="" title="Info Data">
                                    <i class="bi bi-info-circle"></i></a>
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#border-less1{{$data->id_obat}}" title="Ubah Data"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                        <!-- BorderLess Modal Modal -->
                                        <div class="modal fade text-left modal-lg centered"
                                            id="border-less1{{$data->id_obat}}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Data Obat</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row match-height">
                                                            <div class="col-md-12 col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Form Obat</h4>
                                                                    </div>
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                        <form class="form form-horizontal" method="post"
                                                            enctype="multipart/form-data">
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label>Nama Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="obat"
                                                                            value="{{$data->nama_obat}}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Jenis</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="jenis" id="jenis"
                                                                            class="form-control" required>
                                                                            <option value="{{$data->jenis}}">{{$data->jenis}}</option>
                                                                            <option value="Kapsul">Kapsul</option>
                                                                            <option value="Tablet">Tablet</option>
                                                                            <option value="Pcs">Pcs</option>
                                                                            <option value="Box">Box</option>
                                                                            <option value="Fls">Fls</option>
                                                                            <option value="Kolf">Kolf</option>
                                                                            <option value="Botol">Botol</option>
                                                                            <option value="Tube">Tube</option>
                                                                            <option value="Roll">Roll</option>
                                                                            <option value="Pack">Pack</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Keluhan</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="keluhan"
                                                                            value="{{$data->keluhan}}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Dosis</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="dosis"
                                                                            value="{{$data->dosis}}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Stock Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <input type="text" id="first-name"
                                                                            class="form-control" name="stock"
                                                                            value="{{$data->stock}}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Harga</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="text" id="first-name"
                                                                            class="form-control" name="harga"
                                                                            value="{{$data->harga}}">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Factory</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <select type="text" name="factory" id="factory"
                                                                            class="form-control" required>
                                                                            <option value="{{$data->factory}}">{{$data->factory}}</option>
                                                                            <option value="1">Factory 1</option>
                                                                            <option value="2">Factory 2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Masuk Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_in_obat" value="{{$data->tgl_in_obat}}"
                                                                            >
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Tanggal Kadaluwarsa Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                        <input type="date" id="first-name"
                                                                            class="form-control" name="tgl_kdl" value="{{$data->tgl_kadaluwarsa}}"
                                                                            >
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label>Foto Obat</label>
                                                                    </div>
                                                                    <div class="col-md-8 form-group">
                                                                    <img src='{{asset('storage/obat/'.$data->foto)}}' class='rounded' width='25%'>
                                                                        <input type="hidden" name="foto" value="{{$data->foto}}">
                                                                        <input class="form-control" type="file"
                                                                            id="formFile" name="foto">
                                                                    </div>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="submit"
                                                                            class="btn btn-primary me-1 mb-1"
                                                                            name="update"
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
                                                                <button type="button" class="btn btn-light-primary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    <a class="btn btn-danger" href=""
                                            name="hapus" title="Hapus Data" onclick="return confirm('Apakah yakin mau menghapus data?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></a>
                                    </td>
                                </tr>                                  
                                @endforeach
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
        $('#datatable').DataTable({
            // processing: true,
            // serverSide: true,
            dom: 'Bfrtip',
            "pageLength": 10,
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
            buttons:[
                {
                    extend: 'copy',
                    text:'COPY',
                    exportOptions:{
                        columns:[0,1,2,3,4,5]
                    }
                },
                {
                    extend: 'pdf',
                    text:'PDF',
                    exportOptions:{
                        columns:[0,1,2,3,4,5]
                    }
                },
                {
                    extend: 'print',
                    text:'CETAK',
                    exportOptions:{
                        columns:[0,1,2,3,4,5]
                    }
                },
                {
                    extend: 'csv',
                    text:'CSV',
                    exportOptions:{
                        columns:[0,1,2,3,4,5]
                    }
                },
                {
                    extend: 'excel',
                    text:'EXCEL',
                    exportOptions:{
                        columns:[0,1,2,3,4,5]
                    }
                },
                {
                    extend: 'colvis',
                    text:'COLUMN VISIBLE',
                    exportOptions:{
                        columns:[0,1,2,3,4,5]
                    }
                }
            ]
        });
    });
    
</script>
    
@endsection