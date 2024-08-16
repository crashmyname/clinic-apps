<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PemakaiansImport;
use App\Models\Pemakaian;
use App\Models\Obat;
use App\Models\Excess;
use App\Models\Stock;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PemakaianController extends Controller
{
    public function showdataObat(Request $request)
    {
        $title = "Data Pemakaian Obat";
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
          // $pemakaian = Pemakaian::query()
          // ->select(['pemakaian.id_pemakaian', 'pemakaian.nik', 'pemakaian.nama', 'pemakaian.kode_section', 'pemakaian.keluhan', 'obat.nama_obat', 'pemakaian.jumlah', 'pemakaian.tgl_pemakaian','pemakaian.created_by','pemakaian.updated_by','pemakaian.created_at'])
          // ->join('obat', 'pemakaian.id_obat' , '=', 'obat.id_obat')
          // ->get();
          $pemakaian = Pemakaian::select(['pemakaian.id_pemakaian', 'pemakaian.nik', 'pemakaian.nama', 'pemakaian.kode_section', 'pemakaian.keluhan', 'obat.nama_obat AS nama_obat', 'pemakaian.jumlah', 'pemakaian.tgl_pemakaian','pemakaian.created_by','pemakaian.updated_by','pemakaian.created_at','pemakaian.id_obat'])
          ->join('obat', 'obat.id_obat' , '=', 'pemakaian.id_obat')->limit(10);
          return DataTables::of($pemakaian)
          ->make(true);
        }
        $pemakaian = Pemakaian::count();
        $dataApi = Http::get('http://10.203.68.47:90/fambook/config/api.php');
        $result = $dataApi->json();
        $dataobat = Obat::orderBy('nama_obat','asc')->get();
        return view('pemakaian/pemakaian_obat', compact('title','hariindo','pemakaian','result','dataobat'));
    }

    public function addPemakaian(Request $request)
    {
      $tgl = explode('-',$request->tgl_pemakaian);
      $m = $tgl[1];
      $showPemakaian = Pemakaian::where('nik',$request->emp)->whereMonth('tgl_pemakaian',$m)->whereIn('id_obat',['36','93'])->get();
      $validate = $request->validate([
        'emp' => 'required',
        'nama' => 'required',
        'section' => 'required',
        'keluhan' => 'required',
        'jns_obat' => 'required',
        'jumlah' => 'required',
        'tgl_pemakaian' => 'required',
      ]);
      $validate['created_by'] = Auth()->user()->name;
      $cekstock = Stock::where('id_obat',$request->jns_obat)->first();
      if($showPemakaian->count() > 1 && ($request->jns_obat == '36' || $request->jns_obat == '93'))
      {
        $excess = Excess::create([
          'nik' => $request->emp,
            'nama' => $request->nama,
            'kode_section' => $request->section,
            'keluhan' => strtoupper($request->keluhan),
            'id_obat' => $request->jns_obat,
            'jumlah' => $request->jumlah,
            'tgl_pemakaian' => $request->tgl_pemakaian,
        ]);
        $cekstock->update([
          'stock' => $cekstock->stock - $request->jumlah,
        ]);
        return response()->json(['status' => 202]);
      } else if(($request->jns_obat == '36' || $request->jns_obat == '93') && $request->jumlah > 1)
      {
        //Status jika ambil lebih dari 1
        return response()->json(['status' => 203]);
      } else 
      {
        if($cekstock->stock == 0)
        {
          //Status Stock Habis
          return response()->json(['status' => 204]);
        } else if($request->jumlah > $cekstock->stock)
        {
          // Status jika jumlah yang diinputkan melebihi stock
          return response()->json(['status' => 205]);
        } else 
        {
          // Status Berhasil Input
          $pemakaian = Pemakaian::create([
            'nik' => $request->emp,
            'nama' => $request->nama,
            'section' => $request->section,
            'keluhan' => $request->keluhan,
            'id_obat' => $request->jns_obat,
            'jumlah' => $request->jumlah,
            'tgl_pemakaian' => $request->tgl_pemakaian,
          ]);
          $cekstock->update([
            'stock' => $cekstock->stock - $request->jumlah,
          ]);
          return response()->json(['status'=>200]);
        }
      }
    }

    public function formeditPemakaian(Request $request, $id_pemakaian)
    {
      // dd(shell_exec("systeminfo"));
      $title = "Edit Pemakaian Obat";
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
        $pemakaian = Pemakaian::join('obat', 'obat.id_obat', '=', 'pemakaian.id_obat')->where('id_pemakaian',$id_pemakaian)->get();
      return view('pemakaian/ePemakaian_obat',compact('title','hariindo','pemakaian'));
    }

    public function editPemakaian(Request $request, $id_pemakaian)
    {
      $pemakaian = Pemakaian::find($id_pemakaian);
      $pemakaian->nik = $request->nik;
      $pemakaian->nama = $request->nama;
      $pemakaian->kode_section = $request->section;
      $pemakaian->keluhan = $request->keluhan;
      $pemakaian->id_obat = $request->jns_obat;
      $pemakaian->jumlah = $request->jumlah;
      $pemakaian->tgl_pemakaian = $request->tgl_pemakaian;
      $pemakaian->save();
      return response()->json(['status' => 200]);
    }

    public function deletePemakaian($id_pemakaian)
    {
      $pemakaian = Pemakaian::find($id_pemakaian);
      $pemakaian->delete();
      return response()->json(['status' => 200]);
    }

    public function formPemakaian()
    {
      $title = "Tambah Pemakaian";
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
      $obat = Obat::select('id_obat','nama_obat','factory')->OrderBy('nama_obat','asc')->get();
      $api = Http::get('http://10.203.68.47:90/fambook/config/api.php');
      $apiData = $api->json();
      return view('pemakaian/form_pemakaian',compact('title','hariindo','obat','apiData'));
    }

    public function formPemakaianManual()
    {
      $title = "Tambah Pemakaian Manual";
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
      $obat = Obat::select('id_obat','nama_obat','factory')->OrderBy('nama_obat','asc')->get();
      return view('pemakaian/form_pemakaian_manual',compact('title','hariindo','obat'));
    }

    public function peminjamanAlat()
    {
        {
            $title = "Peminjaman Alat";
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
            return view('pemakaian/peminjaman_alat', compact('title','hariindo'))->with('no');
        }
    }

    public function import(Request $request)
    {
      Excel::import(new PemakaiansImport, $request->file_excel);
      return redirect()->route('pemakaian-obat')->with('berhasil','Data berhasil diimport');
    }

    public function reportWpemakaian()
    {
      $title = "Report Weekly Pemakaian";
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
      return view('report/report_weekly_p',compact('hariindo','title'));
    }

    public function reportMpemakaian()
    {
      $title = "Report Monthly Pemakaian";
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
      return view('report/report_monthly_p',compact('hariindo','title'));
    }

    public function reportWistirahat()
    {
      $title = "Report Weekly Istirahat";
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
      return view('report/report_weekly_i',compact('hariindo','title'));
    }

    public function reportMistirahat()
    {
      $title = "Report Monthly Istirahat";
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
      return view('report/report_monthly_i',compact('hariindo','title'));
    }
}
