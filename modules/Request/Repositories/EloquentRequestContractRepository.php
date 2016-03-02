<?php

namespace Modules\Request\Repositories;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Config;


class EloquentRequestContractRepository implements RequestContract
{

    /**
     */
    public function __construct()
    {
        //
    }


    function editConfigFile($filePath, $variables)
    {

//$config = new Larapack\ConfigWriter\Repository('modules/Accounts/Config/config.php'); // loading the config from config/app.php
//        $config = new Larapack\ConfigWriter\Repository('Config/fxweb.php'); // loading the config from config/app.php
        $config = new \Larapack\ConfigWriter\Repository($filePath);

        if (count($variables)) {
            foreach ($variables as $key => $value) {
                $config->set($key, $value);
            }
        }
        $config->save();
    }

    public function getInternalTransferRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new InternalTransfer();

        if (isset($aFilters['login']) && !empty($aFilters['login'])) {
            $oResult = $oResult->where('login', 'like', '%' . $aFilters['login'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function getInternalTransferById($logId)
    {

        $oResult =InternalTransfer::find($logId);

        return $oResult;

    }


    public function internalTransferEdit($internalTransfer)
    {

        $log= InternalTransfer::find($internalTransfer['logId']);


        $log->comment=$internalTransfer['comment'];
        $log->reason=$internalTransfer['reason'];
        $log->save();
        /* TODO before return true please check if the record saved correctly */


        return true;

    }

//    public function insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status){
//       $log= new InternalTransfer();
//
//        $log->insert([
//            'from_login'=>$fromLogin,
//            'to_login'=>$toLogin,
//            'amount'=>$amount,
//            'comment'=>$comment,
//            'reason'=>$reason,
//            'status'=>$status
//        ]);
//        return true;
//
//    }
//
//public function updateInternalTransferRequest($logId,$fromLogin,$toLogin,$amount,$comment,$reason,$status){
//$log= InternalTransfer::find($logId);
//
//$log->from_login=$fromLogin;
//    $log->to_login=$toLogin;
//$log->amount=$amount;
//$log->comment=$comment;
//$log->reason=$reason;
//$log->status=$status;
//
//return true;
//}


}
