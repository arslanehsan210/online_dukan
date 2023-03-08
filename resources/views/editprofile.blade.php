@extends('layout')
@section('content')

<section >
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb"  class="rounded-3 mb-4">
          <ol class="breadcrumb mb-0" style="background-color: #EDF1FF;">
            <li class="breadcrumb-item"><a style="text-decoration:none;" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a style="text-decoration:none;" href="{{route('myaccount')}}">My Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
    <form method="post" action="updated" enctype="multipart/form-data">
  @csrf
      <div class="mb-3">
        <label for="nam" class="form-label">Name:</label>
        <input name="name" type="text"class="form-control required" id="nam" value="{{$record->name}}">
      </div>
      
      <div class="mb-3">
        <label for="num" class="form-label">Mobile</label>
        <input type="text" class="form-control" name="mobile" id="num" aria-describedby="emailHelp" value="{{$record->mobile}}">
      </div>
      <div class="mb-3">
        <label for="num" class="form-label">Phone:</label>
        <input type="text" class="form-control" name="phone" id="num" aria-describedby="emailHelp" value="{{$record->phone}}">
      </div>
      <div class="mb-3">
        <label for="num" class="form-label">Address:</label>
        <input type="text" class="form-control" name="address" id="num" aria-describedby="emailHelp" value="{{$record->address}}">
      </div>
      <input type="submit" value="Updated" name="submit" class="mt-3 btn-primary border-0 p-2" >
    </form>
    </div>
    </div>
    </div>

</section>

            @endsection