<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiLieuMo extends Model
{
    use HasFactory;
    protected $table = 'tai_lieu_mos';
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

    public function tailieu()
    {
        return $this->belongsTo(LoaiTaiLieu::class, 'loai_tai_lieu_id');
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
}
