<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // supaya sesuai user desa
            $table->string('village_name')->nullable();
            $table->text('profile')->nullable(); // profil desa
            $table->longText('history')->nullable(); // sejarah desa
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};
