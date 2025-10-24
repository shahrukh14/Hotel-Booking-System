<?php

namespace App\Http\Controllers;

 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\Property;
use App\Models\Booking;
use Carbon\Carbon;
use Exception;


class PaymentController extends Controller
{
    public function createCheckoutSession(Booking $booking){
        $property       = Property::findOrFail($booking->property_id);
        $start_date     = $booking->start_date;
        $end_date       = $booking->end_date;
        $days           = $booking->duration;
        $price          = (int)$booking->price;
        $cleaning_price = (int)$booking->cleaning_price;
        $tax            = (int)$booking->tax;
        $discount       = (int)$booking->discount;
        $total          = (int)$booking->total;

        // Stripe expect amount in paise
        $amountInPaise  = (int) round($total * 100);

        $stripe = new StripeClient(config('services.stripe.secret'));

        $session = $stripe->checkout->sessions->create([
            'mode'        => 'payment',
            'success_url' => route('user.payment.success',['booking_id' => $booking->id]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('user.payment.cancel', ['booking_id' => $booking->id]),
            // Optionally let Stripe email on receipt
            'customer_email' => auth()->check() ? auth()->user()->email : null,
            'billing_address_collection' => 'required',
            'line_items' => [[
                'quantity'   => 1,
                'price_data' => [
                    'currency'     => 'inr',
                    'unit_amount'  => $amountInPaise,
                    'product_data' => [
                        'name'        => 'Booking: ' . ($property->name ?? ('Property #'.$property->id)),
                        'description' => "Stay {$start_date} - {$end_date} ({$days} nights)\n"
                                       . "Base: ₹{$price}\nCleaning: ₹{$cleaning_price}\nTax: ₹{$tax}\nDiscount: -₹{$discount}",
                    ],
                ],
            ]],

            'metadata' => [
                'property_id' => (string) $property->id,
                'booking_id'  => ( string) $booking->id, 
                'user_id'     => (string) (auth()->id() ?? ''),
                'start_date'  => $start_date,
                'end_date'    => $end_date,
                'days'        => (string) $days,
                'base'        => (string) $price,
                'cleaning'    => (string) $cleaning_price,
                'tax'         => (string) $tax,
                'discount'    => (string) $discount,
                'total'       => (string) $total,
            ],
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request){
        $sessionId = $request->query('session_id');
        if (!$sessionId) abort(404);

        // get session is required
        // $stripe  = new StripeClient(config('services.stripe.secret'));
        // $session = $stripe->checkout->sessions->retrieve($sessionId);

        //update booking status
        $booking = Booking::findOrFail($request->booking_id);
        $booking->status = 1;
        $booking->save();
       
        return redirect()->route('user.dashboard')->with('success', 'Payment successful');
    }

    public function cancel(Request $request){
        $sessionId = $request->query('session_id');
        if (!$sessionId) abort(404);

        //update booking status
        $booking = Booking::findOrFail($request->booking_id);
        $booking->status = 2;
        $booking->save();
        return redirect()->route('user.dashboard')->with('error', 'Payment failed');
    }
}
