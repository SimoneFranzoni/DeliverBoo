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
            
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('CAP');
            $table->string('city');
            $table->string('province');
            $table->string('phone');
            $table->string('doorbell');
            $table->string('email');
            $table->text('note');
            $table->integer('total_price');
            $table->string('slug');
            $table->boolean('processed')->default(false);
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
