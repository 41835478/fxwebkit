<?php

namespace Modules\Mt4Configrations\Repositories;
use Modules\Mt4Configrations\Entities\ConfigrationsSymbols;


use Modules\Mt4configrations\Entities\ConfigrationsGroups as Groups;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsMargin as GroupsMargin;
use Modules\Mt4configrations\Entities\ConfigrationsGroupsSecurities as GroupsSecurities;
use Modules\Mt4configrations\Entities\ConfigrationsSymbolGroup as SymbolGroup;
use Modules\Mt4configrations\Entities\ConfigrationsSymbols as Symbols;
use Config;
class EloquentMt4ConfigrationsContractRepository implements Mt4ConfigrationsContract
{

    /**
     */
    public function __construct()
    {
        //
    }

    public function getSymbolsByFilters($aFilters, $bFullSet = false, $sOrderBy = 'login', $sSort = 'ASC'){

        $oResult = new ConfigrationsSymbols();

        if (isset($aFilters['name']) && !empty($aFilters['name'])) {
            $oResult = $oResult->where('name', 'like', '%' . $aFilters['name'] . '%');
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
