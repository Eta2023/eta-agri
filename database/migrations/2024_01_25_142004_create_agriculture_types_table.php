<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agriculture_types', function (Blueprint $table) {
            $table->id();
            $table->string('nameAr');
            $table->string('nameEng');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agriculture_types');
    }
};
