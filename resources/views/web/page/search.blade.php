@extends('user.layout.master')
@section('title','Category List')
@section('content')

<!-- <div class="filter-sidebar1">
      <div class="auction-sidebar">
        <form method="post" id="considerationTypeForm2" class="considerationTypeForm considerationTypeForm_normal">
          
          <div class="single-widget mb-30">
            <div class="search-box">
              <input type="text" placeholder="Location" name="location">
              <button type="submit">
                <i class="bx bx-search"></i>
              </button>
            </div>
          </div>

          <div class="single-widget mb-30">
            <h5 class="widget-title">Distance</h5>
            <div class="range-wrap">
              <div class="row">
                <div class="col-sm-12">
                  <input type="hidden" name="min-value" value>
                  <input type="hidden" name="max-value" value>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div id="slider-range"></div>
                </div>
              </div>
              <div class="slider-labels">
                <div class="caption">
                  <span id="slider-range-value1"></span>
                </div>
                <div class="caption">
                  <span id="slider-range-value2"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="single-widget mb-30">
            <div class="single-search-box">
              <div class="searchbox-input">
                <label>Looking For</label>
                <div class="custom-select-dropdown">
                  <div class="select-input">
                    <input type="text" readonly name="looking_for" value="Online">
                    <i class="bi bi-chevron-down"></i>
                  </div>
                  <div class="custom-select-wrap two">
                    <ul class="option-list">
                      <li class="single-item">
                        <h6>Online</h6>
                      </li>
                      <li class="single-item">
                        <h6>In-Store</h6>
                      </li>
                      <li class="single-item">
                        <h6>Phone Order</h6>
                      </li>
                      <li class="single-item">
                        <h6>Email Order</h6>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="single-widget mb-30">
            <h5 class="widget-title">Category</h5>
            <div class="checkbox-container">
              <ul>
                <li>
                  <label class="containerss">
                    <input type="checkbox" name="category">
                    <span class="checkmark"></span>
                    <span>Automotive</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox" name="category">
                    <span class="checkmark"></span>
                    <span>Antiques</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox" name="category">
                    <span class="checkmark"></span>
                    <span>Digital Art</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox" name="category">
                    <span class="checkmark"></span>
                    <span>Books & Comic</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox" name="category">
                    <span class="checkmark"></span>
                    <span>Old Coin</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox" name="category">
                    <span class="checkmark"></span>
                    <span>Gadget and Technology</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>


          <div class="single-widget mb-30">
            <h5 class="widget-title">Sub-Category</h5>
            <div class="checkbox-container">
              <ul>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Automotive</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Antiques</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Digital Art</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Books & Comic</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Old Coin</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Gadget and Technology</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>

          <div class="single-widget mb-30">
            <h5 class="widget-title">Specification</h5>
            <div class="checkbox-container">
              <ul>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Automotive</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Antiques</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Digital Art</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Books & Comic</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Old Coin</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Gadget and Technology</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>

          <div class="single-widget mb-30">
            <div class="single-search-box">
              <div class="searchbox-input">
                <label>Condition</label>
                <div class="custom-select-dropdown">
                  <div class="select-input">
                    <input type="text" readonly value="New">
                    <i class="bi bi-chevron-down"></i>
                  </div>
                  <div class="custom-select-wrap two">
                    <ul class="option-list">
                      <li class="single-item">
                        <h6>New</h6>
                      </li>
                      <li class="single-item">
                        <h6>Used</h6>
                      </li>
                      <li class="single-item">
                        <h6>Refurbished</h6>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="single-widget mb-30">
            <h5 class="widget-title">Consideration / Price</h5>
            <div class="range-wrap">
              <div class="row">
                <div class="col-sm-12">
                  <input type="hidden" name="min-value" value>
                  <input type="hidden" name="max-value" value>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div id="slider-range"></div>
                </div>
              </div>
              <div class="slider-labels">
                <div class="caption">
                  <span id="slider-range-value1"></span>
                </div>
                <div class="caption">
                  <span id="slider-range-value2"></span>
                </div>
              </div>
            </div>
          </div>

          
          <div class="single-widget mb-30">
            <div class="single-search-box">
              <div class="searchbox-input">
                <label>Type</label>
                <div class="custom-select-dropdown">
                  <div class="select-input">
                    <input type="text" readonly value="Today  (110)">
                    <i class="bi bi-chevron-down"></i>
                  </div>
                  <div class="custom-select-wrap two">
                    <ul class="option-list">
                      <li class="single-item">
                        <h6>Go & F2F</h6>
                      </li>
                      <li class="single-item">
                        <h6>Call in & F2F</h6>
                      </li>
                      <li class="single-item">
                        <h6>By Post</h6>
                      </li>
                      <li class="single-item">
                        <h6>Any Other Means</h6>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="single-widget mb-30">
            <h5 class="widget-title">Price</h5>
            <div class="range-wrap">
              <div class="row">
                <div class="col-sm-12">
                  <input type="hidden" name="min-value" value>
                  <input type="hidden" name="max-value" value>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div id="slider-range"></div>
                </div>
              </div>
              <div class="slider-labels">
                <div class="caption">
                  <span id="slider-range-value1"></span>
                </div>
                <div class="caption">
                  <span id="slider-range-value2"></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="single-widget mb-30">
            <h5 class="widget-title">Type Of Sales</h5>
            <div class="checkbox-container">
              <ul>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Upcoming</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Latest</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Highest Bidding</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Live Auction</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Popular</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
        </form>
        
      </div>
    </div> -->

     @php

        
        $Sessiondata = session()->get('search');
    @endphp

        @if(isset($Sessiondata))

          @php

            echo "Search Page If";
        
             $homeCity = !empty($Sessiondata[0]['city_search_box']) ? $Sessiondata[0]['city_search_box'] : '';
             $homeCategory = !empty($Sessiondata[0]['category_box']) ? $Sessiondata[0]['category_box'] : '';
             $homeword = !empty($Sessiondata[0]['word_box']) ? $Sessiondata[0]['word_box'] : '';

            if (!empty($Sessiondata[0]['search_latitude'])) {
              $search_latitude = $Sessiondata[0]['search_latitude'];
              $search_longitude = $Sessiondata[0]['search_longitude'];
            } 
            else if(!empty($Sessiondata[0]['clt'])){
              $search_latitude = $Sessiondata[0]['clt'];
              $search_longitude = $Sessiondata[0]['clg'];
            }
            else{
              $search_latitude = '';
              $search_longitude = '';
            }

          @endphp
            

        @else
          
          @php

           echo "Search Page else";
        
            $homeCity = '';
            $homeCategory = '';
            $homeword = '';
            $search_latitude = !empty($Sessiondata[0]['clt']) ? $Sessiondata[0]['clt'] : '';
            $search_longitude = !empty($Sessiondata[0]['clg']) ? $Sessiondata[0]['clg'] : '';
          @endphp

        @endif 
        
        @php
          echo $homeCity;
          echo $homeCategory;
          echo $homeword;
          echo $search_latitude;
          echo $search_longitude;

          die();
        @endphp
      
        <!-- <form method="post" id="search_form" class="search_form" action="#" autocomplete="off">
                  <div class="dropdown category-dropdown">
                          <input type="hidden" name="search_latitude" id="lat" value="{{$search_latitude}}">
                          <input type="hidden" name="search_longitude" id="lon" value="{{$search_longitude}}">

                          <input type="text" id="searchTextField" name="city_search_box" class="form-control city_search_box" value="{{$homeCity}}" placeholder="Enter Location" id="city_search_box">
                      
                  </div>


                  <div class="dropdown category-dropdown">    
                     <input type="text"  list="browsers" name="category_box" value="{{$homeCategory}}" placeholder="Enter Category" id='category_box' class='category_box'  autocomplete="off" >
                      <datalist id="browsers" class="browsers" >
                          @foreach($categories as $category)
                          <option value="{{$category->name}}" >
                          @endforeach
                      </datalist>
                  </div> 
                  
                     <div class="dropdown category-dropdown">
                              <input type="text" list="search_text" value="{{$homeword}}" name="word_box" class="search_text word_box"  placeholder="What are you looking for today" autocomplete="off" >

                              <datalist id="search_text" >
                                  
                              </datalist>
                          </div>

                  <button type="submit" class="form-control search_btn"  value="Search">Search</button>
              </form> -->

    <div class="filter-sidebar">
      <div class="auction-sidebar">
        
          
          <!-- <div class="single-widget mb-30">
            <div class="search-box">
              
              <form method="post" id="search_form" class="search_form" action="#" autocomplete="off">
                  
                  <input type="hidden" name="search_latitude" id="lat" value="{{$search_latitude}}">
                  <input type="hidden" name="search_longitude" id="lon" value="{{$search_longitude}}">

                  <input type="text" id="searchTextField" name="city_search_box" class=" city_search_box" value="{{$homeCity}}" placeholder="Enter Location" id="city_search_box">
              
                  

                  <button type="submit" class="search_btn"  value="Search"><i class="bx bx-search"></i></button>
              </form>

            </div>
          </div> -->
              <!-- <input type="text" placeholder="Location">
              <button type="submit">
                <i class="bx bx-search"></i>
              </button> -->

          <div class="single-widget mb-30">
            <h5 class="widget-title">Distance</h5>
            <div class="range-wrap">
              <form method="post" id="distance" class="distance distance_normal">
                <div class="row">
                  <div class="col-sm-12">

                      <input type="hidden" value="0" name="dist_frm">
                      <input type="hidden" value="5" name="dist_to">
                      <input type="hidden" value="KM" name="dist_unt">

                      <input type="hidden" name="min-value" value="">
                      <input type="hidden" name="max-value" value="">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div id="slider-range"></div>
                  </div>
                </div>
                <div class="slider-labels">
                  <div class="caption">
                    <span id="slider-range-value1"></span>
                  </div>
                  <div class="caption">
                    <span id="slider-range-value2"></span>
                  </div>
                </div>
              </form>
            </div>
          </div>

          
              
                   
                   
                   
             

          <!-- <div class="single-widget mb-30">
            <div class="single-search-box">
              <div class="searchbox-input">
                <label>Looking For</label>
                <form method="post" id="myForm" class="myForm myForm_normal">
                  <div class="custom-select-dropdown">
                    <div class="select-input">
                      @php
                        $i=1;
                      @endphp

                      <input type="text" readonly name="ut" class="categoryClass lookingFor@php echo $i;  @endphp" value="Online">
                      <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="custom-select-wrap two">
                      <ul class="option-list">
                        
                        
                        
                        @foreach($user_types as $user_type)
                            <li class="single-item">
                              <h6>{{$user_type->name}}</h6>
                            </li>
                          @php
                          $i++;
                          @endphp
                        @endforeach
                        
                        
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> -->

          <div class="single-widget mb-30">
            <h5 class="widget-title">Looking for</h5>
            <div class="checkbox-container">
              <ul>
                
                <form method="post" id="myForm" class="myForm myForm_normal">
                  @foreach($user_types as $user_type)
                    <li>
                      <label class="containerss">
                        <input type="checkbox" name="ut" class="categoryClass" value="{{$user_type->id}}">
                        <span class="checkmark"></span>
                        <span>{{$user_type->name}}</span>
                      </label>
                    </li>
                  @endforeach
                </form> 
                
              </ul>
            </div>
          </div>


            
          <div class="single-widget mb-30">
            <h5 class="widget-title">Category</h5>
            <div class="checkbox-container">
              <ul>
                
                <form method="post" id="categoryForm" class="categoryForm categoryForm_normal">
                  @foreach($categories as $category)
                    <li>
                      <label class="containerss">
                        @php
                            $catId = Session::get('homePageCategoryId');
                        @endphp
                        <input type="checkbox" name="ct" class="selectCategory" {{$homeCategory==$category->name?"data-in='".$homeCategory."'":''}}  value="{{$category->id}}">
                        <span class="checkmark"></span>
                        <span>{{$category->name}}</span>
                      </label>
                    </li>
                  @endforeach
                </form> 
                
              </ul>
            </div>
          </div>


           

          <div class="single-widget mb-30">
            <h5 class="widget-title">Sub-Category</h5>
            <div class="checkbox-container">
              
              <form method="post" id="subCategoryForm" class="subCategoryForm subCategoryForm_normal">
                <ul class="subcategories">
                  @php
                    echo $print;
                  @endphp
                </ul>
              </form>

            </div>
          </div>


           

          <div class="single-widget mb-30">
            <h5 class="widget-title">Specification</h5>
            <div class="checkbox-container">
              
              <form method="post" id="specificationForm" class="specificationForm specificationForm_normal">
                <ul class="specificationHtml">
                  @php
                      echo $sp;
                  @endphp
                </ul>
              </form>
            </div>
          </div>


        


          <!-- <div class="single-widget mb-30">
            <div class="single-search-box">
              <div class="searchbox-input">
                <label>Condition</label>
                <form method="post" id="conditionForm" class="conditionForm conditionForm_normal">
                  <div class="custom-select-dropdown">
                    <div class="select-input">
                      <input type="text" readonly class="newSearch conditionInput" id="newSearch" name="cd" value="">
                      <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="custom-select-wrap two">
                      <ul class="option-list">
                        <li class="single-item">
                          <h6>New</h6>
                        </li>
                        <li class="single-item">
                          <h6>Used</h6>
                        </li>
                        <li class="single-item">
                          <h6>Refurbished</h6>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> -->

          <div class="single-widget mb-30">
            <h5 class="widget-title">Condition</h5>
            <div class="checkbox-container">
              <ul>
                
                <form method="post" id="conditionForm" class="conditionForm conditionForm_normal">
                  <!-- @foreach($user_types as $user_type) -->
                    <li>
                      <label class="containerss">
                        <input type="checkbox" name="cd" class="newSearch conditionInput" id="newSearch" value="1">
                        <span class="checkmark"></span>
                        <span>New</span>
                      </label>
                    </li>

                    <li>
                      <label class="containerss">
                        <input type="checkbox" name="cd" class="newSearch conditionInput" id="newSearch" value="2">
                        <span class="checkmark"></span>
                        <span>Used</span>
                      </label>
                    </li>

                    <li>
                      <label class="containerss">
                        <input type="checkbox" name="cd" class="newSearch conditionInput" id="newSearch" value="3">
                        <span class="checkmark"></span>
                        <span>Refurbished</span>
                      </label>
                    </li>
                  <!-- @endforeach -->
                </form> 
                
              </ul>
            </div>
          </div>



          
          <div class="single-widget mb-30">
            <div class="single-search-box">
              <div class="searchbox-input">
                <label>Type</label>
                <form method="post" id="donationTypeForm" class="donationTypeForm donationTypeForm_normal">
                  <div class="custom-select-dropdown">
                    <div class="select-input">
                      <input type="text" readonly class="donationTypeForm donationTypeForm_normal" name="td" value="">
                      <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="custom-select-wrap two">
                      <ul class="option-list">
                        @foreach($donation_types as $donation_type)
                          <li class="single-item">
                            <h6>{{$donation_type->name}}</h6>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
          
          

          <!-- NEW Filter -->

          <div class="single-widget mb-30">
            <h5 class="widget-title">Type Of Sales</h5>
            <div class="checkbox-container">
              <ul>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Upcoming</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Latest</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Highest Bidding</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Live Auction</span>
                  </label>
                </li>
                <li>
                  <label class="containerss">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span>Popular</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
        
        
      </div>
    </div>

    
    <div class="auction-grid-section mb-110">
      <div class="container">
        <div class="auction-grid-title-section mb-40">
          <h6>Showing 1–12 of 101 results</h6>
          <div class="filter-selector">
            <div class="filter">
              <div class="filter-icon">
                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_456_25)">
                    <path d="M0.5625 3.17317H9.12674C9.38486 4.34806 10.4341 5.2301 11.6853 5.2301C12.9366 5.2301 13.9858 4.3481 14.2439 3.17317H17.4375C17.7481 3.17317 18 2.92131 18 2.61067C18 2.30003 17.7481 2.04817 17.4375 2.04817H14.2437C13.9851 0.873885 12.9344 -0.00871277 11.6853 -0.00871277C10.4356 -0.00871277 9.38545 0.873744 9.12695 2.04817H0.5625C0.251859 2.04817 0 2.30003 0 2.61067C0 2.92131 0.251859 3.17317 0.5625 3.17317ZM10.191 2.61215L10.191 2.6061C10.1935 1.78461 10.8638 1.11632 11.6853 1.11632C12.5057 1.11632 13.1761 1.78369 13.1796 2.6048L13.1797 2.61306C13.1784 3.43597 12.5086 4.10513 11.6853 4.10513C10.8625 4.10513 10.1928 3.43663 10.191 2.61422L10.191 2.61215ZM17.4375 14.8268H14.2437C13.985 13.6525 12.9344 12.7699 11.6853 12.7699C10.4356 12.7699 9.38545 13.6524 9.12695 14.8268H0.5625C0.251859 14.8268 0 15.0786 0 15.3893C0 15.7 0.251859 15.9518 0.5625 15.9518H9.12674C9.38486 17.1267 10.4341 18.0087 11.6853 18.0087C12.9366 18.0087 13.9858 17.1267 14.2439 15.9518H17.4375C17.7481 15.9518 18 15.7 18 15.3893C18 15.0786 17.7481 14.8268 17.4375 14.8268ZM11.6853 16.8837C10.8625 16.8837 10.1928 16.2152 10.191 15.3928L10.191 15.3908L10.191 15.3847C10.1935 14.5632 10.8638 13.8949 11.6853 13.8949C12.5057 13.8949 13.1761 14.5623 13.1796 15.3834L13.1797 15.3916C13.1785 16.2146 12.5086 16.8837 11.6853 16.8837ZM17.4375 8.43751H8.87326C8.61514 7.26262 7.56594 6.38062 6.31466 6.38062C5.06338 6.38062 4.01418 7.26262 3.75606 8.43751H0.5625C0.251859 8.43751 0 8.68936 0 9.00001C0 9.31068 0.251859 9.56251 0.5625 9.56251H3.75634C4.01498 10.7368 5.06559 11.6194 6.31466 11.6194C7.56439 11.6194 8.61455 10.7369 8.87305 9.56251H17.4375C17.7481 9.56251 18 9.31068 18 9.00001C18 8.68936 17.7481 8.43751 17.4375 8.43751ZM7.80901 8.99853L7.80898 9.00458C7.80652 9.82607 7.13619 10.4944 6.31466 10.4944C5.49429 10.4944 4.82393 9.82699 4.82038 9.00591L4.82027 8.99769C4.8215 8.17468 5.49141 7.50562 6.31466 7.50562C7.13753 7.50562 7.80718 8.17408 7.80905 8.99653L7.80901 8.99853Z" />
                  </g>
                </svg>
              </div>
              <span>Filters</span>
            </div>

            <div class="auction-grid-sidebar-section pt-110 mb-110">
              <div class="auction-sidebar" style="all: unset;">
                <div class="single-widget mb-30" style="all: unset;">
                  <div class="checkbox-container">
                    <ul>
                      <li>
                        <label class="containerss">
                          <input type="checkbox" value="3" id="urgentitem" class="urgentitem">
                          <span class="checkmark"></span>
                          <span>Live Only</span>
                        </label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>  
            
            
            <div class="selector">
              <!-- <select>
                <option>Default Sorting</option>
                <option>Price Low to High</option>
                <option>Price High to Low</option>
              </select> -->

              <select id="dropdownSearch" class="dropdownSearch">
                  <!-- <option value="">Sort by</option> -->
                  <option id="dropdownOption1" value="1">Distance</option>
                  
                  <option id="dropdownOption2" value="2">Latest</option>
                  <option id="dropdownOption3" value="3">Oldest</option>
                  <option id="dropdownOption4" value="4">Price: Low to High</option>
                  <option  id="dropdownOption5" value="5">Price: High to Low</option>
                  
              </select>
            </div>
            <ul class="grid-view">
              <li class="column-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20">
                  <g>
                    <rect width="4.88136" height="5.10638" rx="2.44068" />
                    <rect y="7.44678" width="4.88136" height="5.10638" rx="2.44068" />
                    <rect y="14.8937" width="4.88136" height="5.10638" rx="2.44068" />
                    <rect x="7.11865" width="4.88136" height="5.10638" rx="2.44068" />
                    <rect x="7.11865" y="7.44678" width="4.88136" height="5.10638" rx="2.44068" />
                    <rect x="7.11865" y="14.8937" width="4.88136" height="5.10638" rx="2.44068" />
                  </g>
                </svg>
              </li>
              <li class="column-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <g clip-path="url(#clip0_1610_1442)">
                    <rect width="5.10638" height="5.10638" rx="2.55319" />
                    <rect y="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect y="14.8937" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect x="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect x="7.44678" y="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect x="7.44678" y="14.8937" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect x="14.8936" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect x="14.8936" y="7.44678" width="5.10638" height="5.10638" rx="2.55319" />
                    <rect x="14.8936" y="14.8937" width="5.10638" height="5.10638" rx="2.55319" />
                  </g>
                </svg>
              </li>
              <li class="column-4 active">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <g clip-path="url(#clip0_1610_1453)">
                    <rect width="3.64741" height="3.64741" rx="1.8237" />
                    <rect y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect y="16" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="5.31909" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="5.31909" y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="5.31909" y="16" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="10.6382" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="16.3525" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="10.6384" y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="16.3525" y="8.17627" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="10.6382" y="16" width="3.64741" height="3.64741" rx="1.8237" />
                    <rect x="16.3525" y="16" width="3.64741" height="3.64741" rx="1.8237" />
                  </g>
                </svg>
              </li>
            </ul>
          </div>
        </div>
        <div class="list-grid-product-wrap">
          <div class="row g-4 mb-60">
            
            <div class="appendText"></div>
            
            <div class="ajax-loading text-center" >
                <img src="{{ asset('images/uploads/loading.gif') }}" alt="loading" />
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
            <div class="inner-pagination-area">
              <ul class="paginations">
                <li class="page-item active">
                  <a href="#">01</a>
                </li>
                <li class="page-item">
                  <a href="#">02</a>
                </li>
                <li class="page-item">
                  <a href="#">03</a>
                </li>
                <li class="page-item paginations-button">
                  <a href="#">
                    <svg width="16" height="13" viewBox="0 0 16 13" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.557 10.1026L1.34284 1.89603M15.557 10.1026C12.9386 8.59083 10.8853 3.68154 12.7282 0.489511M15.557 10.1026C12.9386 8.59083 7.66029 9.2674 5.81744 12.4593" stroke-width="0.96" stroke-linecap="round" />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

   
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('javaScript')


<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
      
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });

     
    });


    // function checkInputs() {
    
    //     alert($('input[name="search_latitude"]').val().length);

    //     if ($(".city_search_box").val().length > 0 && $('input[name="search_latitude"]').val().length > 0) {
    //         $('.search_btn').removeAttr('disabled');
    //     } else if ($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0) {
    //         $('.search_btn').attr('disabled', 'disabled');
    //     } else {
    //         $('.search_btn').attr('disabled', 'disabled');
    //     }
    // }

    var placeSelected = false;

   function initialize() {
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



            $('input[name="search_latitude"]').val(place.geometry.location.lat());  // Lat Long
            $('input[name="search_longitude"]').val(place.geometry.location.lng());  // Lat Long
            

            var value = document.getElementById('searchTextField').value;
            
            

            var text_=$(this);
            // var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            var location = new RegExp('/^([^,]+,){3}[^,]+$/');
            
                
            
            // if(value.length < 15 || location.test(value) == false)
            if (!place.geometry && value.length > 0)
            {
                placeSelected = false;
                // $('.search_btn').attr('disabled', 'disabled');

                if($(input).parent().children(".error-li").length<1)
                {
                    // $(input).parent().append('<li class="error-li"> Select proper location</li>');
                    // $(input).css({"border": "1px solid #d75d54"});
                    // from_error['searchTextField']="Invalid Donation Address";

                    $('input[name="search_latitude"]').val('');  // Lat Long
                    $('input[name="search_longitude"]').val('');  // Lat Long
                    
                }


            }
            else 
            {
                
                placeSelected = true;
                // $('.search_btn').removeAttr('disabled');

                $(input).next(".error-li").remove();
                $(input).next().next(".error-li").remove();
                $(input).next().next().next(".error-li").remove();
                $(input).css({"border": "1px solid #00a651"});


            }

        });
   }
    google.maps.event.addDomListener(window, 'load', initialize);

    $('input[name="city_search_box"]').bind('keyup change',function(){
            var text_=$(this);
            // var location = new RegExp('^[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]+\,[a-zA-Z0-9 ]{3}');
            var location = new RegExp('/^([^,]+,){3}[^,]+$/');
            
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
                    // text_.parent().append('<li class="error-li"> Select proper location</li>');
                    // $(this).css({"border": "1px solid #d75d54"});
                    // from_error['text']="Invalid address";

                    $('input[name="search_latitude"]').val('');  // Lat Long
                    $('input[name="search_longitude"]').val('');  // Lat Long

                    // $('.search_btn').attr('disabled', 'disabled');

                }
            }
            else {
                
                placeSelected = false;
                // $('.search_btn').removeAttr('disabled');                

                $(this).next(".error-li").remove();
                $(this).next().next(".error-li").remove();
                $(this).next().next().next(".error-li").remove();
                $(this).css({"border": "1px solid #00a651"});

                
            }
        });


    

      $("#city_search_box").autocomplete({
        source: function(request, response) {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });
                $.ajax({
                    type: "POST",
                    url: "{{ route('home.search.city') }}",
                    dataType: "json",
                    data: {
                        city : request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
        minLength: 2,
      });
       

      
    // $("#city_search_box").on("change paste keyup", function(){

    //     // alert($('input[name="search_latitude"]').val().length);
        
    //     // // if($(".city_search_box").val().length > 0 && !empty($('input[name="search_latitude"]').val())){
    //     // if($(".city_search_box").val().length > 0 && $('input[name="search_latitude"]').val().length > 0){
    //     //     $('.search_btn').removeAttr('disabled');
    //     // }else if($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0){
    //     //      $('.search_btn').attr('disabled','disabled');
    //     // }
    //     // else
    //     // {
    //     //     $('.search_btn').attr('disabled','disabled');
    //     // }
    // });

    $(".category_box").on("change paste keyup",function(){
        if($(".category_box").val().length > 0){
            $('.search_btn').removeAttr('disabled');
        }else if($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0){
             $('.search_btn').attr('disabled','disabled');
        }
    });

    $(".word_box").on("change paste keyup",function(){
        if($(".word_box").val().length > 0){
            $('.search_btn').removeAttr('disabled');
        }else if($(".category_box").val().length == 0 && $(".city_search_box").val().length == 0 && $(".word_box").val().length == 0){
             $('.search_btn').attr('disabled','disabled');
        }
    });  

</script>

<script>


 // Fetch URL from address bar and prepare for function 
  //haresh start
  var str=window.location.href;
  //alert(str);
  var last = str.substring(str.lastIndexOf("donation-near-me/") + 17, str.length);
  //alert(last);
  var end_array=[];

           var convert_to_array = last.split('/');
            for(var i=0; i < convert_to_array.length; i++){
                const key_value = convert_to_array [i].split(/-(.*)/s);
                end_array[key_value [0]] = key_value [1];
            }

            console.log(end_array);
            const keys=Object.keys(end_array);
            console.log(keys);
            for(let k of keys ){
              
              if(k=='city'){
                
                $('.city_search_box').val(end_array[k].replace(/-/g,' '));
              }
              
              


              if(k=='lat'){
                
                $('#lat').val(end_array[k].replace(/-/g,' '));
              }
              if(k=='lon'){
                
                $('#lon').val(end_array[k].replace(/-/g,' '));
              }
              
              var dist_frm = '0';
              if(k=='dist_frm'){
                
                $('input[name="dist_frm"]').val(end_array[k].replace(/-/g,' '));
                $('#dist_range').text(end_array[k].replace(/-/g,' ') + ' - ');  // Distance to

                dist_frm = end_array[k].replace(/-/g,' ');
              }

              if(k=='dist_to'){
                
                $('input[name="dist_to"]').val(end_array[k].replace(/-/g,' '));
                $('#dist_range').text(dist_frm + ' - ' + end_array[k].replace(/-/g,' '));  // Distance to
              }

              if(k=='dist_unt'){
                $('input[name="dist_unt"]').val(end_array[k].replace(/-/g,' '));
                $('#dist_unt').text(end_array[k].replace(/-/g,' '));
              }




              if(k=='cdd'){
                
                $('.category_box').val(end_array[k].replace(/-/g,' '));
                //Cloths-&-Accessories
              }
              if(k=='find'){
                
                $('.word_box').val(end_array[k].replace(/-/g,' '));
              }

              if(k=='ut'){
               // alert(end_array[k]);
                 var convert_ut_array = end_array[k].split('-aNd-');

                console.log(convert_ut_array);
               // alert(end_array[k]);
                  for(let u=0;u<convert_ut_array.length;u++ ){
                      $("input[name=ut]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_ut_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='urgent'){
               // alert(end_array[k]);
                 var convert_all_array = end_array[k].split('-aNd-');
                //console.log(convert_all_array);

                  for(let u=0;u<convert_all_array.length;u++ ){
                      $("input[id=urgentitem]").each( function () {
                         if(true){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

               if(k=='dd'){
                        // alert(end_array[k].replace('-',' '));
                        // alert($("option[id=dropdownOption"+end_array[k]+"]").text());
              
                          $("option[id=dropdownOption"+end_array[k]+"]").prop("selected", true);
                     
              }

              if(k=='ct'){
               // alert(end_array[k]);
                 var convert_ct_array = end_array[k].split('-aNd-');
                //console.log(convert_ct_array);

                  for(let u=0;u<convert_ct_array.length;u++ ){
                      $("input[name=ct]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_ct_array[u].replace(/-/g,' ')){
                         
                            $(this).prop("checked", true);
                            


                         }
                     });
                    }
              }

              if(k=='st'){
               // alert(end_array[k]);
                 var convert_st_array = end_array[k].split('-aNd-');
                //console.log(convert_st_array);

                  for(let u=0;u<convert_st_array.length;u++ ){
                      $("input[name=st]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_st_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

               if(k=='sp'){
               // alert(end_array[k]);
                 var convert_sp_array = end_array[k].split('-aNd-');
                //console.log(convert_sp_array);

                  for(let u=0;u<convert_sp_array.length;u++ ){
                      $("input[name=sp]").each( function () {

                        const lastIndex = convert_sp_array[u].lastIndexOf('-');

                        const replacement = ' ';

                        const replaced =
                          convert_sp_array[u].substring(0, lastIndex) +
                          replacement +
                          convert_sp_array[u].substring(lastIndex + 1);

                         if($(this).closest("label").text().trim()==replaced){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }


              if(k=='cd'){
               // alert(end_array[k]);
                 var convert_cd_array = end_array[k].split('-aNd-');
                //console.log(convert_cd_array);

                  for(let u=0;u<convert_cd_array.length;u++ ){
                      $("input[name=cd]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_cd_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='cs'){
               // alert(end_array[k]);
                 var convert_cs_array = end_array[k].split('-aNd-');
                //console.log(convert_cs_array);

                  for(let u=0;u<convert_cs_array.length;u++ ){
                      $("input[name=cs]").each( function () {
                         if( $(this).closest("label").text().trim()==convert_cs_array[u].replace(/-/g,' ')){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='td'){
               // alert(end_array[k]);
                 var convert_td_array = end_array[k].split('-aNd-');
                //console.log(convert_td_array);

                  for(let u=0;u<convert_td_array.length;u++ ){
                      $("input[name=td]").each( function () {
                         if($(this).closest("label").text().trim()==convert_td_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='sx'){
               // alert(end_array[k]);
                 var convert_gender_array = end_array[k].split('-aNd-');
                //console.log(convert_gender_array);

                  for(let u=0;u<convert_gender_array.length;u++ ){
                      $("input[name=gender]").each( function () {
                         if( $(this).closest("label").text().trim().toLowerCase()==convert_gender_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }


              if(k=='ag'){
               // alert(end_array[k]);
                 var convert_age_array = end_array[k].split('-aNd-');
                //console.log(convert_age_array);

                  for(let u=0;u<convert_age_array.length;u++ ){
                      $("input[name=age]").each( function () {
                         if( $(this).closest("label").text().trim().toLowerCase()==convert_age_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }

              if(k=='all'){
               // alert(end_array[k]);
                 var convert_all_array = end_array[k].split('-aNd-');
                //console.log(convert_all_array);

                  for(let u=0;u<convert_all_array.length;u++ ){
                      $("input[name=all]").each( function () {
                         if( $(this).closest("label").text().trim().toLowerCase()==convert_all_array[u].replace(/-/g,' ') ){
                         
                          $(this).prop("checked", true);
                         }
                     });
                    }
              }










            }

//haresh end
    var timer = null;
    $('.search_text').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.search_text_autocomplate') }}", 
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#search_text').fadeIn();  
            $('#search_text').html(data);
          }
         });
        } , 30)
    });

    var timer = null;
    $('.city_search_box').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.city_search') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){

           $('#cityBrowsers').fadeIn();  
            $('#cityBrowsers').html(data);
          }
         });
        } , 30)
    });
// $(function(){

$(document).ready(function() {


    

    // Trigger an event when slider value changes to get the tooltip value
      $('#distance_normal_input').on('slideStop', function() {
          // var tooltipValue = getTooltipValue();
          // console.log("Value after colon:", tooltipValue);

          var tooltipText = $('.distance_normal .tooltip-inner').text();

          var valueBeforeColon = tooltipText.split(':')[0].trim();
          var valueAfterColon = tooltipText.split(':')[1].trim();

          $('input[name="dist_frm"]').val(valueBeforeColon);  // Distance from
          $('input[name="dist_to"]').val(valueAfterColon);  // Distance to

          $('#dist_range_normal').text(valueBeforeColon + ' - ' + valueAfterColon);  // Distance to
          $('#dist_range_model').text(valueBeforeColon + ' - ' + valueAfterColon);  // Distance to
          // alert('distance_normal_input');

          SearchFormSubmit();
      });

      // Trigger an event when slider value changes to get the tooltip value
      $('#distance_model_input').on('slideStop', function() {
          // var tooltipValue = getTooltipValue();
          // console.log("Value after colon:", tooltipValue);

          var tooltipText = $('.distance_model .tooltip-inner').text();

          var valueBeforeColon = tooltipText.split(':')[0].trim();
          var valueAfterColon = tooltipText.split(':')[1].trim();

          $('input[name="dist_frm"]').val(valueBeforeColon);  // Distance from
          $('input[name="dist_to"]').val(valueAfterColon);  // Distance to

          $('#dist_range_normal').text(valueBeforeColon + ' - ' + valueAfterColon);  // Distance to
          $('#dist_range_model').text(valueBeforeColon + ' - ' + valueAfterColon);  // Distance to
          // alert('distance_model_input');

          SearchFormSubmit();
      });

      
      // Distance Unit 
      $('#dist_unt').on('DOMSubtreeModified',function(){
          
          var dist_unit_text = $('#dist_unt').text();
          $('input[name="dist_unt"]').val(dist_unit_text);  // Distance to

          // alert(dist_unit_text);

          SearchFormSubmit();
      });
   
   // function initializeAddress() {
   //    var input = document.getElementById('city_search_box');
   //    var options = {
   //      types: ['geocode'] //this should work !
   //    };
   //    var autocomplete = new google.maps.places.Autocomplete(input, options);
   //  }
   
   // google.maps.event.addDomListener(window, 'load', initializeAddress);
   //  var page = 1;      
   //  $.ajaxSetup({
   //      headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //      }
   //  });
	
    
   ////// Working ajax_call and checked by Haresh
    function call_ajax(url,data){
      
      
      // alert(url);
      //console.log(data);
      //alert(JSON.stringify(data));


      const myJSON = JSON.stringify(data);
      localStorage.setItem("testJSON", myJSON);

      // Retrieving data:
      let text = localStorage.getItem("testJSON");
      let obj = JSON.parse(text);

      //alert(myJSON);
              

      // for(let u=0;u<obj.looking_for.length;u++ ){
       
      //      document.getElementById("demo").innerHTML=obj.looking_for[u].value;
      //      }
      
      // }

      

      // Display URL in address bar 
      var str = window.location.href;
      var last = str.substring(str.lastIndexOf("donation-near-me/") + 17, str.length);

      // data.append(end_array);
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type        : 'POST',
            url         : url, // the url where we want to POST
            data        : {data: data},
            beforeSend: function()
            {
                $('.ajax-loading').show();

                    $('.appendText').children().hide();
            },
            success: function(data){
                if(data.length == 0){
                    $('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
                    return;
                }
                $('.ajax-loading').hide(); 
                $('.appendText').html(data);

              
                  // Set URL
                   $('title').text('Doncen | Donation Center near me');
                                $('meta[name="title"]').attr('content','Doncen | Donation Center near me');
                                $('meta[property="og:title"]').attr('content','Doncen | Donation Center near me');
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation Center near me');


                   // var url_common2 = str.substring(0,str.lastIndexOf("/") + 1);
                   var url_common = str.substring(0,str.lastIndexOf("donation-near-me/") + 17);

                   

                   // var url_common = 'https://doncen.org/donation-near-me/';
                   var meta_value='';
                  
                  let city_search_box_str='';  
                  if($('.city_search_box').val()!=''){
                   city_search_box_str=$('.city_search_box').val();  

                        city_search_box_str=city_search_box_str.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+city_search_box_str;
                         $('title').text('Doncen | Donation in '+city_search_box_str);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+city_search_box_str);

                         url_common=url_common+'city-'+city_search_box_str+'/';

                  }
                  else
                  {
                    city_search_box_str=' near you';
                  }



                  let lat_search='';  
                  if($('#lat').val()!=''){
                   lat_search=$('#lat').val();  

                        lat_search=lat_search.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+lat_search;
                         $('title').text('Doncen | Donation in '+lat_search);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+lat_search);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+lat_search);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+lat_search);

                         url_common=url_common+'lat-'+lat_search+'/';

                  }

                  let lon_search='';  
                  if($('#lon').val()!=''){
                   lon_search=$('#lon').val();  

                        lon_search=lon_search.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+lon_search;
                         $('title').text('Doncen | Donation in '+lon_search);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+lon_search);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+lon_search);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+lon_search);

                         url_common=url_common+'lon-'+lon_search+'/';

                  }

                  let dist_frm='';  
                  if($('input[name="dist_frm"]').val()!=''){
                   dist_frm=$('input[name="dist_frm"]').val();  

                        dist_frm=dist_frm.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+dist_frm;
                         $('title').text('Doncen | Donation in '+dist_frm);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+dist_frm);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+dist_frm);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+dist_frm);

                         url_common=url_common+'dist_frm-'+dist_frm+'/';

                  }


                  let dist_to='';  
                  if($('input[name="dist_to"]').val()!=''){
                   dist_to=$('input[name="dist_to"]').val();  

                        dist_to=dist_to.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+dist_to;
                         $('title').text('Doncen | Donation in '+dist_to);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+dist_to);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+dist_to);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+dist_to);

                         url_common=url_common+'dist_to-'+dist_to+'/';

                  }


                  let dist_unt='';  
                  if($('input[name="dist_unt"]').val()!=''){
                   dist_unt=$('input[name="dist_unt"]').val();  

                        dist_unt=dist_unt.replace(/ /g,'-');
                         

                         meta_value=meta_value+','+dist_unt;
                         $('title').text('Doncen | Donation in '+dist_unt);

                          $('meta[name="title"]').attr('content','Doncen | Donation in '+dist_unt);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation in '+dist_unt);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation in '+dist_unt);

                         url_common=url_common+'dist_unt-'+dist_unt+'/';

                  }
                  



                  let category_box_str='';  
                  if($('.category_box').val()!=''){
                   category_box_str=$('.category_box').val();  

                        category_box_str=category_box_str.replace(/ /g,'-');
                         url_common=url_common+'cdd-'+category_box_str+'/';

                         meta_value=meta_value+','+category_box_str;
                         $('title').text('Doncen | Donation of '+category_box_str+' in '+city_search_box_str);

                         $('meta[name="title"]').attr('content','Doncen | Donation of '+category_box_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+category_box_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+category_box_str+' in '+city_search_box_str);


                  }

                  let word_box_str='';  
                  if($('.word_box').val()!=''){
                   word_box_str=$('.word_box').val();  

                        word_box_str=word_box_str.replace(/ /g,'-')
                         url_common=url_common+'find-'+word_box_str+'/';
                         meta_value=meta_value+','+word_box_str;


                  }

                 
                  //ut - looking for

                  // let fields = $(".myForm").serializeArray();
                  // let ut_str='';
                  // let ut_arr=[];
                       
                  //  jQuery.each(fields, function(i, field){
                  //     ut_arr.push(field.value);
                  //  });
                  //  ut_arr = [...new Set(ut_arr)];
                  //   ut_str=ut_arr.join(',');

                  //  if(ut_str!=''){
                  //        url_common=url_common+'ut='+ut_str+'+';

                  //  }

                  let ut_str='';
                  let ut_arr=[];
                  let url_str_arr=[];
                  let url_str='';
                   let fields=obj.looking_for;
                   jQuery.each(fields, function(i, field){
                      ut_arr.push(field.value);
                      $("input[name=ut]").each( function () {
   
                            if($(this).val()==field.value){
                              meta_value=meta_value+','+$(this).closest("label").text().trim();
                               url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));
                              //alert(meta_value);
                            }
                       });
                   });
                   ut_arr = [...new Set(ut_arr)];
                    ut_str=ut_arr.join(',');

                     url_str_arr = [...new Set(url_str_arr)];
                    url_str=url_str_arr.join('-aNd-');

                   
                   if(ut_str!=''){
                     //    url_common=url_common+'ut-'+ut_str+'/';

                   }

                   if(url_str!=''){
                         url_common=url_common+'ut-'+url_str+'/';

                   }

                   //category

                   let ct_str='';
                  let ct_arr=[];
                         
                  let ct_title_arr=[];

                  url_str_arr=[];
                  url_str='';

                  fields=obj.categoryForm;
                   jQuery.each(fields, function(i, field){
                      ct_arr.push(field.value);
                      

                        $("input[name=ct]").each( function () {
   
                            if($(this).val()==field.value){
                              meta_value=meta_value+','+$(this).closest("label").text().trim();
                              ct_title_arr.push($(this).closest("label").text().trim());
                               url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                            }
                       });

                   });
                   ct_arr = [...new Set(ct_arr)];
                    ct_str=ct_arr.join(',');

                    url_str_arr = [...new Set(url_str_arr)];
                    url_str=url_str_arr.join('-aNd-');


                   if(ct_str!=''){
                       //  url_common=url_common+'ct-'+ct_str+'/';

                          if(url_str!=''){
                                 url_common=url_common+'ct-'+url_str+'/';

                           }
              //alert(url_str);

                        //$('checkbox[name=ct]').
                        
                         var ct_title_arr2= [...new Set(ct_title_arr)];
                           var  ct_title_str=ct_title_arr2.join(', ');

                       
                                $('title').text('Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);

                                 $('meta[name="title"]').attr('content','Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+ct_title_str+' in '+city_search_box_str);

                       
                         //sub catgory

                           let st_str='';
                          let st_arr=[];
                          let st_title_arr=[];

                           url_str_arr=[];
                          url_str='';

                           fields=obj.subCategoryForm;
                           jQuery.each(fields, function(i, field){
                              st_arr.push(field.value);

                                  $("input[name=st]").each( function () {
       
                                      if($(this).val()==field.value){
                                        meta_value=meta_value+','+$(this).closest("label").text().trim();
                                        //alert(meta_value);
                                        st_title_arr.push($(this).closest("label").text().trim());
                                         url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));
                                      }
                                 });
                           });
                           st_arr = [...new Set(st_arr)];
                            st_str=st_arr.join(',');

                            url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');


                           if(st_str!=''){
                              //   url_common=url_common+'st-'+st_str+'/';

                                 if(url_str!=''){
                                    url_common=url_common+'st-'+url_str+'/';

                                  }


                                var st_title_arr2 = [...new Set(st_title_arr)];
                                var st_title_arr_str=st_title_arr2.join(', ');

                                $('title').text('Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                 $('meta[name="title"]').attr('content','Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                //specification
                                let title_sp='';

                                 let sp_str='';
                                let sp_arr=[];
                          let sp_title_arr=[];

                           url_str_arr=[];
                          url_str='';

                                 fields=obj.specificationForm;
                                 jQuery.each(fields, function(i, field){
                                    sp_arr.push(field.value);
                                      $("input[name=sp]").each( function () {
   
                                          if($(this).val()==field.value){
                                            meta_value=meta_value+','+$(this).closest("label").text().trim();
                                            title_sp=title_sp+' '+$(this).closest("label").text().trim();
                                           
                                        sp_title_arr.push($(this).closest("label").text().trim());

                                         url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                            //alert(meta_value);

                                          }
                                     });
                                 });

                                 

                                 sp_arr = [...new Set(sp_arr)];
                                  sp_str=sp_arr.join(',');

                                  url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                                 

                                 if(sp_str!=''){
                                    //   url_common=url_common+'sp-'+sp_str+'/';

                                       if(url_str!=''){
                                             url_common=url_common+'sp-'+url_str+'/';

                                       }

                                         var  sp_title_arr2 = [...new Set(sp_title_arr)];
                                        var sp_title_str=sp_title_arr2.join(', ');



                                      $('title').text('Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                       $('meta[name="title"]').attr('content','Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[property="og:title"]').attr('content','Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);
                                $('meta[name="twitter:title"]').attr('content','Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str);

                                     //$('meta[name=description]').attr('content', final_meta);
                                 }

                           }

                          

                   }

                   


                    let cd_str='';
                  let cd_arr=[];

                   url_str_arr=[];
                          url_str='';


                    fields=obj.conditionForm;
                   jQuery.each(fields, function(i, field){
                      cd_arr.push(field.value);
                          $("input[name=cd]").each( function () {
       
                                if($(this).val()==field.value){
                                  meta_value=meta_value+','+$(this).closest("label").text().trim();

                                   url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                  //alert(meta_value);
                                }
                           });
                   });
                   cd_arr = [...new Set(cd_arr)];
                    cd_str=cd_arr.join(',');

                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');


                   if(cd_str!=''){
                      //   url_common=url_common+'cd-'+cd_str+'/';

                   }
                    if(url_str!=''){
                         url_common=url_common+'cd-'+url_str+'/';

                   }


                   let cs_str='';
                  let cs_arr=[];
                  url_str_arr=[];
                          url_str='';

                    fields=obj.considerationTypeForm;
                   jQuery.each(fields, function(i, field){
                      cs_arr.push(field.value);

                          $("input[name=cs]").each( function () {
       
                                if($(this).val()==field.value){
                                  meta_value=meta_value+','+$(this).closest("label").text().trim();
                                   url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                  //alert(meta_value);
                                }
                           });
                   });
                   cs_arr = [...new Set(cs_arr)];
                    cs_str=cs_arr.join(',');

                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');


                   if(cs_str!=''){
                       //  url_common=url_common+'cs-'+cs_str+'/';

                   }
                   if(url_str!=''){
                         url_common=url_common+'cs-'+url_str+'/';

                   }

                   let td_str='';
                  let td_arr=[];
                  url_str_arr=[];
                          url_str='';

                    fields=obj.donationTypeForm;
                   jQuery.each(fields, function(i, field){
                      td_arr.push(field.value);

                          $("input[name=td]").each( function () {
       
                                if($(this).val()==field.value){
                                  // meta_value=meta_value+','+$(this).closest("label").text().trim();
                                  td_meta_value = $(this).closest("label").text().trim();
                                   url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                                  //alert(meta_value);
                                }
                           });

                   });
                   td_arr = [...new Set(td_arr)];
                    td_str=td_arr.join(',');
                    url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(td_str!=''){
                       //  url_common=url_common+'td-'+td_str+'/';

                   }
                    if(url_str!=''){
                         url_common=url_common+'td-'+url_str+'/';

                   }




                  let gender_str='';
                  let gender_arr=[];
                  url_str_arr=[];
                          url_str='';

                    fields=obj.preferenceTypeFormGenderList;
                   jQuery.each(fields, function(i, field){
                      if(field.value=='gender'){
                        gender_arr.push(field.value);
                       url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                      }else{
                        
                      }
                      
                   });
                   gender_arr = [...new Set(gender_arr)];
                    gender_str=gender_arr.join(',');
                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(gender_str!=''){
                         url_common=url_common+'sx-'+gender_str+'/';

                   }

                   //  if(url_str!=''){
                   //       url_common=url_common+'sx-'+url_str+'/';

                   // }


                  let age_str='';
                  let age_arr=[];
                   url_str_arr=[];
                          url_str='';

                   fields=obj.preferenceTypeFormGenderList;
                   jQuery.each(fields, function(i, field){
                      if(field.value=='age'){
                        age_arr.push(field.value);
                       url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                      }
                      
                   });
                   age_arr = [...new Set(age_arr)];
                    age_str=age_arr.join(',');
                    url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(age_str!=''){
                         url_common=url_common+'ag-'+age_str+'/';

                   }
                    if(url_str!=''){
                       //  url_common=url_common+'ag-'+url_str+'/';

                   }

                   let all_str='';
                  let all_arr=[];
                  url_str_arr=[];
                          url_str='';
                    fields=obj.preferenceTypeFormGenderList;
                   jQuery.each(fields, function(i, field){
                    if(field.value=='all'){
                       all_arr.push(field.value);
                       url_str_arr.push($(this).closest("label").text().trim().replace(/ /g,'-'));

                      }

                      
                   });
                   all_arr = [...new Set(all_arr)];
                    all_str=all_arr.join(',');
                     url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                   if(all_str!=''){
                         url_common=url_common+'all-'+all_str+'/';

                   }
                   if(url_str!=''){
                       //  url_common=url_common+'all-'+url_str+'/';

                   }




                   if(obj.urgentitem){

                        let urgent_str='';
                        let urgent_arr=[];
                        url_str_arr=[];
                          url_str='';

                        fields=obj.urgentitem;
                       // alert(fields);

                       //jQuery.each(fields, function(i, field){
                        if(fields==3){
                           urgent_arr.push(fields);
                         url_str_arr.push('yes');

                        }

                         if(fields=='urgent'){
                         // url_str_arr.push('urgent');
                         
                        }

                          
                        // });
                        urgent_arr = [...new Set(urgent_arr)];
                        urgent_str=urgent_arr.join(',');
                        url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                        if(urgent_str!=''){
                           //  url_common=url_common+'urgent-'+urgent_str+'/';

                        }
                         if(url_str!=''){
                          url_common=url_common+'urgent-'+url_str+'/';

                         }


                   }
                   
                   if(obj.dropdownSearch){

                        let dropdown_str='';
                        let dropdown_arr=[];

                        url_str_arr=[];
                          url_str='';

                        fields=obj.dropdownSearch;
                       // alert(fields);

                       //jQuery.each(fields, function(i, field){
                       // if(fields==3){
                           dropdown_arr.push(fields);
                       url_str_arr.push(fields);

                       // }

                          
                        // });
                        dropdown_arr = [...new Set(dropdown_arr)];
                        dropdown_str=dropdown_arr.join(',');
                        
                         url_str_arr = [...new Set(url_str_arr)];
                            url_str=url_str_arr.join('-aNd-');

                        if(dropdown_str!=''){
                            url_common=url_common+'dd-'+dropdown_str+'/';


                        }

                         if(url_str!=''){
                          // url_common=url_common+'dd-'+$("option[id=dropdownOption"+dropdown_str+"]").text().trim().replace(/ /g,'-')+'/';

                         }


                   }
                   
                   

                    
                    // var dropdownSearch=$('.dropdownSearch').val();
                    // if($("#urgentitem").prop('checked') == true){
                    //      var urgentitem=$('.urgentitem').val();
                    // }
                    
                     // var dropdownSearchd=$('.dropdownage').val();

                   //remove last + sign
                  
                  //let first_char=meta_value.slice(0);
                  //if(first_char==','){

                   // meta_value.substring(1)
                    
                    meta_value =  meta_value.substring(1);
                  //}
                  let meta_arr=meta_value.split(',');
                  meta_arr=[...new Set(meta_arr)];
                  meta_value=meta_arr.join(', ');

                  final_meta = 'Doncen is the next generation Donation Center near me which is running online on www.doncen.org i.e. worlds largest donation portal. Here you may donate anything, whatever you can think at any time any where world wide. You may become a Donor , Helper of Donor , Donee , Helper of Donee. You can give or take anything as donation near your place which might be more than money ' +meta_value+'.';

                  //alert(meta_arr);

                    $('meta[name=description]').attr('content', final_meta);

                    if(meta_value != '')
                      {
                        $('meta[name=keywords]').attr('content', meta_value);
                      }
                      else
                      {
                          $('meta[name=keywords]').attr('content', 'Doncen | Donation of '+sp_title_str+' of '+st_title_arr_str+' under '+ct_title_str+' in '+city_search_box_str); 
                      }


                  let last_char=url_common.slice(-1);
                  if(last_char=='/'){
                    
                    url_common = url_common.slice(0, url_common.length - 1);
                  }


                  //alert(url_common);


                window.history.replaceState("", "",url_common);


                //window.addEventListener('popstate');
	
            }
        });
    }
	
	
	@if(!Session::has('search'))
		/* call_ajax("{{ URL::route('web.home.getItemOnLoad')}}",{page: 0}); */
		SearchFormSubmit();
	@endif
   
    /* New Js Code Start*/
	
	
	
	/* For Home Page Re-Direct Search Values Call  End */
    $(".location_search_form").submit(function(e){
        e.preventDefault();

        
        if($('input[name="city_search_box"]').val()!= '')
        {
          if(!placeSelected)
          {
            $('input[name="city_search_box"]').val('');  //Empty if it is not selected from google
          } 
        }
          


         /*Get all the forms data*/
         /* var dropdownSearch=$('.dropdownSearch').val();
         var search_form=$('.search_form').serializeArray();
         var looking_for=$('.myForm').serializeArray();
         var categoryForm=$('.categoryForm').serializeArray();
         var subCategoryForm=$('.subCategoryForm').serializeArray();
         var specificationForm=$('.specificationForm').serializeArray();
         var conditionForm=$('.conditionForm').serializeArray();
         var considerationTypeForm=$('.considerationTypeForm').serializeArray();
         var donationTypeForm=$('.donationTypeForm').serializeArray();
         var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
            console.log($('.search_form').serializeArray());
            console.log($('.myForm').serializeArray());
         
        call_ajax("{{ route('home.searchPage.searchItem') }}",{
                    page: 1,
                    dropdownSearch:dropdownSearch,
                    data: $('.search_form').serializeArray(),
                    looking_for: $('.myForm').serializeArray(),
                    categoryForm: $('.categoryForm').serializeArray(),
                    subCategoryForm:$('.subCategoryForm').serializeArray(),
                    specificationForm:$('.specificationForm').serializeArray(),
                    conditionForm:$('.conditionForm').serializeArray(),
                    considerationTypeForm:$('.considerationTypeForm').serializeArray(),
                    donationTypeForm:$('.donationTypeForm').serializeArray(),
                    preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
        }); */
		SearchFormSubmit();
    });

    /* New Js Code End*/

    $('.urgentitem').change(function(){


        SearchFormSubmit();
    });
/* For Home Page Re-Direct Search Values Call  Start */
	/*Get all the forms data*/
			function SearchFormSubmit(value)
			{
					
          // alert('Hi');
          // alert('In');dropdownage
                    /*Get all the forms data*/
					 var dropdownSearch=$('.dropdownSearch').val();
                   
                   if($("#urgentitem").prop('checked') == true){
                         var urgentitem=$('.urgentitem').val();
                    }
                    
            var dropdownSearchd=$('.dropdownage').val();
                     // alert(dropdownSearch);
           var location_search_form=$('.location_search_form').serializeArray();
					 var search_form=$('.search_form').serializeArray();
          
					 //var looking_for=$('.myForm').serializeArray();
           // var categoryForm=$('.categoryForm').serializeArray();
           //           console.log(categoryForm); 
           // var subCategoryForm=$('.subCategoryForm').serializeArray();
           // var specificationForm=$('.specificationForm').serializeArray();
           // var conditionForm=$('.conditionForm').serializeArray();
           // var considerationTypeForm=$('.considerationTypeForm').serializeArray();
           // var donationTypeForm=$('.donationTypeForm').serializeArray();
           // var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
          //haresh start
         // alert(value);
         // alert(dropdownSearch);
         // alert(window.innerWidth);


          // if(value=="normal" || (urgentitem > 0) ){
          if(window.innerWidth > 991){

           // alert('Yes');
             var distance=$('.distance_normal').serializeArray();
             var looking_for=$('.myForm_normal').serializeArray();
             var categoryForm=$('.categoryForm_normal').serializeArray();
             var subCategoryForm=$('.subCategoryForm_normal').serializeArray();
             var specificationForm=$('.specificationForm_normal').serializeArray();
             var conditionForm=$('.conditionForm_normal').serializeArray();
             var considerationTypeForm=$('.considerationTypeForm_normal').serializeArray();
             var donationTypeForm=$('.donationTypeForm_normal').serializeArray();
             var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList_normal').serializeArray();

             // console.log(looking_for); 
         }
         else{
            // alert('No');
            var distance=$('.distance_modal').serializeArray();
            var looking_for=$('.myForm_modal').serializeArray();
             var categoryForm=$('.categoryForm_modal').serializeArray();
             var subCategoryForm=$('.subCategoryForm_modal').serializeArray();
             var specificationForm=$('.specificationForm_modal').serializeArray();
             var conditionForm=$('.conditionForm_modal').serializeArray();
             var considerationTypeForm=$('.considerationTypeForm_modal').serializeArray();
             var donationTypeForm=$('.donationTypeForm_modal').serializeArray();
             var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList_modal').serializeArray(); 
         }
          
          console.log(distance);
          console.log(looking_for);
          console.log(categoryForm);
          console.log(subCategoryForm);
          console.log(specificationForm);
          console.log(conditionForm);
          console.log(considerationTypeForm);
          console.log(donationTypeForm);
          console.log(preferenceTypeFormGenderList);





					



				    let distance_jsonObject = distance.map(JSON.stringify);
            distance_uniqueSet = new Set(distance_jsonObject);
            distance = Array.from(distance_uniqueSet).map(JSON.parse);

            
            let looking_for_jsonObject = looking_for.map(JSON.stringify);
            looking_for_uniqueSet = new Set(looking_for_jsonObject);
            looking_for = Array.from(looking_for_uniqueSet).map(JSON.parse);

             let categoryForm_jsonObject = categoryForm.map(JSON.stringify);
            categoryForm_uniqueSet = new Set(categoryForm_jsonObject);
            categoryForm = Array.from(categoryForm_uniqueSet).map(JSON.parse);

            let subCategoryForm_jsonObject = subCategoryForm.map(JSON.stringify);
            subCategoryForm_uniqueSet = new Set(subCategoryForm_jsonObject);
            subCategoryForm = Array.from(subCategoryForm_uniqueSet).map(JSON.parse);

            let specificationForm_jsonObject = specificationForm.map(JSON.stringify);
            specificationForm_uniqueSet = new Set(specificationForm_jsonObject);
            specificationForm = Array.from(specificationForm_uniqueSet).map(JSON.parse);
            //alert(subCategoryForm_jsonObject);

            let conditionForm_jsonObject = conditionForm.map(JSON.stringify);
            conditionForm_uniqueSet = new Set(conditionForm_jsonObject);
            conditionForm = Array.from(conditionForm_uniqueSet).map(JSON.parse);

             let considerationTypeForm_jsonObject = considerationTypeForm.map(JSON.stringify);
            considerationTypeForm_uniqueSet = new Set(considerationTypeForm_jsonObject);
            considerationTypeForm = Array.from(considerationTypeForm_uniqueSet).map(JSON.parse);
            
             let donationTypeForm_jsonObject = donationTypeForm.map(JSON.stringify);
            donationTypeForm_uniqueSet = new Set(donationTypeForm_jsonObject);
            donationTypeForm = Array.from(donationTypeForm_uniqueSet).map(JSON.parse);

            let preferenceTypeFormGenderList_jsonObject = preferenceTypeFormGenderList.map(JSON.stringify);
            preferenceTypeFormGenderList_uniqueSet = new Set(preferenceTypeFormGenderList_jsonObject);
            preferenceTypeFormGenderList = Array.from(preferenceTypeFormGenderList_uniqueSet).map(JSON.parse);
          // console.log(looking_for);
           //haresh end
				// POPUP
				// 	 var looking_for=$('.myForm1').serializeArray();
				// 	 var categoryForm=$('.categoryForm1').serializeArray();
				// 	 var subCategoryForm=$('.subCategoryForm1').serializeArray();
				// 	 var specificationForm=$('.specificationForm1').serializeArray();
				// 	 var conditionForm=$('.conditionForm1').serializeArray();
				// 	 var considerationTypeForm=$('.considerationTypeForm1').serializeArray();
				// 	 var donationTypeForm=$('.donationTypeForm1').serializeArray();
				// 	 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList1').serializeArray();
					 
						// console.log($('.search_form').serializeArray());
						// console.log($('.myForm').serializeArray());
					
					// POPUP	
				// 		console.log($('.myForm1').serializeArray());
					 
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
            //haresh:end_array,
								page: 0 ,
								dropdownSearch:dropdownSearch,
                                dropdownSearchd:dropdownSearchd,
                                urgentitem:urgentitem,
                                // console.log(dropdownSearchd);
                location_data: $('.location_search_form').serializeArray(),
								data: $('.search_form').serializeArray(),
                distance:distance,
                
                looking_for:looking_for,
								// looking_for: $('.myForm').serializeArray(),
                categoryForm: categoryForm,
								// categoryForm: $('.categoryForm').serializeArray(),
                subCategoryForm:subCategoryForm,
								// subCategoryForm:$('.subCategoryForm').serializeArray(),
                specificationForm:specificationForm,
								// specificationForm:$('.specificationForm').serializeArray(),
                conditionForm:conditionForm,
								// conditionForm:$('.conditionForm').serializeArray(),
                considerationTypeForm:considerationTypeForm,
								// considerationTypeForm:$('.considerationTypeForm').serializeArray(),
                donationTypeForm:donationTypeForm,
								// donationTypeForm:$('.donationTypeForm').serializeArray(),
                preferenceTypeFormGenderList:preferenceTypeFormGenderList
								// preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
								
             
							// POPUP	
								// looking_for: $('.myForm1').serializeArray(),
								// categoryForm: $('.categoryForm1').serializeArray(),
								// subCategoryForm:$('.subCategoryForm1').serializeArray(),
								// specificationForm:$('.specificationForm1').serializeArray(),
								// conditionForm:$('.conditionForm1').serializeArray(),
								// considerationTypeForm:$('.considerationTypeForm1').serializeArray(),
								// donationTypeForm:$('.donationTypeForm1').serializeArray(),
								// preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList1').serializeArray()

			});
		}
		
	
	@if($homeCity!='' || $homeCategory!='' || $homeword!='' || $search_latitude != '')
			SearchFormSubmit();
	@endif
		


    //Get list of category and subcateegory
		$('.categoryClass').click(function() {
      //haresh start
        //remove  below comment 

       let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='myForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }
  
			SearchFormSubmit(value);
    });

	 //Get list of consideration
    $('.considerationType').click(function() {
      //haresh start
        //remove  below comment 

       let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='considerationTypeForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }
  
      SearchFormSubmit(value);
    });
  
	/* preference */
		$('.preference').click(function() {

       let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='preferenceTypeFormGenderList1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

			SearchFormSubmit(value);
    });	
    $('.selectCategory').click(function() {
       	
        var _token = $('input[name="_token"]').val();
        // alert(_token);
       
        let formId=$(this).closest('form').attr("id");
        let value='';
       
        if(formId=='categoryForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

        // SearchFormSubmit(value);
// $('.subcategories').empty();

        // alert('process');
        $('.subcategories').html('');
		$.ajax({
            type        : 'POST',
			// dataType    : 'JSON',
            url         : "{{ URL::route('search.category.subcategory') }}", // the url where we want to POST
            data        : {data: $('.categoryForm_'+value).serialize(), _token:_token},

            success:function(data){
                
                // alert('12');
                // alert(data);
                
                $('.subcategories').html(data);
                
            },
             error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error: ' + textStatus + ' ' + errorThrown);
                  }
        });

      $('.specificationHtml').html('');

      SearchFormSubmit(value);

     

    });

    //drop down search
    $("#dropdownSearch").on('change',function(){
      
			SearchFormSubmit();
    });

      $("#dropdownage").on('click',function(){
        // alert('hello');
            SearchFormSubmit();
    });

    //category wise search
    $(".donationTypeCategory").click(function() {

        let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='donationTypeForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

			SearchFormSubmit(value);
    });

    //anyConsideration wise search
   //  $("#considerationTypeForm").click(function() {
			// SearchFormSubmit();
   //  });

    //condition wise search
    $(".conditionInput").click(function() {

		 let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='conditionForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

      SearchFormSubmit(value);
    });
   
    $(document).on('click','.selectSubCategory',function(){

        let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='subCategoryForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }

		$('.specificationHtml').html('');
		 $.ajax({
				type        : 'POST',
				url         : "{{ URL::route('search.subcategory.specification') }}", // the url where we want to POST
				data        : {data: $('.subCategoryForm_'+value).serialize()},
				success: function(data){
					$('.specificationHtml').html(data);
				}
			});

     SearchFormSubmit(value);

    });
    
    $(document).on('click','.selectSpecifiction',function(){
          let formId=$(this).closest('form').attr("id");
       let value='';
       
        if(formId=='specificationForm1'){
        
         value='modal';
        }else{
        
           value='normal';
        
        }
    		SearchFormSubmit(value);
   });

});
</script>
<script type="text/javascript">
$(window).on('hashchange', function() {
	
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
			
		}
    }
});

