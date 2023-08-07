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
        Schema::create('weatherdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->time('dt');
            $table->string('name');            
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();            
            $table->integer('temp');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('temp_min');
            $table->integer('temp_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weatherdatas');
    }
};
