<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->enum('gender', ['male','female']);
            $table->string('email', 20);
            $table->string('phone_no', 20);
            $table->foreignId('institution_id')->nullable();
            $table->foreignId('region_id')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->foreignId('member_status_id')->default('1');
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
        Schema::dropIfExists('members');
    }
}
