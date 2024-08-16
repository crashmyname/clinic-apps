<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hstock extends Model
{
    use HasFactory;
    public $table = 'h_stock';
    protected $guarded = ['id_h_stock'];
    protected $primaryKey = 'id_h_stock';

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
