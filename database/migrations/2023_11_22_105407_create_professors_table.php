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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('fish');
            $table->string('slug_number')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('custom_ball')->nullable();
            $table->text('small_info')->nullable();
            $table->text('small_info2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
