<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasFactory, HasTranslations;

    // Specify the table if it doesn't follow Laravel naming convention
    protected $table = 'contacts';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'email',
        'phone',
        'address',
        'message',
    ];

    public $translatable = [
        'address',
        'message',
    ];
}
