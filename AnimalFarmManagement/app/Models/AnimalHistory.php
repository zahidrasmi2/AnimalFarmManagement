<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalHistory extends Model
{
    use HasFactory;

    protected $table = 'animal_history';

    function userCheckBy()
    {
        return $this->belongsTo(User::class, 'checkBy');
    }
}
