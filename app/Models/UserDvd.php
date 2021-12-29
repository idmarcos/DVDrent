<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDvd extends Model
{
    use HasFactory;

    protected $table='users_dvds';

    protected $fillable = [
        'user_id',
        'dvd_id',
        'rent_date',
        'return_date',
    ];
}
