<?php

namespace App\Imports;

use App\Models\Excess;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcessImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Excess([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'kode_section' => $row['kode_section'],
            'keluhan' => $row['keluhan'],
            'id_obat' => $row['jenis_obat'],
            'jumlah' => $row['jumlah'],
            'tgl_pemakaian' => \PhpOffice\PhpSpreadSheet\Shared\Date::excelToDateTimeObject($row['tgl_pemakaian']),
            'created_by' => $row['created_by'],
            'updated_by' => $row['updated_by'],
            'deleted_by' => $row['deleted_by'],
        ]);
    }
}
