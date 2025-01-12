<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalResourceSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'tai_lieu_mo_id',
        'mon_hoc_id'
    ];

    public function tai_lieu_mo_id()
    {
        return $this->belongsTo(TaiLieuMo::class);
    }

    public function mon_hoc_id()
    {
        return $this->belongsTo(MonHoc::class);
    }
}
