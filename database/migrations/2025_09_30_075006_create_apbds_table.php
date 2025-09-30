<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApbdsTable extends Migration
{
    public function up()
    {
        Schema::create('apbds', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->foreignId('budget_type_id')->constrained('budget_types')->onDelete('cascade');
            $table->foreignId('detail_budget_type_id')->constrained('detail_budget_types')->onDelete('cascade');
            $table->decimal('budget_value', 15, 2)->default(0);
            $table->decimal('realization_value', 15, 2)->default(0);
            $table->text('description')->nullable();
            $table->json('evidence_images')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apbds');
    }
}
