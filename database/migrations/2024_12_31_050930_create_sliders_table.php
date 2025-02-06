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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->nullable();
            $table->text('title')->nullable();
            $table->text('youtube_url')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->integer('order_no')->nullable();
            $table->string('button_text')->nullable();
            $table->text('button_url')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
