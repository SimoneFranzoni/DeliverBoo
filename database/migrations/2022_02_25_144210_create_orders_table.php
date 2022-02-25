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

            $table->unsignedBigInteger('restaurant_id');
            $table->string('email');
            $table->string('name');
            $table->string('surname');
            $table->string('telephone_guest');
            $table->string('address');
            
            $table->date('date_delivery');
            $table->times('time_delivery');
            $table->integer('total_price');
            $table->text('note');

            $table->foreign('restaurant_id')
                  ->references('id')
                  ->on('restaurants');

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
