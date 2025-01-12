<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTaiLieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_loai',
        'mo_ta',
    ];
}
