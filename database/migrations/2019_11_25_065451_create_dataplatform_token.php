<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataplatformToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataplatform_token', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->string('dtp_token',2000);
            $table->integer('timestamp');
            $table->integer('expire_date');
            $table->string('token_name');
            $table->integer('action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dataplatform_token');
    }
}
