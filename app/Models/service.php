<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class service extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'services';

    protected $fillable = [
        'title',
        'description',
        'details',
        'image',
        'temporary_image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
