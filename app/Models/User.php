<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Router;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = 'id';
    protected $keyType = 'int'; 
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'codzon',
        'codpuesto',
        'mun',
        'status',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
   

    protected $casts = [
        'mun' => 'array',
        'puesto' => 'array',
        'email_verified_at' => 'datetime',
    ];
    

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
         'profile_photo_url',
    ];
    public function adminlte_profile_url(){
        return url('user.profile') ;
    }
        public function puestos()
    {
        if (!$this->codpuesto) return collect();

        $ids = explode(',', $this->codpuesto);

        return \App\Models\Puestos::whereIn('codpuesto', $ids)->get();
    }
    public function municipios()
    {
        if (!$this->mun) return collect();

        $ids = explode(',', $this->mun);

        return \App\Models\Puestos::whereIn('mun', $ids)
            ->select('mun')
            ->distinct()
            ->get();
    }
}
