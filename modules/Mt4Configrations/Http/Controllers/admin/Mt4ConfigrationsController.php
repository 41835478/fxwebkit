<?php namespace Modules\Mt4configrations\Http\Controllers\admin;

use Illuminate\Support\Facades\Config;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Modules\Mt4Configrations\Repositories\Mt4ConfigrationsContract as Mt4Configrations;
use Fxweb\Http\Controllers\admin\EditConfigController as EditConfig;

class Mt4ConfigrationsController extends Controller
{


    public function index()
    {
        return view('Mt4configrations::index');
    }


    protected $Mt4Configrations;

    public function __construct(
        Mt4Configrations $Mt4Configrations

    )
    {

        $this->Mt4Configrations = $Mt4Configrations;

    }


    public function getSymbolsList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {

            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Mt4Configrations->getSymbolsByFilters($aFilterParams, false, $sOrder, $sSort);
        }


        return view('mt4configrations::symbol_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);
    }

    public function getSecuritiesList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];

        if ($oRequest->has('search')) {

            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Mt4Configrations->getSecuritiesByFilters($aFilterParams, false, $sOrder, $sSort);

        }


        return view('mt4configrations::securities_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }

    public function getGroupsList(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        if ($oRequest->has('search')) {


            $aFilterParams['name'] = $oRequest->name;


            $oResults = $this->Mt4Configrations->getGroupsByFilters($aFilterParams, false, $sOrder, $sSort);


        }


        return view('mt4configrations::group_list')->with('oResults', $oResults)
            ->with('aFilterParams', $aFilterParams);

    }


    public function postGroupsList(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $oResults = $this->Mt4Configrations->addGroups();


        return Redirect::route('admin.mt4Configrations.groupsList');

    }

    public function postSecuritiesList(Request $oRequest)
    {


        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $oResults = $this->Mt4Configrations->addSecurities();


        return Redirect::route('admin.mt4Configrations.securitiesList');

    }


    public function getSyncSymbols(Request $oRequest)
    {

        $sSort = ($oRequest->sort) ? $oRequest->sort : 'desc';
        $sOrder = ($oRequest->order) ? $oRequest->order : 'id';

        $oResults = null;

        $aFilterParams = [
            'name' => '',
            'sort' => $sSort,
            'order' => $sOrder,
        ];


        $oResults = $this->Mt4Configrations->synchronizeSymbols();


        return Redirect::route('admin.mt4Configrations.symbolsList');

    }

    public function getMt4ConfigrationsSettings()
    {
        $mt4ConfigurationsSetting = [

            'apiAdminPassword' => Config('mt4configrationsConfig.apiAdminPassword'),



        ];

        return view('mt4configrations::mt4ConfigurationsSetting')->with('mt4ConfigurationsSetting', $mt4ConfigurationsSetting);
    }

    public function postMt4ConfigrationsSettings(Request $oRequest)
    {


        $mt4ConfigurationsSetting = [

            'apiAdminPassword' =>$oRequest->apiAdminPassword,



        ];

        $editConfig = new EditConfig();

        $editConfig->editConfigFile('Config/mt4configrationsConfig.php', $mt4ConfigurationsSetting);

        \Session::flash('refresh', 'true');

        return view('mt4configrations::mt4ConfigurationsSetting')->with('mt4ConfigurationsSetting', $mt4ConfigurationsSetting);

    }
}