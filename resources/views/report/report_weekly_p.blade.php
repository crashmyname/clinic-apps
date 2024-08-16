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
            <h1 class="h3 mt-0 mb-0 text-gray-800">Data Report Mingguan</h1>
            <center>
                <form action="" method="get">
                Dari tanggal <div class="col-md-4 form-group"><input type="date" name="awal" class="form-control"> </div> <br>
                Sampai Tanggal <div class="col-md-4 form-group"><input type="date" name="akhir" class="form-control"> </div> 
                <button type="submit"
                class="btn btn-primary me-1 mb-1"
                name="cari" target="_blank">Submit</button>
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
                                    <th>Section</th>
                                    <th>Obat</th>
                                    <th>Jumlah</th>
                                </tr>
                            <tbody>
                                <tr align="center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="detail_report_p?nama_p=&obat=&awal=&akhir="></a></td>
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
                            <p><a target="_blank" href="http://10.203.68.47:90/iseportal/">PT.Indonesia Stanley Electric</a>. Clinic System</p>
                        </div>
                    </div>
                </div>
            </footer>
</div>
    
@endsection