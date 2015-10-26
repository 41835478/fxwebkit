<?php

Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'accounts', 'namespace' => 'Modules\Accounts\Http\Controllers'], function()
{
        Route::controller('accounts','AccountsController',['getAccountsList'=>'accounts.accountsList','getEditAccount'=>'accounts.addAccount','getAsignMt4Users'=>'accounts.asignMt4Users','getDetailsAccount'=>'accounts.detailsAccount','getFullDetailsAccount'=>'accounts.fullDetailsAccount']);
        Route::controller('accounts2','AgentsController',['getAgentsList'=>'accounts.agentsList','getAddAgents'=>'accounts.addAgents']);
});

