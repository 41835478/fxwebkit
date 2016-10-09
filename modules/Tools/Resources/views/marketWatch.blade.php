@extends('admin.layouts.main')
@section('title', trans('tools::tools.marketWatch'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('tools::tools.marketWatch') }}</h1>
    </div>

    <section class="clock_all_section">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('tools::tools.time') }}</span>
            </div>
            <section class="clock_body_section">


                <div class="forex_hours_all_row">
                    <div class="left_label_div"></div>

                    <?php
                    //                        $city_array=[
                    //                            ['name'=>'Sydney FX','hour_start'=>22,'length'=>9],
                    //                            ['name'=>'Tokyo FX','hour_start'=>24,'length'=>9],
                    //                            ['name'=>'London FX ','hour_start'=>8,'length'=>9],
                    //                            ['name'=>'New Yourk Fx','hour_start'=>13,'length'=>9],
                    //                        ];
                    //
                    //                    echo '<div class="forex_hours_container" style="height:'. count($city_array)* 25 .'px">';
                    //
                    //                         for($i=0;$i<count($city_array);$i++){
                    //                        echo '<div class="on_city_period_div" style="left:'.(4.166 * $city_array[$i]['hour_start']).'%;top:'.(25 * $i).'px; width:'.(4.166 * $city_array[$i]['length']).'%;">'.$city_array[$i]['name'].'</div>';
                    //

                    ?>
                    <div class="forex_hours_container" style="display:none">
                        <?php for ($i = 1; $i < 25; $i++) { ?>
                        <div class="forex_hour_one_div"></div>
                        <?php } ?>
                    </div>
                </div>


                <div class="clock_hours_row">
                    <div class="left_label_div">

                        <?php
                        $city_array = [
                                ['Sydney FX', 22, 2, 9],
                                ['Tokyo FX', 24, 4, 9],
                                ['London FX ', 8, -1, 9, 4],
                                ['New York Fx', 2, 13, 9]
                        ];
                        ?>


                    </div>


                    <div class="hours_bar_container_all_div">


                        <div id="hours_bar_container_place">
                            <div class="over_hour_box_div"></div>
                        </div>

                    </div>
                </div>

            </section>

        </div>


    </section>

