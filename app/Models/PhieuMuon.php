<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuMuon extends Model
{
    use HasFactory;
    protected $table = 'phieu_muons';
    protected $fillable = [
        'sinh_vien_id',
        'nhan_vien_id',
        'sach_id',
        'so_luong',
        'ngay_muon',
        'ngay_hen_tra',
        'ngay_tra',
        'tinh_trang',
        'email_log_url'
    ];
    protected $with = ['sach', 'sinhvien'];

    public function sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sinh_vien_id');
    }
    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'nhan_vien_id');
    }
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }
}
