@extends('backend.template.template')
@section('title', 'Upload Notice')

@section('main')
    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Notices /</span>
                <span class="heading-color">Upload Notice</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('notice.index') }}" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">
                <i class="ti ti-arrow-left me-sm-1 ti-xs"></i> All Notices
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Upload New Notice</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('notice.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Notice Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter notice title">
                            @error('title')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="published_at" class="form-label">Publish Date</label>
                            <input type="date" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', now()->toDateString()) }}">
                            @error('published_at')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pdf_file" class="form-label">Notice PDF</label>
                            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" class="form-control @error('pdf_file') is-invalid @enderror">
                            <small class="text-muted">Only PDF files are allowed. Max size 10MB.</small>
                            @error('pdf_file')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 mt-4">
                            <button type="submit" class="btn btn-primary me-2">Upload Notice</button>
                            <a href="{{ route('notice.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
