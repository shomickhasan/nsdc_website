<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <title>Trainee Registration Form - ASSET BWCCI</title>
    <style>
        @page {
            margin: 30px 40px;
        }

        body {
            font-family: freeserif, serif;
            font-size: 11px;
            color: #333;
            margin: 0;
            line-height: 1.4;
        }

        /* Header Section */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .header-table td {
            vertical-align: middle;
            width: 33%;
        }

        .logo-left {
            text-align: left;
        }

        .logo-center {
            text-align: center;
        }

        .logo-right {
            text-align: right;
        }

        .header-table img {
            max-height: 55px;
            width: auto;
        }

        .pdf-header-title-wrap {
            text-align: center;
            border-bottom: 2px solid #444;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            color: #1a4e8c;
            margin: 0;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 13px;
            font-weight: bold;
            margin-top: 5px;
            color: #555;
        }

        /* Top Info Section */
        .top-info {
            margin-bottom: 15px;
            background: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .top-info-row {
            margin-bottom: 5px;
        }

        .line-value {
            border-bottom: 1px solid #777;
            padding: 0 5px;
            font-weight: bold;
            color: #000;
        }

        /* Section Styling */
        .section-title {
            background: #1a4e8c;
            color: #fff;
            font-weight: bold;
            font-size: 12px;
            padding: 5px 10px;
            margin: 15px 0 10px;
            border-radius: 3px;
        }

        /* Table Styling */
        .form-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .form-table td {
            padding: 5px 8px;
            vertical-align: top;
        }

        .field-label {
            font-weight: bold;
            font-size: 10px;
            margin-bottom: 3px;
            color: #555;
            display: block;
        }

        .req {
            color: red;
        }

        .field-box {
            border: 1px solid #ccc;
            padding: 6px;
            min-height: 15px;
            background: #fff;
            font-size: 11px;
            border-radius: 2px;
        }

        .textarea-box {
            min-height: 45px;
        }

        /* Checkbox */
        .checkbox-wrap {
            margin: 5px 0 10px 8px;
            font-weight: bold;
        }

        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid #333;
            text-align: center;
            line-height: 12px;
            margin-right: 5px;
        }

        /* Footer & Signatures */
        .footer-section {
            margin-top: 30px;
        }

        .signature-table {
            width: 100%;
            margin-top: 40px;
        }

        .sig-line {
            border-top: 1px solid #333;
            width: 160px;
            margin: 0 auto 5px;
        }

        .attach-box {
            border: 1px dashed #1a4e8c;
            background: #f0f7ff;
            padding: 10px;
            border-radius: 5px;
            font-size: 10px;
        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid #ddd;
            padding-top: 5px;
            text-align: center;
            font-size: 9px;
            color: #777;
        }

        .page-break {
            page-break-after: always;
        }

        .muted {
            color: #777;
        }
    </style>
</head>

