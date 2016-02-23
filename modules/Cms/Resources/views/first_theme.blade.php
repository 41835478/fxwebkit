<div class="theme_posion_div" id="position_4">

    <div class="theme_posion_div" id="position_1">
        @if(isset($positions["position_1"]))
            @foreach($positions["position_1"] as $position)
                {!! $position !!}
            @endforeach
        @endif
    </div>

    <div class="theme_posion_div" id="position_2">
        @if(isset($positions["position_2"]) )
            @foreach($positions['position_2'] as $position)
                {!! $position !!}
            @endforeach
        @endif
    </div>

    <div class="theme_posion_div" id="position_3">
        @if(isset($positions["position_3"]))
            @foreach($positions['position_3'] as $position)
                {!! $position !!}
            @endforeach
        @endif
    </div>


    @if(isset($positions["position_4"]))
        @foreach($positions['position_4'] as $position)
            {!! $position !!}
        @endforeach
    @endif
    <div class="clearfix"></div>
</div>


<div class="theme_posion_div" id="position_5">
    @if(isset($positions["position_5"]))
        @foreach($positions['position_5'] as $position)
            {!! $position !!}
        @endforeach
    @endif
</div>


<div class="theme_posion_div" id="position_6">
    @if(isset($positions["position_6"]))
        @foreach($positions['position_6'] as $position)
            {!! $position !!}
        @endforeach
    @endif
</div>


<div class="theme_posion_div" id="position_7">
    @if(isset($positions["position_7"]))
        @foreach($positions['position_7'] as $position)
            {!! $position !!}
        @endforeach
    @endif
</div>

<style type="text/css">
    .clearfix {
        clear: both;
    }

    #position_1, #position_2, #position_3 {
        float: left;
    }
</style>