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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks')
                ->opUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->opUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
