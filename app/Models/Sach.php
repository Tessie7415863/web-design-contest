<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_sach',
        'tac_gia_id',
        'nha_xuat_ban_id',
        'the_loai_id',
        'nam_xuat_ban',
        'so_trang',
        'isbn',
        'mon_hoc_id',
        'nganh_id',
        'khoa_id'
    ];
    public function tac_gia_id()
    {
        return $this->belongsTo(TacGia::class);
    }
    public function tacGia()
    {
        return $this->belongsTo(TacGia::class, 'tac_gia_id');
    }

    // Quan hệ với nhà xuất bản
    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class, 'nha_xuat_ban_id');
    }
    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'the_loai_id');
    }
    public function nha_xuat_ban_id()
    {
        return $this->belongsTo(NhaXuatBan::class);
    }
    public function the_loai_id()
    {
        return $this->belongsTo(TheLoai::class);
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