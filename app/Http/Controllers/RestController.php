<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use App\Imports\RestImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\Datatables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RestController extends Controller
{
    public function showdataRest(Request $request)
    {
        $title = "Karyawan Istirahat";
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
          // $restData = Rest::all();
          // $api = Http::get('http://10.203.68.47:90/fambook/config/newapi.php?action=getSimpleEmp&api_key=P@55W0RD')->json('data');
          // $filterApi = collect($api)->filter(function($emp) use($restData){
          //   return $restData->contains('nik',$emp['nik']);
          // });
          // $combine = $filterApi->map(function($emp) use($restData){
          //   $rest = $restData->where('nik',$emp['nik'])->first();
          //   return[
          //     'nik' => optional($rest)->nik,
          //     'nama' => $emp['nama'],
          //     'keluhan' => optional($rest)->keluhan,
          //     'penanganan' => optional($rest)->penanganan,
          //     'tgl_rest' => optional($rest)->tgl_rest,
          //     'waktu_rest' => optional($rest)->waktu_rest,
          //     'waktu_selesai' => optional($rest)->waktu_selesai,
          //   ];
          // });
          $rest = Rest::limit(10);
          return DataTables::of($rest)
          ->make(true);
        }
        return view('rest.data_rest_emp', compact('title','hariindo'));
    }

    public function importRest(Request $request)
    {
      // $validate = $request->validate([
      //   'file_excel' => 'required|mime:xlsx',
      // ]);
      $excel = Excel::import(new RestImport,$request->file('file_excel'));
      return response()->json(['status' => 200]);
    }

    public function addRest(Request $request)
    {
      $validate = $request->validate([
        'nik' => 'required|number',
        'nama' => 'required',
        'section' => 'required',
        'keluhan' => 'required',
        'penanganan' => 'required',
        'tgl_rest' => 'required',
        'waktu_rest' => 'required',
        'waktu_selesai' => 'required',
      ]);
      $validate['created_by'] = Auth()->user()->name;
      $rest = Rest::create($validate);
      return response()->json(['status' => 200]);
    }

    public function editRest(Request $request, $id)
    {
      $rest = Rest::find($id);
      $rest->nik = $request->nik;
      $rest->nama = $request->nama;
      $rest->section = $request->section;
      $rest->keluhan = $request->keluhan;
      $rest->penanganan = $request->penanganan;
      $rest->tgl_rest = $request->tgl_rest;
      $rest->waktu_rest = $request->waktu_rest;
      $rest->waktu_selesai = $request->waktu_selesai;
      $rest->updated_by = Auth()->user()->name;
      $rest->save();
      return response()->json(['status' => 200]);
    }

    public function deleteRest($id)
    {
      $rest = Rest::find($id);
      $rest->delete();
      return response()->json(['status' => 200]);
    }
}
