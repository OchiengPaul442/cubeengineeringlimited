<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class portfolio extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'portfolios';

    protected $fillable = [
        'name',
        'about',
        'status',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}