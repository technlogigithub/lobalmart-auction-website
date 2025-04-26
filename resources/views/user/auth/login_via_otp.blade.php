@extends('user.layout.master')
@section('title','Login')
@section('content')

<div class="breadcrumb-section mb-20" style="background-image: url('{{ asset("uploads/inner_pages/breadcrumb-bg7.png") }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h4>Log in via OTP</h4>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('web.home') }}">Home</a></li>
                        <li>Log in</li>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.login.otpForm') }}" id="formLogin">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 mb-20">
                                <div class="form-floating {{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input type="text" pattern="[0-9]*" inputmode="numeric"
                            maxlength="10" minlength="9" class="form-control" id="contact_field" name="contact" value="{{ old('contact') }}" placeholder="Mobile Number" onkeypress="return isnumber(event)" autofocus>
                                    <label for="contact_field">Mobile</label>
                                    @if ($errors->has('contact'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('contact') }}</strong>
                                        </span>
                                    @endif
                                </div>


                            </div>

                            
                            <div class="col-md-12 text-center">
                                <div class="form-inner text-center">
                                    <button class="primary-btn btn-hover" type="submit"> Log in <span></span></button>
                                </div>
                                <br>
                                <a class="btn-link" href="{{ url('/user/login') }}"> Log in via PIN </a>
                                <br><br>
                                <a href="{{ url('/user/register') }}" class="login-btn btn-hover"> Create a New Account </a>
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
@push('javaScript')
<script type="text/javascript">
    var from_error={};
    $(function(){
        $("input[name='contact']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length!==10)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li" style="color:#d75d54;"> Enter 10 digits mobile number.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid Title";   
                }
                
            }
            else {
                $(this).parent('div').find(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        
        $("#formLogin").submit(function(e){
            if($('.error-li').length>0)
            {
                var result=$("<div>");
                result.html('<li class="error-li"> Fill Required fields first.</li>');
                result.css('color','red');
                return false; 
            }
            var status=true;
            var error_msz='';
            
            var contact_nod = $('input[name="contact"]'); 
            if(contact_nod.val().trim().length!==10)
            {
                contact_nod.parent().append('<li class="error-li" style="color:#d75d54;"> Enter 10 digits mobile number.</li>');
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