<body>

    @php
        $assetLogoPath = public_path('image/registration/asset-project-logo.png');
        $bwcciLogoPath = public_path('image/registration/bwcci-logo.png');
        $govtLogoPath = public_path('image/registration/180_72.png');
        $dob = !empty($reg->date_of_birth) ? \Carbon\Carbon::parse($reg->date_of_birth)->format('d/m/Y') : '';
        $value = fn ($field, $fallback = '') => filled(data_get($reg, $field)) ? data_get($reg, $field) : $fallback;
        $money = filled($reg->monthly_income) ? number_format((float) $reg->monthly_income, 2) : '';
    @endphp

    <div class="page">
        <!-- Header -->
        <table class="header-table">
            <tr>
                <td class="logo-left">
                    @if (file_exists($govtLogoPath))
                        <img src="{{ $govtLogoPath }}">
                    @endif
                </td>
                <td class="logo-center">
                    @if (file_exists($bwcciLogoPath))
                        <img src="{{ $bwcciLogoPath }}">
                    @endif
                </td>
                <td class="logo-right">
                    @if (file_exists($assetLogoPath))
                        <img src="{{ $assetLogoPath }}">
                    @endif
                </td>
            </tr>
        </table>

        <div class="pdf-header-title-wrap">
            <div class="title">ASSET &mdash; BWCCI Project</div>
            <div class="subtitle">Trainee Registration Form</div>
        </div>

        <div class="top-info">
            <div class="top-info-row">
                <strong>Training Institute:</strong> <span class="line-value">Rajshahi Skill Development Centre
                    (RSDC)</span>
            </div>
            <div class="top-info-row" style="margin-top:8px;">
                <strong>Course Name:</strong> <span class="line-value">{{ $reg->course->title ?? 'N/A' }}</span>
                <span style="margin-left: 20px;"><strong>Batch No:</strong> <span
                        class="line-value">{{ $reg->batch->batch_name ?? 'N/A' }}</span></span>
            </div>
        </div>

        <!-- Section 1: Basic Info -->
        <div class="section-title">1. BASIC INFORMATION</div>
        <table class="form-table">
            <tr>
                <td><span class="field-label">Full Name (English) <span class="req">*</span></span>
                    <div class="field-box">{{ $value('full_name_en') }}</div>
                </td>
                <td><span class="field-label">Full Name (Bangla) <span class="req">*</span></span>
                    <div class="field-box">{{ $value('full_name_bn') }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">Email Address <span class="req">*</span></span>
                    <div class="field-box">{{ $value('email') }}</div>
                </td>
                <td><span class="field-label">Contact Number <span class="req">*</span></span>
                    <div class="field-box">{{ $value('phone') }}</div>
                </td>
            </tr>
        </table>

        <table class="form-table">
            <tr>
                <td width="33%"><span class="field-label">NID Number <span class="req">*</span></span>
                    <div class="field-box">{{ $value('nid') }}</div>
                </td>
                <td width="33%"><span class="field-label">Date of Birth <span class="req">*</span></span>
                    <div class="field-box">{{ $dob }}</div>
                </td>
                <td width="33%"><span class="field-label">Sex <span class="req">*</span></span>
                    <div class="field-box">{{ $value('sex') }}</div>
                </td>
            </tr>
        </table>

        <table class="form-table">
            <tr>
                <td><span class="field-label">Father's Name <span class="req">*</span></span>
                    <div class="field-box">{{ $value('father_name_en') }}</div>
                </td>
                <td><span class="field-label">Father's Occupation</span>
                    <div class="field-box">{{ $value('father_occupation') }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">Mother's Name <span class="req">*</span></span>
                    <div class="field-box">{{ $value('mother_name_en') }}</div>
                </td>
                <td><span class="field-label">Mother's Occupation</span>
                    <div class="field-box">{{ $value('mother_occupation') }}</div>
                </td>
            </tr>
        </table>

        <table class="form-table">
            <tr>
                <td width="25%"><span class="field-label">Person With Disability (PWD)</span>
                    <div class="field-box">{{ $value('pwd') }}</div>
                </td>
                <td width="25%"><span class="field-label">Religion <span class="req">*</span></span>
                    <div class="field-box">{{ $value('religion') }}</div>
                </td>
                <td width="25%"><span class="field-label">Blood Group <span class="req">*</span></span>
                    <div class="field-box">{{ $value('blood_group') }}</div>
                </td>
                <td width="25%"><span class="field-label">Marital Status</span>
                    <div class="field-box">{{ $value('marital_status') }}</div>
                </td>
            </tr>
            <tr>
                <td colspan="4"><span class="field-label">NID/Birth Certificate/Passport No</span>
                    <div class="field-box">{{ $value('identity_no') }}</div>
                </td>
            </tr>
        </table>

        <!-- Section 2: Address -->
        <div class="section-title">2. PERMANENT ADDRESS</div>
        <table class="form-table">
            <tr>
                <td><span class="field-label">Division</span>
                    <div class="field-box">{{ $reg->permanentDivision->name ?? '' }}</div>
                </td>
                <td><span class="field-label">District</span>
                    <div class="field-box">{{ $reg->permanentDistrict->name ?? '' }}</div>
                </td>
                <td><span class="field-label">Upazila</span>
                    <div class="field-box">{{ $reg->permanentUpazila->name ?? '' }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">Post Office <span class="req">*</span></span>
                    <div class="field-box">{{ $value('permanent_post_office') }}</div>
                </td>
                <td><span class="field-label">From Rural or Urban Area</span>
                    <div class="field-box">{{ $value('permanent_area_type') }}</div>
                </td>
                <td><span class="field-label">Address <span class="req">*</span></span>
                    <div class="field-box textarea-box">{{ $value('permanent_address') }}</div>
                </td>
            </tr>
        </table>

        <!-- Section 3: Present Address & Others -->
        <div class="section-title">3. PRESENT ADDRESS</div>
        <div class="checkbox-wrap">
            <span class="checkbox">{!! !empty($reg->same_as_permanent) ? '&#10003;' : '' !!}</span> Same as Permanent Address
        </div>
        <table class="form-table">
            <tr>
                <td><span class="field-label">Division</span>
                    <div class="field-box">{{ $reg->presentDivision->name ?? '' }}</div>
                </td>
                <td><span class="field-label">District</span>
                    <div class="field-box">{{ $reg->presentDistrict->name ?? '' }}</div>
                </td>
                <td><span class="field-label">Upazila</span>
                    <div class="field-box">{{ $reg->presentUpazila->name ?? '' }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">Post Office <span class="req">*</span></span>
                    <div class="field-box">{{ $value('present_post_office') }}</div>
                </td>
                <td colspan="2"><span class="field-label">Address <span class="req">*</span></span>
                    <div class="field-box textarea-box">{{ $value('present_address') }}</div>
                </td>
            </tr>
        </table>

        <div class="section-title">4. EDUCATION INFORMATION</div>
        <table class="form-table">
            <tr>
                <td><span class="field-label">Board/University</span>
                    <div class="field-box">{{ $value('board_university') }}</div>
                </td>
                <td><span class="field-label">Highest Educational Level</span>
                    <div class="field-box">{{ $value('highest_education_level') }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">Highest Education Institute Name</span>
                    <div class="field-box">{{ $value('highest_education_institute_name') }}</div>
                </td>
                <td><span class="field-label">Highest Education Passing Year</span>
                    <div class="field-box">{{ $value('highest_education_passing_year') }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">TVET Certificate</span>
                    <div class="field-box">{{ $value('tvet_certificate') }}</div>
                </td>
                <td><span class="field-label">Ethnic Minority</span>
                    <div class="field-box">{{ $value('ethnic_minority') }}</div>
                </td>
            </tr>
        </table>

        <div class="section-title">5. SKILL, EXPERIENCE, PAST EMPLOYMENT & INCOME</div>
        <table class="form-table">
            <tr>
                <td><span class="field-label">Company Name</span>
                    <div class="field-box">{{ $value('company_name') }}</div>
                </td>
                <td><span class="field-label">Designation</span>
                    <div class="field-box">{{ $value('designation') }}</div>
                </td>
            </tr>
            <tr>
                <td><span class="field-label">Received any skill training in the Past?</span>
                    <div class="field-box">{{ $value('past_skill_training') }}</div>
                </td>
                <td><span class="field-label">Employment status before training</span>
                    <div class="field-box">{{ $value('employment_status_before_training') }}</div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><span class="field-label">Amount of Monthly Income (BDT) - Cash</span>
                    <div class="field-box">{{ $money }}</div>
                </td>
            </tr>
        </table>

        <!-- Signature & Attachments -->
        <table class="signature-table">
            <tr>
                <td width="50%" style="text-align: center; vertical-align: bottom;">
                    <div class="sig-line"></div>
                    <strong>Signature of Trainee</strong>
                </td>
                <td width="50%">
                    <div class="attach-box">
                        <strong>Required Attachments:</strong>
                        <ul style="margin: 5px 0; padding-left: 15px;">
                            <li>2 Copies Passport Size Photo</li>
                            <li>NID Photocopy</li>
                            <li>Highest Educational Certificate</li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>

        <div class="page-footer">
            Printed on: {{ date('d-m-Y H:i A') }} | Page 1 of 1
        </div>
    </div>

</body>

</html>
