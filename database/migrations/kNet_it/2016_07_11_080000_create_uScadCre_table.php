<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUScadCreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->create('u_scadcre', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary()->comment('ID univoco');
            $table->bigInteger('id_crediti')->unsigned()->comment('ID rif. crediti_st');
            $table->bigInteger('id_scad')->unsigned()->comment('ID rif. Scadenze');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->drop('u_scadcre');
    }
}
