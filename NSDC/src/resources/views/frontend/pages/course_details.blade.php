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

    <section class="course-registration-form py-0" style="background-color:#f8f9fa;">
        <div class="container">
            <h2 class="text-center mb-4">Register for {{ $course->title }}</h2>

            <div class="card shadow-sm p-4" style="background-color:#242F6F; border-radius:10px;">
                <form method="POST" action="{{route('registration.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                        <!-- Full Name -->
                        <div class="col-12">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter your full name">
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Full Name (Bangla)</label>
                            <input type="text" name="name_bn" class="form-control form-control-lg @error('name_bn') is-invalid @enderror" value="{{ old('name_bn') }}" placeholder="আপনার নাম লিখুন">
                            @error('name_bn') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email & Phone -->
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter your email">
                            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter your phone number">
                            @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Date of Birth & NID -->
                        <div class="col-12">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control form-control-lg @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                            @error('dob') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">NID Number</label>
                            <input type="text" name="nid_number" class="form-control form-control-lg @error('nid_number') is-invalid @enderror" value="{{ old('nid_number') }}" placeholder="Enter NID number">
                            @error('nid_number') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Parents' Info -->
                        <div class="col-12">
                            <label class="form-label">Father's Name</label>
                            <input type="text" name="father_name" class="form-control form-control-lg @error('father_name') is-invalid @enderror" value="{{ old('father_name') }}" placeholder="Father's Name">
                            @error('father_name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Father's Name (Bangla)</label>
                            <input type="text" name="father_name_bn" class="form-control form-control-lg @error('father_name_bn') is-invalid @enderror" value="{{ old('father_name_bn') }}" placeholder="পিতার নাম">
                            @error('father_name_bn') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" name="mother_name" class="form-control form-control-lg @error('mother_name') is-invalid @enderror" value="{{ old('mother_name') }}" placeholder="Mother's Name">
                            @error('mother_name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Mother's Name (Bangla)</label>
                            <input type="text" name="mother_name_bn" class="form-control form-control-lg @error('mother_name_bn') is-invalid @enderror" value="{{ old('mother_name_bn') }}" placeholder="মাতার নাম">
                            @error('mother_name_bn') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Addresses -->
                        <div class="col-12">
                            <label class="form-label">Present Address</label>
                            <input type="text" name="present_address" class="form-control form-control-lg @error('present_address') is-invalid @enderror" value="{{ old('present_address') }}" placeholder="Present Address">
                            @error('present_address') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Permanent Address</label>
                            <input type="text" name="permanent_address" class="form-control form-control-lg @error('permanent_address') is-invalid @enderror" value="{{ old('permanent_address') }}" placeholder="Permanent Address">
                            @error('permanent_address') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Gender Radio -->
                        <div class="col-12">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="male" value="Male" {{ old('gender')=='Male' ? 'checked':'' }}>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="female" value="Female" {{ old('gender')=='Female' ? 'checked':'' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="other" value="Other" {{ old('gender')=='Other' ? 'checked':'' }}>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                            @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Educational Qualification -->
                        <!-- Educational Qualification (Radio) -->
                        <div class="col-12">
                            <label class="form-label d-block">Highest Educational Qualification</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('education') is-invalid @enderror" type="radio" name="education" id="ssc" value="SSC" {{ old('education') == 'SSC' ? 'checked' : '' }}>
                                <label class="form-check-label" for="ssc">SSC</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('education') is-invalid @enderror" type="radio" name="education" id="hsc" value="HSC" {{ old('education') == 'HSC' ? 'checked' : '' }}>
                                <label class="form-check-label" for="hsc">HSC</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('education') is-invalid @enderror" type="radio" name="education" id="honours" value="Honours" {{ old('education') == 'Honours' ? 'checked' : '' }}>
                                <label class="form-check-label" for="honours">Honours</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('education') is-invalid @enderror" type="radio" name="education" id="degree_pass" value="Degree (Pass)" {{ old('education') == 'Degree (Pass)' ? 'checked' : '' }}>
                                <label class="form-check-label" for="degree_pass">Degree (Pass)</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('education') is-invalid @enderror" type="radio" name="education" id="masters" value="Masters" {{ old('education') == 'Masters' ? 'checked' : '' }}>
                                <label class="form-check-label" for="masters">Masters</label>
                            </div>

                            @error('education') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>



                        <!-- Religion, Height, Weight -->
                        <div class="col-12">
                            <label class="form-label">Religion</label>
                            <input type="text" name="religion" class="form-control form-control-lg @error('religion') is-invalid @enderror" value="{{ old('religion') }}" placeholder="Religion">
                            @error('religion') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Height</label>
                            <input type="text" name="height" class="form-control form-control-lg @error('height') is-invalid @enderror" value="{{ old('height') }}" placeholder="Height">
                            @error('height') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Weight</label>
                            <input type="text" name="weight" class="form-control form-control-lg @error('weight') is-invalid @enderror" value="{{ old('weight') }}" placeholder="Weight">
                            @error('weight') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="col-12">
                            <label class="form-label">Photo (300x300)</label>
                            <input type="file" name="photo" class="form-control form-control-lg @error('photo') is-invalid @enderror">
                            @error('photo') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Signature (300x80)</label>
                            <input type="file" name="signature" class="form-control form-control-lg @error('signature') is-invalid @enderror">
                            @error('signature') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>

                        <!-- Submit -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 btn-lg mt-3">Submit Registration</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
