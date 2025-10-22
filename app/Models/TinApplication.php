<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TinApplication extends Model
{
    protected $fillable = [
        'user_id',
        'taxpayer_profile_id',
        'application_number',
        'status',
        'notes',
        'circle',
        'zone',
        'assessment_year',
        'income',
        'source_of_income',
        'has_business',
        'business_name',
        'business_address',
        'business_type',
        'nid_copy_path',
        'photo_path',
        'bank_statement_path',
        'utility_bill_path',
        'other_documents_path',
        'submitted_at',
        'approved_at',
        'approved_by',
        'rejection_reason',
        'meta',
    ];

    protected $casts = [
        'has_business' => 'boolean',
        'income' => 'decimal:2',
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
        'meta' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function taxpayerProfile(): BelongsTo
    {
        return $this->belongsTo(TaxpayerProfile::class);
    }

    public function generateApplicationNumber(): string
    {
        return 'TIN-' . date('Y') . '-' . str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }
}
