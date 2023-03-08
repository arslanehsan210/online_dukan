

@extends('layout')

@section('title' , 'DEAILS')



<!-- ///////////////// modal start ///////////////// -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

<div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-12">
        <div class="card" style="border-radius: 10px; border-color: #EDF1FF;">
          <div class="card-header px-4 py-5 d-flex justify-content-center"     style="background-color:#EDF1FF;  border-color: #EDF1FF;">
            <h3 class="text-muted mb-0">Product Review</h3>
          </div>
          <div class="card-body p-4">
            
            <div class="card shadow-0 border-0 mb-4">
              <div class="card-body">

              
                <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                            
                                <small>Your email address will not be published. Required fields are marked *</small>
<form method="post" action="{{route('reviewform')}}" id="form">

@csrf
     <div class="rating-css">
           <label for="message" class="mt-3">Rating*</label>
    <div class="star-icon">

        <input type="radio" value="1" name="product_rating" class="d-none" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" class="d-none" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" class="d-none" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" class="d-none" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" class="d-none" id="rating5">
        <label for="rating5" class="fa fa-star"></label>

    </div>
</div>
                              <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" name="message" class="form-control"></textarea>

                               </div>

                                    <input type="text" id="product_id" name="product_id" value="" class="d-none">
                                    <div class="form-group mb-0">
                                    
                                    <button  class="btn btn-primary" type="button" onclick="handleSubmit()">Submit</button>

                                        
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                </div>

                

                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

              </div>
            </div>


        </div>
      </div>
    </div>
  </div>

  </div>
  </div>
</div>

<!-- //////////////// model end ///////////////////////  -->


<?php 
$hide = ['h' => 'd-none'];
?>

@include('components.topbar', $hide)


@section('content')

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">

        @include('components.sidebar', compact('menu', 'submenu') )

            <div class="col-lg-9">
            
<x-navbar/>

            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">

                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{secure_asset('/uploads/'.$record->product_image)}}" alt="Image">
                        </div>
                

                    </div>
                    
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$record->product_name}}</h3>
                <div class="d-flex mb-3">






                    <div class="text-primary mr-2">
                        
                    <?php
                        $ratingAvg = $review->avg('rating');
                     ?>

                @for($i = 0; $i < 5; $i++)
   
                    <?php
                              $checkstar =$ratingAvg - $i;                   
                    ?>

                          @if($checkstar >= 1 )

                          <small class="fas fa-star"></small>

                          @elseif( $checkstar < 1 && $checkstar > 0)

                               <small class="fas fa-star-half-alt"></small>

                          @else
                                <small class="far fa-star"></small>
                          @endif
                   @endfor
                   
                   
                    </div>
                    @if($countR == 0)
                    <small class="pt-1">(0 Review)</small>
                    @elseif($countR == 1)
                    <small class="pt-1">({{$countR}} Review)</small>
                    @else
                    <small class="pt-1">({{$countR}} Reviews)</small>
                    @endif
                </div>
                <h3 class="font-weight-semi-bold mb-4">${{$record->discounted_price}}</h3>
               <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Size:</p>
                    <div class="custom-control-inline">
                            <label for="color-1">{{$record->product_size}}</label>
                        </div>
                    
                                   </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Color:</p>
                    <div class="custom-control-inline">
                            <label for="color-1">{{$record->product_color}}</label>
                        </div>
                    
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    
                    <a href="javascript:void(0)" onclick="functionn({{$record->id}})"><button class="btn btn-primary px-3">  <i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button></a>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews ({{$countR}})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{$record->product_description}}</p>
                    </div>



                  

                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                        <div class="col-md-12">
                        <h4 class="mb-4">Review for "{{$record->product_name}}"</h4>
</div>



        @if($review->isEmpty())

        <div class="col-md-6">

<div class="media mb-4">  
No review         
</div></div>

                 @else



                                @foreach($review as $cmnt)
                            <div class="col-md-6">
                                
                                <div class="media mb-4">
                                    <img src="{{secure_asset('/img/profile.jpg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{$cmnt->cus_name}}<small><i>{{$cmnt->creaated_at}}</i></small></h6>
                                        <div class="text-primary mb-2">

                                        @for($i=1 ; $i <= $cmnt->rating; $i++ )
                                            <i class="fas fa-star"></i>

                                          @endfor  

                                          @for($j = $cmnt->rating + 1; $j <= 5; $j++)
                                          <i class="far fa-star"></i>
                                            @endfor
                                            
                                            
                                        </div>
                                        <p>{{$cmnt->message}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                @endif

                                @if($addReview->isEmpty())


@else


@if($rr == 0)

<div class="col-md-12">

<div class="media mb-4">  
<button type="button"   onclick="myFunction({{$record->id}})"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add your Review
</button>       
</div></div>
@else

@endif


@endif


                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


  
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
@foreach($record1 as $items)
                    
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
             <a href="{{route('detail',[$items->id])}}" >           <img class=" w-100" style="height:300px;" src="{{secure_asset('/uploads/'.$items->product_image)}}" alt=""> </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$items->product_name}}</h6>
                            <div class="d-flex justify-content-center">
                                
                            @if($items->discount > 0)
                <h6>Rs.{{$items->discounted_price}}</h6>
                <h6 class="text-muted ml-2"><del>
                Rs.{{$items->product_price}}
                </del></h6>
                <h6 class="ml-2"> {{$items->discount}}%</h6>
                @else
                <h6>Rs.{{$items->product_price}}</h6>
                @endif

                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">

        

<a href="{{route('addtowishlist', [$items->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-heart  text-primary mr-1"></i>Add To Wishlist</a> 
    
    <a href="javascript:void(0)" onclick="functionn({{$items->id}})" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
</div>

<div class="card-footer d-flex justify-content-center bg-light border">


<a href="{{route('detail',[$items->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            </div>
                    </div>

@endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->




    <script>


function myFunction(id){
  document.getElementById('product_id').value=id;
}

function handleSubmit () {
    document.getElementById('form').submit();
}

function functionn(id){

    $.ajax(
    
    {
 
     url: "{{url('addtocart')}}"+"/"+id,
     method: 'GET',
    success:function(result) 
    {
        
        if(result === "yes")
        {
            toastr.success('Product is added');  
            window.location.reload(true);
        }
        else{
            // toastr.success('Please Login'); 
            window.location.href='{{url("/login")}}'
        }

}
})
}
</script>

    @endsection