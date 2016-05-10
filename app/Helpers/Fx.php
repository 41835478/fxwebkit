<?php namespace Fxweb\Helpers;


class Fx
{
	public function __construct()
	{
		//
	}

	public function getCmdType($dCmd)
	{
		return trans('general.CMD_TYPE_'.$dCmd);
	}

	public function getAccountantType($cmd,$profit)
	{
            /*
             * cmd = 6,7
             * profit = DEPOSITS,CREDIT,MIN ,POS
             * 
             */
            if($profit ==0){
                $profit=($cmd==6)? "DEPOSITS":"CREDIT";
            }else{
            $profit=($profit > 0)? 'POS':'MIN';
            }
		return trans('general.ACCOUNTANT_TYPE_'.$cmd.'_'.$profit);
	}

}