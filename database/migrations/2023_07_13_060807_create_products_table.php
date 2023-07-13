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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('code');
            $table->string('name');
            $table->text('description');
            $table->enum('evaluation', [0, 1, 2, 3, 4, 5])->default(0);
            $table->enum('status', [0, 1])->default(0);
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('image_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('currency_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
