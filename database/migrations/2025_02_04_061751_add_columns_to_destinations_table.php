<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('why_image')->after('description')->nullable();
            $table->string('why_subtitle')->after('why_image')->nullable();
            $table->string('fact_subtitle')->after('why_subtitle')->nullable();
            $table->string('city_subtitle')->after('fact_subtitle')->nullable();
            $table->string('reason_subtitle')->after('city_subtitle')->nullable();
            $table->string('health_subtitle')->after('reason_subtitle')->nullable();
            $table->string('job_subtitle')->after('health_subtitle')->nullable();
            $table->json('best_cities')->after('job_subtitle')->nullable(); // Store multiple cities as JSON
            $table->string('video_image')->after('best_cities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn([
                'why_image',
                'why_subtitle',
                'fact_subtitle',
                'city_subtitle',
                'reason_subtitle',
                'health_subtitle',
                'job_subtitle',
                'best_cities',
                'video_image',
            ]);
        });
    }
}
