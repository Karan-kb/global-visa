<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('website');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('logo');
            $table->string('favicon')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('twitter')->nullable();
            $table->string('fax')->nullable();
            $table->string('pobox')->nullable();
            $table->string('opens')->nullable();
            $table->string('closes')->nullable();
            $table->string('map')->nullable();
            $table->string('intro_video')->nullable();
            $table->string('study_destination_video')->nullable();
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
        Schema::dropIfExists('infos');
    }
}
