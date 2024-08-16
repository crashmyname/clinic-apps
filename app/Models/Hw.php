<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hw extends Model
{
    use HasFactory;
    public $table = 'hw';
    protected $guarded = ['id_hw'];
    protected $primaryKey = 'id_hw';
}
