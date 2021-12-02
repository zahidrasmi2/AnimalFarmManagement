<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktable extends Model
{
    use HasFactory;

    protected $table = 'worktable';

    function manager()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    function animal_tag()
    {
        $animals = $this->animals;
        $tag_list = '';
        if ($animals) {
            $animal_array = json_decode($animals);
            $count = 1;
            $max = count($animal_array);
            foreach (json_decode($animals) as $animal) {
                $animalModel = Animals::find($animal);
                if ($animalModel) {
                    $tag_list .= $animalModel->tagNumber . ($count == $max ? '' : ', ');
                    $count++;
                }
            }
        }
        return $tag_list;
    }
}
