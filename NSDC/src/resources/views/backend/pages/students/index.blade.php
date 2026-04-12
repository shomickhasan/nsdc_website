@extends('backend.template.template')
@section('title', 'Students')

@section('main')
    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Administration /</span>
        <span class="heading-color">Students</span>
    </h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Admitted Students</h5>
        </div>

        <div class="card-body">
            <form method="get" action="{{ route('students.index') }}" id="studentSearchForm">
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <label class="form-label">Name / Phone / NID</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Search by name, phone or NID"
                               value="{{ $filters['name'] ?? '' }}">
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <label class="form-label">Course</label>
                        <select name="course_id" id="studentCourseFilter" class="form-select">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ (string) ($filters['course_id'] ?? '') === (string) $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <label class="form-label">Batch</label>
                        <select name="batch_id" id="studentBatchFilter" class="form-select">
                            <option value="">All Batches</option>
                            @foreach($batches as $batch)
                                <option value="{{ $batch->id }}"
                                        data-course-id="{{ $batch->course_id }}"
                                        {{ (string) ($filters['batch_id'] ?? '') === (string) $batch->id ? 'selected' : '' }}>
                                    {{ $batch->batch_name }} ({{ $batch->batch_code }}) - {{ $batch->course->title ?? '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 d-flex gap-2 flex-wrap">
                        <button type="button" id="studentSearchBtn" class="btn btn-primary">
                            <i class="ti ti-filter me-1"></i> Filter
                        </button>
                        <button type="button" id="studentClearBtn" class="btn btn-outline-danger">
                            <i class="ti ti-square-x me-1"></i> Clear
                        </button>
                        <button type="button" id="studentExportBtn" class="btn btn-success">
                            <i class="ti ti-file-export me-1"></i> Export Excel
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div id="studentsTable">
            @include('backend.pages.students.partial', ['students' => $students, 'hasFilters' => $hasFilters])
        </div>
    </div>

    <div id="studentGlobalLoader" class="student-loader d-none">
        <div class="student-loader-box">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mb-0 mt-3">Filtering students...</p>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .student-loader {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.72);
            backdrop-filter: blur(2px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .student-loader.d-none {
            display: none !important;
        }

        .student-loader-box {
            min-width: 240px;
            text-align: center;
            background: #fff;
            border-radius: 16px;
            padding: 24px 28px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.12);
            color: #334155;
            font-weight: 600;
        }
    </style>
@endpush

@push('script')
    <script>
        function toggleStudentLoader(show) {
            $('#studentGlobalLoader').toggleClass('d-none', !show);
        }

        function filterStudentBatches() {
            const selectedCourseId = $('#studentCourseFilter').val();
            const selectedBatchId = $('#studentBatchFilter').val();

            $('#studentBatchFilter option').each(function() {
                if (!this.value) {
                    $(this).prop('hidden', false);
                    return;
                }

                const courseId = $(this).data('course-id')?.toString();
                const show = !selectedCourseId || courseId === selectedCourseId.toString();
                $(this).prop('hidden', !show);

                if (!show && this.value === selectedBatchId) {
                    $('#studentBatchFilter').val('');
                }
            });
        }

        $(document).ready(function() {
            filterStudentBatches();
        });

        $(document).on('change', '#studentCourseFilter', function() {
            filterStudentBatches();
        });

        $('#studentSearchBtn').on('click', function() {
            const formData = $('#studentSearchForm').serialize();
            toggleStudentLoader(true);

            $.ajax({
                type: 'GET',
                url: '{{ route("students.index") }}',
                data: formData,
                success: function(response) {
                    $('#studentsTable').html(response);
                },
                error: function() {
                    $('#studentsTable').html(`
                        <div class="alert alert-danger mx-3 mb-3">
                            Something went wrong while filtering students.
                        </div>
                    `);
                },
                complete: function() {
                    toggleStudentLoader(false);
                }
            });
        });

        $('#studentClearBtn').on('click', function() {
            $('#studentSearchForm')[0].reset();
            filterStudentBatches();
            $('#studentsTable').html(`
                <div class="card-body text-center py-5">
                    <div class="mb-2">
                        <i class="ti ti-filter-search" style="font-size:48px; color:#94a3b8;"></i>
                    </div>
                    <h6 class="mb-1">No data loaded yet</h6>
                    <p class="text-muted mb-0">Select filter options and click Filter to view admitted students.</p>
                </div>
            `);
        });

        $('#studentExportBtn').on('click', function() {
            const formData = $('#studentSearchForm').serializeArray();
            const hasFilter = formData.some(item => item.value && item.value.trim() !== '');

            if (!hasFilter) {
                alert('Please select at least one filter before exporting.');
                return;
            }

            const query = $.param(formData);
            window.location.href = '{{ route("students.export") }}' + '?' + query;
        });
    </script>
@endpush
