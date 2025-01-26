<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViTriSach extends Model
{
    protected $table = 'vi_tri_sachs';
    use HasFactory;
    protected $fillable = [
        'khu_vuc',
        'tuong',
        'ke'
    ];
}
