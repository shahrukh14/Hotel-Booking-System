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
        return view('pages.properties', compact('properties'));
    }

    public function filter(Request $request){
        $query = Property::query();

        if($request->search){
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if($request->min_price && $request->max_price){
            $query->whereBetween('price', [$request->min_price,$request->max_price]);
        }

        if(!empty($request->ratings)){
            $query->whereIn('ratings', $request->ratings);
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
