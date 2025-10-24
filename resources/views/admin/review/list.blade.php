
@extends('admin.app.app')
@section('title', 'Reviews')
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-content-title-profile">
                <div class="main-content-title">
                    <h3>Reviews</h3>
                </div>
                <div>
                    {{-- <a href="{{ route('admin.add.properties') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Property
                    </a> --}}
                </div>
            </div>
            <div class="recent-listing-area">
                <div class="recent-listing-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Property</th>
                                <th>Reviewer</th>
                                <th>Email</th>
                                <th>Final Rating</th>
                                <th>Review</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reviews as $index => $review)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $review->property->name ?? 'N/A' }}</td>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>
                                        <span class="badge bg-white text-dark">
                                            ⭐ {{ number_format($review->final_rating, 1) }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            $words = explode(' ', $review->review);
                                            $shortReview = implode(' ', array_slice($words, 0, 5));
                                            $isLong = count($words) > 5;
                                        @endphp

                                        {{ $shortReview }}
                                        @if($isLong)
                                            ... <a href="javascript:void(0)" 
                                                class="text-primary read-more-link" 
                                                data-full-review="{{ e($review->review) }}">More</a>
                                        @endif
                                    </td>
                                    <td>{{ $review->created_at->format('d M Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm toggle-status-btn {{ $review->status == 1 ? 'btn-danger' : 'btn-success' }}"
                                                data-id="{{ $review->id }}">
                                            {{ $review->status == 1 ? 'Reject' : 'Approve' }}
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No reviews yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination-area">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">Full Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="reviewModalBody" style="white-space: pre-wrap;"></div>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
$(document).ready(function() {
    var modal = new bootstrap.Modal($('#reviewModal')[0]);

    $('.read-more-link').on('click', function() {
        var fullReview = $(this).data('full-review');
        $('#reviewModalBody').text(fullReview);
        modal.show();
    });

});

//status button
$(document).on('click', '.toggle-status-btn', function() {
    let button = $(this);
    let reviewId = button.data('id');

    $.ajax({
        url: "/admin/reviews/status",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: reviewId
        },
        success: function(response) {
            if(response.status === 1) {
                button.removeClass('btn-success').addClass('btn-danger').text('Reject');
            } else {
                button.removeClass('btn-danger').addClass('btn-success').text('Approve');
            }
        },
        error: function(xhr) {
            alert("Something went wrong while updating status!");
        }
    });
});
</script>
    
@endpush