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

    public function insertInternalTransferRequest($fromLogin,$toLogin,$amount,$comment,$reason,$status){
       $log= new InternalTransfer();

        $log->insert([
            'from_login'=>$fromLogin,
            'to_login'=>$toLogin,
            'amount'=>$amount,
            'comment'=>$comment,
            'reason'=>$reason,
            'status'=>$status
        ]);
        return ture;

    }


}
