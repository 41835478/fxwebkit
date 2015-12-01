<?php namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Modules\Tools\Http\Requests\EditContractRequest;
use Modules\Tools\Repositories\FutureContract as Future;

class ToolsController extends Controller {
	
	public function index()
	{
		return view('tools::index');
	}
      
      protected $oFuture;
   

    public function __construct(
    Future $oFuture
    ) {
        $this->oFuture= $oFuture;
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
            'sort' => $sSort,
            'order' => $sOrder,
        ];

            if ($oRequest->has('search')) {
            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['name'] = $oRequest->name;
            $aFilterParams['symbol'] = $oRequest->symbol;
            $aFilterParams['exchange'] = $oRequest->exchange;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));
            

            $oResults = $this->oFuture->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);
            }
        


        return view('tools::future_contract')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
            
        }
        
	public function getMarketWatch()
        {
            return 'MarketWatch';
        }
        
        
        public function getAddContract()
        {
             return 'AddContract';
        }
        
        
        public function getEditContract(Request $oRequest)
        {
            $userInfo = [ 'id' => '',
            'name' => '',
            'symbol' => '',
            'exchange' => '',
            'month' => '',
            'year' => '',
            'start_date' => '',
            'expiry_date' => '',
        ];

        if ($oRequest->has('edit_id')) {

            $oResult = $this->oFuture->getUserDetails($oRequest->edit_id);
           

            $userInfo = [
                'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
              //  'country_array' => $country_array,
          
            ];
        }
        return view('tools::editContract')->with('userInfo', $userInfo);
    }

        public function postEditContract(EditContractRequest $oRequest) {

       $result = 0;
     
        $result = $this->oFuture->updateContract($oRequest);
        
        if ($result > 0) {

          $oRequest->id = $result;
            
            $oResult = $this->oFuture->getUserDetails($oRequest->id);

            $user_details = [

                 'id' => $oRequest->edit_id,
                'name' => $oResult['name'],
                'symbol' => $oResult['symbol'],
                'exchange' => $oResult['exchange'],
                'month' => $oResult['month'],
                'year' => $oResult['year'],
                'start_date' => $oResult['start_date'],
                'expiry_date' => $oResult['expiry_date'],
            ];
            
            return $this->getFutureContract($oRequest);
        } else {

            return view('accounts::addAccount')->withErrors($result);
        }
    }    
        
        
        public function getDeleteContract(Request $oRequest)
        {
            $result = $this->oFuture->deleteContract($oRequest->delete_id);
            return Redirect::route('tools.futureContract')->withErrors($result); 
        }
        
        
}