/* Pagination Script */
$(document).ready(function()
{
    

    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
    @if($homeCategory!='')
      $(".selectCategory[data-in]").trigger( "click" );
    @endif
});


function updateCheckbox(value){
  // let lookingFor='looking'+value;
  //alert(value);
  // for(let u=0;u<convert_ut_array.length;u++ ){
  //                     $("input[name=ut]").each( function () {
  //                        if( $(this).val()==convert_ut_array[u] ){
                         
  //                         $(this).attr("checked", true);
  //                        }
  //                    });
  //                   }

        // if($(".lookingFor"+value).attr("checked",true)){
        //   $(".lookingFor"+value).attr("checked",false);
        // }else{
        //   $(".lookingFor"+value).attr("checked",true);
        // }
        //alert($(".lookingFor"+value).attr("checked"));
}

function getData(page){
					 var dropdownSearch=$('.dropdownSearch').val();
                       var dropdownSearchd=$('.dropdownage').val();
           var location_search_form=$('.location_search_form').serializeArray();
					 var search_form=$('.search_form').serializeArray();
           var distance=$('.distance').serializeArray();
					 var looking_for=$('.myForm').serializeArray();
					 var categoryForm=$('.categoryForm').serializeArray();
					 var subCategoryForm=$('.subCategoryForm').serializeArray();
					 var specificationForm=$('.specificationForm').serializeArray();
					 var conditionForm=$('.conditionForm').serializeArray();
					 var considerationTypeForm=$('.considerationTypeForm').serializeArray();
					 var donationTypeForm=$('.donationTypeForm').serializeArray();
					 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList').serializeArray();
					 
			    // POPUP
				// 	 var looking_for=$('.myForm1').serializeArray();
				// 	 var categoryForm=$('.categoryForm1').serializeArray();
				// 	 var subCategoryForm=$('.subCategoryForm1').serializeArray();
				// 	 var specificationForm=$('.specificationForm1').serializeArray();
				// 	 var conditionForm=$('.conditionForm1').serializeArray();
				// 	 var considerationTypeForm=$('.considerationTypeForm1').serializeArray();
				// 	 var donationTypeForm=$('.donationTypeForm1').serializeArray();
				// 	 var preferenceTypeFormGenderList=$('.preferenceTypeFormGenderList1').serializeArray();
					 
					 // 	console.log($('.search_form').serializeArray());
						// console.log($('.myForm').serializeArray());
					 
					//POPUP
					   // console.log($('.myForm1').serializeArray());
					
					
					
					call_ajax("{{ route('home.searchPage.searchItem') }}",{
								page: page,
								dropdownSearch:dropdownSearch,
                                dropdownSearchd:dropdownSearchd,
                location_data: $('.location_search_form').serializeArray(),
								data: $('.search_form').serializeArray(),
                distance: $('.distance').serializeArray(),
								looking_for: $('.myForm').serializeArray(),
								categoryForm: $('.categoryForm').serializeArray(),
								subCategoryForm:$('.subCategoryForm').serializeArray(),
								specificationForm:$('.specificationForm').serializeArray(),
								conditionForm:$('.conditionForm').serializeArray(),
								considerationTypeForm:$('.considerationTypeForm').serializeArray(),
								donationTypeForm:$('.donationTypeForm').serializeArray(),
								preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList').serializeArray()
								
				// 			//POPUP
				// 			    looking_for: $('.myForm1').serializeArray(),
				// 				categoryForm: $('.categoryForm1').serializeArray(),
				// 				subCategoryForm:$('.subCategoryForm1').serializeArray(),
				// 				specificationForm:$('.specificationForm1').serializeArray(),
				// 				conditionForm:$('.conditionForm1').serializeArray(),
				// 				considerationTypeForm:$('.considerationTypeForm1').serializeArray(),
				// 				donationTypeForm:$('.donationTypeForm1').serializeArray(),
				// 				preferenceTypeFormGenderList:$('.preferenceTypeFormGenderList1').serializeArray()
								
					
			});
			/* For Hash Value Change Duplicate Of call_ajax */
		
    /////  Not find -- where used - Haresh
    function call_ajax(url,data){
      
      // console.log(url);
      // console.log(data);
			$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
				type        : 'POST',
				url         : url, // the url where we want to POST
				data        : {data: data},
				beforeSend: function()
				{
					$('.ajax-loading').show();
                    
                    $('.appendText').children().hide();
				},
				success: function(data){
					location.hash = page;
					if(data.length == 0){
						$('.ajax-loading').html("<div class='alert alert-info'><center>No more records!</center></div>");
						return;
					}
					$('.ajax-loading').hide(); 
					$('.appendText').html(data);
		
				}
		});
		
    }
        /*  */
}

