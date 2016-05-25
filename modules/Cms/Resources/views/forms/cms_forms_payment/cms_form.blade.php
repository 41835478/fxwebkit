<h2>Payment Form</h2>

@if ($errors->any())
    <ul  >
        @foreach ($errors->getMessages() as $field=>$error)
            @foreach ($error as $oneError)
                <li  class="error"> {{$oneError}}</li>
                <li style="list-style: none;"><br></li>
            @endforeach
        @endforeach
    </ul>
@endif




@if (Session::get('flash_success'))
    <div class="alert alert-success">
        @if(is_array(json_decode(Session::get('flash_success'),true)))
            {!! implode('', Session::get('flash_success')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_success') !!}
        @endif
    </div>

@else





    <div id="demo-form-cont">
    <h5>Funding your account via Credit/Debit cards
    </h5>
    <p>
        To add funds to your House of Borse account by Credit/Debit cards, please fill in and submit the form below.</p>


        {!! Form::model($payment,['url' => '/cms_forms_payment/form', 'class' => 'form-horizontal']) !!}
       <div class="header_with_stars">
            <h2 class="f-primary-b">PERSONAL INFO</h2>

            <div class="b-hr-stars f-hr-stars ">
                <div class="b-hr-stars__group"><span class="fa fa-star">&nbsp;</span> <span class="fa fa-star">&nbsp;</span> <span class="fa fa-star">&nbsp;</span></div>
            </div>
        </div>





        <div class="col-xs-6">
            <label for="OWNER_NAME" class="required"> Name as it appears on your ID *</label>
            {!! Form::text('OWNER_NAME',null,['required'=>'required','class'=>'form-control']) !!}
        </div>



        <div class="col-xs-6">                        <label for="ORDERID" class="required">Account Number*</label>

            {!! Form::text('ORDERID',null,['required'=>'required','class'=>'form-control','id'=>'ORDERID']) !!}
        </div>

        <div class="col-xs-6">
            <label for="CN" class="required"> Email Address *</label>

            {!! Form::text('EMAIL',null,['required'=>'required','class'=>'form-control','id'=>'EMAIL']) !!}
        </div>


        <div class="col-xs-6">
            <label for="CN" class="required"> Phone Number *</label>

            {!! Form::text('OWNERTELNO',null,['required'=>'required','class'=>'form-control','id'=>'OWNERTELNO']) !!}
        </div>


        <div class="col-xs-6">
            <label for="CN" class="required"> Address *</label>

            {!! Form::text('OWNERADDRESS',null,['required'=>'required','class'=>'form-control','id'=>'OWNERADDRESS']) !!}
        </div>

        <div class="col-xs-6">
            <label for="CN" class="required"> Country* </label>
                    {!! Form::select('OWNERADDRESS2',$arrays['country'],null,['required'=>'required','style'=>'width:100%;','id'=>'OWNERADDRESS2']) !!}

        </div>
        <div class="clearfix"></div>

        <div class="col-xs-6">

            <label for="CN" class="required"> City *</label>

            {!! Form::text('OWNERCTY',null,['required'=>'required','class'=>'form-control','id'=>'OWNERCTY']) !!}
        </div>


        <div class="col-xs-6">
            <label for="CN" class="required"> PO BOX/Zip Code </label>

            {!! Form::text('OWNERZIP',null,['class'=>'form-control','id'=>'OWNERZIP']) !!}
        </div>



        <div style="clear:both"></div>

        <div class="header_with_stars">
            <h2 class="f-primary-b">PAYMENT INFO</h2>

            <div class="b-hr-stars f-hr-stars ">
                <div class="b-hr-stars__group"><span class="fa fa-star">&nbsp;</span> <span class="fa fa-star">&nbsp;</span> <span class="fa fa-star">&nbsp;</span></div>
            </div>
        </div>

        <div style="clear:both"></div>



        <div class="col-xs-6">
            <label for="AMOUNT" class="required">AMOUNT*</label>

            {!! Form::text('AMOUNT',null,['required'=>'required','class'=>'form-control','id'=>'AMOUNT']) !!}

        </div>


        <div class="col-xs-6">
            <label for="AMOUNT" class="required">CURRENCY*</label>
            <select  name="CURRENCY"   required='required'id="CURRENCY" style="width:100%" />
            <option>USD</option>
            <option>EUR</option>
            <option>GBP</option>
            </select>
        </div>



        <div class="col-xs-12">
            <label for="AMOUNT" class="required">Additional instructions</label>
            {!! Form::text('COM',null,['class'=>'form-control','id'=>'COM']) !!}
        </div>






        <div style="clear:both"></div>
        <div class="header_with_stars">
            <h2 class="f-primary-b">CARD DETAILS</h2>

            <div class="b-hr-stars f-hr-stars ">
                <div class="b-hr-stars__group"><span class="fa fa-star">&nbsp;</span> <span class="fa fa-star">&nbsp;</span> <span class="fa fa-star">&nbsp;</span></div>
            </div>
        </div>

        <div style="clear:both"></div>




        <div class="col-xs-12" id="fullNameDiv">
            <label for="CN" class="required">Full Name*</label>
            <div class="clearfix"></div>

            {!! Form::text('CN',null,['required'=>'required','class'=>'form-control','id'=>'CN']) !!}
            <div class="iconDiv"><i class="fa fa-info" ></i></div>

            <span>Please enter as it appears on your card. If your card is in the name of a business. enter the business name here.</span>
        </div>



        <div class="col-xs-6">
            <label for="AMOUNT" class="required">Card Type *</label>
            <select  name="BRAND" id="BRAND"   required='required'style="width:100%" >
                <option value="VISA">VISA</option>
                <option value="MasterCard">Master Card</option>
                <option value="Maestro">Maestro</option>
            </select>

        </div>



        <div class="col-xs-6">
            <label for="AMOUNT" class="required">CARD NUMBER *</label>
            <input  name="CARDNO" id="CARDNO"  required='required' value="" class="form-control">
        </div>


        <div class="col-xs-6">

            <label class="col-xs-12">&ensp;</label>
            <div style="width:25%; float:left;">
                <label for="EDM" class="required ">Expiry Date*</label>
            </div>
            <div  style="width:40%; float:left;">
                <select  name="EDM" id="EDM"   required='required'style="width:90%" >
                    <option value="0">MONTH</option>
                   @for ($i=1;$i<13;$i++)

                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div  style="width:35%; float:left;">

                <select  name="EDY" id="EDY"   required='required' style="width:100%" >
                    <option value="0">YEAR</option>
                    @for ($i=16;$i<=30;$i++)

                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

        </div>



        <div class="col-xs-6">
            <label for="AMOUNT" class="required">CVC*</label>
            <input  name="CVC" id="CVC" value=""   required='required'class="form-control">
        </div>


        <div class="col-xs-6">
            <input type="hidden" name="SHASign" value=" " class="form-control">
        </div>


        <div class="col-xs-12"><br>
            <p style="color:red"> <b> * House of Borse does not guarantee deposit times in the event of a margin call.</b></p>
            <div class="col-xs-12">

                <img src="/cms_assets/houseofborse/images/barc.png" style="    margin: auto;
    display: block;">

            </div>
            <label for="agreement" class="required">

                <input type="checkbox"  name="agreement" id="agreement" value=""   required='required'  >
                * By clicking the "Deposit Funds" button, I confirm that I have read, understood and agree to the
                <a href="/Professional-Standard-Terms-Of-Business">Terms & Conditions</a>

                of House of Borse Limited card funding services.
            </label>
            <!--<a href=" ">Disclaimer</a>-->


            <br>  </div>


        <div class="col-xs-12">
            <input type="submit" class="form-control btn btn-golden" value="Deposit Funds" name="submit">
        </div>


        <div class="btn-group cardTypeContainer" data-toggle="buttons">
            <label class="btn btn-primary image-toggler" data-image-id="#image1">
                <input type="radio" name="options" id="option1"> Show Image 1
            </label>

            <label class="btn btn-primary image-toggler" data-image-id="#image2">
                <input type="radio" name="options" id="option2"> Show Image 2
            </label>
        </div>
        <script>
            $('.image-toggler').click(function(){
                $('.image-toggle').hide();
                $($(this).attr('data-image-id')).show();
            })
        </script>


    </form>
</div>
@endif
<div style="clear:both"></div>
<style type="text/css">
    ul{ list-style: none}
    ul li{ list-style: none}
    label{ margin:5px 0px; margin-top:5px;}

    input[type="submit"]{
        color: #fff;
        background-color: #B4A880;
        text-decoration: none!important;
        border: 0!important;
        outline: 0!important;
        margin:5px 0px;
    }


    #fullNameDiv{}
    #fullNameDiv label{}
    #fullNameDiv input{ width:40%; float:left;}
    #fullNameDiv .iconDiv{width:10%;display:block; float:left; text-align:center; }
    #fullNameDiv i{float:right;
        margin-right:7px; display:inline-block; padding: 10px 20px; font-size: 22px;text-align:center;
        border-radius:100%;  background-color:#E8A816; color:#ffffff;}
    #fullNameDiv span{
        border-radius:5px;
        width:50%; display:block; float:left;background-color:#E8A816; color:#ffffff; padding:5px;}

    #fullNameDiv span:before{
        font: normal normal normal 23px/1 FontAwesome;
        content: "\f0d9";
        margin-left: -12px;
        color: #E8A816;
        margin-right: 10px;
    }

    .cardTypeContainer{
        display:none;

    }
</style>




