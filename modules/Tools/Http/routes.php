<?php

	Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'Modules\Tools\Http\Controllers'], function()
{
        Route::controller('tools','ToolsController',
            [
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
            'getHolidayDetails'=>'tools.holidayDetails',
            'getDeleteSymbol'=>'tools.deleteSymbol',
            'getToolsSettings'=>'tools.toolsSettings'

            ]);
});


Route::group(['middleware' => ['authenticate.client'],'prefix' => 'client', 'namespace' => 'Modules\Tools\Http\Controllers'], function()
{
        Route::controller('tools','ClientToolsController',[
            'getHoliday'=>'client.tools.holiday',
            'getFutureContract'=>'client.tools.futureContract',
             'getMarketWatch'=>'client.tools.marketWatch',
            'getHolidayDetails'=>'client.tools.holidayDetails',
            ]);
});