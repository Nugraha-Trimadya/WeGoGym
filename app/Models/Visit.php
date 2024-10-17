<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'gender', 'time'];

    // Mengisi waktu kunjungan otomatis saat data baru dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($visit) {
            $visit->time = $visit->time ?? now(); // Isi dengan now() jika tidak ada waktu
        });
    }
}
