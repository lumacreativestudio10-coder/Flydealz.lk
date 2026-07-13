<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $packageCount = \App\Models\Package::count();
        $bookingCount = \App\Models\Booking::count();
        $destCount = \App\Models\Destination::count();
        
        $recentBookings = \App\Models\Booking::latest()->take(5)->get();
        $recentInquiries = \App\Models\Contact::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('packageCount', 'bookingCount', 'destCount', 'recentBookings', 'recentInquiries'));
    }
}
