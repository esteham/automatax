<?php

namespace App\Http\Controllers\Taxpayer;

use App\Http\Controllers\Controller;
use App\Models\TinApplication;
use App\Models\TaxpayerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class TinApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $applications = TinApplication::where('user_id', $request->user()->id)
            ->with('taxpayerProfile')
            ->orderBy('created_at', 'desc')
            ->get();

        $hasSubmitted = $applications->contains('status', 'submitted');

        return Inertia::render('Dashboard/Taxpayer/TinApplications/Index', [
            'applications' => $applications,
            'hasSubmitted' => $hasSubmitted
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $profile = TaxpayerProfile::where('user_id', $request->user()->id)->first();

        // Check if profile has NID
        if (!$profile || !$profile->nid) {
            return Inertia::render('Dashboard/Taxpayer/Index', [
                'error' => 'Update your profile first. NID is required for TIN application.'
            ]);
        }

        // Check if user has already submitted an application
        $existingSubmitted = TinApplication::where('user_id', $request->user()->id)
            ->where('status', 'submitted')
            ->exists();

        if ($existingSubmitted) {
            return redirect()->route('taxpayer.tin-applications.index')
                ->with('error', 'You have already submitted a TIN application. You can only apply once.');
        }

        $application = TinApplication::firstOrCreate(
            ['user_id' => $request->user()->id, 'status' => 'draft'],
            [
                'taxpayer_profile_id' => $profile->id,
                'application_number' => 'DRAFT-' . $request->user()->id . '-' . time(),
            ]
        );

        return Inertia::render('Dashboard/Taxpayer/TinApplications/Create', [
            'application' => $application->load('taxpayerProfile'),
            'profile' => $profile,
            'user' => $request->user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profile = TaxpayerProfile::where('user_id', $request->user()->id)->first();

        if (!$profile || !$profile->nid) {
            throw ValidationException::withMessages([
                'nid' => 'NID is required for TIN application. Please update your profile first.'
            ]);
        }

        $data = $request->validate([
            'circle' => ['required', 'string', 'max:255'],
            'zone' => ['required', 'string', 'max:255'],
            'assessment_year' => ['required', 'string', 'max:10'],
            'income' => ['required', 'numeric', 'min:0'],
            'source_of_income' => ['required', 'string', 'max:255'],
            'has_business' => ['boolean'],
            'business_name' => ['nullable', 'required_if:has_business,true', 'string', 'max:255'],
            'business_address' => ['nullable', 'required_if:has_business,true', 'string', 'max:255'],
            'business_type' => ['nullable', 'required_if:has_business,true', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:1000'],

            // File uploads
            'photo' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'bank_statement' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
            'utility_bill' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
            'other_documents' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:5120'],
        ]);

        $application = new TinApplication();
        $application->user_id = $request->user()->id;
        $application->taxpayer_profile_id = $profile->id;
        $application->status = 'submitted';
        $application->submitted_at = now();

        // Generate application number
        $application->save(); // Save first to get ID
        $application->application_number = $application->generateApplicationNumber();
        $application->save();

        // Handle file uploads
        $files = ['photo', 'bank_statement', 'utility_bill', 'other_documents'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $path = $request->file($file)->store("tin-applications/{$application->id}", 'public');
                $column = $file . '_path';
                $application->$column = $path;
            }
        }

        $application->fill($data);
        $application->save();

        return redirect()->route('taxpayer.tin-applications.index')->with('success', 'TIN application submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TinApplication $tinApplication)
    {
        $this->authorize('view', $tinApplication);

        return Inertia::render('Dashboard/Taxpayer/TinApplications/Show', [
            'application' => $tinApplication->load('taxpayerProfile', 'user')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TinApplication $tinApplication)
    {
        $this->authorize('update', $tinApplication);

        if ($tinApplication->status !== 'draft') {
            return redirect()->route('taxpayer.tin-applications.show', $tinApplication)
                ->with('error', 'Only draft applications can be edited.');
        }

        return Inertia::render('Dashboard/Taxpayer/TinApplications/Edit', [
            'application' => $tinApplication->load('taxpayerProfile')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TinApplication $tinApplication)
    {
        $this->authorize('update', $tinApplication);

        if ($tinApplication->status !== 'draft') {
            throw ValidationException::withMessages([
                'status' => 'Only draft applications can be updated.'
            ]);
        }

        $data = $request->validate([
            'circle' => ['nullable', 'string', 'max:255'],
            'zone' => ['nullable', 'string', 'max:255'],
            'assessment_year' => ['nullable', 'string', 'max:10'],
            'income' => ['nullable', 'numeric', 'min:0'],
            'source_of_income' => ['nullable', 'string', 'max:255'],
            'has_business' => ['boolean'],
            'business_name' => ['nullable', 'required_if:has_business,true', 'string', 'max:255'],
            'business_address' => ['nullable', 'string', 'max:255'],
            'business_type' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:1000'],

            // File uploads
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'bank_statement' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
            'utility_bill' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
            'other_documents' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx', 'max:5120'],
        ]);

        // Handle file uploads
        $files = ['photo', 'bank_statement', 'utility_bill', 'other_documents'];
        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                // Delete old file if exists
                if ($tinApplication->{$file . '_path'}) {
                    Storage::disk('public')->delete($tinApplication->{$file . '_path'});
                }
                $path = $request->file($file)->store("tin-applications/{$tinApplication->id}", 'public');
                $data[$file . '_path'] = $path;
            }
        }

        $tinApplication->update($data);

        return redirect()->route('taxpayer.tin-applications.index')->with('success', 'TIN application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinApplication $tinApplication)
    {
        $this->authorize('delete', $tinApplication);

        if ($tinApplication->status !== 'draft') {
            return redirect()->back()->with('error', 'Only draft applications can be deleted.');
        }

        // Delete associated files
        $files = ['photo_path', 'bank_statement_path', 'utility_bill_path', 'other_documents_path'];
        foreach ($files as $file) {
            if ($tinApplication->$file) {
                Storage::disk('public')->delete($tinApplication->$file);
            }
        }

        $tinApplication->delete();

        return redirect()->route('taxpayer.tin-applications.index')->with('success', 'TIN application deleted successfully.');
    }
}
