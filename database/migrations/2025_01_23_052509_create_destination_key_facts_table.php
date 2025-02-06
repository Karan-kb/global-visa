<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationKeyFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_key_facts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade');
            $table->string('language')->nullable();
            $table->longText('cost_of_study')->nullable();
            $table->string('source_of_funding')->nullable();
            $table->string('required_exams')->nullable();
            $table->string('degrees')->nullable();
            $table->string('intakes')->nullable();
            $table->string('visa')->nullable();
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
        Schema::dropIfExists('destination_key_facts');
    }
}
