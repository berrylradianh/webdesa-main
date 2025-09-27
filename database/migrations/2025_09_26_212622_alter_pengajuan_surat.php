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
        Schema::table('pengajuan_surat', function (Blueprint $table) {
            $table->string('nik', 16)->after('template_id');
            $table->string('nama_lengkap', 255)->after('nik');
            $table->text('alamat')->after('nama_lengkap');
            $table->string('no_telepon', 15)->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_surat', function (Blueprint $table) {
            $table->dropColumn(['nik', 'nama_lengkap', 'alamat', 'no_telepon']);
        });
    }
};
