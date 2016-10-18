<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsAnagrafe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->table('anagrafe', function (Blueprint $table) {
            $table->integer('numins')->unsigned()->default(0)->after('fido')->comment('Numero Progressivo Insoluti');
            $table->double('totins')->default(0)->after('numins')->comment('Numero Totale Insoluti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CNCT_IT', 'kNet_it'))->table('anagrafe', function (Blueprint $table) {
             $table->dropColumn(['numins', 'totins']);
        });
    }
}