</script>
<style>
/* CHECK BOX CSS START*/
    /*border-radius:50%;*/
    /*outline:none;*/
    /*box-shadow:0 0 5px 0px gray inset;*/
/*input[type='checkbox'] {
    -webkit-appearance:none;
    width:19px;
    height:20px;
    border:1px solid darkgray;
    margin-left: 15px !important;
    margin-right: 10px;
    padding: 0px 1px;
}
input[type='checkbox']:hover {
    box-shadow:0 0 5px 0px #00a651 inset;
}
input[type='checkbox']:focus {
    -webkit-box-shadow: 2px 4px 2px 0px
#8888889e !important;
    box-shadow: 
rgba(136, 136, 136, 0.62) 2px 3px 5px 0px;
}*/
input[type='checkbox']:before {
    /*content:'\f00c';*/
    /*display:block;*/
    /*width:68%;*/
    /*height:68%;*/
    /*margin: 15% auto;    */
    /*border-radius:50%;    */
}
/*input[type='checkbox']:checked:before {
    background: #00a651;
    content:'\f00c';
    font-family: 'FontAwesome';
    color:#ffffff;
}*/

@media (max-width: 1199px) and (min-width: 992px){
		.ad-meta{
			width:100% !important;	
		}
        .item-info{
            min-height:152px !important;
        }

}

