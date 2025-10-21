@extends('backend.template.template')
@section('title', 'Edit Course')
@push('css')
@endpush

@section('main')

    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Courses /</span>
                <span class="heading-color">Edit Course</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('course.index') }}" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">
                <i class="ti ti-arrow-left me-sm-1 ti-xs"></i> All Courses
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Edit Course</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" placeholder="Course Title" value="{{ old('title', $course->title) }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Duration -->
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" name="duration"
                                class="form-control @error('duration') is-invalid @enderror" id="duration"
                                placeholder="Course Duration" value="{{ old('duration', $course->duration) }}">
                            @error('duration')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div class="mb-3">
                            <label for="short_des" class="form-label">Short Description</label>
                            <textarea name="short_des" class="form-control @error('short_des') is-invalid @enderror" id="short_des" rows="3"
                                placeholder="Short Description">{{ old('short_des', $course->short_des) }}</textarea>
                            @error('short_des')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Long Description -->
                        <div class="mb-3">
                            <label for="long_des" class="form-label">Long Description</label>
                            <textarea name="long_des" class="form-control @error('long_des') is-invalid @enderror" id="summernote" rows="5"
                                placeholder="Long Description">{{ old('long_des', $course->long_des) }}</textarea>
                            @error('long_des')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Course Fee -->
                        <div class="mb-3">
                            <label for="course_fee" class="form-label">Course Fee</label>
                            <input type="text" name="course_fee"
                                class="form-control @error('course_fee') is-invalid @enderror" id="course_fee"
                                placeholder="Course Fee" value="{{ old('course_fee', $course->course_fee) }}">
                            @error('course_fee')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="1"
                                        {{ old('status', $course->status) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="0"
                                        {{ old('status', $course->status) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label">Inactive</label>
                                </div>
                            </div>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Show in Home -->
                        <div class="mb-3">
                            <label class="form-label">Show in Home</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_show_in_home" value="1"
                                        {{ old('is_show_in_home', $course->is_show_in_home) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_show_in_home" value="0"
                                        {{ old('is_show_in_home', $course->is_show_in_home) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>
                            @error('is_show_in_home')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Picture -->
                        <div class="mb-3">
                            <label for="picture" class="form-label">Course Image</label>
                            <input type="file" name="picture"
                                class="form-control @error('picture') is-invalid @enderror" id="picture">
                            @error('picture')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="mt-3" style="width: 150px; height: 100px;">

                                <img class="img-responsive" src="{{ Storage::url($course->picture) }}"
                                    style="width:100%; height:100%;" alt="Course Image">

                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mb-3 mt-4">
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
@endpush
