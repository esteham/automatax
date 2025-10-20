<?php

namespace App\Http\Controllers\Taxpayer;

use App\Http\Controllers\Controller;
use App\Models\TaxpayerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $profile = TaxpayerProfile::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['first_name' => explode(' ', $request->user()->name)[0], 'last_name' => explode(' ', $request->user()->name)[1] ?? '']
        );

        return Inertia::render('Dashboard/Taxpayer/Profile', [
            'profile' => $profile
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['nullable','string','max:255'],
            'father_name' => ['nullable','string','max:255'],
            'mother_name' => ['nullable','string','max:255'],
            'spouse_name' => ['nullable','string','max:255'],
            'gender' => ['nullable','in:male,female,other'],
            'date_of_birth' => ['nullable','date'],
            'nid' => ['nullable','string','max:30'],
            'tin' => ['nullable','string','max:30'],
            'occupation' => ['nullable','string','max:120'],
            'alt_phone' => ['nullable','string','max:20'],

            'present_address_line' => ['nullable','string','max:255'],
            'present_division_id' => ['nullable','integer'],
            'present_district_id' => ['nullable','integer'],
            'present_upazila_id' => ['nullable','integer'],
            'present_union_id' => ['nullable','integer'],
            'present_post_code' => ['nullable','string','max:20'],

            'permanent_address_line' => ['nullable','string','max:255'],
            'permanent_division_id' => ['nullable','integer'],
            'permanent_district_id' => ['nullable','integer'],
            'permanent_upazila_id' => ['nullable','integer'],
            'permanent_union_id' => ['nullable','integer'],
            'permanent_post_code' => ['nullable','string','max:20'],

            'photo' => ['nullable','image','max:2048'],
            'nid_front' => ['nullable','image','max:2048'],
            'nid_back' => ['nullable','image','max:2048'],
            'utility_bill' => ['nullable','image','max:4096'],
        ]);

        $profile = TaxpayerProfile::firstOrCreate(['user_id' => $request->user()->id]);

        // file uploads
        foreach (['photo'=>'photo_path','nid_front'=>'nid_front_path','nid_back'=>'nid_back_path','utility_bill'=>'utility_bill_path'] as $input => $column) {
            if ($request->hasFile($input)) {
                $path = $request->file($input)->store("kyc/{$request->user()->id}", 'public');
                $data[$column] = $path;
            }
            unset($data[$input]);
        }

        $profile->update($data);

        return back()->with('success', 'Profile updated.');
    }
}
