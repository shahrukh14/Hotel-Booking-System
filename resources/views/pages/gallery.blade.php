@extends('users.layouts.layout')
@section('title', 'Gallery')
@section('content')
<div class="breadcrumb-section" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url(assets/img/burseyWeb/3.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="banner-content">
                    <h1>Gallery</h1>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Gallery section -->
<div class="destination-gallery pt-120 mb-120">
    <div class="container">
        <div class="row g-4 mb-70">
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/92.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/92.jpg')}}"><i class="bi bi-eye"></i> Zulu's Retreat</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/1.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/2.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/4.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/4.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/5.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/6.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/11.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/11.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/12.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/12.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/14.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/15.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/13.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/16.jpg')}}"><i class="bi bi-eye"></i> Discover
                        Island</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/17.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/19.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/23.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/24.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/27.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/27.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/28.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/28.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/33.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/34.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/15.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/15.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/16.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/16.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/17.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/17.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/18.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/18.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/19.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/19.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/20.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/20.jpg')}}"><i class="bi bi-eye"></i> Discover Island</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/40.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/40.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/41.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/41.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/42.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/42.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/43.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/43.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/44.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/44.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/45.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/45.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/46.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/46.jpg')}}"><i class="bi bi-eye"></i> Game Room</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/64.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/64.jpg')}}"><i class="bi bi-eye"></i> Patio</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/49.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/49.jpg')}}"><i class="bi bi-eye"></i> Patio</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/48.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/48.jpg')}}"><i class="bi bi-eye"></i> Patio</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/65.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/65.jpg')}}"><i class="bi bi-eye"></i> Hot Tub</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/51.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/51.jpg')}}"><i class="bi bi-eye"></i> Backyard</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/52.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/52.jpg')}}"><i class="bi bi-eye"></i> Swimming Pool</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/67.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/68.jpg')}}"><i class="bi bi-eye"></i> Swimming Pool</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/54.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/54.jpg')}}"><i class="bi bi-eye"></i> Gym Room</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/55.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/66.jpg')}}"><i class="bi bi-eye"></i> Sports Complex</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/56.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/80.jpg')}}"><i class="bi bi-eye"></i> Sports Complex</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/58.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/82.jpg')}}"><i class="bi bi-eye"></i> Sports Complex</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/83.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/83.jpg')}}"><i class="bi bi-eye"></i> Sports Complex</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/84.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/84.jpg')}}"><i class="bi bi-eye"></i> Sports Complex</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/85.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/85.jpg')}}"><i class="bi bi-eye"></i> Sports Complex</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/89.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/89.jpg')}}"><i class="bi bi-eye"></i> Driveway</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/90.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/90.jpg')}}"><i class="bi bi-eye"></i> Outdoors</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/91.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/91.jpg')}}"><i class="bi bi-eye"></i> Outdoors</a>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/92.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/92.jpg')}}"><i class="bi bi-eye"></i> </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="gallery-img-wrap">
                    <img loading="lazy" src="{{asset('assets/img/burseyWeb/93.jpg')}}" alt="">
                    <a data-fancybox="gallery-01"  href="{{asset('assets/img/burseyWeb/93.jpg')}}"><i class="bi bi-eye"></i> </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <a href="#" class="primary-btn1">Load More</a>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery section -->
@endsection
