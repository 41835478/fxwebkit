<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAaaaaasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aaaaaas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('a');
            $table->string('s');
            $table->string('d');
            $table->time('f');
            $table->text('g');
            $table->boolean('h');
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
        Schema::drop('aaaaaas');
    }
}
