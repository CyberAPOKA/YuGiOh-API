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
        Schema::create('card_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->nullable();

            $table->string('set_name')->nullable();
            $table->string('set_code')->nullable();
            $table->string('set_rarity')->nullable();
            $table->string('set_rarity_code')->nullable();
            $table->float('set_price')->nullable();

            $table->timestamps();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_sets');
    }
};
