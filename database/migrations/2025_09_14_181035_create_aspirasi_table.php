<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->unsignedBigInteger('warga_id'); // user role = warga
            $table->unsignedBigInteger('pd_id')->nullable(); // perangkat desa
            $table->unsignedBigInteger('admin_id')->nullable(); // admin (finalisasi)
            $table->text('draft_tanggapan')->nullable(); // input PD
            $table->text('tanggapan_final')->nullable(); // approve admin
            $table->enum('status', ['Menunggu', 'Diproses', 'Ditolak', 'Selesai'])->default('Menunggu');
            $table->timestamps();

            // relasi user
            $table->foreign('warga_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pd_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('admin_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
