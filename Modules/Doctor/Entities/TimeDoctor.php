<?php

namespace Modules\Doctor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeDoctor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'doctor_id',
        'day',
        'from',
        'to',
    ];

  public function doctor(): \Illuminate\Database\Eloquent\Relations\belongsTo
  {
      return $this->belongsTo(Doctor::class);
  }
}
