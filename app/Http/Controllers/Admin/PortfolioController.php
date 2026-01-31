<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage

class PortfolioController extends Controller
{
    // Menampilkan daftar portofolio
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('admin.portfolios.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_id' => 'nullable|string|max:255',
            'title_ja' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_id' => 'nullable|string',
            'description_ja' => 'nullable|string',
            'link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar dan dapatkan path
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
        }

        // Auto-translation Logic
        try {
            $tr = new \Stichoza\GoogleTranslate\GoogleTranslate();
            $tr->setSource('en');

            // Translate to Indonesian
            $tr->setTarget('id');
            if (empty($request->title_id) && $request->filled('title')) {
                $validated['title_id'] = $tr->translate($request->title);
            }
            if (empty($request->description_id) && $request->filled('description')) {
                $validated['description_id'] = $tr->translate($request->description);
            }

            // Translate to Japanese
            $tr->setTarget('ja');
            if (empty($request->title_ja) && $request->filled('title')) {
                $validated['title_ja'] = $tr->translate($request->title);
            }
            if (empty($request->description_ja) && $request->filled('description')) {
                $validated['description_ja'] = $tr->translate($request->description);
            }

        } catch (\Exception $e) {
            // Silent fail
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan.');
    }

    // Menampilkan form edit data
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    // Mengupdate data
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_id' => 'nullable|string|max:255',
            'title_ja' => 'nullable|string|max:255',
            'description' => 'required|string',
            'description_id' => 'nullable|string',
            'description_ja' => 'nullable|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cek jika ada gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            // Upload gambar baru
            $validated['image'] = $request->file('image')->store('portfolio_images', 'public');
        }

        // Auto-translation Logic
        try {
            $tr = new \Stichoza\GoogleTranslate\GoogleTranslate();
            $tr->setSource('en');

            // Translate to Indonesian
            $tr->setTarget('id');
            if (empty($request->title_id) && $request->filled('title')) {
                $validated['title_id'] = $tr->translate($request->title);
            }
            if (empty($request->description_id) && $request->filled('description')) {
                $validated['description_id'] = $tr->translate($request->description);
            }

            // Translate to Japanese
            $tr->setTarget('ja');
            if (empty($request->title_ja) && $request->filled('title')) {
                $validated['title_ja'] = $tr->translate($request->title);
            }
            if (empty($request->description_ja) && $request->filled('description')) {
                $validated['description_ja'] = $tr->translate($request->description);
            }

        } catch (\Exception $e) {
            // Silent fail
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(Portfolio $portfolio)
    {
        // Hapus gambar dari storage
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus.');
    }
}