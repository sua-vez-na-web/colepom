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
            $table->unsignedBigInteger('syndicate_id');
            $table->unsignedBigInteger('partner_id');
            $table->string('name');
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();            
            $table->string('lat')->nullable();            
            $table->string('lng')->nullable();            
            $table->string('phone')->nullable();            
            $table->string('alt_phone')->nullable();               
            $table->timestamps();

            $table->foreign('syndicate_id')->references('id')->on('syndicates');
            $table->foreign('partner_id')->references('id')->on('partners');
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