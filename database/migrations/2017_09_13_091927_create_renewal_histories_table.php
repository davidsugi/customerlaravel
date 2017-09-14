<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenewalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renewal_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_perpanjang');
            $table->date('end');
            $table->integer('biaya');
            $table->integer('domain_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('domain_id')
                   ->references('id')
                   ->on('domains');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renewal_histories');
    }
}
