<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Member extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = ['name', 'bio', 'picture'];

    public $translatable = [
        'name',
        'bio',
    ];
}
