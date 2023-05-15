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
        Schema::create('image_post', function (Blueprint $table) {
            $table->unsignedBiginteger('image_id')->constrained();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->unsignedBiginteger('post_id')->constrained();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_post');
    }
};
