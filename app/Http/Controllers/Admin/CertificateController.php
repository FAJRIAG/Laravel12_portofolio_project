<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageCompressionTrait;

class CertificateController extends Controller
{
    use ImageCompressionTrait;

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
        Log::info('1. Entering Certificate Store Method');

        try {
            $validated = $request->validate([
                'cert_title' => 'required|string|max:255', // Renamed from title to avoid conflict
                'title_id' => 'nullable|string|max:255',
                'title_ja' => 'nullable|string|max:255',
                'issuer' => 'required|string|max:255',
                'issuer_id' => 'nullable|string|max:255',
                'issuer_ja' => 'nullable|string|max:255',
                'issued_at' => 'required|date',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'credential_url' => 'nullable|url',
            ]);
            Log::info('2. Validation Passed', $validated);

            $data = $request->except(['image', 'cert_title']);
            $data['title'] = $request->cert_title; // Map cert_title to title

            if ($request->hasFile('image')) {
                Log::info('3. Image Detected - Processing Upload');
                // Use ImageCompressionTrait
                $data['image'] = $this->compressAndStore($request->file('image'), 'certificates');
                Log::info('4. Image Stored: ' . $data['image']);
            } else {
                Log::info('3. No Image Detected');
            }

            // Auto-translation Logic
            try {
                $tr = new \Stichoza\GoogleTranslate\GoogleTranslate();
                $tr->setSource('en');

                // Translate to Indonesian
                $tr->setTarget('id');
                if (empty($request->title_id) && $request->filled('cert_title')) {
                    $data['title_id'] = $tr->translate($request->cert_title);
                }
                if (empty($request->issuer_id) && $request->filled('issuer')) {
                    $data['issuer_id'] = $tr->translate($request->issuer);
                }

                // Translate to Japanese
                $tr->setTarget('ja');
                if (empty($request->title_ja) && $request->filled('cert_title')) {
                    $data['title_ja'] = $tr->translate($request->cert_title);
                }
                if (empty($request->issuer_ja) && $request->filled('issuer')) {
                    $data['issuer_ja'] = $tr->translate($request->issuer);
                }

            } catch (\Exception $e) {
                // Silent fail
                Log::warning('Translation failed: ' . $e->getMessage());
            }

            Log::info('5. Attempting to Create Certificate in DB', $data);
            $certificate = Certificate::create($data);
            Log::info('6. Certificate Created ID: ' . $certificate->id);

            return redirect()->route('admin.certificates.index')
                ->with('success', 'Certificate created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('VALIDATION FAILED: ' . json_encode($e->errors()));
            throw $e; // Let Laravel handle validation redirect
        } catch (\Exception $e) {
            Log::error('CRITICAL ERROR: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
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
            if (empty($request->title_id) && $request->filled('title')) {
                $data['title_id'] = $tr->translate($request->title);
            }
            if (empty($request->issuer_id) && $request->filled('issuer')) {
                $data['issuer_id'] = $tr->translate($request->issuer);
            }

            // Translate to Japanese
            $tr->setTarget('ja');
            if (empty($request->title_ja) && $request->filled('title')) {
                $data['title_ja'] = $tr->translate($request->title);
            }
            if (empty($request->issuer_ja) && $request->filled('issuer')) {
                $data['issuer_ja'] = $tr->translate($request->issuer);
            }

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
