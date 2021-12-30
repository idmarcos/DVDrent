<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'duration',
        'year',
        'gender',
        'synopsis',
        'cast',
        'age_rating',
        'available',
    ];

    /**
     * Return all users related with this dvd
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_dvds')
                ->withPivot('id','rent_date', 'return_date', 'address', 'postal_code', 'state');
    }

}