<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "guard_name"
    ];

    public function roleHasPermissions()
    {
        return $this->hasMany(RoleHasPermission::class, 'permission_id');
    }

}