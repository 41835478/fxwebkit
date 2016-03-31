<?php

namespace Fxweb\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

class LanguageController extends Controller
{


    public function getEditLanguage(Request $request){

        $modules=[''=>'public',
        'modules/Accounts'=>'Account',
            'modules/Cms'=>'Cms',
            'modules/Ibportal'=>'Ibportal',
            'modules/Mt4Configrations'=>'Configrations',
            'modules/Reports'=>'Reports',
            'modules/Request'=>'Request',
            'modules/Tools'=>'Tools'];
        $module=($request->has('module'))? $request->module:'';
        $resourceFolder=base_path($module);

        $languages=config('app.language');

        $language=($request->has('language'))?$request->language:'en';


        list($files,$firstFiles)=$this->getFilesList($resourceFolder.'/resources/lang/'.$language);

        $file=($request->has('file') && array_key_exists($request->file,$files))?$request->file:$firstFiles;


        $enArray=include($resourceFolder.'/resources/lang/en/'.$file);
        $otherLanguageArray=[];
        if($language=='en'){
            $otherLanguageArray=$enArray;
        }else{

            $otherLanguageArray=include($resourceFolder.'/resources/lang/'.$language.'/'.$file);

        }

        return view('admin.language',[
            'languages'=>$languages,
            'language'=>$language,
            'files'=>$files,
            'file'=>$file,
            'modules'=>$modules,
            'module'=>$module,
            'enArray'=>$enArray,
            'otherLanguageArray'=>$otherLanguageArray
        ]);

    }

    public function postEditLanguage(Request $request){

       $this->directWriteArrayToFile(base_path($request->module.'/resources/lang/'.$request->language.'/'.$request->file),$request->translate);
   return $this->getEditLanguage($request);
    }


    public function ifFileArrayReplace($filePath,$tempFile){

        $tempArray=include('$tempFile');
        if(is_array($tempArray)){
            unlink($filePath);

            rename($tempFile, basename($filePath));
        }
    }


    public function arrayToString( $array)
    {
        if(!is_array($array)){return "<?php  return []; ?>";}
        $sArray = "<?php return [\n";
        foreach ($array as &$key=>$value) {

            $sArray .= "'" . $key . "'=>'" .$value . "',\n";

        }
        $sArray .= ']; ?>';
        return $sArray;
    }

    public function createTempArrayFile(){

    }
    public function directWriteArrayToFile($filePath,$array){
        file_put_contents($filePath,$this->arrayToString($array));
    }

    public function getFilesList($folder){


        $files=scandir($folder);
        $aFiles=[];
        $firstFiles='';
        $i=0;
        foreach($files as $key=>$file){
            if($file =='.' || $file =='..' ){continue;}
            if($i==0){$firstFiles=$file;}
            $aFiles[$file]=$file;
            $i++;
        }
        return [$aFiles,$firstFiles];
    }

}
