<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->integer('uf_code')->nullable();
            $table->integer('city_code')->nullable();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->integer('uf_code')->nullable();
            $table->integer('city_code')->nullable();
        });

        Schema::table('syndicates', function (Blueprint $table) {
            $table->integer('uf_code')->nullable();
            $table->integer('city_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('uf_code');
            $table->dropColumn('city_code');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('uf_code');
            $table->dropColumn('city_code');
        });

        Schema::table('syndicates', function (Blueprint $table) {
            $table->dropColumn('uf_code');
            $table->dropColumn('city_code');
        });
    }
}
