<?php

Route::get('/dashboard', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    $id = Auth::guard('user')->user()->id;
    

    $user = \App\Models\User::where('id',$id)->first();
    
    
    // $total_post = DB::table('donation_posts')->where('user_id',$id)->count();
    
    $active_post = DB::table('donation_posts')->where('user_id',$id)->where('is_complete',0)->where('status',1)->count();
            
	$expired_post = DB::table('donation_posts_expired')->where('user_id',$id)->where('is_complete',0)->where('status',1)->count();

	$completed_post = DB::table('donation_posts_completed')->where('user_id',$id)->where('is_complete',1)->where('status',1)->count();

	$deleted_post = DB::table('donation_posts_deleted')->where('user_id',$id)->where('status',0)->count();
	  


	$total_post = $active_post + $expired_post + $completed_post + $deleted_post;



    $blood_group = DB::table('blood_groups')->get();
    
    
    return view('user.home',compact('user','active_post','expired_post','completed_post','deleted_post','total_post','blood_group'));
})->name('home')->middleware('activitylog');

// Route::get('/dashboard',['as' =>'user.home','uses'=> 'User\UserController@dashboard']);