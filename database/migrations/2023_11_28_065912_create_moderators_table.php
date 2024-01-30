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
        Schema::create('moderators', function (Blueprint $table) {
            $table->id();
            $table->string('moder_fish');
            $table->string('moder_slug_number')->nullable();  
            $table->string('moder_image')->nullable();  
            $table->integer('custom_ball')->nullable();  
            $table->text('moder_small_info')->nullable();       
            $table->text('moder_small_info2')->nullable();       
            $table->boolean('moder_status')->nullable(); 
            $table->foreignId('professor_id')->constrained('professors')->onDelete('cascade');
            $table->foreignId('file_id')->nullable()->constrained('files')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderators');
    }
};
