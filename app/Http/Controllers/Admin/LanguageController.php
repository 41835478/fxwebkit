<?php

namespace Fxweb\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

class LanguageController extends Controller
{


    public function getEditLanguage(Request $request)
    {



        $modules=['/resources'=>'public',
            'modules/Accounts/Resources'=>'Account',
            'modules/Cms/Resources'=>'Cms',
            'modules/Ibportal/Resources'=>'Ibportal',
            'modules/Mt4Configrations/Resources'=>'Configrations',
            'modules/Reports/Resources'=>'Reports',
            'modules/Request/Resources'=>'Request',
            'modules/Tools/Resources'=>'Tools'];
        $module=($request->has('module'))? $request->module:'/resources';
        $resourceFolder=base_path($module);



        $languages = config('app.language');

        $language = ($request->has('language')) ? $request->language : 'en';


        list($files, $firstFiles) = $this->getFilesList($resourceFolder . '/lang/' . $language);

        $file = ($request->has('file') && array_key_exists($request->file, $files)) ? $request->file : $firstFiles;


        $enArray = include($resourceFolder . '/lang/en/' . $file);


        $enArray=$this->convertArrayToOneLevel($enArray);

        $otherLanguageArray = [];

        if ($language == 'en') {
            $otherLanguageArray = $enArray;
        } else {

            $otherLanguageArray = include($resourceFolder . '/lang/' . $language . '/' . $file);
            $otherLanguageArray=$this->convertArrayToOneLevel($otherLanguageArray);
        }


        return view('admin.language', [
            'languages' => $languages,
            'language' => $language,
            'files' => $files,
            'file' => $file,
            'modules' => $modules,
            'module' => $module,
            'enArray' => $enArray,
            'otherLanguageArray' => $otherLanguageArray

        ]);

    }

    private function convertArrayToOneLevel($array,$parent=''){
        $returnArray=[];
        foreach($array as $key=>$value){
            if(is_array($value)){
                $returnArray+= $this->convertArrayToOneLevel($value,$parent.(($parent=='')? $key.']':'['.$key.']'));
            }else{
                $key =$parent.(($parent=='')? $key.']':'['.$key.']');
                $returnArray[$key]=$value;
            }
        }
       return  $returnArray;
    }

    public function postEditLanguage(Request $request)
    {


        $this->directWriteArrayToFile(base_path($request->module . '/lang/' . $request->language . '/' . $request->file), $request->translate);


        return $this->getEditLanguage($request);
    }


    public function ifFileArrayReplace($filePath, $tempFile)
    {


        /* we do not use this function but to use it we have to test if the included file is valid php code  */
        $tempArray=include('$tempFile');
        if(is_array($tempArray)){

            unlink($filePath);

            rename($tempFile, basename($filePath));
        }
    }


    public function arrayToString($array,$sub='')
    {
        if(!is_array($array)){return "<?php  return []; ?>";}

        $sArray =($sub=='')? "<?php return [\n":"[\n";

        foreach ($array as $key => $value) {

            $sArray.="'" . $key . "'=>" ;
            if(is_array($value)){
                $sArray.= $this->arrayToString($value,1);
            }else{
                $sArray .= "'".$value . "',\n";
            }
        }
        $sArray .= ($sub=='')? ']; ?>':"],\n";
        return $sArray;
    }

    public function createTempArrayFile()
    {

    }

    public function directWriteArrayToFile($filePath, $array)
    {
      //  dd($this->arrayToString($array));
        file_put_contents($filePath, $this->arrayToString($array));
    }

    public function getFilesList($folder)
    {


        $files = scandir($folder);
        $aFiles = [];
        $firstFiles = '';
        $i = 0;
        foreach ($files as $key => $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if ($i == 0) {
                $firstFiles = $file;
            }
            $aFiles[$file] = $file;
            $i++;
        }
        return [$aFiles, $firstFiles];
    }

}
