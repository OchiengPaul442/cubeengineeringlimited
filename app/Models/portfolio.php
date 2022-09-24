<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
