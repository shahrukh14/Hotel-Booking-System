
@extends('admin.app.app')
@section('title', 'Properties')
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-content-title-profile mb-20">
                <div class="main-content-title">
                    <h3>Add Properties Info</h3>
                </div>
            </div>
            <div class="recent-listing-area" style="background: rgb(235, 245, 220)">
                <div class="row">
                    <div class="col-md-12">
                        <form id="propertiesForm" action="{{ route('admin.store.properties') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Address <span>*</span></label>
                                    <input type="text" id="address" name="address" placeholder="Enter your Address" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-30">
                                    <label>Pets<span>*</span></label>
                                    <select id="pets" name="pets" class="form-control">
                                        <option value="1">Allowed</option>
                                        <option value="0">Not Allowed</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-inner mb-30">
                                    <label>House Rules <span>*</span></label>
                                    <div id="input-repeater">
                                        <div class="input-item d-flex">
                                        <input type="text" name="rules[]" placeholder="Enter rule" required>
                                        <button type="button" class="remove-item">X</button>
                                        </div>
                                    </div> <br>
                                    <button type="button" id="add-more">Add More</button>
                                </div>
                            </div>

                            <div class="row">
                                <label>Facilities</label>
                                <div class="col-md-6 form-inner mb-20 facility">
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="parking">Parking</div>
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="breakfast">Breakfast(Free)</div>
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="sauna">Sauna</div>
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="desk">Front Desk</div>
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="wifi">Free Wifi</div>
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="fitness">Fitness center</div>
                                    <div class="fac"><input type="checkbox" name="facilities[]" value="luggage">Luggage Storage</div>

                                    {{-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                        <label class="btn btn-outline-success" for="btncheck1">Sauna</label>

                                        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                        <label class="btn btn-outline-success" for="btncheck2">Checkbox 2</label>

                                        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                        <label class="btn btn-outline-success" for="btncheck3">Checkbox 3</label>
                                    </div> --}}
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Highlights <span>*</span></label>
                                    @php
                                        $highlightOptions = ['tv','heater','safe','wifi','phone','towels','dryer','laundry','ac'];
                                    @endphp
                                    <div class="facility">
                                    @foreach($highlightOptions as $highlight)
                                        <div class="fac">
                                            <input type="checkbox" name="highlights[]" value="{{ $highlight }}"> {{ ucfirst($highlight) }}
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Price<span>*</span></label>
                                    <input type="text" id="price" name="price" placeholder="Enter Price" required>
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Cleaning Price <span>*</span></label>
                                    <input type="text" id="cleaning_price" name="cleaning_price" placeholder="Enter Cleaning Price" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Images</label>
                                    <input type="file" id="images" name="images[]" multiple>
                                </div>
                                <div class="col-md-6 form-inner mb-20">
                                    <label>Location</label>
                                    <input type="text" id="location" name="location" placeholder="Enter Location">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-inner mb-20">
                                    <label>Description</label>
                                    <textarea name="description" id="description" rows="6"></textarea>
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