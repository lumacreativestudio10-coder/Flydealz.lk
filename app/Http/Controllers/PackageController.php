<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Destination;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('destination')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.packages.create', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'destination_id' => 'required|exists:destinations,id',
            'departure_location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        Package::create($request->all());
        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        $destinations = Destination::all();
        return view('admin.packages.edit', compact('package', 'destinations'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'destination_id' => 'required|exists:destinations,id',
            'departure_location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string'
        ]);

        $package->update($request->all());
        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted.');
    }
}
