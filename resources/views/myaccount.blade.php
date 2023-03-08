@extends('layout')
@section('content')

<section >
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb"  class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0" style="background-color: #EDF1FF;">
            <li class="breadcrumb-item"><a style="text-decoration:none;" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img style="width: 155px; height:157px;" src="{{secure_asset('/img/profile.jpg')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-2">{{$data->name}}</h5>
            <a style=" text-decoration: none;" href="{{route('profile')}}"><button class="btn btn-secondary px-2">Edit Profile</button>
                                    </a>
            
            
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->phone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->mobile}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$data->address}}</p>
              </div>
            </div>
          </div>
        </div>
        
    </div>

  </div>


  <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb"  class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0 d-flex justify-content-center" style="background-color: #EDF1FF;">
          <h5>My Orders</h5>
          </ol>
        </nav>
      </div>
    </div>
  <div class="row">
        <div class="col table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="text-dark" style="background-color: #EDF1FF;">
                        <tr>
                            <th>No#</th>
                            <th>Order Id</th>
                            <th>Items</th>
                            <th>Date</th>
                            <th>shipping</th>
                            <th>Total</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                  
                    <tbody class="align-middle">
<?php 
$count = 0;
?>

                    @foreach($record as $key => $item)
                    <?php 
$count += 1;
?>

                        <tr>
                                
                        <td class="align-middle">{{$count}}</td>
                          <td class="align-middle">{{$item->id}}</td>
                          <td class="align-middle">{{$item->items}}</td>
                          <td class="align-middle">{{$item->created_at}}</td>
                          <td class="align-middle">$10</td>
                          <td class="align-middle">${{$item->total_amount}}</td>
                          <td class="align-middle"><a style=" text-decoration: none;" href="{{route('orderdetails' , [$item->id])}}"><button class="btn btn-primary px-4">Details</button>
                                    </a></td>

                                        
                        </tr>

                     @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
      </div>
</section>


<script>
    toastr.success("{{ session('success') }}");
</script>
            @endsection