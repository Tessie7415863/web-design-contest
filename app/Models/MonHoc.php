<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_mon',
        'nganh_id',
    ];

    public function nganh()
    {
        return $this->belongsTo(Nganh::class);
    }
    public function sach()
    {
        return $this->belongsTo(Sach::class);
    }
}