<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->is_active) && $request->is_active == 'on') {
            $request['is_active'] = true;
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website_url' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $client = Client::create($validated);

        if ($request->hasFile('logo')) {
            $client->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        if (isset($request->is_active) && $request->is_active == 'on') {
            $request['is_active'] = true;
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website_url' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $client->update($validated);

        if ($request->hasFile('logo')) {
            // Delete old media
            $client->clearMediaCollection('logo');

            // Add new media
            $client->addMediaFromRequest('logo')
                ->toMediaCollection('logo');
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Delete associated media
        $client->clearMediaCollection('logo');

        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
