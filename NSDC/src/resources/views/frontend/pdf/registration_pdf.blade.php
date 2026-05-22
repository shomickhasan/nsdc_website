<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <title>Trainee Registration Form - ASSET BWCCI</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            font-family: solaimanlipi, sans-serif;
            color: #111111;
            margin: 0;
            background: #ffffff;
            font-size: 16px;
            line-height: 1.25;
        }

        .page {
            position: relative;
            min-height: 272mm;
            padding: 18mm 18mm 7mm 18mm;
            page-break-after: always;
        }

        .page:last-child {
            page-break-after: auto;
        }

        .logo-table {
            margin-bottom: 8px;
        }

        .logo-table td {
            width: 33.33%;
            padding: 0;
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

        .logo-table img {
            max-height: 55px;
            width: auto;
        }

        .title {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 18px;
            color: #444444;
        }

        .project-title {
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-title {
            font-size: 22px;
            font-weight: bold;
            text-decoration: underline;
        }

        .intro-line {
            font-size: 17px;
            font-weight: bold;
            color: #444444;
            margin-bottom: 16px;
        }

        .dotted {
            border-bottom: 2px dotted #555555;
            display: inline-block;
            min-height: 18px;
            vertical-align: bottom;
            font-weight: normal;
            color: #111111;
        }

        .section-title {
            background: #bdd7ee;
            color: #000000;
            font-size: 21px;
            font-weight: bold;
            text-decoration: underline;
            padding: 4px 2px 5px;
            margin: 14px 0 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        td {
            vertical-align: top;
            padding: 0 10px 14px 0;
        }

        td:last-child {
            padding-right: 0;
        }

        .label {
            color: #444444;
            font-size: 16px;
            margin-bottom: 7px;
        }

        .required {
            color: #ff0000;
        }

        .input-box {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            background: #ffffff;
        }

        .input-box td {
            border: 1.3px solid #111111;
            height: 27px;
            padding: 5px 8px 0;
            font-size: 14px;
            line-height: 1.25;
            color: #111111;
            overflow: hidden;
        }

        .textarea-input td {
            height: 56px;
            vertical-align: top;
            padding-top: 7px;
        }

        .checkbox-row {
            font-size: 15px;
            color: #111111;
            margin-top: 1px;
            margin-bottom: 17px;
        }

        .checkbox {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 1.3px solid #111111;
            text-align: center;
            line-height: 16px;
            margin: 0 5px 0 15px;
            vertical-align: middle;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox:first-child {
            margin-left: 0;
        }

        .attachment-box {
            border: 2px solid #3f7fb2;
            border-radius: 14px;
            color: #17366e;
            font-size: 17px;
            line-height: 1.18;
            width: 310px;
            padding: 8px 18px 8px 42px;
            margin-left: auto;
            margin-top: 16px;
        }

        .attachment-box strong {
            color: #17366e;
            margin-left: -25px;
        }

        .footer-line {
            position: absolute;
            left: 28mm;
            right: 28mm;
            bottom: 12mm;
            border-top: 1px solid #5ba5ff;
            height: 1px;
        }

        .page-no {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 7mm;
            text-align: center;
            font-size: 14px;
            color: #000000;
        }
    </style>
</head>

<body>
    @php
        $govtLogoPath = public_path('image/registration/180_72.png');
        $bwcciLogoPath = public_path('image/registration/bwcci-logo.png');
        $assetLogoPath = public_path('image/registration/asset-project-logo.png');
        $value = fn ($field, $fallback = '') => filled(data_get($reg, $field)) ? data_get($reg, $field) : $fallback;
        $date = fn ($field) => filled(data_get($reg, $field)) ? \Carbon\Carbon::parse(data_get($reg, $field))->format('m/d/Y') : '';
        $checked = fn ($field, $answer) => strtolower((string) data_get($reg, $field)) === strtolower($answer) ? '&#10003;' : '';
        $money = filled($reg->monthly_income) ? number_format((float) $reg->monthly_income, 2) : '';
    @endphp

    <div class="page">
        <table class="logo-table">
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

        <div class="title">
            <div class="project-title">ASSET-- BWCCI Project</div>
            <div class="form-title">Trainee Registration Form</div>
        </div>

        <div class="intro-line">
            Name of the Training Institute: Rajshahi Skill Development Centre- RSDC
        </div>

        <div class="intro-line">
            Course/Trade Name:
            <span class="dotted" style="width: 265px;">{{ $reg->course->title ?? '' }}</span>
            Course Type:
            <span class="dotted" style="width: 150px;"></span>
        </div>

        <div class="intro-line">
            Batch No:
            <span class="dotted" style="width: 235px;">{{ $reg->batch->batch_name ?? '' }}</span>
        </div>

        <div class="section-title">Login Information</div>
        <table>
            <tr>
                <td width="39%">
                    <div class="label">Username <span class="required">*</span></div>
                    <table class="input-box"><tr><td></td></tr></table>
                </td>
                <td width="32%">
                    <div class="label">Email <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('email') }}</td></tr></table>
                </td>
                <td width="29%">
                    <div class="label">Contact Number <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('phone') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">Emergency Contact No <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('emergency_contact_no') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Password <span class="required">*</span></div>
                    <table class="input-box"><tr><td></td></tr></table>
                </td>
                <td>
                    <div class="label">Confirm Password <span class="required">*</span></div>
                    <table class="input-box"><tr><td></td></tr></table>
                </td>
            </tr>
        </table>

        <div class="section-title">Basic Information</div>
        <table>
            <tr>
                <td width="39%">
                    <div class="label">NID <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('nid') }}</td></tr></table>
                </td>
                <td width="32%">
                    <div class="label">Full Name [English] <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('full_name_en') }}</td></tr></table>
                </td>
                <td width="29%">
                    <div class="label">Full Name [Bangla] <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('full_name_bn') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">Father's Name [English] <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('father_name_en') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Father's Occupation <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('father_occupation') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Mother's Name [English] <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('mother_name_en') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">Mother's Occupation</div>
                    <table class="input-box"><tr><td>{{ $value('mother_occupation') }}</td></tr></table>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div class="label">Sex <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('sex') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Date of birth <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $date('date_of_birth') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Person With Disability(PWD)</div>
                    <table class="input-box"><tr><td>{{ $value('pwd') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">Religion <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('religion') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Blood Group <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('blood_group') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Marital Status <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('marital_status') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">NID/Birth Certificate/Passport No <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('identity_no') }}</td></tr></table>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="footer-line"></div>
        <div class="page-no">1</div>
    </div>

    <div class="page">
        <div class="section-title" style="margin-top: 0;">Permanent Address</div>
        <table>
            <tr>
                <td width="39%">
                    <div class="label">Division <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $reg->permanentDivision->name ?? '' }}</td></tr></table>
                </td>
                <td width="32%">
                    <div class="label">District <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $reg->permanentDistrict->name ?? '' }}</td></tr></table>
                </td>
                <td width="29%">
                    <div class="label">Upazila <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $reg->permanentUpazila->name ?? '' }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">Post Office <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('permanent_post_office') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">From Rural or Urban Area <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('permanent_area_type') }}</td></tr></table>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="label">Address <span class="required">*</span></div>
                    <table class="input-box textarea-input"><tr><td>{{ $value('permanent_address') }}</td></tr></table>
                </td>
            </tr>
        </table>

        <div class="section-title">Present Address</div>
        <div class="checkbox-row">
            <span class="checkbox">{!! !empty($reg->same_as_permanent) ? '&#10003;' : '' !!}</span>
            Same as Permanent Address
        </div>
        <table>
            <tr>
                <td width="39%">
                    <div class="label">Division <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $reg->presentDivision->name ?? '' }}</td></tr></table>
                </td>
                <td width="32%">
                    <div class="label">District <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $reg->presentDistrict->name ?? '' }}</td></tr></table>
                </td>
                <td width="29%">
                    <div class="label">Upazila <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $reg->presentUpazila->name ?? '' }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="label">Address <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('present_address') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Post Office <span class="required">*</span></div>
                    <table class="input-box"><tr><td>{{ $value('present_post_office') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="label">Board/University</div>
                    <table class="input-box"><tr><td>{{ $value('board_university') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Highest Educational Level</div>
                    <table class="input-box"><tr><td>{{ $value('highest_education_level') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="label">Highest Education Institute Name</div>
                    <table class="input-box"><tr><td>{{ $value('highest_education_institute_name') }}</td></tr></table>
                </td>
                <td>
                    <div class="label">Highest Education Passing Year</div>
                    <table class="input-box"><tr><td>{{ $value('highest_education_passing_year') }}</td></tr></table>
                </td>
            </tr>
        </table>

        <div class="checkbox-row">
            <strong>TVET Certificate:</strong>
            <span class="checkbox">{!! $checked('tvet_certificate', 'Yes') !!}</span> Yes
            <span class="checkbox">{!! $checked('tvet_certificate', 'No') !!}</span> No
            <span style="display:inline-block; width: 100px;"></span>
            <strong>Ethnic Minority:</strong>
            <span class="checkbox">{!! $checked('ethnic_minority', 'Yes') !!}</span> Yes
            <span class="checkbox">{!! $checked('ethnic_minority', 'No') !!}</span> No
        </div>

        <div class="section-title">Skill, Experiences, Past Employment &amp; Income</div>
        <table>
            <tr>
                <td width="36%">
                    <div class="label">Company Name</div>
                    <table class="input-box"><tr><td>{{ $value('company_name') }}</td></tr></table>
                </td>
                <td width="25%">
                    <div class="label">Designation</div>
                    <table class="input-box"><tr><td>{{ $value('designation') }}</td></tr></table>
                </td>
                <td width="39%">
                    <div class="label">Received any skill training in the Past?</div>
                    <table class="input-box"><tr><td>{{ $value('past_skill_training') }}</td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">Employment status before training</div>
                    <table class="input-box"><tr><td>{{ $value('employment_status_before_training') }}</td></tr></table>
                </td>
                <td colspan="2">
                    <div class="label">Amount of Monthly Income (BDT) - Cash</div>
                    <table class="input-box" style="width: 260px;"><tr><td>{{ $money }}</td></tr></table>
                </td>
            </tr>
        </table>

        <div class="attachment-box">
            <strong>Attachments:</strong><br>
            &middot;&nbsp;&nbsp; 2 Copies Recent Passport Size Photo<br>
            &middot;&nbsp;&nbsp; NID Photocopy<br>
            &middot;&nbsp;&nbsp; Education Certificate Photocopy (Highest)<br>
            &middot;&nbsp;&nbsp; TVET Certificate (if any)
        </div>

        <div class="footer-line"></div>
        <div class="page-no">2</div>
    </div>
</body>

</html>
