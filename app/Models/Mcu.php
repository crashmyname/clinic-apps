<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcu extends Model
{
    use HasFactory;
    public $table = 'mcu';
    protected $guarded = ['id_mcu'];
    protected $primaryKey = 'id_mcu';
}
