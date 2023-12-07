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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('imgPath');
            $table->unsignedBigInteger('product_color_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_color_id')
                ->references('id')
                ->on('product__colors')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('photos');
    }
};
