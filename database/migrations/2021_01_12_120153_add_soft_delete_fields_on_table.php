<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteFieldsOnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('syndicates', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('affiliates', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropColumn('deleted_at');
        });

        Schema::table('syndicates', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
