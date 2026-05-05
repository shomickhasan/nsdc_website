@extends('backend.template.template')
@section('title', 'Registration Details')

@php
    $dob = !empty($reg->date_of_birth) ? \Carbon\Carbon::parse($reg->date_of_birth)->format('d/m/Y') : '';
@endphp

@section('main')
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Administration / Registrations /</span>
        <span class="heading-color">Details</span>
    </h4>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h5 class="mb-1">{{ $reg->full_name_en ?? 'Registration Details' }}</h5>
            <p class="mb-0 text-muted">
                Submitted on {{ optional($reg->created_at)->format('d M Y, h:i A') }}
            </p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('registration.edit', $reg->id) }}" class="btn btn-warning">
                <i class="ti ti-edit me-1"></i> Edit
            </a>
            <a href="{{ route('registration.pdf', $reg->id) }}" class="btn btn-success">
                <i class="ti ti-file-download me-1"></i> Download PDF
            </a>
            <a href="{{ route('registration.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left me-1"></i> Back To List
            </a>
        </div>
    </div>

    <div class="card shadow-sm registration-preview-card">
        <div class="card-body p-4 p-lg-5">
            @include('shared.registration_header', [
                'courseTitle' => $reg->course->title ?? '',
                'batchName' => $reg->batch->batch_name ?? '',
            ])

            <div class="pdf-head mb-4 mt-4">
                <div class="pdf-subtitle">Registration Details Preview</div>
                <div class="text-lg-end">
                    <div class="meta-chip">Registration ID: #{{ $reg->id }}</div>
                </div>
            </div>

            <div class="section-title">Basic Information</div>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="field-label">Email</div>
                    <div class="field-box">{{ $reg->email ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Contact Number</div>
                    <div class="field-box">{{ $reg->phone ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">NID</div>
                    <div class="field-box">{{ $reg->nid ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Admission Status</div>
                    <div class="field-box text-capitalize">{{ $reg->admission_status ?? 'pending' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Assigned Batch</div>
                    <div class="field-box">{{ $reg->batch->batch_name ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="field-label">Full Name [English]</div>
                    <div class="field-box">{{ $reg->full_name_en ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Full Name [Bangla]</div>
                    <div class="field-box">{{ $reg->full_name_bn ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Father's Name [English]</div>
                    <div class="field-box">{{ $reg->father_name_en ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="field-label">Father's Occupation</div>
                    <div class="field-box">{{ $reg->father_occupation ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Mother's Name [English]</div>
                    <div class="field-box">{{ $reg->mother_name_en ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Mother's Occupation</div>
                    <div class="field-box">{{ $reg->mother_occupation ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="field-label">Sex</div>
                    <div class="field-box">{{ $reg->sex ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Date of Birth</div>
                    <div class="field-box">{{ $dob ?: '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Person With Disability (PWD)</div>
                    <div class="field-box">{{ $reg->pwd ?? '-' }}</div>
                </div>

                <div class="col-md-4">
                    <div class="field-label">Religion</div>
                    <div class="field-box">{{ $reg->religion ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Blood Group</div>
                    <div class="field-box">{{ $reg->blood_group ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Marital Status</div>
                    <div class="field-box">{{ $reg->marital_status ?? '-' }}</div>
                </div>

                <div class="col-md-6">
                    <div class="field-label">NID/Birth Certificate/Passport No</div>
                    <div class="field-box">{{ $reg->identity_no ?? '-' }}</div>
                </div>
            </div>

            <div class="section-title">Permanent Address</div>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="field-label">Division</div>
                    <div class="field-box">{{ $reg->permanentDivision->name ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">District</div>
                    <div class="field-box">{{ $reg->permanentDistrict->name ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Upazila</div>
                    <div class="field-box">{{ $reg->permanentUpazila->name ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="field-label">Post Office</div>
                    <div class="field-box">{{ $reg->permanent_post_office ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="field-label">Area Type</div>
                    <div class="field-box">{{ $reg->permanent_area_type ?? '-' }}</div>
                </div>
                <div class="col-12">
                    <div class="field-label">Address</div>
                    <div class="field-box textarea-box">{{ $reg->permanent_address ?? '-' }}</div>
                </div>
            </div>

            <div class="section-title">Present Address</div>
            <div class="mb-3">
                <span class="check-pill {{ !empty($reg->same_as_permanent) ? 'checked' : '' }}">
                    {{ !empty($reg->same_as_permanent) ? 'Yes' : 'No' }}
                </span>
                <span class="text-muted ms-2">Same as Permanent Address</span>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="field-label">Division</div>
                    <div class="field-box">{{ $reg->presentDivision->name ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">District</div>
                    <div class="field-box">{{ $reg->presentDistrict->name ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Upazila</div>
                    <div class="field-box">{{ $reg->presentUpazila->name ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="field-label">Post Office</div>
                    <div class="field-box">{{ $reg->present_post_office ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="field-label">Address</div>
                    <div class="field-box textarea-box">{{ $reg->present_address ?? '-' }}</div>
                </div>
            </div>

            <div class="section-title">Education Information</div>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="field-label">Board/University</div>
                    <div class="field-box">{{ $reg->board_university ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Highest Educational Level</div>
                    <div class="field-box">{{ $reg->highest_education_level ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Highest Education Passing Year</div>
                    <div class="field-box">{{ $reg->highest_education_passing_year ?? '-' }}</div>
                </div>
                <div class="col-md-8">
                    <div class="field-label">Highest Education Institute Name</div>
                    <div class="field-box">{{ $reg->highest_education_institute_name ?? '-' }}</div>
                </div>
                <div class="col-md-2">
                    <div class="field-label">TVET Certificate</div>
                    <div class="field-box">{{ $reg->tvet_certificate ?? '-' }}</div>
                </div>
                <div class="col-md-2">
                    <div class="field-label">Ethnic Minority</div>
                    <div class="field-box">{{ $reg->ethnic_minority ?? '-' }}</div>
                </div>
            </div>

            <div class="section-title">Skill, Experiences, Past Employment & Income</div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="field-label">Company Name</div>
                    <div class="field-box">{{ $reg->company_name ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Designation</div>
                    <div class="field-box">{{ $reg->designation ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div class="field-label">Past Skill Training</div>
                    <div class="field-box">{{ $reg->past_skill_training ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="field-label">Employment Status Before Training</div>
                    <div class="field-box">{{ $reg->employment_status_before_training ?? '-' }}</div>
                </div>
                <div class="col-md-6">
                    <div class="field-label">Monthly Income (BDT)</div>
                    <div class="field-box">{{ $reg->monthly_income ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .registration-preview-card {
            border: 1px solid #dbe5ef;
            border-radius: 18px;
            overflow: hidden;
        }

        .pdf-head {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 16px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e8eef5;
        }

        .registration-header-block {
            border: 1px solid #dbe5ef;
            border-radius: 18px;
            background: #fff;
            padding: 24px;
        }

        .registration-header-top {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .registration-header-logo {
            width: 180px;
            flex: 0 0 180px;
            display: flex;
            align-items: center;
        }

        .registration-header-logo-right {
            justify-content: flex-end;
        }

        .registration-header-logo img {
            width: 180px;
            height: 72px;
            object-fit: contain;
            display: block;
        }

        .registration-header-title-wrap {
            flex: 1;
            text-align: center;
        }

        .registration-header-title {
            font-size: 24px;
            font-weight: 700;
            color: #223b63;
            margin-bottom: 6px;
        }

        .registration-header-subtitle,
        .pdf-subtitle {
            font-size: 14px;
            color: #374151;
            font-weight: 700;
            text-decoration: underline;
        }

        .registration-header-info {
            color: #1f2937;
            font-size: 15px;
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

        .meta-chip {
            background: #eef5fb;
            color: #223b63;
            border: 1px solid #d3e4f3;
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
            display: inline-block;
        }

        .section-title {
            background: #d9e8f5;
            color: #111827;
            font-weight: 700;
            font-size: 16px;
            padding: 10px 14px;
            border-left: 4px solid #5a92c9;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .field-label {
            font-size: 13px;
            font-weight: 600;
            color: #4b5563;
            margin-bottom: 6px;
        }

        .field-box {
            min-height: 50px;
            background: #fff;
            border: 1px solid #d5dde7;
            border-radius: 12px;
            padding: 12px 14px;
            color: #111827;
            word-break: break-word;
        }

        .textarea-box {
            min-height: 88px;
        }

        .check-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 30px;
            border-radius: 999px;
            background: #fee2e2;
            color: #b91c1c;
            font-weight: 700;
            font-size: 13px;
            padding: 0 12px;
        }

        .check-pill.checked {
            background: #dcfce7;
            color: #15803d;
        }

        @media (max-width: 767px) {
            .registration-header-top,
            .pdf-head {
                flex-direction: column;
            }

            .registration-header-title {
                font-size: 20px;
            }

            .registration-header-title-wrap {
                text-align: left;
            }

            .info-line,
            .info-line.short {
                min-width: 180px;
            }
        }
    </style>
@endpush
