<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormInput extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'gender',
        'blood_group',
        'address',
        'state',
        'city',
        'country',
        'postal_code',
    ];
}
