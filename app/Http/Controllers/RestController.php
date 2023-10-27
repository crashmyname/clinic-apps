<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;

class RestController extends Controller
{
    public function showdataRest()
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
        return view('rest/data_rest_emp', compact('title','hariindo'));
    }
}
