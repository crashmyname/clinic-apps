<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excess extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $table = "offer";
    protected $guarded = ['id_offer'];
    protected $primaryKey = 'id_offer';
}
