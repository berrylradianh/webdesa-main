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
        Schema::create('bumds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->date('establishment_date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('capital', 15, 2)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('bumds');
    }
};
