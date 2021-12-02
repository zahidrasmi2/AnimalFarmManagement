<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    use HasFactory;

    protected $table = 'animals';

    function userCheckBy()
    {
        return $this->belongsTo(User::class, 'checkBy');
    }

    function manager()
    {
        return $this->belongsTo(User::class, 'current_team_id');
    }
}
