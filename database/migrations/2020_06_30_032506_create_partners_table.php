<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('social_reason');
            $table->string('cpf_cnpj')->unique(); //CNPJ or CPF
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('brand')->nullable();
            $table->string('site')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('zipcode');
            $table->string('address');
            $table->string('address_number');
            $table->string('address_complement');
            $table->string('city');
            $table->string('province');
            $table->text('observations')->nullable();
            $table->boolean('is_aprooved')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('partners');
    }
}
