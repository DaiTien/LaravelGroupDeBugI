<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('customer_id');
            $table->decimal('total');
            $table->decimal('discount');
            $table->Integer('amount');
            $table->string('d_name');
            $table->string('d_address');
            $table->string('d_phone');
            $table->text('note');
            $table->Integer('status');
            $table->Integer('paymount_status');
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
        Schema::dropIfExists('orders');
    }
}
