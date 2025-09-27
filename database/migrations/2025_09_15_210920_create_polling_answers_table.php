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
        Schema::create('polling_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('polling_id');
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Relasi
            $table->foreign('polling_id')
                ->references('id')
                ->on('pollings')
                ->onDelete('cascade');

            $table->foreign('option_id')
                ->references('id')
                ->on('polling_options')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling_answers');
    }
};
