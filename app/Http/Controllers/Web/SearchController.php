<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use \App\Models\City,\App\Models\Category,\App\Models\Subcategory,\App\Models\Specification;
use Session;
use Url;

class SearchController extends Controller
{

	/*  When Page Load At Time This Function Call */

	public function getFeaturedItemOnLoad(Request $request)
	{
		$donation_posts =  DB::table('donation_posts')
		->where('status',1)
		->orderBy('created_at','desc')
		->limit(10)
		->get();
		$results = array();
		foreach($donation_posts as $Val)
		{
			$results[] = $Val;
		}	
		// print_r($results);
		// die();
		// echo $this->printData($result,array(), array());




			$v='';
			$print = '';
			if(!empty($results)){
				


				foreach($results as $key=>$result){
                

					if(!empty($result))
					{

						
						$city =  City::where('id',$result->city_id)->where('status',1)->first();
                    

						$specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
						$subcategory = $specification->subcategory;
						$category = $subcategory->category;

						$user_type = DB::table('user_types')
										->where('id',$result->user_type_id)
										->where('status',1)
										->first();

						$donation_image = DB::table('donation_images')
											->where('donation_post_id',$result->id)
											->where('status',1)
											->first();

						// $success_story_image = DB::table('user_posts_story_images')->where('donation_post_id',$result->id)->get();
						
						// dd($donation_image);
						

						if(!empty($donation_image))
						{
							
							if($donation_image->file_type!="video")
							{
								$result->image = DONATION_POST_IMAGE($donation_image->image);
								
							}else{
								// $result->image = DONATION_POST_IMAGE('preview_video.jpg');
								$result->image = URL::asset("/uploads/images/video_default.jpg");
							}
							             
						}else
						{
							$result->image = DONATION_POST_IMAGE('preview.jpg');
						}

						
						
						if($result->is_urgent == 1) // If Live
						{
							$print .= '
									<div class="swiper-slide">
					                    <div class="auction-card style-7">
					                      <div class="auction-card-img-wrap">
					                      	<a '. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).' class="card-img">
					                ';

							$alt = str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

							if(!empty($result->image))
							{
												// $base_path = URL::asset('images/uploads/user_success_story/');
								$print .='				
												<img src="'.$result->image.'" alt="'.$result->title.'">
												
										';

							}else
							{
												
								$print .='			
												<img src="'. URL::asset("/uploads/images/video_default.jpg").'" alt="'.$result->title.'" >
											
										 ';
							} 

						

							$print .= '
					                      	</a>
					                        <div class="batch"><span class="live"><svg width="11" height="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg">
					                              <path d="M10.6777 11H4.83398C4.65599 11 4.51172 10.8557 4.51172 10.6777V10.334C4.51172 9.97798 4.80025 9.68944 5.15625 9.68944V9.30414C5.15625 8.79397 5.57133 8.37889 6.0815 8.37889H9.43022C9.94039 8.37889 10.3555 8.79397 10.3555 9.30414V9.68944C10.7115 9.68944 11 9.97798 11 10.334V10.6777C11 10.8556 10.8556 11 10.6777 11ZM6.96665 7.09722C6.75245 7.38146 6.34829 7.43829 6.06405 7.22402C5.77973 7.00985 5.72299 6.60568 5.93716 6.32134L7.8766 3.74766C8.09087 3.46333 8.49494 3.40659 8.7792 3.62077C9.06353 3.83503 9.12035 4.23911 8.90609 4.52346L6.96665 7.09722ZM2.334 3.60618C2.11973 3.89042 1.71563 3.94725 1.43131 3.73298C1.14707 3.51881 1.09025 3.11473 1.30451 2.83038L3.24397 0.256726C3.45815 -0.027598 3.86231 -0.0844241 4.14657 0.12984C4.43081 0.344103 4.48763 0.748181 4.27337 1.03253L2.334 3.60618ZM3.74767 5.4785C3.27134 5.11956 2.91373 4.67385 2.69008 4.20454L4.94678 1.20984C5.45955 1.29552 5.98651 1.51631 6.46293 1.87534C6.93928 2.23428 7.29689 2.67999 7.52054 3.14921L5.26382 6.14409C4.75108 6.05841 4.22411 5.83751 3.74767 5.4785ZM2.87749 5.56242C3.02753 5.71533 3.18557 5.86196 3.35979 5.99329C3.53409 6.12456 3.71864 6.23606 3.90689 6.33822L3.48668 6.89589L2.45719 6.12018L2.87749 5.56242ZM2.06929 6.63488L3.09878 7.41059L1.15932 9.98436C0.945055 10.2687 0.540977 10.3254 0.256717 10.1112C-0.027607 9.89698 -0.0843477 9.4929 0.12983 9.20856L2.06929 6.63488Z" />
					                            </svg> Live </span>
					                          <div class="code-no"><span class="code">Lot #'.$result->post_no.'</span></div>
					                        </div>
					                        <ul class="view-and-favorite-area">
					                          <li><a href="#"><svg width="16" height="15" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg">
					                                <path d="M8.00013 3.32629L7.32792 2.63535C5.75006 1.01348 2.85685 1.57317 1.81244 3.61222C1.32211 4.57128 1.21149 5.95597 2.10683 7.72315C2.96935 9.42471 4.76378 11.4628 8.00013 13.6828C11.2365 11.4628 13.03 9.42471 13.8934 7.72315C14.7888 5.95503 14.6791 4.57128 14.1878 3.61222C13.1434 1.57317 10.2502 1.01254 8.67234 2.63441L8.00013 3.32629ZM8.00013 14.8125C-6.375 5.31378 3.57406 -2.09995 7.83512 1.8216C7.89138 1.87317 7.94669 1.9266 8.00013 1.98192C8.05303 1.92665 8.10807 1.87349 8.16513 1.82254C12.4253 -2.10182 22.3753 5.31284 8.00013 14.8125Z" />
					                              </svg></a></li>
					                          <li><a href="#"><svg width="17" height="11" viewBox="0 0 17 11" xmlns="http://www.w3.org/2000/svg">
					                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4028 5.44118C14.0143 7.8425 11.3811 9.33421 8.53217 9.33421C5.68139 9.33421 3.04821 7.8425 1.65968 5.44118C1.55274 5.25472 1.55274 5.05762 1.65968 4.87132C3.04821 2.47003 5.68139 0.978484 8.53217 0.978484C11.3811 0.978484 14.0143 2.47003 15.4028 4.87132C15.5116 5.05762 15.5116 5.25472 15.4028 5.44118ZM16.2898 4.39522C14.7224 1.68403 11.7499 0 8.53217 0C5.31258 0 2.3401 1.68403 0.772715 4.39522C0.492428 4.87896 0.492428 5.43355 0.772715 5.91693C2.3401 8.62812 5.31258 10.3125 8.53217 10.3125C11.7499 10.3125 14.7224 8.62812 16.2898 5.91693C16.5701 5.43358 16.5701 4.87896 16.2898 4.39522ZM8.53217 7.1634C9.68098 7.1634 10.6159 6.26305 10.6159 5.15617C10.6159 4.04929 9.68098 3.14894 8.53217 3.14894C7.38152 3.14894 6.44663 4.04929 6.44663 5.15617C6.44663 6.26305 7.38156 7.1634 8.53217 7.1634ZM8.53217 2.17045C6.82095 2.17045 5.43061 3.50998 5.43061 5.1562C5.43061 6.80278 6.82098 8.14176 8.53217 8.14176C10.2416 8.14176 11.6319 6.80275 11.6319 5.1562C11.6319 3.50998 10.2416 2.17045 8.53217 2.17045Z" />
					                              </svg></a></li>
					                        </ul>
					                        <div class="countdown-timer">
					                          <ul data-countdown="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d H:i:s').'">
					                            <li class="times" data-days="00">00</li>
					                            <li class="colon"> : </li>
					                            <li class="times" data-hours="00">00</li>
					                            <li class="colon"> : </li>
					                            <li class="times" data-minutes="00">00</li>
					                            <li class="colon"> : </li>
					                            <li class="times" data-seconds="00">00</li>
					                          </ul>
					                        </div>
					                      </div>
					                      <div class="auction-card-content">
					                        <h6><a '. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'>Time - Honored Tradition Old Smart Watch.</a></h6>
					                        <div class="price-and-code-area">
					                          <div class="price"><span>Current Bid at:</span><strong> ₹'.$result->consideration_detail.' </strong></div><a '. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).' class="bid-btn"> Bid Now </a>
					                        </div>
					                      </div>
					                    </div>
					                  </div>

								';
						}
						else // Upcoming
						{
							$print .= '
									<div class="swiper-slide">
					                    <div class="auction-card style-7">
					                      <div class="auction-card-img-wrap">
					                      	<a '. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).' class="card-img">
					                ';

							$alt = str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

							if(!empty($result->image))
							{
													// $base_path = URL::asset('images/uploads/user_success_story/');
									$print .='				
													<img src="'.$result->image.'" alt="'.$result->title.'">
													
											';

								}else
								{
													
									$print .='			
													<img src="'. URL::asset("/uploads/images/video_default.jpg").'" alt="'.$result->title.'" >
												
											 ';
								} 

							

								$print .= '     	
					                      	</a>
					                        <div class="batch"><span class="upcoming"><svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
					                              <path d="M0.731707 3.29268H0V7.46341C0 8.30488 0.695122 9 1.53659 9H7.46341C8.30488 9 9 8.30488 9 7.46341V3.29268H8.26829H0.731707ZM5.67073 4.84756C5.79878 4.70122 6.05488 4.71951 6.18293 4.84756C6.58537 5.21341 6.96951 5.57927 7.37195 5.96342C7.51829 6.10976 7.5 6.34756 7.37195 6.47561C7.0061 6.87805 6.64024 7.2622 6.2561 7.66463C6.10976 7.81098 5.87195 7.79268 5.7439 7.66463C5.59756 7.53659 5.61585 7.28049 5.7439 7.15244C6.01829 6.84146 6.31098 6.54878 6.58537 6.23781C6.27439 5.94512 5.96341 5.65244 5.65244 5.37805C5.5061 5.21342 5.52439 4.97561 5.67073 4.84756ZM4.20732 4.84756C4.33537 4.70122 4.59146 4.71951 4.71951 4.84756C5.12195 5.21341 5.5061 5.57927 5.90854 5.96342C6.05488 6.10976 6.03658 6.34756 5.90854 6.47561C5.54268 6.87805 5.17683 7.2622 4.79268 7.66463C4.64634 7.81098 4.40854 7.79268 4.28049 7.66463C4.13415 7.53659 4.15244 7.28049 4.28049 7.15244C4.55488 6.84146 4.84756 6.54878 5.12195 6.23781C4.81098 5.94512 4.5 5.65244 4.18902 5.37805C4.04268 5.21342 4.06098 4.97561 4.20732 4.84756ZM8.26829 2.56098H9V1.53659C9 0.713415 8.34146 0.0365854 7.51829 0V0.841463C7.51829 1.04268 7.35366 1.20732 7.15244 1.20732C6.95122 1.20732 6.78658 1.02439 6.78658 0.841463V0H2.26829V0.804878C2.26829 1.0061 2.10366 1.17073 1.90244 1.17073C1.70122 1.17073 1.53659 0.987805 1.53659 0.804878V0C0.695122 0 0 0.695122 0 1.53659V2.56098H0.731707H8.26829Z" />
					                            </svg> UPCOMING </span>
					                          <div class="code-no"><span class="code">Lot #'.$result->post_no.'</span></div>
					                        </div>
					                        <ul class="view-and-favorite-area">
					                          <li><a href="#"><svg width="16" height="15" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg">
					                                <path d="M8.00013 3.32629L7.32792 2.63535C5.75006 1.01348 2.85685 1.57317 1.81244 3.61222C1.32211 4.57128 1.21149 5.95597 2.10683 7.72315C2.96935 9.42471 4.76378 11.4628 8.00013 13.6828C11.2365 11.4628 13.03 9.42471 13.8934 7.72315C14.7888 5.95503 14.6791 4.57128 14.1878 3.61222C13.1434 1.57317 10.2502 1.01254 8.67234 2.63441L8.00013 3.32629ZM8.00013 14.8125C-6.375 5.31378 3.57406 -2.09995 7.83512 1.8216C7.89138 1.87317 7.94669 1.9266 8.00013 1.98192C8.05303 1.92665 8.10807 1.87349 8.16513 1.82254C12.4253 -2.10182 22.3753 5.31284 8.00013 14.8125Z" />
					                              </svg></a></li>
					                          <li><a href="#"><svg width="17" height="11" viewBox="0 0 17 11" xmlns="http://www.w3.org/2000/svg">
					                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4028 5.44118C14.0143 7.8425 11.3811 9.33421 8.53217 9.33421C5.68139 9.33421 3.04821 7.8425 1.65968 5.44118C1.55274 5.25472 1.55274 5.05762 1.65968 4.87132C3.04821 2.47003 5.68139 0.978484 8.53217 0.978484C11.3811 0.978484 14.0143 2.47003 15.4028 4.87132C15.5116 5.05762 15.5116 5.25472 15.4028 5.44118ZM16.2898 4.39522C14.7224 1.68403 11.7499 0 8.53217 0C5.31258 0 2.3401 1.68403 0.772715 4.39522C0.492428 4.87896 0.492428 5.43355 0.772715 5.91693C2.3401 8.62812 5.31258 10.3125 8.53217 10.3125C11.7499 10.3125 14.7224 8.62812 16.2898 5.91693C16.5701 5.43358 16.5701 4.87896 16.2898 4.39522ZM8.53217 7.1634C9.68098 7.1634 10.6159 6.26305 10.6159 5.15617C10.6159 4.04929 9.68098 3.14894 8.53217 3.14894C7.38152 3.14894 6.44663 4.04929 6.44663 5.15617C6.44663 6.26305 7.38156 7.1634 8.53217 7.1634ZM8.53217 2.17045C6.82095 2.17045 5.43061 3.50998 5.43061 5.1562C5.43061 6.80278 6.82098 8.14176 8.53217 8.14176C10.2416 8.14176 11.6319 6.80275 11.6319 5.1562C11.6319 3.50998 10.2416 2.17045 8.53217 2.17045Z" />
					                              </svg></a></li>
					                        </ul>
					                        <div class="countdown-timer">
					                          <ul data-countdown="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d H:i:s').'">
					                            <li class="times" data-days="00">00</li>
					                            <li class="colon"> : </li>
					                            <li class="times" data-hours="00">00</li>
					                            <li class="colon"> : </li>
					                            <li class="times" data-minutes="00">00</li>
					                            <li class="colon"> : </li>
					                            <li class="times" data-seconds="00">00</li>
					                          </ul>
					                        </div>
					                      </div>
					                      <div class="auction-card-content">
					                        <h6><a '. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'>Heritage had curating watch time treasures.</a></h6>
					                        <div class="price-and-code-area">
					                          <div class="price"><span>Start Bid at:</span><strong> ₹'.$result->consideration_detail.' </strong></div><a '. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).' class="bid-btn">Notify Me</a>
					                        </div>
					                      </div>
					                    </div>
					                  </div>

								';
						}
						
						


						
 
					}
					$sucess_story=0;
				}

            	
			}else
			{
				// $base_path = URL::asset('images/uploads/user_success_image/');
				// $base_path = URL::asset();
				// echo $base_path;

				$base_path = URL::to('/');

				$print = '			<div class="alert alert-info" style="margin-top: 15px; text-align: center;">
									    <p>You may also promote your auction.</p>
									    <br>
									    <p>Post your auction to buy or sell anything and promote as featured.</p>
									    
									    <a href="'.$base_path.'/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">Buy</a>
									    <a href="'.$base_path.'/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">Sell</a>
									</div>

						'; 
			}
			           		
			return $print;


		


	}
	


	public function getItemOnLoad(Request $request)
	{
		$donation_posts =  DB::table('donation_posts')
		->where('status',1)
		->orderBy('created_at','desc')
		->limit(15)
		->get();
		$result = array();
		foreach($donation_posts as $Val)
		{
			$result[] = $Val;
		}	
		// print_r($result);
		// die();
		echo $this->printData($result,array(), array()); 
	} 

