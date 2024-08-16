<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcessImport;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\Datatables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Excess;

class ExcessController extends Controller
{
    public function excessObat(Request $request)
    {
        {
            $title = "Excess Data";
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
            if($request->ajax())
            {
              $excess = Excess::join('obat','obat.id_obat','=','offer.id_obat')->limit(10);
              return DataTables::of($excess)
              ->make(true);
            }
            return view('excess.excess', compact('title','hariindo'));
        }
    }

    public function importExcess(Request $request)
    {
        // $validasi = $request->validate([
        //   'file_excel' => 'required|mime:xlsx,csv',
        // ]);
        Excel::import( new ExcessImport, $request->file('file_excel'));
        return response()->json(['status'=>200]);
    }
}
