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
        Schema::table('polling_answers', function (Blueprint $table) {
            $table->string('name', 255)->after('polling_id');
            $table->string('nik', 16)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polling_answers', function (Blueprint $table) {
            $table->dropUnique('polling_answers_nik_polling_id_unique');
            $table->dropColumn(['name', 'nik']);
        });
    }
};
