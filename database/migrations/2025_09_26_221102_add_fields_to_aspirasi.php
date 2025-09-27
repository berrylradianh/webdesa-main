<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            $table->string('nama_lengkap')->after('id');
            $table->string('nik', 16)->after('nama_lengkap');
            $table->string('no_telpon')->after('nik');
            $table->enum('kategori', ['Pelayanan Administrasi', 'Infrastruktur', 'Kebersihan', 'Keamanan', 'Kesehatan', 'Pendidikan', 'Lainnya'])->after('no_telpon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            $table->dropColumn(['nama_lengkap', 'nik', 'no_telpon', 'kategori']);
        });
    }
};
