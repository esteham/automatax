<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxpayerProfile extends Model
{
    protected $fillable = [
        'user_id','full_name','father_name','mother_name','spouse_name','gender','date_of_birth',
        'nid','tin','occupation','alt_phone',
        'present_address_line','present_division_id','present_district_id','present_upazila_id','present_union_id','present_post_code',
        'permanent_address_line','permanent_division_id','permanent_district_id','permanent_upazila_id','permanent_union_id','permanent_post_code',
        'photo_path','nid_front_path','nid_back_path','utility_bill_path',
        'kyc_status','kyc_note','meta'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
