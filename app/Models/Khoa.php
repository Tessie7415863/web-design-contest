<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_khoa',
        'dia_chi',
        'sdt',
        'email'
    ];

    public function nganh()
    {
        return $this->hasMany(Nganh::class, 'khoa_id');
    }
}