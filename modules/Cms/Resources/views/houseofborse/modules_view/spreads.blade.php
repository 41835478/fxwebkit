<div id="spreads-bar-container">
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
</div>

<script>

    function numberOfZeroAtFirst(x) {


        return -Math.floor(Math.log(x) / Math.log(10) + 1);

    }

    function getPointerOfDifferent(firstNumber, secondNumber) {
        var firstNumberArray = (firstNumber + '').split('');
        var secondNumberArray = (secondNumber + '').split('');

        var minDigitsNumber = (firstNumberArray.length < secondNumberArray.length) ? firstNumberArray.length : secondNumberArray.length;

        for (var i = 0; i < minDigitsNumber; i++) {
            if (firstNumberArray[i] != secondNumberArray[i]) {
                return i;
            }
        }

        return Math.abs(firstNumber.length - secondNumber.length);

    }

    function splitDependOnDigitsDifferent(oldNumber, newNumber) {


        var newPreNumber = (newNumber + '').substr(0, getPointerOfDifferent(oldNumber, newNumber));
        var newNumberEnd = (newNumber + '').substr(getPointerOfDifferent(oldNumber, newNumber), newNumber.length);

        return '<span class="preNumber">' + newPreNumber + '</span><span class="endNumber">' + newNumberEnd + '</span>';
    }
    console.log(splitDependOnDigitsDifferent(17, 1.07357));
    var data = {"Symbols": [
        {"ask": "1.07357", "bid": "1.07307", "symbol": "EURUSD", "dir": 0, "digits": 5},
        {"ask": "1.07357", "bid": "1.07307", "symbol": "gg", "dir": 0, "digits": 5},
        {"ask": "1.07357", "bid": "1.07307", "symbol": "dg", "dir": 0, "digits": 5},
        {"ask": "1.07357", "bid": "1.07307", "symbol": "sdfg", "dir": 0, "digits": 5},
        {"ask": "1.07357", "bid": "1.07307", "symbol": "dgggggg", "dir": 0, "digits": 5},
        {"ask": "1.07357", "bid": "7", "symbol": "EURUSD", "dir": 0, "digits": 5}
    ]};

    //render_data(data);

    function add_quets_row(symbol, ask, bid, digits, dir) {

        ask = parseFloat(ask);
        bid = parseFloat(bid);

        var bin = ((ask - bid) * Math.pow(10, digits-1)).toFixed(1);
        var row = $('#spread-bar #' + symbol)




        if (row.length) {
            var oldAsk = parseFloat(row.find('.ask').text());
            var oldBid = parseFloat(row.find('.bid').text());

            row.find('.ask').html(splitDependOnDigitsDifferent( bid, ask.toFixed(digits)));
            row.find('.bid').html(splitDependOnDigitsDifferent(ask, bid.toFixed(digits)));
            row.find('.bin').html(bin);
            if (dir == 0) {
                row.find('.arrow').addClass(' fa-arrow-up');
                row.find('.arrow').removeClass(' fa-arrow-down');
                row.find('.endNumber').addClass('green');
                row.find('.endNumber').removeClass('red');

            }
            else if (dir == 1) {
                row.find('.arrow').removeClass(' fa-arrow-up');
                row.find('.arrow').addClass(' fa-arrow-down');

                row.find('.endNumber').addClass('red');
                row.find('.endNumber').removeClass('green');
            }
        } else {
            var html = '<li id="' + symbol + '">' +
                    ' <strong><i class="arrow fa ';
            html += (dir == 0) ? ' fa-arrow-up' : (dir == 1) ? ' fa-arrow-down' : '';
            html += '"></i>' + symbol + '</strong>' +
                    '<span class="bin">' + bin + '</span>' +
                    ' <div class="ask_bid_div"><span class="ask">' + (ask.toFixed(digits)) + '</span><br>' +
                    '<span class="bid">' + (bid.toFixed(digits)) + '</span></div>' +
                    '</li>';
            $('#spread-bar ul').append(html);
        }
    }

    function render_data(receved_data) {
//console.log(receved_data);return false;
        try {
            receved_data = JSON.parse(receved_data);
            if (receved_data && typeof receved_data === "object" && receved_data !== null) {
            } else {
                return false;
            }
        } catch (e) {
        }

        if (typeof receved_data.Symbols !== 'undefined') {
            for (var i = 0; i < receved_data.Symbols.length; i++) {
                // console.log(receved_data.Symbols[i]);
                add_quets_row(receved_data.Symbols[i].symbol, receved_data.Symbols[i].ask, receved_data.Symbols[i].bid, receved_data.Symbols[i].digits, receved_data.Symbols[i].dir);
            }
        }
    }
    var debugTextArea = document.getElementById("debugTextArea");
    function debug(message) {

        /* debugTextArea.value += message + "\n";
         debugTextArea.scrollTop = debugTextArea.scrollHeight;
         */

    }

    function sendMessage() {
        var msg = document.getElementById("inputText").value;
        if (websocket != null)
        {
            document.getElementById("inputText").value = "";
            websocket.send(msg);
            console.log("string sent :", '"' + msg + '"');
        }
    }

    var wsUri = "wss://houseofborse.com:1234";
    var websocket = null;

    function sendMessageSpreads() {
        var spreads = ['EURUSD,USDJPY,GBPUSD,USDCHF,AUDUSD,USDCAD,NZDUSD'];

        if (websocket != null)
        {
            for (var i = 0; i < spreads.length; i++) {
                console.log("send");
                websocket.send(spreads[i]);
            }

        }
    }





    function initWebSocket() {

        try {
            if (typeof MozWebSocket == 'function')
                WebSocket = MozWebSocket;
            if (websocket && websocket.readyState == 1)
                websocket.close();
            websocket = new WebSocket(wsUri);
            websocket.onopen = function (evt) {
                debug("CONNECTED");
                sendMessageSpreads();
            };
            websocket.onclose = function (evt) {
                debug("DISCONNECTED");
                // console.log('dis connect');
                setTimeout("initWebSocket()", 5000);
            };
            websocket.onmessage = function (evt) {
                /*console.log("Message received :", evt.data);
                 console.log(evt.data);
                 debug(evt.data);*/
                //console.log(evt.data);
                render_data(evt.data);

            };
            websocket.onerror = function (evt) {

                debug('ERROR: ' + evt.data);
            };
        } catch (exception) {
            debug('ERROR: ' + exception);
            startWebSocket=false;
        }
    }
    setTimeout("initWebSocket()", 5000);
    function stopWebSocket() {
        if (websocket)
            websocket.close();
    }

    function checkSocket() {
        if (websocket != null) {
            var stateStr;
            switch (websocket.readyState) {
                case 0:
                {
                    stateStr = "CONNECTING";
                    break;
                }
                case 1:
                {
                    stateStr = "OPEN";
                    break;
                }
                case 2:
                {
                    stateStr = "CLOSING";
                    break;
                }
                case 3:
                {
                    stateStr = "CLOSED";
                    break;
                }
                default:
                {
                    stateStr = "UNKNOW";
                    break;
                }
            }
            debug("WebSocket state = " + websocket.readyState + " ( " + stateStr + " )");
        } else {
            debug("WebSocket is null");
        }
    }

    $(document).ready(function(){
        drawMostTradedInsChart('{{path('most_traded_instruments_chart_data')}}');
    });
    /*
     function get_spread_bar(){
     $.ajax({
     url: '{{path('spreads_bar')}}',
     dataType: "html",
     success: function (data) {
     $('#spreads-bar-container').html(data);
     },
     complete:function(){
     setTimeout('get_spread_bar()',5000);
     }
     });
     }
     setTimeout('get_spread_bar()',5000);
     */
</script>