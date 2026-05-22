@extends('backend.template.template')
@section('title', 'Edit Registration')

@php
    $selectedCourseId = old('course_id', $reg->course_id);
    $selectedBatchId = old('batch_id', $reg->batch_id);
    $selectedAdmissionStatus = old('admission_status', $reg->admission_status ?? 'pending');
    $sameAsPermanent = (bool) old('same_as_permanent', $reg->same_as_permanent);

    $dobValue = old('date_of_birth', !empty($reg->date_of_birth) ? \Carbon\Carbon::parse($reg->date_of_birth)->format('Y-m-d') : '');
    $admittedAtValue = old('admitted_at', !empty($reg->admitted_at) ? \Carbon\Carbon::parse($reg->admitted_at)->format('Y-m-d\TH:i') : '');

    $selectedPermanentDivisionId = old('permanent_division_id', $reg->permanent_division_id);
    $selectedPermanentDistrictId = old('permanent_district_id', $reg->permanent_district_id);
    $selectedPermanentUpazilaId = old('permanent_upazila_id', $reg->permanent_upazila_id);
    $selectedPresentDivisionId = old('present_division_id', $reg->present_division_id);
    $selectedPresentDistrictId = old('present_district_id', $reg->present_district_id);
    $selectedPresentUpazilaId = old('present_upazila_id', $reg->present_upazila_id);
@endphp

