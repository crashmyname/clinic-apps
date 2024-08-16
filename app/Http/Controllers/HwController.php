<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Imports\HwImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\Datatables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Hw;


class HwController extends Controller
{
    public function dataHw(Request $request)
    {
        $title = "Data HW";
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
          $hw = Hw::select('id_hw','nik','nama','section','tanggal','created_by','updated_by')->limit(10);
          return DataTables::of($hw)
          ->make(true);
        }
        $dataApi = Http::get('http://10.203.68.47:90/fambook/config/newapi.php?action=getJkP&api_key=P@55W0RD');
        $result = $dataApi->json('data');
        return view('hw.data_hw', compact('hariindo','title','result'));
    }

    public function HwImport(Request $request)
    {
      try{
        $msg = [
          'mimes' => 'The :attribute must be one of the following file types: :values.',
        ];
        $validasi = $request->validate([
          'importhw' => 'required|mimes:xlsx,csv',
        ],$msg);

        Excel::import( new HwImport, $request->file('importhw'));
        return response()->json(['status' => 200]);
      } catch(\Illuminate\Validation\ValidationException $e){
        return response()->json(['status' => 404, 'errors' => $e->errors()]);
      } catch(\Exception $e){
        return response()->json(['status' => 500]);
      }
    }

    public function addHw(Request $request)
    {
      $validasi = $request->validate([
        'nik' => 'required|min:2',
        'nama' => 'required',
        'section' => 'required',
        'tanggal' => 'required',
      ]);
      $addHw = Hw::create([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'section' => $request->section,
        'tanggal' => $request->tanggal,
        'created_by' => auth()->user()->name,
      ]);
      return response()->json(['status' => 'success']);
    }

    public function updateHw(Request $request, $id)
    {
      $hw = Hw::findOrFail($id);
      $hw->nik = $request->nik;
      $hw->nama = strtoupper($request->nama);
      $hw->section = strtoupper($request->section);
      $hw->tanggal = $request->tanggal;
      $hw->updated_by = auth()->user()->name;
      $hw->save();
      return response()->json(['status' => 'success']);
    }

    public function deleteHw($id)
    {
      $hw = Hw::find($id);
      $hw->delete();
      return response()->json(['status' => 'success']);
    }
}
