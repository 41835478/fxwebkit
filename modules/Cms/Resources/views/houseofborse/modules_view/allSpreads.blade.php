<div class="inner-page-title">
    <h2>{{trans('Spreads')}}</h2>
</div>
<div class="inner-page-content">
    <table class="table borderless oddeven">
        <thead>
        <tr>
            <th>{{trans('symbol')}}</th>
            <th>{{trans('spread')}}</th>
        </tr>
        </thead>
        <tbody>
        {{--*/$i=0; /*--}}
        @foreach( $spreads as  $spread_key=>$spread_val)
        {{--*/$i++; /*--}}
        <tr class="@if($i%2==0)  even @else  odd @endif">
            <td class="title">
                @if($spread_key == 'XAUUSD')
               Gold
                @elseif($spread_key == 'XAGUSD' )
                Silver
                @else {{$spread_key}}@endif
            </td>
            <td class="title">{{$spread_val}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<br />