<?php

namespace Modules\Request\Repositories;

use Modules\Request\Entities\RequestInternalTransfer as InternalTransfer;
use Modules\Request\Entities\RequestWithdrawal as Withdrawal;
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

        if (isset($aFilters['status']) && $aFilters['status'] >= 0) {
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

    public function getWithdrawalRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {

        $oResult = new Withdrawal();

        if (isset($aFilters['login']) && !empty($aFilters['login'])) {
            $oResult = $oResult->where('from_login', 'like', '%' . $aFilters['login'] . '%');
        }

        if (isset($aFilters['status']) && $aFilters['status'] >= 0) {
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

    public function getChangeLeverageRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {
        $oResult = new  ChangeLeverage();

        if (isset($aFilters['login']) && !empty($aFilters['login'])) {
            $oResult = $oResult->where('login', 'like', '%' . $aFilters['login'] . '%');
        }


        if (isset($aFilters['status']) && $aFilters['status'] >= 0) {
            $oResult = $oResult->where('status', $aFilters['status']);
        }

        if (isset($aFilters['server_id']) && $aFilters['server_id'] >= 0) {
            $oResult = $oResult->where('server_id', $aFilters['server_id']);
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

        if (isset($aFilters['status']) && $aFilters['status'] >= 0) {
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


    public function getInternalTransferById($logId)
    {

        $oResult = InternalTransfer::find($logId);
        return $oResult;
    }


    public function internalTransferEdit($internalTransfer)
    {

        $log = InternalTransfer::find($internalTransfer['logId']);
        $log->comment = $internalTransfer['comment'];
        $log->reason = $internalTransfer['reason'];
        $log->status = $internalTransfer['status'];
        $log->save();
        return true;
    }


    public function getWithdrawalById($logId)
    {

        $oResult = Withdrawal::find($logId);
        return $oResult;
    }

    public function getAddAccountById($logId)
    {

        $oResult = AddAccount::find($logId);
        return $oResult;
    }

    public function getChangeLeverageById($logId)
    {

        $oResult = ChangeLeverage::find($logId);
        return $oResult;
    }

    public function getChangePasswordById($logId)
    {

        $oResult = ChangePassword::find($logId);
        return $oResult;
    }

    public function getAssignAccountById($logId)
    {

        $oResult = AssignAccount::find($logId);
        return $oResult;
    }


    public function withdrawalEdit($withdrawal)
    {

        $log = Withdrawal::find($withdrawal['logId']);
        $log->comment = $withdrawal['comment'];
        $log->reason = $withdrawal['reason'];
        $log->status = $withdrawal['status'];
        $log->save();
        return true;
    }

    public function assignAccountEdit($assignAccount)
    {

        $log = AssignAccount::find($assignAccount['logId']);
        $log->comment = $assignAccount['comment'];
        $log->reason = $assignAccount['reason'];
        $log->status = $assignAccount['status'];
        $log->save();
        return true;
    }

    public function addAccountEdit($addAccount)
    {

        $log = AddAccount::find($addAccount['logId']);
        $log->comment = $addAccount['comment'];
        $log->reason = $addAccount['reason'];
        $log->status = $addAccount['status'];
        $log->save();
        return true;
    }


    public function changePasswordEdit($changePassword)
    {

        $log = ChangePassword::find($changePassword['logId']);
        $log->comment = $changePassword['comment'];
        $log->reason = $changePassword['reason'];
        $log->status = $changePassword['status'];
        $log->save();
        return true;
    }


    public function changeLeverageEdit($changeLeverage)
    {
        $log = ChangeLeverage::find($changeLeverage['logId']);
        $log->comment = $changeLeverage['comment'];
        $log->reason = $changeLeverage['reason'];
        $log->status = $changeLeverage['status'];
        $log->save();
        return true;
    }

    public function getAddAccountRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'id', $sSort = 'ASC')
    {
        $oResult = new  AddAccount();

        if (isset($aFilters['first_name']) && !empty($aFilters['first_name'])) {
            $oResult = $oResult->where('first_name', 'like', '%' . $aFilters['first_name'] . '%');
        }

        if (isset($aFilters['status']) && $aFilters['status'] >= 0) {
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

    public function getAssignAccountRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC')
    {
        $oResult = new  AssignAccount();

        if (isset($aFilters['login']) && !empty($aFilters['login'])) {
            $oResult = $oResult->where('login', 'like', '%' . $aFilters['login'] . '%');
        }


        if (isset($aFilters['status']) && $aFilters['status'] >= 0) {
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
