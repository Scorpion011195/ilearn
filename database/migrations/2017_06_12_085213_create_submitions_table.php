<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitions', function (Blueprint $table) {
            $table->increments('id_submition');
            $table->string('from_text',100);
            $table->string('to_text',100);
            $table->integer('from_id_language');
            $table->integer('to_id_language');
            $table->longText('explain_from_text');
            $table->integer('no_of_visits');
        });        //
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitions');
    }
}
