
@extends('admin.app.app')
@section('title', 'Properties')
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-content-title-profile mb-20">
                <div class="main-content-title">
                    <h3>Edit Properties Info</h3>
                </div>
            </div>
            <div class="recent-listing-area" style="background: rgb(235, 245, 220)">
                <div class="row">
                    <div class="col-md-12">
                        <form id="propertiesForm" action="{{ route('admin.update.properties',$property->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $property->name) }}">
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Address <span>*</span></label>
                                    <input type="text" id="address" name="address" value="{{ old('address', $property->address) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-30">
                                    <label>Pets<span>*</span></label>
                                    <select id="pets" name="pets" class="form-control">
                                        <option value="1" {{ $property->pets ? 'selected' : '' }}>Allowed</option>
                                        <option value="0" {{ !$property->pets ? 'selected' : '' }}>Not Allowed</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-inner mb-30">
                                    <label>House Rules <span>*</span></label>
                                    <div id="input-repeater">
                                        @foreach($property->rules ?? [] as $rule)
                                        <div class="input-item d-flex">
                                            <input type="text" name="rules[]" value="{{ $rule }}" placeholder="Enter rule" required>
                                            <button type="button" class="remove-item">X</button>
                                        </div>
                                        @endforeach
                                    </div> <br>
                                    <button type="button" id="add-more">Add More</button>
                                </div>
                            </div>

                            <div class="row">
                                <label>Facilities</label>
                                <div class="col-md-6 form-inner mb-20 facility">
                                    @php
                                        $facilityOptions = ['parking','breakfast','sauna','desk','wifi','fitness','luggage'];
                                    @endphp
                                    @foreach($facilityOptions as $fac)
                                        <div class="fac">
                                            <input type="checkbox" name="facilities[]" value="{{ $fac }}" {{ in_array($fac, $property->facilities ?? []) ? 'checked' : '' }}>
                                            {{ ucfirst($fac) }}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Highlights <span>*</span></label>
                                    @php
                                        $highlightOptions = ['tv','heater','safe','wifi','phone','towels','dryer','laundry','ac'];
                                    @endphp
                                    <div class="facility">
                                    @foreach($highlightOptions as $highlight)
                                        <div class="fac">
                                            <input type="checkbox" name="highlights[]" value="{{ $highlight }}" {{ in_array($highlight, $property->highlights ?? []) ? 'checked' : '' }}>
                                            {{ ucfirst($highlight) }}
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Price<span>*</span></label>
                                    <input type="text" id="price" name="price" value="{{ old('price', $property->price) }}" required>
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Cleaning Price <span>*</span></label>
                                    <input type="text" id="cleaning_price" name="cleaning_price" value="{{ old('cleaning_price', $property->cleaning_price) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Upload New Images</label>
                                    <input type="file" id="images" name="images[]" multiple>
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Location</label>
                                    <input type="text" id="location" name="location" value="{{ old('location', $property->location) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Bed Size</label>
                                    <input type="text" id="bed_size" name="bed_size" value="{{ old('bed_size', $property->bed_size) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-inner mb-20">
                                    <label>Description</label>
                                    <textarea name="description" id="description" rows="6">{{ old('description', $property->description) }}</textarea>
                                </div>
                            </div>
                            <div class="form-inner">
                                <button type="submit" class="primary-btn1 two">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
    const addMoreBtn = document.getElementById('add-more');
    const repeater = document.getElementById('input-repeater');

    addMoreBtn.addEventListener('click', () => {
        const newItem = document.createElement('div');
        newItem.className = 'input-item d-flex';
        newItem.innerHTML = `
        <input type="text" name="rules[]" placeholder="Enter rule" required>
        <button type="button" class="remove-item">X</button>
        `;
        repeater.appendChild(newItem);
    });

    repeater.addEventListener('click', (e) => {
        if (e.target && e.target.classList.contains('remove-item')) {
        e.target.parentNode.remove();
        }
    });

    </script>
@endpush

{{-- @push('style') --}}
<style>
   .facility {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    .fac{
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>
{{-- @endpush --}}