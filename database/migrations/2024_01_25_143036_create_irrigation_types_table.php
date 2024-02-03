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
        Schema::create('irrigation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_arabic');
            $table->string('name_english');
            
            $table->unsignedBigInteger('agriculture_type_id')->unsigned();
            $table->foreign('agriculture_type_id')->references('id')->on('agriculture_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irrigation_types');
    }
};
