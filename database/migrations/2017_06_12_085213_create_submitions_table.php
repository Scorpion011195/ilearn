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
            $table->integer('STT');
            $table->string('from',100);
            $table->string('to',100);
            $table->string('from_text',100);
            $table->string('to_text',100);
            $table->integer('quanlity');
            $table->string('status',100);
        });
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
