<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phat extends Model
{
    use HasFactory;
    protected $table = 'phats';
    protected $fillable = [
        'sinh_vien_id',
        'sach_id',
        'phieu_tra_id',
        'so_tien',
        'ly_do',
        'tinh_trang'
    ];

    public function phieutra()
    {
        return $this->belongsTo(PhieuTra::class, 'phieu_tra_id');
    }

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sinh_vien_id');
    }

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }
}