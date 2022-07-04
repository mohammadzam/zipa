<?php

namespace Modules\Sick\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Panel\Entities\Role;

class Sick extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'sick_number',
        'password',
        'role_id',
        'age',
        'sex',
    ];

    protected $guard = "sick";


    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Role::class);
    }
    public function medicalInformation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(MedicalInformation::class);
    }
    public function timeSick(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TimeSick::class);
    }
}
