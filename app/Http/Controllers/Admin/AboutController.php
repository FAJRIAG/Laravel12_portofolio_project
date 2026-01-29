<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        if (!$about) {
            $about = About::create([
                'title' => 'Halo, saya JriDev.',
                'description' => 'Deskripsi default.',
                'image' => null,
            ]);
        }
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'page_title' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'logo_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = About::first();

        $data = [
            'page_title' => $request->page_title,
            'title' => $request->title,
            'description' => $request->description,
            'hero_title' => $request->hero_title,
            'hero_description' => $request->hero_description,
            'logo_text' => $request->logo_text,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Profile updated successfully.');
    }
}
