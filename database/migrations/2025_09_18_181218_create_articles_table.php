<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('konten');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade'); // asumsi user adalah PD/Admin
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
