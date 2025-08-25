@extends('user.layout.master')
@section('title',"Dashboard")
@section('content')
<style type="text/css">
    /* START Datatable upload image css*/

    
.select_image_photo {
  position: relative;
  /*width: 50%;*/
  margin: auto;
}

.image_photo {
    display: block;
    width: 85px !important;
    height: 85px !important;
    border-radius: 50% !important; 
    /*margin-left: 15%;*/
    z-index: 1000;
    /*margin-top: 20px;*/
    /*border: 1px solid rgba(52,73,94,.44);*/
    padding: 1px;
    margin: auto;
}

.overlay_photo {
  /*border-radius: 50%;*/
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  /*background-color: #9fa4a4;*/
  overflow: hidden;
  /*width: 85px;*/
  height: 0;
  transition: .5s ease;
  /*opacity: 0.5;*/
  
}

.select_image_photo .overlay_photo {
  height: 20%;
}

.text_photo {
  white-space: nowrap; 
  color: #000000;
  font-size: 20px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

.upload_icon{
  cursor: pointer;
  font-size: 17px;
  color: #00a651;
}


/* END Datatable upload image css*/
</style>

<style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 225px;  /* The height is 225 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
       #cat_link{
          background: none!important;
          border: none;
          padding: 0!important;
          /*optional*/
          font-family: arial, sans-serif;
          /*input has OS specific font-family*/
          color: #fff;
          text-decoration: none;
          cursor: pointer;
       }
       #search_form1{
        display: inline-block;
       }
       .my .star-rating {
            display: flex;
            /*flex-direction: row-reverse;*/
            font-size: 2.5em;
            padding: 0 0.2em;
            text-align: center;
            width: 5em;
            display: flex;
            justify-content: space-between;
        }

        .my .star-rating input {
          display:none;
        }

        .my .star-rating label {
          color:#ccc;
          cursor:pointer;
        }

        .my .star-rating :checked ~ label {
          color:#f90;
        }

        .my .star-rating label:hover,
        .my .star-rating label:hover ~ label {
          color:#fc0;
        }

        /* explanation */

        .my article {
          background-color:#ffe;
          box-shadow:0 0 1em 1px rgba(0,0,0,.25);
          color:#006;
          font-family:cursive;
          font-style:italic;
          margin:4em;
          max-width:30em;
          padding:2em;
        }

    </style>
   <!-- delete-page -->


   <section id="main" class="clearfix delete-page">
            <div class="container">
                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Profile</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">My Profile</h2>
                </div><!-- banner -->
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                <div class="ad-profile section">	
                    <div class="user-profile">
                        <div class="user-images">
                            

                            <!-- <img src="{{URL::asset('/uploads/images/user.jpg')}}" alt="User Images" class="img-responsive"> -->
                                
                            <form class="form-horizontal file_upload"  method = "POST" enctype="multipart/form-data" >
                                <input type="hidden" name ="ukey" value='{{$user->key}}'>
                                <div class="select_image_photo" >
                                    <img src='{{USER_IMAGE($user->image)}}' class="image_photo">
                                    <!-- <span> <i class="fa fa-times "></i>  </span> -->
                                    <br>
                                    <div class="overlay_photo">
                                        <div class="text_photo"> 
                                            <label class="fa fa-pencil upload_icon">
                                                <input type="file" name="image_file" style="display:none;"   class="image_class">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="user" style="margin-top: 20px;">
                            <h2>Hello, <a href="#">{{ ucfirst($user->name) }}</a></h2>
                            <h5>Member since: {{ $user->created_at->format('d-m-Y') }}</h5>

                            

                        </div>

                        <div class="favorites-user">
                            <div class="favorites">
                                <a href="#">{{ $active_post }}<small>Active</small></a>
                            </div>
                            <div class="favorites">
                                <a href="#">{{ $completed_post }}<small>Completed</small></a>
                            </div>
                            <div class="favorites">
                                <a href="#">{{ $deleted_post }}<small>Deleted</small></a>
                            </div>
                            <div class="favorites">
                                <a href="#">{{ $expired_post }}<small>Expired</small></a>
                            </div>
                            <div class="favorites">
                                <a href="#">{{ $total_post }}<small>Total Post</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->
                   <ul class="user-menu">
                        <li  class="active"><a href="{{ url('user/dashboard') }}">Profile</a></li>
                        <li><a  href="{{ route('user.myDonation') }}">Active</a></li>
                        <!-- <li><a href="{{ route('user.pandingDonation')}}">Pending</a></li> -->
                        <li><a href="{{ route('user.urgent.requirement') }}">Urgent</a></li>
                        <li><a href="{{ route('user.complete.donation') }}">Completed</a></li>
                        <li><a href="{{ route('user.favoriateDonation')}}">Favorite</a></li>
                        
                        
                        <li class="fa fa-sign-out">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                            </a>
                         
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                     
                </div><!-- ad-profile -->		

                <div class="close-account">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 ">
                            <div class="delete-account section">
                                <form action="{{ route('user.update.profile' )}}" method="POST">
                                    <div class="profile-details section">
                                        <h2>Profile Details</h2>
                                        <!-- form -->
                                        {{ csrf_field() }}
                                        
                                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                            <label>Status</label>
                                            <select class="form-control" name="user_status">
                                                <option >Select Your Status</option>
                                                <option value="0" {{ $user->user_status == 0 ? "selected" : '' }}>Individual</option>
                                                <option value="1" {{ $user->user_status == 1 ? "selected" : '' }}>Organisation</option>
                                            </select>
                                            @if ($errors->has('blood_group'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('blood_group') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                            <label>Full Name</label>
                                            <input type="text" name="user_name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
                                            @if ($errors->has('user_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                            <label for="name-three">Mobile</label>
                                            <input type="text" class="form-control" name="mobile_no" value="{{ $user->contact }}" placeholder="Enter Contact no." readonly>
                                            @if ($errors->has('mobile_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                            <label>Calling Allowed</label>
                                            <select class="form-control" name="calling_allowed">
                                                <option >Select Your Status</option>
                                                <option value="1" {{ $user->calling_allowed === 1 ? "selected" : '' }}>Allowed</option>
                                                <option value="0" {{ $user->calling_allowed === 0 ? "selected" : '' }}>Not Allowed</option>
                                            </select>
                                            @if ($errors->has('blood_group'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('blood_group') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label>Email ID</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Your email" >
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="blood_groups_id">
                                                <option value="0">Select Your blood group</option>
                                                @foreach($blood_group as $bg)
                                                    @php
                                                        $selected = '';
                                                    @endphp
                                                    @if($bg->id == $user->blood_groups_id)
                                                        @php
                                                            $selected = 'selected';
                                                        @endphp
                                                    @endif
                                                    <option value="{{ $bg->id }}" {{ $selected }}>{{ $bg->blood_group }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('blood_group'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('blood_group') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        

                                            <label>Your Full Address</label>
                                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                <input type="hidden" name="latitude" id="text" value="">
                                                <input type="hidden" name="longitude" id="text" value="">
            
                                                <input type="text" id="searchTextField" name="city" class="form-control" value="{{ $user->address }}" placeholder="Select full address" id="city_search_box">
                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>	
                                    	<div class="text-center"><button class="btn btn-primary " type="submit">update Profile</button></div>														
                                    </div><!-- profile-details -->
                                </form> 

                                <form action="{{ route('user.change.password' )}}" method="POST">
                                    <div class="change-password section">
                                        <h2>Change PIN</h2>
                                         {{ csrf_field() }}
                                        <!-- <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                            <label>Old PIN</label>
                                            <input type="password" name="old_password" class="form-control" >
                                            @if ($errors->has('old_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old_password') }}</strong>
                                                </span>
                                            @endif
                                        </div> -->

                                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                            <label>New PIN</label>
                                            <input id="password" pattern="[0-9]*" inputmode="numeric" type="password" class="form-control" name="new_password" placeholder="PIN (4 Digits only)" maxlength="4" minlength="3"  onkeypress="return isnumber(event)">

                                            <!-- <input type="password"  id="password" name="new_password" class="form-control" onkeypress="return isnumber(event)" maxlength="4" minlength="3"> -->	
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            @if ($errors->has('new_password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new_password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm PIN</label>
                                            <input id="cppassword" type="password" pattern="[0-9]*" inputmode="numeric" class="form-control" name="new_password_confirmation" placeholder="Confirm PIN" maxlength="4" minlength="3" onkeypress="return isnumber(event)">

                                            <!-- <input type="password" id="cppassword" name="new_password_confirmation" class="form-control" onkeypress="return isnumber(event)" maxlength="4" minlength="3"> -->

                                            <span toggle="#cppassword" class="fa fa-fw fa-eye field-icon toggle-password1"></span>

                                        </div>	
                                        <div class="text-center"><button class="btn btn-primary" type="submit">Change PIN</button></div>														
                                    </div>
                               </form>  
                               <!-- <form action="{{ route('user.change.submitOtp')}}" method="POST" style="display: none"> -->
                                    <div class="change-password section otp_div" style="display: none">
                                        <h2>Enter OTP</h2>
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('otp') ? ' has-error' : '' }}">
                                            <label>OTP has been sent on your NEW mobile number</label>
                                            <!-- <input type="text" name="otp" class="form-control otp" > -->

                                            <input id="otp" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control otp" placeholder="Enter OTP" name="otp"  value="{{ old('otp') }}" onkeypress="return isnumber(event)"  maxlength="4">
                                            
                                                <div id="otp-error-message" style="color: red; display: none;"></div>

                                            @if ($errors->has('otp'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('otp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-center"><button class="btn btn-primary" type="submit" onclick="submitotp()">Submit OTP
                                        </button></div>														
                                    </div>
                               <!-- </form>   -->
                               <!-- <form action="{{ route('user.change.contact')}}" method="POST"> -->
                                    <div class="change-password section mobile-num-div">
                                        <h2>Change mobile number</h2>
                                         {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label>New mobile number</label>
                                            <input type="text" name="mobile" onkeypress="return isnumber(event)" maxlength="10" class="form-control mobile-number" placeholder="Enter new mobile number" >
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-center"><button class="btn btn-primary" type="submit" onclick="submitmobilenumber()">Update Mobile Number
                                        </button></div>														
                                    </div>
                               <!-- </form> -->
                               
                            </div>
                        </div><!-- delete-account -->
                         @include('user.layout.rightsidebar')			
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section><!-- delete-page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<script src="{{ URL::asset('/js/user/js/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/js/user/js/jquery-ui.min.js')}}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ&callback=initMap" type="text/javascript"></script>


<!-- <script type="text/javascript">
    $(document).ready(function() {
      
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


        $("#formDonation").submit(function(e){

            function user_img(){
                $('.mobile-num-div').css({ 'display' : 'none'});
                $('.otp_div').css({ 'display' : 'block'});
                var mobile = $('.mobile-number').val();
                 $.ajax({
                    type: 'POST',
                    url: "{{ route('user.change.contact')}}", // the url where we want to POST
                    data: {mobile: mobile},
                    success: function(data){
                        
                    }
                });
            }
        });

        $(document).on('change','.image_class',function(e){

            alert('Photo'); 

           e.preventDefault();  

                var td = $(this).closest("td");

                var parentTD = td.parent();

                var url = "{{ route('user.change.contact')}}";

                var form = $(this).closest("form").get(0);

                   $.ajax({

                       type: "POST",

                       url: url,

                       data: new FormData(form),

                       mimeType: "multipart/form-data",

                       contentType: false,

                       cache: false,

                       dataType: "html",

                       processData: false,

                       success: function(data) {

                            alert("Upload Image Successful.");

                             // $('#show_data_in_table').DataTable().ajax.reload(null, false);

                             location.reload(true);

                       }



                    });

        });
    });

    // var placeSelected = true;

    
   function initMap() {
      var input = document.getElementById('searchTextField');
      var options = {
            types: ['establishment'],
            componentRestrictions: {
                country: 'in'
            } //this should work !
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(); 
            //https://developers.google.com/maps/documentation/javascript/reference/places-service#PlaceResult
            // alert(place.formatted_address);  
            
            // if (!place.geometry) {
            //   alert("User did not select a prediction; input is: " + input.value);
            //   placeSelected = false;
            //   return;
            // }
            // else
            // {
            //     placeSelected = true;
            //     alert("User selected: " + place.formatted_address);
            // }



            $('input[name="latitude"]').val(place.geometry.location.lat());  // Lat Long
            $('input[name="longitude"]').val(place.geometry.location.lng());  // Lat Long
            

            var value = document.getElementById('searchTextField').value;
            
            

            var text_=$(this);
            // var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            var location = new RegExp('/^([^,]+,){3}[^,]+$/');
            
                
            
            // if(value.length < 15 || location.test(value) == false)
            if (!place.geometry)
            {
                placeSelected = false;

                if($(input).parent().children(".error-li").length<1)
                {
                    $(input).parent().append('<li class="error-li"> Type and select location from list</li>');
                    $(input).css({"border": "1px solid #d75d54"});
                    from_error['searchTextField']="Invalid Donation Address";
                }
            }
            else 
            {
                
                placeSelected = true;

                $(input).next(".error-li").remove();
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});
            }

            

        });
   }
    // google.maps.event.addDomListener(window, 'load', initialize);
</script> -->


<script type="text/javascript">
    $(document).ready(function() {
      
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


        $(document).on('change','.image_class',function(e){
            // alert();
            e.preventDefault();  
            
            var url = "{{ route('user.update.image')}}";
            var form = $(this).closest("form").get(0);

            // console.log(form);

            $.ajax({
                type: "POST",
                url: url,
                data: new FormData(form),
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                dataType: "html",
                processData: false,
                success: function(data) {
                    
                    // console.log(data);

                    // alert("Upload Image Successful.");
                    location.reload(true);
                }
            });
        });
    });

    var placeSelected = true;
    
    function initMap() {
        var input = document.getElementById('searchTextField');
        var options = {
            types: ['establishment'],
            componentRestrictions: {
                country: 'in'
            } 
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace(); 
            if (!place.geometry) {
                placeSelected = false;
                if($(input).parent().children(".error-li").length<1)
                {
                    $(input).parent().append('<li class="error-li"> Type and select location from list</li>');
                    $(input).css({"border": "1px solid #d75d54"});
                    from_error['searchTextField']="Invalid Donation Address";
                }
            }
            else 
            {
                placeSelected = true;
                $(input).next(".error-li").remove();
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});
                $('input[name="latitude"]').val(place.geometry.location.lat());  // Lat Long
                $('input[name="longitude"]').val(place.geometry.location.lng());  // Lat Long
            }
        });
    }
    // google.maps.event.addDomListener(window, 'load', initMap);
</script>


<script type="text/javascript">
    
    var from_error={};
    $(function(){
        $('input[name="user_name"]').on('keyup',function(){
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
        
        $('input[name="city"]').bind('keyup change',function(){
            var text_=$(this);
            // var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            var location = new RegExp('/^([^,]+,){3}[^,]+$/');
            
            // alert('Keyup');

            // if (!placeSelected) {
            //   alert("THIS User input is not from the suggestions list: " + $(this).val());
            // } else {
            //   placeSelected = false; // Reset for the next input
            //   alert('FALSE');
            // }

            // if(text_.val().length>0 && (text_.val().length<15 || location.test(text_.val()) == false))
            if(!placeSelected)
            {
                
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Type and select location from list</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid address";
                }
            }
            else {
                
                placeSelected = false;

                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $('input[name="mobile"]').on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length>0 && text_.val().length!==10)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> Invalid Number. Enter 10 digits mobile number.</li>');
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
        $("input[name='new_password']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val().length>0 && text_.val().length!==4)
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> PIN must have 4 digits.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Invalid Password";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        $("input[name='new_password_confirmation']").on('keyup',function(){
            var text_=$(this);
            
            if(text_.val()!=$("input[name='new_password']").val())
            {
                if($(this).parent().children(".error-li").length<1)
                {
                    text_.parent().append('<li class="error-li"> PIN not matched.</li>');
                    $(this).css({"border": "1px solid #d75d54"});
                    from_error['text']="Password missmatch";
                }
            }
            else {
                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});
            }
        });
        

    });
</script>

<script>

function submitmobilenumber(){
    $('.mobile-num-div').css({ 'display' : 'none'});
    $('.otp_div').css({ 'display' : 'block'});
    var mobile = $('.mobile-number').val();
     $.ajax({
        type: 'POST',
        url: "{{ route('user.change.contact')}}", // the url where we want to POST
        data: {mobile: mobile},
        success: function(data){
            
        }
    });
}

// function submitotp(){
//      $('.mobile-num-div').css({ 'display' : 'block'});
//     $('.otp_div').css({ 'display' : 'none'});
//     var otp = $('.otp').val();
//      $.ajax({
//         type: 'POST',
//         url: "{{ route('user.change.submitOtp')}}", // the url where we want to POST
//         data: {otp: otp},
//         success: function(data){
//             window.location.reload();
//         }
//     });
// }

function submitotp() {
    var otp = $('.otp').val();
    $.ajax({
        type: 'POST',
        url: "{{ route('user.change.submitOtp')}}", // the url where we want to POST
        data: { otp: otp, _token: "{{ csrf_token() }}" }, // include CSRF token if needed
        success: function(data) {
            if(data.success) {
                window.location.href = "{{ route('user.home') }}";
            } else {
                $('#otp-error-message').text(data.message).show();
            }
        },
        error: function(xhr) {
            var response = JSON.parse(xhr.responseText);
            if(response.errors) {
                $('#otp-error-message').text(response.errors.otp[0]).show();
            } else {
                $('#otp-error-message').text('An unexpected error occurred. Please try again.').show();
            }
        }
    });
}

 
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  function call_ajax(url,data){
        $.ajax({
        type        : 'POST',
        url         : url, // the url where we want to POST
        data        : {data: data},
        success: function(data){
            $('.appendText').html(data);
        }
    });
  }
  setInterval(function(){
  call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",0);
}, 10000);

  // $("#city_search_box").autocomplete({
  //   source: function(request, response) {
  //       $.ajaxSetup({
  //               headers: {
  //                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //               }
  //          });
  //           $.ajax({
  //               type: "POST",
  //               url: "{{ route('home.search.city') }}",
  //               dataType: "json",
  //               data: {
  //                   city : request.term
  //               },
  //               success: function(data) {
  //                   response(data);
  //               }
  //           });
  //       },
  //   minLength: 2,
  // });
  
});
</script>
@endpush