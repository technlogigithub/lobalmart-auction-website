<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;


class SubcategoryController extends Controller
{
    public function getSubcategory(Request $request)
    {
        $category = Category::where('key',$request->key)->where('status',1)->first();
        $subcategories = $category->subcategories->where('status', 1);

        // $subcategories = Subcategory::where('category_id',$category)->where('status',1)->first();
       
        // $var = ' 
        // <div class="section subcategory_section tab-content select-category post-option">
        //     <div class="row hidden-xs">
        //       <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
        //         <h4>Select a sub-category </h4> 
        //       </div>
        //       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 pull-right" style="padding-top: 10px;">
        //         <a roll="button"  style="display: none; font-size: 20px; cursor: pointer;" class="subcategory_show_all"><i class="fa fa-chevron-circle-left"></i></a>
        //       </div>
        //     </div>
            
        //     <div role="tabpanel" class="">
        //     </div>
         

        // <ul role="tablist" class="new_added_subcategory" style="list-style: circle;">';
        // foreach($subcategories as $subcategory){
        //     $var .= '<a class="subcategory" id="'. $subcategory->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
        //                     '.$subcategory->name.'
        //             </li></a>';
        // }
        // // $var .='<li class="other_subcategory_btn"> Other
                
        // //         </li>

        // //         <span class="other_subcategory_input" style="display: none">
        // //         <input type="hidden" name="user_add_subcategory" value="1"> 
        // //         <input type="text" name="other_subcategory" autocomplete="off" placeholder="Add new subcategory">
        // //         <input type="submit" class="add_subcategory btn-main" name="submit" value="Add">
        // //         </span>
        // //         ';
        // return $var.'<div role="tabpanel" class=" hidden-sm hidden-md hidden-lg hidden-xl" style="margin-left: 50px;"> 


        // </ul>


        // </div>
        //                     </div>' ;


        

        $var = ' 
                    <div class="sidebar-area subcategory_section select-category post-option">
                        <div class="single-widget mb-30">
                            <div class="row hidden-xs">
                              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <h5 class="widget-title">Sub-category</h5> 
                              </div>
                              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-end" style="padding-top: 10px;">
                                <a roll="button"  style="display: none; font-size: 20px; cursor: pointer;" class="subcategory_show_all"><i class="bi bi-arrow-return-left">  </i></a>
                              </div>
                            </div>
                            
                            <ul class="category-list new_added_subcategory">
                ';
        foreach($subcategories as $subcategory){
            $var .= '
                    <li>
                            <a href="javascript:void(0)" class="subcategory" id="'. $subcategory->key.'" > '. $subcategory->name .' <span>(20)</span>
                            </a>
                        </li>

                   ';
        }
        // $var .='<li class="other_subcategory_btn"> Other
                
        //         </li>

        //         <span class="other_subcategory_input" style="display: none">
        //         <input type="hidden" name="user_add_subcategory" value="1"> 
        //         <input type="text" name="other_subcategory" autocomplete="off" placeholder="Add new subcategory">
        //         <input type="submit" class="add_subcategory btn-main" name="submit" value="Add">
        //         </span>
        //         ';
        return $var.'       </ul>
                        </div>
                    </div>' ;
    }
    public function getSpecification(Request $request)
    {
		$specifications_ids=array();
		if(isset($request->data2) && !empty($request->data2))
		{
			$specifications_ids = explode("&sp=", $request->data2);
			$specifications_ids[0] = substr($specifications_ids[0], 3);
		}
		//print_r($specifications_ids);
		
        $resutls = array();
        if(!empty($request->data)){
            $subCategory_ids = explode("&st=", $request->data);
            $subCategory_ids[0] = substr($subCategory_ids[0], 3);
            if(!empty($subCategory_ids)){
                foreach($subCategory_ids as $subcategory_id){
                    $subcategory =  Subcategory::where('id',$subcategory_id)->where('status',1)->first();
                    if(!empty($subcategory->specifications)){
                        foreach($subcategory->specifications as $specification){
                            if(!empty($specification)){
                                array_push($resutls,$specification);
                            }                          
                        }             
                    }
                }
            } 
        }
       // $print = '<form method="post" id="specificationForm" class="specificationForm">';
        $print = '';
        foreach($resutls as $result){
			if(in_array($result->id,$specifications_ids))
			{
				$cheked_status="checked";
			}else{
				$cheked_status="";
			}
			
            // $print .= '<label class="checkbox-design"><input type="checkbox" name="sp" class="selectSpecifiction" value="'. $result->id.'" '.$cheked_status.'>'. $result->name .'<span class="checkmark"></span></label>';

            $print .= '
                                <li>
                                  <label class="containerss">
                                    <input type="checkbox" name="sp" class="selectSpecifiction" value="'. $result->id.'" '.$cheked_status.'>
                                    <span class="checkmark"></span>
                                    <span>'. $result->name .'</span>
                                  </label>
                                </li>

                            ';  
                            
        }
        $print .= '';
        //$print .= '</form>';
        echo $print;
    }
}
