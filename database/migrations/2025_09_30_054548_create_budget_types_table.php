<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetTypesTable extends Migration
{
    public function up()
    {
        Schema::create('budget_types', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_types');
    }
}
