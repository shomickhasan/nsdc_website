@extends('backend.template.template')
@section('title', 'Edit Gallery Content')

@section('main')
    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Gallery /</span>
                <span class="heading-color">Edit Content</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('gallery.index') }}" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">
                <i class="ti ti-arrow-left me-sm-1 ti-xs"></i> All Gallery
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Edit Gallery Content</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('gallery.update', $gallery) }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Content Type</label>
                    <select name="type" id="galleryType" class="form-select @error('type') is-invalid @enderror">
                        <option value="picture" {{ old('type', $gallery->type) === 'picture' ? 'selected' : '' }}>Pictures Gallery</option>
                        <option value="video" {{ old('type', $gallery->type) === 'video' ? 'selected' : '' }}>Video Gallery</option>
                    </select>
                    @error('type')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}" placeholder="Gallery title">
                    @error('title')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-3 gallery-picture-field">
                    <label for="image" class="form-label">Picture</label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                    <small class="text-muted">Recommended image size: 1200x800px. Upload only if you want to replace the current image.</small>
                    @error('image')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                    @if($gallery->image)
                        <div class="mt-3">
                            <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" style="width: 180px; height: 120px; object-fit: cover; border-radius: 6px;">
                        </div>
                    @endif
                </div>

                <div class="mb-3 gallery-video-field">
                    <label for="youtube_url" class="form-label">YouTube Video Link</label>
                    <input type="url" name="youtube_url" id="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror" value="{{ old('youtube_url', $gallery->youtube_url) }}" placeholder="https://www.youtube.com/watch?v=...">
                    @error('youtube_url')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="1" {{ old('status', $gallery->status) == '1' ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="0" {{ old('status', $gallery->status) == '0' ? 'checked' : '' }}>
                            <label class="form-check-label">Inactive</label>
                        </div>
                    </div>
                    @error('status')<p class="text-danger mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-3 mt-4">
                    <button type="submit" class="btn btn-primary me-2">Update Content</button>
                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function syncGalleryFields() {
            const type = document.getElementById('galleryType').value;
            document.querySelector('.gallery-picture-field').style.display = type === 'picture' ? 'block' : 'none';
            document.querySelector('.gallery-video-field').style.display = type === 'video' ? 'block' : 'none';
        }

        document.getElementById('galleryType').addEventListener('change', syncGalleryFields);
        syncGalleryFields();
    </script>
@endpush
