<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seller;


class Puestos extends Model
{

    use HasFactory;
    protected $fillable = ['codpuesto', 'nombre','direccion' ,'mesas','comuna'];

    public function Seller()
    {
        return $this->hasOne(Seller::class,'dondevota','codpuesto');
    }

}
