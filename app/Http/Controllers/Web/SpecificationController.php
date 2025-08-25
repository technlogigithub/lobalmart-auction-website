<?php

namespace App\Http\Controllers\Web;

use App\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Subcategory;

class SpecificationController extends Controller
{
    public function getSpecification(Request $request)
    {
        $subcategory = Subcategory::where('key',$request->key)->first();
        $specifications = $subcategory->specifications->where('status', 1);
        
        // $var = ' 
        // <div class="section specification_section tab-content next-stap post-option">
        //                         <h4 class="hidden-xs" >Select a specification</h4>
        //                         <div role="tabpanel" class="">
        //                         </div>

        // <ul role="tablist" class="new_added_specification" style="list-style: square;">';
        // foreach($specifications as $specification){
        //     $var .= '<a class="specification" id="'. $specification->key.'" aria-controls="platelets" role="tab" data-toggle="tab"><li>
        //                     '.$specification->name.'
        //             </li></a>';
        // } 
        // // $var.='<li class="other_specification_btn"> Other
                       
        // //         </li>
        // //         <span class="other_specification_input" style="display: none">
        // //             <input type="hidden" name="user_add_specification" value="1"> 
        // //             <input type="text" name="other_specification_new" autocomplete="off" placeholder="Add new specification">
        // //             <input type="submit" class="add_specification btn-main" name="submit" value="Add">
        // //          </span>
        // //             ' ;

        // return $var.'</ul>

        // <div class="btn-section button_section" id="button_section">
                                    
        //                             <form method="POST"  action="'.route("web.categorie.donationDetails") .'"> 
        //                                  '.csrf_field().'
        //                                 <input type="hidden" name="specification" id="specification_field" class="specification_field"  />
        //                                 <!-- <button type="text" class="btn"><a href="'. route('web.home') .'" >Cancel</a></button> -->
        //                                 <button type="submit" class="btn">Proceed</button>
        //                             </form>   
        //                         </div>
        //                     </div>
        // ' ;





        $var = ' 
                    <div class="sidebar-area specification_section next-stap post-option">
                        <div class="single-widget mb-30">
                            <h5 class="widget-title hidden-xs">Specification</h5>
                            <ul class="category-list new_added_specification">';
        foreach($specifications as $specification){
            $var .='
                    <li>
                        <a href="javascript:void(0)" class="specification" id="'. $specification->key.'" > '. $specification->name .' <span>(20)</span>
                        </a>
                    </li>
                    ';
        } 
        // $var.='<li class="other_specification_btn"> Other
                       
        //         </li>
        //         <span class="other_specification_input" style="display: none">
        //             <input type="hidden" name="user_add_specification" value="1"> 
        //             <input type="text" name="other_specification_new" autocomplete="off" placeholder="Add new specification">
        //             <input type="submit" class="add_specification btn-main" name="submit" value="Add">
        //          </span>
        //             ' ;

        return $var.'       </ul>
                        </div>
                        
                        <div class="contact-bottom-area btn-section button_section" id="button_section">
                            <form method="POST"  action="'.route("web.categorie.donationDetails") .'"> 
                            '.csrf_field().'
                                <input type="hidden" name="specification" id="specification_field" class="specification_field"  />
                                
                                <button type="submit" class="primary-btn btn-hover black-bg">Proceed <span></span></button>
                            </form>
                        </div>

                            
                    </div>

                    ' ;
    }

    

}
