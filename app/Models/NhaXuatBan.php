<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_nha_xuat_ban',
        'email',
        'sdt',
        'dia_chi'
    ];
}
