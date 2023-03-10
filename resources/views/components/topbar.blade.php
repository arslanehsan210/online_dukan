    <!-- Topbar Start -->
    <div class="container-fluid">
        
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Online</span>Dukan</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6  text-left">
                <form class="{{$h}}" method="get" action="shopps" >
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" name="search" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                              <button type="submit" class="border-0 bg-transparent text-primary">  <i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{route('wishlist')}}" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    
                    <span class="badge">{{$count}}</span>
 
                </a>
                <a href="{{route('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span id="cartID" class="badge">{{$count2}}</span>
                </a>
            </div>
        </div>
    </div>



    
    <!-- Topbar End -->