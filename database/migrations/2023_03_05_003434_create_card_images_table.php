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
        Schema::create('card_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');

            $table->string('image_url');
            $table->string('image_url_small');
            $table->string('image_url_cropped');

            $table->timestamps();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_images');
    }
};
