<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateRentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id');
            $table->foreignId('member_id');
            $table->integer('copy_no');
            $table->date('reservation_date')->nullable();
            $table->date('rent_date')->nullable();;
            $table->date('return_date')->nullable();
            $table->date('due_date')->nullable();
            $table->foreignId('rent_status_id');
            $table->foreignId('feedback_id')->nullable();
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
        Schema::dropIfExists('rent_lists');
    }
}
