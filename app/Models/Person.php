<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'email',
        'phone',
        'address',
        'gender',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];
}
