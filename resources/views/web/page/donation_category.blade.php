@extends('user.layout.master')
@section('title','Donation Category')
@section('content')
    <!-- post-page -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="breadcrumb-section mb-20" style="background-image: url('{{ asset("uploads/inner_pages/breadcrumb-bg7.png") }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-content">
                            <h4>Auction Category</h4>
                            <ul class="breadcrumb-list">
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li>Select Category</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="main" class="clearfix ad-post-page">
            <div class="container">

               
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="sidebar-area">
                        <div class="single-widget mb-30">
                            <!-- <h5 class="widget-title">Search Here</h5> -->
                            <form method="POST" id="search_form" action="{{ route('web.categorie.donationDetails') }}"> 
                                <div class="search-box">
                                    {{ csrf_field() }}
                                      
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif 
                                    
                                    <input type="text"  autocomplete="off" list="category_list" name="specification_search" id="search_category" class="form-control input-lg" placeholder="Search and select your auction category"  style="margin-left: 0px; width: 88% !important; min-width: 5% !important;" />
                                    
                                        <datalist id="category_list" >
                                            
                                        </datalist>

                                    <button type="submit">
                                        <i class="bx bx-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                 
                  

 
                {{ csrf_field() }}
  
                <!-- DESKTOP VERSION -->

                <div class="d-xs-none col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <!-- <div class="hidden-xs col-sm-12 col-md-12 col-lg-12 col-xl-12"> -->
                    <div class="row category-tab">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="sidebar-area">
                                <div class="single-widget select-category post-option mb-30">
                                    <div class="row">
                                      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <h5 class="widget-title">Category</h5>
                                      </div>
                                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-end" style="padding-top: 10px;">
                                        <a roll="button" class="category_show_all" style="display: none; font-size: 20px; cursor: pointer;"><i class="bi bi-arrow-return-left"> </i></a>
                                      </div>
                                    </div>
                                    <!-- <h5 class="widget-title">Category</h5> -->
                                    <ul class="category-list category_ul">
                                        {{ csrf_field() }}
                                        
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="javascript:void(0)" class="category"  id="{{$category->key}}"> {{ $category->name }} <span></span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 appendSubCategory">
                            {{ csrf_field() }}
                            
                            <span id="new_category_id"></span>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 appendSpecification">
                            {{ csrf_field() }}
                            <span id = "new_subcategory_id"></span>
                                
                        </div>
                    </div>
                </div>


                <!-- MOBILE VERSION -->
                <div class="col-xs-12 d-sm-none d-md-none d-lg-none d-xl-none">
                <!-- <div class="col-xs-12 hidden-sm hidden-md hidden-lg hidden-xl"> -->
                    <div class="row category-tab">  
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="sidebar-area">
                                <div class="single-widget select-category post-option mb-30">
                                    <div class="row">
                                      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <h5 class="widget-title">Category</h5>
                                      </div>
                                      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-end" style="padding-top: 10px;">
                                        <a roll="button" class="category_show_all" style="display: none; font-size: 20px; cursor: pointer;"><i class="bi bi-arrow-return-left"> </i></a>
                                      </div>
                                    </div>
                                    <!-- <h5 class="widget-title">Category</h5> -->
                                    <ul class="category-list category_ul">
                                        {{ csrf_field() }}
                                        
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="javascript:void(0)" class="category"  id="{{$category->key}}"> {{ $category->name }} <span>(20)</span>
                                                </a>
                                            </li>
                                        @endforeach
                                        <div role="tabpanel" class="appendSubCategory">
                                            <span id="new_category_id"></span>
                                        </div>

                                    </ul>
                                    <div role="tabpanel" class="appendSpecification" style="margin-left: 30px;">
                                        <span id="new_subcategory_id"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                   
                </div>
                			
            </div><!-- container -->
        </section><!-- post-page -->
@endsection
@push('javaScript')
<!-- Ovveride Css -->
<style>
	.next-stap .btn{
        border: 2px solid #00a651;
        background-color: transparent;
    	color: #00a651;
    }
    .next-stap .btn:hover{
        border: 2px solid #00a651;
        background-color: #00a651;
    	color: #FFFFFF;
    }
</style>


