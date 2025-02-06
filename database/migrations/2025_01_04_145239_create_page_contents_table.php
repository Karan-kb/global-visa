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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
                
            // Using string for title as it typically holds shorter text
            $table->string('title', 255)->nullable();
            
            $table->text('subtitle')->nullable(); // Text type is appropriate for subtitles
            $table->longText('text')->nullable(); // LongText for larger amounts of content
            $table->longText('content')->nullable(); // LongText for detailed content or HTML
            
            // Text type for links allows for flexibility in URL length
            $table->text('link')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
