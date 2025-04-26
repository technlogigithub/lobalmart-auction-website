<!DOCTYPE html>
<html lang="en">
 
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <?php
            $currentURL = URL::current();

            // print_r(strpos($currentURL, 'donation-post-detail'));
            // die();
            
            if (strpos($currentURL, 'donation-post-detail') > 0) {
                
                // $basic_url = strstr($currentURL, '.org/', true);


                $basic_url = URL::to('/');

                $image_folder = '/images/uploads/donation_post/';
                
                $full_image_url = $basic_url.$image_folder;


                if(!empty($donation_images_main->image))
                {
                  $donation_post_img = $full_image_url.$donation_images_main->image;
                }  
                else
                {
                  $donation_post_img = $basic_url.'/doncen-logo.jpg';
                }


                $dontaion_post->address;
                // $location =  $city->name.', '.$state->name.', '.$country->name;

                // $donation = $spectification->name.' '.$subcategory->name;

                $donation = $category->name;    
                                        
                    if(strpos($user_type->name, 'Donor') !== false)
                    {
                        $position = 'available';
                    }
                    elseif(strpos($user_type->name, 'Donee') !== false)
                    {
                        $position = 'required';
                    }
                    else
                    {
                        $position = '';
                    }

                    // $heading = $donation.' '.$dontaion_post->title.' '.$position;
                    $heading = $dontaion_post->title;

                    // $location = $spectification->name.' '.$subcategory->name.' in '.$city->name;                    
                    $location = $dontaion_post->address;                    



              $show =  '<meta property="og:type"          content="website" />
                
                <meta property="og:image"         content="'.$donation_post_img.'" />
                <meta property="og:image:width"   content="1024" />
                <meta property="og:image:height"  content="512" />
                
                <!-- Whatsapp -->
                <meta property="og:title"         content="'.$heading.'" />
                
                <meta property="og:description"   content="'.$location.'" />
                <meta property="og:url"           content="'.$currentURL.'" />

                <meta property="instagram:image"         content="'.$donation_post_img.'" />
                <meta property="instagram:image:width"   content="1080" />
                <meta property="instagram:image:height"  content="1080" />

                <meta property="fb:app_id" content="966242223397117" />

                <!-- <meta name="twitter:card" content="summary_large_image"> -->
                <meta name="twitter:card" content="summary">
                <meta name="twitter:image" content="'.$donation_post_img.'">
                <meta name="twitter:title" content="'.$heading.'">
                <meta name="twitter:description" content="'.$location.'">
                <meta name="twitter:url" content="'.$currentURL.'">

                <!-- @username for the website used in the card footer. -->
                <meta name="twitter:site" content="@Doncen">

                <!-- @username for the content creator / author. -->
                <meta name="twitter:creator" content="@Doncen">

                
                <!-- For Google -->
                <meta name="author" content="Gaurav Parwal" />
                <meta name="application-name" content="Lobal Mart" />
                <meta name="copyright" content="www.lobalmart.com" />
                <meta name="title" content="Lobal Mart | Local Auction in Global Market" />

                <meta name="description" content="Sell / Buy anything via local auction in global market with Lobal Mart. Our online auction platform makes it easy to list and complete your auction via Bid.">

                <title>'.$heading.' at '.$location.'</title>

                ' ;
            }
            else
            {
              $show =  '<meta property="og:type"          content="website" />
                <meta property="og:image"         content="https://www.doncen.org/doncen-logo.jpg" />
                <meta property="og:image:width"   content="1024" />
                <meta property="og:image:height"  content="512" />
                <meta property="og:title"         content="Lobal Mart" />
                <meta property="og:description"   content="Local Auction in Global Market" />
                <meta property="og:url"           content="https://www.lobalmart.com" />
                <meta property="fb:app_id" content="XXXXXXXXXXXXXXX" />

                <meta property="instagram:image"         content="https://www.doncen.org/doncen-logo.jpg" />
                <meta property="instagram:image:width"   content="1080" />
                <meta property="instagram:image:height"  content="1080" />

                <meta name="twitter:card" content="summary">
                <meta name="twitter:image" content="https://www.doncen.org/doncen-logo.jpg">
                <meta name="twitter:title" content="Lobal Mart">
                <meta name="twitter:description" content="Local Auction in Global Market">
                <meta name="twitter:url" content="https://www.lobalmart.com">

                <!-- For Google -->
                <meta name="author" content="Gaurav Parwal" />
                <meta name="application-name" content="Lobal Mart" />
                <meta name="copyright" content="www.lobalmart.com" />
                <meta name="title" content="Local Auction in Global Market" />
                
                <meta name="description" content="Sell / Buy anything via local auction in global market with Lobal Mart. Our online auction platform makes it easy to list and complete your auction via Bid.">


                
                <meta name="keywords" content="Lobal Mart is the new era of marketplace which is running online on www.lobalmart.com i.e. largest online marketplace including Auction. Here, you may buy or sell / supply anything at any time any where world wide. You may become a Buyer , Buying Agent , Seller / Supplier , Selling / Supplying Agent. You can buy or sell / supply anything which might be related to goods, services or more like related to Raw Material , Finished Product , Scrap of Metal , Paper , Plastic , e-Waste , Agriculture products , Construction Item , Land / Building , Shipping / Transportation / Vehicle , Fashion , Antiques , Vehicle / Automotive , Advertisement , Household , Machinery , Startup Company , Music , Digital Art , Books / Comics , Instruments , Toys & Games , Old Currency , Services and many more...">

                <title>Lobal Mart | Local Auction in Global Market</title>

                ' ;
            }
                // <meta name="description" content="Lobal Mart is the new era of marketplace which is running online on www.lobalmart.com i.e. largest online marketplace including Auction. Here, you may buy or sell / supply anything at any time any where world wide. You may become a Buyer , Buying Agent , Seller / Supplier , Selling / Supplying Agent. You can buy or sell / supply anything which might be related to goods, services or more like related to Raw Material , Finished Product , Scrap of Metal , Paper , Plastic , e-Waste , Agriculture products , Construction Item , Land / Building , Shipping / Transportation / Vehicle , Fashion , Antiques , Vehicle / Automotive , Advertisement , Household , Machinery , Startup Company , Music , Digital Art , Books / Comics , Instruments , Toys & Games , Old Currency , Services and many more...">

            echo $show;
        ?>
        
        
        <!-- <title>@yield('title')</title> -->

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Lobal Mart">
        <meta name="msapplication-TileImage" content="{{ URL::asset('/uploads/images/favicon.png')}}">
        
        <link rel="apple-touch-icon" href="{{ URL::asset('/uploads/images/favicon.png')}}">
        


        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/bootstrap-icons.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/jquery.fancybox.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/boxicons.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/css/style.css')}}">
        

        <!--favicon-->
        <link rel="icon" href="{{ URL::asset('/uploads/images/favicon.png')}}" type="image/png" sizes="20x20">
        <!--/favicon-->
        
        <!-- <link rel="manifest" href="manifest.webmanifest"> -->
        <link rel="manifest" href="{{ URL::asset('manifest/manifest.json')}}">
        
        
    </head>
    <body id="body">
    @include('user.layout.header')
       @yield('content')
    @include('user.layout.footer')

    <div>
        
        <button class="add-button" id="addToHomescreen" style="margin: auto; position: fixed; bottom: 0px;  padding: 20px; width: 100%; background: #0072bc; color: #ffffff; border: 0px; z-index: 4;"></span> Doncen Add to home screen</button>
    </div>

    
      <span id="enableNotifications"></span>
      
      <!-- <div>
        <div id="token"></div>
        <div id="err"></div>
      </div> -->
        

        <script src="{{ URL::asset('/js/user/js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/popper.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/swiper-bundle.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/slick.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/waypoints.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/jquery.fancybox.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/wow.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/jquery.marquee.min.js')}}"></script>
        <script src="{{ URL::asset('/js/user/js/main.js')}}"></script>

		<script src="{{ URL::asset('/js/user/js/range-slider.js')}}"></script>

        
        <script src="{{ URL::asset('/js/user/js/custom.js')}}"></script> 
       
      
       <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116748240-1"></script>
        


        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-116748240-1');
        </script>


        <!-- <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js"></script> -->
        
        

        <script type="module" src="{{ URL::asset('pwa.js')}}"></script>
        <script type="module" src="{{ URL::asset('sw.js')}}"></script>
        
       <!--  <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
            import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging.js";
        </script>    -->     

        <!-- <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
            import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries

            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
                apiKey: "AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ",
                authDomain: "doncen-1.firebaseapp.com",
                projectId: "doncen-1",
                storageBucket: "doncen-1.appspot.com",
                messagingSenderId: "741021253190",
                appId: "1:741021253190:web:569722f8de9679f5ffd447"

            };

            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const messaging = getMessaging(app);

            // navigator.serviceWorker.register("{{ URL::asset('sw.js')}}")
            //   .then(registration => {
            //     // Registration was successful
            //     alert('Yes');
            //   })
            //   .catch(error => {
            //     // Registration failed
            //     console.error('Service Worker registration failed:', error);
            //   });


            navigator.serviceWorker.register("{{ URL::asset('sw.js')}}").then(registration => {
                getToken(messaging, {
                    serviceWorkerRegistration: registration,
                    vapidKey: 'BLic6t4EY9gjuRy-zNvjz9cTqFlNE2OjS9cHKlLLmOYExtjdxWNi3XXS2rGVLPX-EjnOEPNvjft_mh8MAl-TSEs' }).then((currentToken) => {
                    if (currentToken) {
                        console.log("Token is: "+currentToken);
                        // Send the token to your server and update the UI if necessary
                        // ...
                    } else {
                        // Show permission request UI
                        console.log('No registration token available. Request permission to generate one.');
                        // ...
                    }
                }).catch((err) => {
                    console.log('An error occurred while retrieving token. ', err);
                    // ...
                });
            });



        </script> -->




