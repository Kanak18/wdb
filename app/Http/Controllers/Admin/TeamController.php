<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderBy('sort_order')->paginate(10);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:teams',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('team-photos', 'public');
            $validated['photo'] = $photo;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        Team::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'key' => 'required|string|max:255|unique:teams,key,' . $id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($team->photo && Storage::disk('public')->exists($team->photo)) {
                Storage::disk('public')->delete($team->photo);
            }
            $photo = $request->file('photo')->store('team-photos', 'public');
            $validated['photo'] = $photo;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);

        // Delete photo if exists
        if ($team->photo && Storage::disk('public')->exists($team->photo)) {
            Storage::disk('public')->delete($team->photo);
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
