  
  @extends('layout')

@section('title' , 'WISHLIST')
<?php 
$h = 'd-none';
?>

@include('components.topbar', compact('h','count') )
  @section('content')


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
        
            <div class="col-lg-12">
                <x-navbar/>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3"><i class="fas fa-heart text-primary"></i></h1>
            <h1 class="font-weight-semi-bold text-uppercase mb-3">My wishlist</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">My Wishlist </p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 d-flex justify-content-center">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                        <th></th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                    @foreach($record as $items)
                    <tr>
                        
                    <td>
                            <a href="javascript:void(0)" onclick="myfunction({{$items->id}})" ><button 
                            id="del"
                            class="btn btn-sm btn-primary">   <i class="fa fa-times"></i></button></a></td>
                            <td class="align-middle"><img src="{{secure_asset('/uploads/'.$items->product_image)}}" alt="" style="width: 50px;"> </td>
                            <td class="align-middle">{{$items->product_name}}</td>
                            <td class="align-middle">{{$items->product_price}}</td>
                            <td class="align-middle"><a  href="javascript:void(0)" onclick="myfunction1({{$items->id}})"><button class="btn btn-primary px-4">Add to cart</button>
                                    </a></td>
                            
                        </tr>
                        @endforeach

                    
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!-- Cart End -->


  @endsection


  <script>

document.getElementById("del").addEventListener('click',function(){
console.log('help');

})

function myfunction(id){

$.ajax(
    
    {
     type:'get',
     url: "{{url('delwishlist')}}"+'/'+id,

    error: function (err) {
    console.log(err);
    },
     success:function(result) 
    {
        
    window.location.reload(true);


     toastr.success(result);
    }
})
}
function myfunction1(id){

$.ajax(
    
    {
     type:'get',
     url: "{{url('sendtocart')}}"+'/'+id,

    error: function (err) {
    console.log(err);
    },
     success:function(result) 
    {
        
    window.location.reload(true);


     toastr.success(result);
    }
})
}

  </script>