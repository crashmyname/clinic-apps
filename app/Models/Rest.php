<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rest extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'rest_emp';
    protected $guarded = ['id_rest'];
    protected $primaryKey = 'id_rest';
}
