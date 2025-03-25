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
        Schema::create('slider_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_slider_id');
            $table->string('image');
            $table->string('title_1');
            $table->string('title_2');
            $table->string('title_3');
            $table->string('link_4');
            $table->timestamps();
            $table->foreign('product_slider_id')->references('id')->on('product_sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_items');
    }
};
