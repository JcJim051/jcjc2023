<?php

namespace App\Traits;

use App\Models\Seller;

trait Compartimentacion
{
    /**
     * Filtra los sellers según el usuario autenticado
     */
    public function filtrarSellersPorUsuario($user)
    {
        $role = $user->role;
        $idUser = $user->id;

        $userCandidatos = $user->candidatos ? explode(',', $user->candidatos) : [];
        $userMunicipios = $user->mun ? explode(',', $user->mun) : [];
        $userPuestos = $user->codpuesto ? explode(',', $user->codpuesto) : [];
        $escrutador = $user->codzon;

        $query = Seller::query();

        if ($role == 1) { // ADMIN
            if ($idUser == 1 || in_array('999', $userMunicipios)) {
                return $query->get();
            } else {
                $query->whereIn('codmun', $userMunicipios);
                if (!empty($userCandidatos)) {
                    $query->whereIn('candidato', $userCandidatos);
                }
                return $query->get();
            }
        } elseif ($role == 2) { // ESCRUTADOR
            return $query->where('codescru', $escrutador)->get();
        } elseif ($role == 3) { // COORDINADOR
            $query->whereIn('codcor', $userPuestos);
        
            // Filtrar por candidatos solo si no incluye 0 (General)
            if (!empty($userCandidatos) && !in_array(0, $userCandidatos)) {
                $query->whereIn('candidato', $userCandidatos);
            }
        
            return $query->get();
        } elseif ($role == 4 || $role == 5) { // Otros
            return $query->get();
        } else {
            return collect();
        }
    }
}