	/* Return All The Query of Form its Result to Print Function */
	public function getItem(Request $request,$page='0')
	{

		// echo 'Hello';
       	echo '<pre>';
        print_r($request->data);
        // die();


          

          
        
            

        if (Auth::guard('user')->check())
        {
            $user_id = Auth::guard('user')->user()->id;

            $user_id_sql =  "AND user_id != '".$user_id."' ";
        }
        else
        {
			$user_id_sql = "";
        }


        // echo "<pre>";
        // print_r($request->data['dropdownSearch']);
        // die();

        // SORT BY 
		$dropdownSearch_sql="";
		if(isset($request->data['dropdownSearch']) && !empty($request->data['dropdownSearch']))
		{

			$dropdownSearch=$request->data['dropdownSearch'];
			
			 if($dropdownSearch=="1") //Disctance
			 {
				$dropdownSearch_sql=" ORDER BY away_distance asc";
			}elseif($dropdownSearch=="2") //Latest
			{
			 	$dropdownSearch_sql="ORDER BY id desc";
			}
			elseif($dropdownSearch=="3") //Oldest
			{
				// $dropdownSearch_sql="AND is_urgent='1' ORDER BY id desc";
				$dropdownSearch_sql="ORDER BY id asc";

			}
			elseif($dropdownSearch=="4") // Price: Low-High
			{
				$dropdownSearch_sql="ORDER BY consideration_detail asc";
			}
			elseif($dropdownSearch=="5") // Price: High-Low
			{
				$dropdownSearch_sql="ORDER BY consideration_detail desc";
			}
			else{
				
				// $dropdownSearch_sql="ORDER BY id desc";
				$dropdownSearch_sql=" ORDER BY away_distance asc";
			} 
			// echo $dropdownSearch_sql;
		// die();			
			

		}

		// echo "<pre>";
		// print_r($request->data['urgentitem']);
		// die();
		
		$urgent_sql = "";
		if(isset($request->data['urgentitem']) && !empty($request->data['urgentitem']))
		{


			$dropdownSearch=$request->data['urgentitem'];
			
			// $dropdownSearch_sql="AND is_urgent='1' ORDER BY id desc";
			$urgent_sql="AND is_urgent='1'";
			//echo $dropdownSearch_sql;
		//die();			
			

		}
		
		//$category=array();
		$city_sql="";
		$location_radius_sql = "";

		$location_distance = "";
		

		// echo "<pre>";
		// print_r($request->data['distance']);
		// die();


		if(isset($request->data['distance']) && !empty($request->data['distance']))
		{

			$distance_filter = $request->data['distance'];

			$dist_frm = $distance_filter[0]['value'];
			$dist_to = $distance_filter[1]['value'];
			$dist_unt = $distance_filter[2]['value'];
			
			$min_value = $distance_filter[3]['value'];
			$max_value = $distance_filter[4]['value'];

		}
		else
		{
			// Default Values
			$dist_frm = 0;
			$dist_to = 5;
			$dist_unt = 'KM';

			$min_value = 0;
			$max_value = 5;
		}


		$Sessiondata = session()->get('search');
		
		// echo '<pre>';
	 	//        print_r($Sessiondata);
	 	//        die();

		if((isset($request->data['location_data']) && !empty($request->data['location_data'])) ||
			isset($Sessiondata)
		   )
		{
			$location_search_form=$request->data['location_data'];
			
			// $location_radius_sql Radius by Lat Long SQL
			$location_search_token = $location_search_form[0]['value']; //_token
			
			$search_latitude = $location_search_form[1]['value']; //search_latitude
			$search_longitude = $location_search_form[2]['value']; //search_longitude
			
			$search_location = $location_search_form[3]['value']; //city_search_box

			if($search_latitude || $search_longitude)
				{
					$search_latitude = $search_latitude;
					$search_longitude = $search_longitude;
					$search_location = $search_location;
				}
				else
				{
					$search_latitude = $Sessiondata[0]['clt'];
				    $search_longitude = $Sessiondata[0]['clg'];
				    $search_location = $Sessiondata[0]['cloc'];
				}

			// Distance 
			$distance = $max_value;

			
			if(isset($search_latitude) && !empty($search_latitude)
				&& isset($search_longitude) && !empty($search_longitude)
				)

			{
				$location_radius_sql;

				// Earth's radius in kilometers
					// default radius is 6,370,986 meters / 6378 KM / 
			    
			    if($dist_unt == 'MI')
			    {
			    	$earthRadius = 3963; //Miles as per NASA
			    	$converter = 0.000621371192;
			    }
			    else
			    {
			    	$earthRadius = 6378; //kilometers as per NASA
			    	$converter = 0.001;
			    }

			    // Convert distance to radians (distance / Earth's radius)
			    $radius = $distance / $earthRadius;

			    // Latitude boundaries
			    $minLat = $search_latitude - rad2deg($radius);
			    $maxLat = $search_latitude + rad2deg($radius);

			    // Longitude boundaries (considering the search_latitude)
			    $minLon = $search_longitude - rad2deg($radius / cos(deg2rad($search_latitude)));
			    $maxLon = $search_longitude + rad2deg($radius / cos(deg2rad($search_latitude)));


			    // ST_distance_sphere provide distance in meters
			     	// Convert in miles = 0.000621371192
			    	// Convert in miles = 0.001

			 //    echo $location_radius_sql="SELECT *
				// 	    FROM donation_posts
				// 	    WHERE 
				// 	    lat BETWEEN ".$minLat." and ".$maxLat."
				// 	    AND
				// 	    lon BETWEEN ".$minLon." and ".$maxLon."
				// 	    AND
				// 	    ST_distance_sphere(
				// 	    	point(".$search_longitude.", ".$search_latitude."),
				// 	    	point(lon, lat)
				// 	    ) * 0.001 < ".$distance." ";

				 

				// die();

			    $location_distance = " (ST_distance_sphere(
									    	point(".$search_longitude.", ".$search_latitude."),
									    	point(lon, lat)
									    ) * ".$converter.") as away_distance,
									    '".$dist_unt."' as distance_unit  
						    		";


				$location_radius_sql = 
						"AND
						    lat BETWEEN ".$minLat." and ".$maxLat."
						    AND
						    lon BETWEEN ".$minLon." and ".$maxLon."
						    AND
						    ST_distance_sphere(
						    	point(".$search_longitude.", ".$search_latitude."),
						    	point(lon, lat)
						    ) * ".$converter." < ".$distance." 
						  ";
			}
			else
			{
				$location_radius_sql = "";
			}



			// City SQL
			// $city_name=$location_search_form[4]['value'];
			$city_sql = '';
			
			// if(isset($city_name)){
			// 	$city_ids = search_city( $city_name);
			// 	if(!empty($city_ids))
			// 	{
			// 		$city_id=$city_ids[0];
			// 		$city_sql="AND city_id='".$city_id."'"; 
			// 	}else{
			// 	 // $city_sql="AND city_id='X'"; 	
			// 		$city_sql="AND city_id='X'"; 	
			// 	}
			// }
			

			// echo "<pre>";
			// print_r($search_form);
			// die();

			// Category SQL	
			// $category_box=$search_form[3]['value'];	
			$category_box='';	
			if(isset($category_box) && !empty($category_box))
			{
				//$category = Category::where('name','LIKE',''.$request->data['data'][1]['value'])->where('status',1)->first();
				$sql="SELECT specifications.id FROM categories
				JOIN subcategories ON categories.id = subcategories.category_id
				JOIN specifications ON subcategories.id = specifications.subcategory_id
				WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
				AND categories.name LIKE '%".$category_box."%' "; 
				// print_r($sql); die;
				$results = DB::select( DB::raw($sql) );
				$specifications_id = array_column($results, 'id');
				if(!empty($specifications_id))
				{
					$specifications_id_data[]=$specifications_id;
				}else{
					$specifications_id_data=array();
				}	
			}
			
			
			
			// Word_box SQL

			$search_form = $request->data['data'];

			$word_box_token	=	$search_form[0]['value'];
			$word_box 		=	$search_form[1]['value'];
			
