@extends('admin.app.app')
@section('title', 'Bookings')
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
                                        <button class="btn btn-sm toggle-status-btn {{ $booking->status == 1 ? 'btn-danger' : 'btn-success' }}" 
                                                data-id="{{ $booking->id }}" 
                                                data-column="status">
                                            {{ $booking->status == 1 ? 'Pending' : 'Confirm' }}
                                        </button>
                                    </td>
                                    <td data-label="Timeline">{{$booking->date_range}}</td>
                                    <td data-label="Booking">
                                        <button class="btn btn-sm toggle-status-btn {{ $booking->booking_status == 1 ? 'btn-danger' : 'btn-success' }}" 
                                                data-id="{{ $booking->id }}" 
                                                data-column="booking_status">
                                            {{ $booking->booking_status == 1 ? 'Pending' : 'Confirm' }}
                                        </button>
                                    </td>
                                    <td><a href="{{ route('admin.view.booking', $booking->id) }}" 
                                        class="btn btn-sm btn-outline-success" 
                                        title="View Booking">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" >No Bookings Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination-area">
                        <ul class="paginations">
                            @for ($i = 1; $i <= $bookings->lastPage(); $i++)
                                <li class="page-item {{ $bookings->currentPage() == $i ? 'active' : '' }}">
                                    <a href="{{ $bookings->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                        </ul>
                        <ul class="paginations-buttons">
                            <li>
                                @if ($bookings->onFirstPage())
                                    <span>
                                        <svg ...></svg>
                                        Prev
                                    </span>
                                @else
                                    <a href="{{ $bookings->previousPageUrl() }}">
                                        <svg ...></svg>
                                        Prev
                                    </a>
                                @endif
                            </li>
                            <li>
                                @if ($bookings->hasMorePages())
                                    <a href="{{ $bookings->nextPageUrl() }}">
                                        Next
                                        <svg ...></svg>
                                    </a>
                                @else
                                    <span>
                                        Next
                                        <svg ...></svg>
                                    </span>
                                @endif
                            </li>
                        </ul>
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
        $('.toggle-status-btn').click(function() {
            var button = $(this);
            var bookingId = button.data('id');
            var column = button.data('column');

            $.ajax({
                url: "{{ route('admin.booking.toggleStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    booking_id: bookingId,
                    column: column
                },
                success: function(response) {
                    if(response.status == 1){
                        // Toggle button text and class
                        if(column == 'status') {
                            button.text(response.new_value == 1 ? 'Pending' : 'Confirm');
                            button.toggleClass('btn-success btn-danger');
                        } else if(column == 'booking_status') {
                            button.text(response.new_value == 1 ? 'Pending' : 'Confirm');
                            button.toggleClass('btn-success btn-danger');
                        }
                    } else {
                        alert('Something went wrong!');
                    }
                }
            });
        });
    });
</script>
@endpush