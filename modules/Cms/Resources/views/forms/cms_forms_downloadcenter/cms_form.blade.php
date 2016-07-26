<h2>{{trans('cms::house.downloadCenter')}}</h2>
<p>{{trans('cms::house.clickDownloadIcon')}}</p>

<ul id="download-list">


    @foreach($cms_forms_downloadcenter as $item)
    <li class="odd">
        <a href="/{{Config::get('cms.asset_folder').'/'.$item->file }}" title="">
            <i class="pdf fa fa-file-pdf-o"></i>
            {{  ((isset($item->cms_forms_downloadcenter_translate->translate) && $item->cms_forms_downloadcenter_translate->translate!='')? $item->cms_forms_downloadcenter_translate->translate:$item->name)}}
                <span><i class="fa fa-download"></i>
                <em>{{trans('cms::house.download')}}</em></span>
        </a>
    </li>
    @endforeach


</ul>
@if(\Session::get('locale')=='ar')
    <style type="text/css">

        h2,p{direction:rtl;}
    </style>
@endif