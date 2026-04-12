<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainee Registration Form</title>
    <style>
        @page {
            margin: 20px 24px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            unicode-bidi: plaintext;
            font-size: 11px;
            color: #222;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }

        .logo-wrap {
            margin-bottom: 8px;
        }

        .logo-wrap img {
            height: 48px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            margin: 6px 0 2px;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            text-decoration: underline;
            margin-bottom: 14px;
        }

        .top-info {
            width: 100%;
            margin-bottom: 8px;
        }

        .top-info-row {
            margin-bottom: 8px;
            font-size: 12px;
        }

        .line-value {
            display: inline-block;
            border-bottom: 1px dotted #555;
            min-width: 240px;
            padding: 0 4px 2px;
        }

        .line-value.short {
            min-width: 150px;
        }

        .section-title {
            background: #cfe2f3;
            color: #111;
            font-weight: 700;
            font-size: 12px;
            padding: 4px 8px;
            margin: 12px 0 10px;
        }

        table.form-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 14px 10px;
        }

        table.form-table td {
            vertical-align: top;
        }

        .field-label {
            font-size: 11px;
            margin-bottom: 4px;
        }

        .req {
            color: red;
            font-weight: 700;
        }

        .field-box {
            border: 1px solid #444;
            min-height: 22px;
            padding: 5px 7px;
            font-size: 11px;
            word-wrap: break-word;
        }

        .field-box.textarea {
            min-height: 46px;
        }

        .field-box.small-note {
            font-size: 10px;
        }

        .checkbox-line {
            margin: 2px 0 8px 2px;
            font-size: 12px;
        }

        .checkbox {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1px solid #333;
            margin-right: 6px;
            vertical-align: middle;
            text-align: center;
            line-height: 10px;
            font-size: 9px;
        }

        .inline-choice {
            display: inline-block;
            margin-right: 18px;
        }

        .signature-block {
            margin-top: 32px;
            width: 180px;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #5aa1d6;
            margin-bottom: 4px;
        }

        .signature-text {
            font-style: italic;
            font-weight: 700;
            font-size: 11px;
        }

        .attach-box {
            border: 2px solid #7ea6c8;
            border-radius: 18px;
            padding: 10px 14px;
            width: 240px;
            font-size: 10px;
            margin-left: auto;
            margin-top: 12px;
        }

        .attach-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .page-no {
            text-align: center;
            margin-top: 8px;
            font-size: 11px;
        }

        .footer-line {
            border-top: 1px solid #9fc5e8;
            margin-top: 12px;
        }

        .page-break {
            page-break-after: always;
        }

        .photo-box img {
            width: 100%;
            max-width: 120px;
            height: 90px;
            object-fit: cover;
        }

        .sign-box img {
            width: 100%;
            max-width: 150px;
            height: 50px;
            object-fit: contain;
        }

        .copy-badge {
            text-align: right;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>

@php
    $copies = ['Office Copy'];

    $photoPath = null;
    if (!empty($reg->photo)) {
        if (file_exists(public_path('storage/' . $reg->photo))) {
            $photoPath = public_path('storage/' . $reg->photo);
        } elseif (file_exists(public_path($reg->photo))) {
            $photoPath = public_path($reg->photo);
        }
    }

    $signaturePath = null;
    if (!empty($reg->signature)) {
        if (file_exists(public_path('storage/' . $reg->signature))) {
            $signaturePath = public_path('storage/' . $reg->signature);
        } elseif (file_exists(public_path($reg->signature))) {
            $signaturePath = public_path($reg->signature);
        }
    }

    $dob = !empty($reg->date_of_birth) ? \Carbon\Carbon::parse($reg->date_of_birth)->format('d/m/Y') : '';
@endphp

@foreach($copies as $copy)
    {{-- PAGE 1 --}}
    <div class="page">
{{--        <div class="copy-badge">{{ $copy }}</div>--}}

        <div class="logo-wrap">
            <img src="{{ public_path('asset-project-logo.png') }}" alt="Logo">
        </div>

        <div class="title">ASSET-- BWCCI Project</div>
        <div class="subtitle">Trainee Registration Form</div>

        <div class="top-info">
            <div class="top-info-row">
                <strong>Name of the Training Institute:</strong>
                Rajshahi Skill Development Centre- RSDC
            </div>
            <div class="top-info-row">
                <strong>Course/Trade Name:</strong>
                <span class="line-value">{{ $reg->course->title ?? '' }}</span>
            </div>
            <div class="top-info-row">
                <strong>Batch No:</strong>
                <span class="line-value short">{{ $reg->batch->batch_name ?? '' }}</span>
            </div>
        </div>

        <div class="section-title">Basic Information</div>

        <table class="form-table">
            <tr>
                <td width="33.33%">
                    <div class="field-label">Email <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->email ?? '' }}</div>
                </td>
                <td width="33.33%">
                    <div class="field-label">Contact Number <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->phone ?? '' }}</div>
                </td>
                <td width="33.33%">
                    <div class="field-label">NID <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->nid ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Full Name [English] <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->full_name_en ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Full Name [Bangla] <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->full_name_bn ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Father’s Name [English] <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->father_name_en ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Father’s Occupation <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->father_occupation ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Mother’s Name [English] <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->mother_name_en ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Mother’s Occupation</div>
                    <div class="field-box">{{ $reg->mother_occupation ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Sex <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->sex ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Date of birth <span class="req">*</span></div>
                    <div class="field-box">{{ $dob }}</div>
                </td>
                <td>
                    <div class="field-label">Person With Disability(PWD)</div>
                    <div class="field-box">{{ $reg->pwd ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Religion <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->religion ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Blood Group <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->blood_group ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Marital Status <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->marital_status ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">NID/Birth Certificate/Passport No <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->identity_no ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Signature <span class="req">*</span> (jpg,png,jpeg) Width:300, Height:100</div>
                    <div class="field-box sign-box" style="text-align:center; min-height:70px;">
                        @if($signaturePath)
                            <img src="{{ $signaturePath }}" alt="Signature">
                        @endif
                    </div>
                </td>
                <td>
                    <div class="field-label">Profile Photo (jpg,png,jpeg)</div>
                    <div class="field-box photo-box" style="text-align:center; min-height:70px;">
                        @if($photoPath)
                            <img src="{{ $photoPath }}" alt="Photo">
                        @endif
                    </div>
                </td>
            </tr>
        </table>

        <div class="footer-line"></div>
        <div class="page-no">1</div>
    </div>

    <div class="page-break"></div>

    {{-- PAGE 2 --}}
    <div class="page">
        <div class="section-title">Permanent Address</div>

        <table class="form-table">
            <tr>
                <td width="33.33%">
                    <div class="field-label">Division <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->permanentDivision->name ?? '' }}</div>
                </td>
                <td width="33.33%">
                    <div class="field-label">District <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->permanentDistrict->name ?? '' }}</div>
                </td>
                <td width="33.33%">
                    <div class="field-label">Upazila <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->permanentUpazila->name ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Post Office <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->permanent_post_office ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">From Rural or Urban Area <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->permanent_area_type ?? '' }}</div>
                </td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3">
                    <div class="field-label">Address <span class="req">*</span></div>
                    <div class="field-box textarea">{{ $reg->permanent_address ?? '' }}</div>
                </td>
            </tr>
        </table>

        <div class="section-title">Present Address</div>

        <div class="checkbox-line">
            <span class="checkbox">{{ !empty($reg->same_as_permanent) ? '✓' : '' }}</span>
            Same as Permanent Address
        </div>

        <table class="form-table">
            <tr>
                <td width="33.33%">
                    <div class="field-label">Division <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->presentDivision->name ?? '' }}</div>
                </td>
                <td width="33.33%">
                    <div class="field-label">District <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->presentDistrict->name ?? '' }}</div>
                </td>
                <td width="33.33%">
                    <div class="field-label">Upazila <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->presentUpazila->name ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div class="field-label">Address <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->present_address ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Post Office <span class="req">*</span></div>
                    <div class="field-box">{{ $reg->present_post_office ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Board/University</div>
                    <div class="field-box">{{ $reg->board_university ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Highest Educational Level</div>
                    <div class="field-box">{{ $reg->highest_education_level ?? '' }}</div>
                </td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2">
                    <div class="field-label">Highest Education Institute Name</div>
                    <div class="field-box">{{ $reg->highest_education_institute_name ?? '' }}</div>
                </td>
                <td>
                    <div class="field-label">Highest Education Passing Year</div>
                    <div class="field-box">{{ $reg->highest_education_passing_year ?? '' }}</div>
                </td>
            </tr>
        </table>

        <div style="margin: 6px 14px 10px;">
            <span class="inline-choice">
                <strong>TVET Certificate:</strong>
                <span class="checkbox">{{ ($reg->tvet_certificate ?? '') == 'Yes' ? '✓' : '' }}</span> Yes
                <span class="checkbox" style="margin-left:10px;">{{ ($reg->tvet_certificate ?? '') == 'No' ? '✓' : '' }}</span> No
            </span>

            <span class="inline-choice" style="margin-left: 50px;">
                <strong>Ethnic Minority:</strong>
                <span class="checkbox">{{ ($reg->ethnic_minority ?? '') == 'Yes' ? '✓' : '' }}</span> Yes
                <span class="checkbox" style="margin-left:10px;">{{ ($reg->ethnic_minority ?? '') == 'No' ? '✓' : '' }}</span> No
            </span>
        </div>

        <div class="section-title">Skill, Experiences, Past Employment & Income</div>

        <table class="form-table">
            <tr>
                <td width="34%">
                    <div class="field-label">Company Name</div>
                    <div class="field-box">{{ $reg->company_name ?? '' }}</div>
                </td>
                <td width="24%">
                    <div class="field-label">Designation</div>
                    <div class="field-box">{{ $reg->designation ?? '' }}</div>
                </td>
                <td width="42%">
                    <div class="field-label">Received any skill training in the Past?</div>
                    <div class="field-box">{{ $reg->past_skill_training ?? '' }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="field-label">Employment status before training</div>
                    <div class="field-box">{{ $reg->employment_status_before_training ?? '' }}</div>
                </td>
                <td colspan="2">
                    <div class="field-label">Amount of Monthly Income (BDT) - Cash</div>
                    <div class="field-box">{{ $reg->monthly_income ?? '' }}</div>
                </td>
            </tr>
        </table>

        <div style="display: table; width: 100%; margin-top: 26px;">
            <div style="display: table-cell; width: 50%; vertical-align: top;">
                <div class="signature-block">
                    <div class="signature-line"></div>
                    <div class="signature-text">Signature of Trainee</div>
                </div>
            </div>

            <div style="display: table-cell; width: 50%; vertical-align: top;">
                <div class="attach-box">
                    <strong>Attachments:</strong>
                    <ul>
                        <li>2 Copies Recent Passport Size Photo</li>
                        <li>NID Photocopy</li>
                        <li>Education Certificate Photocopy (Highest)</li>
                        <li>TVET Certificate (if any)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-line"></div>
        <div class="page-no">2</div>
    </div>

    @if(!$loop->last)
        <div class="page-break"></div>
    @endif
@endforeach

</body>
</html>
