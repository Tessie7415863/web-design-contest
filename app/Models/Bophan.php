<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoPhan extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_bo_phan',
        'mo_ta',
    ];
}
