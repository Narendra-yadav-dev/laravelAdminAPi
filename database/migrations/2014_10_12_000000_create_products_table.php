<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('catId');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('discounts')->nullable();
            $table->string('model')->nullable();
            $table->string('sku')->nullable();
            $table->longText('description')->nullable();
            $table->rememberToken();
            $table->longText('image')->nullable();
            $table->longText('thumbnail')->nullable();
            $table->longText('gallary')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
