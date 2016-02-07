<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIbportalAgentsCommissionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibportal_agents_commission', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('id_rebate');
$table->integer('ticket');
$table->integer('id_mt4_user');
            $table->integer('id_user');
            $table->integer('plan_id');
            $table->integer('agent_id');
$table->double('rebate_agent');
$table->double('rebate_usd');
$table->double('commission_agent');
$table->double('commission_usd');
$table->double('conversion_rate');
$table->double('conversion_usd');
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
        Schema::drop('ibportal_agents_commission');
    }

}
