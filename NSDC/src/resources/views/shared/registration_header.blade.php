<!-- Registration Header Section Start -->
<style>
    .registration-header-block {
        width: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        margin-bottom: 30px;
    }

    /* 3ta logo ke ek line-e ebong vertically middle-e anar jonno */
    .registration-header-logos-row {
        display: flex;
        justify-content: space-between;
        /* Logo gulo 3 dike thakbe */
        align-items: center;
        /* Vertically middle korbe */
        gap: 15px;
        margin-bottom: 20px;
    }

    .header-logo-item {
        flex: 1;
        display: flex;
    }

    /* Alignment Fix */
    .logo-left {
        justify-content: flex-start;
    }

    .logo-center {
        justify-content: center;
    }

    .logo-right {
        justify-content: flex-end;
    }

    .header-logo-item img {
        /* Logo gulo ekoi height-e thakle alignment sundor lage */
        height: 60px;
        width: auto;
        object-fit: contain;
        display: block;
    }

    /* Title Section */
    .registration-header-title-wrap {
        text-align: center;
        margin-bottom: 25px;
        border-top: 1px solid #eee;
        padding-top: 15px;
    }

    .registration-header-title {
        font-size: 24px;
        font-weight: 800;
        margin: 0;
        color: #1a1a1a;
        letter-spacing: 1px;
    }

    .registration-header-subtitle {
        font-size: 16px;
        font-weight: 600;
        margin-top: 5px;
        display: inline-block;
        padding: 2px 15px;
        background: #f8f9fa;
        border-radius: 20px;
        border: 1px solid #ddd;
    }

    /* Info Section Styles */
    .registration-header-info {
        margin-top: 20px;
        line-height: 1.8;
    }

    .registration-header-row {
        display: flex;
        align-items: flex-end;
        /* Dotted line gulo text er sathe thik thakbe */
        margin-bottom: 12px;
        font-size: 15px;
    }

    .registration-header-row strong {
        margin-right: 10px;
        white-space: nowrap;
        color: #444;
    }

    .info-line {
        flex-grow: 1;
        border-bottom: 1.5px dotted #999;
        min-height: 1.2em;
        padding-left: 10px;
        font-weight: 500;
        color: #000;
    }

    .info-line.short {
        flex-grow: 0;
        min-width: 180px;
    }
</style>

@php
    $trainingInstitute = $trainingInstitute ?? 'Rajshahi Skill Development Centre- RSDC';
    $courseTitle = $courseTitle ?? '';
    $batchName = $batchName ?? '';
@endphp

<div class="registration-header-block">

    <!-- Logos Row (Vertically and Horizontally Aligned) -->
    <div class="registration-header-logos-row">
        <!-- Logo 1: Left -->
        <div class="header-logo-item logo-left">
            <img src="{{ asset('image/registration/180_72.png') }}" alt="Logo 1">
        </div>

        <!-- Logo 2: Center -->
        <div class="header-logo-item logo-center">
            <img src="{{ asset('image/registration/bwcci-logo.png') }}" alt="Logo 2">
        </div>

        <!-- Logo 3: Right -->
        <div class="header-logo-item logo-right">
            <!-- Ekhane tomar 3rd logo path-ti boshao -->
            <img src="{{ asset('image/registration/asset-project-logo.png') }}" alt="Logo 3">
        </div>
    </div>

    <!-- Title & Subtitle Section -->
    <div class="registration-header-title-wrap">
        <h2 class="registration-header-title">ASSET-- BWCCI Project</h2>
        <div class="registration-header-subtitle">Trainee Registration Form</div>
    </div>

    <!-- Info Section -->
    <div class="registration-header-info">
        <div class="registration-header-row">
            <strong>Name of the Training Institute:</strong>
            <span class="info-line">{{ $trainingInstitute }}</span>
        </div>
        <div class="registration-header-row">
            <strong>Course/Trade Name:</strong>
            <span class="info-line">{{ $courseTitle ?: '' }}</span>
        </div>
        <div class="registration-header-row">
            <strong>Batch No:</strong>
            <span class="info-line short">{{ $batchName ?: '' }}</span>
        </div>
    </div>

</div>
<!-- Registration Header Section End -->
