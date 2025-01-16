<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        "permission_id",
        "role_id",
    ];
    /**
     * Relationship with Permission
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

    /**
     * Relationship with Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    protected $primaryKey = ['role_id', 'permission_id'];
    public $incrementing = false; // Không tự động tăng
    public $timestamps = false; // Không sử dụng timestamps

}