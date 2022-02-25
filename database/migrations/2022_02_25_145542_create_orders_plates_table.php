<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersPlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_plates', function (Blueprint $table) {
            $table->id();
    
            $table->integer('plate_id')->unsigned();
    
            $table->foreign('plate_id')
            ->references('id')
            ->on('plates')
            ->onDelete('cascade');
    
            $table->integer('order_id')->unsigned();
    
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');
    
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
        Schema::dropIfExists('order_plate');
    }
}
