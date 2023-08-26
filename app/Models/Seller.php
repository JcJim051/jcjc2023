<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Puestos;
use App\Models\Votos;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'coddep', 'codmun', 'codzon', 'codpuesto', 'departamento', 'municipio', 'puesto', 'mesa', 'codigodemesa','codpar', 'cedula', 'nombre', 'email', 'telefono', 'dondevota', 'cosescru', 'status','statusani', 'reclamacion', 'observacion', 'censodemesa', 'votosenurna', 'votosincinerados', 'gob1', 'gob2', 'gob3' ,'gob4','gob5','gob6','gob7','gob8','gob9','gob10','gob11','nulos','enblanco','nomarcados','recuperados', 'statusrec','statusasistencia','remenmesa', 'created_at', 'updated_at', 'banco', 'modificadopor', 'status_reconteo', 'reporte_1', 'reporte_2', 'reporte_3'];
    // protected $casts = [
    //     'e14' => 'binary',
    // ];
    public function puestos()

    {
        return $this->belongsTo(Puestos::class,'dondevota','codpuesto');
    }

    public function Votos()
    {
        
        return $this->belongsTo(Votos::class,'codigomesa','codigomesa_id');
    }
}
