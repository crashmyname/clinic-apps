<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // public $table = 'obat';
    protected $table = 'obat';
    protected $guarded = ['id_obat'];
    protected $primaryKey = 'id_obat';

    public function stock()
    {
        return $this->hasOne(Stock::class, 'id_obat', 'id_obat');
    }

    public function h_stock()
    {
        return $this->hasOne(Hstock::class, 'id_obat','id_obat');
    }
}
