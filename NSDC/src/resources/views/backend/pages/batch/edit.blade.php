@extends('backend.template.template')
@section('title', 'Edit Batch')

@section('main')

    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Batches /</span>
                <span class="heading-color">Edit Batch</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('batch.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left"></i> All Batches
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Edit Batch</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('batch.update', $batch->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Course --}}
                        <div class="mb-3">
                            <label class="form-label">Course</label>
                            <select name="course_id" class="form-control">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $batch->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Batch Name --}}
                        <div class="mb-3">
                            <label class="form-label">Batch Name</label>
                            <input type="text" name="batch_name" class="form-control"
                                   value="{{ old('batch_name', $batch->batch_name) }}">
                        </div>

                        {{-- Batch Code --}}
                        <div class="mb-3">
                            <label class="form-label">Batch Code</label>
                            <input type="text" name="batch_code" class="form-control"
                                   value="{{ old('batch_code', $batch->batch_code) }}">
                        </div>

                        {{-- Slug --}}
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control"
                                   value="{{ old('slug', $batch->slug) }}">
                        </div>

                        {{-- Open At --}}
                        <div class="mb-3">
                            <label class="form-label">Open At</label>
                            <input type="datetime-local" name="open_at" class="form-control"
                                   value="{{ $batch->open_at ? \Carbon\Carbon::parse($batch->open_at)->format('Y-m-d\TH:i') : '' }}">
                        </div>

                        {{-- Complete At --}}
                        <div class="mb-3">
                            <label class="form-label">Complete At</label>
                            <input type="datetime-local" name="complete_at" class="form-control"
                                   value="{{ $batch->complete_at ? \Carbon\Carbon::parse($batch->complete_at)->format('Y-m-d\TH:i') : '' }}">
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label">Status</label>

                            <div class="form-check">
                                <input type="radio" name="status" value="1"
                                    {{ $batch->status == 1 ? 'checked' : '' }}>
                                <label>Open</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" name="status" value="0"
                                    {{ $batch->status == 0 ? 'checked' : '' }}>
                                <label>Inactive</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" name="status" value="2"
                                    {{ $batch->status == 2 ? 'checked' : '' }}>
                                <label>Full</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" name="status" value="3"
                                    {{ $batch->status == 3 ? 'checked' : '' }}>
                                <label>Complete</label>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('batch.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
