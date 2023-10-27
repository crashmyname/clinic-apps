<?php

namespace App\Imports;

use App\Models\Mcu;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class McuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mcu([
            'no_rm' => $row[0],
            'nik' => $row[1],
            'factory' => $row[2],
            'tgl_pemeriksaan' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'jk' => $row[4],
            'tgl_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
            'status_gizi' => $row[6],
            'buta_warna' => $row[7],
            'anamnesa' => $row[8],
            'lab_test' => $row[9],
            'radiology_test' => $row[10],
            'saran' => $row[11],
            'status_kesehatan' => $row[12],
            'dokter' => $row[13],
            'fitness_s' => $row[14],
            'keterangan' => $row[15],
        ]);
    }
}
