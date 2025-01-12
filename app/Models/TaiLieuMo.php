<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiLieuMo extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_tai_lieu',
        'loai_tai_lieu_id',
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

    public function loai_tai_lieu_id()
    {
        return $this->belongsTo(LoaiTaiLieu::class);
    }
    public function nha_xuat_ban_id()
    {
        return $this->belongsTo(NhaXuatBan::class);
    }
    public function tac_gia_id()
    {
        return $this->belongsTo(TacGia::class);
    }
    public function mon_hoc_id()
    {
        return $this->belongsTo(MonHoc::class);
    }
    public function nganh_id()
    {
        return $this->belongsTo(Nganh::class);
    }
    public function khoa_id()
    {
        return $this->belongsTo(Khoa::class);
    }
}
