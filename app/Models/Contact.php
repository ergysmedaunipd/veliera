<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel naming convention
    protected $table = 'contacts';

    // Define fillable fields for mass assignment
    protected $fillable = [
        'email',
        'phone',
        'address',
        'message',
    ];
}
