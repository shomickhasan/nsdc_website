@extends('backend.template.template')
@section('title', 'Courses')
@section('main')
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Courses /</span>
        <span class="heading-color">All Courses</span>
    </h4>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('course.create') }}" style="color: white;">
                <button class="btn btn-secondary add-new btn-primary waves-effect waves-light">
                    <span>
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                        <span class="d-none d-sm-inline-block">Create Course</span>
                    </span>
                </button>
            </a>
        </div>

        <div id="filterTable">
            <div class="card-datatable table-responsive">
                <table class="datatables-products table item_table table-hover">
                    <thead class="border-top">
                        <tr>
                            <th>#</th>
                            <th>Created At</th>
                            <th>Title</th>
                            <th>Duration</th>
                            <th>Course Fee</th>
                            <th>Status</th>
                            <th>Show in Home</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr id="deleteitem_remove_{{ $course->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->created_at->format('d M, Y') }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->duration }}</td>
                                <td>{{ number_format($course->course_fee, 2) }}</td>
                                <td>
                                    @if ($course->status == 1)
                                        <span class="badge bg-label-success">Active</span>
                                    @else
                                        <span class="badge bg-label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($course->is_show_in_home == 1)
                                        <span class="badge bg-label-success">Yes</span>
                                    @else
                                        <span class="badge bg-label-secondary">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block text-nowrap">
                                        <a href="{{ route('course.edit', $course->id) }}">
                                            <button class="btn btn-sm btn-icon edit-i"><i class="ti ti-edit"></i></button>
                                        </a>
                                        {{--  <form action="{{ route('course.destroy', $course->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-icon delete-i"
                                                onclick="return confirm('Are you sure you want to delete this course?');">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>  --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mb-2">
                {{ $courses->links('backend.pagination.custome') }}
            </div>
        </div>
    </div>
@endsection
