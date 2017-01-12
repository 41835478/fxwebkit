<?php 
namespace Modules\Request\Repositories;


interface RequestContract
{
    public function getInternalTransferRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

    public function getWithdrawalRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

    public function getChangeLeverageRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

    public function getChangePasswordRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');

    public function getInternalTransferById($logId);

    public function internalTransferEdit($internalTransfer);

    public function getWithdrawalById($logId);

    public function getAddAccountById($logId);

    public function getChangeLeverageById($logId);

    public function getChangePasswordById($logId);

    public function getAssignAccountById($logId);

    public function withdrawalEdit($withdrawal);

    public function assignAccountEdit($assignAccount);

    public function addAccountEdit($addAccount);

    public function changePasswordEdit($changePassword);

    public function changeLeverageEdit($changeLeverage);

    public function getAddAccountRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'id', $sSort = 'ASC');

    public function getAssignAccountRequestByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC');
}