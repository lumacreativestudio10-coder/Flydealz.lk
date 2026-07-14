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
        $inquiryCount = \App\Models\Contact::count();
        
        $recentBookings = \App\Models\Booking::latest()->take(5)->get();
        $recentInquiries = \App\Models\Contact::latest()->take(5)->get();
        
        // Data for Doughnut Chart (Bookings by Status)
        $bookingsByStatus = [
            'Confirmed' => \App\Models\Booking::where('status', 'confirmed')->count(),
            'Pending' => \App\Models\Booking::where('status', 'pending')->count(),
            'Cancelled' => \App\Models\Booking::where('status', 'cancelled')->count(),
        ];

        // Data for Line Chart (Bookings Last 7 Days)
        $chartDates = collect();
        $chartData = collect();
        
        for ($i = 6; $i >= 0; $i--) {
            $date = \Carbon\Carbon::now()->subDays($i);
            $chartDates->push($date->format('M d'));
            $chartData->push(\App\Models\Booking::whereDate('created_at', $date->format('Y-m-d'))->count());
        }
        
        return view('admin.dashboard', compact(
            'packageCount', 'bookingCount', 'destCount', 'inquiryCount', 
            'recentBookings', 'recentInquiries',
            'bookingsByStatus', 'chartDates', 'chartData'
        ));
    }
}
