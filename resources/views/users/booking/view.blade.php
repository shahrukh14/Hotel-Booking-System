@extends('users.app.app')
@section('title', 'Booking Details')

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">

            <div class="main-content-title-profile">
                <div class="main-content-title">
                    <h3>Booking Details</h3>
                </div>
            </div>

            <div class="recent-listing-area">
                <div class="card p-4">
                    <!-- Shared Header -->
                    <h5>Booking #{{ $booking->id }}</h5>
                    <p><strong>User:</strong> {{ $booking->user->name }}</p>
                    <hr>

                    <!-- Flex Row: Left = Booking Details, Right = Billing Info -->
                    <div class="d-flex flex-row justify-content-between">
                        <!-- Left Column: Booking Details -->
                        <div class="booking-left" style="flex:1; margin-right:20px;">
                            <p><strong>Property:</strong> {{ $booking->property->name ?? 'N/A' }}</p>
                            <p><strong>Date Range:</strong> {{ $booking->date_range }}</p>
                            <p><strong>Duration:</strong> {{ $booking->duration }} Days</p>
                            <p><strong>Price:</strong> ₹{{ number_format($booking->price, 2) }}</p>
                            <p><strong>Cleaning Price:</strong> ₹{{ number_format($booking->cleaning_price, 2) }}</p>
                            <p><strong>Tax (18%):</strong> ₹{{ number_format($booking->tax, 2) }}</p>
                            <p><strong>Discount (6%):</strong> ₹{{ number_format($booking->discount, 2) }}</p>
                            <p><strong>Total:</strong> ₹{{ number_format($booking->total, 2) }}</p>
                            <p><strong>Payment Status:</strong> 
                                @if ($booking->status == 0)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($booking->status == 1)
                                    <span class="badge bg-success">Confirmed</span>
                                @endif
                            </p>
                            <p><strong>Booking Status:</strong> 
                                @if ($booking->booking_status == 0)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($booking->booking_status == 1)
                                    <span class="badge bg-success">Confirmed</span>
                                @endif
                            </p>
                        </div>

                        <!-- Right Column: Billing Info -->
                       @if($booking->billing_info)
                            <div class="billing-right" style="max-width:300px;">
                                <h5>Billing Information</h5>
                                <p><strong>Name:</strong> {{ ($booking->billing_info['first_name'] ?? '-') . ' ' . ($booking->billing_info['last_name'] ?? '') }}</p>
                                <p><strong>Email:</strong> {{ $booking->billing_info['email'] ?? '-' }}</p>
                                <p><strong>Mobile:</strong> {{ $booking->billing_info['phone'] ?? '-' }}</p>
                                <p><strong>Address:</strong> {{ $booking->billing_info['address'] ?? '-' }}</p>
                                <p><strong>Zip:</strong> {{ $booking->billing_info['zip_code'] ?? '-' }}</p>
                                <p><strong>Notes:</strong> {{ $booking->billing_info['note'] ?? '-' }}</p>
                            </div>
                        @endif
                    </div> <!-- End flex row -->

                </div> <!-- End card -->
            </div>

        </div>
    </div>
</div>
@endsection
