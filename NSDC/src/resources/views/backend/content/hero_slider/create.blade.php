@extends('backend.template.template')
@section('title', 'Hero Slider Create')

@section('main')

    <div class="row mb-2">
        <div class="col">
            <h4 class="py-3 mb-4 fs-5 d-inline">
                <span class="text-muted fw-light">Hero Slider /</span>
                <span class="heading-color">Create Slider</span>
            </h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('hero_slider.index') }}" class="btn btn-primary">
                <i class="ti ti-arrow-left me-1"></i> All Sliders
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('hero_slider.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button 1 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Button 1 Text</label>
                        <input type="text" name="button1_text"
                               class="form-control @error('button1_text') is-invalid @enderror"
                               value="{{ old('button1_text') }}">
                        @error('button1_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Button 1 Link</label>
                        <input type="text" name="button1_link"
                               class="form-control @error('button1_link') is-invalid @enderror"
                               value="{{ old('button1_link') }}">
                        @error('button1_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Button 2 -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Button 2 Text</label>
                        <input type="text" name="button2_text"
                               class="form-control @error('button2_text') is-invalid @enderror"
                               value="{{ old('button2_text') }}">
                        @error('button2_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Button 2 Link</label>
                        <input type="text" name="button2_link"
                               class="form-control @error('button2_link') is-invalid @enderror"
                               value="{{ old('button2_link') }}">
                        @error('button2_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="1" {{ old('status',1)==1 ? 'checked' : '' }}> Active
                    <input type="radio" name="status" value="0" {{ old('status')==0 ? 'checked' : '' }}> Inactive
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label>Slider Image (2070 * 1358)</label>
                    <input type="file" name="image"
                           class="form-control @error('image') is-invalid @enderror"
                           id="imageInput" accept="image/*">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="mt-3">
                        <img id="previewImage"
                             src="{{ asset('image/no-image-uploded-2.png') }}"
                             style="width:200px;height:120px;object-fit:cover;border:1px solid #ddd;padding:5px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>

            </form>
        </div>
    </div>

@endsection

@push('script')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            let reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('previewImage').src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endpush
