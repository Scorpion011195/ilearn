<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVietnameseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vietnamese', function (Blueprint $table) {
            $table->increments('id_vietnamese');
            $table->string('word',100);
            $table->string('listen',100);
            $table->string('explain',100);
            $table->integer('id_mapping');
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
        Schema::dropIfExists('vietnamese');
    }
}
