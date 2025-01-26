<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinh_viens';
    protected $fillable = [
        'user_id',
        'hppo_ten',
        'ngay_sinh',
        'gioi_tinh',
        'lop',
        'email',
        'sdt',
        'dia_chi',
        'password',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}