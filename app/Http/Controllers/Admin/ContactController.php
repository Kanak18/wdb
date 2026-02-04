<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = ContactInquiry::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact.index', compact('inquiries'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        
        // Mark as read
        if (!$inquiry->is_read) {
            $inquiry->update(['is_read' => true]);
        }
        
        return view('admin.contact.show', compact('inquiry'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Contact inquiry deleted successfully.');
    }

    /**
     * Mark inquiry as read/unread.
     */
    public function toggleRead(Request $request, string $id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $inquiry->update(['is_read' => !$inquiry->is_read]);

        return redirect()->route('admin.contact.index')->with('success', 'Status updated successfully.');
    }
}
