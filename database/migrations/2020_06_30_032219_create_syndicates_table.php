    <?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateSyndicatesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('syndicates', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('user_id');
                $table->string('name');
                $table->string('president_name')->nullable();
                $table->string('cpf_cnpj')->unique(); //CNPJ or CPF
                $table->string('email')->unique();
                $table->string('phone')->nullable();
                $table->string('mobile_phone');
                $table->string('brand')->nullable();
                $table->string('site')->nullable();
                $table->string('facebook')->nullable();
                $table->string('instagram')->nullable();
                $table->string('youtube')->nullable();
                $table->string('zipcode')->nullable();
                $table->string('address')->nullable(0);
                $table->string('address_number')->nullable();
                $table->string('address_complement')->nullable();
                $table->string('city')->nullable();
                $table->string('province')->nullable();
                $table->boolean('asaas_notify')->default(true);
                $table->string('asaas_id')->unique()->nullable();
                $table->string('municipal_inscription')->nullable();
                $table->string('state_inscription')->nullable();
                $table->text('observations')->nullable();
                $table->boolean('is_aprooved')->default(false);
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('syndicates');
        }
    }
