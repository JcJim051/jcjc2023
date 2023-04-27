<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'coddep', 'codmun', 'codzon', 'codpuesto', 'departamento', 'municipio', 'puesto', 'mesa', 'codpar', 'cedula', 'nombre', 'email', 'telefono', 'cosescru', 'status', 'gob1', 'gob2', 'gob3' ,'asa1','asa2','asa3','alc1','alc2' ,'alc3','recuperados' , 'created_at', 'updated_at'];

   /*  public function getRouteKeyName()
    {
        return "slug";
    } */

    /* Aca iran las relaciones entre tablas */
}
