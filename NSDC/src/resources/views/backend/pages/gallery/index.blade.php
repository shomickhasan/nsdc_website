@extends('backend.template.template')
@section('title', 'Gallery')

@section('main')
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Gallery /</span>
        <span class="heading-color">All Gallery Content</span>
    </h4>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('gallery.create') }}" class="btn btn-primary waves-effect waves-light">
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add Gallery Content</span>
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead class="border-top">
                <tr>
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th style="width: 140px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($galleries as $gallery)
                    <tr>
                        <td>
                            @if($gallery->type === 'picture' && $gallery->image)
                                <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" style="width: 92px; height: 62px; object-fit: cover; border-radius: 6px;">
                            @elseif($gallery->youtube_thumbnail_url)
                                <img src="{{ $gallery->youtube_thumbnail_url }}" alt="{{ $gallery->title }}" style="width: 92px; height: 62px; object-fit: cover; border-radius: 6px;">
                            @else
                                <span class="badge bg-label-secondary">No preview</span>
                            @endif
                        </td>
                        <td>{{ $gallery->title }}</td>
                        <td>
                            <span class="badge {{ $gallery->type === 'picture' ? 'bg-label-info' : 'bg-label-danger' }}">
                                {{ ucfirst($gallery->type) }}
                            </span>
                        </td>
                        <td>
                            @if($gallery->status)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $gallery->created_at->format('d M, Y') }}</td>
                        <td>
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('gallery.edit', $gallery) }}" class="btn btn-sm btn-icon btn-label-primary">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <form action="{{ route('gallery.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Delete this gallery content?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon btn-label-danger">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No gallery content found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mb-2">
            {{ $galleries->links('backend.pagination.custome') }}
        </div>
    </div>
@endsection
