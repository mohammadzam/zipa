<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Panel\Entities\Role;

class Admin extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'administrative_number',
        'password',
        'role_id',
        'status',

    ];
    protected $guard = "admin";


     public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(Role::class);
     }
}
