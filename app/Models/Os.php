<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
    use HasFactory;
    public $table = "os";
    protected $guarded = ['id_os'];
    protected $primaryKey = 'id_os';
}
