@extends('users.layouts.layout')
@section('title', 'Book Your Stay')
@section('content')

<div class="breadcrumb-section" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url(assets/img/burseyWeb/3.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="banner-content">
                    <h1>Room & Suits</h1>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Room & Suits</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="room-suits-page pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-xl-4 order-lg-1 order-2">
                <div class="sidebar-area">
                    <div class="single-widget mb-30">
                        <h5 class="widget-title">Search Here</h5>
                        <form>
                            <div class="search-box">
                                <input type="text" placeholder="Search Here" id="searchBox">
                                <button type="button" id="searchBtn"><i class="bx bx-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="single-widget mb-30">
                        <h5 class="widget-title">Popular Filters</h5>
                        <div class="checkbox-container">
                            <ul>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Book without credit card</span>
                                        <span class="qty">250</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Free cancellation</span>
                                        <span class="qty">90</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Breakfast Included</span>
                                        <span class="qty">35</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">No prepayment</span>
                                        <span class="qty">28</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Romantic</span>
                                        <span class="qty">12</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-widget mb-30">
                        <h5 class="shop-widget-title">Price Filter</h5>
                        <div class="range-wrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <input type="hidden" id="min-value" value="">
                                        <input type="hidden" id="max-value" value="">
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="slider-labels">
                                <div class="caption">
                                    <span id="slider-range-value1"></span>
                                </div>
                                <a href="#">Apply</a>
                                <div class="caption">
                                    <span id="slider-range-value2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-widget mb-30">
                        <h5 class="widget-title">Facilities</h5>
                        <div class="checkbox-container">
                            <ul>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Airport shuttle</span>
                                        <span class="qty">30</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Locker</span>
                                        <span class="qty">90</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Gym</span>
                                        <span class="qty">35</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Spa</span>
                                        <span class="qty">28</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Parking</span>
                                        <span class="qty">70</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Restaurant</span>
                                        <span class="qty">120</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Swimming pool</span>
                                        <span class="qty">36</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Pet friendly</span>
                                        <span class="qty">10</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-widget mb-30">
                        <h5 class="widget-title">Star Rating</h5>
                        <div class="checkbox-container">
                            <ul>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="5">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                               <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>          
                                                <i class="bi bi-star-fill"></i>          
                                                <a href="#" class="review-no">(5)</a>
                                            </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="4.5">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                               <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>          
                                                <a href="#" class="review-no">(4.5)</a>
                                            </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="4">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                               <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>          
                                                <a href="#" class="review-no">(4.0)</a>
                                            </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="3.5">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                                <i class="bi bi-star-fill"></i>
                                                 <i class="bi bi-star-fill"></i>
                                                 <i class="bi bi-star-fill"></i>
                                                 <i class="bi bi-star-half"></i>        
                                                 <a href="#" class="review-no">(3.5)</a>
                                             </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="3">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                               <i class="bi bi-star-fill"></i>
                                               <a href="#" class="review-no">(3.0)</a>
                                            </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="2.5">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                                <a href="#" class="review-no">(2.5)</a>
                                            </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="2">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                                <i class="bi bi-star-fill"></i>
                                               <i class="bi bi-star-fill"></i>
                                                <a href="#" class="review-no">(2.0)</a>
                                            </span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox" class="ratingCheckbox" value="1">
                                        <span class="checkmark"></span>
                                        <span class="stars">
                                                <i class="bi bi-star-fill"></i>
                                               <a href="#" class="review-no">(1.0)</a>
                                            </span>
                                    </label>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="single-widget">
                        <h5 class="widget-title">Room Accessibility</h5>
                        <div class="checkbox-container">
                            <ul>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Adapted bath</span>
                                        <span class="qty">250</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Roll-in shower</span>
                                        <span class="qty">90</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Raised toilet</span>
                                        <span class="qty">35</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Emergency cord in bathroom</span>
                                        <span class="qty">28</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="containerss">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text">Shower chair</span>
                                        <span class="qty">12</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-lg-2 order-1">
                <div id="propertyListing">
                    {{-- Property List Render here --}}
                </div>
                
                <div class="row mt-70">
                    <div class="col-lg-12">
                        <nav class="inner-pagination-area">
                            <ul class="pagination-list">
                                <li>
                                    <a href="#" class="shop-pagi-btn"><i class="bi bi-chevron-left"></i></a>
                                </li>
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#" class="active">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#"><i class="bi bi-three-dots"></i></a>
                                </li>
                                <li>
                                    <a href="#">6</a>
                                </li>
                                <li>
                                    <a href="#" class="shop-pagi-btn"><i class="bi bi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
$(document).ready(function() {
    filterProperties();

    $('#searchBtn').on('click', function(){
        filterProperties();
    });

    $('.ratingCheckbox').on('click', function(){
        filterProperties();
    });

    function filterProperties(){
        let search = $('#searchBox').val();
        let min_price = $('#min-value').val();
        let max_price = $('#max-value').val();
        let url = "/properties/filter";
        let csrf = $('meta[name="csrf-token"]').attr('content');
        let ratings = [];
        $('.ratingCheckbox:checked').each(function(){
            ratings.push($(this).val());
        });

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrf,
                search: search,
                min_price:min_price,
                max_price:max_price,
                ratings:ratings,
            },
            success: function(response) {
                $('#propertyListing').html(response);
            }
        });
    }
 
});
</script>
@endpush