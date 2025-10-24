
@extends('admin.app.app')
@section('title', 'Inquires')
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-content-title-profile mb-50">
                <div class="main-content-title">
                    <h3>Inquiry Info</h3>
                </div>
            </div>
            <div class="recent-listing-area">
                <div class="recent-listing-table">
                    <table class="eg-table2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inquiries as $inquiry)
                            <tr>
                                <td data-label="Name">
                                    <div class="product-name">
                                        <div class="product-content">
                                            <h6>{{ $inquiry->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Email">{{ $inquiry->email }}</td>
                                <td data-label="Phone">{{ $inquiry->phone }}</td>
                                <td data-label="Message">
                                    <span>
                                            {{ \Illuminate\Support\Str::words($inquiry->message, 10, ' ...') }}
                                    </span>
                                    <button type="button" class="btn btn-link p-1" data-bs-toggle="modal" data-bs-target="#messageModal{{ $inquiry->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="messageModal{{ $inquiry->id }}" tabindex="1" aria-labelledby="messageModalLabel{{ $inquiry->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="messageModalLabel{{ $inquiry->id }}">Full Message</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    {{ $inquiry->message }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Date">{{ $inquiry->created_at->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-area">
                        {{ $inquiries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

