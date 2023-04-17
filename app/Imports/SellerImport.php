<?php

namespace App\Imports;

use App\Models\Seller;
use Maatwebsite\Excel\Concerns\ToModel;

class SellerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Seller([
            ('id') => $row['id'],
            ('coddep') => $row['coddep'],
            ('codmun') => $row['codmun'],
            ('codzon') => $row['codzon'],
            ('codpuesto') => $row['codpuesto'],
            ('departamento') => $row['departamento'],
            ('municipio') => $row['municipio'],
            ('puesto') => $row['puesto'],
            ('mesa') => $row['mesa'],
            ('codpar') => $row['codpar'],
            ('cedula') => $row['cedula'],
            ('nombre') => $row['nombre'],
            ('email') => $row['email'],
            ('telefono') => $row['email'],
            ('cosescru') => $row['cosescru'],
            ('status') => $row['status'],
            ('gob1') => $row['gob1'],
            ('gob2') => $row['gob2'],
            ('gob3') => $row['gob3'],
            ('asa1') => $row['asa1'],
            ('asa2') => $row['asa2'],
            ('asa3') => $row['asa3'],
            ('alc1') => $row['alc1'],
            ('alc2') => $row['alc2'],
            ('alc3') => $row['alc3'],
            ('recuperados') => $row['recuperados'],
            ('e14') => $row['e14'],
            ('created_at') => $row['created_at'],
            ('updated_at') => $row['updated_at'],
        ]);
    }
}
