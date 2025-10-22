<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tin_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('taxpayer_profile_id')->constrained('taxpayer_profiles')->cascadeOnDelete();

            // Application details
            $table->string('application_number')->unique();
            $table->enum('status', ['draft', 'submitted', 'under_review', 'approved', 'rejected'])->default('draft');
            $table->text('notes')->nullable();

            // TIN application specific fields (based on Bangladesh TIN requirements)
            $table->string('circle')->nullable(); // Tax circle
            $table->string('zone')->nullable(); // Tax zone
            $table->string('assessment_year')->nullable();
            $table->decimal('income', 15, 2)->nullable();
            $table->string('source_of_income')->nullable();
            $table->boolean('has_business')->default(false);
            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('business_type')->nullable();

            // Supporting documents
            $table->string('nid_copy_path')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('bank_statement_path')->nullable();
            $table->string('utility_bill_path')->nullable();
            $table->string('other_documents_path')->nullable();

            // Approval details
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('approved_by')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->json('meta')->nullable(); // For additional flexible data

            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('application_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_applications');
    }
};
