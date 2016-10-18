<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->create('pagament', function (Blueprint $table) {
          $table->string('codice', 4)->primary()->comment('Codice Univoco');
          $table->string('descrizion', 60)->nullable()->comment('');
          $table->string('tipopag', 1)->nullable()->comment('D=Rimessa Diretta; R=Ricevuta Bancaria; T=Tratta; P=Pagherò; B=Bonifico; L=Bollettino; C=Contrassegno; A=Altro; V=Scadenze Variabili');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->drop('pagament');
    }
}
