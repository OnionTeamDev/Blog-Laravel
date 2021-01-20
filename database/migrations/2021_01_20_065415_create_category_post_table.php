<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_has_category', function (Blueprint $table) {
            $table->integer('post_model_id')->unsigned();
            $table->integer('category_model_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_model_id')->references('id')->on('category')
                ->onDelete('cascade');
            $table->foreign('post_model_id')->references('id')->on('post')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_has_category');
    }
}
