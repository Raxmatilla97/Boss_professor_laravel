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
        Schema::create('temporary_files', function (Blueprint $table) {
            $table->id();
            $table->string('folder');
            $table->string('filename');
            $table->string('category_name')->nullable();     
            $table->string('site_url')->nullable(); 
            $table->string('ariza_holati')->nullable(); 
            $table->text('arizaga_javob')->nullable(); 
            $table->integer('points')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('professor_id')->nullable()->constrained('professors')->onDelete('cascade');
            $table->foreignId('moderator_id')->nullable()->constrained('moderators')->onDelete('cascade');
            $table->foreignId('operator_id')->nullable()->constrained('operators')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_files');
    }
};
