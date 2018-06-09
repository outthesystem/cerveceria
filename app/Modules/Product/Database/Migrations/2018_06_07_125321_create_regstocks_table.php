<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('invoice_item_id')->nullable();
            $table->integer('stock_old')->nullable();
            $table->integer('stock_modify')->nullable();
            $table->integer('stock_new')->nullable();
            $table->boolean('sum')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('regstocks');
    }
}
