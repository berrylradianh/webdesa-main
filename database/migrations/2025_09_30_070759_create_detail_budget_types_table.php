<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBudgetTypesTable extends Migration
{
    public function up()
    {
        Schema::create('detail_budget_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_type_id')->constrained('budget_types')->onDelete('cascade');
            $table->foreignId('group_budget_type_id')->constrained('group_budget_types')->onDelete('cascade');
            $table->string('icon')->nullable();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_budget_types');
    }
}
