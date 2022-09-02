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
            $table->enum('category',['lrs','crs']);
            $table->integer('copies_owned')->nullable();
            $table->integer('copies_left')->nullable();
            $table->integer('copies_lost')->nullable();
            $table->integer('pages')->nullable();
            $table->string('author',50);
            $table->foreignId('level_id');
            $table->foreignId('story_location_id')->nullable();
            $table->foreignId('book_location_id')->nullable();
            $table->foreignId('series_id')->nullable();
            $table->enum('main_character_gender',['male','female'])->nullable();   
            $table->foreignId('book_status_id')->nullable();         
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
