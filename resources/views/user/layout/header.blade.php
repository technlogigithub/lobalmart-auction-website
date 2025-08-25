    <div class="circle-container five">
        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.03516 0.416666L7.03516 15H8.28516L8.28516 0.416666H7.03516Z" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.28516 1.04115C8.28516 3.98115 5.70016 6.38281 2.94349 6.38281H2.31849V5.13281H2.94349C5.03599 5.13281 7.03516 3.26448 7.03516 1.04115V0.416979H8.28516V1.04115Z" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.03333 1.04115C7.03333 3.98115 9.61833 6.38281 12.375 6.38281H13V5.13281H12.375C10.2817 5.13281 8.28333 3.26448 8.28333 1.04115V0.416979H7.03333V1.04115Z" />
            </g>
        </svg>
    </div>
        
    @php
        

        // Sessiondata come from CategoryController >> searchCategory
        
        if(isset($Sessiondata))
        {
            $Sessiondata;
        }
        else
        {

            $Sessiondata = session()->get('search');
        }
        // echo "<pre>";
        // print_r($Sessiondata);
        // die();
    
    @endphp


        @if($Sessiondata)  

          @php

            for ($i=0; $i < count($Sessiondata); $i++) 
            { 
                
                if(!empty($Sessiondata[$i]))
                {
                    $homeCity = !empty($Sessiondata[$i]['city_search_box']) ? $Sessiondata[$i]['city_search_box'] : '';
                    $homeCategory = !empty($Sessiondata[$i]['category_box']) ? $Sessiondata[$i]['category_box'] : '';
                    $homeword = !empty($Sessiondata[$i]['word_box']) ? $Sessiondata[$i]['word_box'] : '';

                    if (!empty($Sessiondata[$i]['search_latitude'])) {
                    $search_latitude = $Sessiondata[$i]['search_latitude'];
                    $search_longitude = $Sessiondata[$i]['search_longitude'];
                    $search_location = $Sessiondata[$i]['city_search_box'];

                    } 
                    else if(!empty($Sessiondata[$i]['clt'])){
                    $search_latitude = $Sessiondata[$i]['clt'];
                    $search_longitude = $Sessiondata[$i]['clg'];
                    $search_location = $Sessiondata[$i]['cloc'];
                    }
                    else{
                    $search_latitude = '';
                    $search_longitude = '';
                    $search_location = '';
                    }
                }
            }

            // echo 'search_latitude - '.$search_latitude;
            //         echo 'search_longitude - '.$search_longitude;
            //         echo 'search_location - '.$search_location;

            // die();
          @endphp
            

        @else

          @php

           
            $homeCity = '';
            $homeCategory = '';
            $homeword = '';
            $search_latitude = !empty($Sessiondata[0]['clt']) ? $Sessiondata[0]['clt'] : '';
            $search_longitude = !empty($Sessiondata[0]['clg']) ? $Sessiondata[0]['clg'] : '';
            $search_location = !empty($Sessiondata[0]['cloc']) ? $Sessiondata[0]['cloc'] : '';
          @endphp

        @endif

        
    <div class="header-topbar-area two">
        <div class="topbar-area style-6">
            <div class="container">
                <div class="topbar-wrap">
                    <div class="topbar-left">
                        <ul class="contact-area">
                            <li>
                                
                                <div  class="nav-right d-flex justify-content-between">
                                    <svg width="19" height="25" viewBox="0 0 19 25" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.5849 13.8806C14.7868 15.4404 13.7053 16.9944 12.5995 18.3897C11.5505 19.7051 10.4289 20.9652 9.23947 22.1644C8.05002 20.9652 6.92838 19.7051 5.87941 18.3897C4.7736 16.9944 3.69217 15.4404 2.89404 13.8806C2.08677 12.3047 1.62373 10.8286 1.62373 9.5625C1.62373 7.61482 2.4261 5.7469 3.85433 4.36968C5.28256 2.99246 7.21965 2.21875 9.23947 2.21875C11.2593 2.21875 13.1964 2.99246 14.6246 4.36968C16.0528 5.7469 16.8552 7.61482 16.8552 9.5625C16.8552 10.8286 16.3907 12.3047 15.5849 13.8806ZM9.23947 24.25C9.23947 24.25 18.3784 15.8987 18.3784 9.5625C18.3784 7.22528 17.4155 4.98379 15.7016 3.33112C13.9878 1.67846 11.6633 0.75 9.23947 0.75C6.81569 0.75 4.49118 1.67846 2.7773 3.33112C1.06343 4.98379 0.100586 7.22528 0.100586 9.5625C0.100586 15.8987 9.23947 24.25 9.23947 24.25Z" />
                                        <path d="M9.24132 12.5C8.43339 12.5 7.65855 12.1905 7.08726 11.6396C6.51597 11.0887 6.19502 10.3416 6.19502 9.5625C6.19502 8.78343 6.51597 8.03626 7.08726 7.48537C7.65855 6.93449 8.43339 6.625 9.24132 6.625C10.0492 6.625 10.8241 6.93449 11.3954 7.48537C11.9667 8.03626 12.2876 8.78343 12.2876 9.5625C12.2876 10.3416 11.9667 11.0887 11.3954 11.6396C10.8241 12.1905 10.0492 12.5 9.24132 12.5ZM9.24132 13.9688C10.4532 13.9688 11.6155 13.5045 12.4724 12.6782C13.3293 11.8519 13.8108 10.7311 13.8108 9.5625C13.8108 8.39389 13.3293 7.27314 12.4724 6.44681C11.6155 5.62048 10.4532 5.15625 9.24132 5.15625C8.02943 5.15625 6.86717 5.62048 6.01023 6.44681C5.1533 7.27314 4.67188 8.39389 4.67188 9.5625C4.67188 10.7311 5.1533 11.8519 6.01023 12.6782C6.86717 13.5045 8.02943 13.9688 9.24132 13.9688Z" />
                                    </svg>  
                                    <!--                                 &nbsp; {{$search_location}} -->


                                    <div class="text-slider-section-location">
                                        <div class="marquee">
                                            <div class="marquee__group">
                                                <span class="location_display">
                                                </span>

                                            </div>

                                        </div>

                                    </div>
                                
                                    <header class="header-area style-1 three d-flex flex-nowrap align-items-center justify-content-between" style="margin-left: 10px;">
                                        <div class="nav-right d-flex jsutify-content-end align-items-center">
                                            <!-- <form class="d-xl-flex d-none search_form" method="post" id="search_form" action="#" autocomplete="off">
                                                <div class="form-inner">
                                                    

                                                    <input type="hidden" name="search_latitude" id="lat" value="{{$search_latitude}}">
                                                    <input type="hidden" name="search_longitude" id="lon" value="{{$search_longitude}}">

                                                    <input type="text" id="searchTextField" name="city_search_box" class="city_search_box" value="{{$search_location}}" placeholder="Enter Location" id="city_search_box">

                                                    <button class="search-btn"><i class="bi bi-search"></i></button>
                                                </div>
                                            </form> -->
                                            <!-- <div class="search-bar d-xl-none d-lg-block d-none"> -->
                                            <div class="search-bar">
                                                <div class="search-btn"><i class="bi bi-search"></i></div>
                                                <div class="search-input">
                                                    <div class="search-close"></div>
                                                    <form method="post" id="location_search_form" class="location_search_form"  action="{{ url('/donation-near-me/dd-1')}}">

                                                        <div class="search-group">
                                                            <div class="form-inner2">
                                                                <!-- <input type="text" placeholder="Enter Location 2..."> -->
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="search_latitude" id="lat" value="{{$search_latitude}}">
                                                                <input type="hidden" name="search_longitude" id="lon" value="{{$search_longitude}}">

                                                                <input type="text" id="searchTextField1" name="city_search_box" class="city_search_box" value="{{$search_location}}" placeholder="Enter Location" id="city_search_box">

                                                                <button type="submit">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67458 2.95934C5.06925 2.95934 2.95925 5.06868 2.95925 7.66868C2.95925 10.2687 5.06925 12.3773 7.67458 12.3773C8.97459 12.3773 10.1499 11.8533 11.0033 11.004C11.4434 10.5674 11.7926 10.0477 12.0307 9.47524C12.2687 8.90273 12.3908 8.28869 12.3899 7.66868C12.3899 5.06868 10.2799 2.95934 7.67458 2.95934ZM1.33325 7.66868C1.33325 4.16868 4.17325 1.33334 7.67458 1.33334C11.1759 1.33334 14.0159 4.16868 14.0159 7.66868C14.0178 9.07185 13.5516 10.4356 12.6913 11.544L14.4279 13.2787C14.5084 13.353 14.573 13.4427 14.618 13.5426C14.6629 13.6424 14.6872 13.7503 14.6894 13.8598C14.6916 13.9693 14.6717 14.0781 14.6309 14.1797C14.59 14.2813 14.5291 14.3736 14.4517 14.4511C14.3743 14.5286 14.2821 14.5896 14.1805 14.6306C14.079 14.6716 13.9702 14.6916 13.8607 14.6895C13.7512 14.6874 13.6433 14.6632 13.5434 14.6184C13.4435 14.5736 13.3536 14.5091 13.2793 14.4287L11.5393 12.6913C10.4316 13.544 9.07244 14.0054 7.67458 14.0033C4.17325 14.0033 1.33325 11.168 1.33325 7.66868Z" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            

                                                
                                            
                                            
                                        </div>
                                    </header>


                                    <!-- <form method="post" id="search_form" class="search_form" action="#" autocomplete="off">
                  
                                        <input type="hidden" name="search_latitude" id="lat" value="{{$search_latitude}}">
                                        <input type="hidden" name="search_longitude" id="lon" value="{{$search_longitude}}">

                                        <input type="text" id="searchTextField" name="city_search_box" class="city_search_box" value="{{$search_location}}" placeholder="Enter Location" id="city_search_box">
                                          
                                      

                                        <button type="submit" class="search_btn"  value="Search"><i class="bx bx-search"></i></button>
                                    </form> -->
                                </div>
                                    
                            </li>
                            
                        </ul>
                    </div>
                    <div class="topbar-right">
                        <ul>
                            <li><a href="how-to-buy.html">HOW TO BID</a></li>
                            <li><a href="how-to-sell.html">SELL YOUR ITEM</a></li>
                            <li><a href="{{ route('web.donation.category') }}">POST YOUR AUCTION</a></li>
                        </ul>
                        <!-- <div class="language-area">
                            <div class="language-btn"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0586 2.97675H9.09784L8.89361 1.34033C8.79596 0.551157 8.23314 0 7.5249 0H1.54451C0.788176 0 0.172852 0.615324 0.172852 1.37166V13.2157C0.172852 13.9721 0.788176 14.5874 1.54451 14.5874H6.17805V16.2317C6.17805 17.2067 6.97177 18 7.94736 18H16.0586C17.0336 18 17.8269 17.2067 17.8269 16.2317V4.74606C17.8269 3.77043 17.0336 2.97675 16.0586 2.97675ZM0.683089 13.2157V1.37163C0.683089 0.896624 1.06951 0.510202 1.54451 0.510202H7.5249C8.04148 0.510202 8.33404 0.972998 8.38727 1.40322L9.969 14.0771H1.54451C1.06951 14.0771 0.683089 13.6907 0.683089 13.2157ZM6.68829 16.2317V14.5873H9.62156L7.01557 17.0769C6.81232 16.8534 6.68829 16.5568 6.68829 16.2317ZM17.3166 16.2317C17.3166 16.9254 16.7523 17.4898 16.0586 17.4898H7.94736C7.77115 17.4899 7.59691 17.4528 7.43603 17.3809L10.4341 14.5167L10.434 14.5165C10.4392 14.5116 10.4444 14.5066 10.4492 14.5011C10.4731 14.474 10.491 14.4421 10.5017 14.4075C10.5124 14.373 10.5156 14.3365 10.5111 14.3007L9.16154 3.48695H16.0586C16.7523 3.48695 17.3166 4.05177 17.3166 4.74606V16.2317ZM16.0761 8.71128C16.0761 8.77894 16.0492 8.84383 16.0014 8.89167C15.9536 8.93951 15.8887 8.96639 15.821 8.96639H14.9616C14.9553 9.12067 14.9426 9.27463 14.9235 9.42787C14.7953 10.4171 14.4029 11.3485 13.8174 12.0605C14.2853 12.5042 14.8142 12.7468 15.3252 12.7468C15.3929 12.7468 15.4578 12.7736 15.5056 12.8215C15.5535 12.8693 15.5803 12.9342 15.5803 13.0019C15.5803 13.0695 15.5535 13.1344 15.5056 13.1823C15.4578 13.2301 15.3929 13.257 15.3252 13.257C14.6686 13.257 14.021 12.9508 13.4725 12.4333C12.9099 12.9674 12.2625 13.257 11.6151 13.257C11.5475 13.257 11.4826 13.2301 11.4348 13.1823C11.3869 13.1344 11.36 13.0695 11.36 13.0019C11.36 12.9342 11.3869 12.8693 11.4348 12.8215C11.4826 12.7736 11.5475 12.7468 11.6151 12.7468C12.1309 12.7468 12.6564 12.5048 13.1239 12.0597C12.6432 11.4769 12.2725 10.7183 12.0917 9.86742C12.0847 9.83465 12.0843 9.80082 12.0904 9.76788C12.0965 9.73493 12.1091 9.70351 12.1273 9.67542C12.1456 9.64732 12.1692 9.62309 12.1968 9.60412C12.2244 9.58514 12.2555 9.5718 12.2883 9.56484C12.321 9.55787 12.3549 9.55742 12.3878 9.56353C12.4208 9.56963 12.4522 9.58217 12.4803 9.60042C12.5084 9.61868 12.5326 9.64228 12.5516 9.6699C12.5705 9.69752 12.5839 9.72861 12.5908 9.76138C12.7438 10.4813 13.0523 11.1512 13.4699 11.6793C13.9697 11.048 14.3049 10.2312 14.4174 9.3633C14.4341 9.23052 14.4448 9.09782 14.4509 8.96642H11.1772C11.1096 8.96642 11.0447 8.93955 10.9969 8.8917C10.949 8.84386 10.9221 8.77898 10.9221 8.71132C10.9221 8.64366 10.949 8.57878 10.9969 8.53094C11.0447 8.4831 11.1096 8.45622 11.1772 8.45622H13.244V7.97491C13.244 7.90726 13.2709 7.84237 13.3187 7.79453C13.3666 7.74669 13.4315 7.71981 13.4991 7.71981C13.5668 7.71981 13.6317 7.74669 13.6795 7.79453C13.7273 7.84237 13.7542 7.90726 13.7542 7.97491V8.45622H15.821C15.8545 8.45621 15.8877 8.4628 15.9186 8.47562C15.9496 8.48843 15.9777 8.50722 16.0014 8.5309C16.0251 8.55459 16.0439 8.58271 16.0567 8.61366C16.0695 8.64461 16.0761 8.67778 16.0761 8.71128ZM6.70873 8.34669L7.43271 9.91417C7.46108 9.97559 7.5127 10.0232 7.57619 10.0466C7.63969 10.07 7.70987 10.0672 7.77129 10.0388C7.83271 10.0104 7.88035 9.9588 7.90372 9.89531C7.92709 9.83181 7.92428 9.76163 7.89591 9.70021L5.57398 4.67318C5.55357 4.62894 5.52091 4.59146 5.47986 4.5652C5.43882 4.53894 5.39111 4.52498 5.34239 4.52498C5.29366 4.52498 5.24595 4.53894 5.20491 4.5652C5.16386 4.59146 5.1312 4.62894 5.11079 4.67318L2.7889 9.70021C2.76113 9.76154 2.75873 9.83137 2.78223 9.89447C2.80573 9.95757 2.85322 10.0088 2.91434 10.0371C2.97547 10.0653 3.04528 10.0682 3.10855 10.0452C3.17183 10.0222 3.22344 9.97508 3.25213 9.91417L3.97615 8.34669H6.70873ZM5.34242 5.38856L6.47305 7.83645H4.21176L5.34242 5.38856Z" />
                                </svg><span>Language</span></div>
                            <ul class="language-list">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Deutsch</a></li>
                                <li><a href="#">Svenska</a></li>
                                <li><a href="#">اردو</a></li>
                                <li><a href="#">عربي</a></li>
                                <li><a href="#">Nederlands</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <header class="header-area style-1 three d-flex flex-nowrap align-items-center justify-content-between">
            <div class="nav-left">
                <div class="company-logo"><a href="index.html"><img alt="image" class="img-fluid" src="../assets/img/logo.svg"></a></div>
                <div class="main-menu">
                    <div class="mobile-logo-area d-lg-none d-flex justify-content-center align-items-center">
                        <div class="mobile-logo-wrap"><a href="index.html"><img alt="image" src="../assets/img/logo.svg"></a></div>
                    </div>
                    <ul class="menu-list">
                        <li class="menu-item-has-children active"><a href="index.html" class="drop-down">Home</a><i class="bi bi-plus dropdown-icon"></i>
                            <ul class="sub-menu">
                                <li><a href="../index.html">Multipurpose 01</a></li>
                                <li><a href="../car-auction/index.html">Car Auction</a></li>
                                <li><a href="../antiques-auction/index.html">Antiques Auction</a></li>
                                <li><a href="../art-auction/index.html">Art Auction</a></li>
                                <li><a href="../gadget-and-technology/index.html">Gadget & Technology</a></li>
                                <li><a href="../book-and-comic/index.html">Book & Comic</a></li>
                                <li class="active"><a href="index.html">Multipurpose 02</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#" class="drop-down">Auctions</a><i class="bi bi-plus dropdown-icon"></i>
                            <ul class="sub-menu">
                                <li><a href="auction-grid.html">Auctions Grid</a></li>
                                <li><a href="auction-sidebar.html">Auctions Sidebar</a></li>
                                <li><a href="auction-details.html">Auctions Details Style 01</a></li>
                                <li><a href="auction-details2.html">Auctions Details Style 02</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="blog-grid.html" class="drop-down">Blog</a><i class="bi bi-plus dropdown-icon"></i>
                            <ul class="sub-menu">
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#" class="drop-down">Pages</a><i class="bi bi-plus dropdown-icon"></i>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="category.html">Category</a></li>
                                <li><a href="store-list.html">Seller</a><i class="d-lg-flex d-none bi bi-chevron-right dropdown-icon"></i><i class="d-lg-none d-flex bi bi-plus dropdown-icon"></i>
                                    <ul class="sub-menu">
                                        <li><a href="store-list.html">Seller List</a></li>
                                        <li><a href="store-details.html">Seller Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="how-to-sell.html">How To Sell</a></li>
                                <li><a href="how-to-buy.html">How to Bid</a></li>
                                <li><a href="dashboard.html">Dashbaord</a></li>
                                <li><a href="faq.html">Faqs</a></li>
                                <li><a href="error.html">Error</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html" class="drop-down">Contact</a></li>
                    </ul>
                    <ul class="contact-area d-lg-none d-flex">
                        <li><a href="https://demo-egenslab.b-cdn.net/cdn-cgi/l/email-protection#0960676f66496c71686479656c276a6664"><svg width="20" height="16" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.2422 0.96875H1.75781C0.786602 0.96875 0 1.76023 0 2.72656V13.2734C0 14.2455 0.792383 15.0312 1.75781 15.0312H18.2422C19.2053 15.0312 20 14.2488 20 13.2734V2.72656C20 1.76195 19.2165 0.96875 18.2422 0.96875ZM17.996 2.14062L11.243 8.85809C10.9109 9.19012 10.4695 9.37293 10 9.37293C9.53047 9.37293 9.08906 9.19008 8.75594 8.85699L2.00398 2.14062H17.996ZM1.17188 13.0349V2.96582L6.23586 8.00312L1.17188 13.0349ZM2.00473 13.8594L7.06672 8.82957L7.9284 9.68672C8.48176 10.2401 9.21746 10.5448 10 10.5448C10.7825 10.5448 11.5182 10.2401 12.0705 9.68781L12.9333 8.82957L17.9953 13.8594H2.00473ZM18.8281 13.0349L13.7641 8.00312L18.8281 2.96582V13.0349Z" />
                                </svg><span class="__cf_email__" data-cfemail="4b22252d240b2e332a263b272e65282426">[email&#160;protected]</span></a></li>
                        <li><a href="#"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.5956 8.7197C18.5244 6.5458 17.6262 4.48105 16.0844 2.94689C14.4584 1.32064 12.2975 0.425323 9.99999 0.425323C5.35968 0.425323 1.56812 4.11876 1.40468 8.7197C1.04688 8.87819 0.742722 9.13705 0.529067 9.46491C0.315412 9.79277 0.201428 10.1756 0.200928 10.5669V12.8363C0.201507 13.3722 0.414645 13.8859 0.793578 14.2649C1.17251 14.6438 1.68629 14.8569 2.22218 14.8575C2.5689 14.8571 2.90131 14.7192 3.14648 14.474C3.39166 14.2288 3.52958 13.8964 3.52999 13.5497V9.85314C3.52999 9.17595 3.01062 8.62376 2.3503 8.55814C2.59405 4.5497 5.93093 1.36282 9.99999 1.36282C12.0475 1.36282 13.9728 2.16095 15.4219 3.61001C16.7525 4.94064 17.5312 6.67501 17.6484 8.55845C16.9887 8.6247 16.4703 9.17657 16.4703 9.85314V13.5494C16.4703 14.2322 16.9978 14.7878 17.6659 14.8456V15.7797C17.6653 16.2855 17.4642 16.7704 17.1065 17.128C16.7488 17.4856 16.2639 17.6867 15.7581 17.6872H14.3453C14.2501 17.4095 14.0702 17.1686 13.8311 16.9983C13.5919 16.8281 13.3054 16.737 13.0119 16.7378H11.5556C11.3466 16.7378 11.1459 16.7822 10.9622 16.8678C10.7161 16.9815 10.5077 17.1632 10.3616 17.3914C10.2154 17.6196 10.1375 17.8849 10.1372 18.1559C10.1372 18.5353 10.285 18.8916 10.5528 19.1581C10.6841 19.2905 10.8403 19.3954 11.0125 19.4669C11.1846 19.5383 11.3692 19.5749 11.5556 19.5744H13.0119C13.6156 19.5744 14.1478 19.1841 14.3462 18.6247H15.7581C17.3272 18.6247 18.6034 17.3484 18.6034 15.7797V14.6788C18.9591 14.5194 19.2612 14.2606 19.4733 13.9337C19.6854 13.6067 19.7985 13.2254 19.7991 12.8356V10.5663C19.7991 9.74314 19.3034 9.03439 18.5956 8.7197ZM2.59218 9.85314V13.5494C2.59218 13.7534 2.42624 13.9197 2.22187 13.9197C1.93454 13.9194 1.65907 13.8051 1.4559 13.6019C1.25273 13.3987 1.13845 13.1233 1.13812 12.8359V10.5666C1.13845 10.2792 1.25273 10.0038 1.4559 9.80061C1.65907 9.59744 1.93454 9.48315 2.22187 9.48282C2.42624 9.48282 2.59218 9.64907 2.59218 9.85314ZM13.4822 18.2566C13.4589 18.3642 13.3995 18.4606 13.3139 18.5299C13.2284 18.5992 13.1217 18.6372 13.0116 18.6375H11.5553C11.4272 18.6375 11.3069 18.5875 11.215 18.4956C11.1703 18.4512 11.1348 18.3984 11.1107 18.3402C11.0865 18.282 11.0742 18.2196 11.0744 18.1566C11.0747 18.0292 11.1255 17.907 11.2156 17.817C11.3057 17.7269 11.4279 17.6762 11.5553 17.6759H13.0116C13.1397 17.6759 13.26 17.7256 13.3516 17.8175C13.4422 17.9078 13.4922 18.0284 13.4922 18.1566C13.4925 18.1909 13.4887 18.2253 13.4822 18.2566ZM18.8616 12.8359C18.8612 13.1233 18.7469 13.3987 18.5438 13.6019C18.3406 13.8051 18.0651 13.9194 17.7778 13.9197C17.6796 13.9196 17.5855 13.8806 17.516 13.8111C17.4466 13.7417 17.4076 13.6476 17.4075 13.5494V9.85314C17.4075 9.64907 17.5734 9.48282 17.7778 9.48282C18.0651 9.48315 18.3406 9.59744 18.5438 9.80061C18.7469 10.0038 18.8612 10.2792 18.8616 10.5666V12.8359Z" />
                                    <path d="M13.0353 12.9975C13.5619 12.9969 14.0668 12.7875 14.4391 12.4151C14.8115 12.0427 15.0209 11.5379 15.0215 11.0113V6.96406C15.0215 6.43469 14.8146 5.93594 14.439 5.56031C14.0634 5.18469 13.565 4.97781 13.0353 4.97781H6.96464C6.43804 4.97839 5.93316 5.18784 5.56079 5.56021C5.18842 5.93258 4.97897 6.43746 4.97839 6.96406V11.0113C4.97897 11.5379 5.18842 12.0427 5.56079 12.4151C5.93316 12.7875 6.43804 12.9969 6.96464 12.9975H7.00183V14.0463C7.00121 14.1743 7.02592 14.3012 7.07453 14.4197C7.12313 14.5382 7.19468 14.6459 7.28506 14.7366C7.37544 14.8273 7.48287 14.8993 7.60116 14.9484C7.71945 14.9974 7.84627 15.0226 7.97433 15.0225C8.10231 15.0228 8.22903 14.9972 8.34693 14.9475C8.46483 14.8977 8.5715 14.8247 8.66058 14.7328L10.4053 12.9975H13.0353ZM9.88183 12.1963L7.99371 14.0741C7.98527 14.0828 7.97902 14.0894 7.96121 14.0816C7.93964 14.0728 7.93964 14.0588 7.93964 14.0463V12.5288C7.93964 12.4044 7.89026 12.2852 7.80235 12.1973C7.71444 12.1094 7.59521 12.06 7.47089 12.06H6.96496C6.68691 12.0597 6.42035 11.9491 6.22374 11.7525C6.02714 11.5559 5.91654 11.2893 5.91621 11.0113V6.96406C5.91654 6.68602 6.02714 6.41946 6.22374 6.22285C6.42035 6.02624 6.68691 5.91564 6.96496 5.91531H13.0356C13.315 5.91531 13.5778 6.02469 13.7765 6.22313C13.9753 6.42188 14.0843 6.685 14.0843 6.96406V11.0113C14.084 11.2893 13.9734 11.5559 13.7768 11.7525C13.5802 11.9491 13.3136 12.0597 13.0356 12.06H10.2125C10.0884 12.06 9.96964 12.1091 9.88183 12.1963Z" />
                                    <path d="M7.72281 8.37094C7.34156 8.37094 7.03125 8.68157 7.03125 9.0625C7.03125 9.44344 7.34187 9.75407 7.72281 9.75407C8.10437 9.75407 8.415 9.44344 8.415 9.0625C8.415 8.68157 8.10469 8.37094 7.72281 8.37094ZM9.99969 8.37094C9.61844 8.37094 9.30812 8.68157 9.30812 9.0625C9.30812 9.44344 9.61875 9.75407 9.99969 9.75407C10.3816 9.75407 10.6919 9.44344 10.6919 9.0625C10.6919 8.68157 10.3816 8.37094 9.99969 8.37094ZM12.2766 8.37094C11.8953 8.37094 11.585 8.68157 11.585 9.0625C11.585 9.44344 11.8956 9.75407 12.2766 9.75407C12.6581 9.75407 12.9688 9.44344 12.9688 9.0625C12.9688 8.68157 12.6581 8.37094 12.2766 8.37094Z" />
                                </svg> Customer support </a></li>
                    </ul>
                    <form class="d-lg-none d-flex" method="post" id="search_form" class="search_form" action="{{ url('/donation-near-me/dd-1')}}" >
                        <div class="form-inner">
                            <!-- <input type="text" placeholder="Search your product1..."> -->
                            {{ csrf_field() }}
                            <input type="text" list="search_text" name="word_box" class="search_text word_box"  placeholder="Search your product" autocomplete="off" style="line-height: normal !important;">
                            
                            <button class="search-btn"><i class="bi bi-search"></i></button>


                        </div>
                    </form>

                    
                    @if(!Auth::guard('user')->check())
                                       

                        <div class="btn-area d-lg-none d-flex">
                            <a href="{{ url('/user/login') }}" class="login-btn btn-hover">
                                <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                                </svg> Log in <span></span>
                            </a>
                        </div>
                    @else
                        <div class="btn-area d-lg-none d-flex">
                            <a href="{{ url('user.home') }}" class="login-btn btn-hover">
                                <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                                </svg> My Account <span></span>
                            </a>
                        </div>    
                        
                    @endif
                    
                </div>
            </div>
            <div class="nav-right d-flex jsutify-content-end align-items-center">
                <form class="d-xl-flex d-none" method="post" id="search_form" class="search_form" action="{{ url('/donation-near-me/dd-1')}}" autocomplete="off">
                    <div class="form-inner">
                        <!-- <input type="text" placeholder="Search your product2..."> -->
                        {{ csrf_field() }}
                        <input type="text" list="search_text" name="word_box" class="search_text word_box"  placeholder="Search your product" autocomplete="off" style="line-height: normal !important;">

                        <button class="search-btn"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                
                <div class="search-bar d-xl-none d-lg-block d-none">
                    <div class="search-btn"><i class="bi bi-search"></i></div>
                    <div class="search-input">
                        <div class="search-close"></div>
                        <form  method="post" id="search_form" class="search_form" action="{{ url('/donation-near-me/dd-1')}}" autocomplete="off">
                            <div class="search-group">
                                <div class="form-inner2">
                                    <!-- <input type="text" placeholder="Search your product3..."> -->
                                    {{ csrf_field() }}
                                    <input type="text" list="search_text" name="word_box" class="search_text word_box"  placeholder="Search your product" autocomplete="off" style="line-height: normal !important;">

                                    <button type="submit">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67458 2.95934C5.06925 2.95934 2.95925 5.06868 2.95925 7.66868C2.95925 10.2687 5.06925 12.3773 7.67458 12.3773C8.97459 12.3773 10.1499 11.8533 11.0033 11.004C11.4434 10.5674 11.7926 10.0477 12.0307 9.47524C12.2687 8.90273 12.3908 8.28869 12.3899 7.66868C12.3899 5.06868 10.2799 2.95934 7.67458 2.95934ZM1.33325 7.66868C1.33325 4.16868 4.17325 1.33334 7.67458 1.33334C11.1759 1.33334 14.0159 4.16868 14.0159 7.66868C14.0178 9.07185 13.5516 10.4356 12.6913 11.544L14.4279 13.2787C14.5084 13.353 14.573 13.4427 14.618 13.5426C14.6629 13.6424 14.6872 13.7503 14.6894 13.8598C14.6916 13.9693 14.6717 14.0781 14.6309 14.1797C14.59 14.2813 14.5291 14.3736 14.4517 14.4511C14.3743 14.5286 14.2821 14.5896 14.1805 14.6306C14.079 14.6716 13.9702 14.6916 13.8607 14.6895C13.7512 14.6874 13.6433 14.6632 13.5434 14.6184C13.4435 14.5736 13.3536 14.5091 13.2793 14.4287L11.5393 12.6913C10.4316 13.544 9.07244 14.0054 7.67458 14.0033C4.17325 14.0033 1.33325 11.168 1.33325 7.66868Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                

                    @if(!Auth::guard('user')->check())
                                           
                        <a href="{{ url('/user/login') }}" class="login-btn btn-hover d-lg-flex d-none">
                            <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                            </svg> Log in 
                            <span></span>
                        </a>
                        
                    @else
                        <a href="{{ url('user.home') }}" class="login-btn btn-hover d-lg-flex d-none">
                            <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.50035 9.09302C5.99384 9.09302 3.95384 7.05302 3.95384 4.54651C3.95384 2.04 5.99384 0 8.50035 0C11.0069 0 13.0469 2.04 13.0469 4.54651C13.0469 7.05302 11.0069 9.09302 8.50035 9.09302ZM8.50035 1.18605C6.65012 1.18605 5.13989 2.69628 5.13989 4.54651C5.13989 6.39674 6.65012 7.90698 8.50035 7.90698C10.3506 7.90698 11.8608 6.39674 11.8608 4.54651C11.8608 2.69628 10.3506 1.18605 8.50035 1.18605ZM15.2924 17C14.9683 17 14.6994 16.7312 14.6994 16.407C14.6994 13.6791 11.9162 11.4651 8.50035 11.4651C5.08454 11.4651 2.30128 13.6791 2.30128 16.407C2.30128 16.7312 2.03244 17 1.70826 17C1.38407 17 1.11523 16.7312 1.11523 16.407C1.11523 13.0307 4.42826 10.2791 8.50035 10.2791C12.5724 10.2791 15.8855 13.0307 15.8855 16.407C15.8855 16.7312 15.6166 17 15.2924 17Z" />
                            </svg> My Account
                            <span></span>
                        </a>
                    @endif
                
                <div class="sidebar-button mobile-menu-btn"><span></span></div>
            </div>
        </header>
    </div>

    <div class="text-slider-section">
        <div class="marquee">
            <div class="marquee__group">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> Welcome to InnovateTech Solutions </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> We thrive on creativity </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg>Your satisfaction is our priority </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> We believe in the power of collaboration </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> We invite you to join us on this exciting </span>
            </div>
            <div class="marquee__group">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> Welcome to InnovateTech Solutions </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> We thrive on creativity </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg>Your satisfaction is our priority </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> We believe in the power of collaboration </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <path d="M17 8.5L14.6578 6.84722L15.8666 4.25001L13.0051 3.99493L12.75 1.1334L10.1528 2.34215L8.5 0L6.84722 2.34215L4.25001 1.1334L3.99493 3.99493L1.1334 4.25001L2.34215 6.84722L0 8.5L2.34215 10.1528L1.1334 12.75L3.99493 13.0051L4.25001 15.8666L6.84722 14.6578L8.5 17L10.1528 14.6578L12.75 15.8666L13.0051 13.0051L15.8666 12.75L14.6578 10.1528L17 8.5Z" />
                    </svg> We invite you to join us on this exciting </span>
            </div>
        </div>
    </div>
        