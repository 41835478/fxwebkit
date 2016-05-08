<section id="spread-bar" class="hidden-xs">
	<div class="container">
            <h2><span>Live Spread</span></h2>
            <ul >
                @foreach ($spreads as $spread_key=>$spread_val )
                    <li id="@if ($spread_key == 'XAUUSD') GOLD @elseif(spread_key == 'XAGUSD' )  SILVER @else  {{$spread_key}} @endif ">
                        <strong>
                            <i class="arrow fa "></i>
                            @if ($spread_key == 'XAUUSD')
                               Gold
                            @elseif($spread_key == 'XAGUSD')
                               Silver
                            @else {{$spread_key}} @endif
                        </strong>
                            <span class="bin">{{$spread_val[0]}}</span>
                            <div class="ask_bid_div">
                            <span class="ask"><span class="ask"><span class="preNumber">{{$spread_val[1]}}</span><span class="endNumber green"></span></span></span>
                             <span class="bid"><span class="preNumber">{{$spread_val[2]}}</span><span class="endNumber green"></span></span></div>
                    </li>
                @endforeach
                <li class="last"><a href="path('spreads_page')" >View all spreads</a></li>
            </ul>
	</div>
</section><!--#spread-bar-->
