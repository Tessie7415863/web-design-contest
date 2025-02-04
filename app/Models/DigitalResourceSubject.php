<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalResourceSubject extends Model
{
    use HasFactory;
    protected $table = 'digital_resource_subject';
    protected $fillable = [
        'tai_lieu_mo_id',
        'mon_hoc_id'
    ];

    public function tailieumo()
    {
        return $this->belongsTo(TaiLieuMo::class, 'tai_lieu_mo_id');
    }

    public function monhoc()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id');
    }
}
