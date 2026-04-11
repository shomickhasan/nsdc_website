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
        Schema::create('regestrations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id')->nullable();

            // Basic Information
            $table->string('email');
            $table->string('phone');
            $table->string('nid');
            $table->string('full_name_en');
            $table->string('full_name_bn');
            $table->string('father_name_en');
            $table->string('father_occupation')->nullable();
            $table->string('mother_name_en');
            $table->string('mother_occupation')->nullable();
            $table->string('sex');
            $table->date('date_of_birth');
            $table->string('pwd')->nullable();
            $table->string('religion');
            $table->string('blood_group');
            $table->string('marital_status')->nullable();
            $table->string('identity_no')->nullable();

            // Permanent Address
            $table->unsignedBigInteger('permanent_division_id')->nullable();
            $table->unsignedBigInteger('permanent_district_id')->nullable();
            $table->unsignedBigInteger('permanent_upazila_id')->nullable();
            $table->string('permanent_post_office');
            $table->string('permanent_area_type')->nullable();
            $table->string('permanent_address', 500);

            // Present Address
            $table->boolean('same_as_permanent')->default(false);
            $table->unsignedBigInteger('present_division_id')->nullable();
            $table->unsignedBigInteger('present_district_id')->nullable();
            $table->unsignedBigInteger('present_upazila_id')->nullable();
            $table->string('present_post_office');
            $table->string('present_address', 500);

            // Education
            $table->string('board_university')->nullable();
            $table->string('highest_education_level')->nullable();
            $table->string('highest_education_institute_name')->nullable();
            $table->string('highest_education_passing_year')->nullable();
            $table->string('tvet_certificate')->nullable();
            $table->string('ethnic_minority')->nullable();

            // Skill / Employment / Income
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('past_skill_training')->nullable();
            $table->string('employment_status_before_training')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();

            // Files
            $table->string('photo');
            $table->string('signature');

            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');

            $table->foreign('permanent_division_id')->references('id')->on('divisions')->nullOnDelete();
            $table->foreign('permanent_district_id')->references('id')->on('districts')->nullOnDelete();
            $table->foreign('permanent_upazila_id')->references('id')->on('upazilas')->nullOnDelete();

            $table->foreign('present_division_id')->references('id')->on('divisions')->nullOnDelete();
            $table->foreign('present_district_id')->references('id')->on('districts')->nullOnDelete();
            $table->foreign('present_upazila_id')->references('id')->on('upazilas')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regestrations');
    }
};
