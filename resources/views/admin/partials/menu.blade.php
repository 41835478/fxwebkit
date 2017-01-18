<!-- .Side panel -->
  <div class=" side-mini-panel"   >
    <ul class="mini-nav">
         <div class="togglediv"><a href="javascript:void(0)" id="togglebtn" ><i class="ti-menu"></i></a></div>


<li class=""> <a href="javascript:void(0)"><i class="fa fa-dashboard" data-icon="v"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
        <h3 class="menu-title">{{ trans('dashboard.PageTitle') }}</h3>
                <div class="searchable-menu">
            <form role="search" class="menu-search">
                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
        </div>
        <ul class="sidebar-menu">
          <li><a href="/admin#" target="">{{ trans('dashboard.PageTitle') }}</a></li>
<hr>
        <h3 class="menu-title">{{trans('dashboard.aboutFxwebkit')}}</h3>
          <li>

{{trans('dashboard.aboutFxwebkitText')}}
</li>
        </ul>


        </div>
</li>

  {{--*/ $aAdminMenu = get_admin_menu() /*--}}
            @if(count($aAdminMenu))
            @foreach($aAdminMenu as $aModule)

            {{--{{$aModule['route']}}--}}
            {{--{{$aModule['icon']}}--}}
            {{----}}




<li class=""> <a href="javascript:void(0)"><i class="fa {{$aModule['icon']}}" data-icon="v"></i></a>
    <div class="sidebarmenu">
        <!-- Left navbar-header -->
        <h3 class="menu-title">{{$aModule['title']}}</h3>
        <div class="searchable-menu">
            <form role="search" class="menu-search">
                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
        </div>
        <ul class="sidebar-menu">

                        @if (count($aModule['menu']))
                 @foreach($aModule['menu'] as $aSubMenu)

                 {{--{{ $aSubMenu['icon'] }}--}}

 <li><a href=" {{ $aSubMenu['route'] }}">{{ $aSubMenu['title'] }}</a></li>
                    @endforeach

                @endif



            <hr>
            <h3 class="menu-title">Other Demos</h3>
            <li><a href="../eliteadmin-inverse/index.html" target="_blank">Eliteadmin Inverse</a></li>
        </ul>
        <!-- Left navbar-header end -->
    </div>
</li>



            @endforeach
            @endif
    </ul>
  </div>
  <!-- /.Side panel -->

@section('script')
@parent
<script>

function activeCurrentMenu(){

var pageUrl=window.location.pathname;

var pageUrlArray=pageUrl.split('/');

var firstUrlPart='/'+pageUrlArray[1];
var secondUrlPart='/'+pageUrlArray[1]+'/'+pageUrlArray[2];console.log(pageUrl,pageUrlArray,firstUrlPart,secondUrlPart);
    var currentA=$('.sidebar-menu a.active');

if(currentA.length == 0){
currentA=$('.sidebar-menu a[href*="'+pageUrl+'"]').first();
if(currentA.length == 0){
currentA=$('.sidebar-menu a[href*="'+secondUrlPart+'"]').first();
if(currentA.length == 0){
currentA=$('.sidebar-menu a[href*="'+firstUrlPart+'"]').first();

}
}
}
currentA.addClass('active');
    currentA.parent().parent().parent().parent().parent().addClass('selected');

}
    $(document).ready(function(){

       activeCurrentMenu();
        setTimeout('activeCurrentMenu()',1000);

    });

$('.mini-nav>li').mouseover(function(){
$(this).click();
});


/*____________________________________column_status_save*/
//var pageUrl=window.location.pathname;
//$('.tablesaw-modeswitch  select').change(function(){});
//
//$('.tablesaw-columntoggle-btnwrap .btn-group label input[type=checkbox]');



var pageUrl=window.location.pathname;
var columnsInfo={
'/admin/reports/closed-orders':{
0:{'Login':0,'Order#':1,'Lots':0,'Open Price':0}
}
};

@if(\Session::get('columns_info')!=null)
localStorage.setItem("columns_info",'{!! \Session::get('columns_info') !!}');
{{-- unset($_GET["columns_info"]) /*--}}
@endif



columnsInfo=JSON.parse(localStorage.getItem("columns_info"));

console.log(JSON.stringify(columnsInfo));
function hideColumn(columnLabel){
columnLabel.prop('checked',true);
columnLabel.click();
}

function showColumn(columnLabel){
columnLabel.prop('checked',false);
columnLabel.click();
}

function setTableColumnsStatus(aColumnsNames,tableOrder){
$('.tablesaw-columntoggle-btnwrap').eq(tableOrder).find('.btn-group label  input[type="checkbox"]').each(function(){
if(aColumnsNames[$(this).parent().text()] === 0  ){
hideColumn($(this));
}else{
showColumn($(this));

}
});
assignChangeEventTocolumnLabel(tableOrder);
}

function assignChangeEventTocolumnLabel(tableOrder){
    $('.tablesaw-columntoggle-btnwrap').eq(tableOrder).find('.btn-group label  input[type="checkbox"]').attr('onClick','changeColumnsStatus($(this),"'+tableOrder+'");');
}

function changeColumnsStatus(checkbox,tableOrder){

var columnNameLabel=checkbox.parent().text();

var value=(checkbox.prop('checked'))? 1:0;

columnsInfo[pageUrl][tableOrder][columnNameLabel]=value;

//console.log(JSON.stringify(columnsInfo));

updateColumnsInfo();
}

function addPageTablesToColumnsInfo(){

if(typeof columnsInfo[pageUrl] !== 'undefined'){return false;}

columnsInfo[pageUrl]={};

var i=0;
$('.dialog-table-coltoggle').each(function(){
var columnsNames={};

$(this).find('.btn-group label').each(function(){
columnsNames[$(this).text()]=1;

});



columnsInfo[pageUrl][i]=columnsNames;
    i++;
});

}

function startSetTables(){

changeSelectToToggle();
addPageTablesToColumnsInfo();

for (var tableOrder in columnsInfo[pageUrl]) {

setTableColumnsStatus(columnsInfo[pageUrl][tableOrder],tableOrder);
}




}
setTimeout('startSetTables()',100);



function changeSelectToToggle(){
if($('.tablesaw-modeswitch select').length){

$('.tablesaw-modeswitch select').val('columntoggle').change();
}
}


function updateColumnsInfo(){
var columnsInfoString= JSON.stringify(columnsInfo);

$.ajax({
type:"get",
url: "/updateColumnsInfo",
data:{
'_token':"{!! csrf_token() !!}",
'columnsInfo':columnsInfoString
},
 success: function(result){

localStorage.setItem("columns_info",columnsInfoString);
    }
    });

}
/*_____________________________________end__column_status_save*/
</script>
@stop




















{{--"data:image/jpeg;base64,{{ current_user()->getAvatar() }}--}}
{{--{{ route('admin.users.profile') }}--}}
{{--{{ route('admin.auth.logout') }}--}}
{{--{{ route('admin.index') }}--}}
{{--{{ trans('dashboard.PageTitle') }}--}}

            {{--*/ $aAdminMenu = get_admin_menu() /*--}}
            {{--@if(count($aAdminMenu))--}}
            {{--@foreach($aAdminMenu as $aModule)--}}

            {{--{{$aModule['route']}}--}}
            {{--{{$aModule['icon']}}--}}
            {{--{{$aModule['title']}}--}}

                {{--@if (count($aModule['menu']))--}}
                 {{--@foreach($aModule['menu'] as $aSubMenu)--}}
                 {{--{{ $aSubMenu['route'] }}--}}
                 {{--{{ $aSubMenu['icon'] }}--}}
{{--{{ $aSubMenu['title'] }}--}}

                    {{--@endforeach--}}

                {{--@endif--}}


            {{--@endforeach--}}
            {{--@endif--}}

