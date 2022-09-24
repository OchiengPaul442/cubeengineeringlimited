<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

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
