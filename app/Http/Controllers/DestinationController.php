<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120'
        ]);
        
        $validated['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.webp';
            $path = 'destinations/' . $filename;
            
            $img = Image::make($image)->encode('webp', 90);
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, $img);
            
            $validated['image'] = $path;
        }

        Destination::create($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120'
        ]);

        $validated['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            if ($destination->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($destination->image);
            }
            $image = $request->file('image');
            $filename = uniqid() . '.webp';
            $path = 'destinations/' . $filename;
            
            $img = Image::make($image)->encode('webp', 90);
            \Illuminate\Support\Facades\Storage::disk('public')->put($path, $img);
            
            $validated['image'] = $path;
        }

        $destination->update($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted.');
    }
}