<!-- Location permission -->
        <script type="text/javascript">

            if(navigator.geolocation) 
            {
                navigator.geolocation.getCurrentPosition(function(position) {
                var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var accuracy = position.coords.accuracy;

                
                document.cookie = "lt=" + latitude;
                document.cookie = "lg=" + longitude;
                document.cookie = "accu=" + accuracy;

                
                });


                // to send location data to google analytics 
                navigator.geolocation.getCurrentPosition(sendPosition, showError);

            }
                
            else 
            {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }



            // to send location data to google analytics
            function sendPosition(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;



                // Send the location data to Google Analytics as an event
                gtag('event', 'location', {
                    'event_category': 'Geolocation',
                    'event_label': 'User Location',
                    'value': 1,
                    'latitude': latitude,
                    'longitude': longitude
                });

                // console.log("Latitude: " + latitude + ", Longitude: " + longitude);
            }

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        console.log("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        console.log("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        console.log("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        console.log("An unknown error occurred.");
                        break;
                }
            }


            // alert(latitude);
            // alert(longitude);




        </script>

        
    
<script type="text/javascript">
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
    $(".toggle-password1").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

</script>
        <script type="text/javascript">
            // window.oncontextmenu = function () {
            //     return false;
            // }
            // $(document).keydown(function (event) {
            //     if (event.keyCode == 123) {
            //         return false;
            //     }
            //     else if (
            //                 (event.ctrlKey && event.shiftKey && event.keyCode == 73) || 
            //                 (event.ctrlKey && event.shiftKey && event.keyCode == 74) ||
            //                 (event.ctrlKey && event.keyCode == 85)
            //              ) 
            //             {
            //                 return false;
            //             }
            // });

            $(document).ready(function() {
              // Get the input and span elements
              let input = $('input[name="city_search_box"]').val();
              let span = $('.location_display');

              // alert(input);
              // Check if the input and span elements exist
              if (input.length === 0 || span.length === 0) {
                console.error("Location not found");  
              } else {
                // Add an event listener to the input field
                span.text(input);

              }
            });
        </script>
          <script> 
    function isnumber(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script> 

        @stack('javaScript')
        
    </body>
</html>

