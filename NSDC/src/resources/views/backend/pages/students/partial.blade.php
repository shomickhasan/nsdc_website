@if(!$hasFilters)
    <div class="card-body text-center py-5">
        <div class="mb-2">
            <i class="ti ti-filter-search" style="font-size:48px; color:#94a3b8;"></i>
        </div>
        <h6 class="mb-1">No data loaded yet</h6>
        <p class="text-muted mb-0">Select filter options and click Filter to view admitted students.</p>
    </div>
@elseif($students->count() === 0)
    <div class="card-body text-center py-5">
        <div class="mb-2">
            <i class="ti ti-database-off" style="font-size:48px; color:#94a3b8;"></i>
        </div>
        <h6 class="mb-1">No admitted students found</h6>
        <p class="text-muted mb-0">Try changing the selected filter options.</p>
    </div>
@else
    <div class="card-datatable table-responsive">
        <table class="table table-hover">
            <thead class="border-top">
            <tr>
                <th>#</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Phone</th>
                <th>NID</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($student->photo) }}"
                             width="50" height="50" style="object-fit:cover; border-radius:6px;">
                    </td>
                    <td>{{ $student->full_name_en }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->nid }}</td>
                    <td>{{ $student->course->title ?? 'N/A' }}</td>
                    <td>{{ $student->batch->batch_name ?? '-' }}</td>
                    <td><span class="badge bg-label-success">Admitted</span></td>
                    <td>
                        <a href="{{ route('registration.pdf', $student->id) }}" class="btn btn-sm btn-icon text-danger" title="Download PDF">
                            <i class="ti ti-file-download"></i>
                        </a>
                        <a href="{{ route('registration.show', $student->id) }}" class="btn btn-sm btn-icon edit-i">
                            <i class="ti ti-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mb-3">
        {{ $students->links('backend.pagination.custome') }}
    </div>
@endif
