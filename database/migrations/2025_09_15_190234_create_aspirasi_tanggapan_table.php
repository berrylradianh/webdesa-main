<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirasi_tanggapan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aspirasi_id');
            $table->unsignedBigInteger('user_id'); // PD atau Admin
            $table->text('isi');
            $table->enum('tipe', ['draft', 'final']); // PD = draft, Admin = final
            $table->timestamps();

            $table->foreign('aspirasi_id')->references('id')->on('aspirasi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspirasi_tanggapan');
    }
};
