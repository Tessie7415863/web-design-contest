<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonPhat extends Model
{
    use HasFactory;
    protected $table = "hoa_don_phats";
    protected $fillable = [
        'phat_id',
        'ngay_lap',
        'ngay_thanh_toan',
        'trang_thai'
    ];

    public function phat()
    {
        return $this->belongsTo(Phat::class, 'phat_id');
    }
}
