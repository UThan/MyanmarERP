<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('book_no');
            $table->string('title', 50);
            $table->foreignId('category_id');
            $table->integer('copies_owned')->nullable();
            $table->integer('copies_left')->nullable();
            $table->integer('copies_lost')->nullable();
            $table->integer('pages')->nullable();
            $table->foreignId('level_id');
            $table->foreignId('setting_id');
            $table->foreignId('series_id');
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
        Schema::dropIfExists('books');
    }
}
