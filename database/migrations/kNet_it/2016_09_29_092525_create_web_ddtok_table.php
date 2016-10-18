<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebDdtokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->create('w_ddtok', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_testa')->unsigned()->comment('ID di Riferimento al Documento che la ha generata (doctes)');
            $table->string('firma', 50)->comment('Firma della Persona che certifica l\'arrivo');
            $table->text('note')->nullable()->comment('Note Varie');
            $table->bigInteger('user_id')->comment('Utente che Firma');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->drop('w_ddtok');
    }
}
