<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sub_title')->nullable();
            $table->string('country');
            $table->longText('description')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('youtube_link')->nullable();
            $table->longText('requirement')->nullable();
            $table->longText('scholarship')->nullable();
            $table->longText('in_take')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}
