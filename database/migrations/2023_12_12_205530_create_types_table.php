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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('nameAr');
            $table->string('nameEng');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('genus_id')->unsigned();
            $table->foreign('genus_id')->references('id')->on('genera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
        Schema::dropIfExists('pesticide_types');

    }
};
