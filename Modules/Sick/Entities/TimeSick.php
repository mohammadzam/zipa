<?php

namespace Modules\Sick\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Doctor\Entities\Doctor;

class TimeSick extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'sick_id',
        'doctor_id',
        'date',
        'from',
        'to',
        'is_payed',
    ];
    public function sick(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sick::class);
    }
    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }


}
