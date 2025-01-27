<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it's the default 'employees')
    protected $table = 'employees';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'postal_code',
        'address',
        'country', // country
        'languages',
        'gender', // gender
        'pdf_file',
        'image',
       // 'comments',
    ];

    // If you want to cast the 'languages' field to an array, you can add a $casts property
//    protected $casts = [
//        'languages' => 'array',
//    ];
}
