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
        Schema::create('comittee_auth_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('comitteeID')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('password_reset_comittee_email_token', function(Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comittee_auth_models');
        Schema::dropIfExists('password_reset_comittee_email_token');
    }
};
