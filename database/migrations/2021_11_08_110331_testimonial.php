<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Testimonial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('partner_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('is_active')->default(1);   
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('partners');
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
