<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->create('provinc', function (Blueprint $table) {
          $table->string('codice', 2)->primary()->comment('Codice Univoco');
          $table->string('descrizion', 50)->nullable()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->drop('provinc');
    }
}
