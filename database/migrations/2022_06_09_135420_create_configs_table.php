<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->boolean('darkmode')->default(false);
            $table->string('logo');
            $table->string('favicon');
            $table->string('title');
            $table->string('email');
            $table->string('phone');
            $table->text('about');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configs');
    }
};
