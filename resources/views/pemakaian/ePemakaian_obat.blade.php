@extends('nav/header')
@section('container')
<div id="main">
<section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">FORM EDIT PEMAKAIAN</h4>
            <a href="{{Request::server('HTTP_REFERER')}}" class="btn btn-warning"><b><i class="bi bi-arrow-90deg-left"></i> Back</b></a>
          </div>
          <div class="card-content">
            <div class="card-body">
            <form class="form form-horizontal" method="post" enctype="multipart/form-data">
              @foreach ($pemakaian as $data)
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="first-name-column">NIK</label>
                      <div class="">
                        <input type="hidden" name="id_pemakaian" value="">
                          <input type="text" id="first-name"
                              class="form-control" name="emp"
                              value="{{$data->nik}}" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="company-column">Nama Karyawan</label>
                      <div class="">
                          <input type="text" id="first-name"
                              class="form-control" name="nama"
                              value="{{$data->nama}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last-name-column">Section</label>
                      <div class="">
                          <input type="text" id="first-name"
                              class="form-control" name="section"
                              value="{{$data->kode_section}}">
                      </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="country-floating">Keluhan</label>
                        <input type="text" id="first-name"
                                class="form-control" name="keluhan"
                                value="{{$data->keluhan}}" style="text-transform:uppercase;" >
                    </div>
                </div>
                <div class="col-md-6 col-12">
                <div class="form-group">
                        <label for="country-floating">Jenis Obat</label>
                        <input type="text" id="first-name"
                                class="form-control" name="jns_obat"
                                value="{{$data->nama_obat}}" style="text-transform:uppercase;" >
                    </div>
                </div>
                  <div class="col-md-6 col-12">
                  <div class="form-group">
                        <label for="country-floating">Jumlah</label>
                        <input type="number" id="first-name"
                                class="form-control" name="jumlah"
                                value="{{$data->jumlah}}" style="text-transform:uppercase;" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email-id-column">Tanggal Pemakaian</label>
                      <input type="date" id="first-name"
                        class="form-control" name="tgl_pemakaian" value="{{$data->tgl_pemakaian}}"
                        >
                    </div>
                  </div>
                  
                  <div class="col-12 d-flex justify-content-end">
                  <button type="submit"
                    class="btn btn-primary me-1 mb-1"
                    name="update"
                    onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                    <button
                      type="reset"
                      class="btn btn-light-secondary me-1 mb-1"
                    >
                      Reset
                    </button>
                  </div>
                </div>
                @endforeach
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
</div>
@endsection