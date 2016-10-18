<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaggrpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->create('maggrp', function (Blueprint $table) {
            $table->string('codice', 5)->primary()->comment('Codice Univoco');
            $table->string('descrizion', 30)->nullable()->comment('');
            $table->tinyInteger('livello')->nullable()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->drop('maggrp');
    }
}
