<?php
	Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'tools', 'namespace' => 'Modules\Tools\Http\Controllers'], function()
{
        Route::controller('tools','ToolsController',[
            'getFutureContract'=>'tools.futureContract',
            'getMarketWatch'=>'tools.marketWatch',
            'getAddContract'=>'tools.addContract',
            'getEditContract'=>'tools.editContract',
            'getDeleteContract'=>'tools.deleteContract',
            ]);
});
