<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price')->nullable();
            $table->double('small')->nullable();
            $table->double('medium')->nullable();
            $table->double('large')->nullable();
            $table->double('xlg')->nullable();
            $table->string('premium_num')->nullable();
            $table->string('topping_num')->nullable();
            $table->string('large_size')->nullable();
            $table->string('large_size')->nullable();
            $table->double('extra_small')->nullable();
            $table->double('extra_large')->nullable();
            $table->boolean('extra_cheese')->nullable();
            $table->boolean('extra_meat')->nullable();
            $table->double('donair_small')->nullable();
            $table->double('donair_large')->nullable();
            $table->boolean('specialty')->nullable();
            $table->double('extra_piece')->nullable();
            $table->double('platter')->nullable();
            $table->double('homemade_garlic_souce')->nullable();
            $table->text('descriptions');
            $table->integer('category_id')->unsigned()->nullable();
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
        Schema::dropIfExists('products');
    }
}
