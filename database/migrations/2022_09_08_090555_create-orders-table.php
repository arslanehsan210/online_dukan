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
        Schema::create('orders' , function(Blueprint $table){
            $table->id();
            
            $table->integer('user_id');
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('address_1');
            $table->string('addres_2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('total_amount');
            $table->string('payment')->default('Pending');
            $table->string('items');
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
