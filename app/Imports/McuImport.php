<?php

namespace App\Imports;

use App\Models\Mcu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class McuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mcu([
            'no_rm' => $row['no_rm'],
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'factory' => $row['factory'],
            'tgl_pemeriksaan' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_pemeriksaan']),
            'jk' => $row['jk'],
            'tgl_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir']),
            'status_gizi' => $row['status_gizi'],
            'buta_warna' => $row['buta_warna'],
            'anamnesa' => $row['anamnesa'],
            'lab_test' => $row['lab_test'],
            'radiology_test' => $row['radiology_test'],
            'saran' => $row['saran'],
            'status_kesehatan' => $row['status_kesehatan'],
            'dokter' => $row['dokter'],
            'fitness_s' => $row['fitness_s'],
            'keterangan' => $row['keterangan'],
        ]);
    }
}
