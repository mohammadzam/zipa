<?php

namespace Modules\Section\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Financial\Entities\SurgeryCosts;

class Section extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function costs(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SurgeryCosts::class);
    }



}
