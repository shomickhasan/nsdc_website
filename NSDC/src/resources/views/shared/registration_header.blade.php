@php
    $trainingInstitute = $trainingInstitute ?? 'Rajshahi Skill Development Centre- RSDC';
    $courseTitle = $courseTitle ?? '';
    $batchName = $batchName ?? '';
@endphp

<div class="registration-header-block">
    <div class="registration-header-top">
        <div class="registration-header-logo">
            <img src="{{ asset('image/registration/asset-project-logo.png') }}" alt="ASSET Project" width="180" height="72">
        </div>
        <div class="registration-header-title-wrap">
            <h2 class="registration-header-title">ASSET-- BWCCI Project</h2>
            <div class="registration-header-subtitle">Trainee Registration Form</div>
        </div>
        <div class="registration-header-logo registration-header-logo-right">
            <img src="{{ asset('image/registration/bwcci-logo.png') }}" alt="BWCCI Project" width="180" height="72">
        </div>
    </div>

    <div class="registration-header-info">
        <div class="registration-header-row">
            <strong>Name of the Training Institute:</strong>
            <span>{{ $trainingInstitute }}</span>
        </div>
        <div class="registration-header-row">
            <strong>Course/Trade Name:</strong>
            <span class="info-line">{{ $courseTitle ?: '................................' }}</span>
        </div>
        <div class="registration-header-row">
            <strong>Batch No:</strong>
            <span class="info-line short">{{ $batchName ?: '............................' }}</span>
        </div>
    </div>
</div>
