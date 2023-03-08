<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            
        Schema::create('cart_items', function (Blueprint $table) {

            $table->id();
            $table->integer('product_id');
            $table->integer('user_id');
            
            $table->string('quantity');
            $table->string('price');
            $table->string('total');
            $table->string('discount')->default(0);
            $table->string('counter');
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
    Schema::dropIfExists('cart_items');
    }
}
