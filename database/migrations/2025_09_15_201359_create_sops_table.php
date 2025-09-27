<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('step_number')->default(1);
            $table->text('description');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // admin yg buat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sops');
    }
};
