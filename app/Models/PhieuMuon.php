<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuMuon extends Model
{
    use HasFactory;
    protected $fillable = [
        'sinh_vien_id',
        'nhan_vien_id',
        'ngay_muon',
        'ngay_hen_tra',
        'ngay_tra',
        'tinh_trang'
    ];

    public function sinh_vien_id()
    {
        return $this->belongsTo(SinhVien::class);
    }
    public function nhan_vien_id()
    {
        return $this->belongsTo(NhanVien::class);
    }
}
