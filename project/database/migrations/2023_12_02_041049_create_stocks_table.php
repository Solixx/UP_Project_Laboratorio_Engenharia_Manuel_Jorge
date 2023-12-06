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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_color_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('stock');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_color_id')
                ->references('id')
                ->on('product__colors')
                ->opUpdate('cascade')
                ->onDelete('restrict');
            
            $table->foreign('size_id')
                ->references('id')
                ->on('sizes')
                ->opUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('stocks');
    }
};
