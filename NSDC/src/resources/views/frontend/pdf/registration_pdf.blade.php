<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <title>Trainee Registration Form - ASSET BWCCI</title>
    <style>
        @page {
            margin: 26px 36px;
        }

        body {
            font-family: solaimanlipi;
            font-size: 13px;
            color: #1f2933;
            margin: 0;
            line-height: 1.55;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table {
            margin-bottom: 14px;
        }

        .header-table td {
            width: 33.33%;
            vertical-align: middle;
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
            max-height: 62px;
            width: auto;
        }

        .title-wrap {
            text-align: center;
            border-top: 1px solid #cdd9e5;
            border-bottom: 3px solid #275c91;
            padding: 12px 0 14px;
            margin-bottom: 14px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #183d63;
            margin: 0;
            text-transform: uppercase;
        }

        .subtitle {
            font-size: 15px;
            font-weight: bold;
            color: #334155;
            margin-top: 5px;
        }

        .meta-table {
            margin-bottom: 15px;
            border: 1.2px solid #b7c7d9;
            background: #f7fbff;
        }

        .meta-table td {
            padding: 9px 11px;
            border: 1px solid #cbd8e6;
            vertical-align: top;
        }

        .meta-label,
        .field-label {
            font-size: 13px;
            font-weight: bold;
            color: #4b5563;
            margin-bottom: 4px;
        }

        .meta-value {
            font-size: 14px;
            font-weight: bold;
            color: #111827;
        }

        .section-title {
            background: #d8e8f5;
            border-left: 5px solid #275c91;
            border-top: 1px solid #bfd2e4;
            border-bottom: 1px solid #bfd2e4;
            color: #111827;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 10px;
            margin: 16px 0 9px;
        }

        .field-table td {
            padding: 6px 7px;
            vertical-align: top;
        }

        .form-control-pdf {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px 10px;
            min-height: 34px;
            width: 100%;
            background: #fff;
            font-size: 14px;
            line-height: 1.4;
            box-sizing: border-box;
            color: #111827;
            word-break: break-word;
        }

        .textarea-box {
            min-height: 72px;
        }

        .media-table {
            margin-top: 5px;
        }

        .media-box {
            border: 1.4px solid #8fa4b8;
            border-bottom: 2px solid #6f879e;
            height: 105px;
            text-align: center;
            vertical-align: middle;
            background: #fbfdff;
            padding: 8px;
            font-size: 14px;
        }

        .media-box img {
            max-height: 94px;
            max-width: 170px;
            width: auto;
        }

        .checkbox {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1px solid #1f2937;
            text-align: center;
            line-height: 11px;
            margin-right: 6px;
            font-size: 10px;
        }

        .signature-table {
            margin-top: 28px;
        }

        .signature-table td {
            width: 50%;
            text-align: center;
            vertical-align: bottom;
            padding-top: 34px;
            font-size: 13px;
        }

        .sig-line {
            border-top: 1.2px solid #333;
            width: 185px;
            margin: 0 auto 7px;
        }

        .attach-box {
            border: 1px dashed #275c91;
            background: #f3f8fd;
            padding: 11px;
            font-size: 12px;
            line-height: 1.6;
            text-align: left;
        }

        .page-footer {
            position: fixed;
            bottom: -6px;
            left: 0;
            right: 0;
            border-top: 1px solid #d8e0ea;
            padding-top: 5px;
            text-align: center;
            font-size: 11px;
            color: #64748b;
        }
    </style>
</head>

<body>
    @php
        $assetLogoPath = public_path('image/registration/asset-project-logo.png');
        $bwcciLogoPath = public_path('image/registration/bwcci-logo.png');
        $govtLogoPath = public_path('image/registration/180_72.png');
        $photoPath = !empty($reg->photo) ? public_path($reg->photo) : '';
        $signaturePath = !empty($reg->signature) ? public_path($reg->signature) : '';

        $value = fn ($field, $fallback = '-') => filled(data_get($reg, $field)) ? data_get($reg, $field) : $fallback;
        $date = fn ($field) => filled(data_get($reg, $field)) ? \Carbon\Carbon::parse(data_get($reg, $field))->format('d/m/Y') : '-';
        $dateTime = fn ($field) => filled(data_get($reg, $field)) ? \Carbon\Carbon::parse(data_get($reg, $field))->format('d/m/Y h:i A') : '-';
        $money = filled($reg->monthly_income) ? number_format((float) $reg->monthly_income, 2) : '-';
        $status = ucfirst($reg->admission_status ?? 'pending');

        $sections = [
            '2. BASIC INFORMATION' => [
                ['Full Name [English]', $value('full_name_en'), 'Full Name [Bangla]', $value('full_name_bn')],
                ['Email Address', $value('email'), 'Contact Number', $value('phone')],
                ['NID', $value('nid'), 'NID/Birth Certificate/Passport No', $value('identity_no')],
                ['Date of Birth', $date('date_of_birth'), 'Sex', $value('sex')],
                ['Father\'s Name [English]', $value('father_name_en'), 'Father\'s Occupation', $value('father_occupation')],
                ['Mother\'s Name [English]', $value('mother_name_en'), 'Mother\'s Occupation', $value('mother_occupation')],
                ['Person With Disability (PWD)', $value('pwd'), 'Religion', $value('religion')],
                ['Blood Group', $value('blood_group'), 'Marital Status', $value('marital_status')],
            ],
            '3. PERMANENT ADDRESS' => [
                ['Division', $reg->permanentDivision->name ?? '-', 'District', $reg->permanentDistrict->name ?? '-'],
                ['Upazila', $reg->permanentUpazila->name ?? '-', 'Post Office', $value('permanent_post_office')],
                ['Rural or Urban Area', $value('permanent_area_type'), 'Address', $value('permanent_address'), 'textarea'],
            ],
            '4. PRESENT ADDRESS' => [
                ['Same as Permanent Address', !empty($reg->same_as_permanent) ? 'Yes' : 'No', 'Division', $reg->presentDivision->name ?? '-'],
                ['District', $reg->presentDistrict->name ?? '-', 'Upazila', $reg->presentUpazila->name ?? '-'],
                ['Post Office', $value('present_post_office'), 'Address', $value('present_address'), 'textarea'],
            ],
            '5. EDUCATION INFORMATION' => [
                ['Board/University', $value('board_university'), 'Highest Educational Level', $value('highest_education_level')],
                ['Highest Education Institute Name', $value('highest_education_institute_name'), 'Highest Education Passing Year', $value('highest_education_passing_year')],
                ['TVET Certificate', $value('tvet_certificate'), 'Ethnic Minority', $value('ethnic_minority')],
            ],
            '6. SKILL, EXPERIENCE, PAST EMPLOYMENT & INCOME' => [
                ['Company Name', $value('company_name'), 'Designation', $value('designation')],
                ['Past Skill Training', $value('past_skill_training'), 'Employment Status Before Training', $value('employment_status_before_training')],
                ['Monthly Income (BDT)', $money, '', ''],
            ],
        ];
    @endphp

    <table class="header-table">
        <tr>
            <td class="logo-left">
                @if (file_exists($govtLogoPath))
                    <img src="{{ $govtLogoPath }}" alt="Government Logo">
                @endif
            </td>
            <td class="logo-center">
                @if (file_exists($bwcciLogoPath))
                    <img src="{{ $bwcciLogoPath }}" alt="BWCCI Logo">
                @endif
            </td>
            <td class="logo-right">
                @if (file_exists($assetLogoPath))
                    <img src="{{ $assetLogoPath }}" alt="ASSET Logo">
                @endif
            </td>
        </tr>
    </table>

    <div class="title-wrap">
        <div class="title">ASSET - BWCCI Project</div>
        <div class="subtitle">Trainee Registration Form</div>
    </div>

    <table class="meta-table">
        <tr>
            <td colspan="2">
                <div class="meta-label">Name of the Training Institute</div>
                <div class="form-control-pdf">Rajshahi Skill Development Centre - RSDC</div>
            </td>
            <td>
                <div class="meta-label">Registration ID</div>
                <div class="form-control-pdf">#{{ $reg->id }}</div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="meta-label">Course/Trade Name</div>
                <div class="form-control-pdf">{{ $reg->course->title ?? '-' }}</div>
            </td>
            <td>
                <div class="meta-label">Batch No</div>
                <div class="form-control-pdf">{{ $reg->batch->batch_name ?? '-' }}</div>
            </td>
            <td>
                <div class="meta-label">Admission Status</div>
                <div class="form-control-pdf">{{ $status }}</div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="meta-label">Admitted At</div>
                <div class="form-control-pdf">{{ $dateTime('admitted_at') }}</div>
            </td>
            <td>
                <div class="meta-label">Submitted On</div>
                <div class="form-control-pdf">{{ $dateTime('created_at') }}</div>
            </td>
            <td>
                <div class="meta-label">Last Updated</div>
                <div class="form-control-pdf">{{ $dateTime('updated_at') }}</div>
            </td>
        </tr>
    </table>

    <div class="section-title">1. PHOTO & SIGNATURE</div>
    <table class="media-table">
        <tr>
            <td width="50%">
                <div class="field-label">Photo</div>
                <div class="media-box">
                    @if ($photoPath && file_exists($photoPath))
                        <img src="{{ $photoPath }}" alt="Trainee Photo">
                    @else
                        -
                    @endif
                </div>
            </td>
            <td width="50%">
                <div class="field-label">Signature</div>
                <div class="media-box">
                    @if ($signaturePath && file_exists($signaturePath))
                        <img src="{{ $signaturePath }}" alt="Trainee Signature">
                    @else
                        -
                    @endif
                </div>
            </td>
        </tr>
    </table>

    @foreach ($sections as $sectionTitle => $rows)
        <div class="section-title">{{ $sectionTitle }}</div>
        <table class="field-table">
            @foreach ($rows as $row)
                <tr>
                    <td width="50%" @if (empty($row[2])) colspan="2" @endif>
                        <div class="field-label">{{ $row[0] }}</div>
                        <div class="form-control-pdf {{ ($row[4] ?? '') === 'textarea' ? 'textarea-box' : '' }}">{{ $row[1] ?: '-' }}</div>
                    </td>
                    @if (!empty($row[2]))
                        <td width="50%">
                            <div class="field-label">{{ $row[2] }}</div>
                            <div class="form-control-pdf {{ ($row[4] ?? '') === 'textarea' ? 'textarea-box' : '' }}">{{ $row[3] ?: '-' }}</div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    @endforeach

    <table class="signature-table">
        <tr>
            <td>
                <div class="sig-line"></div>
                <strong>Signature of Trainee</strong>
            </td>
            <td>
                <div class="attach-box">
                    <strong>Required Attachments:</strong>
                    <div><span class="checkbox"></span> 2 Copies Passport Size Photo</div>
                    <div><span class="checkbox"></span> NID Photocopy</div>
                    <div><span class="checkbox"></span> Highest Educational Certificate</div>
                </div>
            </td>
        </tr>
    </table>

    <div class="page-footer">
        Printed on: {{ date('d-m-Y h:i A') }}
    </div>
</body>

</html>
