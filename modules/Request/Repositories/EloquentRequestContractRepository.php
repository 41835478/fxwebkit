<?php

namespace Modules\Request\Repositories;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Modules\Request\Entities\RequestWithdrawal as WithDrawal;
use Modules\Request\Entities\RequestChangeLeverage as ChangeLeverage;
use Modules\Request\Entities\RequestChangePassword as ChangePassword;
use Config;

use Modules\Request\Entities\RequestAddAccount as AddAccount;
use Modules\Request\Entities\RequestAssignAccount as AssignAccount;

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
            $oResult = $oResult->where('from_login', 'like', '%' . $aFilters['login'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }

    public function getWithDrawalRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new WithDrawal();

        if (isset($aFilters['login']) && !empty($aFilters['login'])) {
            $oResult = $oResult->where('from_login', 'like', '%' . $aFilters['login'] . '%');
        }


        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }
    public function getChangeLeverageRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new  ChangeLeverage();

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

    public function getChangePasswordRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new  ChangePassword();

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
        $log->status=$internalTransfer['status'];
        $log->save();
        /* TODO before return true please check if the record saved correctly */


        return true;

    }


    public function getWithDrawalById($logId)
    {

        $oResult =WithDrawal::find($logId);

        return $oResult;

    }

    public function getAddAccountById($logId)
    {

        $oResult =AddAccount::find($logId);

        return $oResult;

    }

    public function getChangeLeverageById($logId)
    {

        $oResult =ChangeLeverage::find($logId);

        return $oResult;

    }

    public function getChangePasswordById($logId)
    {

        $oResult =ChangePassword::find($logId);

        return $oResult;

    }

    public function getAssignAccountById($logId)
    {

        $oResult =AssignAccount::find($logId);

        return $oResult;

    }


    public function withDrawalEdit($withDrawal)
    {

        $log= WithDrawal::find($withDrawal['logId']);


        $log->comment=$withDrawal['comment'];
        $log->reason=$withDrawal['reason'];
        $log->status=$withDrawal['status'];
        $log->save();
        /* TODO before return true please check if the record saved correctly */


        return true;

    }

    public function assignAccountEdit($assignAccount)
    {

        $log= AssignAccount::find($assignAccount['logId']);


        $log->comment=$assignAccount['comment'];
        $log->reason=$assignAccount['reason'];
        $log->status=$assignAccount['status'];
        $log->save();
        /* TODO before return true please check if the record saved correctly */


        return true;

    }

    public function addAccountEdit($addAccount)
    {

        $log= AddAccount::find($addAccount['logId']);


        $log->comment=$addAccount['comment'];
        $log->reason=$addAccount['reason'];
        $log->status=$addAccount['status'];
        $log->save();
        /* TODO before return true please check if the record saved correctly */


        return true;

    }


    public function changePasswordEdit($changePassword)
    {

        $log= ChangePassword::find($changePassword['logId']);


        $log->comment=$changePassword['comment'];
        $log->reason=$changePassword['reason'];
        $log->status=$changePassword['status'];
        $log->save();
        /* TODO before return true please check if the record saved correctly */


        return true;

    }


    public function changeLeverageEdit($changeLeverage)
    {

        $log= ChangeLeverage::find($changeLeverage['logId']);


        $log->comment=$changeLeverage['comment'];
        $log->reason=$changeLeverage['reason'];
        $log->status=$changeLeverage['status'];
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
public function getAddAccountRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'id', $sSort = 'ASC'){

    $oResult = new  AddAccount();


    if (isset($aFilters['first_name']) && !empty($aFilters['first_name'])) {
        $oResult = $oResult->where('first_name', 'like', '%' . $aFilters['first_name'] . '%');
    }


    $oResult = $oResult->orderBy($sOrderBy, $sSort);


    if (!$bFullSet) {
        $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));

    } else {
        $oResult = $oResult->get();

    }

    return $oResult;

}

    public function getAssignAccountRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new  AssignAccount();

        if (isset($aFilters['login']) && !empty($aFilters['login'])) {
            $oResult = $oResult->where('login', 'like', '%' . $aFilters['login'] . '%');
        }


        if (isset($aFilters['status']) && $aFilters['status']>=0) {
            $oResult = $oResult->where('status', $aFilters['status']);
        }
        $oResult = $oResult->orderBy($sOrderBy, $sSort);

        if (!$bFullSet) {
            $oResult = $oResult->paginate(Config::get('fxweb.pagination_size'));
        } else {
            $oResult = $oResult->get();

        }

        return $oResult;

    }
}
