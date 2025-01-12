<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuonSach extends Model
{
    use HasFactory;
    protected $fillable = [
        'sach_id',
        'vi_tri_sach_id',
        'tinh_trang'
    ];

    public function sach_id()
    {
        return $this->belongsTo(Sach::class);
    }

    public function vi_tri_sach_id()
    {
        return $this->belongsTo(ViTriSach::class);
    }
}
