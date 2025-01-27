<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it's the default 'employees')
    protected $table = 'countries';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name',
    ];
}
