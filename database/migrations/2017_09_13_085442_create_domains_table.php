<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('start');
            $table->date('end');
            $table->integer('fee');
            $table->integer('renewal_fee');
            $table->integer('cust_id')->unsigned();
            $table->integer('reg_id')->unsigned();
            $table->timestamps();

            $table->foreign('cust_id')
                   ->references('id')
                   ->on('customers');
                   
            $table->foreign('reg_id')
                   ->references('id')
                   ->on('registrars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
