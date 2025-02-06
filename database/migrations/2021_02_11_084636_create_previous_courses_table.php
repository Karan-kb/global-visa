<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reading',5)->default(0);
            $table->string('writing',5)->default(0);
            $table->string('listening',5)->default(0);
            $table->string('speaking',5)->default(0);
            $table->string('attempts')->nullable();
            $table->string('result')->nullable();
            $table->boolean('publish')->default(0);
            $table->string('remarks')->nullable();

            $table->foreignId('student_id');
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
        Schema::dropIfExists('previous_courses');
    }
}
