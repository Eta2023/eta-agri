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
        Schema::create('phylums', function (Blueprint $table) {
            $table->id();
            $table->string('nameAr');
            $table->string('nameEng');
            $table->string('note');
            $table->unsignedBigInteger('kingdom_id'); // Set a default country ID
            $table->foreign('kingdom_id')->references('id')->on('kingdoms')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phylums');
    }
};
