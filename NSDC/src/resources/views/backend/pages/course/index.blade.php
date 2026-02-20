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

        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead class="border-top">
                <tr>
                    <th style="width:60px;">Order</th>
                    <th>Created At</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Course Fee</th>
                    <th>Status</th>
                    <th>Show in Home</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody id="sortable">

                @foreach ($courses as $course)
                    <tr id="item_{{ $course->id }}">

                        <!-- Drag Icon -->
                        <td class="cursor-move text-center">
                            <i class="fas fa-arrows-alt"></i>
                        </td>

                        <td>{{ $course->created_at->format('d M, Y') }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ number_format($course->course_fee, 2) }}</td>

                        <!-- Status -->
                        <td>
                            @if ($course->status == 1)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-danger">Inactive</span>
                            @endif
                        </td>

                        <!-- Show in home -->
                        <td>
                            @if ($course->is_show_in_home == 1)
                                <span class="badge bg-label-success">Yes</span>
                            @else
                                <span class="badge bg-label-secondary">No</span>
                            @endif
                        </td>

                        <!-- Action -->
                        <td>
                            <div class="d-inline-block text-nowrap">

                                <a href="{{ route('course.edit', $course->id) }}">
                                    <button class="btn btn-sm btn-icon edit-i">
                                        <i class="ti ti-edit"></i>
                                    </button>
                                </a>

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
@endsection


@push('script')

    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>

        var sortable = Sortable.create(document.getElementById('sortable'), {
            handle: '.cursor-move',
            animation: 150,

            onEnd: function () {

                let order = [];

                $('#sortable tr').each(function(index, element){

                    order.push({
                        id: $(element).attr('id').replace('item_',''),
                        position: index + 1
                    });

                });

                $.ajax({
                    url: "{{ route('course.order_update') }}",
                    type: "POST",
                    data: {
                        order: order,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });

            }
        });

    </script>

@endpush
