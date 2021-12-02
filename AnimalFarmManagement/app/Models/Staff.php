<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    function manager()
    {
        return $this->belongsTo(User::class, 'current_team_id');
    }
}
