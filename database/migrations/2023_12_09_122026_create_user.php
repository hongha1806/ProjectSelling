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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('blog_id')->references('id')->on('blog');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
