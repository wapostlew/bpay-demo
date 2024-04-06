<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kitsus', function (Blueprint $table) {
            $table->integer('kitsu_id');
            $table->string('kitsu_content', 5);

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type');
            $table->string('status');

            $table->string('age_rating_code')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitsus');
    }
};
