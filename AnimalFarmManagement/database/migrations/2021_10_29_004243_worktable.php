<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Worktable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('worktable', function (Blueprint $table) {
            $table->id();
            $table->date('date_from');
            $table->date('date_until');
            $table->int('staff_id');
            $table->varchar('animals');
            $table->varchar('details');
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('animal_history');
    }
}
