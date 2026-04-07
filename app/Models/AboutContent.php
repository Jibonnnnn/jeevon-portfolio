<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'full_name',
        'date_of_birth',
        'place_of_birth',
        'nationality',
        'professional_title',
        'biography',
        'education',
        'photo',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}