@extends('users.app.app')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-content-title-profile mb-50">
                <div class="main-content-title">
                    <h3>Bookings </h3>
                </div>
            </div>
            <div class="recent-listing-area">
                <div class="recent-listing-table">
                    <table class="eg-table2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Transaction Id</th>
                                <th>User</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Timeline</th>
                                <th>Booking</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td data-label="Name">
                                        <div class="product-name">
                                            <div class="img">
                                                <img src="{{asset('assets/img/home1/package-card-img1.png')}}" alt="">
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="#">{{$booking->property->name}}</a></h6>
                                                <p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                        <path d="M8.99939 0C5.40484 0 2.48047 2.92437 2.48047 6.51888C2.48047 10.9798 8.31426 17.5287 8.56264 17.8053C8.79594 18.0651 9.20326 18.0646 9.43613 17.8053C9.68451 17.5287 15.5183 10.9798 15.5183 6.51888C15.5182 2.92437 12.5939 0 8.99939 0ZM8.99939 9.79871C7.19088 9.79871 5.71959 8.32739 5.71959 6.51888C5.71959 4.71037 7.19091 3.23909 8.99939 3.23909C10.8079 3.23909 12.2791 4.71041 12.2791 6.51892C12.2791 8.32743 10.8079 9.79871 8.99939 9.79871Z"></path>
                                                    </svg>
                                                    <span>{{$booking->property->address}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td data-label="User">{{$booking->user->name}}</td>
                                    <td data-label="Price">${{$booking->total}}</td>
                                    <td data-label="Status">
                                        @if ($booking->status == 0)
                                            <span class="pending">Pending</span>
                                        @elseif($booking->status == 1)
                                            <span class="confirmed">Confirmed</span>
                                        @else
                                            <span class="rejected">Cancel</span>
                                        @endif
                                    </td>
                                    <td data-label="Timeline">{{$booking->date_range}}</td>
                                    <td data-label="Booking">
                                        @if ($booking->booking_status == 0)
                                            <span class="pending">Pending</span>
                                        @elseif($booking->booking_status == 1)
                                            <span class="confirmed">Confirmed</span>
                                        @else
                                            <span class="rejected">Cancel</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('user.booking.view', $booking->id) }}" 
                                        class="btn btn-sm btn-outline-success" 
                                        title="View Booking">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Bookings Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div class="pagination-area">
                        <ul class="paginations">
                            <li class="page-item active">
                                <a href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#">3</a>
                            </li>
                        </ul>
                        <ul class="paginations-buttons">
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14" viewBox="0 0 7 14">
                                        <path d="M0 7.00008L7 0L2.54545 7.00008L7 14L0 7.00008Z"/>
                                    </svg>
                                    Prev
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14" viewBox="0 0 7 14" fill="none">
                                        <path d="M7 7.00008L0 0L4.45455 7.00008L0 14L7 7.00008Z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    {{ $bookings->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
