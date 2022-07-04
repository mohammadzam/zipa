<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Financial\Entities\AppointmentCosts;
use Modules\Panel\Entities\Role;
use Modules\Section\Entities\Section;
use Modules\Sick\Entities\TimeSick;

class Doctor extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'doctor_number',
        'password',
        'role_id',
        'status',
    ];

    protected $guard = "doctor";


    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function sectionDoctor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SectionDoctor::class);
    }
    public function times(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TimeDoctor::class);
    }
    public function timeSick(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TimeSick::class);
    }
    public function costs(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AppointmentCosts::class);
    }
}
