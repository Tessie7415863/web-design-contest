<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViTriSach extends Model
{
    use HasFactory;
    protected $table = 'vi_tri_sachs';
    protected $fillable = [
        'khu_vuc',
        'tuong',
        'ke'
    ];
}
