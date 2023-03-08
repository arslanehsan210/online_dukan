
@empty($record)

<div class="col-lg-4 col-md-6 col-sm-12 pb-1">
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Record not found</h1>
        </div>
    </div>
</div>
@else


    <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
          
        
   <a href="{{route('detail',[$items->id])}}">     <img class=" w-100" style="height:300px;" src="{{secure_asset('/uploads/'.$items->product_image)}}" alt=""></a>
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

        

        <a href="javascript:void(0)" onclick="myfunction1({{$items->id}})" class="btn btn-sm text-dark p-0"><i class="fas fa-heart  text-primary mr-1"></i>Add To Wishlist</a> 
            
            <a href="javascript:void(0)" onclick="myfunction({{$items->id}})" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
        </div>

        <div class="card-footer d-flex justify-content-center bg-light border">

        
        <a href="{{route('detail',[$items->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    </div>

    </div>



    <script>
 function myfunction(id){

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

function myfunction1(id){
$.ajax(
    
    {
     type:'get',
     url: "{{url('addtowishlist')}}"+'/'+id,

    error: function (err) {
    console.log(err);
    },
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
    

  @endempty