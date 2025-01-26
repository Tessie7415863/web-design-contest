<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSubject extends Model
{
    use HasFactory;
    protected $table = 'book_subject';

    protected $fillable = [
        'sach_id',
        'mon_hoc_id'
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id');
    }

    public function mon()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id');
    }
}
