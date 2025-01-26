<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $table = 'sachs';
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
    public function tacGia()
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
    // Quan hệ với nhà xuất bản
    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class, 'nha_xuat_ban_id');
    }
    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'the_loai_id');
    }
}
