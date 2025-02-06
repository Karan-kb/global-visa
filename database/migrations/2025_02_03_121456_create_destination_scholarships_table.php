<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_scholarships', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->nullable();
            $table->longText('sub_title')->nullable();
            $table->unsignedInteger('destination_id')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('link')->nullable();
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
        Schema::dropIfExists('destination_scholarships');
    }
}
