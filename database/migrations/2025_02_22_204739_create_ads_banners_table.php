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
        Schema::create('ads_banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('url');
            $table->tinyInteger('position')->comment('0 => top right, 1 => top left, 2 => bottom');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads_banners');
    }
};
