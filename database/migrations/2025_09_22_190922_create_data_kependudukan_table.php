<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->year('tahun');
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_laki');
            $table->integer('jumlah_perempuan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // validasi Admin
            $table->text('catatan_admin')->nullable(); // feedback admin ke PD
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_kependudukan');
    }
};
