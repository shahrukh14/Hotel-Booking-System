@extends('users.layouts.layout')
@section('title', 'Checkout')
@section('content')

<div class="breadcrumb-section" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url(/assets/img/innerpage/inner-banner-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="banner-content">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb-list">
                         <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Checkout section -->
<div class="checkout-page pt-120 mb-120">
    <div class="container">
        <form action="{{ route('user.booking.confirm') }}" method="POST" class="row g-lg-4 gy-5">
            <input type="hidden" name="booking_id" value="{{$booking->id}}">
            @csrf
            <div class="col-lg-6">
                <div class="inquiry-form">
                    <div class="title">
                        <h4>Billing Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <label>First Name*</label>
                                <input id="firstName" type="text" name="billing_info[first_name]" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <label>Last Name*</label>
                                <input id="lastName" type="text" name="billing_info[last_name]" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <label>Phone*</label>
                                <input id="phone" type="tel" name="billing_info[phone]" placeholder="Ex- +880-13* ** ***" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <label>Email*</label>
                                <input id="email" type="email" name="billing_info[email]" placeholder="user@gmail.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <label>Street Address *</label>
                                <input id="streetAddress" type="text" name="billing_info[address]" placeholder="Street Address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-30">
                                <label>Zip Code*</label>
                                <input id="postalCode" type="text" name="billing_info[zip_code]" placeholder="Zip code" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-inner mb-30">
                                <label>Short Notes</label>
                                <textarea name="billing_info[note]" placeholder="Write Something..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-inner">
                                <label class="containerss">
                                    <input name="terms_conditions" type="checkbox" value="1" required>
                                    <span class="checkmark"></span>
                                    <span class="text">Agree to Our <a href="assets/terms_conditions.pdf">Terms & Conditions and House Rules</a></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inquiry-form">
                    <div class="title">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="cart-menu">
                        <div class="cart-body">
                            <ul>
                                <li class="single-item">
                                    <div class="item-area">
                                        <div class="main-item">
                                            <div class="item-img">
                                                <img src="{{ asset('/assets/img/innerpage/product-img2.jpg')}}" alt="">
                                            </div>
                                            <div class="content-and-quantity">
                                                <div class="content">
                                                    <div class="price-and-btn d-flex align-items-center justify-content-between">
                                                        <h6>Hotel Booking</h6>
                                                        <button type="reset" class="close-btn"><i class="bi bi-x"></i></button>
                                                    </div>
                                                    <P><span id="checkin-checkout-dates">{{$booking->date_range}}</span></P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="cart-footer">
                            <div class="pricing-area">
                                <ul>
                                    <li><span>Sub Total</span><span id="subtotal">${{$booking->price}}</span></li>
                                    <li><span>Cleaning Fee</span><span id="cleaningFee">${{$booking->cleaning_price}}</span></li>
                                    <li><span>Tax (18%)</span><span id="tax">${{$booking->tax}}</span></li>
                                    <li id="offer-section">
                                        <span id="offer">6% Off</span>
                                        <span id="discount">${{$booking->discount}}</span>
                                    </li>
                                </ul>
                                <ul class="total">
                                    <li><span>Total</span><span id="total">${{$booking->total}}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-inner">
                            <button id="placeOrderBtn" class="primary-btn1">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Checkout section -->

<!-- Start Banner3 section -->
<div class="banner3-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner3-content">
                    <h2>Join The Newsletter</h2>
                    <p>To receive our best monthly deals</p>
                    <form>
                        <div class="from-inner">
                            <input type="email" placeholder="Enter Your Gmail...">
                            <button type="submit" class="from-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17">
                                    <path d="M7 1L16 8.5M16 8.5L7 16M16 8.5H0.5" stroke-width="1.5"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <img src="{{asset('/assets/img/home1/banner3-vector1.png')}}" alt="" class="vector1">
                    <img src="{{asset('/assets/img/home1/banner3-vector2.png')}}" alt="" class="vector2">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner3 section -->
@endsection