<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function dashboard() {
        $recentBookings = Booking::where('created_at', '>=', Carbon::now()->subMonth())->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.dashboard', compact('recentBookings'));
    }

    // Show inquiries in admin panel
    public function showInquiries() {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.inquiries', compact('inquiries'));
    }
    // Show properties in admin panel
    public function showProperties() {
        $properties = Property::orderBy('id', 'desc')->paginate(10);
        return view('admin.properties.list',compact('properties'));
    }
    //STORE PROPERTIES
    public function add()
    {
        return view('admin.properties.add');
    }
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'facilities' => 'required|array',
            'rules' => 'required|array',
            'highlights' => 'required|array',
            'pets' => 'required',
            'price' => 'required|numeric',
            'cleaning_price' => 'required|numeric',
            'images.*' => 'nullable|image',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Create new property
        $property = new Property();
        $property->name = $request->name;
        $property->address = $request->address;
        $property->facilities = $request->facilities;
        $property->rules = $request->rules;
        $property->highlights = $request->highlights;
        $property->pets = $request->pets;
        $property->price = $request->price;
        $property->cleaning_price = $request->cleaning_price;
        $property->location = $request->location;
        $property->bed_size = $request->bed_size;
        $property->description = $request->description;
        // file uploads
        $images = [];
        if($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $filename = time().'_'.uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path('properties'), $filename);
                $images[] = 'properties/'.$filename;
            }
        }
        $property->images = $images;
        $property->save();

        return redirect()->route('admin.properties')->with('success', 'Property added successfully!');
    }
    // Show edit form
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.edit', compact('property'));
    }

    // Update property
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'facilities' => 'required|array',
            'rules' => 'required|array',
            'highlights' => 'required|array',
            'pets' => 'required',
            'price' => 'required|numeric',
            'cleaning_price' => 'required|numeric',
            'images.*' => 'nullable|image',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $property = Property::findOrFail($id);

        $property->name = $request->name;
        $property->address = $request->address;
        $property->facilities = $request->facilities;
        $property->rules = $request->rules;
        $property->highlights = $request->highlights;
        $property->pets = $request->pets;
        $property->price = $request->price;
        $property->cleaning_price = $request->cleaning_price;
        $property->location = $request->location;
        $property->bed_size = $request->bed_size;
        $property->description = $request->description;

        // Upload images
       if($request->hasFile('images')) {
            // Delete old images from storage
            if($property->images) {
                foreach($property->images as $oldImage) {
                    $oldPath = public_path($oldImage);
                    if(file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
            // Upload new images
            $images = [];
            foreach($request->file('images') as $file){
                $filename = time().'_'.uniqid().'_'.$file->getClientOriginalName();
                $file->move(public_path('properties'), $filename);
                $images[] = 'properties/'.$filename;
            }
            $property->images = $images;
        }
        // If no new images, old images remain
        $property->save();
        return redirect()->route('admin.properties')->with('success', 'Property updated successfully!');
    }

    // Show bookings in admin panel
    public function showBookings() {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.bookings', compact('bookings'));
    }
    //booking status toggle
    public function toggleBookingStatus(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'column'     => 'required|in:status,booking_status',
        ]);

        $booking = Booking::findOrFail($request->booking_id);

        // Toggle the value
        $booking->{$request->column} = $booking->{$request->column} == 1 ? 0 : 1;
        $booking->save();

        return response()->json([
            'status' => 1,
            'new_value' => $booking->{$request->column}
        ]);
    }

    // view bookings in admin panel
    public function adminBookingView($id){
        $booking = Booking::findOrFail($id);
        return view('admin.pages.view', compact('booking'));
    }

    //REVIEWS LIST
    public function reviewList()
    {
        // Fetch all reviews with related property & user
        $reviews = Review::with(['property', 'user'])
            ->latest()
            ->paginate(10);

        return view('admin.review.list', compact('reviews'));
    }

    //review ststus button toggle
    public function toggleStatusAjax(Request $request)
    {
        $review = Review::find($request->id);
        if (!$review) {
            return response()->json(['error' => 'Review not found'], 404);
        }

        $review->status = $review->status == 1 ? 0 : 1;
        $review->save();

        return response()->json(['status' => $review->status]);
    }
    
}