@media (min-width: 768px) and (max-width: 991px) {
    .banner-form-full.banner-form .form-control, .banner-form-full.banner-form .category-dropdown {
        width: 25%;
    }

    .ad-meta{
        width:100% !important;  
    }

    .item-info{
        min-height:152px !important;
    }

}

@media only screen and (max-width: 768px) {
	.ad-meta{
		width:100% !important;	
	}
	 /*.pull-right{
		float:none !important;
	}*/
	.ad-meta .user-option a{
		width:initial !important;	
	}
	.ad-meta .meta-content{
			display:intial !important;
			vertical-align:intial !important;
	}
	.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img{
		//height:124px !important;
	}
	/*.item-info{
		min-height:234px !important;
	}*/
	/*.ad-info{
		padding:0px 0px !important;	
	}*/
	/*.ad-meta{
		z-index:1 !important;
		top:18% !important;
	}*/
	.item-image-box .item-image img{
		height:170px !important;
	}
	/*.ad-info span{
		 display:none !important;
	}*/
	/*.category-item{
		max-height:234px !important;
		min-height:234px !important;
	}*/
	.item-title{
		height:23px !important;
		overflow:hidden !important;
	}
		
}
</style>

@endpush
@php
Session::forget('search','');
Session::forget('homePageCategoryId','');
unset($homeCity);
unset($homeCategory);
unset($homeword);

@endphp