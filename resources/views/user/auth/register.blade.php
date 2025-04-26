@extends('user.layout.master')
@section('title','Registration')

@section('content')

<div class="breadcrumb-section mb-20" style="background-image: url('{{ asset("uploads/inner_pages/breadcrumb-bg7.png") }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h4>Create Account</h4>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('web.home') }}">Home</a></li>
                        <li>Create Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-page pt-35 mb-110">
    <div class="container">
        <div class="row g-lg-4 gy-5 align-items-center">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                
                    
                    @if (Session::has('error'))
                          <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    @if (Session::has('success'))
                       <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                <div class="contact-form-area" style="margin-left: 0px !important;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}" id="formReg">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 mb-20">
                                <div class="form-floating {{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input type="hidden" name="lat" id="lat" />
                                    <input type="hidden" name="long" id="long" />
                                    <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control"
                            maxlength="10" minlength="9" id="contact_field" name="contact" value="{{ old('contact') }}" placeholder="Mobile Number" onkeypress="return isnumber(event)" autofocus>
                                    <label for="contact_field">Mobile</label>
                                    @if ($errors->has('contact'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>





                            <div class="col-md-12 mb-20">
                                <div class="form-floating {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <!-- <label>PIN</label> -->
                                    <input type="password" id="password" class="form-control" pattern="[0-9]*" inputmode="numeric" name="password" placeholder="PIN (4 Digits only)" maxlength="4" minlength="3"  onkeypress="return isnumber(event)">
                                    <label for="password">PIN (4 Digits only) </label>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12 mb-20">
                                <div class="form-floating {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <!-- <label>PIN</label> -->
                                    <input type="password" id="password-confirm" class="form-control" pattern="[0-9]*" inputmode="numeric" name="password_confirmation" placeholder="Confirm PIN" maxlength="4" minlength="3"  onkeypress="return isnumber(event)">
                                    <label for="password-confirm">Confirm PIN </label>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            


                            <div class="col-md-12 text-center">
                            By clicking Create, you agree to our Terms and Conditions.
                                <div class="form-inner text-center">
                                    <button class="primary-btn btn-hover" type="submit"> Create <span></span></button>
                                </div>
                                <br>
                                <a class="btn-link" href="{{ url('/user/login') }}"> Log in via PIN </a>
                                
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>
</div>

@endsection
<!-- password show and hide -->
<style type="text/css">
    .field-icon {
      float: right;
      
      margin-top: -30px;
      margin-right: 5px;  
      position: relative;
      z-index: 2;
    }

</style>
@push('javaScript')
<script type="text/javascript">
   // function initialize() {
   //    var input = document.getElementById('searchTextField');
   //    var options = {
   //      types: ['geocode'] //this should work !
   //    };
   //    var autocomplete = new google.maps.places.Autocomplete(input, options);
   // }
   // google.maps.event.addDomListener(window, 'load', initialize);
   $('.eye-icon').on('click', function() {   
        var input = $(".password_ins");
        if (input.attr("type") === "password") {
            input.attr("type", "text");
            $('.eye-open').css("display",'none');
            $('.eye-close').css("display",'block');
        } else {
            input.attr("type", "password");
            $('.eye-close').css("display",'none');
            $('.eye-open').css("display",'block');
        }
    });
        
    
    var from_error={};
    $(function(){
        $('input[name="name"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length<3)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid name";
                }    
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        $('input[name="email"]').on('keyup',function(){
            var text_=$(this);
            var email = new RegExp('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]');
            
            if(text_.val().length>0 && email.test(text_.val()) == false)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid email.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid email id.";
                }    
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        $('input[name="address"]').on('keyup',function(){
            var text_=$(this);
            var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            
            if(text_.val().length>0 && (text_.val().length<15 && location.test(text_)))
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid address";
                }
            }
            else {
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $('input[name="contact"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length!==10)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li" style="color:#d75d54;"> Enter 10 digits mobile number.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid contact number.";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='password']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length!==4)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li" style="color:#d75d54;"> PIN must have 4 digits.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid Password";
                }
            }
            else {
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='password_confirmation']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val()!=$("input[name='password']").val())
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li" style="color:#d75d54;"> PIN is not matching.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Password missmatch";
                }
            }
            else {
                $(this).parent('div').find(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        
        //On submit form
        $("#formReg").submit(function(e){
            if($('.error-li').length>0)
            {
                var result=$("<div>");
                result.html('<li class="error-li"> Fill Required fields first.</li>');
                result.css('color','red');
                $("#formDonation").append(result);
                return false; 
            }
            var status=true;
            var error_msz='';
            $(".error-li").remove();
            var individual_nod = $("#individual"); 
            var dealer_nod = $("#dealer"); 
            var name_nod = $('input[name="name"]'); 
            var address_nod = $('input[name="address"]'); 
            var lat_nod = $('input[name="lat"]'); 
            var long_nod = $('input[name="long"]'); 
            
            var email_nod = $('input[name="email"]');
            var email = new RegExp('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]');
            
            var contact_nod = $('input[name="contact"]'); 
            var password_nod = $('input[name="password"]'); 
            var password_confirm_nod = $('input[name="password_confirmation"]'); 
            if((individual_nod.val()==0 && dealer_nod.val()==0 ) || (individual_nod.val()==1 && dealer_nod.val()==1 ))
            {
                dealer_nod.parent().append('<li class="error-li"> Select either individual or deale</li>');
                status=false;
            }
            if(name_nod.val().trim().length<3)
            {

                name_nod.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            if(email_nod.val().trim().length>0 && email.test(email_nod.val().trim()) == false)
            {

                email_nod.parent().append('<li class="error-li"> Invalid name. Only Alphabates allowed (minimum 3).</li>');
                // error_msz+="<li> Invalid name. Only Alphabates allowed (minimum 3).</li><br>";
                status=false;
            }
            if(address_nod.val().trim().length<15 )
            {
                address_nod.parent().append('<li class="error-li"> It should have proper Location, City, State, Country.</li>');
                // error_msz+="<li> <p>Invalid address_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            if(contact_nod.val().trim().length!==10 )
            {
                contact_nod.parent().append('<li class="error-li" style="color:#d75d54;">Enter 10 digits mobile number.</li>');
                // error_msz+="<li> <p>Invalid contact_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            if(password_nod.val().trim().length!==4 )
            {
                password_nod.parent().append('<li class="error-li" style="color:#d75d54;"> PIN must have 4 digits.</li>');
                // error_msz+="<li> <p>Invalid password_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            if(password_nod.val()!= password_confirm_nod.val())
            {
                password_confirm_nod.parent().append('<li class="error-li" style="color:#d75d54;"> PIN is not matching.</li>');
                // error_msz+="<li> <p>Invalid password_confirm_nod. Minimum 3 characters required.</p></li><br>";
                status=false;
            }
            
            if(!status){
                var result=$("<div>");
                result.html(error_msz);
                result.css('color','red');
                $("#formReg").append(result);
            }
            return status;
        });
    });
</script>
@endpush