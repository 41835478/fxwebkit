<section id="pie-charts">
    <div class="container">
        <section id="bar-chart">
            <table class="table borderless">
                <thead>
                    <tr>
                        <th width="15%">Symbol</th>
                        <th width="100">&nbsp;</th>
                        <th width="37%">BUY</th>
                        <th width="37%">SELL</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    {{--*/ $i = 0 /*--}}
                   @foreach ($aResults as $key=>$value )
    {{--*/ $i = i+1 /*--}}
    @if($i <12)
    <tr>
        <th>{{$key}}</th>
        <td>{{round(($aResults[$key][0]/$buy_sum*100),2)}}%</td>
        <td><div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuetransitiongoal="{{($aResults[$key][0]/$buy_sum*100)}}" style="background-color:#B4A87F;"></div>
        </div></td>
        <td><div class="progress"><div class="progress-bar progress-bar-danger" role="progressbar" aria-valuetransitiongoal="{{($aResults[$key][1]/$sell_sum*100)}}" style="background-color:#3B3D3C;"></div></div></td>
        <td>{{round(($aResults[$key][1]/$sell_sum*100),2)}}%</td>
    </tr>
    @endif
@endforeach
</tbody>
</table>
</section><!--#bar-chart-->
<section id="pie-chart">
<div id="pie" style="height:300px;margin: 0 auto"></div>

</section><!--#pie-chart-->
</div>
</section><!--#pie-charts-->

<script src="//cdnjs.cloudflare.com/ajax/libs/highcharts/4.0.4/highcharts.js"></script>
<script>

    function drowChart(data){
        $('#pie').highcharts({
            colors: ["#B5A97D", "#434348", "#B5A87C", "#F8A354", "#7F82EC", "#F9D6A3", "#E5D548",
                "#7F82EB", "#8F4653", "#8BE7E1", "#aaeeee"],
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: false
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: data
            }]
        });
    }
    //piechart


    $(document).ready(function(){
        drowChart({!! $chartData !!});
    });
</script>