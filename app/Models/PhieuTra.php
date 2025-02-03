<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuTra extends Model
{
    use HasFactory;
    protected $table = 'phieu_tras';
    protected $fillable = [
        'phieu_muon_id',
        'ngay_tra',
        'tinh_trang'
    ];

    public function phieumuon()
    {
        return $this->belongsTo(PhieuMuon::class, 'phieu_muon_id');
    }
}
