<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLottiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->create('lotti', function (Blueprint $table) {
          $table->string('codice', 20);
          $table->string('codicearti', 20);
          $table->string('descrizion', 40)->nullable()->comment('');
          $table->string('u_cli', 6)->nullable()->comment('');
          $table->boolean('u_noce')->nullable()->comment('');
          $table->primary(['codice', 'codicearti']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->drop('lotti');
    }
}
