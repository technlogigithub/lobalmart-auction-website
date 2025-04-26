@extends('user.layout.master')
@section('title',"My Donation")
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
            padding: 0 0em;
            text-align: center;
            width:0em;
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
       *{
    margin: 0;
    padding: 0;
}
/*.rate {
    
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}*/

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
                        <div class="user">
                            <h2>Hello, <a href="#">{{ ucfirst($user->name) }}</a></h2>
                            <h5>Member since: {{ $user->created_at->format('d-m-Y') }}</h5>
                        </div>

                        <div class="favorites-user">
                            <div class="favorites">
                                <a href="#">{{ $total_post }}<small>Active Post</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->
                   <ul class="user-menu">
                        <li ><a href="{{ url('user/dashboard') }}">Profile</a></li>
                        <li  class="active"><a  href="{{ route('user.myDonation') }}">Active</a></li>
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

                <!-- <div class="close-account"> -->
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                            <div class="section recommended-ads">
                              <h2>All Active Post</h2>
                              <div class="appendText"></div>
                            </div>
                        </div><!-- my-ads -->
                <!-- </div>my-ads -->
                @include('user.layout.rightsidebar')			
            </div><!-- container -->
        </section><!-- delete-page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')


<script src="https://doncen.org/js/user/js/web.js"></script> 

<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

<script>

  $(document).ready(function() {
        
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

$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  function call_ajax(url,data){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        type        : 'POST',
        url         : url, // the url where we want to POST
        data        : {data: data},
        success: function(data){
            $('.appendText').html(data);
        }
    });
  }
  call_ajax("{{ URL::route('user.get.donationList')}}",0);
//   setInterval(function(){
//   call_ajax("{{ URL::route('user.get.donationList')}}",0);
// }, 10000);
});
</script>
@endpush