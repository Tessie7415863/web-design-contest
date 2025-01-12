<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalResourceMajor extends Model
{
    use HasFactory;
    protected $fillable = [
        'tai_lieu_mo_id',
        'nganh_id'
    ];

    public function tai_lieu_mo_id()
    {
        return $this->belongsTo(TaiLieuMo::class);
    }

    public function nganh_id()
    {
        return $this->belongsTo(Nganh::class);
    }
}
