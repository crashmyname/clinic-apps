<?php

namespace App\Imports;

use App\Models\Hw;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HwImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hw([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'section' => $row['section'],
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
            'created_by' => $row['created_by'],
            'updated_by' => null,
            'deleted_by' => null,
        ]);
    }
}
