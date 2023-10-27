<?php

namespace App\Imports;

use App\Models\Pemakaian;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class PemakaiansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pemakaian([
            'nik' => $row[0],
            'nama' => $row[1],
            'kode_section' => $row[2],
            'keluhan' => $row[3],
            'id_obat' => $row[4],
            'jumlah' => $row[5],
            'tgl_pemakaian' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
            'created_by' => $row[7],
            'updated_by' => $row[8],
            'deleted_by' => $row[9],
            'created_at' => $row[10] == null ? null : \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
            'updated_at' => $row[11] == null ? null : \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11]),
            'deleted_at' => $row[12] == null ? null : \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]),
        ]);
    }

    public function delimiter()
    {
        return ',';
    }
}
