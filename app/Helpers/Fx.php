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

}