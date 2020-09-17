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
                $table->string('president_name');
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
