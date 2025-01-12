<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'sach_id',
        'mon_hoc_id'
    ];

    public function sach_id()
    {
        return $this->belongsTo(Sach::class);
    }

    public function mon_hoc_id()
    {
        return $this->belongsTo(MonHoc::class);
    }
}
