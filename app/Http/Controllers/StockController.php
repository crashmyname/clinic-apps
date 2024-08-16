<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Hstock;
use App\Models\Lstock;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function addStock(Request $request)
    {
        $validasi = $request->validate([
            'id_obat' => 'required',
            'stock' => 'required',
            'tgl_in_obat' => 'required',
            'tgl_kadaluwarsa' => 'required',
        ]);
        $validasi['created_by'] = Auth()->user()->name;
        $stock = Stock::create($validasi);
        $histroyStock = Hstock::create($validasi);
        return response()->json(['status' => 200]);
    }

    public function genereateObat(Request $request)
    {
        $bulan = date('m');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_generate = date('Y-m-d h:i:s');
        foreach( $request->stock as $id_obat => $stock)
        {
            Lstock::create([
                'id_obat' => $request->id_obat,
                'bulan' => $bulan,
                'last_stock' => $request->last_stock,
                'tgl_generate' => $request->tgl_generate,
            ]);
        }
    }
}
