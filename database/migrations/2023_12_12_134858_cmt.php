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
        Schema::create('blogcmt', function (Blueprint $table) {
            $table->id();
            $table->string('cmt');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_id');
            $table->string('avatar');
            $table->string('name');
            $table->unsignedInteger('level')->default(0); // Đặt giá trị mặc định là 0
            $table->unsignedBigInteger('cmt_id')->nullable(); // Thêm cột parent_id để lưu ID của comment cha
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('blog_id')->references('id')->on('blog');
            $table->foreign('cmt_id')->references('id')->on('blogcmt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogcmt');
    }
};
