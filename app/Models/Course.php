<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Field yang diizinkan untuk diisi secara massal (mass assignment)
    protected $fillable = [
        'code',
        'name',
        'description',
        'fee',
        'quota',
        'start_date',
        'status',
    ];

    // Casting tipe data kolom database ke tipe data PHP
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
        ];
    }
}