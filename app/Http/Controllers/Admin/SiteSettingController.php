<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();

        if (!$settings) {
            return redirect()->route('admin.site-settings.create');
        }

        return view('admin.site-settings.index', compact('settings'));
    }

    public function create()
    {
        $settings = null;

        return view('admin.site-settings.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_tagline' => ['nullable', 'string', 'max:255'],

            'footer_description' => ['nullable', 'string'],
            'footer_navigate_title' => ['nullable', 'string', 'max:255'],
            'footer_visit_title' => ['nullable', 'string', 'max:255'],

            'address' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],

            'copyright_text' => ['nullable', 'string', 'max:255'],

            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
        ]);

        SiteSetting::create($validated);

        return redirect()
            ->route('admin.site-settings.index')
            ->with('success', 'Site settings created successfully.');
    }

    public function edit(SiteSetting $siteSetting)
    {
        $settings = $siteSetting;

        return view('admin.site-settings.edit', compact('settings'));
    }

    public function update(Request $request, SiteSetting $siteSetting)
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_tagline' => ['nullable', 'string', 'max:255'],

            'footer_description' => ['nullable', 'string'],
            'footer_navigate_title' => ['nullable', 'string', 'max:255'],
            'footer_visit_title' => ['nullable', 'string', 'max:255'],

            'address' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],

            'copyright_text' => ['nullable', 'string', 'max:255'],

            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'twitter_url' => ['nullable', 'url', 'max:255'],
        ]);

        $siteSetting->update($validated);

        return redirect()
            ->route('admin.site-settings.index')
            ->with('success', 'Site settings updated successfully.');
    }

    public function destroy(SiteSetting $siteSetting)
    {
        $siteSetting->delete();

        return redirect()
            ->route('admin.site-settings.index')
            ->with('success', 'Site settings deleted successfully.');
    }
}
