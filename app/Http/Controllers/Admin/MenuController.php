<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the menu items.
     */
    public function index()
    {
        // Get all items sorted by their order number
        $menuItems = MenuItem::orderBy('order', 'asc')->get();

        return view('admin.menu.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new menu item.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created menu item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'route'     => 'nullable|string|max:255',
            'url'       => 'nullable|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Default order to 0 if not provided
        $validated['order'] = $request->input('order', 0);

        // Ensure is_active is boolean (sometimes checkboxes send nothing if unchecked)
        $validated['is_active'] = $request->has('is_active');

        MenuItem::create($validated);

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success', 'Menu item created successfully.');
    }

    /**
     * Show the form for editing the specified menu item.
     */
    public function edit(MenuItem $menuItem)
    {
        return view('admin.menu.edit', compact('menuItem'));
    }

    /**
     * Update the specified menu item in storage.
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'route'     => 'nullable|string|max:255',
            'url'       => 'nullable|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        // Checkbox handling: if strictly unchecked in some forms it might need handling,
        // but 'boolean' rule + $request->has() or default hidden input covers it.
        // In the blade file, we used a hidden input for '0', so standard validation works well.

        $menuItem->update($validated);

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified menu item from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()
            ->route('admin.menu-items.index')
            ->with('success', 'Menu item deleted successfully.');
    }
}
