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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactInquiry::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon.');
    }
}
