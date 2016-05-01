<?php

namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Tools\Http\Requests\EditContractRequest;
use Modules\Tools\Http\Requests\AddContractRequest;
use Modules\Tools\Repositories\FutureContract as Future;
use Modules\Tools\Repositories\HolidayContract as Holiday;
use Fxweb\Repositories\Admin\User\UserContract as Users;
use Fxweb\Http\Controllers\admin\Email;
use Fxweb\Http\Controllers\admin\EditConfigController as EditConfig;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Fxweb\Models\SettingsMassMail;

class ToolsController extends Controller
{

    public function index()
    {
        return view('tools::index');
    }

    protected $oFuture;
    protected $oUsers;
    protected $oHoliday;

    public function __construct(
        Future $oFuture, Users $oUsers, Holiday $oHoliday
    )
    {
        $this->oFuture = $oFuture;
        $this->oUsers = $oUsers;
        $this->oHoliday = $oHoliday;
    }

    public function getFutureContract(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';
        $aGroups = [];
        $oResults = null;
        $aFilterParams = [
            'id' => '',
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'all_groups' => true,
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('deleteContract')) {

            $result = $this->oFuture->deleteContract($oRequest->contract_checkbox);
            /* TODO with success */
            return Redirect::route('tools.futureContract')->withErrors($result);
        }

        if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['exchange'] = $oRequest->exchange;
            $aFilterParams['all_groups'] = ($oRequest->has('all_groups') ? true : false);
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));
            $oResults = $this->oFuture->getContractByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        }


        return view('tools::future_contract')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getSendExpiryDate(Request $oRequest)
    {
        $expiryResults = $this->oFuture->sendExpiryNotificationsEmail();

        if (!count($expiryResults))
            return '';



        $ids=[];
        $names=[];
        $symbols=[];
        $exchanges=[];
        $months=[];
        $years=[];
        $start_dates=[];
        $expiry_dates=[];

        foreach ($expiryResults as $expiry) {
            $ids[]=$expiry['id'];
            $names[]=$expiry['name'];
            $symbols[]=$expiry['symbol'];
            $exchanges[]=$expiry['exchange'];
            $months[]=$expiry['month'];
            $years[]=$expiry['year'];
            $start_dates[]=$expiry['start_date'];
            $expiry_dates[]=$expiry['expiry_date'];


        }

        /* TODO how to determine the expire email language until now it's english */

        $emailBody = View::make('admin.email.templates.en.expiryContract',
            [
                'name' => 'Sir',
                'ids'=>$ids,
                'names'=>$names,
                'symbols'=>$symbols,
                'exchanges'=>$exchanges,
                'months'=>$months,
                'years'=>$years,
                'start_dates'=>$start_dates,
                'expiry_dates'=>$expiry_dates,
            ]);


        $EmailClass = new Email();

        $email = SettingsMassMail::create([
            'subject' => 'expiry symbols details',
            'mail' => $emailBody->render(),
            'group_id' =>-1,
            'language' => 'en'
        ]);
        $EmailClass->autoSendMassMail(7, $email->id, 0);

    }

    public function getMarketWatch()
    {
        return view('tools::marketWatch');
    }

    public function getAddContract(Request $oRequest)
    {

        $month_array = $this->oFuture->getMonth(null);
        $exchange_array = $this->oFuture->getExchange();
        $name_array = $this->oFuture->getName();


        $contractInfo = ['edit_id' => 0,
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'month_array' => $month_array,
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'aExchange' => $exchange_array,
            'aName' => $name_array,
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oFuture->getContractDetails($oRequest->edit_id);


            $contractInfo = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'month_array' => $month_array,
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
                'aExchange' => $exchange_array,
                'aName' => $name_array,
            ];
        }
        return view('tools::addContract')->with('contractInfo', $contractInfo);
    }

    public function postAddContract(AddContractRequest $oRequest)
    {

        $result = 0;

        $result = $this->oFuture->addContract($oRequest);

        if ($result > 0) {

            $oRequest->edit_id = $result;

            $oResult = $this->oFuture->getContractDetails($oRequest->edit_id);

            $contract_details = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
            ];

            return Redirect::route('tools.futureContract');
        }
    }

    public function getEditContract(Request $oRequest)
    {

        $month_array = $this->oFuture->getMonth(null);
        $exchange_array = $this->oFuture->getExchange();
        $name_array = $this->oFuture->getName();


        $contractInfo = ['id' => '',
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'month_array' => $month_array,
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
            'aExchange' => $exchange_array,
            'aName' => $name_array,
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oFuture->getContractDetails($oRequest->edit_id);


            $contractInfo = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'month_array' => $month_array,
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
                'aExchange' => $exchange_array,
                'aName' => $name_array,
            ];
        }
        return view('tools::editContract')->with('contractInfo', $contractInfo);
    }

    public function postEditContract(EditContractRequest $oRequest)
    {

        $result = 0;

        $result = $this->oFuture->updateContract($oRequest);

        if ($result > 0) {

            $oRequest->id = $result;

            $oResult = $this->oFuture->getContractDetails($oRequest->id);

            $contract_details = [

                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
            ];

            return Redirect::route('tools.futureContract');
        }
    }

    public function getDeleteContract(Request $oRequest)
    {
        $result = $this->oFuture->deleteContract($oRequest->delete_id);
        /* TODO with success */
        return Redirect::route('tools.futureContract')->withErrors($result);
    }

    public function getHoliday(Request $oRequest)
    {
        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'id' => '',
            'name' => '',
            'start_date' => '',
            'end_date' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        if ($oRequest->has('search')) {

            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['start_date'] = $oRequest->start_date;
            $aFilterParams['end_date'] = $oRequest->end_date;
            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;


            $oResults = $this->oHoliday->getHolidayByFilter($aFilterParams, false, $sOrder, $sSort);

        }


        return view('tools::holiday')
            ->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }


    public function getAddHoliday(Request $oRequest)
    {

        $holidayInfo = ['edit_id' => 0,
            'name' => '',
            'start_date' => '',
            'end_date' => ''
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oHoliday->getHolidyDetails($oRequest->edit_id);


            $holidayInfo = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'start_date' => $oResult['start_date'],
                'end_date' => $oResult['end_date']
            ];
        }
        return view('tools::addHoliday')->with('holidayInfo', $holidayInfo);
    }

    public function postAddHoliday(Request $oRequest)
    {

        $result = 0;
        $holiday_details = [
            'id' => $oRequest->edit_id,
            'name' => $oRequest->name,
            'start_date' => $oRequest->start_date,
            'end_date' => $oRequest->end_date,
        ];
        $result = $this->oHoliday->addHoliday($holiday_details);

        if ($result > 0) {

            $oRequest->edit_id = $result;

            $oResult = $this->oHoliday->getHolidayDetails($oRequest->edit_id);

            $holiday_details = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'start_date' => $oResult['start_date'],
                'end_date' => $oResult['expiry_date'],
            ];

            return Redirect::to(route('tools.addSymbolHoliday') . '?holiday_id=' . $oResult->id);
        }
    }

    public function getEditHoliday(Request $oRequest)
    {


        $oResult = $this->oHoliday->getHolidayDetails($oRequest->edit_id);


        $holidayInfo = [
            'id' => $oRequest->edit_id,
            'name' => $oResult['name'],
            'start_date' => $oResult['start_date'],
            'end_date' => $oResult['end_date']
        ];

        return view('tools::editHoliday')->with('holidayInfo', $holidayInfo);
    }

    public function postEditHoliday(Request $oRequest)
    {

        $oResult = $this->oHoliday->getUpdateholiday($oRequest);

        $holidayInfo = [
            'id' => $oRequest->edit_id,
            'name' => $oResult['name'],
            'start_date' => $oResult['start_date'],
            'end_date' => $oResult['expiry_date'],
        ];

        return Redirect::route('tools.holiday');

    }

    public function getDeleteHoliday(Request $oRequest)
    {
        $result = $this->oHoliday->deleteHoliday($oRequest->delete_id);
        /* TODO with success */
        return Redirect::route('tools.holiday')->withErrors($result);
    }

    /**
     * @param Request $oRequest
     * @param string $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddSymbolHoliday(Request $oRequest, $message = '')
    {
        $carbon = new Carbon();
        $dt = $carbon->now();

        $oResult = $this->oHoliday->getHolidayDetails($oRequest->holiday_id);

        $holidayInfo = [
            'id' => $oRequest->holiday_id,
            'name' => $oResult['name'],
            'date' => $oResult['start_date'],
            'start_hour' => $dt->format('H:i'),
            'end_hour' => $dt->format('H:i'),
        ];


        $symbols = $this->oHoliday->getSymbols();


        $view = view('tools::addSymbolHoliday');
        $view->with('holidayInfo', $holidayInfo);

        $view->with('symbols', $symbols);
        if ($message != '') {
            $view->withErrors($message);
        }
        return $view;
    }


    public function postAddSymbolHoliday(Request $oRequest)
    {

        if ($oRequest->start_hour >= $oRequest->end_hour) {
            // return $this->getAddSymbolHoliday($oRequest, trans('tools::tools.start_hour_message'));
        }


        $result = $this->oHoliday->addSymbolsHoliday($oRequest->symbols,
            $oRequest->holiday_id,
            $oRequest->start_hour,
            $oRequest->end_hour,
            $oRequest->date);


        $message = ($result == false) ? trans('tools::tools.no_thing_message') : '';
        return $this->getAddSymbolHoliday($oRequest, $message);
    }


    public function getHolidayDetails(Request $oRequest)
    {

        $holiday_id = ($oRequest->has('holiday_id')) ? $oRequest->holiday_id : 0;
        $oResult = $this->oHoliday->getHolidayDetails($holiday_id);


        $holidayInfo = [
            'id' => $holiday_id,
            'name' => $oResult['name'],
            'start_date' => $oResult['start_date'],
            'end_date' => $oResult['end_date'],

        ];
        $date = ($oRequest->has('date')) ? $oRequest->date : '';
        list($aSymbolsHours, $aDates, $date) = $this->oHoliday->getHolidaySymbolsDetails($holiday_id, $date);

        return view('tools::holidayDetails')
            ->with('holidayInfo', $holidayInfo)
            ->with('aSymbolsHours', $aSymbolsHours)
            ->with('aDates', $aDates)
            ->with('date', $date);
    }

    public function getDeleteSymbol(Request $oRequest)
    {
        $result = $this->oHoliday->deleteSymbol($oRequest->delete_id);
        // todo[mohammad] check if there anther way (to(route) to send var with route
        return Redirect::to(route('tools.holidayDetails') . '?holiday_id=' . $oRequest->holiday_id . '&date=' . $oRequest->date)->withErrors($result);
    }





    public function getToolsSettings()
    {
        $toolsSetting = [

            'is_client' => Config('toolsConfig.is_client'),


        ];

        return view('tools::toolsSetting')->with('toolsSetting', $toolsSetting);
    }

    public function postToolsSettings(Request $oRequest)
    {
        $is_client = ($oRequest->is_client) ? 1 : 0;

        $toolsSetting = [
            'is_client' => $is_client,
        ];

        $editConfig = new EditConfig();
        $editConfig->editConfigFile('Config/toolsConfig.php', $toolsSetting);

        return view('tools::toolsSetting')->with('toolsSetting', $toolsSetting);

    }


}
