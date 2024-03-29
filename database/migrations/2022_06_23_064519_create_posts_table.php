<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position');
            $table->boolean('status')->default(true);
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('post_categories')->onDelete('cascade');
            $table->string('image')->unique();
            $table->string('title')->unique();
            $table->mediumText('text');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
