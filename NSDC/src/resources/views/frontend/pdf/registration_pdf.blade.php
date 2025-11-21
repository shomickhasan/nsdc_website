<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <style>
        @page { margin: 15px; }
        body { font-family: nikosh, sans-serif; font-size: 14px; line-height: 1.4; color: #333; }

        /* Card container */
        .admit-card {
            border: 2px solid #007BFF;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }

        /* Header */
        .card-header {
            text-align: center;
            margin-bottom: 15px;
        }
        .card-header img { width: 80px; }
        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #007BFF;
            margin-top: 5px;
        }
        .copy-label {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: #dc3545;
            margin: 5px 0;
        }

        /* Table styles */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 6px; border: 1px solid #007BFF; vertical-align: top; }
        .section-title {
            background-color: #007BFF;
            color: #fff;
            padding: 5px;
            font-weight: bold;
            text-align: center;
        }

        /* Photo & Signature */
        .photo-sign { text-align:center; }
        .photo-sign img { border: 1px solid #333; border-radius: 5px; }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 10px;
            color: #555;
        }

        /* Page break between copies */
        .page-break { page-break-after: always; }
    </style>
</head>
<body>

@php
    $copies = ['Office Copy', 'Student Copy'];
@endphp

@foreach($copies as $copy)
    <div class="admit-card">

        <div class="copy-label">{{ $copy }}</div>

        <div class="card-header">
            <img src="{{ public_path('logo.png') }}" alt="Logo">
            <div class="card-title">National Skills Development Center</div>
        </div>

        <table>
            <tr>
                <td><strong>Name:</strong> {{ $reg->name }}</td>
                <td><strong>Name (Bangla):</strong> {{ $reg->name_bn }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong> {{ $reg->email }}</td>
                <td><strong>Phone:</strong> {{ $reg->phone }}</td>
            </tr>
            <tr>
                <td><strong>Date of Birth:</strong> {{ $reg->dob }}</td>
                <td><strong>NID:</strong> {{ $reg->nid_number }}</td>
            </tr>
            <tr>
                <td><strong>Father Name:</strong> {{ $reg->father_name }}</td>
                <td><strong>Father Name (Bangla):</strong> {{ $reg->father_name_bn }}</td>
            </tr>
            <tr>
                <td><strong>Mother Name:</strong> {{ $reg->mother_name }}</td>
                <td><strong>Mother Name (Bangla):</strong> {{ $reg->mother_name_bn }}</td>
            </tr>
            <tr>
                <td><strong>Present Address:</strong> {{ $reg->present_address }}</td>
                <td><strong>Permanent Address:</strong> {{ $reg->permanent_address }}</td>
            </tr>
            <tr>
                <td><strong>Gender:</strong> {{ $reg->gender }}</td>
                <td><strong>Religion:</strong> {{ $reg->religion }}</td>
            </tr>
            <tr>
                <td><strong>Height:</strong> {{ $reg->height }}</td>
                <td><strong>Weight:</strong> {{ $reg->weight }}</td>
            </tr>
            <tr>
                <td><strong>Education:</strong> {{ $reg->education }}</td>
                <td><strong>Course:</strong> {{ $reg->course->title ?? 'N/A' }}</td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td class="photo-sign">
                    <strong>Photo:</strong><br>
                    <img src="{{ public_path('storage/'.$reg->photo) }}" width="120" height="120" alt="Photo">
                </td>
                <td class="photo-sign">
                    <strong>Signature:</strong><br>
                    <img src="{{ public_path('storage/'.$reg->signature) }}" width="200" alt="Signature">
                </td>
            </tr>
        </table>

        <div class="footer">
            This is a computer-generated admit card. Please verify all information before submission.
        </div>
    </div>

    @if(!$loop->last)
        <div class="page-break"></div>
    @endif

@endforeach

</body>
</html>
