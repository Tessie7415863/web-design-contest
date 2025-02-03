<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalResourceMajor extends Model
{
    use HasFactory;
    protected $table = 'digital_resource_major';
    protected $fillable = [
        'tai_lieu_mo_id',
        'nganh_id'
    ];

    public function tailieumo()
    {
        return $this->belongsTo(TaiLieuMo::class, 'tai_lieu_mo_id');
    }

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }
}
