<?php

namespace Modules\Financial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Section\Entities\Section;

class SurgeryCosts extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'section_id',
        'price',
    ];
    public function section(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

}
