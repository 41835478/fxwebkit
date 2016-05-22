<h2>Download Center</h2>
<p>Please Click on Download icon to save the file.</p>

<ul id="download-list">


    @foreach($cms_forms_downloadcenter as $item)
    <li class="odd">
        <a href="/{{Config::get('cms.asset_folder').'/'.$item->file }}" title="">
            <i class="pdf fa fa-file-pdf-o"></i>
            {{ $item->name}}
                <span><i class="fa fa-download"></i>
                <em>Download</em></span>
        </a>
    </li>
    @endforeach


</ul>