<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ho_ten',
        'chuc_vu',
        'bo_phan_id',
        'email',
        'sdt',
        'dia_chi'
    ];
    public function boPhan()
    {
        return $this->belongsTo(Bophan::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
