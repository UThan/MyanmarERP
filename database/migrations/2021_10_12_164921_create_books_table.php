<?php

use App\Helper\EnumArray;
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
            $table->enum('category',EnumArray::$category);
            $table->integer('pages')->nullable();
            $table->string('author',50);
            $table->foreignId('level_id');
            $table->foreignId('story_location_id')->nullable();
            $table->foreignId('book_location_id')->nullable();
            $table->foreignId('series_id')->nullable();
            $table->foreignId('main_character_id')->nullable();   
            $table->foreignId('book_status_id')->nullable();   
            $table->foreignId('genre_id')->nullable();   
            $table->foreignId('audience_id')->nullable();        
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