</div>
@stop
@section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">
    <script src="/assets/js/autoCompleteInput.js"></script>
    <script>
        var offset = new Date().getTimezoneOffset();
        var realOffset = -1 * offset / 60;

        var city_array ={!! str_replace('&quot;','"',json_encode(Config('tools.city_array')) ) !!};
        city_array[0][3] = realOffset;
        $(".forex_hours_container").height((city_array.length * 25 ) + 'px');

        for (var i = 0; i < city_array.length; i++) {

            var startHour = city_array[i][1] - offset / 60;
            $(".forex_hours_container").prepend('<div class="on_city_period_div" style="left:' + (4.166 * startHour) + '%;top:' + (25 * i) + 'px; width:' + (4.166 * city_array[i][2]) + '%;">' + city_array[i][0] + '</div>');

            if (startHour >= 23) {
                $(".forex_hours_container").prepend('<div class="on_city_period_div" style="left:' + (4.166 * ((startHour) - 24)) + '%;top:' + (25 * i) + 'px; width:' + (4.166 * (9 - (24 - startHour))) + '%;">' + city_array[i][0] + '</div>');
            }
            else if (startHour + 9 >= 23) {
                $(".forex_hours_container").prepend('<div class="on_city_period_div" style="left:0%;top:' + (25 * i) + 'px; width:' + (4.166 * (9 - (24 - startHour))) + '%;">' + city_array[i][0] + '</div>');
            }


        }


        function add_hours_bar(start_hour, timeZoneDif, openLength) {


            var html = '  <div class="hours_bar_container"><div class="hours_bar_all_div"> ';
            var k = 0;
            for (var j = 0 + timeZoneDif; j <= 23 + timeZoneDif; j++) {
                var i = j % 24;
                i = (i < 0) ? 24 + i : i;

                var class2 = ((i >= start_hour && i <= start_hour + openLength) || (i <= start_hour + openLength - 24)) ? ' before ' : ' white ';
                var first_hour_class = (i == 23) ? ' last ' : '';
                if (i == 0) {
                    html += '<div class="one_hour_div first ' + class2 + '" data-index="' + k + '"><span>12</span><p>am</p></div>';
                    k++;
                    continue;
                }
                html += '<div class="one_hour_div ';
                html += class2 + first_hour_class;
                html += '" data-index="' + k + '"><span>' + ((i % 12 == 0) ? '12' : (i % 12)) + '</span><p>' + ((i >= 12) ? 'pm' : 'am') + '</p></div>';
                k++;
            }
            html += ' </div>';
            return html;
        }
        for (var j = 0; j < city_array.length; j++) {

            var timeZoneDif = city_array[j][3] - realOffset;
            $("#hours_bar_container_place").append(add_hours_bar(city_array[j][1], timeZoneDif, city_array[j][2]));
        }

        function get_month_days(year, month) {
            year = parseInt(year);
            month = parseInt(month);

            var isLeapYear = (year % 4) || ((year % 100 === 0) && (year % 400)) ? 0 : 1;
            var daysInMonth = 31 - ((month === 2) ? (3 - isLeapYear) : ((month - 1) % 7 % 2));

            return daysInMonth;
        }


        var currentTime = new Date();


        var month = <?= (isset($_REQUEST['month'])) ? $_REQUEST['month'] : 'currentTime.getMonth() + 1'; ?>;
        var day = <?= (isset($_REQUEST['day'])) ? $_REQUEST['day'] : 'currentTime.getDate()'; ?>;

        var year = <?= (isset($_REQUEST['year'])) ? $_REQUEST['year'] : 'currentTime.getFullYear()'; ?>;

        var currentMonthDays = get_month_days(year, month);
        var pastMonth = (month == 1) ? 12 : month - 1;
        var pastYear = (month == 1) ? year - 1 : year;
        var pastMonthDays = get_month_days(pastYear, pastMonth);

        var nextMonth = (month == 12) ? 1 : month + 1;
        var nextYear = (month == 12) ? year + 1 : year;
        var start = day - 3;
        start = (start <= 0) ? pastMonthDays + start : start;


        var end = day + 3;
        end = (end >= currentMonthDays) ? end - currentMonthDays : end;

        var html = '<div class="day_tab_all_div">';
        if (start > day) {
            for (var i = start; i <= pastMonthDays; i++) {
                html += '<a href="?day=' + i + '&month=' + pastMonth + '&year=' + pastYear + '" class="one_day_tab_div a">' + i + '</a>';
            }

            for (var i = 1; i < day; i++) {
                html += '<a href="?day=' + i + '&month=' + pastMonth + '&year=' + pastYear + '" class="one_day_tab_div b ">' + i + '</a>';
            }
        } else {


            for (var i = start; i < day; i++) {
                html += '<a href="?day=' + i + '&month=' + month + '&year=' + year + '" class="one_day_tab_div c ">' + i + '</a>';
            }
        }

        if (end < day) {
            for (var i = day; i <= currentMonthDays; i++) {
                html += '<a href="?day=' + i + '&month=' + month + '&year=' + year + '" class="one_day_tab_div d ';
                html += (i == day) ? ' active ">' + i + '/' + month + '</a>' : '">' + i + '</a>';
            }

            for (var i = 1; i <= end; i++) {
                html += '<a href="?day=' + i + '&month=' + nextMonth + '&year=' + nextYear + '" class="one_day_tab_div e ';

                html += (i == day) ? ' active ">' + i + '/' + nextMonth + '</a>' : '">' + i + '</a>';
            }
        } else {


            for (var i = day; i <= end; i++) {
                html += '<a href="?day=' + i + '&month=' + month + '&year=' + year + '" class="one_day_tab_div f ';
                html += (i == day) ? ' active ">' + i + '/' + month + '</a>' : '">' + i + '</a>';

            }

        }
        html += '</div>';
        $('.clock_header').html(html);


        var hourObject = new Date();
        var hour = hourObject.getHours();

        var minutes = hourObject.getMinutes();
        $(document).ready(function () {
            /*$('.over_hour_box_div').animate({'left': (hour * 4.166) + '%'}, 100, function () {
             });*/

//        var monthNames = ["January", "February", "March", "April", "May", "June",
//            "July", "August", "September", "October", "November", "December"
//        ];
//
//        var month = hourObject.getMonth();
//        var day = hourObject.getDate();
//
//        var year = hourObject.getFullYear();
//        //city_date">Fri, Nov 17 2017
//
//        $('.city_date').html(day + ', ' + monthNames[month] + ' ' + month + ' ' + year);


        });

        /*
         $('.one_hour_div').mousemove(function () {
         $('.over_hour_box_div').stop();
         var index = $(this).data('index');
         $('.over_hour_box_div').animate({'left': (index * 4.166) + '%'}, 100, function () {
         });
         });
         $('.hours_bar_all_div').mouseout(function () {

         $('.over_hour_box_div').stop();
         $('.over_hour_box_div').animate({'left': (hour * 4.166) + '%'}, 1000, function () {
         });
         });
         */

        function city_label_and_hour_html(city_array) {
            var html = '';
            for (var i = 0; i < city_array.length; i++) {
                html += '<div class="city_info_all_div" id="city_info_all_div_' + i + '" ><div class="city_name_all_div"><div class="home_icon" style="display:none">H</div>' +
                        '<div class="city_name">' + city_array[i][0] + '</div>' +
                        '<div class="eet_div" style="display:none">EET</div>' +
                        '<div class="country_name" style="display:none">Jordan</div>' +
                        '</div>' +
                        '<div class="city_hour_all_div">' +
                        '<div class="city_hour">00:00<span>a</span></div>' +
                        '<div class="city_date">Fri, Nov 17 2017</div>' +
                        '</div>' +
                        '</div>';

                html += '</div>';
                $('.clock_header').html(html);


                var hourObject = new Date();
                var hour = hourObject.getHours();

                var minutes = hourObject.getMinutes();


                $(document).ready(function () {
                    /*$('.over_hour_box_div').animate({'left': (hour * 4.166) + '%'}, 100, function () {
                     });*/


//            var month = hourObject.getMonth();
//            var day = hourObject.getDate();
//
//            var year = hourObject.getFullYear();
//            //city_date">Fri, Nov 17 2017
//
//
//            $('.city_date').html(getFormatDate(year,month,day));


                });

                /*
                 $('.one_hour_div').mousemove(function () {
                 $('.over_hour_box_div').stop();
                 var index = $(this).data('index');
                 $('.over_hour_box_div').animate({'left': (index * 4.166) + '%'}, 100, function () {
                 });
                 });
                 $('.hours_bar_all_div').mouseout(function () {

                 $('.over_hour_box_div').stop();
                 $('.over_hour_box_div').animate({'left': (hour * 4.166) + '%'}, 1000, function () {
                 });
                 });
                 */


            }
            return html;
        }
        $(".clock_hours_row .left_label_div").append(city_label_and_hour_html(city_array));


        function getFormatDate(y, m, d) {

            var monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            return d + ', ' + monthNames[m] + ' ' + y;
        }
        function getOtherCityDateFromHour(myHour, myGmt, otherGmt) {


            var hourObject = new Date();
            var month = hourObject.getMonth();
            var day = hourObject.getDate();

            var year = hourObject.getFullYear();


            var otherHour = (myHour + (otherGmt - myGmt )) % 24;

            console.log('otherHour >myHour && myGmt >otherGmt__' + otherHour + '>' + myHour + '&&' + myGmt + '>' + otherGmt);
            if (otherHour > myHour && myGmt > otherGmt) {
                return getPastDayDate(year, month, day);
            }
            if (otherHour < myHour && myGmt < otherGmt) {
                return getNextDayDate(year, month, day);
            }

            return getFormatDate(year, month, day);
        }
        function getPastDayDate(year, month, day) {

            var today = new Date();
            var yesterDay = new Date(today.getTime() - (24 * 60 * 60 * 1000));

            return getFormatDate(yesterDay.getFullYear(), yesterDay.getMonth(), yesterDay.getDate());
        }
        function getNextDayDate(year, month, day) {
            var today = new Date();
            var tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));

            return getFormatDate(tomorrow.getFullYear(), tomorrow.getMonth(), tomorrow.getDate());
        }
        function setTime(city_array) {
            for (var i = 0; i < city_array.length; i++) {

                var hourObject = new Date();
                var new_hour = hourObject.getHours() + (city_array[i][3] - 3);

                hour = new_hour;
                minutes = hourObject.getMinutes();

//city_hour">12:00<span>a</span>
                if (i == 0) {
                    $('.over_hour_box_div').animate({'left': (hour * 4.166) + '%'}, 1000, function () {
                    });
                }
                var am_bm = (new_hour > 12) ? 'pm' : 'am';
                new_hour = (new_hour % 12 == 0) ? 12 : new_hour % 12;
                new_hour = (new_hour < 10) ? '0' + new_hour : new_hour;
                minutes = (minutes < 10) ? '0' + minutes : minutes;
                $('#city_info_all_div_' + i + ' .city_hour').html(new_hour + ':' + minutes + '<span>' + am_bm + '</span>');

                $('#city_info_all_div_' + i + ' .city_date').html(getOtherCityDateFromHour(hourObject.getHours(), realOffset, city_array[i][3]));
            }
        }
        setTime(city_array);
        setInterval('setTime(city_array)', 60000);
    </script>
@stop
