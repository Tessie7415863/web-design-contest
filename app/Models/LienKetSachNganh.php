<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienKetSachNganh extends Model
{
    use HasFactory;
    protected $fillable = [
        'sach_id',
        'nganh_id'
    ];

    public function sach_id()
    {
        return $this->belongsTo(Sach::class);
    }

    public function nganh_id()
    {
        return $this->belongsTo(Nganh::class);
    }
}
