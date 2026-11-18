<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // Relasi 1:M ke tabel enrollments
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    // Relasi M:N ke tabel participants melalui tabel pivot enrollments
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'enrollments')
            ->withPivot('status')
            ->withTimestamps();
    }
}