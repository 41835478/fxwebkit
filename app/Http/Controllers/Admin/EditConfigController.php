<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

class EditConfigController extends Controller
{
    protected $dropDownJs;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->dropDownJs='';
    }
    public function index()
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

public  function getEditDropDownHtml($name){


    $this->dropDownJs.='';
    return $name;

}
    public function getEditDropDownJs(){

        return $this->dropDownJs;
    }

}
