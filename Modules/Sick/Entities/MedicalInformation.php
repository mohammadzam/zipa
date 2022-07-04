<?php

namespace Modules\Sick\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Doctor\Entities\Doctor;
use Modules\Section\Entities\Section;

class MedicalInformation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'sick_id',
        'section_id',
        'doctor_id',
        'status',
        'is_payed',
        'disease',
        'treatment',
        'description',
    ];

    public function sick(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sick::class);
    }
    public function section(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

}
