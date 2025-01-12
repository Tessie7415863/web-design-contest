<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonPhat extends Model
{
    use HasFactory;
    protected $fillable = [
        'phat_id',
        'ngay_lap',
        'ngay_thanh_toan',
        'trang_thai'
    ];

    public function phat_id()
    {
        return $this->belongsTo(Phat::class);
    }
}
