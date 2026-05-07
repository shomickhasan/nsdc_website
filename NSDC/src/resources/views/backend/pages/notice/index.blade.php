@extends('backend.template.template')
@section('title', 'Notices')

@section('main')
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Notices /</span>
        <span class="heading-color">All Notices</span>
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('notice.create') }}" class="btn btn-primary waves-effect waves-light">
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Upload Notice</span>
            </a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead class="border-top">
                <tr>
                    <th>Publish Date</th>
                    <th>Title</th>
                    <th>PDF</th>
                    <th style="width: 120px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($notices as $notice)
                    <tr>
                        <td>{{ $notice->published_at->format('d M, Y') }}</td>
                        <td>{{ $notice->title }}</td>
                        <td>
                            <a href="{{ Storage::url($notice->pdf_file) }}" target="_blank" class="btn btn-sm btn-label-primary">
                                <i class="ti ti-file-text me-1"></i> View PDF
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('notice.destroy', $notice) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-icon btn-label-danger">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No notices found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mb-2">
            {{ $notices->links('backend.pagination.custome') }}
        </div>
    </div>
@endsection
