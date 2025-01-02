<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CoreValue extends Model
{
    use HasFactory, HasTranslations;

    // Specify the table name (optional if the table name follows Laravel's convention)
    protected $table = 'core_values';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'icon',
        'description',
    ];

    public $translatable = [
        'title',
        'description',
    ];

}
