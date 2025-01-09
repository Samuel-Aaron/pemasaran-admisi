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
        Schema::create('telefons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->enum('status_kendala', ['selesai', 'eskalasi', 'expired'])->default('selesai');
            $table->enum('priority_case', ['low', 'medium', 'high'])->nullable();
            $table->enum('status_tiket', ['selesai', 'diproses', 'konfirmasi_kase', 'tidak_bisa'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefons');
    }
};
