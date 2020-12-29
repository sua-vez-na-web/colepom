<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('syndicate_id');
            $table->enum('cycle', ['MONTLHY', 'SEMIANUALLY', 'YEARLY']);
            $table->unsignedBigInteger('plan_id');
            $table->string('description')->nullable();
            $table->string('a_reference')->nullable();
            $table->string('a_status')->nullable();
            $table->string('a_customer')->nullable();
            $table->date('a_next_due_date')->nullable();
            $table->double('a_value', 10, 2)->default(0);
            $table->string('a_billing_type')->nullable();
            $table->longText('a_raw')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
