<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phat extends Model
{
    use HasFactory;
    protected $fillable = [
        'phieu_tra_id',
        'so_tien',
        'ly_do',
        'tinh_trang'
    ];

    public function phieu_tra_id()
    {
        return $this->belongsTo(PhieuTra::class);
    }
}
