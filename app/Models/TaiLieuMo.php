<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiLieuMo extends Model
{
    use HasFactory;
    protected $table = 'tai_lieu_mos';
    protected $fillable = [
        'anh_bia',
        'ten_tai_lieu',
        'nha_xuat_ban_id',
        'tac_gia_id',
        'nam_phat_hanh',
        'so_trang',
        'isbn',
        'link_tai_ve',
        'mon_hoc_id',
        'nganh_id',
        'khoa_id'
    ];
    public function getAnhBiaUrlAttribute()
    {
        return $this->anh_bia ? asset('storage/' . $this->anh_bia) : asset('images/default-tai-lieu-mo.jpg');
    }
    public function nhaxuatban()
    {
        return $this->belongsTo(NhaXuatBan::class, 'nha_xuat_ban_id');
    }
    public function tacgia()
    {
        return $this->belongsTo(TacGia::class, 'tac_gia_id');
    }
    public function mon()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id');
    }
    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }
    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id');
    }
    public function digitalresource()
    {
        return $this->hasMany(DigitalResourceMajor::class, 'tai_lieu_id');
    }
}
