
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
        function drawMostTradedInsChart(json_page) {
              $.ajax({
                  url: json_page,
                  dataType: "json",
                  success: function (data) {drowChart(data);
                      
                  }
              });
          }