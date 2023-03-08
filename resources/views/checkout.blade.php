@extends('layout')

@section('title' , 'CHECKOUT')

<?php 
$hide = ['h' => 'd-none'];
?>

@include('components.topbar', $hide)
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
            
                            <form method="post" action="added"  id="forminfo"> 
                             @csrf       
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" id='fname' name="fname" required type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" id='lname' name="lname" required type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" id='email' name="email" required type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" id='cell' name="cell" required type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" id='address1' name="address1" required type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" id='address2' name="address2" required type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" id="menu" name="country" >
                                <option value ="United States"  selected>United States</option>
                                <option value ="Afghanistan" >Afghanistan</option>
                                <option value ="Albania" >Albania</option>
                                <option value ="Algeria" >Algeria</option>
                            </select> 
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" id='city' name="city" required  type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" id='state' name="state" required  type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" id='zipcode' name="zcode" required type="text" placeholder="12345">
                        </div>

                    </div>

                    

                </div>
           <!-- //////////  payment div start /////////////// -->
                
<div class="paymentdiv" style="display:none">
                @php
        $stripe_key = env('STRIPE_KEY');
    @endphp
                <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <p>You will be charged rs {{$sale}}</p>
                </div>
                <div class="card">
                    <form  method="post" id="payment-form">
                        @csrf                    
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                               

                            </div>
                        </div>
                        <div class="card-footer">
                        <button type="button" onclick="closemodal()" id="cbtn"  class="btn btn-secondary">Close</button>
        <button
                          id="card-button"
                          class="btn btn-dark"
                          onclick="formsubmit()"
                          data-secret="{{ $intent }}"
                        > Pay Now</button>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal-footer">
        
      </div>
      </div>
<!-- //////////  payment div end /////////////// -->


            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                     @foreach($record as $items)

                        <div class="d-flex justify-content-between">
                            <p>{{$items->product_name}}</p>
                            <p>${{$items->total}}</p>
                        </div>

                     @endforeach       
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$<?php
                            $sum = 0;
                                foreach($record as $items)
                                      {
                                           $sum += $items->total; 
                                      }
                            echo $sum;
                             ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$<?php
                            if($sum == 0 )
                            {
                                echo 0;
                            }
                            else{
                                echo $sum + 10;
                            }
                            ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" required class="custom-control-input" value="cod" name="payment" id="directcheck" onclick="ablefunc()" checked>
                                <label class="custom-control-label" for="directcheck">Cash on Delivery</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                               <input type="radio" required class="custom-control-input" value="olp" name="payment" id="banktransfer" onclick="disablefunc()">

                          <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                      <button id="orderPlaceBtn" onclick="placeorder()" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Checkout End -->

    <script src="https://js.stripe.com/v3/"></script>
    
    <script>





        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        let mdl = document.querySelector(".paymentdiv");
        

function disablefunc()
{
 document.getElementById('orderPlaceBtn').setAttribute('disabled', '');

let bt = document.getElementById('banktransfer');
let cd = document.getElementById('directcheck');
let fname = document.getElementById('fname').value;
let lname = document.getElementById('lname').value;
let email = document.getElementById('email').value;
let cell = document.getElementById('cell').value;
let address1 = document.getElementById('address1').value;
let address2 = document.getElementById('address2').value;
let city = document.getElementById('city').value;
let state = document.getElementById('state').value;
let zipcode = document.getElementById('zipcode').value;

if(fname == "" || lname =="" || email == "" || cell == "" || address1 == "" || address2== "" 
|| city == "" || state == "" || zipcode == "")
{
    alert('Fill all the fields');
bt.checked = false;
cd.checked = false;

console.log('1: ',fname);
console.log('2: ',lname);
console.log('3: ',email);
console.log('4: ',address1);
console.log('5: ',address2);
console.log('6: ',city);
console.log('7: ',state);
console.log('8: ',zipcode);

}
else
{
    //  document.getElementById('exampleModal').modal("show");
    mdl.classList.add("show");
    mdl.style.display = "block";
}




}

function closemodal(){
    
    mdl.style.display = "none";
    mdl.classList.remove("show");
}
function ablefunc()
{
 document.getElementById('orderPlaceBtn').removeAttribute('disabled');
 closemodal();
}



        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    var forminfo = document.getElementById('forminfo');




function formsubmit(e){
    {

        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                    forminfo.submit();

                    
                }
            });
        }
}

function placeorder(){

    let fname = document.getElementById('fname').value;
let lname = document.getElementById('lname').value;
let email = document.getElementById('email').value;
let cell = document.getElementById('cell').value;
let address1 = document.getElementById('address1').value;
let address2 = document.getElementById('address2').value;
let city = document.getElementById('city').value;
let state = document.getElementById('state').value;
let zipcode = document.getElementById('zipcode').value;


    if(fname === "" || lname ==="" || email ==="" || cell ==="" || address1 === "" || address2 === "" 
|| city === "" || state === "" || zipcode === "" )
{
    alert('Fill all the fields');

}
else{
    forminfo.submit();
}
    
}


    </script>



@endsection