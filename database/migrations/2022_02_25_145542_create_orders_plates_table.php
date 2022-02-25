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
            $table->unsignedBigInteger('plate_id');
    
            $table->foreign('plate_id')
            ->references('id')
            ->on('plates')
            ->onDelete('cascade');
    
            $table->unsignedBigInteger('order_id');
    
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
        Schema::dropIfExists('orders_plates');
    }
}