@section('main')
    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Administration / Registrations /</span>
                <span class="heading-color">Edit</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('registration.show', $reg->id) }}" class="btn btn-outline-secondary me-1">
                <i class="ti ti-eye me-1"></i> Preview
            </a>
            <a href="{{ route('registration.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left me-1"></i> All Registrations
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('registration.update', $reg->id) }}" id="registrationEditForm">
        @csrf

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Course & Admission</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Course <span class="text-danger">*</span></label>
                        <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror">
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ (string) $selectedCourseId === (string) $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Batch</label>
                        <select name="batch_id" id="batch_id" class="form-select @error('batch_id') is-invalid @enderror"
                                data-selected="{{ $selectedBatchId }}">
                            <option value="">Select Batch</option>
                        </select>
                        @error('batch_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Admission Status</label>
                        <select name="admission_status" id="admission_status" class="form-select @error('admission_status') is-invalid @enderror">
                            <option value="pending" {{ $selectedAdmissionStatus === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="admitted" {{ $selectedAdmissionStatus === 'admitted' ? 'selected' : '' }}>Admitted</option>
                        </select>
                        @error('admission_status')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Admitted At</label>
                        <input type="datetime-local" name="admitted_at" id="admitted_at"
                               class="form-control @error('admitted_at') is-invalid @enderror"
                               value="{{ $admittedAtValue }}">
                        @error('admitted_at')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Basic Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $reg->email) }}">
                        @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone', $reg->phone) }}">
                        @error('phone')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Emergency Contact No <span class="text-danger">*</span></label>
                        <input type="text" name="emergency_contact_no" class="form-control @error('emergency_contact_no') is-invalid @enderror"
                               value="{{ old('emergency_contact_no', $reg->emergency_contact_no) }}">
                        @error('emergency_contact_no')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">NID <span class="text-danger">*</span></label>
                        <input type="text" name="nid" class="form-control @error('nid') is-invalid @enderror"
                               value="{{ old('nid', $reg->nid) }}">
                        @error('nid')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Full Name [English] <span class="text-danger">*</span></label>
                        <input type="text" name="full_name_en" class="form-control @error('full_name_en') is-invalid @enderror"
                               value="{{ old('full_name_en', $reg->full_name_en) }}">
                        @error('full_name_en')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Full Name [Bangla] <span class="text-danger">*</span></label>
                        <input type="text" name="full_name_bn" class="form-control @error('full_name_bn') is-invalid @enderror"
                               value="{{ old('full_name_bn', $reg->full_name_bn) }}">
                        @error('full_name_bn')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Father's Name [English] <span class="text-danger">*</span></label>
                        <input type="text" name="father_name_en" class="form-control @error('father_name_en') is-invalid @enderror"
                               value="{{ old('father_name_en', $reg->father_name_en) }}">
                        @error('father_name_en')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Father's Occupation</label>
                        <input type="text" name="father_occupation" class="form-control @error('father_occupation') is-invalid @enderror"
                               value="{{ old('father_occupation', $reg->father_occupation) }}">
                        @error('father_occupation')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mother's Name [English] <span class="text-danger">*</span></label>
                        <input type="text" name="mother_name_en" class="form-control @error('mother_name_en') is-invalid @enderror"
                               value="{{ old('mother_name_en', $reg->mother_name_en) }}">
                        @error('mother_name_en')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mother's Occupation</label>
                        <input type="text" name="mother_occupation" class="form-control @error('mother_occupation') is-invalid @enderror"
                               value="{{ old('mother_occupation', $reg->mother_occupation) }}">
                        @error('mother_occupation')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Sex <span class="text-danger">*</span></label>
                        <select name="sex" class="form-select @error('sex') is-invalid @enderror">
                            <option value="">Select Sex</option>
                            @foreach(['Male','Female','Other'] as $sex)
                                <option value="{{ $sex }}" {{ old('sex', $reg->sex) === $sex ? 'selected' : '' }}>{{ $sex }}</option>
                            @endforeach
                        </select>
                        @error('sex')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"
                               value="{{ $dobValue }}">
                        @error('date_of_birth')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Person With Disability (PWD)</label>
                        <select name="pwd" class="form-select @error('pwd') is-invalid @enderror">
                            <option value="">Select</option>
                            @foreach(['Yes','No'] as $pwd)
                                <option value="{{ $pwd }}" {{ old('pwd', $reg->pwd) === $pwd ? 'selected' : '' }}>{{ $pwd }}</option>
                            @endforeach
                        </select>
                        @error('pwd')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Religion <span class="text-danger">*</span></label>
                        <input type="text" name="religion" class="form-control @error('religion') is-invalid @enderror"
                               value="{{ old('religion', $reg->religion) }}">
                        @error('religion')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                        <select name="blood_group" class="form-select @error('blood_group') is-invalid @enderror">
                            <option value="">Select Blood Group</option>
                            @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bloodGroup)
                                <option value="{{ $bloodGroup }}" {{ old('blood_group', $reg->blood_group) === $bloodGroup ? 'selected' : '' }}>
                                    {{ $bloodGroup }}
                                </option>
                            @endforeach
                        </select>
                        @error('blood_group')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Marital Status</label>
                        <select name="marital_status" class="form-select @error('marital_status') is-invalid @enderror">
                            <option value="">Select Status</option>
                            @foreach(['Married','Unmarried'] as $maritalStatus)
                                <option value="{{ $maritalStatus }}" {{ old('marital_status', $reg->marital_status) === $maritalStatus ? 'selected' : '' }}>
                                    {{ $maritalStatus }}
                                </option>
                            @endforeach
                        </select>
                        @error('marital_status')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">NID/Birth Certificate/Passport No</label>
                        <input type="text" name="identity_no" class="form-control @error('identity_no') is-invalid @enderror"
                               value="{{ old('identity_no', $reg->identity_no) }}">
                        @error('identity_no')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Permanent Address</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Division <span class="text-danger">*</span></label>
                        <select name="permanent_division_id" id="permanent_division_id"
                                class="form-select @error('permanent_division_id') is-invalid @enderror"
                                data-selected-district="{{ $selectedPermanentDistrictId }}"
                                data-selected-upazila="{{ $selectedPermanentUpazilaId }}">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}" {{ (string) $selectedPermanentDivisionId === (string) $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('permanent_division_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">District <span class="text-danger">*</span></label>
                        <select name="permanent_district_id" id="permanent_district_id" class="form-select @error('permanent_district_id') is-invalid @enderror"></select>
                        @error('permanent_district_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Upazila <span class="text-danger">*</span></label>
                        <select name="permanent_upazila_id" id="permanent_upazila_id" class="form-select @error('permanent_upazila_id') is-invalid @enderror"></select>
                        @error('permanent_upazila_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Post Office <span class="text-danger">*</span></label>
                        <input type="text" name="permanent_post_office" id="permanent_post_office"
                               class="form-control @error('permanent_post_office') is-invalid @enderror"
                               value="{{ old('permanent_post_office', $reg->permanent_post_office) }}">
                        @error('permanent_post_office')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Rural or Urban Area</label>
                        <select name="permanent_area_type" class="form-select @error('permanent_area_type') is-invalid @enderror">
                            <option value="">Select Area Type</option>
                            @foreach(['Rural','Urban'] as $areaType)
                                <option value="{{ $areaType }}" {{ old('permanent_area_type', $reg->permanent_area_type) === $areaType ? 'selected' : '' }}>
                                    {{ $areaType }}
                                </option>
                            @endforeach
                        </select>
                        @error('permanent_area_type')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea name="permanent_address" id="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror" rows="3">{{ old('permanent_address', $reg->permanent_address) }}</textarea>
                        @error('permanent_address')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Present Address</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="same_as_permanent" name="same_as_permanent" value="1" {{ $sameAsPermanent ? 'checked' : '' }}>
                            <label class="form-check-label" for="same_as_permanent">Same as Permanent Address</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Division <span class="text-danger">*</span></label>
                        <select name="present_division_id" id="present_division_id"
                                class="form-select @error('present_division_id') is-invalid @enderror"
                                data-selected-district="{{ $selectedPresentDistrictId }}"
                                data-selected-upazila="{{ $selectedPresentUpazilaId }}">
                            <option value="">Select Division</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}" {{ (string) $selectedPresentDivisionId === (string) $division->id ? 'selected' : '' }}>
                                    {{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('present_division_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">District <span class="text-danger">*</span></label>
                        <select name="present_district_id" id="present_district_id" class="form-select @error('present_district_id') is-invalid @enderror"></select>
                        @error('present_district_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Upazila <span class="text-danger">*</span></label>
                        <select name="present_upazila_id" id="present_upazila_id" class="form-select @error('present_upazila_id') is-invalid @enderror"></select>
                        @error('present_upazila_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Post Office <span class="text-danger">*</span></label>
                        <input type="text" name="present_post_office" id="present_post_office"
                               class="form-control @error('present_post_office') is-invalid @enderror"
                               value="{{ old('present_post_office', $reg->present_post_office) }}">
                        @error('present_post_office')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea name="present_address" id="present_address" class="form-control @error('present_address') is-invalid @enderror" rows="3">{{ old('present_address', $reg->present_address) }}</textarea>
                        @error('present_address')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Education Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Board/University</label>
                        <input type="text" name="board_university" class="form-control @error('board_university') is-invalid @enderror"
                               value="{{ old('board_university', $reg->board_university) }}">
                        @error('board_university')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Highest Educational Level</label>
                        <input type="text" name="highest_education_level" class="form-control @error('highest_education_level') is-invalid @enderror"
                               value="{{ old('highest_education_level', $reg->highest_education_level) }}">
                        @error('highest_education_level')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Highest Education Institute Name</label>
                        <input type="text" name="highest_education_institute_name" class="form-control @error('highest_education_institute_name') is-invalid @enderror"
                               value="{{ old('highest_education_institute_name', $reg->highest_education_institute_name) }}">
                        @error('highest_education_institute_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Highest Education Passing Year</label>
                        <input type="text" name="highest_education_passing_year" class="form-control @error('highest_education_passing_year') is-invalid @enderror"
                               value="{{ old('highest_education_passing_year', $reg->highest_education_passing_year) }}">
                        @error('highest_education_passing_year')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">TVET Certificate</label>
                        <select name="tvet_certificate" class="form-select @error('tvet_certificate') is-invalid @enderror">
                            <option value="">Select</option>
                            @foreach(['Yes','No'] as $choice)
                                <option value="{{ $choice }}" {{ old('tvet_certificate', $reg->tvet_certificate) === $choice ? 'selected' : '' }}>{{ $choice }}</option>
                            @endforeach
                        </select>
                        @error('tvet_certificate')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Ethnic Minority</label>
                        <select name="ethnic_minority" class="form-select @error('ethnic_minority') is-invalid @enderror">
                            <option value="">Select</option>
                            @foreach(['Yes','No'] as $choice)
                                <option value="{{ $choice }}" {{ old('ethnic_minority', $reg->ethnic_minority) === $choice ? 'selected' : '' }}>{{ $choice }}</option>
                            @endforeach
                        </select>
                        @error('ethnic_minority')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Skill, Experience & Income</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror"
                               value="{{ old('company_name', $reg->company_name) }}">
                        @error('company_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                               value="{{ old('designation', $reg->designation) }}">
                        @error('designation')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Past Skill Training</label>
                        <input type="text" name="past_skill_training" class="form-control @error('past_skill_training') is-invalid @enderror"
                               value="{{ old('past_skill_training', $reg->past_skill_training) }}">
                        @error('past_skill_training')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Employment Status Before Training</label>
                        <input type="text" name="employment_status_before_training" class="form-control @error('employment_status_before_training') is-invalid @enderror"
                               value="{{ old('employment_status_before_training', $reg->employment_status_before_training) }}">
                        @error('employment_status_before_training')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Monthly Income (BDT)</label>
                        <input type="number" step="0.01" name="monthly_income" class="form-control @error('monthly_income') is-invalid @enderror"
                               value="{{ old('monthly_income', $reg->monthly_income) }}">
                        @error('monthly_income')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex justify-content-end gap-2">
                <a href="{{ route('registration.show', $reg->id) }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy me-1"></i> Update Registration
                </button>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        const batches = @json($batches);
        const districts = @json($districts);
        const upazilas = @json($upazilas);

        function appendOption($select, value, label, selectedValue) {
            const option = new Option(label, value, false, String(value) === String(selectedValue));
            $select.append(option);
        }

        function loadBatches(selectedBatchId = '') {
            const courseId = $('#course_id').val();
            const $batchSelect = $('#batch_id');

            $batchSelect.empty().append(new Option('Select Batch', ''));

            batches
                .filter(batch => String(batch.course_id) === String(courseId))
                .forEach(batch => {
                    const label = batch.batch_code ? `${batch.batch_name} (${batch.batch_code})` : batch.batch_name;
                    appendOption($batchSelect, batch.id, label, selectedBatchId);
                });
        }

        function loadDistricts(prefix, selectedDistrictId = '', selectedUpazilaId = '') {
            const divisionId = $(`#${prefix}_division_id`).val();
            const $districtSelect = $(`#${prefix}_district_id`);

            $districtSelect.empty().append(new Option('Select District', ''));

            districts
                .filter(district => String(district.division_id) === String(divisionId))
                .forEach(district => {
                    appendOption($districtSelect, district.id, district.name, selectedDistrictId);
                });

            loadUpazilas(prefix, selectedUpazilaId);
        }

        function loadUpazilas(prefix, selectedUpazilaId = '') {
            const districtId = $(`#${prefix}_district_id`).val();
            const $upazilaSelect = $(`#${prefix}_upazila_id`);

            $upazilaSelect.empty().append(new Option('Select Upazila', ''));

            upazilas
                .filter(upazila => String(upazila.district_id) === String(districtId))
                .forEach(upazila => {
                    appendOption($upazilaSelect, upazila.id, upazila.name, selectedUpazilaId);
                });
        }

        function copyPermanentAddress() {
            $('#present_division_id').val($('#permanent_division_id').val());
            loadDistricts('present', $('#permanent_district_id').val(), $('#permanent_upazila_id').val());
            $('#present_post_office').val($('#permanent_post_office').val());
            $('#present_address').val($('#permanent_address').val());
        }

        function syncAdmissionFields() {
            const isAdmitted = $('#admission_status').val() === 'admitted';
            $('#batch_id, #admitted_at').prop('disabled', !isAdmitted);
        }

        $(document).ready(function () {
            loadBatches($('#batch_id').data('selected'));

            loadDistricts(
                'permanent',
                $('#permanent_division_id').data('selected-district'),
                $('#permanent_division_id').data('selected-upazila')
            );

            loadDistricts(
                'present',
                $('#present_division_id').data('selected-district'),
                $('#present_division_id').data('selected-upazila')
            );

            syncAdmissionFields();

            $('#course_id').on('change', function () {
                loadBatches('');
            });

            $('#admission_status').on('change', syncAdmissionFields);

            $('#permanent_division_id').on('change', function () {
                loadDistricts('permanent');
                if ($('#same_as_permanent').is(':checked')) {
                    copyPermanentAddress();
                }
            });

            $('#permanent_district_id').on('change', function () {
                loadUpazilas('permanent');
                if ($('#same_as_permanent').is(':checked')) {
                    copyPermanentAddress();
                }
            });

            $('#permanent_upazila_id, #permanent_post_office, #permanent_address').on('change keyup', function () {
                if ($('#same_as_permanent').is(':checked')) {
                    copyPermanentAddress();
                }
            });

            $('#present_division_id').on('change', function () {
                loadDistricts('present');
            });

            $('#present_district_id').on('change', function () {
                loadUpazilas('present');
            });

            $('#same_as_permanent').on('change', function () {
                if ($(this).is(':checked')) {
                    copyPermanentAddress();
                }
            });

            $('#registrationEditForm').on('submit', function () {
                if ($('#same_as_permanent').is(':checked')) {
                    copyPermanentAddress();
                }

                $('#batch_id, #admitted_at').prop('disabled', false);
            });
        });
    </script>
@endpush
