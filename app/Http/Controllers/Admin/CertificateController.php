<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest('issued_at')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_id' => 'nullable|string|max:255',
            'title_ja' => 'nullable|string|max:255',
            'issuer' => 'required|string|max:255',
            'issuer_id' => 'nullable|string|max:255',
            'issuer_ja' => 'nullable|string|max:255',
            'issued_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'credential_url' => 'nullable|url',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates', 'public');
            // Add full URL access for easy display if using default storage link
            $data['image'] = Storage::url($data['image']);
        }

        // Auto-translation Logic
        try {
            $tr = new \Stichoza\GoogleTranslate\GoogleTranslate();
            $tr->setSource('en');

            // Translate to Indonesian
            $tr->setTarget('id');
            $data['title_id'] = $tr->translate($request->title);
            $data['issuer_id'] = $tr->translate($request->issuer);

            // Translate to Japanese
            $tr->setTarget('ja');
            $data['title_ja'] = $tr->translate($request->title);
            $data['issuer_ja'] = $tr->translate($request->issuer);

        } catch (\Exception $e) {
            // Silent fail
        }

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_id' => 'nullable|string|max:255',
            'title_ja' => 'nullable|string|max:255',
            'issuer' => 'required|string|max:255',
            'issuer_id' => 'nullable|string|max:255',
            'issuer_ja' => 'nullable|string|max:255',
            'issued_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'credential_url' => 'nullable|url',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($certificate->image) {
                // Extract relative path from URL to delete
                $relativePath = str_replace('/storage/', '', $certificate->image);
                Storage::disk('public')->delete($relativePath);
            }
            $path = $request->file('image')->store('certificates', 'public');
            $data['image'] = Storage::url($path);
        }

        // Auto-translation Logic
        try {
            $tr = new \Stichoza\GoogleTranslate\GoogleTranslate();
            $tr->setSource('en');

            // Translate to Indonesian
            $tr->setTarget('id');
            $data['title_id'] = $tr->translate($request->title);
            $data['issuer_id'] = $tr->translate($request->issuer);

            // Translate to Japanese
            $tr->setTarget('ja');
            $data['title_ja'] = $tr->translate($request->title);
            $data['issuer_ja'] = $tr->translate($request->issuer);

        } catch (\Exception $e) {
            // Silent fail
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            $relativePath = str_replace('/storage/', '', $certificate->image);
            Storage::disk('public')->delete($relativePath);
        }
        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}