<script>
$(document).ready(function(){

    var timer = null;
    $('#search_category').keyup(function(){ 
        
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        clearTimeout(timer); 
        timer = setTimeout(function(){
        
         // alert( _token);
         $.ajax({
          url:"{{ route('web.donation.auto_complate_list') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#category_list').fadeIn();  
            $('#category_list').html(data);
          }
         });
        } , 30)
    });

    $(document).on('click', 'li', function(){  
        $('#specification').val($(this).text());  
        $('#category_list').fadeOut();  
    });  

});
</script>
<!-- DESKTOP -->
<script>

  $(function(){
     

    $(document).on("click", ".add_category" , function(){

        var user_add_category = '1';
        var category_name = $('input[name = other_category]').val();
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
         type:'POST',
         url: "{{ URL::route('admin.donationItem.category.create')}}",
         data: { category_name:category_name, user_add_category:user_add_category},
         success: function(data) {
            

            $('.category').hide();

            // $('#new_category_id').append('<input type="hidden" name="select_category" id="select_category" value="'+data+'" />');
            
            
            $('<a href="javascript:void(0)" class="category"  id='+ data +' aria-controls="cat1" role="tab" data-toggle="tab" ><li>'+ category_name +'</li> </a>').insertBefore(".category:first");

            $('.button_section').hide();
            $id = data; //Key of category

                  // $.ajaxSetup({
                  //   headers: {
                  //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  //   }
                  // });
                  //   $('.appendSubCategory').children().hide();
                  //   $.ajax({
                  //    type:'POST',
                  //    url: "{{ URL::route('web.categorie.subcategories') }}",
                  //    data: { key: $id},
                  //    success: function(data) {

                  //      $('.appendSubCategory').append(data);
                  //      $('.button_section').hide();
                  //      $('#category_field').val($id);

                  //    }
                  //  });
                }
            });

    });

  
  $(document).on("click", ".add_subcategory" , function(){
        
        
        
        var user_add_subcategory = '1';
        var new_category_id = $('#select_subcategory').val();
        var subcategory_name = $('input[name = other_subcategory]').val();
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
         type:'POST',
         url: "{{ URL::route('admin.donationItem.subCategory.create')}}",
         data: { subcategory_name:subcategory_name, user_add_subcategory:user_add_subcategory, new_category_id:new_category_id},
         success: function(data) {
          

          // $('.subcategory').hide();

          // $('#new_subcategory_id').append('<input type="hidden" name="select_subcategory" id="select_subcategory" value="'+data+'" />');

          $('<a href="javascript:void(0)" class="subcategory"  id='+ data +' aria-controls="platelets" role="tab" data-toggle="tab" ><li>'+ subcategory_name +'</li> </a>').insertBefore(".new_added_subcategory");



              $('.button_section').hide();
              $id = data; //Key of category

              // $.ajaxSetup({
              //   headers: {
              //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              //   }
              // });

             //  $('.appendSpecification').children().hide();
             //  $.ajax({
             //   type:'POST',
             //   url: "{{ URL::route('web.categorie.specification') }}",
             //   data: { key: $id},
             //   success: function(data) {
             //     $('.appendSpecification').append(data);
             //     $('.button_section').hide();
             //     $('#subcatgory_field').val($id);
             //   }
             // });

            }
          });

      });

  $(document).on("click", ".add_specification" , function(){
    // var id = $(this).attr('id');
    // alert("Hi");
    // alert($('input[name = other_specification_new]').val());
    // alert($('input[name = other_specification]').val());
   

    var user_add_specification = '1';
    var new_subcategory_id = $('#select_specification').val();
    var specification_name = $('input[name = other_specification_new]').val();
    
    // alert(specification_name);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // alert(new_subcategory_id);
    $.ajax({
     type:'POST',
     url: "{{ URL::route('admin.donationItem.specification.create')}}",
     data: { specification_name:specification_name, user_add_specification:user_add_specification, new_subcategory_id:new_subcategory_id},
     success: function(data) {
              // alert(data);

              // $('.category').not($('#'+data+'').parents().addBack()).hide();
              
              $('.specification').hide();
              $('<a href="javascript:void(0)" class="specification"  id='+ data +' aria-controls="platelets" role="tab" data-toggle="tab" ><li>'+ specification_name +'</li> </a>').insertBefore(".new_added_specification");

              
              // $('.Scategory:first').prepend('<a class="category"  id='+ data +' aria-controls="cat1" role="tab" data-toggle="tab" ><li class="">'+ specification_name +'</li> </a>');


              $('.button_section').hide();
                $id = data; //Key of category

              // $.ajaxSetup({
              //   headers: {
              //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              //   }
              // });

             //  $('.appendSpecification').children().hide();
             //  $.ajax({
             //   type:'POST',
             //   url: "{{ URL::route('web.categorie.specification') }}",
             //   data: { key: $id},
             //   success: function(data) {
             //     $('.appendSpecification').append(data);
             //     $('.button_section').show();
             //     $('#subcatgory_field').val($id);
             //   }
             // });

            }
          });

  });
 
 // $(function(){
     $('.button_section').hide();

   // $('.category').on('click',function()

   $(document).on("click", ".category" , function(){

      $(this).closest('div').find('.category').not(this).hide();
      $(this).closest('div').find('li').css('margin-bottom', '0px !important');

      console.log($(this).closest('div').find('li'));
      console.log($(this).closest('div').find('.category').not(this).parent('li'));

      $('.button_section').hide();

      $('.category_show_all').show();

      $('.specification_section').hide();
      
      var id = $(this).attr('id');

      
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
     });
     
      
      $.ajax({
       type:'POST',
       url: "{{ URL::route('web.categorie.subcategories') }}",
       data: { key: id},
       success: function(data) {
           
           $('.appendSubCategory').children().remove();

           $('.appendSubCategory').append(data);
           $('.button_section').hide();
           $('#category_field').val(id);

           $('#new_category_id').append('<input type="hidden" name="select_subcategory" id="select_subcategory" value="'+id+'" />');
 
       }
      });


          // Remove all subcategory section except one
          var subcategories = $('.appendSubCategory .subcategory_section');
          var count = subcategories.length;
          
          if (count > 0) {
            subcategories.slice(0, -1).remove();
          }
        

   });


   $(document).on("click", ".category_show_all" , function(){

      $('.category_ul').find('.category').show();

      $('.category_show_all').hide();
      $('.subcategory_show_all').hide();

      $('.appendSubCategory').children().remove();
      $('.subcategory_section').hide();
      

      $('.appendSpecification').children().remove();
      $('.specification_section').hide();
      
      $('.button_section').hide();
   });


   $(document).on("click", ".subcategory" , function() {
      
      $(this).closest('div').find('.subcategory').not(this).hide();
      $id = $(this).attr('id');
      $('.button_section').hide();

      $('.subcategory_show_all').show();
      
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      $.ajax({
         type:'POST',
         url: "{{ URL::route('web.categorie.specification') }}",
         data: { key: $id},
         success: function(data) {
            
            $('.appendSpecification').children().remove();
            
             $('.appendSpecification').append(data);
             $('.button_section').hide();
             $('#subcatgory_field').val($id);

             $('#new_subcategory_id').append('<input type="hidden" name="select_specification" id="select_specification" value="'+$id+'" />');
         }
        });

        // Remove all specification section except one
          var subcategories = $('.appendSpecification .specification_section');
          var count = subcategories.length;
          
          if (count > 0) {
            subcategories.slice(0, -1).remove();
          }

   });

   $(document).on("click", ".subcategory_show_all" , function(){

      $('.new_added_subcategory').find('.subcategory').show();

      $('.subcategory_show_all').hide();

      $('.appendSpecification').children().remove();
      $('.specification_section').hide();
      
      $('.button_section').hide();
   });

     $(document).on("click", ".specification" , function() {
          
          $(this).closest('div').find('.specification').not(this).hide();

          $id = $(this).attr('id');
          if($id != '' ){
               $('.button_section').show();
               $('.specification_field').val($id);
          }
     });


    $(document).on("click", ".subcategory_show_all" , function(){

      $('.new_added_subcategory').find('.subcategory').show();

      $('.specification_section').hide();
      $('.button_section').hide();
   });


     $(document).on("click", ".other_category_btn" , function() {
          
          $('.other_category_input').toggle();
     });

     $(document).on("click", ".other_subcategory_btn" , function() {
          
          $('.other_subcategory_input').toggle();
     });

     $(document).on("click", ".other_specification_btn" , function() {
          
          $('.other_specification_input').toggle();
     });

 });




</script>




@endpush