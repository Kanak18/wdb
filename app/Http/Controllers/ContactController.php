<?php

namespace App\Http\Controllers;

use App\Models\CMSPage;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        $page = CMSPage::where('key', 'contact')->where('is_active', true)->first();
        return view('frontend.contact', compact('page'));
    }

    /**
     * Handle the contact form submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Combine first_name and last_name for name field
        $validated['name'] = $validated['first_name'] . ' ' . $validated['last_name'];
        
        // Map city to subject (as per original schema)
        $validated['subject'] = $validated['city'] ?? '';
        
        // Remove the separate fields
        unset($validated['first_name'], $validated['last_name'], $validated['city']);

        ContactInquiry::create($validated);

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
