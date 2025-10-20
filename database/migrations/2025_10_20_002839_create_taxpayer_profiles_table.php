<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('taxpayer_profiles', function (Blueprint $t) {
      $t->id();
      $t->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

      // Identity & personal
      $t->string('first_name');
      $t->string('last_name')->nullable();
      $t->string('father_name')->nullable();
      $t->string('mother_name')->nullable();
      $t->string('spouse_name')->nullable();
      $t->enum('gender', ['male','female','other'])->nullable();
      $t->date('date_of_birth')->nullable();
      $t->string('nid', 30)->nullable()->index();
      $t->string('tin', 30)->nullable();
      $t->string('occupation', 120)->nullable();

      // Contact
      $t->string('alt_phone', 20)->nullable();

      // Present address
      $t->string('present_address_line')->nullable();
      $t->unsignedBigInteger('present_division_id')->nullable();
      $t->unsignedBigInteger('present_district_id')->nullable();
      $t->unsignedBigInteger('present_upazila_id')->nullable();
      $t->unsignedBigInteger('present_union_id')->nullable();
      $t->string('present_post_code', 20)->nullable();

      // Permanent address
      $t->string('permanent_address_line')->nullable();
      $t->unsignedBigInteger('permanent_division_id')->nullable();
      $t->unsignedBigInteger('permanent_district_id')->nullable();
      $t->unsignedBigInteger('permanent_upazila_id')->nullable();
      $t->unsignedBigInteger('permanent_union_id')->nullable();
      $t->string('permanent_post_code', 20)->nullable();

      // KYC docs (store public disk paths)
      $t->string('photo_path')->nullable();
      $t->string('nid_front_path')->nullable();
      $t->string('nid_back_path')->nullable();
      $t->string('utility_bill_path')->nullable();

      // Verification state
      $t->enum('kyc_status', ['unverified','pending','verified','rejected'])->default('unverified');
      $t->text('kyc_note')->nullable();

      $t->json('meta')->nullable(); // extra flexible

      $t->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('taxpayer_profiles');
  }
};
