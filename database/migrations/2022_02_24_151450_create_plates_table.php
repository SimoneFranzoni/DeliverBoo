<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->boolean('is_available');
            $table->decimal('price');
            $table->text('ingrediants');
            $table->string('category');
            $table->string('cover')->nullable();
            $table->string('cover_original_name')->nullable();
            $table->timestamps();

            $table->foreign('restaurant_id')
                  ->references('id')
                  ->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
