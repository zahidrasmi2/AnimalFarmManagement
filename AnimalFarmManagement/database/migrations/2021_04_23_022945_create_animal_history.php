<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_history', function (Blueprint $table) {
            $table->id();
            $table->integer('animalID');
            $table->string('tagNumber');
            $table->string('breed');
            $table->date('bornYear');
            $table->double('weight');
            $table->string('health');
            $table->string('comment')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('checkBy');
            $table->date('checkDate');
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
        Schema::dropIfExists('animal_history');
    }
}
