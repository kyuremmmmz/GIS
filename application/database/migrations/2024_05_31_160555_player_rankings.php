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
        Schema::create('player_rankings', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('playerID');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('teamname')->unique();
            $table->foreign('playerID')->references('playerNumber')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_rankings');
    }
};
