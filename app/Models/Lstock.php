<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lstock extends Model
{
    use HasFactory;
    public $table = 'last_stock';
    protected $guarded = ['id_l_stock'];
    protected $primaryKey = 'id_l_stock';
}
