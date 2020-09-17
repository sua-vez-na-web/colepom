<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('phone');
            $table->string('brand')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('zipcode');
            $table->string('address');
            $table->string('address_number');
            $table->string('address_complement')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

            $table->timestamps();


            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
