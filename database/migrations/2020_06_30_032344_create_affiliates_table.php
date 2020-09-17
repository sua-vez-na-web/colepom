<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('syndicate_id');
            $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_of_date');
            $table->string('genre', 1);
            $table->string('company')->nullable();
            $table->string('job_post')->nullable();
            $table->string('document')->unique();
            $table->string('zipcode');
            $table->string('address');
            $table->string('address_number');
            $table->string('address_complement');
            $table->string('city');
            $table->string('province');
            $table->boolean('is_aprooved')->default(false);

            $table->foreign('syndicate_id')->references('id')->on('syndicates');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('affiliates');
    }
}
