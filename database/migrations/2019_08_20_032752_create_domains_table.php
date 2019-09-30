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
            $table->string('name',253)->unique();
            $table->integer('account_id');
            $table->string('token',36);
            $table->string('description');
            $table->integer('timestamp');
            $table->string('dns_challenge',63);
            $table->string('reclamation_token',36);
            $table->string('verification_token',36);
            $table->boolean('verified');
            $table->string('continent',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain');
    }
}
