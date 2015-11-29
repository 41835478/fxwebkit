<?php namespace Modules\Tools\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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


            $aFilterParams['id'] = $oRequest->id;
            $aFilterParams['first_name'] = $oRequest->first_name;
            $aFilterParams['last_name'] = $oRequest->last_name;
            $aFilterParams['email'] = $oRequest->email;

            $aFilterParams['sort'] = $oRequest->sort;
            $aFilterParams['order'] = $oRequest->order;

            $role = explode(',', Config::get('fxweb.client_default_role'));
            

            $oResults = $this->oFuture->getUsersByFilter($aFilterParams, false, $sOrder, $sSort, $role);

        


        return view('tools::future_contract')
                        ->with('oResults', $oResults)
                        ->with('aFilterParams', $aFilterParams);
            
        }
        
	public function getMarketWatch()
        {
            return 'MarketWatch';
        }
}