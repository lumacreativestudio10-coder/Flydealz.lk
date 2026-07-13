<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('package')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,cancelled']);
        $booking->update(['status' => $request->status]);
        return redirect()->route('bookings.index')->with('success', 'Booking status updated.');
    }

    // API endpoint for frontend
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'home_address' => 'required|string|max:255',
            'flight_type' => 'nullable|string|max:20',
            'departure_location' => 'required|string|max:255',
            'destination_location' => 'required|string|max:255',
            'travel_date' => 'required|date',
            'return_date' => 'nullable|date',
            'passengers' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        $booking = Booking::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Booking request submitted successfully.'
        ]);
    }
}
