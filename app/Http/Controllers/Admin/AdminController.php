<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard'); 
    }

    // Show inquiries in admin panel
    public function showInquiries() {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.inquiries', compact('inquiries'));
    }

    // Show bookings in admin panel
    public function showBookings() {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.bookings', compact('bookings'));
    }
}
