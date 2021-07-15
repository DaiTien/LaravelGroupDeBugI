<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('movie_id')->nullable();
            $table->integer('show_time_id')->nullable();
            $table->integer('total_seat')->nullable();
            $table->string('total_price')->nullable();
            $table->string('discount')->nullable();
            $table->integer('status')->nullable();
            $table->string('seats_id')->nullable();
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
        Schema::dropIfExists('book_tickets');
    }
}
