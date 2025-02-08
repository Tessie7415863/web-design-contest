<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SinhVien extends Authenticatable
{
    use HasFactory;
    protected $table = 'sinh_viens';
    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'gioi_tinh',
        'lop',
        'email',
        'sdt',
        'dia_chi',
        'password',
        'tai_khoan'
    ];
    public function phieumuons()
    {
        return $this->hasMany(Phieumuon::class, 'sinh_vien_id');
    }
}