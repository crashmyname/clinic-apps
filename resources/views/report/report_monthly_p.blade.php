@extends('nav.header')
@section('container')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <h4>{{ $hariindo }}</h4>
        <p>Jam Digital: <b><span id="jam" style="font-size:24"></span></b></p>
        <h1 class="h3 mt-0 mb-0 text-gray-800">Data Report Mingguan</h1>
        <!-- <p class="mb-0">Berikut adalah halaman Report Mingguan</p>   -->
        <center>
            <form action="" method="get">
                Masukan Bulan <div class="col-md-4 form-group">
                    <select name="bulan" id="" class="form-control">
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
                    <br>
                    Masukan Tahun
                    <select name="tahun" id="tahun" class="form-control">
                        @php
                            $tahun_sekarang = date('Y');
                            $tahun_mulai = $tahun_sekarang - 5;
                            $tahun_akhir = $tahun_sekarang + 10;
                        @endphp
                        @for ($tahun = $tahun_mulai; $tahun <= $tahun_akhir; $tahun++)
                            <option value="{{ $tahun }}"> {{ $tahun }} </option>
                        @endfor
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary me-1 mb-1" name="cari">Submit</button>
                </div>
            </form>
        </center> <br>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Permintaan Obat</h6>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Dept</th>
                                    <th>Section</th>
                                    <!-- <th>Bulan</th> -->
                                    <th>Obat</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="detail_report_m?nama_p=&obat=&bulan="></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <br>

        <footer class="">
            <div class="container-fluid fixed-bottom">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Copyright &copy; 2023-2024</p>
                    </div>
                    <div class="float-end">
                        <p><a target="_blank" href="http://10.203.68.47:90/iseportal/">PT.Indonesia Stanley Electric</a>.
                            Clinic System</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
