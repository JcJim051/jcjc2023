<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Puestos;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'coddep', 'codmun', 'codzon', 'codpuesto', 'departamento', 'municipio', 'puesto', 'mesa', 'codpar', 'cedula', 'nombre', 'email', 'telefono', 'dondevota', 'cosescru', 'status','statusani', 'reclamacion', 'observacion', 'gob1', 'gob2', 'gob3' ,'asa1','asa2','asa3','alc1','alc2' ,'alc3','recuperados', 'statusrec' , 'created_at', 'updated_at'];

    public function puestos()
    {
        
        return $this->belongsTo(Puestos::class,'dondevota','codpuesto');
    }
}
