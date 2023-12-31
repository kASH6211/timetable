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
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('classid')->references('id')->on('grades'); 
            $table->foreignId('periodid')->references('id')->on('periods'); 
            $table->foreignId('combinationid')->references('id')->on('combinations'); 
           
            $table->string('about',50);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_tables');
    }
};
