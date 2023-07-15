<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('cart.database.table'), function (Blueprint $table) {
            $table->increments('id'); // Clé primaire auto-incrémentée
            $table->string('identifier', 255);
            $table->string('instance', 255);
            $table->longText('content');
            $table->nullableTimestamps();
            $table->unique('instance');
            $table->unique('identifier'); // Index unique sur identifier et instance
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop(config('cart.database.table'));
    }
}

