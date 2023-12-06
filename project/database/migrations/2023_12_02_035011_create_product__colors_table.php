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
        Schema::create('product__colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->opUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->opUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product__colors', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('product__colors');
    }
};
