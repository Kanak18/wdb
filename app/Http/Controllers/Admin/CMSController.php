<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CMSPage;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = CMSPage::orderBy('key')->paginate(10);
        return view('admin.cms.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|max:255|unique:cms_pages',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        CMSPage::create($validated);

        return redirect()->route('admin.cms.index')->with('success', 'CMS page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = CMSPage::findOrFail($id);
        return view('admin.cms.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = CMSPage::findOrFail($id);
        return view('admin.cms.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $page = CMSPage::findOrFail($id);

        $validated = $request->validate([
            'key' => 'required|string|max:255|unique:cms_pages,key,' . $id,
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $page->update($validated);

        return redirect()->route('admin.cms.index')->with('success', 'CMS page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = CMSPage::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.cms.index')->with('success', 'CMS page deleted successfully.');
    }
}
