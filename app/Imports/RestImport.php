<?php

namespace App\Imports;

use App\Models\Rest;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class RestImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rest([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'keluhan' => $row['keluhan'],
            'penanganan' => $row['penanganan'],
            'tgl_rest' => \PhpOffice\PhpSpreadSheet\Shared\Date::excelToDateTimeObject($row['tgl_rest']),
            'waktu_rest' => Carbon::parse($row['waktu_rest'])->format('H:i:s'),
            'waktu_selesai' => Carbon::parse($row['waktu_selesai'])->format('H:i:s'),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null
        ]);
    }
}
