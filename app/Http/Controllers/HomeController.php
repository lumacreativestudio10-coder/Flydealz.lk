<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packages = Package::where('status', 'active')->get();
        
        // Fetch exactly 3 destinations: prioritizing 'is_popular', then latest.
        $destinations = Destination::orderByDesc('is_popular')
                                   ->latest()
                                   ->take(3)
                                   ->get();

        return view('pages.home', compact('packages', 'destinations'));
    }
}
