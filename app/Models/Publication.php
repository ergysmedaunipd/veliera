<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Publication extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'description', 'cover_photo', 'file'];

    public $translatable = [
        'title',
        'description',
    ];
}

