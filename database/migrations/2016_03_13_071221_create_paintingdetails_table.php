<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintingdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagedetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('quick_overview');
            $table->string('producut_description');
            $table->string('add_info');
            $table->string('reviews');
            $table->integer('rating');
            $table->string('image_path');
            $table->string('price');

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
        Schema::drop('imagedetails');
    }
}
