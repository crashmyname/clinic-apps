<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AlatController extends Controller
{
    public function dataAlat(Request $request)
    {
        $title = "Data Alat";
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
        if($request->ajax()){
          $alat = Alat::all();
          return DataTables::of($alat)
          ->make(true);
        }
        return view('alat/data_alat', compact('hariindo','title'));
    }

    public function addAlat(Request $request)
    {
      $validasi = $request->validate([
        'nama_alat' => 'required',
        'factory' => 'required',
        'jumlah' => 'required',
        'created_by' => Auth()->user()->name,
      ]);
      Alat::create($validasi);
      return redirect()->route('data-alat')->with('success','Berhasil');
    }
}
