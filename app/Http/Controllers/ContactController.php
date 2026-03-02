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
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'city'       => 'nullable|string|max:255',
            'message'    => 'required|string',
        ]);

        try {
            ContactInquiry::create([
                'name'    => $validated['first_name'] . ' ' . $validated['last_name'],
                'email'   => $validated['email'],
                'subject' => $validated['city'] ?? '',
                'message' => $validated['message'],
            ]);            

            return response()->json(['success' => true]);            

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
