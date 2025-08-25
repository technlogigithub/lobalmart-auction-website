<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Location;   //vendor/stevebauman/location/src
use URL;
use Session;

use Illuminate\Support\Facades\Cache;
 

class ActivityLog
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	
	public function handle($request, Closure $next)
	{

		// echo "Hi";
		// die();
		// Web Application Firewall (WAF) is a crucial security measure

			// 1. IP Blocking
	        // $ip = $request->ip();
	        // $blockedIps = ['192.168.1.100', '172.16.1.100']; // add blocked IPs here
	        // if (in_array($ip, $blockedIps)) {
	        //     return response()->json(['error' => 'Access denied'], 403);
	        // }

	        // 2. Rate Limiting
	        // Rate limiting - START (DDoS Attack Prevention)

				$ip_key = 'rate_limit_'.$request->ip();

			        $maxAttempts = 60; // maximum number of attempts allowed within the time window
			        $decayMinutes = 1; // time window in minutes

			        $attempts = Cache::get($ip_key);

			        if ($attempts === null) {
			            // If the cache entry does not exist, create a new one with a TTL
			            Cache::put($ip_key, 1, now()->addMinutes($decayMinutes));
			        } elseif ($attempts >= $maxAttempts) {
			            // If the number of attempts exceeds the maximum allowed, return an error
			            return response()->json(['error' => 'Rate limit exceeded'], 429);
			        } else {
			            // If the cache entry exists, increment the attempts count and update the TTL
			            Cache::put($ip_key, $attempts + 1, now()->addMinutes($decayMinutes));
			        }
	        // Rate limiting - END

	        // 3. User Agent Blocking
	        $userAgent = $request->header('User-Agent');
	        $blockedUserAgents = [
	            'curl',
	            'wget',
	            'python-requests',
	            'java',
	            'perl',
	        ]; // add blocked user agents here
	        foreach ($blockedUserAgents as $blockedUserAgent) {
	            if (stripos($userAgent, $blockedUserAgent) !== false) {
	                return response()->json(['error' => 'Header access denied'], 403);
	            }
	        }

	        // 4. SQL Injection Protection
	        $sqlKeywords = ['select', 'insert', 'update', 'delete', 'drop', 'create', 'alter', 'union'];
	        $requestUri = $request->getRequestUri();
	        
	        // echo "<pre>";
	        // print_r($requestUri);

	        if($requestUri)
	        {
	        	foreach ($sqlKeywords as $sqlKeyword) {
		            if (stripos($requestUri, $sqlKeyword) !== false) {
		                return response()->json(['error' => 'SQL injection attempt detected'], 403);
		            }
		        }
	        }

	        // 5. Cross-Site Scripting (XSS) Protection
	        $xssKeywords = ['script', 'javascript', 'alert', 'eval'];
			$requestInput = $request->all();

			if ($requestInput) {
			    foreach ($requestInput as $input) {
			        if (is_string($input)) { // Check if input is a string
			            foreach ($xssKeywords as $xssKeyword) {
			                if (stripos($input, $xssKeyword) !== false) {
			                    return response()->json(['error' => 'XSS attempt detected'], 403);
			                }
			            }
			        } elseif (is_array($input)) { // If input is an array, recursively check its values
			            foreach ($input as $subInput) {
			                if (is_string($subInput)) {
			                    foreach ($xssKeywords as $xssKeyword) {
			                        if (stripos($subInput, $xssKeyword) !== false) {
			                            return response()->json(['error' => 'XSS attempt detected'], 403);
			                        }
			                    }
			                }
			            }
			        }
			    }
			}

	        // 6. HTTP Method Enforcement
	        $allowedMethods = ['GET', 'POST', 'PUT', 'DELETE'];
	        $requestMethod = $request->getMethod();
	        if (!in_array($requestMethod, $allowedMethods)) {
	            return response()->json(['error' => 'Method not allowed'], 405);
	        }

		// echo "<pre>";
		// print_r(URL::current());
		// die();

		// Manifest File Created Dynamicaly - START
	        $manifest = [
	            "lang" => "en",
	            "dir" => "ltr",
	            "name" => "Lobalmart.com",
	            "short_name" => "LobalMat",
	            "start_url" => URL::current(),
	            "description" => "Local to Global Marketplace.",
	            "display" => "standalone",

	             "categories" => ["auction", "buy", "sell"],
				  "screen_orientation" => ["portrait", "landscape"],
				  "theme_color" => "#ffffff",
				  "background_color" => "#f2f2f2",
				  "serviceworker" => "/sw.js",

	            // "icons" => [
	            //     [
	            //         "src" => "icon-192x192.png",
	            //         "sizes" => "192x192",
	            //         "type" => "image/png"
	            //     ],
	            //     [
	            //         "src" => "icon-512x512.png",
	            //         "sizes" => "512x512",
	            //         "type" => "image/png"
	            //     ]
	            // ],

	            "icons" => [[
				        "src" => "/uploads/icon/doncen-icon-48x48.png",
				        "sizes" => "48x48",
				        "type" => "image/png",
				        "purpose" => "any",
	      				"density" => "1x"
				      ], [
				        "src" => "/uploads/icon/doncen-icon-72x72.png",
				        "sizes" => "72x72",
				        "type" => "image/png",
				        "purpose" => "any",
	      				"density" => "1.5x"
				        
				      ], [
				        "src" => "/uploads/icon/doncen-icon-96x96.png",
				        "sizes" => "96x96",
				        "type" => "image/png",
				        "purpose" => "any",
	      				"density" => "2x"
				      ], [
				        "src" => "/uploads/icon/doncen-icon-144x144.png",
				        "sizes" => "144x144",
				        "type" => "image/png",
				        "purpose" => "any",
	      				"density" => "3x"
				      ], [
				        "src" => "/uploads/icon/doncen-icon-168x168.png",
				        "sizes" => "168x168",
				        "type" => "image/png",
				        "purpose" => "any",
	      				"density" => "3.5x"
				      ], [
				        "src" => "/uploads/icon/doncen-icon-192x192.png",
				        "sizes" => "192x192",
				        "type" => "image/png",
				        "purpose" => "any",
	      				"density" => "4x"
				  ]]
	            
	            
	        ];
	        $manifestJson = json_encode($manifest, JSON_UNESCAPED_SLASHES);
	        // $manifestJson = json_encode($manifest, JSON_PRETTY_PRINT);

	        // echo "<pre>";
	        // print_r($manifestJson);
	        // die();

	        // Save the manifest file to the public directory
	        file_put_contents(base_path('manifest/manifest.json'), $manifestJson);
		
        // Manifest File Created Dynamicaly - END


		function isMobileDevice() {
			    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
			|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
			, $_SERVER["HTTP_USER_AGENT"]);
			}

			if(isMobileDevice()){
			    $device =  "Mobile";
			}
			else {
			    $device =  "Desktop";
			}

	
		$currentURL = URL::current();
		
		// $ip = $request->ip();
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

		$device_detail = $_SERVER['HTTP_USER_AGENT'];
		
		// echo "<pre>";
		// print_r($_COOKIE);

		// print_r($request->search_latitude);
        // print_r($request->search_longitude);
        // print_r($request->city_search_box);
		
		$Sessiondata = session()->get('search', []);
		// echo "<pre>";
		// print_r($Sessiondata);
		// die();
		$clt = "";
		$clg = "";
		$cloc = "";
        // 2. Loop through each item and remove the keys
			foreach ($Sessiondata as &$item) {
				if($item)
                {
                    $clt = $item['clt'];
                    $clg = $item['clg'];
                    $cloc = $item['cloc'];

                }
                
			}
		
		if($request->search_latitude && $request->search_longitude && $request->city_search_box)
		{
			$lat = $request->search_latitude;
			$lng = $request->search_longitude;

			$location_source = 'Header Form';
		}
		elseif(!empty($clt) && !empty($clg) && !empty($cloc))
		{
			$lat = $clt;
			$lng = $clg;

			$location_source = 'Session';
		}
		elseif(!empty($_COOKIE['lt']))
		{

				// $lat = $_COOKIE['latitude'];
				// $lng = $_COOKIE['longitude'];

				$lat = $_COOKIE['lt'];
				$lng = $_COOKIE['lg'];

				$location_source = 'Location Share';

				
			}	
			else 
			{
				
				$data = Location::get($ip);
				if($data == true || $data != '' || !empty($date))
				{
				 	$lat = $data->latitude;
		         	$lng = $data->longitude;

		         	$location_source = 'IP Address';
	         	}
				else
				{
					$lat = '';
					$lng = '';
					$location_source = '';

				}
			}

			
		

		// echo "<pre>";
		// // print_r($_COOKIE);
		// echo $location_source;
		// echo $lat;
		// echo $lng;

		// die();
			   
		$address_url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&key=AIzaSyAQsVSjofHfiWHWqai-0shuFexPke1-NEQ";

		   $ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, $address_url);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		   $geoloc = json_decode(curl_exec($ch), true);


			// echo "<pre>";
			// print_r($geoloc['results']);
			// print_r($geoloc['results'][0]['formatted_address']);
			// die();

		   $location = $geoloc['results'][0]['formatted_address'];
		   
			//    $keysToForget = ['clt', 'clg'];
			// 	Session::forget($keysToForget);

			// Session::forget('search','');

			

			// 1. Retrieve the session data
			$Sessiondata = session()->get('search', []);

			// 2. Loop through each item and remove the keys
			foreach ($Sessiondata as &$item) {
				unset($item['clt'], $item['clg'], $item['cloc']);
			}
			// Unset reference to avoid unexpected behavior
			unset($item);

			// 3. Save the updated array back to session
			session()->put('search', $Sessiondata);

			// 4. (Optional) Print to check the result
			// echo "<pre>";
			// print_r($Sessiondata);
			// die();
		
			Session::push('search', [
			
				'clt'=> $lat,
				'clg'=> $lng,
				'cloc' => $location
			]);

			// echo $lat;
			// echo $lng;
			// echo "<pre>";
			// print_r($_COOKIE);
			// die();
			// Set cookies from session
			// if ($lat) {
			// 	setcookie('lt', $lat, time() + (86400 * 30), "/");
			// 	setcookie('lg', $lng, time() + (86400 * 30), "/");
			// 	setcookie('accu', 'actLog', time() + (86400 * 30), "/");
			// }
			
			// echo "<pre>";
			// print_r($_COOKIE);
			// die();	
			
			
			$full_address_arr = array_reverse($geoloc['results'][0]['address_components']);
			

			$live_city = $full_address_arr[3]['long_name'];
			// die();
			
			
			$is_indian_ip = array_search('India', array_column($full_address_arr, 'long_name'));
			 
			if(is_int($is_indian_ip) == false)
			{
				$access_allowed = "0";
				
			}
			else
			{
				
		    	$access_allowed = "1";
			}


			$full_add_1 = "";
			$full_add_2 = "";
			$full_add_3 = "";
			$full_add_4 = "";
			$full_add_5 = "";
			$full_add_6 = "";
			$full_add_7 = "";
			$full_add_8 = "";
			$full_add_9 = "";
			$full_add_10 = "";

			foreach ($full_address_arr as $key => $value) {
				$add[$key+1] = $value['long_name'];

			}

				foreach ($add as $key => $value) {

		
					if($key == 1){$full_add_1 = $value;}
					if($key == 2){$full_add_2 = $value;}
					if($key == 3){$full_add_3 = $value;}
					if($key == 4){$full_add_4 = $value;}
					if($key == 5){$full_add_5 = $value;}
					if($key == 6){$full_add_6 = $value;}
					if($key == 7){$full_add_7 = $value;}
					if($key == 8){$full_add_8 = $value;}
					if($key == 9){$full_add_9 = $value;}
					if($key == 10){$full_add_10 = $value;}
				}
			

			
					
		$uid = 0;
		$uType = 'Unknown';
		if(session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d') != ""){
			
			// $back_url = session()->get('_previous')['url'];
			// print_r($back_url);
			// exit();
			$uid = session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d');
			$uType = 'User';
		}
		if(session()->get('login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d') != ""){
			$uid = session()->get('login_admin_59ba36addc2b2f9401580f014c7f58ea4e30989d');
			$uType = 'Admin';
		}
		
		// $request->merge([
		//     'contact' => '123',
		// ]);
		
		// print_r($request->all());
		// die();
		
		$remark = json_encode($request->all());
		

	// 		$response = response()->json($data);


		$url = "/";
		if(session()->get('_previous')['url'] != ""){
			$url = session()->get('_previous')['url'];
		}

		
		if (isset($_COOKIE['notification_token']) && !empty($_COOKIE['notification_token']) && $uid > 0) {
			
			$notification = $_COOKIE['notification_token'];

			// die();


            DB::table('users')->where('id',$uid)
                              ->update(['notification_token' => $notification, // Firebase Notification Token
                              			'system_code' => $device,
                              			'ip_address' => $ip,
                              			'current_lat' => $lat,
                              			'current_long' => $lng,

	                              		'current_lon_lat' => DB::raw("ST_GeomFromText('POINT(".$lng." ".$lat.")')"), // corrected this line	

                              			'current_add_1' => $full_add_1,
							            'current_add_2' => $full_add_2,
							            'current_add_3' => $full_add_3,
							            'current_add_4' => $full_add_4,
							            'current_add_5' => $full_add_5,
							            'current_add_6' => $full_add_6,
							            'current_add_7' => $full_add_7,
							            'current_add_8' => $full_add_8,
							            'current_add_9' => $full_add_9,
							            'current_add_10' => $full_add_10,

                          				'updated_at' => new \DateTime()]);  		
		}
			
		$id = DB::table('activity_logs')->insertGetId([
		    'key' => generateKey(14),
		    'user_type' => $uType,
		    'users_id' => $uid,
		    'action' => $request->route()->getName(),
		    'url' => $currentURL, 
		    'remark' => $remark,
		    'status' => 1,
		    'device' => $device,
		    'device_detail' => $device_detail,
		    'ip_address' => $ip,

		    'lon_lat' => DB::raw("ST_GeomFromText('POINT(".$lng." ".$lat.")')"), // corrected this line

		    'lat' => $lat,
		    'lon' => $lng,

		    'location_source' => $location_source,
		    'access_allowed' => $access_allowed,

		    'full_add_1' => $full_add_1,
		    'full_add_2' => $full_add_2,
		    'full_add_3' => $full_add_3,
		    'full_add_4' => $full_add_4,
		    'full_add_5' => $full_add_5,
		    'full_add_6' => $full_add_6,
		    'full_add_7' => $full_add_7,
		    'full_add_8' => $full_add_8,
		    'full_add_9' => $full_add_9,
		    'full_add_10' => $full_add_10,

		    'created_at' => new \DateTime()
		]);



		
		$now = now(); // get the current datetime

		$data = DB::table('donation_posts')
				    ->where('expired_at', '<', $now)
				    ->get();
      
       // dd($dataa);
        // print_r($dataa);
         // $didsd =$dataa->id;
         // $dtitlesd = $dataa->title;
        
        if (!empty($data)) 
        {

	        foreach ($data as $p) 
	        {
	       
	               $v =  DB::table('donation_posts_expired')->insert([
	               		'id' => $p->id,

	                    'key' => $p->key,
	                    'title' => $p->title,
	                    'post_no' => $p->post_no,
	                    'user_id' => $p->user_id,
	                    'specification_id' => $p->specification_id,
	                    'user_type_id' => $p->user_type_id,
	                    'description' => $p->description,
	                    'condition' => $p->condition,
	                    'city_id' => $p->city_id,
	                    'address' => $p->address,
	                    'lat' => $p->lat,
	                    'lon' => $p->lon,

	                    'lon_lat' => $p->lon_lat,
	                    // 'lon_lat' => DB::raw("ST_GeomFromText('POINT(".$p->lon." ".$p->lat.")')"), // corrected this line


	                    'gps_location' => $p->gps_location,
	                    'gps_lat' => $p->gps_lat,
	                    'gps_long' => $p->gps_long,
	                    'donation_type_id' => $p->donation_type_id,
	                    'donation_type_other' => $p->donation_type_other,
	                    'preference' => $p->preference,
	                    'preference_gender' => $p->preference_gender,
	                    'preference_age' => $p->preference_age,
	                    'preference_is_handicap' => $p->preference_is_handicap,
	                    'consideration' => $p->consideration,
	                    'consideration_detail' => $p->consideration_detail,
	                    'is_urgent' => $p->is_urgent,
	                    'urgent_reason' => $p->urgent_reason,
	                    'status' => $p->status,
	                    'is_complete' => $p->is_complete,
	                    'expired_at' => $p->expired_at,
	                    'system_code' => $p->system_code,
	                    'ip_address' => $p->ip_address,
	                    'post_view_counter' => $p->post_view_counter,
	                    'post_report_counter' => $p->post_report_counter,
	                    'is_complete' => $p->is_complete,
	                    'd_status' => $p->d_status,
	                    'd_user_id' => $p->d_user_id,
	                    'd_name' => $p->d_name,
	                    'd_email' => $p->d_email,
	                    'd_contact' => $p->d_contact,
	                    'd_city_id' => $p->d_city_id,
	                    'd_address' => $p->d_address,
	                    'd_lat' => $p->d_lat,
	                    'd_long' => $p->d_long,

	                    'd_lon_lat' => $p->d_lon_lat,
	                    // 'd_lon_lat' => DB::raw("ST_GeomFromText('POINT(".$p->d_long." ".$p->d_lat.")')"), // corrected this line


	                    'helper_status' => $p->helper_status,
	                    'helper_user_id' => $p->helper_user_id,
	                    'helper_name' => $p->helper_name,
	                    'helper_email' => $p->helper_email,
	                    'helper_contact' => $p->helper_contact,
	                    'helper_city_id' => $p->helper_city_id,
	                    'helper_address' => $p->helper_address,
	                    'helper_lat' => $p->helper_lat,
	                    'helper_long' => $p->helper_long,

	                    'helper_lon_lat' => $p->helper_lon_lat,
	                    // 'helper_lon_lat' => DB::raw("ST_GeomFromText('POINT(".$p->helper_long." ".$p->helper_lat.")')"), // corrected this line
	                  
	                    
	                    'complete_title' => $p->complete_title,
	                    'complete_msg' => $p->complete_msg,
	                    'complete_media' => $p->complete_media,
	                    'created_at' => $p->created_at,
	                    'updated_at' =>new \DateTime()

	                 
	                ]);          
	               DB::table('donation_posts')->where('key', $key)->delete();
	               
	        }
	    }

		// dd($request);

		
		// Allow only Indian
		// if(is_int($is_indian_ip) == false)
		// 	{
		// 		echo "Access Denied";
		// 		die();
		// 	}
		// 	else
		// 	{
				
		//     	return $next($request);
		// 	}

		
		// Allow All world
		
		if($access_allowed == "1")
			{
				return $next($request);
			}
			else
			{
				echo "Access Denied" ;
				die();
			}



	}
	
	
	// 	public function handle($request, Closure $next)
	// 	{
	// 		$ip = $request->ip();
	// 		$data = Location::get($ip);
	// 		$uid = 0;
	// 		if(session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d') != ""){
	// 			$uid = session()->get('login_user_59ba36addc2b2f9401580f014c7f58ea4e30989d');
	// 		}
	// 		$remark = json_encode($request->all());
	// 		$url = "/";
	// 		if(session()->get('_previous')['url'] != ""){
	// 			$url = session()->get('_previous')['url'];
	// 		}
	// 		$id =  DB::table('activity_logs')->insertGetId([
	//             'key'=> generateKey(14),
	//             'users_id'=> $uid,
	//             'action' =>  $request->route()->getName(),
	//             'url'=> $url, 
	//             'remark' => $remark,
	//             'status' => 1,
	//             'system_code'=> $request->ip(),
	//             'lat' => $data->latitude,
	//             'lon' =>$data->longitude,
	//             'created_at'=> new \DateTime(),
	//         ]);

	// 	    return $next($request);
	// 	}
}
