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

    protected $primaryKey = 'sach_id';
    public $timestamps = false;
    public $incrementing = false;

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }
}
