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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('oper_fish');
            $table->string('oper_slug_number')->nullable();  
            $table->string('oper_image')->nullable();  
            $table->text('oper_small_info')->nullable();       
            $table->text('oper_small_info2')->nullable();       
            $table->boolean('oper_status')->nullable(); 
            $table->integer('oper_custom_ball')->nullable(); 
            $table->foreignId('moderator_id')->constrained('moderators')->onDelete('cascade');
            $table->foreignId('file_id')->nullable()->constrained('files')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
