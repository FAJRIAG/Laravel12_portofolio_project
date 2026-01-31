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
            'title_id' => 'nullable|string|max:255',
            'title_ja' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_id' => 'nullable|string',
            'description_ja' => 'nullable|string',
            'page_title' => 'nullable|string|max:255',
            'page_title_id' => 'nullable|string|max:255',
            'page_title_ja' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_title_id' => 'nullable|string|max:255',
            'hero_title_ja' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_description_id' => 'nullable|string',
            'hero_description_ja' => 'nullable|string',
            'logo_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = About::first();

        $data = [
            'page_title' => $request->page_title,
            'page_title_id' => $request->page_title_id,
            'page_title_ja' => $request->page_title_ja,
            'title' => $request->title,
            'title_id' => $request->title_id,
            'title_ja' => $request->title_ja,
            'description' => $request->description,
            'description_id' => $request->description_id,
            'description_ja' => $request->description_ja,
            'hero_title' => $request->hero_title,
            'hero_title_id' => $request->hero_title_id,
            'hero_title_ja' => $request->hero_title_ja,
            'hero_description' => $request->hero_description,
            'hero_description_id' => $request->hero_description_id,
            'hero_description_ja' => $request->hero_description_ja,
            'logo_text' => $request->logo_text,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Auto-translation Logic
        try {
            $tr = new \Stichoza\GoogleTranslate\GoogleTranslate();
            $tr->setSource('en');

            // Translate to Indonesian
            $tr->setTarget('id');
            $data['page_title_id'] = $tr->translate($request->page_title);
            $data['title_id'] = $tr->translate($request->title);
            $data['description_id'] = $tr->translate($request->description);
            $data['hero_title_id'] = $tr->translate($request->hero_title);
            $data['hero_description_id'] = $tr->translate($request->hero_description);

            // Translate to Japanese
            $tr->setTarget('ja');
            $data['page_title_ja'] = $tr->translate($request->page_title);
            $data['title_ja'] = $tr->translate($request->title);
            $data['description_ja'] = $tr->translate($request->description);
            $data['hero_title_ja'] = $tr->translate($request->hero_title);
            $data['hero_description_ja'] = $tr->translate($request->hero_description);

        } catch (\Exception $e) {
            // Log error or just continue with original/empty values if translation fails
            // For now we just silently fail/continue to ensure data is saved at least in EN
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Profile updated successfully.');
    }
}
