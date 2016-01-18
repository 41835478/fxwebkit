<?php
	Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'tools', 'namespace' => 'Modules\Tools\Http\Controllers'], function()
{
        Route::controller('tools','ToolsController',[
            'getFutureContract'=>'tools.futureContract',
            'sendExpiryDate'=>'tools.sendExpiryDate',
            'getMarketWatch'=>'tools.marketWatch',
            'getAddContract'=>'tools.addContract',
            'getEditContract'=>'tools.editContract',
            'getDeleteContract'=>'tools.deleteContract',
             'getHoliday'=>'tools.holiday',
            'getAddHoliday'=>'tools.addHoliday',
            'getAddSymbolHoliday'=>'tools.addSymbolHoliday',
            'getEditHoliday'=>'tools.editHoliday',
            'getDeleteHoliday'=>'tools.deleteHoliday',

            ]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'tools', 'namespace' => 'Modules\Tools\Http\Controllers'], function()
{
        Route::controller('client-tools','ClientToolsController',[
            'getFutureContract'=>'client.tools.futureContract',
             'getMarketWatch'=>'client.tools.marketWatch',
            ]);
});