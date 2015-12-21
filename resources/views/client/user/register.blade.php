@extends('client.layouts.login', array('class' => 'page-signup'))
@section('title', Lang::get('user.PageTitleSignUp'))
@section('content')
<div class="signup-container">
    <div class="signup-header">
        <a href="" class="logo">
            {!! HTML::image('assets/img/logo.png', '', ['style' => 'margin-top: -5px']) !!}&nbsp;
            {{ app_name() }}
        </a>
        <div class="slogan">
            {{ Lang::get('user.Slogan') }}
        </div>
    </div>
    <div class="signup-form">
        @include('client.partials.messages')
        {!! Form::open(['id'=>'signup-form_id']) !!}
        <div class="signup-text">
            <span>{{ Lang::get('user.SignUpText') }}</span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('first_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.FirstName')]) !!}
            <span class="fa fa-info signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('last_name', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.LastName')]) !!}
            <span class="fa fa-user signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('email', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Email')]) !!}
            <span class="fa fa-envelope signup-form-icon"></span>
        </div>


        <div class="form-group w-icon">
            {!! Form::password('password',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Password')]) !!}
            <span class="fa fa-lock signup-form-icon"></span>
        </div>


        <div class="form-group w-icon">
            {!! Form::text('nickname',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Nickname')]) !!}
            <span class="fa fa-info signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('address', '', ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.address')]) !!}
            <span class="fa fa-location-arrow signup-form-icon"></span>
        </div>

        <div class="form-group w-icon">
            {!! Form::text('birthday', $default_birthday, ['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Birthday')]) !!}
                 <span class="fa fa-calendar signup-form-icon"></span>  
        </div>

        <div class="form-group w-icon">
            {!! Form::text('phone',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.Phone')]) !!}
            <span class="fa fa-phone signup-form-icon"></span>
        </div>

        <div class="form-group">
            <label for="jq-validation-select2" class="col-sm-3 control-label"></label>
            <div class="form-group w-icon">
                {!! Form::select('country',$country_array,'',['id'=>'jq-validation-select2','class'=>'form-control input-lg','placeholder'=>Lang::get('user.Country')]) !!}
            </div>

        </div>

        <div class="form-group w-icon">
            {!! Form::text('city',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.City')]) !!}
            <span class="fa fa-compass signup-form-icon"></span>
        </div>
        
        <div class="form-group w-icon">
            {!! Form::text('zip_code',  '',['class'=>'form-control input-lg','placeholder'=>Lang::get('user.ZipCode')]) !!}
            <span class="fa fa-compass signup-form-icon"></span>
        </div>

        <div class="form-group">
                <div class=" col-xs-3">
                    <label class='radio gender_radio_0'>
                        {!! Form::radio('gender', 0,true,['id'=>'gender_radio_0','class'=>'px']) !!}
                        <span class="lbl">Male</span>
                    </label>
                </div>
                <div class=" col-xs-3">
                    <label class='radio gender_radio_1'>
                        {!! Form::radio('gender', 1,false,['id'=>'gender_radio_1','class'=>'px']) !!}
                        <span class="lbl">Female</span>
                    </label>
                </div>
            </div>
        

        <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
            <label class="checkbox-inline">
                {!! Form::checkbox('agreement', 1, false, ['class'=>'px']) !!}
                <span class="lbl">{{ Lang::get('user.IAgreeWithThe') }} <a href="#" data-toggle="modal" data-target="#terms-and-conditions-modal">{{ Lang::get('user.TermsAndConditions') }}</a></span>
            </label>
        </div>

        <div class="form-actions">
            {!! Form::submit(Lang::get('user.SignUp'), ['class'=>'signup-btn bg-primary']) !!}
        </div>
        </form>
        <div class="signup-with">
            <a href="{{ route('client.auth.register') }}" class="signup-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">
                {{ Lang::get('user.SignUpWith') }} <span>{{ Lang::get('user.Facebook') }}</span>
            </a>
        </div>

    </div>
    <div class="have-account">
        {{ Lang::get('user.AlreadyHaveAnAccount') }}? <a href="{{ route('client.auth.login') }}">Sign In</a>
    </div>

    <div id="terms-and-conditions-modal" class="modal fade modal-blur" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">{{ Lang::get('user.TermsAndConditions') }}</h4>
                </div>
                <div class="modal-body">
                    @include('client.partials.termsAndConditions')
                </div>
            </div>
        </div>
    </div>
    @section('script')
    @parent
    <script>
        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }
            $('input[name="birthday"]').datepicker(options);

            $('#bs-datepicker-component').datepicker();

            var options2 = {
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }
            $('#bs-datepicker-range').datepicker(options2);

            $('#bs-datepicker-inline').datepicker();
        });
//
//        var country_arr = [
//            ["af ", " Afghanistan (افغانستان) ", " 93"],
//            ["ax ", " Åland Islands (Åland) ", " 0"],
//            ["al ", " Albania (Shqipëri) ", " 355"],
//            ["dz ", " Algeria ", " 213"],
//            ["as ", " American Samoa ", " 1684"],
//            ["ad ", " Andorra ", " 376"],
//            ["ao ", " Angola ", " 244"],
//            ["ai ", " Anguilla ", " 1264"],
//            ["aq ", " Antarctica ", " 0"],
//            ["ag ", " Antigua & Barbuda ", " 1268"],
//            ["ar ", " Argentina ", " 54"],
//            ["am ", " Armenia (Հայաստան) ", " 374"],
//            ["aw ", " Aruba ", " 297"],
//            ["ac ", " Ascension Island ", " 247"],
//            ["au ", " Australia ", " 61"],
//            ["at ", " Austria (Österreich) ", " 43"],
//            ["az ", " Azerbaijan (Azərbaycan) ", " 994"],
//            ["bs ", " Bahamas ", " 1242"],
//            ["bh ", " Bahrain (البحرين) ", " 973"],
//            ["bd ", " Bangladesh (বাংলাদেশ) ", " 880"],
//            ["bb ", " Barbados ", " 1246"],
//            ["by ", " Belarus (Беларусь) ", " 375"],
//            ["be ", " Belgium ", " 32"],
//            ["bz ", " Belize ", " 501"],
//            ["bj ", " Benin (Bénin) ", " 229"],
//            ["bm ", " Bermuda ", " 1441"],
//            ["bt ", " Bhutan (འབྲུག) ", " 975"],
//            ["bo ", " Bolivia ", " 591"],
//            ["ba ", " Bosnia & Herzegovina (Босна и Херцеговина) ", " 387"],
//            ["bw ", " Botswana ", " 267"],
//            ["bv ", " Bouvet Island ", " 0"],
//            ["br ", " Brazil (Brasil) ", " 55"],
//            ["io ", " British Indian Ocean Territory ", " 246"],
//            ["vg ", " British Virgin Islands ", " 1284"],
//            ["bn ", " Brunei ", " 673"],
//            ["bg ", " Bulgaria (България) ", " 359"],
//            ["bf ", " Burkina Faso ", " 226"],
//            ["bi ", " Burundi (Uburundi) ", " 257"],
//            ["kh ", " Cambodia (កម្ពុជា) ", " 855"],
//            ["cm ", " Cameroon (Cameroun) ", " 237"],
//            ["ca ", " Canada ", " 1"],
//            ["ic ", " Canary Islands (islas Canarias) ", " 0"],
//            ["cv ", " Cape Verde (Kabu Verdi) ", " 238"],
//            ["bq ", " Caribbean Netherlands ", " 599"],
//            ["ky ", " Cayman Islands ", " 1345"],
//            ["cf ", " Central African Republic (République centrafricaine) ", " 236"],
//            ["ea ", " Ceuta & Melilla (Ceuta y Melilla) ", " 0"],
//            ["td ", " Chad (Tchad) ", " 235"],
//            ["cl ", " Chile ", " 56"],
//            ["cn ", " China (中国) ", " 86"],
//            ["cx ", " Christmas Island ", " 0"],
//            ["cp ", " Clipperton Island ", " 0"],
//            ["cc ", " Cocos (Keeling) Islands (Kepulauan Cocos (Keeling)) ", " 0"],
//            ["co ", " Colombia ", " 57"],
//            ["km ", " Comoros (جزر القمر) ", " 269"],
//            ["cd ", " Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo) ", " 243"],
//            ["cg ", " Congo (Republic) (Congo-Brazzaville) ", " 242"],
//            ["ck ", " Cook Islands ", " 682"],
//            ["cr ", " Costa Rica ", " 506"],
//            ["ci ", " Côte d’Ivoire ", " 225"],
//            ["hr ", " Croatia (Hrvatska) ", " 385"],
//            ["cu ", " Cuba ", " 53"],
//            ["cw ", " Curaçao ", " 599"],
//            ["cy ", " Cyprus (Κύπρος) ", " 357"],
//            ["cz ", " Czech Republic (Česká republika) ", " 420"],
//            ["dk ", " Denmark (Danmark) ", " 45"],
//            ["dg ", " Diego Garcia ", " 0"],
//            ["dj ", " Djibouti ", " 253"],
//            ["dm ", " Dominica ", " 1767"],
//            ["do ", " Dominican Republic (República Dominicana) ", " 1809"],
//            ["ec ", " Ecuador ", " 593"],
//            ["eg ", " Egypt (مصر) ", " 20"],
//            ["sv ", " El Salvador ", " 503"],
//            ["gq ", " Equatorial Guinea (Guinea Ecuatorial) ", " 240"],
//            ["er ", " Eritrea ", " 291"],
//            ["ee ", " Estonia (Eesti) ", " 372"],
//            ["et ", " Ethiopia ", " 251"],
//            ["fk ", " Falkland Islands (Islas Malvinas) ", " 500"],
//            ["fo ", " Faroe Islands (Føroyar) ", " 298"],
//            ["fj ", " Fiji ", " 679"],
//            ["fi ", " Finland (Suomi) ", " 358"],
//            ["fr ", " France ", " 33"],
//            ["gf ", " French Guiana (Guyane française) ", " 594"],
//            ["pf ", " French Polynesia (Polynésie française) ", " 689"],
//            ["tf ", " French Southern Territories (Terres australes françaises) ", " 0"],
//            ["ga ", " Gabon ", " 241"],
//            ["gm ", " Gambia ", " 220"],
//            ["ge ", " Georgia (საქართველო) ", " 995"],
//            ["de ", " Germany (Deutschland) ", " 49"],
//            ["gh ", " Ghana (Gaana) ", " 233"],
//            ["gi ", " Gibraltar ", " 350"],
//            ["gr ", " Greece (Ελλάδα) ", " 30"],
//            ["gl ", " Greenland (Kalaallit Nunaat) ", " 299"],
//            ["gd ", " Grenada ", " 1473"],
//            ["gp ", " Guadeloupe ", " 590"],
//            ["gu ", " Guam ", " 1671"],
//            ["gt ", " Guatemala ", " 502"],
//            ["gg ", " Guernsey ", " 0"],
//            ["gn ", " Guinea (Guinée) ", " 224"],
//            ["gw ", " Guinea-Bissau (Guiné-Bissau) ", " 245"],
//            ["gy ", " Guyana ", " 592"],
//            ["ht ", " Haiti ", " 509"],
//            ["hm ", " Heard & McDonald Islands ", " 0"],
//            ["hn ", " Honduras ", " 504"],
//            ["hk ", " Hong Kong (香港) ", " 852"],
//            ["hu ", " Hungary (Magyarország) ", " 36"],
//            ["is ", " Iceland (Ísland) ", " 354"],
//            ["in ", " India (भारत) ", " 91"],
//            ["id ", " Indonesia ", " 62"],
//            ["ir ", " Iran (ایران) ", " 98"],
//            ["iq ", " Iraq (العراق) ", " 964"],
//            ["ie ", " Ireland ", " 353"],
//            ["im ", " Isle of Man ", " 0"],
//            ["il ", " Israel (ישראל) ", " 972"],
//            ["it ", " Italy (Italia) ", " 39"],
//            ["jm ", " Jamaica ", " 1876"],
//            ["jp ", " Japan (日本) ", " 81"],
//            ["je ", " Jersey ", " 0"],
//            ["jo ", " Jordan (الأردن) ", " 962"],
//            ["kz ", " Kazakhstan (Казахстан) ", " 7"],
//            ["ke ", " Kenya ", " 254"],
//            ["ki ", " Kiribati ", " 686"],
//            ["xk ", " Kosovo (Kosovë) ", " 0"],
//            ["kw ", " Kuwait (الكويت) ", " 965"],
//            ["kg ", " Kyrgyzstan (Кыргызстан) ", " 996"],
//            ["la ", " Laos (ລາວ) ", " 856"],
//            ["lv ", " Latvia (Latvija) ", " 371"],
//            ["lb ", " Lebanon (لبنان) ", " 961"],
//            ["ls ", " Lesotho ", " 266"],
//            ["lr ", " Liberia ", " 231"],
//            ["ly ", " Libya (ليبيا) ", " 218"],
//            ["li ", " Liechtenstein ", " 423"],
//            ["lt ", " Lithuania (Lietuva) ", " 370"],
//            ["lu ", " Luxembourg ", " 352"],
//            ["mo ", " Macau (澳門) ", " 853"],
//            ["mk ", " Macedonia (FYROM) (Македонија) ", " 389"],
//            ["mg ", " Madagascar (Madagasikara) ", " 261"],
//            ["mw ", " Malawi ", " 265"],
//            ["my ", " Malaysia ", " 60"],
//            ["mv ", " Maldives ", " 960"],
//            ["ml ", " Mali ", " 223"],
//            ["mt ", " Malta ", " 356"],
//            ["mh ", " Marshall Islands ", " 692"],
//            ["mq ", " Martinique ", " 596"],
//            ["mr ", " Mauritania (موريتانيا) ", " 222"],
//            ["mu ", " Mauritius (Moris) ", " 230"],
//            ["yt ", " Mayotte ", " 0"],
//            ["mx ", " Mexico (México) ", " 52"],
//            ["fm ", " Micronesia ", " 691"],
//            ["md ", " Moldova (Republica Moldova) ", " 373"],
//            ["mc ", " Monaco ", " 377"],
//            ["mn ", " Mongolia (Монгол) ", " 976"],
//            ["me ", " Montenegro (Crna Gora) ", " 382"],
//            ["ms ", " Montserrat ", " 1664"],
//            ["ma ", " Morocco ", " 212"],
//            ["mz ", " Mozambique (Moçambique) ", " 258"],
//            ["mm ", " Myanmar (Burma) (မြန်မာ) ", " 95"],
//            ["na ", " Namibia (Namibië) ", " 264"],
//            ["nr ", " Nauru ", " 674"],
//            ["np ", " Nepal (नेपाल) ", " 977"],
//            ["nl ", " Netherlands (Nederland) ", " 31"],
//            ["nc ", " New Caledonia (Nouvelle-Calédonie) ", " 687"],
//            ["nz ", " New Zealand ", " 64"],
//            ["ni ", " Nicaragua ", " 505"],
//            ["ne ", " Niger (Nijar) ", " 227"],
//            ["ng ", " Nigeria ", " 234"],
//            ["nu ", " Niue ", " 683"],
//            ["nf ", " Norfolk Island ", " 6723"],
//            ["mp ", " Northern Mariana Islands ", " 1"],
//            ["kp ", " North Korea (조선민주주의인민공화국) ", " 850"],
//            ["no ", " Norway (Norge) ", " 47"],
//            ["om ", " Oman (عُمان) ", " 968"],
//            ["pk ", " Pakistan (پاکستان) ", " 92"],
//            ["pw ", " Palau ", " 680"],
//            ["ps ", " Palestine (فلسطين) ", " 970"],
//            ["pa ", " Panama (Panamá) ", " 507"],
//            ["pg ", " Papua New Guinea ", " 675"],
//            ["py ", " Paraguay ", " 595"],
//            ["pe ", " Peru (Perú) ", " 51"],
//            ["ph ", " Philippines ", " 63"],
//            ["pn ", " Pitcairn Islands ", " 0"],
//            ["pl ", " Poland (Polska) ", " 48"],
//            ["pt ", " Portugal ", " 351"],
//            ["pr ", " Puerto Rico ", " 1787"],
//            ["qa ", " Qatar (قطر) ", " 974"],
//            ["re ", " Réunion (La Réunion) ", " 262"],
//            ["ro ", " Romania (România) ", " 40"],
//            ["ru ", " Russia (Россия) ", " 7"],
//            ["rw ", " Rwanda ", " 250"],
//            ["ws ", " Samoa ", " 685"],
//            ["sm ", " San Marino ", " 378"],
//            ["st ", " São Tomé & Príncipe (São Tomé e Príncipe) ", " 239"],
//            ["sa ", " Saudi Arabia (المملكة العربية السعودية) ", " 966"],
//            ["sn ", " Senegal ", " 221"],
//            ["rs ", " Serbia (Србија) ", " 381"],
//            ["sc ", " Seychelles ", " 248"],
//            ["sl ", " Sierra Leone ", " 232"],
//            ["sg ", " Singapore ", " 65"],
//            ["sx ", " Sint Maarten ", " 1721"],
//            ["sk ", " Slovakia (Slovensko) ", " 421"],
//            ["si ", " Slovenia (Slovenija) ", " 386"],
//            ["sb ", " Solomon Islands ", " 677"],
//            ["so ", " Somalia (Soomaaliya) ", " 252"],
//            ["za ", " South Africa ", " 27"],
//            ["gs ", " South Georgia & South Sandwich Islands ", " 0"],
//            ["kr ", " South Korea (대한민국) ", " 82"],
//            ["ss ", " South Sudan (جنوب السودان) ", " 211"],
//            ["es ", " Spain (España) ", " 34"],
//            ["lk ", " Sri Lanka (ශ්‍රී ලංකාව) ", " 94"],
//            ["bl ", " St. Barthélemy (Saint-Barthélemy) ", " 590"],
//            ["sh ", " St. Helena ", " 290"],
//            ["kn ", " St. Kitts & Nevis ", " 1869"],
//            ["lc ", " St. Lucia ", " 1758"],
//            ["mf ", " St. Martin (Saint-Martin) ", " 590"],
//            ["pm ", " St. Pierre & Miquelon (Saint-Pierre-et-Miquelon) ", " 508"],
//            ["vc ", " St. Vincent & Grenadines ", " 1784"],
//            ["sd ", " Sudan (السودان) ", " 249"],
//            ["sr ", " Suriname ", " 597"],
//            ["sj ", " Svalbard & Jan Mayen (Svalbard og Jan Mayen) ", " 0"],
//            ["sz ", " Swaziland ", " 268"],
//            ["se ", " Sweden (Sverige) ", " 46"],
//            ["ch ", " Switzerland (Schweiz) ", " 41"],
//            ["sy ", " Syria (سوريا) ", " 963"],
//            ["tw ", " Taiwan (台灣) ", " 886"],
//            ["tj ", " Tajikistan ", " 992"],
//            ["tz ", " Tanzania ", " 255"],
//            ["th ", " Thailand (ไทย) ", " 66"],
//            ["tl ", " Timor-Leste ", " 670"],
//            ["tg ", " Togo ", " 228"],
//            ["tk ", " Tokelau ", " 690"],
//            ["to ", " Tonga ", " 676"],
//            ["tt ", " Trinidad & Tobago ", " 1868"],
//            ["ta ", " Tristan da Cunha ", " 0"],
//            ["tn ", " Tunisia ", " 216"],
//            ["tr ", " Turkey (Türkiye) ", " 90"],
//            ["tm ", " Turkmenistan ", " 993"],
//            ["tc ", " Turks & Caicos Islands ", " 1649"],
//            ["tv ", " Tuvalu ", " 688"],
//            ["um ", " U.S. Outlying Islands ", " 0"],
//            ["vi ", " U.S. Virgin Islands ", " 1340"],
//            ["ug ", " Uganda ", " 256"],
//            ["ua ", " Ukraine (Україна) ", " 380"],
//            ["ae ", " United Arab Emirates (الإمارات العربية المتحدة) ", " 971"],
//            ["gb ", " United Kingdom ", " 44"],
//            ["us ", " United States ", " 1"],
//            ["uy ", " Uruguay ", " 598"],
//            ["uz ", " Uzbekistan (Oʻzbekiston) ", " 998"],
//            ["vu ", " Vanuatu ", " 678"],
//            ["va ", " Vatican City (Città del Vaticano) ", " 379"],
//            ["ve ", " Venezuela ", " 58"],
//            ["vn ", " Vietnam (Việt Nam) ", " 84"],
//            ["wf ", " Wallis & Futuna ", " 681"],
//            ["eh ", " Western Sahara (الصحراء الغربية) ", " 0"],
//            ["ye ", " Yemen (اليمن) ", " 967"],
//            ["zm ", " Zambia ", " 260"],
//            ["zw ", " Zimbabwe ", " 263"],
//        ];
//
//        for (var i = 0; i < country_arr.length; i++) {
//            $("#jq-validation-select2").append('<option value="' + country_arr[i][0] + '">' + country_arr[i][1].trim() + '</option>');
//        }

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

    </script>
    @stop
    @stop
