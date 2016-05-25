<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmsFormsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_forms_payments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('OWNER_NAME');
            $table->string('ORDERID');
            $table->string('EMAIL');
            $table->string('OWNERTELNO');
            $table->string('OWNERADDRESS');
            $table->string('OWNERADDRESS2');
            $table->string('OWNERCTY');
            $table->string('OWNERZIP');
            $table->string('AMOUNT');
            $table->string('CURRENCY');
            $table->string('COM');
            $table->string('CN');
            $table->string('BRAND');
            $table->string('CARDNO');
            $table->string('EDM');
            $table->string('EDY');
            $table->string('CVC');
            $table->string('SHASign');
            $table->string('agreement');
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
        Schema::drop('cms_forms_payments');
    }
}
