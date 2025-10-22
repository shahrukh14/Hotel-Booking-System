@extends('admin.layouts.layout')
@section('title', 'Login')
@section('content')
<div class="banner3-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner3-content">
                    <h2>Admin Login</h2>
                    <p>Enter your crecentials to login to your portal</p>
                    <form action="{{ route('admin.login.submit') }}" method="POST" autocomplete="off">
                    @csrf
                        <div class="from-inner">
                            <input type="email" name="email" placeholder="Enter Your email" autocomplete="off">
                        </div>
                        <div class="from-inner">
                            <input type="password" name="password" placeholder="Enter Your password" autocomplete="off">
                        </div>
                        <button type="submit" class="primary-btn1">Sign In</button>
                    </form>
                    <img loading="lazy" src="{{ asset('assets/img/home1/banner3-vector1.png')}}" alt="" class="vector1">
                    <img loading="lazy" src="{{ asset('assets/img/home1/banner3-vector2.png')}}" alt="" class="vector2">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner3 section section -->
@endsection

@push('style')
<style>
    .banner3-section{
        margin-top: 3% !important;
    }
    .from-inner{
        margin-bottom: 2% !important;
    }
</style>
@endpush
