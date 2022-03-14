<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            
            $table->string('cover')->nullable()->after('slug');
            $table->string('cover_original_name')->nullable()->after('slug');
            $table->boolean('cover_up_by_user')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('cover');
            $table->dropColumn('cover_original_name');
            $table->dropColumn('cover_up_by_user');
        });
    }
}
