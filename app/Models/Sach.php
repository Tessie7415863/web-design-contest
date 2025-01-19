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
    public function tac_gia_id()
    {
        return $this->belongsTo(TacGia::class, 'tac_gia_id');
    }

    public function nha_xuat_ban_id()
    {
        return $this->belongsTo(NhaXuatBan::class, 'nha_xuat_ban_id');
    }

    public function the_loai_id()
    {
        return $this->belongsTo(TheLoai::class, 'the_loai_id');
    }

    public function mon_hoc_id()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id');
    }

    public function nganh_id()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }

    public function khoa_id()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id');
    }
}
