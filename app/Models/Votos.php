<?php

namespace App\Models;

use App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'censodemesa_zonal', 'votosenurna_zonal', 'votosincinerados_zonal', 'gob1_zonal', 'gob2_zonal' ,'gob3_zonal ', 'gob4_zonal ', 'gob5_zonal', 'gob6_zonal', 'gob7_zonal', 'nulos_zonal', 'enblanco_zonal', 'nomarcados_zonal', 'recuperados_zonal', 'censodemesa_municipal', 'votosenurna_municipal', 'votosincinerados_municipal','gob1_municipal', 'gob2_municipal', 'gob3_municipal', 'gob4_municipal', 'gob5_municipal', 'gob6_municipal', 'gob7_municipal', 'nulos_municipal', 'enblanco_municipal', 'nomarcados_municipal', 'recuperados_municipal', 'censodemesa_departamental', 'votosenurna_departamental', 'votosincinerados_departamental', 'gob1_departamental', 'gob2_departamental', 'gob3_departamental', 'gob4_departamental', 'gob5_departamental', 'gob6_departamental', 'gob7_departamental', 'nulos_departamental', 'enblanco_departamental', 'nomarcados_departamental', 'recuperados_departamental', 'modificadopor_votos',];
    
    public function Seller() 
    {
        return $this->hasOne(Seller::class,'codpuesto','codpuesto_id');
    }
}



