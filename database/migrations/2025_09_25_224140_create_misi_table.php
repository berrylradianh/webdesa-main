<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('misi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visi_misi_id')->constrained('visi_misi')->onDelete('cascade');
            $table->text('misi'); // Setiap misi sebagai teks sederhana
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('misi');
    }
};
