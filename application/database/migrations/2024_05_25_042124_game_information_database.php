<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_information_database', function(Blueprint $table)
        {
            $table-> id()->primary()->autoIncrement();
            $table->string('teamname')->unique();
            $table->integer('game1');
            $table->integer('game2');
            $table->integer('game3');
            $table->integer('wins');
            $table->integer('losses');
            $table->date('date_played');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_information_database');
    }
};
