@extends('layout')

@section('title' , 'SHOP')

<?php 
$hide = ['h' => ''];
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}"> Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>

                    <div class=" d-flex  justify-content-between ">
                          
                          <form action="{{route('filtbyprice')}}">
                          <input type="text" class="form-control d-none" name="min" value="0">
                          <input type="text" class="form-control d-none" 
                          name="max"  value="2000000">
                          <input type="submit" value="All Price" name="submit" class="mt-3   border-0 pl-2 pr-2 filter_btn" >
                           </form>
  
                          </div>
                          <div class=" d-flex  justify-content-between ">
                          
                          <form action="{{route('filtbyprice')}}">
                          <input type="text" class="form-control d-none" name="min" value="0">
                          <input type="text" class="form-control d-none" name="max"  value="1000">
                          <input type="submit" value="$0 - $1000" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                           </form>
                          </div>
                        <div class=" d-flex  justify-content-between ">
                          
                        <form action="{{route('filtbyprice')}}">
                        <input type="text" class="form-control d-none" name="min" value="1000">
                        <input type="text" class="form-control d-none" name="max"  value="4000">
                        <input type="submit" value="$1000 - $4000" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                         </form>
                        </div>
                        <div class=" d-flex  justify-content-between ">
                          
                        <form action="{{route('filtbyprice')}}">
                        <input type="text" class="form-control d-none" name="min" value="4000">
                        <input type="text" class="form-control d-none" name="max"  value="8000">
                        <input type="submit" value="$4000 - $8000" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                         </form>
                        </div>
                        <div class=" d-flex  justify-content-between ">
                          
                        <form action="{{route('filtbyprice')}}">
                        <input type="text" class="form-control d-none" name="min" value="8000">
                        <input type="text" class="form-control d-none" name="max"  value="13000">
                        <input type="submit" value="$8000 - $13000" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                         </form>
                        </div>
                        <div class=" d-flex  justify-content-between ">
                          
                        <form action="{{route('filtbyprice')}}">
                        <input type="text" class="form-control d-none" name="min" value="13000">
                        <input type="text" class="form-control d-none" name="max"  value="20000">
                        <input type="submit" value="$13000 - $20000" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                         </form>
                        </div>
                        
                    
                </div>
                <!-- Price End -->
                

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
            
                   
                    <div class=" d-flex  justify-content-between ">
                          
<a class="pl-2 pb-3" id="asize" href="{{route('shopp')}}">All Size</a>
                          </div>
                    <div class=" d-flex  justify-content-between ">
                          
                          <form action="{{route('filtbysize')}}">
                          <input type="text" class="form-control d-none" name="size" value="extra small">
                        
                          <input type="submit" value="Extra Small" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                           </form>
                          </div>
                          <div class=" d-flex  justify-content-between ">
                          
                          <form action="{{route('filtbysize')}}">
                          <input type="text" class="form-control d-none" name="size" value="small">
                        
                          <input type="submit" value="Small" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                           </form>
                          </div>
                          <div class=" d-flex  justify-content-between ">
                          
                          <form action="{{route('filtbysize')}}">
                          <input type="text" class="form-control d-none" name="size" value="medium">
                        
                          <input type="submit" value="Medium" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                           </form>
                          </div>
                          <div class=" d-flex  justify-content-between ">
                          
                          <form action="{{route('filtbysize')}}">
                          <input type="text" class="form-control d-none" name="size" value="large">
                        
                          <input type="submit" value="Large" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                           </form>
                          </div>
                          <div class=" d-flex  justify-content-between ">
                          
                          <form action="filtbysize">
                          <input type="text" class="form-control d-none" name="size" value="extra large">
                        
                          <input type="submit" value="Extra Large" name="submit" class="border-0 pl-2 pr-2 filter_btn" >
                           </form>
                          </div>
                        
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" id="search" class="form-control" name="search" placeholder="Search for products">
                                    <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                              <button type="submit" class="border-0 bg-transparent text-primary">  <i class="fa fa-search"></i></button>
                            </span>
                        </div>
                                </div>
                                
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="{{route('sortbydate')}}">Latest Product</a>
                                    <a class="dropdown-item" href="{{route('sortbyprice')}}">Price</a>
 
                                </div>
                            </div>
                        </div>
                    </div>
        
                    
                    
                    @foreach($record as $items)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        
                    @include('components.products')
                    
                    </div>
                    @endforeach
                    <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                          <div class="pagination w-100 justify-content-center">
                          
                          {!! $record->appends(Request::all())->links() !!}
                          </div>
                        </nav> 

                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->



<script>
    toastr.success("{{ session('message') }}");
</script>


@endsection

