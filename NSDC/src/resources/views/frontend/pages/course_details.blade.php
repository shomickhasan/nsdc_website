@extends('frontend.template.template')

@section('ftitle', $course->title . ' | NSDC - National Skills Development Corporation')

@section('header')
    @include('frontend.includes.header_two')
@endsection

@push('css')
    <style>
        /* General Page Styling */
        .course-detail-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .course-detail-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #242F6F;
        }

        .course-meta {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
            gap: 20px;
            margin-bottom: 30px;
            font-size: 1rem;
            color: #555;
        }

        .course-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .course-detail-image {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .course-detail-image img {
            width: 100%;
            display: block;
            border-radius: 12px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .course-detail-image img:hover {
            transform: scale(1.05);
        }

        .course-section {
            margin-bottom: 0px;
        }

        .course-section h3 {
            font-size: 1.6rem;
            margin-bottom: 12px;
            color: #F57A1C;
            border-left: 4px solid #F57A1C;
            padding-left: 12px;
        }

        .course-section p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
        }

        .apply-btn {
            display: inline-block;
            padding: 14px 30px;
            background-color: #F57A1C;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }

        .apply-btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .course-detail-container {
                margin: 20px 25px;
                padding: 15px;
            }
            .course-detail-container h1 {
                font-size: 2rem;
            }
            .course-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .course-section h3 {
                font-size: 1.4rem;
            }
        }

        .form-label, .form-check-label{
            color:white;
        }

        @media (max-width: 768px) {
            .course-detail-container {
                margin: 12px 0px !important;

            }
        }

        .course-section {
            margin-bottom: 0px;
        }

        .registration-header-block {
            border: 1px solid #dbe5ef;
            border-radius: 18px;
            background: #fff;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }

        .registration-header-top {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .registration-header-logo img {
            max-width: 180px;
            height: auto;
            display: block;
        }

        .registration-header-title-wrap {
            flex: 1;
            text-align: center;
        }

        .registration-header-title {
            font-size: 2rem;
            font-weight: 700;
            color: #223b63;
            margin-bottom: 6px;
        }

        .registration-header-subtitle {
            font-size: 1.1rem;
            color: #374151;
            font-weight: 700;
            text-decoration: underline;
        }

        .registration-header-info {
            color: #1f2937;
            font-size: 1rem;
        }

        .registration-header-row {
            margin-bottom: 12px;
            font-weight: 600;
        }

        .registration-header-row.split {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .info-split-item {
            flex: 1 1 320px;
        }

        .info-line {
            display: inline-block;
            min-width: 260px;
            border-bottom: 2px dotted #8b95a7;
            padding: 0 6px 2px;
            font-weight: 500;
        }

        .info-line.short {
            min-width: 280px;
        }
    </style>
@endpush

@section('content')
    @php
        // Fallbacks if SEO fields are empty
        $metaTitle = $course->meta_title ?? $course->title;
        $metaDescription = $course->meta_description ?? Str::limit($course->short_des, 160);
        $metaKeywords = $course->meta_keywords ?? 'Course, NSDC, Skills, Training';
        $ogImage = $course->picture ? Storage::url($course->picture) : asset('images/default-course.png');
    @endphp

        <!-- SEO Meta Tags -->
    @section('meta')
        <title>{{ $metaTitle }}</title>
        <meta name="description" content="{{ $metaDescription }}">
        <meta name="keywords" content="{{ $metaKeywords }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $metaTitle }}">
        <meta property="og:description" content="{{ $metaDescription }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="NSDC - National Skills Development Corporation">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $metaTitle }}">
        <meta name="twitter:description" content="{{ $metaDescription }}">
        <meta name="twitter:image" content="{{ $ogImage }}">
    @endsection

    <section class="course-detail-container mt-5">
        <!-- Course Image -->
        <div class="course-detail-image mt-5">
            <img src="{{ $ogImage }}" alt="{{ $course->title }}">
        </div>

        <h1>{{ $course->title }}</h1>

        <div class="course-meta">
            <span><i class="fas fa-clock"></i> Duration: {{ $course->duration }}</span>
            <span><i class="fas fa-dollar-sign"></i> Fee: {{ number_format($course->course_fee, 2) }}Taka</span>

        </div>
        <div class="course-section">
            <h3>Overview</h3>
            <p>{{ $course->short_des }}</p>
        </div>
        <div class="course-section">
            <h3>Course Details</h3>
            {!! $course->long_des !!}
        </div>

        <hr>
    </section>

    <section class="course-registration-form py-4" style="background-color:#f8f9fa;">
        <div class="container">
            @include('shared.registration_header', [
                'courseTitle' => $course->title ?? '',
                'batchName' => '',
            ])

            <h2 class="text-center mb-4">Register for {{ $course->title }}</h2>

            <style>
                .asset-form-card {
                    background: #fff;
                    border-radius: 12px;
                    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
                    overflow: hidden;
                }

                .asset-section-title {
                    background: #d9e8f5;
                    color: #111;
                    font-weight: 700;
                    font-size: 18px;
                    padding: 10px 15px;
                    margin-bottom: 20px;
                    border-left: 4px solid #242F6F;
                }

                .asset-form-card .form-label {
                    color: #222 !important;
                    font-weight: 600;
                    margin-bottom: 6px;
                }

                .asset-form-card .form-control,
                .asset-form-card .form-select {
                    min-height: 48px;
                    border-radius: 8px;
                    border: 1px solid #ced4da;
                }

                .asset-form-card textarea.form-control {
                    min-height: 110px;
                }

                .asset-check-wrap {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 18px;
                    align-items: center;
                    min-height: 48px;
                }

                .required-star {
                    color: red;
                }

                .section-gap {
                    margin-bottom: 24px;
                }

                .error-text {
                    font-size: 13px;
                    margin-top: 4px;
                    color: #dc3545;
                }

                @media (max-width: 767px) {
                    .asset-section-title {
                        font-size: 16px;
                        padding: 9px 12px;
                    }
                }

                @media (max-width: 768px) {
                    .registration-header-top {
                        flex-direction: column;
                        align-items: flex-start;
                    }

                    .registration-header-title-wrap {
                        text-align: left;
                    }

                    .registration-header-title {
                        font-size: 1.6rem;
                    }

                    .info-line,
                    .info-line.short {
                        min-width: 170px;
                    }
                }
            </style>

            <div class="asset-form-card p-3 p-md-4">
                <form id="registrationForm" method="POST" action="{{ route('registration.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    {{-- Basic Information --}}
                    <div class="asset-section-title">Basic Information</div>

                    <div class="row">

                            <div class="col-md-4 section-gap">
                                <label class="form-label">Email <span class="required-star">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email address">
                                <p class="error-text email_error"></p>
                            </div>

                            <div class="col-md-4 section-gap">
                                <label class="form-label">Contact Number <span class="required-star">*</span></label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter your contact number">
                                <p class="error-text phone_error"></p>
                            </div>


                        <div class="col-md-4 section-gap">
                            <label class="form-label">NID <span class="required-star">*</span></label>
                            <input type="text" name="nid" class="form-control" value="{{ old('nid') }}">
                            <p class="error-text nid_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Full Name [English] <span class="required-star">*</span></label>
                            <input type="text" name="full_name_en" class="form-control" value="{{ old('full_name_en') }}">
                            <p class="error-text full_name_en_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Full Name [Bangla] <span class="required-star">*</span></label>
                            <input type="text" name="full_name_bn" class="form-control" value="{{ old('full_name_bn') }}">
                            <p class="error-text full_name_bn_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Father’s Name [English] <span class="required-star">*</span></label>
                            <input type="text" name="father_name_en" class="form-control" value="{{ old('father_name_en') }}">
                            <p class="error-text father_name_en_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Father’s Occupation</label>
                            <input type="text" name="father_occupation" class="form-control" value="{{ old('father_occupation') }}">
                            <p class="error-text father_occupation_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Mother’s Name [English] <span class="required-star">*</span></label>
                            <input type="text" name="mother_name_en" class="form-control" value="{{ old('mother_name_en') }}">
                            <p class="error-text mother_name_en_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Mother’s Occupation</label>
                            <input type="text" name="mother_occupation" class="form-control" value="{{ old('mother_occupation') }}">
                            <p class="error-text mother_occupation_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Sex <span class="required-star">*</span></label>
                            <select name="sex" class="form-select">
                                <option value="">Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <p class="error-text sex_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Date of Birth <span class="required-star">*</span></label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                            <p class="error-text date_of_birth_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Person With Disability (PWD)</label>
                            <select name="pwd" class="form-select">
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <p class="error-text pwd_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Religion <span class="required-star">*</span></label>
                            <input type="text" name="religion" class="form-control" value="{{ old('religion') }}">
                            <p class="error-text religion_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Blood Group <span class="required-star">*</span></label>
                            <select name="blood_group" class="form-select">
                                <option value="">Select Blood Group</option>
                                @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                                    <option value="{{ $bg }}">{{ $bg }}</option>
                                @endforeach
                            </select>
                            <p class="error-text blood_group_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Marital Status</label>
                            <select name="marital_status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                            </select>
                            <p class="error-text marital_status_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">NID/Birth Certificate/Passport No</label>
                            <input type="text" name="identity_no" class="form-control" value="{{ old('identity_no') }}">
                            <p class="error-text identity_no_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Signature (jpg, png, jpeg) <span class="required-star">*</span></label>
                            <input type="file" name="signature" class="form-control">
                            <p class="error-text signature_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Profile Photo (jpg, png, jpeg) <span class="required-star">*</span></label>
                            <input type="file" name="photo" class="form-control">
                            <p class="error-text photo_error"></p>
                        </div>
                    </div>

                    {{-- Permanent Address --}}
                    <div class="asset-section-title">Permanent Address</div>

                    <div class="row">
                        <div class="col-md-4 section-gap">
                            <label class="form-label">Division <span class="required-star">*</span></label>
                            <select name="permanent_division_id" id="permanent_division_id" class="form-select">
                                <option value="">Select Division</option>
                                @foreach($divisions ?? [] as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            <p class="error-text permanent_division_id_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">District <span class="required-star">*</span></label>
                            <select name="permanent_district_id" id="permanent_district_id" class="form-select">
                                <option value="">Select District</option>
                            </select>
                            <p class="error-text permanent_district_id_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Upazila <span class="required-star">*</span></label>
                            <select name="permanent_upazila_id" id="permanent_upazila_id" class="form-select">
                                <option value="">Select Upazila</option>
                            </select>
                            <p class="error-text permanent_upazila_id_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Post Office <span class="required-star">*</span></label>
                            <input type="text"
                                   name="permanent_post_office"
                                   id="permanent_post_office"
                                   class="form-control"
                                   value="{{ old('permanent_post_office') }}"
                                   placeholder="Post Office Name - Code (e.g. Natore Sadar - 6400)">
                            <p class="error-text permanent_post_office_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">From Rural or Urban Area</label>
                            <select name="permanent_area_type" class="form-select">
                                <option value="">Select Area Type</option>
                                <option value="Rural">Rural</option>
                                <option value="Urban">Urban</option>
                            </select>
                            <p class="error-text permanent_area_type_error"></p>
                        </div>

                        <div class="col-md-12 section-gap">
                            <label class="form-label">Address <span class="required-star">*</span></label>
                            <textarea name="permanent_address" class="form-control">{{ old('permanent_address') }}</textarea>
                            <p class="error-text permanent_address_error"></p>
                        </div>
                    </div>

                    {{-- Present Address --}}
                    <div class="asset-section-title">Present Address</div>

                    <div class="row">
                        <div class="col-12 section-gap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="same_as_permanent" name="same_as_permanent" value="1">
                                <label class="form-check-label text-dark" for="same_as_permanent">Same as Permanent Address</label>
                            </div>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Division <span class="required-star">*</span></label>
                            <select name="present_division_id" id="present_division_id" class="form-select">
                                <option value="">Select Division</option>
                                @foreach($divisions ?? [] as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            <p class="error-text present_division_id_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">District <span class="required-star">*</span></label>
                            <select name="present_district_id" id="present_district_id" class="form-select">
                                <option value="">Select District</option>
                            </select>
                            <p class="error-text present_district_id_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Upazila <span class="required-star">*</span></label>
                            <select name="present_upazila_id" id="present_upazila_id" class="form-select">
                                <option value="">Select Upazila</option>
                            </select>
                            <p class="error-text present_upazila_id_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Address <span class="required-star">*</span></label>
                            <textarea name="present_address" id="present_address" class="form-control">{{ old('present_address') }}</textarea>
                            <p class="error-text present_address_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Post Office <span class="required-star">*</span></label>
                            <input type="text"
                                   name="present_post_office"
                                   id="present_post_office"
                                   class="form-control"
                                   value="{{ old('present_post_office') }}"
                                   placeholder="Post Office Name - Code (e.g. Natore Sadar - 6400)">
                            <p class="error-text present_post_office_error"></p>
                        </div>
                    </div>

                    {{-- Education --}}
                    <div class="asset-section-title">Education Information</div>

                    <div class="row">
                        <div class="col-md-6 section-gap">
                            <label class="form-label">Board/University</label>
                            <input type="text" name="board_university" class="form-control" value="{{ old('board_university') }}">
                            <p class="error-text board_university_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Highest Educational Level</label>
                            <input type="text" name="highest_education_level" class="form-control" value="{{ old('highest_education_level') }}">
                            <p class="error-text highest_education_level_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Highest Education Institute Name</label>
                            <input type="text" name="highest_education_institute_name" class="form-control" value="{{ old('highest_education_institute_name') }}">
                            <p class="error-text highest_education_institute_name_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Highest Education Passing Year</label>
                            <input type="text" name="highest_education_passing_year" class="form-control" value="{{ old('highest_education_passing_year') }}">
                            <p class="error-text highest_education_passing_year_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label d-block">TVET Certificate</label>
                            <div class="asset-check-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tvet_certificate" value="Yes">
                                    <label class="form-check-label text-dark">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tvet_certificate" value="No">
                                    <label class="form-check-label text-dark">No</label>
                                </div>
                            </div>
                            <p class="error-text tvet_certificate_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label d-block">Ethnic Minority</label>
                            <div class="asset-check-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ethnic_minority" value="Yes">
                                    <label class="form-check-label text-dark">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ethnic_minority" value="No">
                                    <label class="form-check-label text-dark">No</label>
                                </div>
                            </div>
                            <p class="error-text ethnic_minority_error"></p>
                        </div>
                    </div>

                    {{-- Skill / Experience / Income --}}
                    <div class="asset-section-title">Skill, Experiences, Past Employment & Income</div>

                    <div class="row">
                        <div class="col-md-4 section-gap">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}">
                            <p class="error-text company_name_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control" value="{{ old('designation') }}">
                            <p class="error-text designation_error"></p>
                        </div>

                        <div class="col-md-4 section-gap">
                            <label class="form-label">Received any skill training in the Past?</label>
                            <input type="text" name="past_skill_training" class="form-control" value="{{ old('past_skill_training') }}">
                            <p class="error-text past_skill_training_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Employment status before training</label>
                            <input type="text" name="employment_status_before_training" class="form-control" value="{{ old('employment_status_before_training') }}">
                            <p class="error-text employment_status_before_training_error"></p>
                        </div>

                        <div class="col-md-6 section-gap">
                            <label class="form-label">Amount of Monthly Income (BDT) – Cash</label>
                            <input type="number" step="0.01" name="monthly_income" class="form-control" value="{{ old('monthly_income') }}">
                            <p class="error-text monthly_income_error"></p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" id="registrationSubmitBtn" class="btn btn-primary btn-lg w-100">
                            Submit Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        $(document).ready(function () {

            function resetErrors() {
                $('.error-text').text('');
                $('#registrationForm .form-control, #registrationForm .form-select').removeClass('is-invalid');
            }

            function loadDistricts(divisionId, districtSelector, selectedDistrict = '') {
                $(districtSelector).html('<option value="">Select District</option>');

                let upazilaSelector = districtSelector.replace('district', 'upazila');
                if ($(upazilaSelector).length) {
                    $(upazilaSelector).html('<option value="">Select Upazila</option>');
                }

                if (divisionId) {
                    $.ajax({
                        url: '/districts/' + divisionId,
                        type: 'GET',
                        success: function (data) {
                            $.each(data, function (key, item) {
                                $(districtSelector).append(
                                    `<option value="${item.id}" ${selectedDistrict == item.id ? 'selected' : ''}>${item.name}</option>`
                                );
                            });
                        }
                    });
                }
            }

            function loadUpazilas(districtId, upazilaSelector, selectedUpazila = '') {
                $(upazilaSelector).html('<option value="">Select Upazila</option>');

                if (districtId) {
                    $.ajax({
                        url: '/upazilas/' + districtId,
                        type: 'GET',
                        success: function (data) {
                            $.each(data, function (key, item) {
                                $(upazilaSelector).append(
                                    `<option value="${item.id}" ${selectedUpazila == item.id ? 'selected' : ''}>${item.name}</option>`
                                );
                            });
                        }
                    });
                }
            }

            $('#permanent_division_id').on('change', function () {
                loadDistricts($(this).val(), '#permanent_district_id');
            });

            $('#permanent_district_id').on('change', function () {
                loadUpazilas($(this).val(), '#permanent_upazila_id');
            });

            $('#present_division_id').on('change', function () {
                loadDistricts($(this).val(), '#present_district_id');
            });

            $('#present_district_id').on('change', function () {
                loadUpazilas($(this).val(), '#present_upazila_id');
            });

            $('#same_as_permanent').on('change', function () {
                if ($(this).is(':checked')) {
                    let permanentDivision = $('#permanent_division_id').val();
                    let permanentDistrict = $('#permanent_district_id').val();
                    let permanentUpazila = $('#permanent_upazila_id').val();
                    let permanentPostOffice = $('#permanent_post_office').val();
                    let permanentAddress = $('textarea[name="permanent_address"]').val();

                    $('#present_division_id').val(permanentDivision).trigger('change');

                    setTimeout(function () {
                        loadDistricts(permanentDivision, '#present_district_id', permanentDistrict);

                        setTimeout(function () {
                            loadUpazilas(permanentDistrict, '#present_upazila_id', permanentUpazila);
                        }, 300);
                    }, 300);

                    $('#present_post_office').val(permanentPostOffice);
                    $('#present_address').val(permanentAddress);
                } else {
                    $('#present_division_id').val('');
                    $('#present_district_id').html('<option value="">Select District</option>');
                    $('#present_upazila_id').html('<option value="">Select Upazila</option>');
                    $('#present_post_office').val('');
                    $('#present_address').val('');
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#registrationForm').on('submit', function (e) {
                e.preventDefault();

                resetErrors();

                let form = $('#registrationForm')[0];
                let formData = new FormData(form);
                let submitBtn = $('#registrationSubmitBtn');

                submitBtn.prop('disabled', true).text('Submitting...');

                $.ajax({
                    url: "{{ route('registration.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        submitBtn.prop('disabled', false).text('Submit Registration');

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message || 'Registration submitted successfully!',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            $('#registrationForm')[0].reset();
                            resetErrors();

                            $('#permanent_district_id').html('<option value="">Select District</option>');
                            $('#permanent_upazila_id').html('<option value="">Select Upazila</option>');
                            $('#present_district_id').html('<option value="">Select District</option>');
                            $('#present_upazila_id').html('<option value="">Select Upazila</option>');
                        });
                    },
                    error: function (xhr) {
                        submitBtn.prop('disabled', false).text('Submit Registration');

                        if (xhr.status === 422) {
                            $.each(xhr.responseJSON.errors, function (field, messages) {
                                $('[name="' + field + '"]').addClass('is-invalid');
                                $('.' + field + '_error').text(messages[0]);
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                text: 'Please fix the highlighted fields.'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: xhr.responseJSON?.message || 'Something went wrong while submitting the registration.'
                            });
                        }
                    }
                });
            });

        });
    </script>
@endpush
