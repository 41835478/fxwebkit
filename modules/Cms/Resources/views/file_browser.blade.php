@foreach($files as $file)
    <img onclick="window.opener.CKEDITOR.tools.callFunction( {{ $funnum }}, '{{ asset($asset_folder.'files/'.basename($file)) }}' );window.close();"
         width="200" height="200" src="{{ asset($asset_folder.'files/'.basename($file)) }}">
@endforeach