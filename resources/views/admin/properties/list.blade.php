
@extends('admin.app.app')
@section('title', 'Properties')
@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="main-content-title-profile">
                <div class="main-content-title">
                    <h3>Properties Info</h3>
                </div>
                <div>
                    <a href="{{ route('admin.add.properties') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Property
                    </a>
                </div>
            </div>
            <div class="recent-listing-area">
                <div class="recent-listing-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Highlights</th>
                                <th>Facilities</th>
                                <th>Rules</th>
                                <th>Price</th>
                                {{-- <th>Pets</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $index => $property)
                            <tr>
                                <td class="text-wrap">{{ $index + 1 }}</td>
                                <td class="text-wrap">{{ $property->name }}</td>
                                <td class="text-wrap">{{ \Illuminate\Support\Str::limit($property->address, 10, '...') }}</td>
                                <td>
                                    @if($property->highlights)
                                        @php
                                            $highlightLabels = [
                                                'tv'      => 'TV',
                                                'parking' => 'Parking',
                                                'heater'  => 'Heater',
                                                'safe'    => 'Saving Safe',
                                                'wifi'    => 'Free Wifi',
                                                'phone'   => 'Phone',
                                                'towels'  => 'Towels',
                                                'dryer'   => 'Hair Dryer',
                                                'laundry' => 'Laundry',
                                                'ac'      => 'Air Conditioning',
                                            ];
                                            $highlights = array_map(fn($h) => $highlightLabels[$h] ?? $h, $property->highlights);
                                        @endphp
                                        {{ implode(', ', $highlights) }}
                                    @endif
                                </td>
                                <td>
                                   @if($property->facilities)
                                        @php
                                            $facilityLabels = [
                                                'parking'   => 'Parking',
                                                'desk'      => 'Front desk [24-hour]',
                                                'sauna'     => 'Sauna',
                                                'breakfast' => 'Breakfast [free]',
                                                'wifi'      => 'Free Wi-Fi in all rooms',
                                                'fitness'   => 'Fitness center',
                                                'luggage'   => 'Luggage storage',
                                            ];
                                            $facilities = array_map(fn($f) => $facilityLabels[$f] ?? $f, $property->facilities);
                                        @endphp
                                        {{ implode(', ', $facilities) }}
                                    @endif
                                </td>
                                <td>
                                    @if($property->rules)
                                        {{ implode(', ', $property->rules) }}
                                    @endif
                                </td>
                                <td>{{ $property->price }}</td>
                                {{-- <td>{{ $property->pets == 1 ? 'Allowed' : 'Not Allowed' }}</td> --}}
                                <td>
                                    <a href="{{route('admin.edit.properties', $property->id)}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-area">
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

