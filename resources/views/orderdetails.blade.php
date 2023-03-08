@extends('layout')


@section('content')



<section class="h-100 gradient-custom">
  <div class="container py-1 h-100">
  <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb"  class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0" style="background-color: #EDF1FF;">
            <li class="breadcrumb-item"><a style="text-decoration:none;" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a style="text-decoration:none;" href="{{route('myaccount')}}">My Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-8">
        <div class="card" style="border-radius: 10px; border-color: #EDF1FF;">
          <div class="card-header px-4 py-5 d-flex justify-content-center"     style="background-color:#EDF1FF;  border-color: #EDF1FF;">
            <h3 class="text-muted mb-0">Order Details</h3>
          </div>
          <div class="card-body p-4">
            
            <div class="card shadow-0 border-0 mb-4">
              <div class="card-body">

              <?php 
              $total = 0;
              ?>

                @foreach($record as $val)
                <div class="row">
                  <div class="col-md-2">
                    <img src="{{secure_asset('/uploads/'.$val->product_image)}}"

                    
                      class="img-fluid" alt="Phone">
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0">{{$val->product_name}}</p>
                    
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">{{$val->product_color}}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">{{$val->product_size}}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">${{$val->unit_price}} &#215; {{$val->quantity}} </p>
                  </div>
                  
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">${{$val->unit_price * $val->quantity}}</p>
                  </div>
                  
                  
                  
                </div>
                <?php
                $total += $val->unit_price * $val->quantity;
                ?>
                

                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                @endforeach
              </div>
            </div>


            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Total: </span> ${{$total}}</p>
            </div>

            <div class="d-flex justify-content-end mb-5">
              
              <p class="text-muted mb-0"><span class="fw-bold me-4">Shipping Charges: </span> $10</p>
            </div>
          </div>
          <div class="card-footer border-0 px-4 py-5 d-flex justify-content-center"
            style="background-color: #D19C97; border-color: #D19C97; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
              paid:   <span class="h5 mb-0 ms-2"> ${{$total + 10}}</span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





@endsection