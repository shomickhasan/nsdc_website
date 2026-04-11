@extends('backend.template.template')
@section('title', 'Batches')
@push('css')
@endpush
@section('main')

    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Batches /</span>
                <span class="heading-color">Create Batch</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('batch.index') }}" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">
                <i class="ti ti-arrow-left me-sm-1 ti-xs"></i> All Batches
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Create Batch</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('batch.store') }}">
                        @csrf

                        <!-- Course -->
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select name="course_id" id="course_id"
                                    class="form-control @error('course_id') is-invalid @enderror">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Batch Name -->
                        <div class="mb-3">
                            <label for="batch_name" class="form-label">Batch Name</label>
                            <input type="text" name="batch_name"
                                   class="form-control @error('batch_name') is-invalid @enderror"
                                   id="batch_name" placeholder="Batch Name" value="{{ old('batch_name') }}">
                            @error('batch_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Batch Code -->
                        <div class="mb-3">
                            <label for="batch_code" class="form-label">Batch Code</label>
                            <input type="text" name="batch_code"
                                   class="form-control @error('batch_code') is-invalid @enderror"
                                   id="batch_code" placeholder="Batch Code" value="{{ old('batch_code') }}">
                            @error('batch_code')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   id="slug" placeholder="Batch Slug" value="{{ old('slug') }}">
                            @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Open At -->
                        <div class="mb-3">
                            <label for="open_at" class="form-label">Open At</label>
                            <input type="datetime-local" name="open_at"
                                   class="form-control @error('open_at') is-invalid @enderror"
                                   id="open_at" value="{{ old('open_at') }}">
                            @error('open_at')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Complete At -->
                        <div class="mb-3">
                            <label for="complete_at" class="form-label">Complete At</label>
                            <input type="datetime-local" name="complete_at"
                                   class="form-control @error('complete_at') is-invalid @enderror"
                                   id="complete_at" value="{{ old('complete_at') }}">
                            @error('complete_at')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="1"
                                        {{ old('status', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label">Open</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="0"
                                        {{ old('status') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label">Inactive</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="2"
                                        {{ old('status') == '2' ? 'checked' : '' }}>
                                    <label class="form-check-label">Full</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="3"
                                        {{ old('status') == '3' ? 'checked' : '' }}>
                                    <label class="form-check-label">Batch Complete</label>
                                </div>
                            </div>
                            @error('status')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="mb-3 mt-4">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        document.getElementById('batch_name').addEventListener('keyup', function () {
            let value = this.value.toLowerCase().trim();
            value = value.replace(/[^a-z0-9\s-]/g, '');
            value = value.replace(/\s+/g, '-');
            value = value.replace(/-+/g, '-');
            document.getElementById('slug').value = value;
        });
    </script>
@endpush
