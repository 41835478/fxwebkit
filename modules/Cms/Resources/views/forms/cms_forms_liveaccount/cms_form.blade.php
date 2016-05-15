
    <h1>Create New live account</h1>
    <hr/>

    {!! Form::open(['route' => 'cms_forms_liveaccount.form', 'class' => 'form-horizontal']) !!}
<div class="fieldset_div">
    <div class="clearfix"></div>
    <h1 >PERSONAL ACCOUNT OPENING FORM</h1>

    <div class="clearfix"></div>
    <h2>APPLICATION FORM FOR THE PERSONAL ACCOUNT</h2>

    <div class="clearfix"></div>
    <h3>1.BASIC INFORMATION</h3>
    <div class="left_div">

        <div class="clearfix"></div>
        <h4>A. ACCOUNT TYPE</h4>
        <div class="input_all_div">
            <p></p>
            <label>{!! Form::label('postal_code', trans('postal_code'), ['class' => 'col-sm-3 control-label']) !!}</label>
            {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
            <span> {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}</span>
        </div>
    </div>

    <div class="right_div">

        <h4>B. TRADING ACCOUNT CURRENCY</h4>
        <div class="input_all_div">
            <label> <label>base currency for the account(s)*</label></label>
            {!! Form::text('base_currency_limit', null, ['class' => 'form-control']) !!}
           <span>{!! $errors->first('base_currency_limit', '<p class="help-block">:message</p>') !!}</span>
       </div>
   </div>
   <div class="clearfix"></div>
   <div class="full_width_div">

       <div class="clearfix"></div>
       <h4>C. PLATFORMS</h4>
       <div class="input_all_div">
           <p> Please select which platform you wish to utilise for trading with House of Borse Limited:</p>
           <label></label>

           {!! Form::select('default_platform',$arrays['default_platform'], 'MT4', ['class' => '','id'=>'forex_corebundle_portalusers_default_platform']) !!}
          <span>{!! $errors->first('default_platform', '<p class="help-block">:message</p>') !!}</span>
       </div>
   </div>

   <div class="clearfix"></div>
   <h3>2. INTRODUCTION(S)</h3>
   <p>Please only complete this section in the event you have been introduced to House of Borse by a third party. Please ensure to
       provide the full name of the third party introducer.
   </p>

   <div class="clearfix"></div>
   <div class="left_div">
       <div class="input_all_div">
           <label>{!! Form::label('referring_partner', trans('referring_partner')) !!}</label>
           {!! Form::text('referring_partner', null, ['class' => 'form-control','placeholder'=>trans('referring_partner')]) !!}
           <span>{!! $errors->first('referring_partner', '<p class="help-block">:message</p>') !!}</span>
       </div>
   </div>

   <div class="right_div">

       <div class="input_all_div">
           <label>{!! Form::label('fund_manager', trans('fund_manager')) !!}</label>
           {!! Form::text('fund_manager', null, ['class' => 'form-control','placeholder'=>trans('fund_manager')]) !!}
           <span>{!! $errors->first('fund_manager', '<p class="help-block">:message</p>') !!}</span>
       </div>
   </div>



   <div class="clearfix"></div>
   <h3>3. PERSONAL DETAILS</h3>
   <p>if you are opening a joint account with House .please also complete the secondary account holder!</p>

   <div class="clearfix"></div>
   <div class="left_div">
       <div class="input_all_div">
           {!! Form::radio('sole_joint_account',0, true, ['class' => '']) !!}
           {!! Form::radio('sole_joint_account',1, false, ['class' => '']) !!}
           <span>{!! $errors->first('sole_joint_account', '<p class="help-block">:message</p>') !!}</span>
       </div>
   </div>

   <div class="clearfix"></div>
   <h4>A. PERSONAL DETAILS (HEREAFTER “CLIENT”)</h4>
   {!! Form::text('title', null, ['class' => 'form-control']) !!}
   <div class="col-xm-12 col-sm-4">
       {!! Form::text('PortalUser.first_name', null, ['class' => 'form-control']) !!}
       <div class="input_all_div" id="date_of_birth_div">
           {!! Form::label('date_of_birth', trans('date_of_birth')) !!}
           <div class="clearfix">
               {!! Form::text('date_of_birth', null, ['class' => 'form-control']) !!}
           </div>
           {!! $errors->first('date_of_birth', '<p class="help-block">:message</p>') !!}
       </div>
   </div>
   <div class="col-xm-12 col-sm-4 ">
       {!! Form::text('PortalUser.second_name', null, ['class' => 'form-control']) !!}

       {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
   </div>
   <div class="col-xm-12 col-sm-4">
       {!! Form::text('PortalUser.last_name', null, ['class' => 'form-control']) !!}
       {!! Form::text('gender', null, ['class' => 'form-control']) !!}
   </div>
   <div class="clearfix"></div>
   <div class="col-xm-12 col-sm-4 clearfix">
       <div class="input_all_div">
           {!! Form::label('marital_status', trans('marital_status')) !!}
           <div class="clearfix">
               {!! Form::text('marital_status', null, ['class' => 'form-control']) !!}
           </div>
           {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
       </div>
   </div>

   <div class="col-xm-12 col-sm-4">
       {!! Form::text('resident_status', null, ['class' => 'form-control']) !!}
   </div>

   <div class="joint_div" id="a_joint">

       <div class="clearfix"></div>
       <h4>A. PERSONAL DETAILS (HEREAFTER “CLIENT”) (for Joint Account)</h4>
       {!! Form::text('title_joint', null, ['class' => 'form-control']) !!}
       <div class="col-xm-12 col-sm-4">
           {!! Form::text('first_name_joint', null, ['class' => 'form-control']) !!}
           <div class="input_all_div" id="date_of_birth_div">
               {!! Form::label('date_of_birth_joint', trans('date_of_birth_joint')) !!}
               <div class="clearfix">
                   {!! Form::text('date_of_birth_joint', null, ['class' => 'form-control']) !!}
               </div>
               {!! $errors->first('date_of_birth_joint', '<p class="help-block">:message</p>') !!}
           </div>
       </div>
       <div class="col-xm-12 col-sm-4 ">
           {!! Form::text('second_name_joint', null, ['class' => 'form-control']) !!}

           {!! Form::text('nationality_joint', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-xm-12 col-sm-4">
           {!! Form::text('last_name_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('gender_joint', null, ['class' => 'form-control']) !!}
       </div>
       <div class="clearfix"></div>
       <div class="col-xm-12 col-sm-4 clearfix">
           <div class="input_all_div">
               {!! Form::label('marital_status_joint', trans('marital_status_joint')) !!}
               <div class="clearfix">
                   {!! Form::text('marital_status_joint', null, ['class' => 'form-control']) !!}
               </div>
               {!! $errors->first('marital_status_joint', '<p class="help-block">:message</p>') !!}
           </div>
       </div>

       <div class="col-xm-12 col-sm-4">
           {!! Form::text('resident_status_joint', null, ['class' => 'form-control']) !!}
       </div>

   </div>



   <div class="clearfix"></div>

   <h4>B. RESIDENTIAL ADDRESS</h4>
   <div class="full_width_div">




   </div>
   <div class="left_div">
       {!! Form::text('street_and_number', null, ['class' => 'form-control']) !!}
       {!! Form::text('city', null, ['class' => 'form-control']) !!}
   </div>
   <div class="right_div">
       {!! Form::text('postalCode', null, ['class' => 'form-control']) !!}
       <div class="input_all_div">
           {!! Form::label('country', trans('country')) !!}
           <div class="country_list">
               {!! Form::text('country', null, ['class' => 'form-control']) !!}
           </div>
           {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
       </div>
   </div>

   <div class="joint_div" id="b_joint">

       <div class="clearfix"></div>
       <h4>B. RESIDENTIAL ADDRESS (for Joint Account)</h4>
       <div class="full_width_div">




       </div>
       <div class="left_div">
           {!! Form::text('street_and_number_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('city_joint', null, ['class' => 'form-control']) !!}
       </div>
       <div class="right_div">
           {!! Form::text('postalCode_joint', null, ['class' => 'form-control']) !!}
           <div class="input_all_div">
               {!! Form::label('country_joint', trans('country_joint')) !!}
               <div class="country_list">
                   {!! Form::text('country_joint', null, ['class' => 'form-control']) !!}
               </div>
               {!! $errors->first('country_joint', '<p class="help-block">:message</p>') !!}
           </div>
       </div>

   </div>


   <div class="clearfix"></div>

   <h4>C. CONTACT DETAILS</h4>

   <div class="clearfix"></div>
   <div class="left_div">
       {!! Form::text('main_phone', null, ['class' => 'form-control']) !!}
       {!! Form::text('primary_email', null, ['class' => 'form-control']) !!}
       {!! Form::text('fax', null, ['class' => 'form-control']) !!}
   </div>

   <div class="right_div">

       {!! Form::text('secondary_phone', null, ['class' => 'form-control']) !!}
       {!! Form::text('secondary_email', null, ['class' => 'form-control']) !!}
   </div>

   <div class="joint_div" id="c_joint">

       <div class="clearfix"></div>
       <h4>C. CONTACT DETAILS (for Joint Account)</h4>

       <div class="left_div">
           {!! Form::text('main_phone_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('primary_email_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('fax_joint', null, ['class' => 'form-control']) !!}
       </div>


       <div class="right_div">

           {!! Form::text('secondary_phone_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('secondary_email_joint', null, ['class' => 'form-control']) !!}
       </div>

   </div>
   <div class="clearfix"></div>
   <h4>D. POSTAL ADDRESS (IF DIFFERENTFROM RESIDENTIAL ADDRESS)</h4>
   <div class="left_div">
       {!! Form::text('postal_street_and_number', null, ['class' => 'form-control']) !!}
       {!! Form::text('postal_city', null, ['class' => 'form-control']) !!}

       <div class="clearfix"></div>
   </div>
   <div class="right_div">

       {!! Form::text('postal_post_code', null, ['class' => 'form-control']) !!}
       {!! Form::text('postal_country', null, ['class' => 'form-control']) !!}

       <div class="clearfix"></div>
   </div>

   <div class="clearfix"></div>
   <div class="joint_div" id="d_joint">
       <div class="clearfix"></div>
       <h4>D. POSTAL ADDRESS (IF DIFFERENTFROM RESIDENTIAL ADDRESS) (for Joint Account)</h4>
       <div class="left_div">
           {!! Form::text('postal_street_and_number_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('postal_city_joint', null, ['class' => 'form-control']) !!}
       </div>
       <div class="right_div">

           {!! Form::text('postal_post_code_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('postal_country_joint', null, ['class' => 'form-control']) !!}

       </div>
   </div>

   <div class="clearfix"></div>
   <h3>4. FINANCIAL INFORMATION</h3>

   <div class="clearfix"></div>
   <h4>A. FINANCIAL BACKGROUND</h4>
   <div class="full_width_div"> {!! Form::text('financial_instrument_portfolio', null, ['class' => 'form-control']) !!}
   </div>
   <div class="joint_div" id="4_a_joint">
       <h4>A. FINANCIAL BACKGROUND (for Joint Account)</h4>
       <div class="full_width_div"> {!! Form::text('financial_instrument_portfolio_joint', null, ['class' => 'form-control']) !!}
       </div>

       <div class="clearfix"></div>
   </div>

   <div class="clearfix"></div>
   <h4>B. SOURCE OF FUNDS DEPOSITED WITH HOUSE OF BORSE (IF YOU SELECT“OTHER” PLEASE SPECIFY)</h4>
   <div class="left_div">
       {!! Form::text('source_funds_deposited', null, ['class' => 'form-control']) !!}
       <div class="clearfix"></div>
   </div>
   <div class="right_div">
       {!! Form::text('other_source_funds_deposited', null, ['class' => 'form-control']) !!}
       <div class="clearfix"></div>
   </div>

   <div class="clear:fix"></div>
   <div class="joint_div" id="4_b_joint">
       <div class="clearfix"></div>
       <h4>B. SOURCE OF FUNDS DEPOSITED WITH HOUSE OF BORSE (IF YOU SELECT“OTHER” PLEASE SPECIFY) (for Joint Account)</h4>
       <div class="left_div">
           {!! Form::text('source_funds_deposited_joint', null, ['class' => 'form-control']) !!}
       </div>
       <div class="right_div">
           {!! Form::text('other_source_funds_deposited_joint', null, ['class' => 'form-control']) !!}
       </div>
   </div>

   <div class="clearfix"></div>
   <h3>5. TRADING EXPERIENCE</h3>


   <h4>B. FINANCIAL MARKETS EXPERIENCE</h4>
   <div class="full_width_div">
       <div class="col-sm-4">
           {!! Form::text('number_of_years_cfd', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('number_of_transactions_cfd', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('average_trading_cfd', null, ['class' => 'form-control']) !!}
       </div>
   </div>



   <div class="full_width_div">
       <div class="col-sm-4">
           {!! Form::text('number_of_years_commodities', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('number_of_transactions_commodities', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('average_trading_commodities', null, ['class' => 'form-control']) !!}
       </div>
   </div>


   <div class="full_width_div">
       <div class="col-sm-4">
           {!! Form::text('number_of_years_forex', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('number_of_transactions_forex', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('average_trading_forex', null, ['class' => 'form-control']) !!}
       </div>
   </div>



   <div class="full_width_div">
       <div class="col-sm-4">
           {!! Form::text('number_of_years_futures', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('number_of_transactions_futures', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('average_trading_futures', null, ['class' => 'form-control']) !!}
       </div>
   </div>



   <div class="full_width_div">
       <div class="col-sm-4">
           {!! Form::text('number_of_years_options', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('number_of_transactions_options', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('average_trading_options', null, ['class' => 'form-control']) !!}
       </div>
   </div>



   <div class="full_width_div">
       <div class="col-sm-4">
           {!! Form::text('number_of_years_securities', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('number_of_transactions_securities', null, ['class' => 'form-control']) !!}
       </div>
       <div class="col-sm-4">
           {!! Form::text('average_trading_securities', null, ['class' => 'form-control']) !!}
       </div>
   </div>


   <div class="joint_div" id="5_joint">

       <div class="clearfix"></div>
       <h3>5. TRADING EXPERIENCE ( for Joint Account)</h3>

       <div class="full_width_div">

           <h4>B. FINANCIAL MARKETS EXPERIENCE (for Joint Account)</h4>


       </div>

       <div class="full_width_div">
           <div class="col-sm-4">
               {!! Form::text('number_of_years_cfd_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('number_of_transactions_cfd_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('average_trading_cfd_joint', null, ['class' => 'form-control']) !!}
           </div>
       </div>



       <div class="full_width_div">
           <div class="col-sm-4">
               {!! Form::text('number_of_years_commodities_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('number_of_transactions_commodities_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('average_trading_commodities_joint', null, ['class' => 'form-control']) !!}
           </div>
       </div>


       <div class="full_width_div">
           <div class="col-sm-4">
               {!! Form::text('number_of_years_forex_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('number_of_transactions_forex_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('average_trading_forex_joint', null, ['class' => 'form-control']) !!}
           </div>
       </div>



       <div class="full_width_div">
           <div class="col-sm-4">
               {!! Form::text('number_of_years_futures_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('number_of_transactions_futures_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('average_trading_futures_joint', null, ['class' => 'form-control']) !!}
           </div>
       </div>



       <div class="full_width_div">
           <div class="col-sm-4">
               {!! Form::text('number_of_years_options_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('number_of_transactions_options_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('average_trading_options_joint', null, ['class' => 'form-control']) !!}
           </div>
       </div>



       <div class="full_width_div">
           <div class="col-sm-4">
               {!! Form::text('number_of_years_securities_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('number_of_transactions_securities_joint', null, ['class' => 'form-control']) !!}
           </div>
           <div class="col-sm-4">
               {!! Form::text('average_trading_securities_joint', null, ['class' => 'form-control']) !!}
           </div>
       </div>

   </div>

   <div class="clearfix"></div>
   <h4>I. UNDERSTANDING OF THE MARKETS</h4>
   <div class="col-sm-4">
       {!! Form::text('understand_market_cfd', null, ['class' => 'form-control']) !!}
       {!! Form::text('understand_market_years_cfd', null, ['class' => 'form-control']) !!}

       {!! Form::text('understand_market_futures', null, ['class' => 'form-control']) !!}
       {!! Form::text('understand_market_years_futures', null, ['class' => 'form-control']) !!}
   </div>

   <div class="col-sm-4">
       {!! Form::text('understand_market_commodities', null, ['class' => 'form-control']) !!}
       {!! Form::text('understand_market_years_commodities', null, ['class' => 'form-control']) !!}

       {!! Form::text('understand_market_options', null, ['class' => 'form-control']) !!}
       {!! Form::text('understand_market_years_options', null, ['class' => 'form-control']) !!}
   </div>

   <div class="col-sm-4">
       {!! Form::text('understand_market_forex', null, ['class' => 'form-control']) !!}
       {!! Form::text('understand_market_years_forex', null, ['class' => 'form-control']) !!}

       {!! Form::text('understand_market_securities', null, ['class' => 'form-control']) !!}
       {!! Form::text('understand_market_years_securities', null, ['class' => 'form-control']) !!}
   </div>

   <div class="joint_div" id="i_joint">

       <div class="clearfix"></div>
       <h4>I. UNDERSTANDING OF THE MARKETS (for Joint Account)</h4>
       <div class="col-sm-4">
           {!! Form::text('understand_market_cfd_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('understand_market_years_cfd_joint', null, ['class' => 'form-control']) !!}

           {!! Form::text('understand_market_futures_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('understand_market_years_futures_joint', null, ['class' => 'form-control']) !!}
       </div>

       <div class="col-sm-4">
           {!! Form::text('understand_market_commodities_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('understand_market_years_commodities_joint', null, ['class' => 'form-control']) !!}

           {!! Form::text('understand_market_options_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('understand_market_years_options_joint', null, ['class' => 'form-control']) !!}
       </div>

       <div class="col-sm-4">
           {!! Form::text('understand_market_forex_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('understand_market_years_forex_joint', null, ['class' => 'form-control']) !!}

           {!! Form::text('understand_market_securities_joint', null, ['class' => 'form-control']) !!}
           {!! Form::text('understand_market_years_securities_joint', null, ['class' => 'form-control']) !!}
       </div>

   </div>

   <div class="clearfix"></div>
   <h3>6. Pearsonal Files</h3>

   <div class="left_div">
       {!! Form::text('id_type', null, ['class' => 'form-control']) !!}
       {!! Form::text('proof_of_residence', null, ['class' => 'form-control']) !!}
   </div>

   <div class="right_div">

       <div class="file_input_div">
           {!! Form::label('document_id', trans('document_id')) !!}
           <div class="country_list">
               <i class="fa fa-upload"></i>
               {!! Form::text('document_id', null, ['class' => 'form-control']) !!}
           </div>
           {!! $errors->first('document_id', '<p class="help-block">:message</p>') !!}
       </div>

       <div class="file_input_div">
           {!! Form::label('document_por', trans('document_por')) !!}
           <div class="country_list">
               <i class="fa fa-upload"></i>
               {!! Form::text('document_por', null, ['class' => 'form-control']) !!}
           </div>
           {!! $errors->first('document_por', '<p class="help-block">:message</p>') !!}
       </div>


   </div>


   <div class="clearfix"></div>
   <h4>A. Understand risks</h4>
   Margin trading in financial markets such as stocks, futures, Forex and CFD is one of the riskiest forms of investment available in the financial markets. Traders Must learn that stocks, futures, Forex and Contracts For Differences (’CFDs’) are complex financial products that are traded on margin. It Carries a high level of risk since leverage can work both for or against you. not be suitable for all investors because you may lose all your invested capital. You should not risk more than what you are prepared to lose. Before deciding to trade, you need to ensure that you understand the risks involved, taking into account your investment objectives and level of experience. Past performance In Financial markets is not a reliable indicator of future results. Most CFDs have no set maturity date. Hence, a CFDs position matures on the date you choose to close an existing open position. Please Seek an independent advice, and therefore you should not invest money that you cannot afford to lose. If necessary. Please read House of Borse’s full <a href="path('showPage',{'id':1225,'parentid':2,'slug':'risk-disclosure'})">Risk Disclosure</a> and <a href="path('showPage',{'id':1198,'parentid':2,'slug':'privacy-policy'})">Privacy Policy</a> Statement.
   <div class="full_width_div">
       {!! Form::text('understand_risks', null, ['class' => 'form-control']) !!}


   </div>

   <div class="joint_div" id="resk_joint">
       <div class="clearfix"></div>
       <h4>A. Understand risks (for Joint Account)</h4>
       Margin trading in financial markets such as stocks, futures, Forex and CFD is one of the riskiest forms of investment available in the financial markets. Traders Must learn that stocks, futures, Forex and Contracts For Differences (’CFDs’) are complex financial products that are traded on margin. It Carries a high level of risk since leverage can work both for or against you. not be suitable for all investors because you may lose all your invested capital. You should not risk more than what you are prepared to lose. Before deciding to trade, you need to ensure that you understand the risks involved, taking into account your investment objectives and level of experience. Past performance In Financial markets is not a reliable indicator of future results. Most CFDs have no set maturity date. Hence, a CFDs position matures on the date you choose to close an existing open position. Please Seek an independent advice, and therefore you should not invest money that you cannot afford to lose. If necessary. Please read House of Borse’s full <a href="path('showPage',{'id':1225,'parentid':2,'slug':'risk-disclosure'})">Risk Disclosure</a> and <a href="path('showPage',{'id':1198,'parentid':2,'slug':'privacy-policy'})">Privacy Policy</a> Statement.
       <div class="full_width_div">
           {!! Form::text('understand_risks_joint', null, ['class' => 'form-control']) !!}
       </div>
   </div>

   <div class="full_width_div">

       <div class="clearfix"></div>
       <h3>7. SIGNATURE AND CONSENT</h3>
       <h4>I/ WE, THE UNDERSIGNED, HEREBY CERTIFY THAT:</h4>

       {!! Form::text('agreem_check_1', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_2', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_3', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_4', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_5', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_6', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_7', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_8', null, ['class' => 'form-control']) !!}


       <h4>Personal information submitted by me/us to House of Borse may:</h4>

       {!! Form::text('agreem_check_9', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_10', null, ['class' => 'form-control']) !!}
       {!! Form::text('agreem_check_11', null, ['class' => 'form-control']) !!}

       {!! Form::text('agreem_check_12', null, ['class' => 'form-control']) !!}

   </div>




   <div class="clearfix">
   </div>
   <div class="col-xs-6">
   </div>

   <div id="submit_bottom_buttons_div">
       <button type="reset"  class="reset form-control btn btn-grey "><i class="fa fa-refresh"></i> {%trans%}Reset{%endtrans%}</button>

       <button type="submit" class="next form-control btn btn-golden " onclick="$(this).parents('form:first').submit();">{%trans%}Submit{%endtrans%} <i class="fa fa-arrow-right"></i></button>
   </div>
   <div class="clearfix"></div>

   </div>



   </form>
   </div><!--.box-row-->
   </section><!--.content-box-->



   <script type="text/javascript">

       function add_joint_validation(){
           $('.joint_div input').attr('required','true');
           $('.select2-input,.select2-search input,.select2-focusser,.select2-offscreen,#forex_corebundle_portalusers_secondary_phone_joint,#forex_corebundle_portalusers_secondary_email_joint,#d_joint input,#i_joint input[type="text"],#4_a_joint input,#forex_corebundle_portalusers_other_source_funds_deposited_joint').removeAttr('required');
       }
       function remove_joint_validation(){
           $('.joint_div input').removeAttr('required');
       }



       $(document).ready(function () {
           $('#forex_corebundle_portalusers_PortalUser_country').change(function () {
               $("#forex_corebundle_portalusers_PortalUser_mobile_number, #forex_corebundle_portalusers_tel, #forex_corebundle_portalusers_office").intlTelInput("selectCountry", $(this).val().toLowerCase());
           });


           $('#forex_corebundle_portalusers_country_joint').change(function () {
               $("#forex_corebundle_portalusers_main_phone_joint, #forex_corebundle_portalusers_secondary_phone_joint,#forex_corebundle_portalusers_fax_joint").intlTelInput("selectCountry", $(this).val().toLowerCase());
           });

           $('#forex_corebundle_portalusers_number_of_years_cfd,#forex_corebundle_portalusers_number_of_years_commodities,#forex_corebundle_portalusers_number_of_years_forex,#forex_corebundle_portalusers_number_of_years_futures,#forex_corebundle_portalusers_number_of_years_options,#forex_corebundle_portalusers_number_of_years_securities').change(function () {
               if($(this).val()==0){$(this).parent().parent().parent().next().find('select').attr('disabled','disabled');
                   $(this).parent().parent().parent().next().next().find('select').attr('disabled','disabled');
               }else{
                   $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
                   $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

               }
           });
           if($(this).val()==0){$(this).parent().parent().parent().next().find('select').attr('disabled','disabled');
               $(this).parent().parent().parent().next().next().find('select').attr('disabled','disabled');
           }else{
               $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
               $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

           }



           $('#forex_corebundle_portalusers_number_of_years_cfd_joint,#forex_corebundle_portalusers_number_of_years_commodities_joint,#forex_corebundle_portalusers_number_of_years_forex_joint,#forex_corebundle_portalusers_number_of_years_futures_joint,#forex_corebundle_portalusers_number_of_years_options_joint,#forex_corebundle_portalusers_number_of_years_securities_joint').change(function () {
               if($(this).val()==0){$(this).parent().parent().parent().next().find('select').attr('disabled','disabled');
                   $(this).parent().parent().parent().next().next().find('select').attr('disabled','disabled');
               }else{
                   $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
                   $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

               }
           });


           if($(this).val()==0){$(this).parent().parent().parent().next().find('select').attr('disabled','disabled');
               $(this).parent().parent().parent().next().next().find('select').attr('disabled','disabled');
           }else{
               $(this).parent().parent().parent().next().find('select').removeAttr('disabled');
               $(this).parent().parent().parent().next().next().find('select').removeAttr('disabled');

           }

           $('#forex_corebundle_portalusers_sole_joint_account input').change(function(){
               var radio_value=$('#forex_corebundle_portalusers_sole_joint_account input:checked').val();
               if(radio_value=='Sole personal account'){
                   $('.joint_div').hide();
                   remove_joint_validation();
               }else{
                   $('.joint_div').show();
                   add_joint_validation();
               }
           });

           var radio_value=$('#forex_corebundle_portalusers_sole_joint_account input:checked').val();
           if(radio_value=='Sole personal account'){
               $('.joint_div').hide();
               remove_joint_validation();
           }else{
               $('.joint_div').show();
               add_joint_validation();
           }

       });

       $(".file_input_div div").attr('data-content','Choose file');
       $(".file_input_div input").change(function(){
           $(this).parent().attr('data-content',$(this).val());
       });
       /*
        $(document).ready(function() {
        $("#real_form select").select2({
        width: 280,
        height: 60,
        dropdownCss: 'padding:  40px;'
        });
        });
        */
   </script>
    </div>
   {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif