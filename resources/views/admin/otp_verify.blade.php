@extends('admin.layouts.layout')
@section('title', 'OTP verify')
@section('content')
<div class="banner3-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner3-content">
                    <h2>OTP Verify</h2>
                    <p>Enter the 4 digit OTP sent to your registerd email address</p>
                    <form action="{{ route('admin.otp.check') }}" method="POST" autocomplete="off">
                    @csrf
                        <div class="from-inner">
                            <input type="number" name="otp" placeholder="Enter OTP" autocomplete="off">
                        </div>
                        <button type="submit" class="primary-btn1">Verify</button>
                    </form>
                    <a href="{{ route('admin.login') }}" class="forgetPassword">Login ?</a>

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
