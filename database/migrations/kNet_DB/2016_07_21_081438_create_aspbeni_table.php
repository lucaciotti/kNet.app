<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspbeniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspbeni', function (Blueprint $table) {
          $table->string('codice', 3)->primary()->comment('Codice Univoco');
          $table->string('descrizion', 30)->nullable()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aspbeni');
    }
}
