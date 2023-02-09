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
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('learnId');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('duration')->nullable();
            $table->string('description_name')->nullable();
            $table->string('description_title')->nullable();
            $table->longText('description_content')->nullable();
            $table->string('description_video')->nullable();
            $table->longText('description_pdf')->nullable();
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
        Schema::dropIfExists('weeks');
    }
};
