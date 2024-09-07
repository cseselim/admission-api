<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class Role extends Model
{
    use HasRoles;

    protected $fillable = [
        'name',
        'guard_name'
    ];


//    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(Permission::class, 'role_has_permissions');
//    }
}
