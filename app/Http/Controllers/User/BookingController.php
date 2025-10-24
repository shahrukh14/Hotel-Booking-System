<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Carbon\Carbon;
use Exception;

class BookingController extends Controller
{
    public function bookingList(){
        $bookings = Booking::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(15);
        return view('users.booking.list', compact('bookings'));
    }
    public function booking(Request $request){
        try {
            $property = Property::findOrFail(1);

            $daterange = $request->input('daterange');
            // Split start and end
            [$start, $end] = explode(' - ', $daterange);

            $start_date = Carbon::createFromFormat('d-M-Y', trim($start));
            $end_date   = Carbon::createFromFormat('d-M-Y', trim($end));

            // Get difference in days (including both start and end dates)
            $days = $start_date->diffInDays($end_date) + 1;

            $start_date = $start_date->toDateString();
            $end_date   = $end_date->toDateString();

            //price calculation
            $price          = (int)$property->price * (int)$days;
            $cleaning_price = (int)$property->cleaning_price * (int)$days;
            $tax            = ($price * 18) / 100; //18% tax just for now, will make it dynamic later
            $discount       = ($price * 6) / 100; //6% discount just for now, will make it dynamic later
            $total          = ($price + $cleaning_price + $tax) - $discount;

            //Create new booking
            $booking                    = new Booking();
            $booking->user_id           = auth()->user()->id;
            $booking->property_id       = $property->id;
            $booking->date_range        = $request->daterange;
            $booking->start_date        = $start_date;
            $booking->end_date          = $end_date;
            $booking->duration          = $days;
            $booking->price             = $price;
            $booking->cleaning_price    = $cleaning_price;
            $booking->tax               = $tax;
            $booking->discount          = $discount;
            $booking->total             = $total;
            $booking->save();

            return redirect()->route('user.checkout', $booking->id);
        } catch (\Exception $ex) {
            return redirect()->back()->with($ex->getMessage());
        }
    }

    public function checkout(Booking $booking){
        return view('users.checkout', compact('booking')); 
    }

    public function bookingConfirm(Request $request){
        try {
            //save booking details
            $booking = Booking::findOrFail($request->booking_id);
            $booking->billing_info = json_encode($request->billing_info);
            $booking->save();
            return redirect()->route('user.checkout.session', $booking->id);
        } catch (\Exception $ex) {
            return redirect()->back()->with($ex->getMessage());
        }
    }
    
}
