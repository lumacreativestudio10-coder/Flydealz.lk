<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // API endpoint for frontend
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Your inquiry has been submitted successfully.'
        ]);
    }

    // Admin endpoint
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    // Update status
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:pending,resolved,dismissed'
        ]);

        $contact->update(['status' => $request->status]);

        return back()->with('success', 'Inquiry status updated.');
    }
}
