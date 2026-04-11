@extends('backend.template.template')
@section('title','Batch List')

@push('css')
    <style>
        .status-dropdown-wrap {
            position: relative;
            display: inline-block;
        }

        .status-toggle-btn {
            min-width: 95px;
            border: 0;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 13px;
            color: #fff;
            cursor: pointer;
        }

        .status-danger {
            background-color: #dc3545;
        }

        .status-success {
            background-color: #28a745;
        }

        .status-warning {
            background-color: #f0ad4e;
            color: #fff;
        }

        .status-primary {
            background-color: #007bff;
        }

        .status-dropdown-menu {
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            min-width: 150px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.12);
            z-index: 99999;
            display: none;
            padding: 6px 0;
        }

        .status-dropdown-menu.show {
            display: block;
        }

        .status-dropdown-item {
            display: block;
            width: 100%;
            padding: 8px 14px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            background: #fff;
            border: none;
            text-align: left;
            cursor: pointer;
        }

        .status-dropdown-item:hover {
            background: #f5f5f5;
            color: #111;
            text-decoration: none;
        }

        td.status-cell {
            position: relative;
            overflow: visible !important;
        }

        .filterTable,
        .card-datatable,
        .table-responsive {
            overflow: visible !important;
        }
    </style>
@endpush

@section('main')

    <div class="d-flex justify-content-between mb-3">
        <h4>Batch List</h4>
        <a href="{{ route('batch.create') }}" class="btn btn-primary">
            <i class="ti ti-plus"></i> Add Batch
        </a>
    </div>

    <div class="filterTable">
        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Batch Name</th>
                    <th>Batch Code</th>
                    <th>Status</th>
                    <th>Open At</th>
                    <th>Complete At</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @forelse($batches as $batch)
                    <tr>
                        <td>{{ $batch->id }}</td>
                        <td>{{ $batch->course->title ?? '-' }}</td>
                        <td>{{ $batch->batch_name }}</td>
                        <td>{{ $batch->batch_code }}</td>

                        <td class="status-cell">
                            <div class="status-dropdown-wrap">
                                <button type="button"
                                        class="status-toggle-btn
                                    @if($batch->status == 0) status-danger
                                    @elseif($batch->status == 1) status-success
                                    @elseif($batch->status == 2) status-warning
                                    @else status-primary
                                    @endif">
                                <span class="status-label">
                                    @if($batch->status == 0)
                                        Inactive
                                    @elseif($batch->status == 1)
                                        Open
                                    @elseif($batch->status == 2)
                                        Full
                                    @else
                                        Complete
                                    @endif
                                </span>
                                    <span style="margin-left:6px;">▼</span>
                                </button>

                                <div class="status-dropdown-menu">
                                    <button type="button" class="status-dropdown-item change-status" data-id="{{ $batch->id }}" data-status="0">Inactive</button>
                                    <button type="button" class="status-dropdown-item change-status" data-id="{{ $batch->id }}" data-status="1">Open</button>
                                    <button type="button" class="status-dropdown-item change-status" data-id="{{ $batch->id }}" data-status="2">Full</button>
                                    <button type="button" class="status-dropdown-item change-status" data-id="{{ $batch->id }}" data-status="3">Complete</button>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $batch->open_at ? \Carbon\Carbon::parse($batch->open_at)->format('d M, Y h:i A') : '-' }}
                        </td>

                        <td>
                            {{ $batch->complete_at ? \Carbon\Carbon::parse($batch->complete_at)->format('d M, Y h:i A') : '-' }}
                        </td>

                        <td>
                            <a href="{{ route('batch.edit',$batch->id) }}" class="btn btn-sm btn-info">
                                <i class="ti ti-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Data Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $batches->links() }}
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {

            $('.status-toggle-btn').on('click', function (e) {
                e.stopPropagation();
                $('.status-dropdown-menu').not($(this).next('.status-dropdown-menu')).removeClass('show');
                $(this).next('.status-dropdown-menu').toggleClass('show');
            });

            $(document).on('click', function () {
                $('.status-dropdown-menu').removeClass('show');
            });

            $(document).on('click', '.status-dropdown-menu', function (e) {
                e.stopPropagation();
            });

            // 🔥 SweetAlert + AJAX
            $(document).on('click', '.change-status', function () {

                let id = $(this).data('id');
                let status = $(this).data('status');

                let statusText = '';
                if (status == 0) statusText = 'Inactive';
                if (status == 1) statusText = 'Open';
                if (status == 2) statusText = 'Full';
                if (status == 3) statusText = 'Complete';

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Change status to " + statusText + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            url: "{{ route('batch.changeStatus') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                status: status
                            },
                            success: function (response) {

                                Swal.fire(
                                    'Updated!',
                                    'Batch status updated successfully.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });

                            },
                            error: function () {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        });

                    }
                });
            });

        });
    </script>
@endpush
