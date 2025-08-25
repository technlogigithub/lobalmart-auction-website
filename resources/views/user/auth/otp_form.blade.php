@extends('user.layout.master')
@section('title','OTP Verification')
<!-- Main Content -->
@section('content')

<div class="breadcrumb-section mb-20" style="background-image: url('{{ asset("uploads/inner_pages/breadcrumb-bg7.png") }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content">
                    <h4>OTP Verification 12</h4>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('web.home') }}">Home</a></li>
                        <li>OTP Verification</li>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.login.otpSubmit',$user_identity) }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 mb-20">
                                <div class="form-floating {{ $errors->has('contact') ? ' has-error' : '' }}">
                                    <input id="key" type="hidden" name="key" value="{{$user_identity}}">
                                    <input id="key" type="hidden" name="contact" value="{{$user->contact}}">
                                    
                                    <input type="text" id="otp" class="form-control" pattern="[0-9]*" inputmode="numeric" placeholder="Enter OTP" name="otp"  value="{{ old('otp') }}" onkeypress="return isnumber(event)" autofocus>
                                    <label for="otp">Enter OTP</label>


                                    <a style="color:green;" href="{{ URL::to('user/resend/otp') }}/{{$user_identity}}">Resend OTP</p>
                                        @if ($errors->has('otp'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('otp') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <div class="form-inner text-center">
                                    <button class="primary-btn btn-hover" type="submit"> Verify <span></span></button>
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
