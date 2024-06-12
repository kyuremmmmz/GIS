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
            $table->string('name')->nullable()->unique();
            $table->integer('age')->nullable();
            $table->string('teamname');
            $table->integer('points')->nullable();
            $table->foreign('playerID')->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');
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
