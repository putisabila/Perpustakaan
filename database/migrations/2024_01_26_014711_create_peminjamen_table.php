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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('bukuID');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('status_peminjaman');

            // Foreign key constraints
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('bukuID')->references('id')->on('bukus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
