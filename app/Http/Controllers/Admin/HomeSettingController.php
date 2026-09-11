<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function index()
    {
        $home = HomeSetting::first();

        if (!$home) {
            return redirect()->route('admin.home-settings.create');
        }

        return view('admin.home-settings.index', compact('home'));
    }

    public function create()
    {
        $home = null;

        return view('admin.home-settings.create', compact('home'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hero_location' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'string', 'max:255'],

            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'rating_text' => ['nullable', 'string', 'max:255'],

            'highlights_tag' => ['nullable', 'string', 'max:255'],
            'highlights_title' => ['nullable', 'string', 'max:255'],

            'highlight_1_title' => ['nullable', 'string', 'max:255'],
            'highlight_1_description' => ['nullable', 'string'],

            'highlight_2_title' => ['nullable', 'string', 'max:255'],
            'highlight_2_description' => ['nullable', 'string'],

            'highlight_3_title' => ['nullable', 'string', 'max:255'],
            'highlight_3_description' => ['nullable', 'string'],

            'rooms_tag' => ['nullable', 'string', 'max:255'],
            'rooms_title' => ['nullable', 'string', 'max:255'],
            'rooms_description' => ['nullable', 'string'],
        ]);

        HomeSetting::create($validated);

        return redirect()
            ->route('admin.home-settings.index')
            ->with('success', 'Home settings created successfully.');
    }

    public function edit(HomeSetting $homeSetting)
    {
        $home = $homeSetting;

        return view('admin.home-settings.edit', compact('home'));
    }

    public function update(Request $request, HomeSetting $homeSetting)
    {
        $validated = $request->validate([
            'hero_location' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_description' => ['nullable', 'string'],
            'hero_image' => ['nullable', 'string', 'max:255'],

            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'rating_text' => ['nullable', 'string', 'max:255'],

            'highlights_tag' => ['nullable', 'string', 'max:255'],
            'highlights_title' => ['nullable', 'string', 'max:255'],

            'highlight_1_title' => ['nullable', 'string', 'max:255'],
            'highlight_1_description' => ['nullable', 'string'],

            'highlight_2_title' => ['nullable', 'string', 'max:255'],
            'highlight_2_description' => ['nullable', 'string'],

            'highlight_3_title' => ['nullable', 'string', 'max:255'],
            'highlight_3_description' => ['nullable', 'string'],

            'rooms_tag' => ['nullable', 'string', 'max:255'],
            'rooms_title' => ['nullable', 'string', 'max:255'],
            'rooms_description' => ['nullable', 'string'],
        ]);

        $homeSetting->update($validated);

        return redirect()
            ->route('admin.home-settings.index')
            ->with('success', 'Home settings updated successfully.');
    }

    public function destroy(HomeSetting $homeSetting)
    {
        $homeSetting->delete();

        return redirect()
            ->route('admin.home-settings.index')
            ->with('success', 'Home settings deleted successfully.');
    }
}
