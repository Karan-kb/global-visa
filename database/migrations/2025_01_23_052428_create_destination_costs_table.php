<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')->constrained('destinations')->onDelete('cascade');
            $table->string('title');
            $table->longText('value');
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
        Schema::dropIfExists('destination_costs');
    }
}
