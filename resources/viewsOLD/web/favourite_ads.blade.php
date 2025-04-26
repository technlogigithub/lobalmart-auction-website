
@extends('user.layout.master')

@section('content')

   <!-- myads-page -->
   <section id="main" class="clearfix myads-page">
            <div class="container">

                <div class="breadcrumb-section">
                    <!-- breadcrumb -->
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Profile</li>
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">My Profile</h2>
                </div><!-- banner -->

                <div class="ad-profile section">	
                    <div class="user-profile">
                        <div class="user-images">
                            <img src="{{ URL::asset('/uploads/images/user.jpg')}}" alt="User Images" class="img-responsive">
                        </div>
                        <div class="user">
                            <h2>Hello, <a href="#">Jhon Doe</a></h2>
                            <h5>You last logged in at: 14-01-2016 6:40 AM [ USA time (GMT + 6:00hrs)]</h5>
                        </div>

                        <div class="favorites-user">
                            <div class="my-ads">
                                <a href="my-ads.html">23<small>My ADS</small></a>
                            </div>
                            <div class="favorites">
                                <a href="#">18<small>Favorites</small></a>
                            </div>
                        </div>								
                    </div><!-- user-profile -->

                    <ul class="user-menu">
                        <li><a href="my-profile.html">Profile</a></li>
                        <li class="active"><a href="favourite-ads.html">Favourite donation</a></li>
                        <li><a href="my-ads.html">My donation</a></li>
                        <li><a href="urgent_requirement.html">Urgent requirement</a></li>
                        <li><a href="pending-ads.html">Pending approval</a></li>
                        <!--<li><a href="archived-ads.html">Archived ads </a></li>-->
                        <li><a href="delete-account.html">Close account</a></li>
                    </ul>

                </div><!-- ad-profile -->			

                <div class="ads-info">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="my-ads section">
                                <h2>Favourite ads</h2>
                                <!-- ad-item -->
                                <div class="ad-item row">
                                    <!-- item-image -->
                                    <div class="item-image-box col-sm-4">
                                        <div class="item-image">
                                            <a href="details.html"><img src="{{ URL::asset('/uploads/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div>								

                                    <div class="item-info col-sm-8">
                                        <!-- ad-info -->
                                        <div class="ad-info">
                                            <h3 class="item-price">$800.00</h3>
                                            <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                            <div class="item-cat">
                                                <span><a href="#">Electronics & Gedgets</a></span> /
                                                <span><a href="#">Tv & Video</a></span>
                                            </div>										
                                        </div><!-- ad-info -->

                                        <!-- ad-meta -->
                                        <div class="ad-meta">
                                            <div class="meta-content">
                                                <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                                <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                                            </div>										
                                            <!-- item-info-right -->
                                            <div class="user-option pull-right">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                                <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>
                                                <a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
                                            </div><!-- item-info-right -->
                                        </div><!-- ad-meta -->
                                    </div><!-- item-info -->
                                </div><!-- ad-item -->

                                
                            </div>
                        </div><!-- my-ads -->

                        <!-- recommended-cta-->
                        <div class="col-sm-4 text-center">
                            <!-- recommended-cta -->
                            <div class="recommended-cta">					
                                <div class="cta">
                                    <!-- single-cta -->						
                                    <div class="single-cta">
                                        <!-- cta-icon -->
                                        <div class="cta-icon icon-secure">
                                            <img src="{{ URL::asset('/uploads/images/icon/13.png')}}" alt="Icon" class="img-responsive">
                                        </div><!-- cta-icon -->

                                        <h4>Secure Trading</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </div><!-- single-cta -->


                                    <!-- single-cta -->
                                    <div class="single-cta">
                                        <!-- cta-icon -->
                                        <div class="cta-icon icon-support">
                                            <img src="{{ URL::asset('/uploads/images/icon/14.png')}}" alt="Icon" class="img-responsive">
                                        </div><!-- cta-icon -->

                                        <h4>24/7 Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </div><!-- single-cta -->


                                    <!-- single-cta -->
                                    <div class="single-cta">
                                        <!-- cta-icon -->
                                        <div class="cta-icon icon-trading">
                                            <img src="{{ URL::asset('/uploads/images/icon/15.png')}}" alt="Icon" class="img-responsive">
                                        </div><!-- cta-icon -->

                                        <h4>Easy Trading</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    </div><!-- single-cta -->

                                    <!-- single-cta -->
                                    <div class="single-cta">
                                        <h5>Need Help?</h5>
                                        <p><span>Give a call on</span><a href="tellto:08048100000"> 08048100000</a></p>
                                    </div><!-- single-cta -->
                                </div>
                            </div><!-- cta -->
                        </div><!-- recommended-cta-->				

                    </div><!-- row -->
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- myads-page -->
@endsection