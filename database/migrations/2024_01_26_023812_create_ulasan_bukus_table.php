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
        Schema::create('ulasan_bukus', function (Blueprint $table) {
            $table->id('ulasanID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('bukuID');
            $table->text('ulasan');
            $table->integer('rating');
            
            // Foreign key constraints
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('bukuID')->references('id')->on('bukus'); // Updated reference to 'bukus' table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_bukus');
    }
};
