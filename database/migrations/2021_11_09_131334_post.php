<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('syndicate_id');
            $table->string('title');
            $table->string('body')->nullable();
            $table->string('link')->nullable();
            $table->integer('is_active')->default(1);   
            $table->timestamps();
            $table->foreign('syndicate_id')->references('id')->on('syndicates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
