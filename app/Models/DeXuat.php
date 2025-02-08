<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeXuat extends Model
{
    use HasFactory;
    protected $fillable = [
        'sinh_vien_id',
        'tieu_de',
        'loai',
        'mo_ta',
        'trang_thai',
    ];
}