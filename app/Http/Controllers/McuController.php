<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\McuImport;
use App\Models\Mcu;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class McuController extends Controller
{
    public function showdataMcu(Request $request)
    {
        $title = "Data MCU";
        // if($request->ajax()){
        // $api = http::get('http://10.203.68.47:90/fambook/config/api2.php');
        // $emp = $api->json();
        //   return DataTables::of($emp)
        //           ->make(true);
        // }
        if($request->ajax()){
          $mcu = Mcu::query()
          ->select(['no_rm','nik','factory','tgl_pemeriksaan','status_gizi','buta_warna','anamnesa','radiology_test','dokter','fitness_s','keterangan'])
          ->get();
          return DataTables::of($mcu)
          ->make(true);
        }
        $hari = date('l');
        switch($hari){
            case 'Sunday':
                $day = 'Minggu';
                break;
              case 'Monday':
                $day = 'Senin';
                break;
              case 'Tuesday':
                $day = 'Selasa';
                break;
              case 'Wednesday':
                $day = 'Rabu';
                break;
              case 'Thursday':
                $day = 'Kamis';
                break;
              case 'Friday':
                $day = 'Jumat';
                break;
              case 'Saturday':
                $day = 'Sabtu';
                break;
              default:
                'hari tidak valid';
        }
        $totalMcu = MCU::count();
        date_default_timezone_set("Asia/jakarta");
        $hariindo = $day.", ". date('d M Y');
        return view('mcu/data_mcu', compact('hariindo','title','totalMcu'));
    }

    public function importMcu(Request $request)
    {
      Excel::import(new McuImport, $request->file_excel);
      return redirect()->route('data-mcu')->with('berhasil','Data berhasil diimport');
    }

    public function showdataRM(Request $request)
    {
      $title = "RM Karyawan";
      $hari = date('l');
        switch($hari){
            case 'Sunday':
                $day = 'Minggu';
                break;
              case 'Monday':
                $day = 'Senin';
                break;
              case 'Tuesday':
                $day = 'Selasa';
                break;
              case 'Wednesday':
                $day = 'Rabu';
                break;
              case 'Thursday':
                $day = 'Kamis';
                break;
              case 'Friday':
                $day = 'Jumat';
                break;
              case 'Saturday':
                $day = 'Sabtu';
                break;
              default:
                'hari tidak valid';
        }
        date_default_timezone_set("Asia/jakarta");
        $hariindo = $day.", ". date('d M Y');
        $totaldata = Http::get('http://10.203.68.47:90/fambook/config/api2.php');
        $total = $totaldata->json();
        $totalData = count($total);
        if($request->ajax()){
        $api = Http::get('http://10.203.68.47:90/fambook/config/api2.php');
        $data = $api->json();
        return Datatables::of($data)
              ->make(true);
        }
        return view('mcu/rm_emp',compact('hariindo','title','totalData'));
    }
}
