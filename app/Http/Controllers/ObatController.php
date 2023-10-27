<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Stock;

class ObatController extends Controller
{
    public function dataObat()
    {
        $title = "Data Obat";
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
        $stock = Obat::join('stock','stock.id_obat','=','obat.id_obat')->orderBy('nama_obat','asc')->orderBy('factory','asc')->get();
        $obat = Obat::orderBy('nama_obat','asc')->orderBy('factory','asc')->get();
        return view('obat/data_obat',compact('hariindo','title','obat','stock'))->with('no');
    }

    public function inputObat(Request $request)
    {
      $request->validate([
        'nama_obat' => 'required|min:5',
        'keluhan' => '',
        'dosis' => '',
        'jenis' => 'required',
        'factory' => 'required|max:2',
        'foto' => 'image|file|max:7168',
      ]);

      if($request->file('foto')){
        $OrName = $request->foto->getClientOriginalName();
        $fotoobat = $request->file('foto')->storeAs('public/obat',$OrName);
      }

      Obat::create([
        'nama_obat' => $request->nama_obat,
        'keluhan' => $request->keluhan,
        'dosis' => $request->dosis,
        'jenis' => $request->jenis,
        'factory' => $request->factory,
        'foto' => $OrName,
        'created_by' => auth()->user()->name,
      ]);
      $request->session()->flash('berhasil','Berhasil menambahkan '.$request->nama_obat);
      return redirect()->route('data-obat');
    }

    public function editObat(Request $request, $id)
    {
      $obat = Obat::find($id);
      $request->validate([
        'nama_obat' => 'required|min:5',
        'keluhan' => '',
        'dosis' => '',
        'jenis' => 'required',
        'factory' => 'required|max:2',
        'foto' => 'image|file|max:7048',
      ]);
      if($request->hasFile('foto')){
        $obat->foto = $request->file('foto')->store('public/obat');
      }
      Obat::where('id_obat',$id)->update([
        'nama_obat' => $request->nama_obat,
        'keluhan' => $request->keluhan,
        'dosis' => $request->dosis,
        'jenis' => $request->jenis,
        'factory' => $request->factory,
        'foto' => $request->foto,
        'updated_by' => auth()->user()->name,
      ]);
      $request->session()->flash('update','Berhasil merubah data');
      return redirect()->route('data-obat');
    }

    public function deleteObat(Request $request, $id)
    {
      Obat::where('id_obat',$id)->delete();
      $request->session()->flash('delete','Data Berhasil dihapus');
      return redirect()->route('data-obat');
    }

    public function stockObat(Request $request)
    {
      $request->validate([
        'id_obat' => 'required',
        'stock' => 'required|numeric',
        'harga' => 'required|numeric',
        'factory' => 'required',
        'tgl_in_obat' => 'required|date',
        'tgl_kadaluwarsa' => '',
      ]);
      $stock = Stock::create([
        'id_obat' => $request->id_obat,
        'stock' => $request->stock,
        'harga' => $request->harga,
        'factory' => $request->factory,
        'tgl_in_obat' => $request->tgl_in_obat,
        'tgl_kadaluwarsa' => $request->tgl_kadaluwarsa,
        'created_by' => auth()->user()->name,
      ]);
      $request->session()->flash('berhasil','Berhasil menambahkan Data Stock');
      return redirect()->route('data-obat');
    }
}
