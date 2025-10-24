@extends('admin.layouts.layout')
@section('title', 'Reset Password')
@section('content')
<div class="banner3-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner3-content">
                    <h2>Reset Password</h2>
                    <p>Enter your password and confirm password</p>
                    <form action="{{ route('admin.update.password') }}" method="POST" autocomplete="off">
                         @error('password')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                        @error('password_confirmation')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    @csrf
                        <div class="from-inner">
                            <input type="password" name="password" placeholder="Enter Your password" autocomplete="off">
                        </div>
                        <div class="from-inner">
                            <input type="password" name="password_confirmation" placeholder="Re-enter Your password" autocomplete="off">
                        </div>
                        <button type="submit" class="primary-btn1">Reset</button>
                    </form>
                    <a href="{{ route('admin.forget.password') }}" class="forgetPassword">Forget Password ?</a>

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
