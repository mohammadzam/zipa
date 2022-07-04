<?php

namespace Modules\Financial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Doctor\Entities\Doctor;

class AppointmentCosts extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'doctor_id',
        'price',

    ];
    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