			$word_box_sql="";
			if(isset($word_box) && !empty($word_box))
			{
				$w_b=explode(" ",$word_box);
				$w_b=array_values(array_filter($w_b));
				$put_sql=array();
				for($i=0;$i<count($w_b);$i++)
				{
					if($i==0)
					{
						// $put_sql[]="CONCAT (title, description) LIKE '%".$w_b[$i]."%'";
						$put_sql[]="CONCAT (title) LIKE '%".$w_b[$i]."%'";
					}else{
						// $put_sql[]="OR CONCAT (title, description) LIKE '%".$w_b[$i]."%'";
						$put_sql[]="OR CONCAT (title) LIKE '%".$w_b[$i]."%'";
					}
				} 
				$word_box_sql="AND (".implode(" ",$put_sql).")";
			}
			else
			{
				$word_box_sql='';
			}
			
		}
		else
		{
			$word_box_sql='';
			
		}
		
		//LOOKING FOR
		$looking_for_sql="";
		if(isset($request->data['looking_for']) && !empty($request->data['looking_for']))
		{
			$looking_for=$request->data['looking_for'];
			$looking_array=array();
			for($i=0;$i<count($looking_for);$i++)
			{
				$looking_array[]=$looking_for[$i]['value']; 
			}
			if(!empty($looking_array))
			{
				$looking_array = "'" . implode( "','",$looking_array) . "'";
				$looking_for_sql="AND user_type_id IN(".$looking_array.")";
			}else{
				$looking_for_sql="";
			}
		}
		
		
		
		
		// Category Form Ids

		if(Session::has('homePageCategoryId'))
		{
			$categoryId = Session::get('homePageCategoryId');
			$sql="SELECT specifications.id FROM categories
			JOIN subcategories ON categories.id = subcategories.category_id
			JOIN specifications ON subcategories.id = specifications.subcategory_id
			WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
			AND categories.id IN (".$categoryId.") "; 
				$results = DB::select( DB::raw($sql) );
				$specifications_id = array_column($results, 'id');
				
				if(!empty($specifications_id))
				{
					$categoryFormIDS[]=$specifications_id;
					
				}else{
					$categoryFormIDS=array();
				}
				
				session()->forget('homePageCategoryId');
			}
			else if(isset($request->data['categoryForm']) && !empty($request->data['categoryForm']))
			{
				$categoryForm=$request->data['categoryForm'];
				$categoryFormarray=array();
				for($i=0;$i<count($categoryForm);$i++)
				{
					$categoryFormarray[]=$categoryForm[$i]['value']; 
				}
				$categoryFormarrayids = "'" . implode( "','",$categoryFormarray) . "'";
				$sql="SELECT specifications.id FROM categories
				JOIN subcategories ON categories.id = subcategories.category_id
				JOIN specifications ON subcategories.id = specifications.subcategory_id
				WHERE categories.status = 1 AND subcategories.status = 1 AND specifications.status = 1
				AND categories.id IN (".$categoryFormarrayids.") "; 
					$results = DB::select( DB::raw($sql) );
					$specifications_id = array_column($results, 'id');

					if(!empty($specifications_id))
					{
						$categoryFormIDS[]=$specifications_id;

					}else{
						$categoryFormIDS=array();
					}
				}

					
		// SubCateogry Result
		//$subCategoryFormarrayIDS=array();
				if(isset($request->data['subCategoryForm']) && !empty($request->data['subCategoryForm']))
				{
					$subCategoryFormarrayIDS=array();
					$subCategoryForm=$request->data['subCategoryForm'];
					$subCategoryFormarray=array();
					for($i=0;$i<count($subCategoryForm);$i++)
					{
						$subCategoryFormarray[]=$subCategoryForm[$i]['value']; 
					}
			//echo  $subCategoryFormids=implode(',', $subCategoryFormarray);

					$subCategoryFormaIDS = "'" . implode( "','",$subCategoryFormarray) . "'";
			//echo $subCategoryFormaIDS;
					$sql="SELECT specifications.id FROM subcategories
					JOIN specifications ON subcategories.id = specifications.subcategory_id
					WHERE subcategories.status = 1 AND specifications.status = 1
					AND subcategories.id IN (".$subCategoryFormaIDS.") "; 
						$results = DB::select( DB::raw($sql) );
						$sub_cat_specifications_id = array_column($results, 'id');
						$subCategoryFormarrayIDS=$sub_cat_specifications_id;

				//  echo"<pre>"; print_r($sql); echo"</pre>";
				// die(); 

			}
		// Specification Data
			$specificationFormarrayIDs=array();
			if(isset($request->data['specificationForm']) && !empty($request->data['specificationForm']))
			{
				$specificationForm=$request->data['specificationForm'];
				$specificationFormarray=array();
				for($i=0;$i<count($specificationForm);$i++)
				{
					$specificationFormarray[]=$specificationForm[$i]['value']; 
				}
				$specificationFormarrayIDs=$specificationFormarray;

			}
			

			if(!empty($specificationFormarrayIDs))
			{
				$res = "'" . implode( "','",$specificationFormarrayIDs) . "'";
				$specifications_sql="AND specification_id IN(".$res.")"; 
			}
			else
			{
				/* if(!empty($subCategoryFormarrayIDS)) */
				if(isset($subCategoryFormarrayIDS)) 
				{
					
					if(!empty($subCategoryFormarrayIDS))
					{
						$res = "'" . implode( "','",$subCategoryFormarrayIDS) . "'";
						$specifications_sql="AND specification_id IN(".$res.")";
					}else{
						$specifications_sql="";
					}
					
				}
				else
				{
					
					if(isset($categoryFormIDS))
					{
						if(isset($specifications_id_data) && !empty($specifications_id_data))
						{
							$input_cat=$specifications_id_data[0];
						}else{
							$input_cat=array();
						}
							//echo"<pre>"; print_r($input_cat); echo"</pre>";

						if(isset($categoryFormIDS) && !empty($categoryFormIDS))
						{
							if(!empty($input_cat))
							{
								$array_merge=array_merge($input_cat,$categoryFormIDS[0]);
								$array_values=array_values(array_unique($array_merge));
								$res = "'" . implode( "','",$array_values) . "'";
								$specifications_sql="AND specification_id IN(".$res.")"; 
							}else{
								$res = "'" . implode( "','",$categoryFormIDS[0]) . "'";
								$specifications_sql="AND specification_id IN(".$res.")";
							}
						}else{
							if(!empty($input_cat))
							{
								$res = "'" . implode( "','",$input_cat) . "'";
								$specifications_sql="AND specification_id IN(".$res.")";
							}else{
								$specifications_sql="";
							}

						}	
					}else{


						if(isset($specifications_id_data))
						{
							if(!empty($specifications_id_data))
							{
								$res = "'" . implode( "','",$specifications_id_data[0]) . "'";
								$specifications_sql="AND specification_id IN(".$res.")";
							}else{
								$specifications_sql="";	
							}
						}else{
							$specifications_sql="";
						}
					}
				}
			}

		//	conditionForm
			$conditionFormSQL="";
			if(isset($request->data['conditionForm']) && !empty($request->data['conditionForm']))
			{
				$conditionForm=$request->data['conditionForm'];
				$sconditionFormarray=array();
				for($i=0;$i<count($conditionForm);$i++)
				{
					$sconditionFormarray[]=$conditionForm[$i]['value']; 
				}
				if(!empty($sconditionFormarray))
				{
					$sconditionFormarrayIDS = "'" . implode( "','",$sconditionFormarray) . "'";
					$conditionFormSQL="AND `condition` IN(".$sconditionFormarrayIDS.")";
				}else{
					$conditionFormSQL="";	
				}
			}

		//considerationTypeForm
			$considerationTypeFormSQL="";
			if(isset($request->data['considerationTypeForm']) && !empty($request->data['considerationTypeForm']))
			{
				$considerationTypeForm=$request->data['considerationTypeForm'];
				$considerationTypeFormarray=array();
				for($i=0;$i<count($considerationTypeForm);$i++)
				{
					$considerationTypeFormarray[]=$considerationTypeForm[$i]['value']; 
				}
				$sonsiderationTypeFormids=implode(',', $considerationTypeFormarray);

				if(!empty($considerationTypeFormarray))
				{
					$considerationTypeFormarrayIDS = "'" . implode( "','",$considerationTypeFormarray) . "'";
					$considerationTypeFormSQL="AND consideration IN(".$considerationTypeFormarrayIDS.")";
				}else{
					$considerationTypeFormSQL="";	
				}

			}

		// donationTypeForm
			$donationTypeFormSQL="";
			if(isset($request->data['donationTypeForm']) && !empty($request->data['donationTypeForm']))
			{
				$donationTypeForm=$request->data['donationTypeForm'];
				$donationTypeFormarray=array();
				for($i=0;$i<count($donationTypeForm);$i++)
				{
					$donationTypeFormarray[]=$donationTypeForm[$i]['value']; 
				}
				
				if(!empty($donationTypeFormarray))
				{
					$donationTypeFormarrayIDS = "'" . implode( "','",$donationTypeFormarray) . "'";
					$donationTypeFormSQL="AND donation_type_id IN(".$donationTypeFormarrayIDS.")";
				}else{
					$donationTypeFormSQL="";	
				}
			}
			
			
			
			
			//	preferenceTypeForm
			$preferenceTypeFormSQL="";
			if(isset($request->data['preferenceTypeForm']) && !empty($request->data['preferenceTypeForm']))
			{
				$preferenceTypeForm=$request->data['preferenceTypeForm'];
				$preference=$preferenceTypeForm[0]['value']; 
				$preferenceTypeFormSQL="AND preference='".$preference."'";
			}
			
			//	preferenceTypeFormHandi
			$preferenceTypeFormHandiSQL="";
			if(isset($request->data['preferenceTypeFormHandi']) && !empty($request->data['preferenceTypeFormHandi']))
			{
				$preferenceTypeFormHandi=$request->data['preferenceTypeFormHandi'];
				$preference=$preferenceTypeFormHandi[0]['value']; 
				$preferenceTypeFormHandiSQL="AND preference_is_handicap='".$preference."'";

			}
			
			
			
			
			//	preferenceTypeFormGenderList
			$preferenceTypeFormGenderListSQL="";
			if(isset($request->data['preferenceTypeFormGenderList']) && !empty($request->data['preferenceTypeFormGenderList']))
			{
				$genderForm=$request->data['preferenceTypeFormGenderList'];
				$genderFormarray=array();
				for($i=0;$i<count($genderForm);$i++)
				{
					if($genderForm[$i]['value']=='all'){
						$genderFormarray[]=''; 
					}else{
						$genderFormarray[]=$genderForm[$i]['value']; 
					}

					

				}

				
				$put_sql=array();
				for($i=0;$i<count($genderFormarray);$i++)
				{
					if($i==0)
					{
						$put_sql[]="preference_gender LIKE '%".$genderFormarray[$i]."%'";
					}else{
						$put_sql[]="OR preference_gender LIKE '%".$genderFormarray[$i]."%'";
					}
				} 
				$preferenceTypeFormGenderListSQL="AND (".implode(" ",$put_sql).")";
				
			}
			
			//	preferenceTypeFormAge
			$preferenceTypeFormAgeListSQL="";
			if(isset($request->data['preferenceTypeFormAge']) && !empty($request->data['preferenceTypeFormAge']))
			{
				$ageForm=$request->data['preferenceTypeFormAge'];
				$ageFormarray=array();
				for($i=0;$i<count($ageForm);$i++)
				{
					$ageFormarray[]=$ageForm[$i]['value']; 
				}
				
				$put_sql=array();
				for($i=0;$i<count($ageFormarray);$i++)
				{
					if($i==0)
					{
						$put_sql[]="preference_gender LIKE '%".$ageFormarray[$i]."%'";
					}else{
						$put_sql[]="OR preference_gender LIKE '%".$ageFormarray[$i]."%'";
					}
				} 
				$preferenceTypeFormAgeListSQL="AND (".implode(" ",$put_sql).")";
				
			}

			// echo $dropdownSearch_sql;
			
			
			
			$sql="select count(donation_posts.id) as total_post 

				from donation_posts 

				where status = '1'
				and is_complete = '0'
				and expired_at > NOW()


				".$user_id_sql."

				".$city_sql." 
				".$location_radius_sql."

				".$specifications_sql." 
				".$word_box_sql." 
				".$looking_for_sql." 
				".$conditionFormSQL." 
				".$considerationTypeFormSQL." 
				".$donationTypeFormSQL." 
				".$preferenceTypeFormSQL." 
				".$preferenceTypeFormGenderListSQL." 
				".$preferenceTypeFormAgeListSQL." 
				".$preferenceTypeFormHandiSQL."

				".$urgent_sql."


				"; 
			
			// ".$dropdownSearch_sql."

			// die();


			$donation_results = DB::select(DB::raw($sql));

		// dd($donation_results);
		//print_r($donation_results);
		//post found - 10 

			$per_page = 20;
		// echo $total = count($donation_results);

			$total = $donation_results[0]->total_post;
		// die();

			$total_page = ceil($total / $per_page);
			// echo $total_page;
			// die();

			if(!isset($request->data['page'])){
				$current_page=1;
			}else{
				$current_page=$request->data['page'];
			}
			if($request->data['page']==0)
			{
				$current_page=1;
			}

			$k=($current_page-1)* $per_page;

			if(empty($dropdownSearch_sql))
			{
				// $dropdownSearch_sql = "ORDER BY id desc";
				$dropdownSearch_sql = "ORDER BY away_distance asc";

			} 

		echo	$Finalsql="select

			id,
			`key`,
			user_id,
			specification_id,
			user_type_id,
			city_id,
			is_urgent,
			title,
			description,
			address,
			is_complete,
			consideration,
			consideration_detail,
			`condition`,
			helper_status,
			d_status,
			created_at,

			complete_title,
			complete_msg,
			
			post_view_counter,
			expired_at,

			".$location_distance."

			from donation_posts  

			where status = '1' 
			and is_complete = '0'
			and expired_at > NOW()

			".$user_id_sql."

			".$city_sql."
			".$location_radius_sql."

			".$specifications_sql." 
			".$word_box_sql." 
			".$looking_for_sql." 
			".$conditionFormSQL." 
			".$considerationTypeFormSQL." 
			".$donationTypeFormSQL." 
			".$preferenceTypeFormSQL." 
			".$preferenceTypeFormGenderListSQL." 
			".$preferenceTypeFormAgeListSQL." 
			".$preferenceTypeFormHandiSQL."

			".$urgent_sql."

			".$dropdownSearch_sql." 

			LIMIT $k,$per_page";




			$donationFinalResults = DB::select(DB::raw($Finalsql));

		echo "<pre>";				
			// post found - its works		
		print_r($donationFinalResults);
		die();

			if ($total_page > 0) 
			{

				echo '
						<!-- featured-top -->
								<div class="featured-top">
									<p><b>'.$total.' </b>Post for you</p>
								</div><!-- featured-top -->	
					';


				/* Pagination */
				// echo "<p></p>";
				// echo "<p><b>".$total."</b> posts for you</p>";
			}
	// print_r($donationFinalResults); die;
			echo $this->printData($donationFinalResults,array(), array());	 
		//	die();
			if ($total_page > 0) 
			{

				
				// echo '
				// 				<!-- pagination  -->
				// 				<div class="text-center">
				// 					<ul class="pagination ">
				// 						<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
				// 						<li><a href="#">1</a></li>
				// 						<li class="active"><a href="#">2</a></li>
				// 						<li><a href="#">3</a></li>
				// 						<li><a href="#">4</a></li>
				// 						<li><a href="#">5</a></li>
				// 						<li><a href="#">...</a></li>
				// 						<li><a href="#">10</a></li>
				// 						<li><a href="#">20</a></li>
				// 						<li><a href="#">30</a></li>
				// 						<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
				// 					</ul>
				// 				</div><!-- pagination  -->

				// 				';

				/* Pagination */
				
				echo '<nav aria-label="Page navigation example" class="text-center">
						<ul class="pagination">';
				/* Previous Disabled Conditions */
				if($current_page>1)
				{
					echo '	<li class="page-item">
								<a class="page-link" href="?page='.($current_page-1).'" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						';
				}
				else
				{
					echo '	<li class="page-item">
								<a style="cursor:no-drop;" class="page-link disabled"  aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
						';
				}	

										// for($i=1;$i<=$total_page;$i++)
				


				if(($total_page - 4) < $current_page)
				{
					$current = $total_page;
				}
				else
				{
					$current = $current_page + 4;
				}
				
				for($i = $current_page - 3 ; $i <=$current ; $i++)
				{
					if($i > 0)
					{
						if($i >= ($current_page - 3) || $i <= ($current_page + 3)  )
						{

							if($i == $current_page)
							{ 
								$class = 'page-item active';
							}
							else
							{	
								$class = 'page-item';
							}

							echo '	<li class="'.$class.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
						}
					}
					
				}

				if($current_page < ($total_page - 4))
				{
					echo '	<li class="page-item"><a class="page-link" href="?page='.$total_page.'">...'.$total_page.'</a></li>';
				}

				/* Next Disabled Conditions */		
				if($current_page < $total_page)
				{
					echo '	<li class="page-item">
								<a class="page-link" href="?page='.($current_page+1).'" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						';
				}
				else{
					echo '	<li class="page-item">
								<a  style="cursor:no-drop;" class="page-link"  aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						';
				}		
				echo '	</ul>
					</nav>';
			}	
          

		}

		public function getRecomandatePost(Request $request)
		{
			// echo "<pre>";
			// print_r($request->data);
			// die();
			//DB::enableQueryLog();
			
			// $Recommandate_Sql =  DB::table('donation_posts')
								
			// 					->where('status',1)
								
								
			// 					// ->where('specification_id',$request->data['specification'])
								 
			// 					->Where('id','!=', $request->data['post_id'])
			// 					->Where('city_id',$request->data['city_id'])
								
			// 		            ->orderBy('created_at','desc')
			// 					->limit(2)
								
			// 					->get();
			// 					// ->toSql();

			// $RecommandateFinalResults = DB::select(DB::raw($Recommandate_Sql));

			// echo "<pre>";
			// print_r($donation_posts);
			// die();

			// if (Auth::guard('user')->check())
	  //       {
	  //           $user_id = Auth::guard('user')->user()->id;

	  //           $user_id_sql =  "AND user_id != '".$user_id."' ";
	  //       }
	  //       else
	  //       {
			// 	$user_id_sql = "";
	  //       }
			


			$RecommandateFinalResults = array();
			
			$location_distance = "";
			$location_radius_sql = "";
			$user_id_sql = "";
				
			if(isset($request->data['dist_frm']) && ($request->data['dist_frm'] === '0' || $request->data['dist_frm'] > 0)
			    && isset($request->data['dist_to']) && ($request->data['dist_to'] === '0' || $request->data['dist_to'] > 0)
			    && isset($request->data['dist_unt']) && $request->data['dist_unt'] !== ''
			  )
			{
			    $dist_frm = $request->data['dist_frm'];
			    $dist_to = $request->data['dist_to'];
			    $dist_unt = $request->data['dist_unt'];
			}
			else
			{
			    // Default Values
			    $dist_frm = 0;
			    $dist_to = 5;
			    $dist_unt = 'KM';
			}			

			

			if(isset($request->data['cookies_latitude']) && !empty($request->data['cookies_latitude'])
				&& isset($request->data['cookies_longitude']) && !empty($request->data['cookies_longitude'])
			   )
			{
				
				// $location_radius_sql Radius by Lat Long SQL
				$cookies_latitude = $request->data['cookies_latitude'];
				$cookies_longitude = $request->data['cookies_longitude'];

				// Distance 
				$distance = $dist_to;

				
				if(isset($cookies_latitude) && !empty($cookies_latitude)
					&& isset($cookies_longitude) && !empty($cookies_longitude)
					)

				{
					$location_radius_sql;

					// Earth's radius in kilometers
						// default radius is 6,370,986 meters / 6378 KM / 
				    
				    if($dist_unt == 'MI')
				    {
				    	$earthRadius = 3963; //Miles as per NASA
				    	$converter = 0.000621371192;
				    }
				    else
				    {
				    	$earthRadius = 6378; //kilometers as per NASA
				    	$converter = 0.001;
				    }

				    // Convert distance to radians (distance / Earth's radius)
				    $radius = $distance / $earthRadius;

				    // Latitude boundaries
				    $minLat = $cookies_latitude - rad2deg($radius);
				    $maxLat = $cookies_latitude + rad2deg($radius);

				    // Longitude boundaries (considering the search_latitude)
				    $minLon = $cookies_longitude - rad2deg($radius / cos(deg2rad($cookies_latitude)));
				    $maxLon = $cookies_longitude + rad2deg($radius / cos(deg2rad($cookies_latitude)));


				    $location_distance = " (ST_distance_sphere(
										    	point(".$cookies_longitude.", ".$cookies_latitude."),
										    	point(lon, lat)
										    ) * ".$converter.") as away_distance,
										    '".$dist_unt."' as distance_unit,  
							    		";


					$location_radius_sql = 
							"AND
							    lat BETWEEN ".$minLat." and ".$maxLat."
							    AND
							    lon BETWEEN ".$minLon." and ".$maxLon."
							    AND
							    ST_distance_sphere(
							    	point(".$cookies_longitude.", ".$cookies_latitude."),
							    	point(lon, lat)
							    ) * ".$converter." < ".$distance." 
							  ";
				}
				
				


				 $Recommandate_Sql="select

							id,
							`key`,
							user_id,
							specification_id,
							user_type_id,
							city_id,
							is_urgent,
							title,
							description,
							address,
							is_complete,
							consideration,
							consideration_detail,
							`condition`,
							helper_status,
							d_status,
							created_at,

							complete_title,
							complete_msg,
							
							post_view_counter,
							".$location_distance."
							
							expired_at


							from donation_posts  

							where status = '1' 
							and is_complete = '0'
							and expired_at > NOW()

							".$user_id_sql."

							".$location_radius_sql."

							AND specification_id IN(".$request->data['specification'].") 
							
							AND donation_posts.id != ".$request->data['post_id']."

							ORDER BY away_distance asc 

							LIMIT 5";


				

				$RecommandateFinalResults = DB::select(DB::raw($Recommandate_Sql));


			}
				echo $this->printData($RecommandateFinalResults,array(), array());

		}
		
		/* Print Data of Ajax Final Result */
		public function printData($results,$city,$category,$pageId='0')
		{
		// echo "<pre>";
		// print_r($results);
		// die;
			$v='';
			$print = '';
			if(!empty($results)){
				


				foreach($results as $key=>$result){
                //Is Working Here - Haresh

				// 	echo "<pre>";
				// print_r($result->title);
				// die();

					if(!empty($result))
					{

						
						$city =  City::where('id',$result->city_id)->where('status',1)->first();
                    

						$specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
						$subcategory = $specification->subcategory;
						$category = $subcategory->category;

						$user_type = DB::table('user_types')
										->where('id',$result->user_type_id)
										->where('status',1)
										->first();

						$donation_image = DB::table('donation_images')
											->where('donation_post_id',$result->id)
											->where('status',1)
											->first();

						$success_story_image = DB::table('user_posts_story_images')->where('donation_post_id',$result->id)->get();
						
						// dd($donation_image);
						

						if(!empty($donation_image))
						{
							
							if($donation_image->file_type!="video")
							{
								$result->image = DONATION_POST_IMAGE($donation_image->image);
								
							}else{
								// $result->image = DONATION_POST_IMAGE('preview_video.jpg');
								$result->image = URL::asset("/uploads/images/video_default.jpg");
							}
							             
						}else
						{
							$result->image = DONATION_POST_IMAGE('preview.jpg');
						}

						
						// $print .='

						// 		<!-- featured-top -->
						// 		<div class="featured-top">
						// 			<h4>Recommended Ads for You</h4>
						// 			<div class="dropdown pull-right">
									
						// 			<!-- category-change -->
						// 			<div class="dropdown category-dropdown">
						// 				<h5>Sort by:</h5>						
						// 				<a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
						// 				<ul class="dropdown-menu category-change">
						// 					<li><a href="#">Featured</a></li>
						// 					<li><a href="#">Newest</a></li>
						// 					<li><a href="#">All</a></li>
						// 					<li><a href="#">Bestselling</a></li>
						// 				</ul>								
						// 			</div><!-- category-change -->														
						// 			</div>							
						// 		</div><!-- featured-top -->	
						// 		';


						$print .= '
									<div class="col-xl-3 col-md-4 col wow animate fadeInDown" data-wow-delay="'.(($key+1)*100).'ms" data-wow-duration="1500ms">
						                <div class="auction-card style-7">
						                  <div class="auction-card-img-wrap">
						                  	<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" class="card-img">
						           ';

						$alt = str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

						if(!empty($result->image))
						{
												// $base_path = URL::asset('images/uploads/user_success_story/');
								$print .='				
												<img src="'.$result->image.'" alt="'.$result->title.'">
												
										';

							}else
							{
												
								$print .='			
												<img src="'. URL::asset("/uploads/images/video_default.jpg").'" alt="'.$result->title.'" >
											
										 ';
							} 

						

						$print .= '
						                  	</a>
						           ';

						if($result->is_urgent == 1) // If Live
						{
							$print .= '		
											<div class="batch"><span class="live"><svg width="11" height="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg">
						                          <path d="M10.6777 11H4.83398C4.65599 11 4.51172 10.8557 4.51172 10.6777V10.334C4.51172 9.97798 4.80025 9.68944 5.15625 9.68944V9.30414C5.15625 8.79397 5.57133 8.37889 6.0815 8.37889H9.43022C9.94039 8.37889 10.3555 8.79397 10.3555 9.30414V9.68944C10.7115 9.68944 11 9.97798 11 10.334V10.6777C11 10.8556 10.8556 11 10.6777 11ZM6.96665 7.09722C6.75245 7.38146 6.34829 7.43829 6.06405 7.22402C5.77973 7.00985 5.72299 6.60568 5.93716 6.32134L7.8766 3.74766C8.09087 3.46333 8.49494 3.40659 8.7792 3.62077C9.06353 3.83503 9.12035 4.23911 8.90609 4.52346L6.96665 7.09722ZM2.334 3.60618C2.11973 3.89042 1.71563 3.94725 1.43131 3.73298C1.14707 3.51881 1.09025 3.11473 1.30451 2.83038L3.24397 0.256726C3.45815 -0.027598 3.86231 -0.0844241 4.14657 0.12984C4.43081 0.344103 4.48763 0.748181 4.27337 1.03253L2.334 3.60618ZM3.74767 5.4785C3.27134 5.11956 2.91373 4.67385 2.69008 4.20454L4.94678 1.20984C5.45955 1.29552 5.98651 1.51631 6.46293 1.87534C6.93928 2.23428 7.29689 2.67999 7.52054 3.14921L5.26382 6.14409C4.75108 6.05841 4.22411 5.83751 3.74767 5.4785ZM2.87749 5.56242C3.02753 5.71533 3.18557 5.86196 3.35979 5.99329C3.53409 6.12456 3.71864 6.23606 3.90689 6.33822L3.48668 6.89589L2.45719 6.12018L2.87749 5.56242ZM2.06929 6.63488L3.09878 7.41059L1.15932 9.98436C0.945055 10.2687 0.540977 10.3254 0.256717 10.1112C-0.027607 9.89698 -0.0843477 9.4929 0.12983 9.20856L2.06929 6.63488Z" />
						                        </svg> Live </span>
						                      <div class="code-no"><span class="code">Lot # '.$result->post_no.'</span></div>
						                    </div>

						                    <ul class="view-and-favorite-area">
						                      <li><a href="#"><svg width="16" height="15" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg">
						                            <path d="M8.00013 3.32629L7.32792 2.63535C5.75006 1.01348 2.85685 1.57317 1.81244 3.61222C1.32211 4.57128 1.21149 5.95597 2.10683 7.72315C2.96935 9.42471 4.76378 11.4628 8.00013 13.6828C11.2365 11.4628 13.03 9.42471 13.8934 7.72315C14.7888 5.95503 14.6791 4.57128 14.1878 3.61222C13.1434 1.57317 10.2502 1.01254 8.67234 2.63441L8.00013 3.32629ZM8.00013 14.8125C-6.375 5.31378 3.57406 -2.09995 7.83512 1.8216C7.89138 1.87317 7.94669 1.9266 8.00013 1.98192C8.05303 1.92665 8.10807 1.87349 8.16513 1.82254C12.4253 -2.10182 22.3753 5.31284 8.00013 14.8125Z" />
						                          </svg></a></li>
						                      <li><a href="#"><svg width="17" height="11" viewBox="0 0 17 11" xmlns="http://www.w3.org/2000/svg">
						                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4028 5.44118C14.0143 7.8425 11.3811 9.33421 8.53217 9.33421C5.68139 9.33421 3.04821 7.8425 1.65968 5.44118C1.55274 5.25472 1.55274 5.05762 1.65968 4.87132C3.04821 2.47003 5.68139 0.978484 8.53217 0.978484C11.3811 0.978484 14.0143 2.47003 15.4028 4.87132C15.5116 5.05762 15.5116 5.25472 15.4028 5.44118ZM16.2898 4.39522C14.7224 1.68403 11.7499 0 8.53217 0C5.31258 0 2.3401 1.68403 0.772715 4.39522C0.492428 4.87896 0.492428 5.43355 0.772715 5.91693C2.3401 8.62812 5.31258 10.3125 8.53217 10.3125C11.7499 10.3125 14.7224 8.62812 16.2898 5.91693C16.5701 5.43358 16.5701 4.87896 16.2898 4.39522ZM8.53217 7.1634C9.68098 7.1634 10.6159 6.26305 10.6159 5.15617C10.6159 4.04929 9.68098 3.14894 8.53217 3.14894C7.38152 3.14894 6.44663 4.04929 6.44663 5.15617C6.44663 6.26305 7.38156 7.1634 8.53217 7.1634ZM8.53217 2.17045C6.82095 2.17045 5.43061 3.50998 5.43061 5.1562C5.43061 6.80278 6.82098 8.14176 8.53217 8.14176C10.2416 8.14176 11.6319 6.80275 11.6319 5.1562C11.6319 3.50998 10.2416 2.17045 8.53217 2.17045Z" />
						                          </svg></a></li>
						                    </ul>
						                    <div class="countdown-timer">
						                      <ul data-countdown="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d H:i:s').'">
						                        <li class="times" data-days="00">00</li>
						                        <li class="colon"> : </li>
						                        <li class="times" data-hours="00">00</li>
						                        <li class="colon"> : </li>
						                        <li class="times" data-minutes="00">00</li>
						                        <li class="colon"> : </li>
						                        <li class="times" data-seconds="00">00</li>
						                      </ul>
						                    </div>
						                  </div>
						                  <div class="auction-card-content">
						                    <h6><a href="'.route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">'.$result->title.'</a></h6>
						                    <div class="price-and-code-area">
						                      <div class="price"><span>Current Bid at:</span><strong> ₹'.$result->consideration_detail.' </strong></div><a href="'.route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" class="bid-btn"> Bid Now </a>
						                    </div>
						                  </div>
						                </div>
						              </div>
									';
						}
						else // Upcoming
						{
							$print .= '		
											<div class="batch"><span class="upcoming"><svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
						                          <path d="M0.731707 3.29268H0V7.46341C0 8.30488 0.695122 9 1.53659 9H7.46341C8.30488 9 9 8.30488 9 7.46341V3.29268H8.26829H0.731707ZM5.67073 4.84756C5.79878 4.70122 6.05488 4.71951 6.18293 4.84756C6.58537 5.21341 6.96951 5.57927 7.37195 5.96342C7.51829 6.10976 7.5 6.34756 7.37195 6.47561C7.0061 6.87805 6.64024 7.2622 6.2561 7.66463C6.10976 7.81098 5.87195 7.79268 5.7439 7.66463C5.59756 7.53659 5.61585 7.28049 5.7439 7.15244C6.01829 6.84146 6.31098 6.54878 6.58537 6.23781C6.27439 5.94512 5.96341 5.65244 5.65244 5.37805C5.5061 5.21342 5.52439 4.97561 5.67073 4.84756ZM4.20732 4.84756C4.33537 4.70122 4.59146 4.71951 4.71951 4.84756C5.12195 5.21341 5.5061 5.57927 5.90854 5.96342C6.05488 6.10976 6.03658 6.34756 5.90854 6.47561C5.54268 6.87805 5.17683 7.2622 4.79268 7.66463C4.64634 7.81098 4.40854 7.79268 4.28049 7.66463C4.13415 7.53659 4.15244 7.28049 4.28049 7.15244C4.55488 6.84146 4.84756 6.54878 5.12195 6.23781C4.81098 5.94512 4.5 5.65244 4.18902 5.37805C4.04268 5.21342 4.06098 4.97561 4.20732 4.84756ZM8.26829 2.56098H9V1.53659C9 0.713415 8.34146 0.0365854 7.51829 0V0.841463C7.51829 1.04268 7.35366 1.20732 7.15244 1.20732C6.95122 1.20732 6.78658 1.02439 6.78658 0.841463V0H2.26829V0.804878C2.26829 1.0061 2.10366 1.17073 1.90244 1.17073C1.70122 1.17073 1.53659 0.987805 1.53659 0.804878V0C0.695122 0 0 0.695122 0 1.53659V2.56098H0.731707H8.26829Z" />
						                        </svg> UPCOMING </span>
						                      <div class="code-no"><span class="code">Lot # '.$result->post_no.'</span></div>
						                    </div>


						                    <ul class="view-and-favorite-area">
						                      <li><a href="#"><svg width="16" height="15" viewBox="0 0 16 15" xmlns="http://www.w3.org/2000/svg">
						                            <path d="M8.00013 3.32629L7.32792 2.63535C5.75006 1.01348 2.85685 1.57317 1.81244 3.61222C1.32211 4.57128 1.21149 5.95597 2.10683 7.72315C2.96935 9.42471 4.76378 11.4628 8.00013 13.6828C11.2365 11.4628 13.03 9.42471 13.8934 7.72315C14.7888 5.95503 14.6791 4.57128 14.1878 3.61222C13.1434 1.57317 10.2502 1.01254 8.67234 2.63441L8.00013 3.32629ZM8.00013 14.8125C-6.375 5.31378 3.57406 -2.09995 7.83512 1.8216C7.89138 1.87317 7.94669 1.9266 8.00013 1.98192C8.05303 1.92665 8.10807 1.87349 8.16513 1.82254C12.4253 -2.10182 22.3753 5.31284 8.00013 14.8125Z" />
						                          </svg></a></li>
						                      <li><a href="#"><svg width="17" height="11" viewBox="0 0 17 11" xmlns="http://www.w3.org/2000/svg">
						                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4028 5.44118C14.0143 7.8425 11.3811 9.33421 8.53217 9.33421C5.68139 9.33421 3.04821 7.8425 1.65968 5.44118C1.55274 5.25472 1.55274 5.05762 1.65968 4.87132C3.04821 2.47003 5.68139 0.978484 8.53217 0.978484C11.3811 0.978484 14.0143 2.47003 15.4028 4.87132C15.5116 5.05762 15.5116 5.25472 15.4028 5.44118ZM16.2898 4.39522C14.7224 1.68403 11.7499 0 8.53217 0C5.31258 0 2.3401 1.68403 0.772715 4.39522C0.492428 4.87896 0.492428 5.43355 0.772715 5.91693C2.3401 8.62812 5.31258 10.3125 8.53217 10.3125C11.7499 10.3125 14.7224 8.62812 16.2898 5.91693C16.5701 5.43358 16.5701 4.87896 16.2898 4.39522ZM8.53217 7.1634C9.68098 7.1634 10.6159 6.26305 10.6159 5.15617C10.6159 4.04929 9.68098 3.14894 8.53217 3.14894C7.38152 3.14894 6.44663 4.04929 6.44663 5.15617C6.44663 6.26305 7.38156 7.1634 8.53217 7.1634ZM8.53217 2.17045C6.82095 2.17045 5.43061 3.50998 5.43061 5.1562C5.43061 6.80278 6.82098 8.14176 8.53217 8.14176C10.2416 8.14176 11.6319 6.80275 11.6319 5.1562C11.6319 3.50998 10.2416 2.17045 8.53217 2.17045Z" />
						                          </svg></a></li>
						                    </ul>
						                    <div class="countdown-timer">
						                      <ul data-countdown="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d H:i:s').'">
						                        <li class="times" data-days="00">00</li>
						                        <li class="colon"> : </li>
						                        <li class="times" data-hours="00">00</li>
						                        <li class="colon"> : </li>
						                        <li class="times" data-minutes="00">00</li>
						                        <li class="colon"> : </li>
						                        <li class="times" data-seconds="00">00</li>
						                      </ul>
						                    </div>
						                  </div>
						                  <div class="auction-card-content">
						                    <h6><a href="'.route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">'.$result->title.'</a></h6>
						                    <div class="price-and-code-area">
						                      <div class="price"><span>Start Bid at:</span><strong> ₹'.$result->consideration_detail.' </strong></div><a href="'.route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" class="bid-btn"> Notify Me </a>
						                    </div>
						                  </div>
						                </div>
						              </div>
									';
						}

						

 
					}
					$sucess_story=0;
				}

            	
			}else
			{
				// $base_path = URL::asset('images/uploads/user_success_image/');
				// $base_path = URL::asset();
				// echo $base_path;

				$base_path = URL::to('/');

				$print = '			<div class="alert alert-info" style="margin-top: 15px; text-align: center;">
									    <p>Auction will be started soon.</p>
									    <br>
									    <p>You can also start an Auction to buy or sell anything.</p>
									    
									    <a href="'.$base_path.'/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">Buy</a>
									    <a href="'.$base_path.'/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">Sell</a>
									</div>

						'; 
			}
			           		
			return $print;


		}



		/* Print Data of Ajax Final Result */
		public function printData_WorkingButDesignIssue($results,$city,$category,$pageId='0')
		{
		// echo "<pre>";
		// print_r($results);
		// die;
			$v='';
			$print = '';
			if(!empty($results)){
				
				foreach($results as $key=>$result){
                //Is Working Here - Haresh

					if(!empty($result)){

						
						$city =  City::where('id',$result->city_id)->where('status',1)->first();
                    

						$specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
						$subcategory = $specification->subcategory;
						$category = $subcategory->category;

						$user_type = DB::table('user_types')
										->where('id',$result->user_type_id)
										->where('status',1)
										->first();

						$donation_image = DB::table('donation_images')
											->where('donation_post_id',$result->id)
											->where('status',1)
											->first();

						$success_story_image = DB::table('user_posts_story_images')->where('donation_post_id',$result->id)->get();
						


					
                       	if($result->complete_title)
                       	{

	                       	$print.='<div class="modal fade" id="myModall1" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title" style="color: #ff0000 !important;">View Success Story</h4>
												</div>
											<div class="modal-body">

											<div class="description">
				                                <h4> '.$result->complete_title .' </h4>
				                            </div>
									';
                       	
							if($success_story_image)
							{
								// var/www/html
								// $folderpath  = base_path('images/uploads/user_success_image/');
								// domain
								$base_path = URL::asset('images/uploads/user_success_image/');

								
								$print.='	<div id="product-carousel" class="carousel slide" data-ride="carousel">
												<!-- Wrapper for slides -->
												<div class="carousel-inner" role="listbox">
										';		        
												
								$k= 0;
								foreach($success_story_image as $success_image)
								{	
													
									$image = $base_path.'/'.$success_image->image;
									$alt = str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

									if($k++ == 0)
									{
										$print.='	<!-- item -->
													<div class="item active">
														<div class="carousel-image">
														<!-- image-wrapper -->
															<img src="'.$image.'" alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
													     </div>
												    </div>
													<!-- item -->
												';
									}
									else
									{
										$print.='	<!-- item -->
												    <div class="item">
												      <div class="carousel-image">
												        <!-- image-wrapper -->

												        	<img src="'.$image.'"  alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
													     </div>
												    </div>
												    <!-- item -->
												';
									}
													
								}
												
								$print.='		</div>
												<!-- carousel-inner -->
												<!-- Controls -->
												<a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
											    	<i class="fa fa-chevron-left"></i>
											  	</a>
											  	<a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
											    	<i class="fa fa-chevron-right"></i>
											  	</a>
											  	<!-- Controls -->
											  	<!-- Indicators -->
												<ol class="carousel-indicators">
										';		        
												
								$i = 0;
								foreach($success_story_image as $success_image)
								{	
									$image = $base_path.'/'.$success_image->image;
									$alt = str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

									$print.='		<li data-target="#product-carousel" data-slide-to="'.$i++.'" class="">
														<img src="'.$image.'" alt="'.$alt.'" class="img-responsive">
													</li>
											';
								}
												
								$print.='	  	</ol>
											</div>
										';
							}
							

							$print.='		<div class="description">
				                                <p> '.$result->complete_msg.'</p>
				                            </div>
									';
										
								

							$print.='   </div>
									</div>

								<!-- 2 Div Extra Closed here-->	
								<!-- </div>
							</div> -->
									';

						}

					

						if(!empty($donation_image))
						{
							
							if($donation_image->file_type!="video")
							{
								$result->image = DONATION_POST_IMAGE($donation_image->image);
								
							}else{
								$result->image = DONATION_POST_IMAGE('preview_video.jpg');
							}
							             
						}else
						{
							$result->image = DONATION_POST_IMAGE('preview.jpg');
						}

						
						
						$print .= ' <!-- ad-item 123 -->
									<!-- ad-item -->
									<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                                 		<div class="ad-item row col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                 			<!-- item-image-box -->
                							<div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
				                  				<!-- item-image -->
				                  				<div class="item-image ">';
				                  				// $print .= $result->id;
				        $alt = str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

						if(!empty($result->image))
						{
							$print .='				<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="'.$result->image.'" alt="'.$alt.'" class="img-responsive" style="margin-left: auto; margin-right: auto; /* height: 148px;*/ /* width: 265px;*/ object-fit: contain;"></a>';

						}else
						{
							$print .='				<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="'.$alt.'" class="img-responsive" style="margin-left: auto; margin-right: auto; /* height: 148px;*/ /* width: 265px;*/ object-fit: contain;"></a>';
						}    

						
						if($result->is_urgent == 1){
							$print .= '				<span class="featured-ad">URGENT</span>';
						}


										

						$print .= ' 
										 		</div><!-- item-image -->
                							</div><!-- item-image-box -->';
                   
                    	$print .= '			<!-- rending-text -->
                							<div class="item-info col-sm-9"  style="padding: 0;">
 												<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
 													<!-- ad-info -->
                 						 			<div class="ad-info" >
                    									<h3 class="item-price">'.$result->title .'</h3>';

                    	$review = DB::table('donation_post_review')->where('donation_post_id','=',$result->id)->avg('rate_input');
                        
                        $Review = ceil($review);
						
						$print .='
														<div class="item-cat">
	                      									<span>
	                      										<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;font-weight: 100 !important;">'.$category->name.' | '.$subcategory->name.' | '. $specification->name.'
	                      										</a>
	                      									</span>
	                    								</div>

														<!-- <div class="" >
			                      							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;font-weight: 100 !important;"><i class="fa fa-map-marker"></i>
									                        	'. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
									                        </a>
							                    		</div> -->

									                    <div class="" style="margin-bottom: 10px;  ">
									                      	<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171; font-weight: 500 !important;"><i class="fa fa-map-marker"></i>
									                      		'. $result->address .'
									                      	</a>
									                    </div> 	
	                    	
								';

                    	
						
						$print .='  					<!-- ad-meta -->
									                  	<div class="ad-meta " style="/*position: absolute;padding-left: 10px;*/">
									                    	<div class="meta-content col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7" style=" padding-left: 0px; line-height: normal;">
								 ';

	                  
		                if (array_key_exists('away_distance', $result)) //Show on search page only
		                {
			                $print .=' 							<p>
			                										<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171; font-weight: 500 !important;"><i class="fa fa-map-pin"> </i>
				                       									'. ROUND($result->away_distance, 2) .' '. $result->distance_unit .' away
				              										</a>
				              									</p> 
				              		';
			            }
                      
                     	$print .='  							<p>
                     												<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                      													<i class="fa fa-clock-o"> </i> '. \Carbon\Carbon::parse($result->created_at)->diffForHumans() .'
                      												</a>
                      											</p>
 
                   				';
                                    
		                  
		          		 $print .='							</div><!-- ad-info -->';





                    	$print .=' 							<!-- item-info-right -->
                    										<div class="user-option pull-right" style="padding-right: 10px;">
                    			 ';


                		if($result->consideration == '0') // Free
						{
							
							$print .= '							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<h3 class="item-price pull-right" title="Free" style="margin-top: 10px;"> Free </h3>
																</a>
									  ';	
					
						}else if ($result->consideration == '1')
						{
							$print .= '							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<h3 class="item-price pull-right" title="'.$result->consideration_detail.'" style="margin-top: 10px;">'.$result->consideration_detail.'</h3> 
																</a>
										';
						}else
						{
							$print .= '							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<h3 class="item-price pull-right" title="'.$result->consideration_detail.'" style="margin-top: 10px;">'.$result->consideration_detail.'</h3>
																</a>
										';
						}



                   		if(Auth::guard('user')->check())
                   		{
		                          				
							if(Auth::guard('user')->user()->id == $result->user_id)
							{

								if($result->consideration == '0')
								{
									
									//  this code not work

									// comment below code - haresh

									$print.=' 					<div class="modal fade" id="date" role="dialog">
																	<div class="modal-dialog">

																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title" style="color: #ff0000 !important;">Update Expire Date</h4>
																			</div>
																			<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action = "'. route("user.updatedate").'">
																				<div class="modal-body">
																					<div class="row">
																						'.csrf_field().'

																						<div class="col-sm-12">
																							<div class="form-group">
																								<input type="hidden" name="post_id" value="'.$result->id.'"/>
																		
																								<input type="datetime-local" class="form-control" name="expiry" value="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d\TH:i').'" autocomplete="on">
																							</div>             
																						</div>   
																					</div>
																				</div>
																				<div class="modal-footer">
																					<div class="form-group">
																						<button type="submit" class="btn btn-danger pull-right">Submit</button>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
											';

									
							
								}else if ($result->consideration == '1')
								{
									$print .= '					<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span>
																</a>
											';
								}else
								{
									$print .= '					<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span>
																</a>';
								}

						
								if($result->is_complete == 0)
								{
									//$result->post_view_counter   - no such param available
									
									$print.=' 					<div class="modal fade" id="myModall12" role="dialog">
																	<div class="modal-dialog">

																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title" style="color: #ff0000 !important;">List of Viewers</h4>
																			</div>
																			<div class="modal-body">
																			   	<table class="table">
																					<thead>
																					  <tr>
																						<th>S.No.</th> 
																						<th>Mobile</th> 
																					  </tr>
																					</thead>
																					<tbody>
										  ';
								
								   $views = DB::table('donation_posts_views')
								   				->where('donation_posts_views.donation_post_id','=',$result->id)
								   				->select('users.contact','users.image','donation_posts_views.donation_post_id')
								   				->join('users','users.id', '=','donation_posts_views.user_id')
								   				->orderBy('donation_posts_views.id', 'DESC')
								   				->get();
									   
								   	foreach ($views as $kyy => $viewd) 
								   	{
										$kyy = $kyy+1;
										$print .=' 										<tr>
																							<td>'.$kyy.'</td>
																							<td>'.$viewd->contact.'</td>
																						</tr>
												';
															
									}                  
									
									$print .= '										</tbody>
										   										</table>
										   									</div>
																		</div>
																	</div>
																</div>
												';      
									
									// this code is working
	                                $print .='					<div class="dots-menu btn-group" style="float: right;font-size: 14px;">
									  								<a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 10px; cursor: pointer;" title="Action button"></i>
									  								</a>
									 
																  	<ul class="dropdown-menu">
																	    <li><a href="'.route("web.donation.edit.form",[$result->key]) .'" title="Update post" style="font-size: 14px;"><i class="fa fa-pencil-square-o"></i> Update</a></li>
																	    
																	    <li><a href="'. route("user.donation.complete",[$result->key]) .'"   title="Close/Complete post" style="font-size: 14px;" ><i  class="fa fa-flag-o" ></i> Close Post</a></li>

																	    <li><a href=""  data-toggle="modal" data-target="#date" title="Extend post expiry" style="font-size: 14px;"  ><i  class="fa fa-calendar" ></i> Extend</a></li>

																	    <li class="delete-row">
																	      <a href="'. route("user.donation.delete",[$result->key]) .'"  title="Delete post" style="font-size: 14px;"><i class="fa fa-trash-o"></i> Delete</a>
																	    </li>
																    </ul>
																</div>
											';
									

									$print.= '
																<div class="modal fade" id="open_pendingModal" role="dialog">
																	<div class="modal-dialog">

																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title" style="color: #ff0000 !important;"> Success Story </h4>
																			</div>
																			<form  class="" name="contact-form" method="POST" action="'.route("user.donation.complete",[$result->key]).'"  enctype="multipart/form-data">
																				<div class="modal-body">
																					<div class="row">

																						<input type="hidden" name="key" value="'.$result->key.'">
																						<input type="hidden" name="key" value="32g8a1i8e3c0kbql915f914">
																						<div class="col-sm-12">
																							<div class="form-group">
																								<select class="form-control" name="complete_title" id="">
																									<option value="">Select Rating</option>
																									<option value="1">1</option>
																									<option value="2">2</option>
																									<option value="3">3</option>
																									<option value="4">4</option>
																								</select>
																							</div>             
																						</div>
																						<div class="col-sm-12">
																							<div class="form-group">
																								<input type="file" name ="image_file">
																							</div>
																						</div>
																						<div class="col-sm-12">
																							<div class="form-group">
																								<textarea name="complete_msg"  class="form-control" value="" rows="7" placeholder=" Description">
																								</textarea>                                                 
																							</div>             
																						</div>     
																					</div>

																					<div class="modal-footer">
																						<div class="form-group">
																							<input type="submit" class="btn btn-danger pull-right" value="Submit Your Story" name="submit">
																						</div>
																					</div>
																				</div>

																			</form>
																		</div>
																	</div>
																</div>
											';


									

									

								}
								else
								{
		                            if(empty(trim($result->complete_title)))
									{
										
										$print .='				<div class="dots-menu btn-group" style="float: right;">
																	<a data-toggle="dropdown">
																		<i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 5px; cursor: pointer;" title="Action button"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="javascript:void(0)" data-toggle="modal" data-target="#myModall" title="Success Story" style="font-size: 14px;">
																				<i class="fa fa-edit"></i> Success Story </a>
																		</li>
																	</ul>
																</div>
												' ;

								

										$print.=' 				<div class="modal fade" id="myModall" role="dialog">
																	<div class="modal-dialog">
																		<!-- Modal content-->
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" style="color: #00a651 !important;" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title">Write success story of the post</h4>
																			</div>
																			<div class="modal-body">
																				<form id="contact-form" onsubmit="return checks()" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action="'. route(" user.storycomplete",[$result->key]).'"> <div class="modal-body">
																						<div class="row"> '.csrf_field().' <div class="col-sm-12">
																								<div class="form-group">
																									<input type="hidden" name="post_id" value="'.$result->id.'" />
																									<span>Title</span>
																									<input type="text" name="title" id="report" class="form-control" rows="7" placeholder="Title" required>
																									<li class="error-li" id="title_error" style="display:none;"> Title must have minimum 5 characters.</li>
																								</div>
																							</div>
																							<div class="col-sm-12">
																								<div class="form-group">
																									<span>Image</span>
																									<input type="file" name="image_file[]" id="report2" class="form-control" value="Title" rows="7" placeholder="image" accept="image/*" multiple />
																								</div>
																							</div>
																							<div class="col-sm-12">
																								<div class="form-group">
																									<span>Sucess Story</span>
																									<textarea name="desc" id="report3" class="form-control" value="" rows="7" placeholder="Sucess Story" required></textarea>
																									<li class="error-li" id="desc_error" style="display:none;"> Description must have minimum 5 characters.</li>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div class="modal-footer">
																						<div class="form-group">
																							<button type="submit" class="btn btn-main pull-right">Submit Post Story</button>
																						</div>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>
												';

									
									}
									else
									{

									 
										
										$print .='				<div class="dots-menu btn-group" style="float: right;">
																	<a data-toggle="dropdown">
																		<i class="fa fa-ellipsis-v" style="font-size: 20px;"></i>
																	</a>
																	<ul class="dropdown-menu">
																		<li>
																			<a href="javascript:void(0)" data-toggle="modal" data-target="#myModall1" title="Click to report">
																				<i class="fa fa-eye"> Success story</i>
																			</a>
																		</li>
																	</ul>
																</div>
												' ;

									}


								}

							}
						}



						if(Auth::guard('user')->check())
						{
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
								{
									
									  
		                               $print .=  '				<a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="'.$result->post_view_counter.'"  >
		                               								<span   data-toggle="tooltip" data-placement="top" title="'.$result->post_view_counter.'">
		                               									<i class="fa fa-eye"></i> 
		                               								</span> 
		                               							</a>
		                               			';
		                        }


	                           	if($user_type->id == '1')
								{

										// echo "<pre>";
										// print_r($result);  //its working

										// 	die;

									$print .=  '	 			<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'">
																		<i class="fa fa-share-square-o"></i> 
																	</span> 
																</a>
												';

							

								}
								else if($user_type->id == '3')
								{
									$print .=  ' 				<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'">
																		<i class="fa fa-shopping-basket"></i> 
																	</span>
																</a>
												';
								}
								else 
								{
									$print .=  ' 				<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'">
																		<i class="fa fa-handshake-o"></i> 
																	</span> 
																</a>
												';


								}

									

								if(!empty($result->helper_status))
								{
									if($result->helper_status)
									{
										$print .=  '			<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span   data-toggle="tooltip" data-placement="top" title="Organization">
																		<i class="fa fa-building"></i> 
																	</span> 
																</a>
													';
									}else 
									{
										$print .=  '			<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">								<span   data-toggle="tooltip" data-placement="top" title="Individual">
																		<i class="fa fa-user-secret"></i> 
																	</span> 
																</a>
													';
									}
								}else
								{
									if($result->d_status)
									{
										$print .=  '			<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
																	<span   data-toggle="tooltip" data-placement="top" title="Organization">
																		<i class="fa fa-building"></i> 
																	</span> 
																</a>
													';
									}else 
									{
										$print .=  '			<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">								<span   data-toggle="tooltip" data-placement="top" title="Individual">
																		<i class="fa fa-user-secret"></i> 
																	</span> 
																</a>
													';
									}
								}

							}
						}

                    

						if(Auth::guard('user')->check())
						{
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
								{
								
								  $print .=  '					<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"  title="Free"> 
								  									<span  style="font-size: 15px;"> Open 
								  									</span>  
								  								</a>
								  			';
	                            }
							}
						}

                     	$print .=  '                     
										                    </div><!-- item-info-right -->
										                  
										                </div><!-- ad-meta -->
													</div><!-- item-info -->
									            </a>
									        </div><!-- ad-item -->
									    </div><!-- ad-item -->
									</a>
								';

					}
					$sucess_story=0;
				}

            	
			}else
			{
				// $base_path = URL::asset('images/uploads/user_success_image/');
				// $base_path = URL::asset();
				// echo $base_path;
				$print = '			<div class="alert alert-info" style="margin-top: 15px; text-align: center;">
									    <p>Be the first to show your kindness at your area.</p>
									    <p></p>
									    <p></p>
									    <p>Together we can make a difference Now!.</p>
									    

									    
									    <a href="https://doncen.org/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">DONATE</a>
									    <a href="https://doncen.org/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">REQUEST</a>
									</div>

						';
			}
			           		
			return $print;


		}




		/* Print Data of Ajax Final Result */
		public function printData_21062024_deleted_commented_code($results,$city,$category,$pageId='0')
		{
			// echo "<pre>";
			// print_r($results);
			// die;



			$v='';
			$print = '';
			if(!empty($results)){
				foreach($results as $key=>$result){
                 
				
					//Is Working Here - Haresh

					if(!empty($result)){

						
						$city =  City::where('id',$result->city_id)->where('status',1)->first();
                    

						$specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
						$subcategory = $specification->subcategory;
						$category = $subcategory->category;

						$user_type = DB::table('user_types')
						->where('id',$result->user_type_id)
						->where('status',1)
						->first();
						$donation_image = DB::table('donation_images')
						->where('donation_post_id',$result->id)
						->where('status',1)
						->first();


						$success_story_image = DB::table('user_posts_story_images')->where('donation_post_id',$result->id)->get();
						
					
                       	if($result->complete_title)
                       	{

	                       	$print.=' <div class="modal fade" id="myModall1" role="dialog">
											<div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="color: #ff0000 !important;">View Success Story</h4>
											</div>
											<div class="modal-body">

												<div class="description">
					                                <h4> '.$result->complete_title .' </h4>
					                            </div>
									';
                       	
										
								if($success_story_image)
								{
									
									
									// var/www/html
									// $folderpath  = base_path('images/uploads/user_success_image/');

									// domain
									$base_path = URL::asset('images/uploads/user_success_image/');

								
									$print.='
													<div id="product-carousel" class="carousel slide" data-ride="carousel">
													  <!-- Wrapper for slides -->
													  <div class="carousel-inner" role="listbox">
													    
												';		        
												
												$k= 0;
												foreach($success_story_image as $success_image)
												{	
													
													$image = $base_path.'/'.$success_image->image;
													$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

													if($k++ == 0)
													{
														$print.='
															     <!-- item -->
															    <div class="item active">
															      <div class="carousel-image">
															        <!-- image-wrapper -->

															        	<img src="'.$image.'" alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
																     </div>
															    </div>
															    <!-- item -->
														';
													}
													else
													{
														$print.='
															     <!-- item -->
															    <div class="item">
															      <div class="carousel-image">
															        <!-- image-wrapper -->

															        	<img src="'.$image.'"  alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
																     </div>
															    </div>
															    <!-- item -->
														';
													}
													
												}
												
												$print.='

													      
													    
													  </div>
													  <!-- carousel-inner -->
													  <!-- Controls -->
													  <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
													    <i class="fa fa-chevron-left"></i>
													  </a>
													  <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
													    <i class="fa fa-chevron-right"></i>
													  </a>
													  <!-- Controls -->
													  <!-- Indicators -->
													  <ol class="carousel-indicators">
												';		        
												
												$i = 0;
												foreach($success_story_image as $success_image)
												{	
													$image = $base_path.'/'.$success_image->image;
													$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

													$print.='
														       	<li data-target="#product-carousel" data-slide-to="'.$i++.'" class="">
															      <img src="'.$image.'" alt="'.$alt.'" class="img-responsive">
															    </li>
													';
												}
												
												$print.='
													    
													    
													  </ol>
													</div>
										';
								}
								
						
						

							$print.='			
											
											<div class="description">
				                                <p> '.$result->complete_msg.'</p>
				                            </div>
								';
										
								

										$print.='   </div>
										</div>
										</div>
										</div>';

									

						}

					

						if(!empty($donation_image)){
							
							if($donation_image->file_type!="video"){
								$result->image = DONATION_POST_IMAGE($donation_image->image);
								
							}else{
								$result->image = DONATION_POST_IMAGE('preview_video.jpg');
							}
							             

							
						}else{
							$result->image = DONATION_POST_IMAGE('preview.jpg');
						}



							$print .= '  <!-- ad-item 123 -->
										<!-- ad-item -->
							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                                 <div class="ad-item row col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                 	<!-- item-image-box -->
                					<div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
				                  		<!-- item-image -->
				                  		<div class="item-image ">';
				                  		// $print .= $result->id;
				                  		$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

										if(!empty($result->image)){
											$print .='<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="'.$result->image.'" alt="'.$alt.'" class="img-responsive" ></a>';

												
										}else{
											$print .='<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="'.$alt.'" class="img-responsive" ></a>';
										}    

										if($result->is_urgent == 1){
											$print .= '<span class="featured-ad">URGENT</span>';
										}


										

										$print .= ' 
										 </div><!-- item-image -->
                					</div><!-- item-image-box -->';
                   
                    				$print .= '<!-- rending-text -->
                					<div class="item-info col-sm-9"  style="padding: 0;">
 										<!-- ad-info -->
 											<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                 						 		<div class="ad-info" >
                    								<h3 class="item-price">'.$result->title .'</h3>';

                    				


                        $review = DB::table('donation_post_review')->where('donation_post_id','=',$result->id)->avg('rate_input');
                         $review=ceil($review);
						$print .='
						<div class="item-cat">
	                      <span><a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;font-weight: 100 !important;">'.$category->name.' | '.$subcategory->name.' | '. $specification->name.'</a></span>
	                    </div>

						<!-- <div class="" >
		                      <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;font-weight: 100 !important;"><i class="fa fa-map-marker"></i>
		                      '. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
		                      </a>
	                    </div> -->

	                    <div class="" style="margin-bottom: 10px;  ">
		                      <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171; font-weight: 500 !important;"><i class="fa fa-map-marker"></i>
		                      '. $result->address .'
		                      </a>
	                    </div> 	
	                    	

	                    	 ';

                    	
						
						 $print .='  <!-- ad-meta -->
                  <div class="ad-meta " style="/*position: absolute;padding-left: 10px;*/">
                    <div class="meta-content col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7" style=" padding-left: 0px; line-height: normal;">';

	                  
	                 if (array_key_exists('away_distance', $result)) //Show on search page only
	                 {
		                 $print .=' <p><a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171; font-weight: 500 !important;"><i class="fa fa-map-pin"> </i>
			                       '. ROUND($result->away_distance, 2) .' '. $result->distance_unit .' away
			              </a></p> ';
		              }
                      
                     $print .='  <p><a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                      	<i class="fa fa-clock-o"> </i> '. \Carbon\Carbon::parse($result->created_at)->diffForHumans() .'
                      </a></p>
 
                   ';
                                    
		                  
		           $print .='</div><!-- ad-info -->';





                    $print .=' <!-- item-info-right -->
                    <div class="user-option pull-right" style="    padding-right: 10px;">';


                    		if($result->consideration == '0') // Free
								{
									
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><h3 class="item-price pull-right" title="Free" style="margin-top: 10px;"> Free </h3></a>';	
							
								}else if ($result->consideration == '1'){
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><h3 class="item-price pull-right" title="'.$result->consideration_detail.'" style="margin-top: 10px;">'.$result->consideration_detail.'</h3> </a>';
								}else{
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><h3 class="item-price pull-right" title="'.$result->consideration_detail.'" style="margin-top: 10px;">'.$result->consideration_detail.'</h3></a>';
								}



                   if(Auth::guard('user')->check()){
		                          				

												
							if(Auth::guard('user')->user()->id == $result->user_id)
							{

								
								if($result->consideration == '0')
								{
									
									

									//  this code not work

									// comment below code - haresh

									$print.=' <div class="modal fade" id="date" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;">Update Expire Date</h4>
									</div>
									<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action = "'. route("user.updatedate").'">
									<div class="modal-body">
									<div class="row">
									'.csrf_field().'

									<div class="col-sm-12">
									<div class="form-group">
									<input type="hidden" name="post_id" value="'.$result->id.'"/>
									
									<input type="datetime-local" class="form-control" name="expiry" value="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d\TH:i').'" autocomplete="on">

									</div>             
									</div>   


									</div>

									</div>
									<div class="modal-footer">
									<div class="form-group">
									<button type="submit" class="btn btn-danger pull-right">Submit</button>
									</div>
									</div>
									</form>
									</div>
									</div>
									</div>';

									
							
								}else if ($result->consideration == '1'){
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span> </a>';
								}else{
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span></a>';
								}

						
								if($result->is_complete == 0)
								{
									
									
									//$result->post_view_counter   - no such param available
									
									$print.=' <div class="modal fade" id="myModall12" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;">List of Viewers</h4>
									</div>
									<div class="modal-body">
									   <table class="table">
											<thead>
											  <tr>
												<th>S.No.</th> 
												<th>Mobile</th> 
											  </tr>
											</thead>
											<tbody>
										  ';
								
								   $views = DB::table('donation_posts_views')
								   				->where('donation_posts_views.donation_post_id','=',$result->id)
								   				->select('users.contact','users.image','donation_posts_views.donation_post_id')
								   				->join('users','users.id', '=','donation_posts_views.user_id')
								   				->orderBy('donation_posts_views.id', 'DESC')
								   				->get();
									   
								   foreach ($views as $kyy => $viewd) {
												$kyy = $kyy+1;
												 $print .=' <tr>
																<td>'.$kyy.'</td>
																<td>'.$viewd->contact.'</td>
															  </tr>';
															
										 }                  
										$print .= '</tbody>
										   </table>
									';      
									




									$print.='   </div>
									</div>
									</div>
									</div>';
									// this code is working
	                                $print .='<div class="dots-menu btn-group" style="float: right;font-size: 14px;">
									  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 10px; cursor: pointer;" title="Action button"></i></a>
									 
									  <ul class="dropdown-menu">
									    <li><a href="'.route("web.donation.edit.form",[$result->key]) .'" title="Update post" style="font-size: 14px;"><i class="fa fa-pencil-square-o"></i> Update</a></li>
									    
									    <li><a href="'. route("user.donation.complete",[$result->key]) .'"   title="Close/Complete post" style="font-size: 14px;" ><i  class="fa fa-flag-o" ></i> Close Post</a></li>

									    <li><a href=""  data-toggle="modal" data-target="#date" title="Extend post expiry" style="font-size: 14px;"  ><i  class="fa fa-calendar" ></i> Extend</a></li>

									    <li class="delete-row">
									      <a href="'. route("user.donation.delete",[$result->key]) .'"  title="Delete post" style="font-size: 14px;"><i class="fa fa-trash-o"></i> Delete</a>
									    </li>
									    
									    
									  </ul>
									</div>' ;

									
									

									$print.= '
									<div class="modal fade" id="open_pendingModal" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;"> Success Story </h4>
									</div>
									<form  class="" name="contact-form" method="POST" action="'.route("user.donation.complete",[$result->key]).'"  enctype="multipart/form-data">
									<div class="modal-body">
									<div class="row">

									<input type="hidden" name="key" value="'.$result->key.'">
									<input type="hidden" name="key" value="32g8a1i8e3c0kbql915f914">
									<div class="col-sm-12">
									<div class="form-group">
									<select class="form-control" name="complete_title" id="">
									<option value="">Select Rating</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									</select>
									getItem  </div>             
									</div>

									<div class="col-sm-12">
									<div class="form-group">
									<input type="file" name ="image_file">
									</div>
									</div>
									<div class="col-sm-12">
									<div class="form-group">
									<textarea name="complete_msg"  class="form-control" value="" rows="7" placeholder=" Description"></textarea>                                                 </div>             
									</div>     
									</div>

									<div class="modal-footer">
									<div class="form-group">
									<input type="submit" class="btn btn-danger pull-right" value="Submit Your Story" name="submit">
									</div>
									</div>
									</div>

									</form>
									</div>
									</div>
									</div>';

									

								}
								else
								{
		                                    if(empty(trim($result->complete_title)))
									
									
									{
										
										$print .='<div class="dots-menu btn-group" style="float: right;">
									  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 5px; cursor: pointer;" title="Action button"></i></a>
									 
									  <ul class="dropdown-menu">
									  
									    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModall"   title="Success Story"  style="font-size: 14px;" ><i class="fa fa-edit"></i> Success Story</a></li>

									   	    
									  </ul>

									
									</div>' ;

									


								$print.=' <div class="modal fade" id="myModall" role="dialog">
								<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" style="color: #00a651 !important;" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" >Write success story of the post</h4>
								</div>
								<div class="modal-body">
								<form id="contact-form" onsubmit="return checks()" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data"  action = "'. route("user.storycomplete",[$result->key]).'">
								
								<div class="modal-body">
										<div class="row">
										'.csrf_field().'

										<div class="col-sm-12">
										<div class="form-group">
										<input type="hidden" name="post_id" value="'.$result->id.'"/>
										<span>Title</span>
										<input type="text" name="title" id="report" class="form-control"  rows="7" placeholder="Title" required>
										
										<li class="error-li"  id="title_error" style="display:none;"> Title must have minimum 5 characters.</li>
										</div>             
										</div>   
										<div class="col-sm-12">
										<div class="form-group">
										<span>Image</span>
										<input type="file" name="image_file[]" id="report2" class="form-control" value="Title" rows="7" placeholder="image" accept="image/*" multiple/>
										
										
										</div>           
										             
										</div>   

										<div class="col-sm-12">
										<div class="form-group">
										<span>Sucess Story</span>
										
										<textarea name="desc" id="report3" class="form-control" value="" rows="7" placeholder="Sucess Story" required></textarea>
										
										<li class="error-li"  id="desc_error" style="display:none;"> Description must have minimum 5 characters.</li>
										</div>             
										</div>   
										</div>

										</div>
										<div class="modal-footer">
										<div class="form-group">
										<button type="submit" class="btn btn-main pull-right">Submit Post Story</button>
										</div>
										</div>
								</form>
								';





								$print.='   </div>
								</div>
								</div>
								</div>';


									
									}
									else
									{

									 
										
										$print .=   '<div class="dots-menu btn-group" style="float: right;">
                                          <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px;" ></i></a>
                                         
                                          <ul class="dropdown-menu">
                                            
                                            <li>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall1" title="Click to report"  ><i class="fa fa-eye" > Success story</i></a>

                                            </li>
                                           
                                           

                                          </ul>
                                        </div>' ;

										
												
									

									}


								}

							}
						}



						if(Auth::guard('user')->check()){
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
									{
									
									  
		                               $print .=  '<a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="'.$result->post_view_counter.'"  ><span   data-toggle="tooltip" data-placement="top" title="'.$result->post_view_counter.'"><i class="fa fa-eye"></i> </span> </a>';
		                           }


	                           if($user_type->id == '1')
									{

										// echo "<pre>";
										// print_r($result);  //its working

										// 	die;

										$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </span> </a>';

							

									}
									else if($user_type->id == '3')
									{
										$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </span></a>';
									}
									else 
									{
										$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </span> </a>';


									}

									

									if(!empty($result->helper_status)){
										if($result->helper_status){
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
										}else {
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
										}
									}else{
										if($result->d_status){
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
										}else {
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
										}
									}

							}
						}

                    

						if(Auth::guard('user')->check()){
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
								{
								
								  $print .=  '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"  title="Free"  > <span  style="font-size: 15px;"> Open </span>  </a>';
	                              
	                           }

							}
						}

                     $print .=  '                     
                    </div><!-- item-info-right -->
                  </div><!-- ad-meta -->
				</div><!-- item-info -->
              </div><!-- ad-item -->
              </div><!-- ad-item -->
              ';

					}
					$sucess_story=0;
				}

            	
			}else{
				
				$print = '<div class="alert alert-info" style="margin-top: 15px; text-align: center;">
						    <p>Be the first to show your kindness at your area.</p>
						    <p></p>
						    <p></p>
						    <p>Together we can make a difference Now!.</p>
						    
						    <a href="https://doncen.org/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">DONATE</a>
						    <a href="https://doncen.org/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">REQUEST</a>
						</div>

						';
			}
			           		
			return $print;


		}
		
		/* Print Data of Ajax Final Result */
		public function printData_21062024($results,$city,$category,$pageId='0')
		{
		// echo "<pre>";
		// print_r($results);
		// die;



			$v='';
			$print = '';
			if(!empty($results)){
				foreach($results as $key=>$result){
                 
				// echo "<pre>";
				// 		print_r($results);
				// 		die;
					//Is Working Here - Haresh

					if(!empty($result)){

						// echo "<pre>";
						// print_r($result);
						// die;
                    // if(empty($city)){
                    //     $city =  City::where('id',$result->city_id)->where('status',1)->first();
                    // }
						$city =  City::where('id',$result->city_id)->where('status',1)->first();
                    // echo "<pre>";
            		// print_r($city);
            		// die;

                    // if(empty($category)){
                    //     $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                    //     $subcategory = $specification->subcategory;
                    //     $category = $subcategory->category;
                    // }else {
                    //     $specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
                    //     $subcategory = $specification->subcategory;
                    // }

						$specification =  Specification::where('id',$result->specification_id)->where('status',1)->first();
						$subcategory = $specification->subcategory;
						$category = $subcategory->category;

						$user_type = DB::table('user_types')
						->where('id',$result->user_type_id)
						->where('status',1)
						->first();
						$donation_image = DB::table('donation_images')
						->where('donation_post_id',$result->id)
						->where('status',1)
						->first();



    				// $success_story = DB::table('donation_posts_story')->where('donation_post_id',$result->id)->count();
					//$success_story = DB::table('donation_posts_story')->where('donation_post_id',$result->id);
					// print_r($success_story);
					// die();

    				// $success_story_get= DB::table('donation_posts_story')->where('donation_post_id','70')->get();
    				// print_r($success_story_get);

						$success_story_image = DB::table('user_posts_story_images')->where('donation_post_id',$result->id)->get();
						
					// print_r($result);
					// die();
						




                       	if($result->complete_title)
                       	{

	                       	$print.=' <div class="modal fade" id="myModall1" role="dialog">
											<div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="color: #ff0000 !important;">View Success Story</h4>
											</div>
											<div class="modal-body">

												<div class="description">
					                                <h4> '.$result->complete_title .' </h4>
					                            </div>
									';
                       	
								// echo $print;
								// die();		
								if($success_story_image)
								{
									
									
									// var/www/html
									// $folderpath  = base_path('images/uploads/user_success_image/');

									// domain
									$base_path = URL::asset('images/uploads/user_success_image/');

								
									$print.='
													<div id="product-carousel" class="carousel slide" data-ride="carousel">
													  <!-- Wrapper for slides -->
													  <div class="carousel-inner" role="listbox">
													    
												';		        
												
												$k= 0;
												foreach($success_story_image as $success_image)
												{	
													
													$image = $base_path.'/'.$success_image->image;
													$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

													if($k++ == 0)
													{
														$print.='
															     <!-- item -->
															    <div class="item active">
															      <div class="carousel-image">
															        <!-- image-wrapper -->

															        	<img src="'.$image.'" alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
																     </div>
															    </div>
															    <!-- item -->
														';
													}
													else
													{
														$print.='
															     <!-- item -->
															    <div class="item">
															      <div class="carousel-image">
															        <!-- image-wrapper -->

															        	<img src="'.$image.'"  alt="'.$alt.'" class="img-responsive" style="max-height: 461px; margin-left: auto; margin-right: auto;">
																     </div>
															    </div>
															    <!-- item -->
														';
													}
													
												}
												
												$print.='

													      
													    
													  </div>
													  <!-- carousel-inner -->
													  <!-- Controls -->
													  <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
													    <i class="fa fa-chevron-left"></i>
													  </a>
													  <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
													    <i class="fa fa-chevron-right"></i>
													  </a>
													  <!-- Controls -->
													  <!-- Indicators -->
													  <ol class="carousel-indicators">
												';		        
												
												$i = 0;
												foreach($success_story_image as $success_image)
												{	
													$image = $base_path.'/'.$success_image->image;
													$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

													$print.='
														       	<li data-target="#product-carousel" data-slide-to="'.$i++.'" class="">
															      <img src="'.$image.'" alt="'.$alt.'" class="img-responsive">
															    </li>
													';
												}
												
												$print.='
													    
													    
													  </ol>
													</div>
										';
								}
								
						
						

							$print.='			
											
											<div class="description">
				                                <p> '.$result->complete_msg.'</p>
				                            </div>
								';
										
										
								// <div class="user-images">
					   		//                          <img src="'.$result->complete_media.'" alt="User Images" class="img-responsive">
					   		//                      </div>

										//echo "<pre>";
										//$print.=''.print_r($success_story_image);
										
									




										$print.='   </div>
										</div>
										</div>
										</div>';

									

						}

					// 			print_r($result);
					// die();
		
		// echo $print;
		// die;

						if(!empty($donation_image)){
							
							if($donation_image->file_type!="video"){
								$result->image = DONATION_POST_IMAGE($donation_image->image);
								
							}else{
								$result->image = DONATION_POST_IMAGE('preview_video.jpg');
							}
							             

							
						}else{
							$result->image = DONATION_POST_IMAGE('preview.jpg');
						}

// $print .= ' 
//  <div class="ad-item row">
//                 <div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
//                   <!-- item-image -->
//                   <div class="item-image ">
//                     <a href="details.html"><img src="https://doncen.org/images/uploads/donation_post/2209010744346Hco.jpg" alt="Image" class="img-responsive" style="width: 100%;"></a>
//                     <span class="featured-ad">URGENT</span>
//                     <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified" data-original-title="Verified" style="right: 0;background:none;font-size:14px;padding:0px;"><i class="fa fa-check-square-o"></i></a>
//                   </div><!-- item-image -->
//                 </div><!-- item-image-box -->
                
//                 <!-- rending-text -->
//                 <div class="item-info col-sm-9"  style="padding: 0;">
//                   <!-- ad-info -->
//                   <div class="ad-info" style="line-height: normal;">
//                     <h3 class="item-price">Want to donate<!-- <span>(Negotiable)</span> --></h3>
//                     <!-- <h4 class="item-title"><a href="#">Smartphone Original Cover</a></h4> -->
//                     <div class="item-cat">
//                       <span><a href="#">Food & Beverages >> Bakery, Cakes & Dairy >> Cookies, Rusk & Khari</a></span> /
//                       <span><a href="#">Sofa</a></span>
//                     </div>  
//                     <br> <!-- Add Star -->
//                        <div class="rate" style="color: #a0a0a0;">
//                             <div class="my">
//                                 <div class="star-rating">
//                                 <span class="star" style="font-size: 24px; padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span><span class="star" style="font-size: 24px;padding-right:2px;">★</span>
//                                 </div>
//                             </div>
//                         </div>
//                            <!-- Star End -->                  
//                   </div><!-- ad-info -->
                  
                 
//                   <!-- ad-meta -->
//                   <div class="ad-meta " style="position: absolute;padding-left: 10px;">
//                     <div class="meta-content col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" style="line-height: normal;">
//                       <a href="javascript:void(0)">01-09-2022 19:44  </a>

//                       <!-- <a href="https://doncen.org/donation-post-detail/omyx3gd7c24d06540n9l514"><i class="fa fa-tags"></i> New </a> -->
//                       <br>    
//                       <!-- <i class="fa fa-map-marker"></i> Indore Physical Academy Mp, Shiv Moti Nagar, Indore, Madhya Pradesh, India    -->

//                       <a href="https://doncen.org/donation-post-detail/omyx3gd7c24d06540n9l514"><i class="fa fa-map-marker"></i> Indore Madhya Pradesh India 
//                       </a>
//                     </div>                 
//                     <!-- item-info-right -->
//                     <div class="user-option pull-right" style="    padding-right: 10px;
// ">
//                       <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
//                       <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dealer"><i class="fa fa-suitcase"></i> </a>                     
//                     </div><!-- item-info-right -->
//                   </div><!-- ad-meta -->
//                 </div><!-- item-info -->
//               </div><!-- ad-item -->
// ';



							$print .= '  <!-- ad-item 123 -->
										<!-- ad-item -->
							<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                                 <div class="ad-item row col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                 	<!-- item-image-box -->
                					<div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
				                  		<!-- item-image -->
				                  		<div class="item-image ">';
				                  		// $print .= $result->id;
				                  		$alt=str_replace(' ','-',$category->name).'-'.str_replace(' ','-',$subcategory->name).'-'.str_replace(' ','-',$specification->name).'-'.str_replace(' ','-',$result->title);

										if(!empty($result->image)){
											$print .='<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="'.$result->image.'" alt="'.$alt.'" class="img-responsive" ></a>';

												
										}else{
											$print .='<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="'.$alt.'" class="img-responsive" ></a>';
										}    

										if($result->is_urgent == 1){
											$print .= '<span class="featured-ad">URGENT</span>';
										}


										// if($result->is_verified == 1){
										// 	$print .= ' <a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified" data-original-title="Verified" style="right: 0;background:none;font-size:14px;padding:0px;"><i class="fa fa-check-square-o"></i></a>';
										// }

										$print .= ' 
										 </div><!-- item-image -->
                					</div><!-- item-image-box -->';
                   
                    				$print .= '<!-- rending-text -->
                					<div class="item-info col-sm-9"  style="padding: 0;">
 										<!-- ad-info -->
 											<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                 						 		<div class="ad-info" >
                    								<h3 class="item-price">'.$result->title .'</h3>';

                    								
                    
                    






					// $print .= '  <!-- ad-item 123 -->
					// 	<a href="'. route("search.donation.details",$result->key).'">
					// 		<div class="ad-item row">
					// 			<!-- item-image-box -->
     //            					<div class="item-image-box col-sm-3 col-xs-12  col-md-3 col-lg-3 col-xl-3" style="padding: 0;">
				 //                  		<!-- item-image -->
				 //                  		<div class="item-image ">';
		   //                          	// $print .= $result->id;
					// 					if(!empty($result->image)){
					// 							$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="'.$result->image.'" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
									
											
											
					// 					}else{
					// 						$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
					// 					}    

					// 					if($result->is_urgent == 1){
					// 						$print .= '<a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified">Urgent</a>';
					// 					}

		   //                              // $print .= '<!--<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>-->

					// 					$print .= ' <a href="'. route("search.donation.details",$result->key).'">
					// 				</div><!-- item-image -->
					// 			</div>
					// 			<!-- rending-text -->
 

					// 			<div class="item-info col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
					// 				<!-- ad-info -->
					// 				<div class="ad-info col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-left: 0px; /* padding-bottom: 0px; */ position: initial;"> </a>';

					// 				$print .= '<a href="'. route("search.donation.details",$result->key).'"><div class="ad-info1 col-xs-8 col-sm-10 col-md-10 col-lg-10 col-xl-10 d-flex" style="display: flex;">
					// 				<h3 class="item-price">'.$result->title .'</h3>
					// 				</div> </a>';

                  

						// $print .= '  <!-- ad-item 123 -->
						// <a href="'. route("search.donation.details",$result->key).'">
						// 	<div class="category-item row">
						// 		<!-- item-image -->
						// 		<div class="item-image-box col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
						// 			<div class="item-image"> ';
		    //                         	// $print .= $result->id;
						// 				if(!empty($result->image)){
						// 						$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="'.$result->image.'" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
									
											
											
						// 				}else{
						// 					$print .='<a href="'. route("search.donation.details",$result->key).'"><img src="/images/uploads/donation_post/preview.jpg" alt="Image" class="img-responsive" style="height: 151px;object-fit: fill;"></a>';
						// 				}    

						// 				if($result->is_urgent == 1){
						// 					$print .= '<a href="'. route("search.donation.details",$result->key).'" class="verified" data-toggle="tooltip" data-placement="left" title="Verified">Urgent</a>';
						// 				}

		    //                             // $print .= '<!--<a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>-->

						// 				$print .= ' <a href="'. route("search.donation.details",$result->key).'">
						// 			</div><!-- item-image -->
						// 		</div>
						// 		<!-- rending-text -->
 

						// 		<div class="item-info col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
						// 			<!-- ad-info -->
						// 			<div class="ad-info col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-left: 0px; /* padding-bottom: 0px; */ position: initial;"> </a>';

						// 			$print .= '<a href="'. route("search.donation.details",$result->key).'"><div class="ad-info1 col-xs-8 col-sm-10 col-md-10 col-lg-10 col-xl-10 d-flex" style="display: flex;">
						// 			<h3 class="item-price">'.$result->title .'</h3>
						// 			</div> </a>';


						// echo "<pre>";
						// print_r($result);
						// echo $print;  // its working here
						// die;     
						// $dt=\Carbon\Carbon::now()->addDays(7)->format('Y-m-d\TH:i');
						//{{Carbon\Carbon::now()->addDays(7)->format("Y-m-d\TH:i")}}	

					//haresh start
						// if(Auth::guard('user')->check()){
		    //                       				// dd(Auth::guard('user')->user()->id );
		    //                       				// exit();
						// 						// echo "<pre>";
						// 						//   print_r($result->expired_at);
						// 						//   die();

												
						// 	if(Auth::guard('user')->user()->id == $result->user_id)
						// 	{

								
						// 		if($result->consideration == '0')
						// 		{
									
						// 				// 	echo "<pre>";
						// 				// print_r($result);  //its working

						// 				//  die;  
										
						// 			// $print .=   '<br><a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right">Free</span> </a>' ;

						// 			// echo $print;
						// 			// die; 

									
						// 			// $print .=   '<a href="" data-toggle="modal" data-target="#date" title="Click to report" style="color: #55b23d !important; padding-top:2px;" ><span class=" pull-right " > <i class="fa fa-calendar" style="padding-right: 7px;">Expired_at</i></span></a>' ;
									

						// 			//  this code not work

						// 			// comment below code - haresh

						// 			$print.=' <div class="modal fade" id="date" role="dialog">
						// 			<div class="modal-dialog">

						// 			<!-- Modal content-->
						// 			<div class="modal-content">
						// 			<div class="modal-header">
						// 			<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			<h4 class="modal-title" style="color: #ff0000 !important;">Update Expire Date</h4>
						// 			</div>
						// 			<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action = "'. route("user.updatedate").'">
						// 			<div class="modal-body">
						// 			<div class="row">
						// 			'.csrf_field().'

						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<input type="hidden" name="post_id" value="'.$result->id.'"/>
									
						// 			<input type="datetime-local" class="form-control" name="expiry" value="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d\TH:i').'" autocomplete="on">

						// 			</div>             
						// 			</div>   


						// 			</div>

						// 			</div>
						// 			<div class="modal-footer">
						// 			<div class="form-group">
						// 			<button type="submit" class="btn btn-danger pull-right">Submit</button>
						// 			</div>
						// 			</div>
						// 			</form>
						// 			</div>
						// 			</div>
						// 			</div>';

						// 			// echo $print;
						// 			// die; 
						// 				// echo "<pre>";
						// 				// print_r($result);  //not working working

						// 				//  die;
							
						// 		}else if ($result->consideration == '1'){
						// 			$print .= '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span> </a>';
						// 		}else{
						// 			$print .= '<a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span></a>';
						// 		}

						
						// 		if($result->is_complete == 0)
						// 		{
									
						// 			// echo $print;
						// 			// echo "<pre>";
						// 			// print_r($result);
						// 			//  		die; 
						// 				// this code not work

						// 				// echo $print;
						// 				// 	die; 

						// 				//error in $result->post_view_counter
						// 			// 	echo $print;
						// 			// die; 

						// 			// $print .=   '
						// 			// <div style=" cursor: pointer;">
						// 			//  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="Interested"  >
	     //    //                           <i class="fa fa-eye"></i><span> '.$result->post_view_counter.' </span></a>
	     //    //                         </div>';

						// 			//$result->post_view_counter   - no such param available
									
						// 			$print.=' <div class="modal fade" id="myModall12" role="dialog">
						// 			<div class="modal-dialog">

						// 			<!-- Modal content-->
						// 			<div class="modal-content">
						// 			<div class="modal-header">
						// 			<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			<h4 class="modal-title" style="color: #ff0000 !important;">List of Views</h4>
						// 			</div>
						// 			<div class="modal-body">
						// 			   <table class="table">
						// 					<thead>
						// 					  <tr>
						// 						<th>S.No.</th>
						// 						<th>Name</th>
						// 					  </tr>
						// 					</thead>
						// 					<tbody>
						// 				  ';
								
						// 		   $views = DB::table('donation_posts_views')->where('donation_posts_views.donation_post_id','=',$result->id)->select('users.name','users.image','donation_posts_views.donation_post_id')->join('users','users.id', '=','donation_posts_views.user_id')->get();
						// 			   // print_r($views); // no data
						// 			   // die;
						// 		   foreach ($views as $kyy => $viewd) {
						// 						$kyy = $kyy+1;
						// 						 $print .=' <tr>
						// 										<td>'.$kyy.'</td>
						// 										<td>'.$viewd->name.'</td>
						// 									  </tr>';
															
						// 				 }                  
						// 				$print .= '</tbody>
						// 				   </table>
						// 			';      
						// 			// foreach ($views as $kyy => $vi_ew) {

						// 			// 	$print.= '<tr><td>'.$kyy+1.'</td><td>'.$vi_ew->name;.'</td><td><img src="'.$vi_ew->image.'" alt="Image" class="img-responsive"></td></tr>';
						// 			// }




						// 			$print.='   </div>
						// 			</div>
						// 			</div>
						// 			</div>';
						// 			// this code is working
	     //                            $print .='<div class="dots-menu btn-group" style="float: right;">
						// 			  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 10px; cursor: pointer;" title="Action button"></i></a>
									 
						// 			  <ul class="dropdown-menu">
						// 			    <li><a href="'.route("web.donation.edit.form",[$result->key]) .'" title="Update post" ><i class="fa fa-pencil-square-o"></i> Update</a></li>
									    
						// 			    <li><a href="'. route("user.donation.complete",[$result->key]) .'"   title="Close/Complete post"  ><i  class="fa fa-flag-o" ></i> Close Post</a></li>

						// 			    <li><a href=""  data-toggle="modal" data-target="#date" title="Extend post expiry"  ><i  class="fa fa-calendar" ></i> Extend</a></li>

						// 			    <li class="delete-row">
						// 			      <a href="'. route("user.donation.delete",[$result->key]) .'"  title="Delete post"><i class="fa fa-trash-o"></i> Delete</a>
						// 			    </li>
									    
									    
						// 			  </ul>
						// 			</div>' ;

						// 			// echo $print;
						// 			// 		die; 
										
						// 			// $print .=   '<a href="'. route("user.donation.complete",[$result->key]) .'">
						// 			// <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding-right: 0px;">
						// 			// <span class=" pull-right btn-pending" title="Make it complete"> Pending</span>
						// 			// </div>
						// 			// </a>
						// 			// ' ;
									

						// 			$print.= '
						// 			<div class="modal fade" id="open_pendingModal" role="dialog">
						// 			<div class="modal-dialog">

						// 			<!-- Modal content-->
						// 			<div class="modal-content">
						// 			<div class="modal-header">
						// 			<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			<h4 class="modal-title" style="color: #ff0000 !important;"> Success Story </h4>
						// 			</div>
						// 			<form  class="" name="contact-form" method="POST" action="'.route("user.donation.complete",[$result->key]).'"  enctype="multipart/form-data">
						// 			<div class="modal-body">
						// 			<div class="row">

						// 			<input type="hidden" name="key" value="'.$result->key.'">
						// 			<input type="hidden" name="key" value="32g8a1i8e3c0kbql915f914">
						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<select class="form-control" name="complete_title" id="">
						// 			<option value="">Select Rating</option>
						// 			<option value="1">1</option>
						// 			<option value="2">2</option>
						// 			<option value="3">3</option>
						// 			<option value="4">4</option>
						// 			</select>
						// 			getItem  </div>             
						// 			</div>

						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<input type="file" name ="image_file">
						// 			</div>
						// 			</div>
						// 			<div class="col-sm-12">
						// 			<div class="form-group">
						// 			<textarea name="complete_msg"  class="form-control" value="" rows="7" placeholder=" Description"></textarea>                                                 </div>             
						// 			</div>     
						// 			</div>

						// 			<div class="modal-footer">
						// 			<div class="form-group">
						// 			<input type="submit" class="btn btn-danger pull-right" value="Submit Your Story" name="submit">
						// 			</div>
						// 			</div>
						// 			</div>

						// 			</form>
						// 			</div>
						// 			</div>
						// 			</div>';

									

						// 		}
						// 		else
						// 		{
		    //                                 if(empty(trim($result->complete_title)))
									
						// 			//if($result->complete_title==' ')
						// 			{
										
						// 				$print .='<div class="dots-menu btn-group" style="float: right;">
						// 			  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 5px; cursor: pointer;" title="Action button"></i></a>
									 
						// 			  <ul class="dropdown-menu">
									  
						// 			    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModall"   title="Success Story"  ><i class="fa fa-edit"></i> Success Story</a></li>

									   	    
						// 			  </ul>

									
						// 			</div>' ;

									


						// 		$print.=' <div class="modal fade" id="myModall" role="dialog">
						// 		<div class="modal-dialog">

						// 		<!-- Modal content-->
						// 		<div class="modal-content">
						// 		<div class="modal-header">
						// 		<button type="button" class="close" style="color: #00a651 !important;" data-dismiss="modal">&times;</button>
						// 		<h4 class="modal-title" >Write success story of the post</h4>
						// 		</div>
						// 		<div class="modal-body">
						// 		<form id="contact-form" onsubmit="return checks()" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data"  action = "'. route("user.storycomplete",[$result->key]).'">
								
						// 		<div class="modal-body">
						// 				<div class="row">
						// 				'.csrf_field().'

						// 				<div class="col-sm-12">
						// 				<div class="form-group">
						// 				<input type="hidden" name="post_id" value="'.$result->id.'"/>
						// 				<span>Title</span>
						// 				<input type="text" name="title" id="report" class="form-control"  rows="7" placeholder="Title" required>
										
						// 				<li class="error-li"  id="title_error" style="display:none;"> Title must have minimum 5 characters.</li>
						// 				</div>             
						// 				</div>   
						// 				<div class="col-sm-12">
						// 				<div class="form-group">
						// 				<span>Image</span>
						// 				<input type="file" name="image_file[]" id="report2" class="form-control" value="Title" rows="7" placeholder="image" accept="image/*" multiple/>
										
										
						// 				</div>           
										             
						// 				</div>   

						// 				<div class="col-sm-12">
						// 				<div class="form-group">
						// 				<span>Sucess Story</span>
										
						// 				<textarea name="desc" id="report3" class="form-control" value="" rows="7" placeholder="Sucess Story" required></textarea>
										
						// 				<li class="error-li"  id="desc_error" style="display:none;"> Description must have minimum 5 characters.</li>
						// 				</div>             
						// 				</div>   
						// 				</div>

						// 				</div>
						// 				<div class="modal-footer">
						// 				<div class="form-group">
						// 				<button type="submit" class="btn btn-main pull-right">Submit Post Story</button>
						// 				</div>
						// 				</div>
						// 		</form>
						// 		';





						// 		$print.='   </div>
						// 		</div>
						// 		</div>
						// 		</div>';


						// 		//    echo $print ;
									
						// 		//    die;

						// 			// $print.='<div class="modal fade" id="myModall" role="dialog">
						// 			// 	<div class="modal-dialog">

						// 			// 	<!-- Modal content-->
						// 			// 	<div class="modal-content">
						// 			// 	<div class="modal-header">
						// 			// 	<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
						// 			// 	<h4 class="modal-title" style="color: #ff0000 !important;">Write Your Sucess Story</h4>
						// 			// 	</div>
						// 			// 	<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action=""'. route("user.storycomplete").'"">
						// 			// 	<div class="modal-body">
						// 			// 	<div class="row">
						// 			// 	'.csrf_field().'

						// 			// 	<div class="col-sm-12">
						// 			// 	<div class="form-group">
						// 			// 	<input type="hidden" name="post_id" value="'.$result->id.'"/>
						// 			// 	<input type="text" name="title" id="report" class="form-control" value="Title" rows="7" placeholder="Title">

						// 			// 	</div>             
						// 			// 	</div>   
						// 			// 	<div class="col-sm-12">
						// 			// 	<div class="form-group">

						// 			// 	<input type="file" name="image_file[]" id="report" class="form-control" value="Title" rows="7" placeholder="image" multiple/>

						// 			// 	</div>             
						// 			// 	</div>   

						// 			// 	<div class="col-sm-12">
						// 			// 	<div class="form-group">
						// 			// 	<textarea name="desc" id="report" class="form-control" value="" rows="7" placeholder="Sucess Story"></textarea>

						// 			// 	</div>             
						// 			// 	</div>   
						// 			// 	</div>

						// 			// 	</div>
						// 			// 	<div class="modal-footer">
						// 			// 	<div class="form-group">
						// 			// 	<button type="submit" class="btn btn-danger pull-right">Submit Your Story</button>
						// 			// 	</div>
						// 			// 	</div>
						// 			// 	</form>
						// 			// 	</div>
						// 			// 	</div>
						// 			// 	</div>';

						// 		// 		echo "<pre>";					
						// 		// 		//print_r($result);
						// 		//    echo $print ;
									
						// 		//    die;
									
						// 			}
						// 			else
						// 			{

									 
										
						// 				$print .=   '<div class="dots-menu btn-group" style="float: right;">
      //                                     <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px;" ></i></a>
                                         
      //                                     <ul class="dropdown-menu">
                                            
      //                                       <li>
      //                                       <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall1" title="Click to report"  ><i class="fa fa-eye" > Success story</i></a>

      //                                       </li>
                                           
                                           

      //                                     </ul>
      //                                   </div>' ;

										
						// 						// <li><a href="javascript:void(0);"><i class="fa fa-thumbs-up" ></i>  Completed</li>
										

									

						// 			}


						// 		}

						// 	}
						// }

						//haresh end
						// echo $print;  not working
						// die;
		                               // <a href="'. route("search.donation.details",$result->key).'"><h4 class="item-title">'. $result->description.'</h4></a>


                        $review = DB::table('donation_post_review')->where('donation_post_id','=',$result->id)->avg('rate_input');
                         $review=ceil($review);
						$print .='
						<div class="item-cat">
	                      <span><a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;font-weight: 100 !important;">'.$category->name.' | '.$subcategory->name.' | '. $specification->name.'</a></span>
	                    </div>

						<!-- <div class="" >
		                      <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171;font-weight: 100 !important;"><i class="fa fa-map-marker"></i>
		                      '. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
		                      </a>
	                    </div> -->

	                    <div class="" style="margin-bottom: 10px;  ">
		                      <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171; font-weight: 500 !important;"><i class="fa fa-map-marker"></i>
		                      '. $result->address .'
		                      </a>
	                    </div> 	
	                    	

	                    	 ';

                    	
						 


						// $print .= '<a href="'. route("search.donation.details",$result->key).'">
					 // 		<div class="item-cat col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						// 		<span>'.$category->name.' >> '.$subcategory->name.' >> '. $specification->name.'</span></a> <br>';

						// $review=ceil($review);
						//  $print .='
						  
						//   <div class="rate">
						//     <div class="my">
      //                           <div class="star-rating">
      //                           ';
	                                
	     //                            // print_r($review);
	                                

	     //                            for($i=1; $i <= 5; $i++){
	                                	


	     //                            	if($i <= $review){

	     //                            		// echo $i;

	     //                            		 $print .='<span class="star" style="font-size: 24px; padding:2px; color: #deb217;">&#9733;</span>';


	     //                            	}
	     //                            	else{
	                                		
	     //                            		$print .='<span class="star" style="font-size: 24px; padding:2px;">&#9733;</span>';
	     //                            		// deb217
	     //                            	}
	     //                            }
	     //                            // die();
      //                   $print .='
      //                           </div>
      //                     	</div>
						// </div>';
						
						// if ($review == 0) {
						//   $print .='
						  
						

						// // echo $print;
						// // die;
						
						// }
						
						 $print .='  <!-- ad-meta -->
                  <div class="ad-meta " style="/*position: absolute;padding-left: 10px;*/">
                    <div class="meta-content col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7" style=" padding-left: 0px; line-height: normal;">';

	                  
	                 if (array_key_exists('away_distance', $result)) //Show on search page only
	                 {
		                 $print .=' <p><a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'" style="color: #727171; font-weight: 500 !important;"><i class="fa fa-map-pin"> </i>
			                       '. ROUND($result->away_distance, 2) .' '. $result->distance_unit .' away
			              </a></p> ';
		              }
                      
                     $print .='  <p><a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'">
                      	<i class="fa fa-clock-o"> </i> '. \Carbon\Carbon::parse($result->created_at)->diffForHumans() .'
                      </a></p>
 
                   ';
                      // <a href="javascript:void(0)">'.\Carbon\Carbon::parse($result->created_at)->format('d-m-Y H:i').'  </a>

         //            $print .='
								 // <!-- Add Star -->
		       //                 <div class="rate" style="color: #a0a0a0;">
		       //                      <div class="my">
		       //                          <div class="star-rating">';
									// 			// print_r($review);
				                                

				     //                            for($i=1; $i <= 5; $i++){
				                                	


				     //                            	if($i <= $review){

				     //                            		// echo $i;

				     //                            		 $print .='<span class="star" style="font-size: 20px; padding-right:2px; color: #deb217;">&#9733;</span>';


				     //                            	}
				     //                            	else{
				                                		
				     //                            		$print .='<span class="star" style="font-size: 20px; padding-right:2px;">&#9733;</span>';
				     //                            		// deb217
				     //                            	}
				     //                            }
				     //                            // die();
			      //                   $print .='

		                                
		       //                          </div>
		       //                      </div>
		       //                  </div>
		       //                     <!-- Star End --> ';                 
		                  
		           $print .='</div><!-- ad-info -->';





                    $print .=' <!-- item-info-right -->
                    <div class="user-option pull-right" style="    padding-right: 10px;">';


                    		if($result->consideration == '0') // Free
								{
									
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><h3 class="item-price pull-right" title="Free" style="margin-top: 10px;"> Free </h3></a>';	
							
								}else if ($result->consideration == '1'){
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><h3 class="item-price pull-right" title="'.$result->consideration_detail.'" style="margin-top: 10px;">'.$result->consideration_detail.'</h3> </a>';
								}else{
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><h3 class="item-price pull-right" title="'.$result->consideration_detail.'" style="margin-top: 10px;">'.$result->consideration_detail.'</h3></a>';
								}



                   if(Auth::guard('user')->check()){
		                          				// dd(Auth::guard('user')->user()->id );
		                          				// exit();
												// echo "<pre>";
												//   print_r($result->expired_at);
												//   die();

												
							if(Auth::guard('user')->user()->id == $result->user_id)
							{

								
								if($result->consideration == '0')
								{
									
										// 	echo "<pre>";
										// print_r($result);  //its working

										//  die;  
										
									// $print .=   '<br><a href="'. route("search.donation.details",$result->key).'"><span class="text-color pull-right">Free</span> </a>' ;

									// echo $print;
									// die; 

									
									// $print .=   '<a href="" data-toggle="modal" data-target="#date" title="Click to report" style="color: #55b23d !important; padding-top:2px;" ><span class=" pull-right " > <i class="fa fa-calendar" style="padding-right: 7px;">Expired_at</i></span></a>' ;
									

									//  this code not work

									// comment below code - haresh

									$print.=' <div class="modal fade" id="date" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;">Update Expire Date</h4>
									</div>
									<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action = "'. route("user.updatedate").'">
									<div class="modal-body">
									<div class="row">
									'.csrf_field().'

									<div class="col-sm-12">
									<div class="form-group">
									<input type="hidden" name="post_id" value="'.$result->id.'"/>
									
									<input type="datetime-local" class="form-control" name="expiry" value="'.\Carbon\Carbon::parse($result->expired_at)->format('Y-m-d\TH:i').'" autocomplete="on">

									</div>             
									</div>   


									</div>

									</div>
									<div class="modal-footer">
									<div class="form-group">
									<button type="submit" class="btn btn-danger pull-right">Submit</button>
									</div>
									</div>
									</form>
									</div>
									</div>
									</div>';

									// echo $print;
									// die; 
										// echo "<pre>";
										// print_r($result);  //not working working

										//  die;
							
								}else if ($result->consideration == '1'){
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span> </a>';
								}else{
									$print .= '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span class="text-color pull-right" title="'.$result->consideration_detail.'">'.$result->consideration_detail.'</span></a>';
								}

						
								if($result->is_complete == 0)
								{
									
									// echo $print;
									// echo "<pre>";
									// print_r($result);
									//  		die; 
										// this code not work

										// echo $print;
										// 	die; 

										//error in $result->post_view_counter
									// 	echo $print;
									// die; 

									// $print .=   '
									// <div style=" cursor: pointer;">
									//  <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="Interested"  >
							        //                           <i class="fa fa-eye"></i><span> '.$result->post_view_counter.' </span></a>
							        //                         </div>';

									//$result->post_view_counter   - no such param available
									
									$print.=' <div class="modal fade" id="myModall12" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;">List of Viewers</h4>
									</div>
									<div class="modal-body">
									   <table class="table">
											<thead>
											  <tr>
												<th>S.No.</th> 
												<th>Mobile</th> 
											  </tr>
											</thead>
											<tbody>
										  ';
								
								   $views = DB::table('donation_posts_views')
								   				->where('donation_posts_views.donation_post_id','=',$result->id)
								   				->select('users.contact','users.image','donation_posts_views.donation_post_id')
								   				->join('users','users.id', '=','donation_posts_views.user_id')
								   				->orderBy('donation_posts_views.id', 'DESC')
								   				->get();
									   // print_r($views); // no data
									   // die;
								   foreach ($views as $kyy => $viewd) {
												$kyy = $kyy+1;
												 $print .=' <tr>
																<td>'.$kyy.'</td>
																<td>'.$viewd->contact.'</td>
															  </tr>';
															
										 }                  
										$print .= '</tbody>
										   </table>
									';      
									// foreach ($views as $kyy => $vi_ew) {

									// 	$print.= '<tr><td>'.$kyy+1.'</td><td>'.$vi_ew->name;.'</td><td><img src="'.$vi_ew->image.'" alt="Image" class="img-responsive"></td></tr>';
									// }




									$print.='   </div>
									</div>
									</div>
									</div>';
									// this code is working
	                                $print .='<div class="dots-menu btn-group" style="float: right;font-size: 14px;">
									  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 10px; cursor: pointer;" title="Action button"></i></a>
									 
									  <ul class="dropdown-menu">
									    <li><a href="'.route("web.donation.edit.form",[$result->key]) .'" title="Update post" style="font-size: 14px;"><i class="fa fa-pencil-square-o"></i> Update</a></li>
									    
									    <li><a href="'. route("user.donation.complete",[$result->key]) .'"   title="Close/Complete post" style="font-size: 14px;" ><i  class="fa fa-flag-o" ></i> Close Post</a></li>

									    <li><a href=""  data-toggle="modal" data-target="#date" title="Extend post expiry" style="font-size: 14px;"  ><i  class="fa fa-calendar" ></i> Extend</a></li>

									    <li class="delete-row">
									      <a href="'. route("user.donation.delete",[$result->key]) .'"  title="Delete post" style="font-size: 14px;"><i class="fa fa-trash-o"></i> Delete</a>
									    </li>
									    
									    
									  </ul>
									</div>' ;

									// echo $print;
									// 		die; 
										
									// $print .=   '<a href="'. route("user.donation.complete",[$result->key]) .'">
									// <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding-right: 0px;">
									// <span class=" pull-right btn-pending" title="Make it complete"> Pending</span>
									// </div>
									// </a>
									// ' ;
									

									$print.= '
									<div class="modal fade" id="open_pendingModal" role="dialog">
									<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #ff0000 !important;"> Success Story </h4>
									</div>
									<form  class="" name="contact-form" method="POST" action="'.route("user.donation.complete",[$result->key]).'"  enctype="multipart/form-data">
									<div class="modal-body">
									<div class="row">

									<input type="hidden" name="key" value="'.$result->key.'">
									<input type="hidden" name="key" value="32g8a1i8e3c0kbql915f914">
									<div class="col-sm-12">
									<div class="form-group">
									<select class="form-control" name="complete_title" id="">
									<option value="">Select Rating</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									</select>
									getItem  </div>             
									</div>

									<div class="col-sm-12">
									<div class="form-group">
									<input type="file" name ="image_file">
									</div>
									</div>
									<div class="col-sm-12">
									<div class="form-group">
									<textarea name="complete_msg"  class="form-control" value="" rows="7" placeholder=" Description"></textarea>                                                 </div>             
									</div>     
									</div>

									<div class="modal-footer">
									<div class="form-group">
									<input type="submit" class="btn btn-danger pull-right" value="Submit Your Story" name="submit">
									</div>
									</div>
									</div>

									</form>
									</div>
									</div>
									</div>';

									

								}
								else
								{
		                                    if(empty(trim($result->complete_title)))
									
									//if($result->complete_title==' ')
									{
										
										$print .='<div class="dots-menu btn-group" style="float: right;">
									  <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px; padding: 5px; cursor: pointer;" title="Action button"></i></a>
									 
									  <ul class="dropdown-menu">
									  
									    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModall"   title="Success Story"  style="font-size: 14px;" ><i class="fa fa-edit"></i> Success Story</a></li>

									   	    
									  </ul>

									
									</div>' ;

									


								$print.=' <div class="modal fade" id="myModall" role="dialog">
								<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" style="color: #00a651 !important;" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" >Write success story of the post</h4>
								</div>
								<div class="modal-body">
								<form id="contact-form" onsubmit="return checks()" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data"  action = "'. route("user.storycomplete",[$result->key]).'">
								
								<div class="modal-body">
										<div class="row">
										'.csrf_field().'

										<div class="col-sm-12">
										<div class="form-group">
										<input type="hidden" name="post_id" value="'.$result->id.'"/>
										<span>Title</span>
										<input type="text" name="title" id="report" class="form-control"  rows="7" placeholder="Title" required>
										
										<li class="error-li"  id="title_error" style="display:none;"> Title must have minimum 5 characters.</li>
										</div>             
										</div>   
										<div class="col-sm-12">
										<div class="form-group">
										<span>Image</span>
										<input type="file" name="image_file[]" id="report2" class="form-control" value="Title" rows="7" placeholder="image" accept="image/*" multiple/>
										
										
										</div>           
										             
										</div>   

										<div class="col-sm-12">
										<div class="form-group">
										<span>Sucess Story</span>
										
										<textarea name="desc" id="report3" class="form-control" value="" rows="7" placeholder="Sucess Story" required></textarea>
										
										<li class="error-li"  id="desc_error" style="display:none;"> Description must have minimum 5 characters.</li>
										</div>             
										</div>   
										</div>

										</div>
										<div class="modal-footer">
										<div class="form-group">
										<button type="submit" class="btn btn-main pull-right">Submit Post Story</button>
										</div>
										</div>
								</form>
								';





								$print.='   </div>
								</div>
								</div>
								</div>';


								//    echo $print ;
									
								//    die;

									// $print.='<div class="modal fade" id="myModall" role="dialog">
									// 	<div class="modal-dialog">

									// 	<!-- Modal content-->
									// 	<div class="modal-content">
									// 	<div class="modal-header">
									// 	<button type="button" class="close" style="color: #ff0000 !important;" data-dismiss="modal">&times;</button>
									// 	<h4 class="modal-title" style="color: #ff0000 !important;">Write Your Sucess Story</h4>
									// 	</div>
									// 	<form id="contact-form" class="contact-form" name="contact-form" method="post" enctype="multipart/form-data" action=""'. route("user.storycomplete").'"">
									// 	<div class="modal-body">
									// 	<div class="row">
									// 	'.csrf_field().'

									// 	<div class="col-sm-12">
									// 	<div class="form-group">
									// 	<input type="hidden" name="post_id" value="'.$result->id.'"/>
									// 	<input type="text" name="title" id="report" class="form-control" value="Title" rows="7" placeholder="Title">

									// 	</div>             
									// 	</div>   
									// 	<div class="col-sm-12">
									// 	<div class="form-group">

									// 	<input type="file" name="image_file[]" id="report" class="form-control" value="Title" rows="7" placeholder="image" multiple/>

									// 	</div>             
									// 	</div>   

									// 	<div class="col-sm-12">
									// 	<div class="form-group">
									// 	<textarea name="desc" id="report" class="form-control" value="" rows="7" placeholder="Sucess Story"></textarea>

									// 	</div>             
									// 	</div>   
									// 	</div>

									// 	</div>
									// 	<div class="modal-footer">
									// 	<div class="form-group">
									// 	<button type="submit" class="btn btn-danger pull-right">Submit Your Story</button>
									// 	</div>
									// 	</div>
									// 	</form>
									// 	</div>
									// 	</div>
									// 	</div>';

								// 		echo "<pre>";					
								// 		//print_r($result);
								//    echo $print ;
									
								//    die;
									
									}
									else
									{

									 
										
										$print .=   '<div class="dots-menu btn-group" style="float: right;">
                                          <a data-toggle="dropdown" ><i class="fa fa-ellipsis-v" style="font-size: 20px;" ></i></a>
                                         
                                          <ul class="dropdown-menu">
                                            
                                            <li>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModall1" title="Click to report"  ><i class="fa fa-eye" > Success story</i></a>

                                            </li>
                                           
                                           

                                          </ul>
                                        </div>' ;

										
												// <li><a href="javascript:void(0);"><i class="fa fa-thumbs-up" ></i>  Completed</li>
										

									

									}


								}

							}
						}



						if(Auth::guard('user')->check()){
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
									{
									
									  
		                               $print .=  '<a href="javascript:void(0)" data-toggle="modal" data-target="#myModall12" title="'.$result->post_view_counter.'"  ><span   data-toggle="tooltip" data-placement="top" title="'.$result->post_view_counter.'"><i class="fa fa-eye"></i> </span> </a>';
		                           }


	                           if($user_type->id == '1')
									{

										// echo "<pre>";
										// print_r($result);  //its working

										// 	die;

										$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </span> </a>';

							

									}
									else if($user_type->id == '3')
									{
										$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </span></a>';
									}
									else 
									{
										$print .=  ' <a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </span> </a>';


									}

									

									if(!empty($result->helper_status)){
										if($result->helper_status){
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
										}else {
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
										}
									}else{
										if($result->d_status){
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
										}else {
											$print .=  '<a href="'. route("search.donation.details",str_replace(' ','-',$result->title)."-".$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
										}
									}

							}
						}

                    

						if(Auth::guard('user')->check()){
		                          			
							if(Auth::guard('user')->user()->id == $result->user_id)
							{
								if($result->is_complete == 0)
								{
								
								  $print .=  '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top"  title="Free"  > <span  style="font-size: 15px;"> Open </span>  </a>';
	                              
	                           }

							}
						}



                     // $print .=  '  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                     //  <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dealer"><i class="fa fa-suitcase"></i> </a> ';

                     $print .=  '                     
                    </div><!-- item-info-right -->
                  </div><!-- ad-meta -->
				</div><!-- item-info -->
              </div><!-- ad-item -->
              </div><!-- ad-item -->
              ';


      //              $print .=
      //              '<div class="ad-meta col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="bottom: 0;/* position: absolute; */" >
                        
						// <div class="meta-content col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
						// <a href="javascript:void(0)">'.\Carbon\Carbon::parse($result->created_at)->format('d-m-Y H:i').' </span> </a>

						// <!-- <a href="'. route("search.donation.details",$result->key).'"><i class="fa fa-tags"></i> ';


						// // echo $print;
						// // die;

						// if($result->condition == 1) 
						// 	$print .= "New";
						// else
						// 	$print .= "Used";
						// $print .=' </a> -->
						// <br>    
						// <!-- <i class="fa fa-map-marker"></i> '. $result->address .'    -->

						// <a href="'. route("search.donation.details",$result->key).'"><i class="fa fa-map-marker"></i> '. $city->name .' '. $city->state->name .' '. $city->state->country->name .' 
						// </div>									
						// <!-- item-info-right -->
						// <div class="user-option text-right col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="display: flex;"> 

						// </a>'; 



						// if($user_type->id == '1')
						// {

						// 	// echo "<pre>";
						// 	// print_r($result);  //its working

						// 	// 	die;

						// 	$print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-share-square-o"></i> </span> </a>';

				

						// }
						// else if($user_type->id == '3')
						// {
						// 	$print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-shopping-basket"></i> </span></a>';
						// }
						// else 
						// {
						// 	$print .=  ' <a href="'. route("search.donation.details",$result->key).'"><span  data-toggle="tooltip" data-placement="top" title="'. $user_type->name .'"><i class="fa fa-handshake-o"></i> </span> </a>';


						// }

						// if(!empty($result->helper_status)){
						// 	if($result->helper_status){
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
						// 	}else {
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
						// 	}
						// }else{
						// 	if($result->d_status){
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Organization"><i class="fa fa-building"></i> </span> </a>';
						// 	}else {
						// 		$print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user-secret"></i> </span> </a>';
						// 	}
						// }

						// 						// $print .=  '<a href="'. route("search.donation.details",$result->key).'"><span   data-toggle="tooltip" data-placement="top" title="Write a Review"><i class="fa fa-pencil"></i> </span> </a>';

						// $print .=  '</div><!-- item-info-right -->

						// </div>
						// </div><!-- ad-info -->


						// </div><!-- item-info -->
						// </div><!-- ad-item -->
						// </div><!-- row -->
						// ';

					}
					$sucess_story=0;
				}

            //  echo "<pre>";
            // 		print_r($city);
            // 		die;
				
			}else{
				$print = '<div class="alert alert-info" style="margin-top: 15px; text-align: center;">
						    <p>Be the first to show your kindness at your area.</p>
						    <p></p>
						    <p></p>
						    <p>Together we can make a difference Now!.</p>
						    
						    <a href="https://doncen.org/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">DONATE</a>
						    <a href="https://doncen.org/donation/category" class="btn btn-main" style="display: inline-block; margin: 5px;">REQUEST</a>
						</div>

						';
			}
			
            		// echo $print;
            		// die();
			return $print;


		}	

		public function getDonationPost(Request $request)
		{

			$results = array();
			if($request->key == 1){
				$results =  DB::table('donation_posts')
				->where('status',1)
				->orderBy('created_at','desc')
				->limit(20)
				->get();
				$categories = array();
			}else{
				$categories = Category::where('status',1)->where('key',$request->key)->first();
			}
			if(!empty($categories)){
				session(['scroll.categories' => $categories]);
				foreach($categories->subcategories as $subcategory){
					$donations =   DB::table('donation_posts')
					->where('specification_id',$subcategory->id)
					->where('status',1)
					->where('is_urgent',1)
					->orderBy('created_at','desc')
					->limit(20)
					->get ();
					if(!empty($donations)){
						foreach($donations as $donation){
							array_push($results,$donation);
						}
					}
				}
			}
			echo $this->printData($results,array(), $categories);
		}  




		/* My Account Functions Start */

	    //favoriate donation
		public function getfavoriateDonation(Request $request)
		{

			$posts =  DB::table('favourite_posts')->where('user_id',Auth::guard('user')->user()->id)->where('status',1)->limit(20)->get();
			$results = array();
        // foreach($posts as $post){
        //     $donation_post = DB::table('donation_posts')
        //                             ->where('status',1)
        //                             ->where('id',$post->id)->first();
        //     if(!empty($donation_post)){
        //        array_push($results,$donation_post);
        //     }
        // }
			foreach($posts as $post){
				$donation_post = DB::table('donation_posts')
				->where('status',1)
				->where('id',$post->donation_post_id)
				->first();
				if(!empty($donation_post)){
					array_push($results,$donation_post);
				}
			}
			if(!empty($results)){                    
				echo $this->printData($results,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no favorite post.</div>';
			}
		}



    //get list of product 
		public function getMyDonation(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();

			if(!empty($donation_posts[0])){                    
				echo $this->printData($donation_posts,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no post.</div>';
			}
		}


    //list of urgent donation of user by user id
		public function getUrgentRequirement(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_urgent',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
			if(!empty($donation_posts[0])){                    
				echo $this->printData($donation_posts,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no urgent post.</div>';
			}
		}

    //list of all complete donation by user
		public function getCompleteDonation(Request $requset)
		{
			$donation_posts =  DB::table('donation_posts_completed')->where('status',1)->where('is_complete',1) ->where('user_id',Auth::guard('user')->user()->id)->orderBy('created_at','desc')->limit(20)->get();
			if(!empty($donation_posts[0])){
				// echo "<pre>";     
				// print_r($donation_posts);
				// die();               
				echo $this->printData($donation_posts,array(), array());
			}else{
				echo '<div class="alert alert-info">There is no post completed.</div>';
			}
		}

		public function getpandingDonation(Request $request)
		{
			$donation_posts =  DB::table('donation_posts')->where('status',1)->where('is_complete',0) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
			if(!empty($donation_posts[0]))
			{                    
				echo $this->printData($donation_posts,array(), array());
			}else
			{
				echo '<div class="alert alert-info">There is no post pending.</div>';
			}
		}




		public function sucessstory(Request $request)
		{


    	// $donation_posts =  DB::table('donation_posts')->where('status',1) ->where('user_id',Auth::guard('user')->user()->id)    ->orderBy('created_at','desc')->limit(20)->get();
     //    if(!empty($donation_posts[0])){                    
     //        echo $this->printData($donation_posts,array(), array());
     //    }else{
     //        echo '<div class="alert alert-info">There is no Donation Post.</div>';
     //    }

    		// echo '<div class="alert alert-info">There is no Panding Donation Post.</div>';
		}


    // public function sucessstory(Request $request)
    // { 
    //     if (Auth::guard('user')->check()){
    //         $user = Auth::guard('user')->user()->id;
    //     }else{
    //         session()->flash('error', 'You must logged in before report against any post.');
    //        return redirect('/user/login');
    //     }
    //     $this->validate($request , [
    //         'report_subject' => 'required|min:5',
    //         'report' => 'required|min:10'
    //     ]);

    //     $id = DB::table('donation_posts')->where('key',$request->key)->select('key','id')->first();
    //     DB::table('donation_post_story')->insert([
    //        'report' => $request->report,
    //        'key' => generateKey(17),
    //        'report_subject' => $request->report_subject,
    //        'user_id' => $user,
    //        'donation_post_id' => $id->id,
    //        'created_at' => new \DateTime(),
    //        'updated_at' => new \DateTime()
    //     ]);

    //     session()->flash('error', 'Repost against this post has been submitted.');
    //     return redirect(URL::previous());
    // }


		/* My Account Functions End */
	} 
