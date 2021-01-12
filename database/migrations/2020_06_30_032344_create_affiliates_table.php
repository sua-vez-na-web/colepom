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
            $table->string('mobile_phone')->nulable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_of_date')->nullable();
            $table->string('genre', 1)->nullable();
            $table->string('company')->nullable()->nullable();
            $table->string('job_post')->nullable()->nullable();
            $table->string('document')->unique()->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address_complement')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->boolean('is_aprooved')->default(false);

            $table->foreign('syndicate_id')->references('id')->on('syndicates')->onDelete(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete(null);
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
