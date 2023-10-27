@extends('nav.header')
@section('container')
<div class="main">
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    
    <h4>{{$hariindo}}</h4>
    <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data Permintaan Obat</h1>
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
            @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- // Basic multiple Column Form section start -->
          <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">FORM INPUT PEMAKAIAN</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                    <form action="" class="form form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="first-name-column">NIK</label>
                              <input list="datalist" class="form-control" name="emp" id="emp" required>
                              <datalist id="datalist">
                                    <option value=""> - </option>
                                    @foreach ($apiData as $data)
                                    <option value="{{$data['nik']}}">{{$data['nik']}} {{$data['nama']}}</option>
                                    @endforeach
                                      </datalist>
                            </div>
                          </div>
                          <!-- <div id="obat-jumlah"> -->
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="company-column">Jenis Obat</label>
                              <select type="text" name="jns_obat"
                                class="form-control" required>
                                <option value=""> - </option>
                                @foreach ($obat as $dataobat)
                                <option value="{{$dataobat->id_obat}}">{{$dataobat->nama_obat}} (FACT {{$dataobat->factory}})</option>
                                @endforeach
                            </select>
                            </div>
                          </div>
                          <!-- </div> -->
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="last-name-column">Nama Karyawan</label>
                              <select class="form-control" name="nama" id="nama"> </select>
                            </div>
                        </div>
                        <!-- <div id="obat-jumlah"> -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Keluhan</label>
                                <input type="text" id="first-name"
                                class="form-control" name="keluhan"
                                placeholder="Masukan Keluhan sakit" style="text-transform:uppercase;">
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="city-column">Section</label>
                            <select class="form-control" name="section" id="section"></select>
                          </div>
                        </div>
                        <!-- <div id="obat-jumlah"> -->
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="email-id-column">Jumlah</label>
                              <input type="number" id="first-name"
                                class="form-control" name="jumlah"
                                placeholder="Masukan Jumlah Obat">
                            </div>
                          </div>
                          <!-- </div> -->
                          <!-- <button type="button" id="tambah-obat">tambah</button> -->
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="email-id-column">Tanggal Pemakaian</label>
                              <input type="date" id="first-name"
                                class="form-control" name="tgl_pemakaian"
                                >
                            </div>
                          </div>
                          
                          <div class="col-12 d-flex justify-content-end">
                          <button type="submit"
                            class="btn btn-primary me-1 mb-1"
                            name="simpan"
                            onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                            <button
                              type="reset"
                              class="btn btn-light-secondary me-1 mb-1"
                            >
                              Reset
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </div>
<script>
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
        // document.getElementById('tambah-obat').addEventListener('click', function (){
        //   var jumlahobat = document.getElementById('obat-jumlah');
        //   var pasangandata = document.createElement('div');
        //   pasangandata.classList.add('obat-jumlah');
        //   pasangandata.innerHTML = 
        //   `<input type="text" name="obat[]" placeholder="Nama Obat">
        //     <input type="number" name="jumlah[]" placeholder="Jumlah">
        //     `;
        //   jumlahobat.appendChild(pasangandata);
        // })
</script>
@endsection