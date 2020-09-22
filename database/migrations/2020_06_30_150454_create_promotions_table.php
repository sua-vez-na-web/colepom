<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('store_id');
            $table->string('code')->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->double('original_value', 10, 2)->default(0);
            $table->double('discount', 10, 2)->default(0);
            $table->integer('qty_available')->default(1);
            $table->integer('qty_remaining')->default(1);
            $table->text('redemption_rules')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
