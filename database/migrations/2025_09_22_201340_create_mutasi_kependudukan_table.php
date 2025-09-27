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
        Schema::create('mutasi_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_kependudukan_id'); // relasi ke data induk (tahun)
            $table->integer('lahir');
            $table->integer('meninggal');
            $table->integer('pindah_keluar');
            $table->integer('pindah_masuk');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // persetujuan admin
            $table->text('catatan_admin')->nullable(); // feedback admin
            $table->timestamps();

            $table->foreign('data_kependudukan_id')->references('id')->on('data_kependudukan')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi_kependudukan');
    }
};
