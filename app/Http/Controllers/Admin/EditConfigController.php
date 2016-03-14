<?php

namespace Fxweb\Http\Controllers\admin;

use Illuminate\Http\Request;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

class EditConfigController extends Controller
{

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

    public  function getEditDropDownHtml($name,$array){
        $html='<div class="dropDownEditAllDiv">
                                        <div class="row">
                                            <div class="col-sm-6 nav-input-div ">

                                                    <label class="control-label">'.trans('general.arrayName').' </label>
                                          <select name="'.$name.'[]" id="select_'.$name.'" multiple="multiple" class="form-control">
                                          ';
        foreach($array as $key=>$value){$html.='<option onclick=" $(this).remove();"value="'.$key.','.$value.'">'.$value.'</option>';}

                                          $html.= ' </select>


                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2 form-group no-margin-hr">
                                            <input name="key" id="keyInput_'.$name.'" placeholder="'.trans('general.key').'  " class="form-control">

                                            </div>

                                            <div class="col-sm-2 form-group no-margin-hr">

                                            <input name="value" id="valueInput_'.$name.'" placeholder="'.trans('general.value').'  " class="form-control">
                                            </div>
                                            <div class="col-sm-2 form-group no-margin-hr">
                                            <button  type="button"class="add btn btn-primary"data-arrayname="'.$name.'" >'.trans('general.add').' </button>

                                            </div>
                                        </div>

</div>';
    return $html;

}


}
