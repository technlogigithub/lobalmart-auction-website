@extends('user.layout.master')
@section('title','About Us')
@section('content')<!-- main -->
 <section id="main" class="clearfix about-us page">
            <div class="container">

                <div class="breadcrumb-section">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>About</li> 
                    </ol><!-- breadcrumb -->						
                    <h2 class="title">About Us</h2>	
                </div><!-- banner -->

                <div class="section about">
                    <div class="about-info">
                        <div class="row">
                            <!-- about-us-images -->
                            <div class="col-md-6">
                                <div class="about-us-images">
                                    <img src="{{ URL::asset('/uploads/images/about-us/1.jpg')}}" alt="About us Image" class="img-responsive">
                                </div>
                            </div><!-- about-us-images -->

                            <!-- about-text -->
                            <div class="col-md-6">
                                <div class="about-text">
                                    <h3>Who we are</h3>
                                    <!-- description-paragraph -->
                                    <div class="description-paragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div><!-- description-paragraph -->

                                    <!-- description-paragraph -->
                                    <div class="description-paragraph"><p> velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p></div> 
                                </div><!-- description-paragraph -->
                            </div><!-- about-text -->
                        </div>
                    </div><!-- about-info -->


                    <div class="approach">
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <div class="our-approach">
                                    <h3>Backgrounds</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div><!-- about-text -->

                            <!-- about-text -->
                            <div class="col-sm-4 text-center">
                                <div class="our-approach">
                                    <h3>Our Approach</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                </div>
                            </div><!-- about-text -->

                            <!-- about-text -->
                            <div class="col-sm-4 text-center">
                                <div class="our-approach">
                                    <h3>Methodology</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div><!-- about-text -->
                        </div>
                    </div>

                    <div class="team-section">
                        <h3>Trade Team Member</h3>
                        <div class="team-members">
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/2.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Leaf Corcoran</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/3.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Mike Lewis</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/4.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Julie MacKay</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/5.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Christine Marquardt</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/6.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Loren Heiman</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/7.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Chris Taylor</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/8.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Alex Posey</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/9.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Teddy Newell</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/10.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Eli Amesefe</h4>
                            </div><!-- team-member -->

                            <!-- team-member -->
                            <div class="team-member">
                                <!-- team-member-image -->
                                <div class="team-member-image">
                                    <img src="{{ URL::asset('/uploads/images/about-us/11.jpg')}}" alt="Team Member" class="img-responsive">
                                    <!-- social -->
                                    <div class="team-social">
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        </ul><!-- social -->
                                    </div>
                                </div><!-- team-member-image -->
                                <h4>Andrei Patru</h4>
                            </div><!-- team-member -->

                        </div><!-- team-members -->
                    </div><!-- team-members -->
                </div><!-- about -->

                <div class="section testimonials text-center">
                    <div class="testimonial-carousel">
                        <div class="testimonial">
                            <img src="{{ URL::asset('/uploads/images/about-us/12.jpg')}}" alt="about Image" class="img-responsive">
                            <h3 class="client-name">Karol Cichoń</h3>
                            <h4 class="client-company">Founder, Leo Inc</h4>
                            <!-- client-pragrap -->
                            <div class="client-pragrap">
                                <p>“Wow!! It's really awesome. Nice and Clean design.It's really impressive. I am<br> really appreciate your project.”</p>
                            </div><!-- client-pragrap -->
                        </div>

                        <div class="testimonial">
                            <img src="{{ URL::asset('/uploads/images/about-us/4.jpg')}}" alt="Image" class="img-responsive">
                            <h3 class="client-name">Hena Rio</h3>
                            <h4 class="client-company">CEO, Leo Inc</h4>
                            <!-- client-pragrap -->
                            <div class="client-pragrap">
                                <p>“Wow!! It's really awesome. Nice and Clean design.It's really impressive. I am<br> really appreciate your project.”</p>
                            </div><!-- client-pragrap -->
                        </div>

                        <div class="testimonial">
                            <img src="{{ URL::asset('/uploads/images/about-us/6.jpg')}}" alt="" class="img-responsive">
                            <h3 class="client-name">Jhon Mark</h3>
                            <h4 class="client-company">Founder, Mark Ltd.</h4>
                            <!-- client-pragrap -->
                            <div class="client-pragrap">
                                <p>“Wow!! It's really awesome. Nice and Clean design.It's really impressive. I am <br> really appreciate your project.”</p>
                            </div><!-- client-pragrap -->
                        </div><!-- testimonial -->					
                    </div><!-- testimonial -->
                </div><!-- testimonial-carousel -->	

            </div><!-- container -->
        </section><!-- main -->
        @endsection