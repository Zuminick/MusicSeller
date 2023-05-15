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
        Schema::create('genre_post', function (Blueprint $table) {
            $table->unsignedBiginteger('genre_id')->constrained();
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->unsignedBiginteger('post_id')->constrained();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_post');
    }
};
