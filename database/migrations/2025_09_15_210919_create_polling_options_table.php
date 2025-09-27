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
        Schema::create('polling_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polling_id')->constrained('pollings')->onDelete('cascade');
            $table->string('option_text'); // opsi jawaban
            $table->integer('votes')->default(0); // jumlah vote
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polling_options');
    }
};
