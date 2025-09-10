<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('order')->orderBy('key')->get();
        $groupedSettings = $settings->groupBy('group');
        
        return view('admin.settings.index', compact('groupedSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $socialKeys = [
            'social_facebook',
            'social_instagram',
            'social_twitter',
            'social_x',
            'social_vk',
            'social_linkedin',
            'social_youtube',
            'social_github',
            'social_dribbble',
            'social_behance',
            'social_tiktok',
            'social_pinterest',
        ];

        $keyRules = ['required', 'string', 'max:255', Rule::unique('settings', 'key')];
        if ($request->input('group') === 'social') {
            $keyRules[] = Rule::in($socialKeys);
        }

        $request->validate([
            'key' => $keyRules,
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,url,boolean',
            'group' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::create([
            'key' => $request->key,
            'value' => $request->type === 'boolean' ? ($request->has('value') ? '1' : '0') : $request->value,
            'type' => $request->type,
            'group' => $request->group,
            'label' => $request->label,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        if ($request->type === 'image' && $request->hasFile('image')) {
            $setting->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $socialKeys = [
            'social_facebook',
            'social_instagram',
            'social_twitter',
            'social_x',
            'social_vk',
            'social_linkedin',
            'social_youtube',
            'social_github',
            'social_dribbble',
            'social_behance',
            'social_tiktok',
            'social_pinterest',
        ];

        $keyRules = ['required', 'string', 'max:255', Rule::unique('settings', 'key')->ignore($setting->id)];
        if ($request->input('group') === 'social') {
            $keyRules[] = Rule::in($socialKeys);
        }

        $request->validate([
            'key' => $keyRules,
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,url,boolean',
            'group' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting->update([
            'key' => $request->key,
            'value' => $request->type === 'boolean' ? ($request->has('value') ? '1' : '0') : $request->value,
            'type' => $request->type,
            'group' => $request->group,
            'label' => $request->label,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ]);

        if ($request->type === 'image' && $request->hasFile('image')) {
            $setting->clearMediaCollection('images');
            $setting->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->clearMediaCollection('images');
        $setting->delete();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully.');
    }

    /**
     * Update settings in bulk
     */
    public function bulkUpdate(Request $request)
    {
        $settings = $request->input('settings', []);

        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                if ($setting->type === 'boolean') {
                    $setting->update(['value' => $value ? '1' : '0']);
                } else {
                    $setting->update(['value' => $value]);
                }
            }
        }

        // Handle file uploads
        foreach ($request->allFiles() as $key => $file) {
            $setting = Setting::where('key', $key)->first();
            if ($setting && $setting->type === 'image') {
                $setting->clearMediaCollection('images');
                $setting->addMedia($file)->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
