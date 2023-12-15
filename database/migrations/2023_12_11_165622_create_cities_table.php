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
        Schema::create('cities', function (Blueprint $table) {
           
            $table->string('city');
            $table->string('city_ascii');
            $table->string('state_id');
            $table->string('state_name');
            $table->integer('county_fips');
            $table->string('county_name');
            $table->float('lat',11,4);
            $table->float('lng',11,4);
            $table->integer('population');
            $table->integer('density');
            $table->string('source');
            $table->boolean('military');
            $table->boolean('incorporated');
            $table->string('timezone');
            $table->tinyInteger('ranking');
            $table->string('zips')->nullable();
            $table->bigInteger('id')->unique();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
