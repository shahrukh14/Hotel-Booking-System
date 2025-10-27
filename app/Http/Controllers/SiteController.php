<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Review;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }

    public function bookYourStay(){
        $properties = Property::get();

        // Define the same tokens used in the checkboxes so we can count matches
        $highlightTokens = ['tv','heater','safe','wifi','phone','towels','ac','dryer','laundry'];
        $facilityTokens = ['parking','desk','sauna','breakfast','wifi','fitness','luggage'];

        $highlightCounts = [];
        foreach ($highlightTokens as $token) {
            $highlightCounts[$token] = Property::whereJsonContains('highlights', $token)->count();
        }

        $facilityCounts = [];
        foreach ($facilityTokens as $token) {
            $facilityCounts[$token] = Property::whereJsonContains('facilities', $token)->count();
        }

        return view('pages.properties', compact('properties', 'highlightCounts', 'facilityCounts'));
    }

    public function filter(Request $request){
        $query = Property::query();

        if($request->search){
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // sanitize min/max price (strip non-numeric chars like $ and ,)
        $minPriceRaw = $request->min_price ?? null;
        $maxPriceRaw = $request->max_price ?? null;
        $minPrice = null;
        $maxPrice = null;
        if($minPriceRaw){
            $minPrice = floatval(preg_replace('/[^0-9\.]/', '', $minPriceRaw));
        }
        if($maxPriceRaw){
            $maxPrice = floatval(preg_replace('/[^0-9\.]/', '', $maxPriceRaw));
        }

        if(!is_null($minPrice) && !is_null($maxPrice)){
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }elseif(!is_null($minPrice)){
            $query->where('price', '>=', $minPrice);
        }elseif(!is_null($maxPrice)){
            $query->where('price', '<=', $maxPrice);
        }

        if(!empty($request->ratings)){
            $query->whereIn('ratings', $request->ratings);
        }

        // filter by facilities (JSON array column) - AND semantics
        if(!empty($request->facilities) && is_array($request->facilities)){
            foreach($request->facilities as $facility){
                $query->whereJsonContains('facilities', $facility);
            }
        }

        // filter by highlights (JSON array column) - AND semantics
        if(!empty($request->highlights) && is_array($request->highlights)){
            foreach($request->highlights as $amenity){
                $query->whereJsonContains('highlights', $amenity);
            }
        }

        $properties = $query->get();
        return view('pages.property_listing', compact('properties'));
    }

    public function checkAailability($id){
        $property = Property::find($id);
        $reviews = Review::where('property_id', $id)->orderBy('id','DESC')->get();
        return view('pages.book_your_stay', compact('property','reviews'));
    }

    public function faqs(){
        return view('pages.faqs');
    }

    public function gallery(){
        return view('pages.gallery');
    }

    public function contact(){
        return view('pages.contact');
    }
}
