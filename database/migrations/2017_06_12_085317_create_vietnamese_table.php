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
            $table->increments('id');
            $table->string('word',100);
            $table->string('listen',100)->nullable()->default(null);;
            $table->longtext('explain')->nullable()->default(null);;
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
