@extends('backend.template.template')
@section('title', 'All Registrations')
@section('main')

    <h4 class="py-3 mb-4 fs-5">
        <span class="text-muted fw-light">Administration /</span>
        <span class="heading-color">Registrations</span>
    </h4>

    <div class="card">
        <div class="card-header">

            <div class="btn-group">
                <button class="btn filter-btn btn-secondary add-new btn-primary waves-effect waves-light">
                    <span><i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; Filter </span>
                </button>
            </div>

        </div>

        <div class="card-body">

            {{-- FILTER FORM --}}
            <form class="dt_adv_search filter" method="get" action="{{ route('registration.index') }}" id="searchForm" style="display:block;">
                <div class="row">
                    <div class="col-12">
                        <div class="row g-3">

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">Name / Phone / NID:</label>
                                <input type="text" name="name" class="form-control dt-input" placeholder="Search by name, phone or NID"
                                       value="{{ $filters['name'] ?? '' }}">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">Course:</label>
                                <select name="course_id" class="form-select dt-input">
                                    <option value="">All Courses</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" {{ (string) ($filters['course_id'] ?? '') === (string) $course->id ? 'selected' : '' }}>
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">From Date:</label>
                                <input type="date" name="from_date" class="form-control dt-input"
                                       value="{{ $filters['from_date'] ?? '' }}">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label class="form-label">To Date:</label>
                                <input type="date" name="to_date" class="form-control dt-input"
                                       value="{{ $filters['to_date'] ?? '' }}">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 d-flex align-items-end">
                                <div class="input-group-append me-2">
                                    <button id="search" class="btn btn-md btn-primary waves-effect waves-light index-search" type="button">
                                        <span><i class="ti ti-filter me-0 me-sm-1 ti-xs"></i>&nbsp; Filter </span>
                                    </button>
                                </div>

                                <div class="input-group-append me-2">
                                    <button class="btn btn-md btn-danger waves-effect waves-light" onclick="resetForm()" type="reset">
                                        <span><i class="ti ti-square-x me-0 me-sm-1 ti-xs"></i>&nbsp; Clear </span>
                                    </button>
                                </div>

                                <div class="input-group-append">
                                    <button id="exportExcel" class="btn btn-md btn-success waves-effect waves-light" type="button">
                                        <span><i class="ti ti-file-export me-0 me-sm-1 ti-xs"></i>&nbsp; Export Excel </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        </div>

        {{-- TABLE DATA --}}
        <div id="filterTable">
            @include('backend.pages.reg.partial', [
                'registrations' => $registrations,
                'hasFilters' => $hasFilters,
                'courseBatches' => $courseBatches,
                'filters' => $filters,
            ])
        </div>
    </div>

    <div id="globalFilterLoader" class="global-filter-loader d-none">
        <div class="loader-box">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mb-0 mt-3">Filtering registrations...</p>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .global-filter-loader {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(2px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .global-filter-loader.d-none {
            display: none !important;
        }

        .loader-box {
            min-width: 240px;
            text-align: center;
            background: #fff;
            border-radius: 16px;
            padding: 24px 28px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.12);
            color: #334155;
            font-weight: 600;
        }

        .bulk-help-text {
            padding-top: 8px;
        }

        .admission-wizard {
            background: linear-gradient(135deg, #f8fbff 0%, #eef4ff 100%);
            border-bottom: 1px solid #e4ecf7;
        }

        .wizard-steps {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .wizard-step {
            flex: 1 1 220px;
            border: 1px solid #d9e5f4;
            border-radius: 16px;
            background: #fff;
            padding: 16px;
            position: relative;
            transition: 0.2s ease;
        }

        .wizard-step.active {
            border-color: #696cff;
            box-shadow: 0 8px 20px rgba(105, 108, 255, 0.12);
        }

        .wizard-step.done {
            border-color: #28c76f;
            background: #f3fff8;
        }

        .step-no {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #e9eefb;
            color: #566a7f;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .wizard-step.active .step-no {
            background: #696cff;
            color: #fff;
        }

        .wizard-step.done .step-no {
            background: #28c76f;
            color: #fff;
        }

        .step-title {
            font-weight: 700;
            color: #223b63;
            margin-bottom: 4px;
        }

        .step-text {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 0;
        }

        .wizard-panel {
            display: none;
        }

        .wizard-panel.active {
            display: block;
        }

        .selected-counter {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid #dbe5f0;
            border-radius: 999px;
            padding: 8px 14px;
            font-weight: 600;
            color: #334155;
        }

        .selected-counter strong {
            color: #111827;
            min-width: 24px;
            text-align: center;
        }

        .batch-option-full {
            color: #dc2626;
        }
    </style>
@endpush

@push('script')
    <script>
        function toggleLoader(show) {
            $('#globalFilterLoader').toggleClass('d-none', !show);
        }

        $('#search').on('click', function() {
            var formData = $('#searchForm').serialize();
            toggleLoader(true);

            $.ajax({
                type: 'GET',
                url: '{{ route("registration.index") }}',
                data: formData,
                success: function(response) {
                    $('#filterTable').html(response);
                    setAdmissionStep(1);
                    updateSelectedCount();
                },
                error: function() {
                    $('#filterTable').html(`
                        <div class="alert alert-danger mx-3 mb-3">
                            Something went wrong while filtering data.
                        </div>
                    `);
                },
                complete: function() {
                    toggleLoader(false);
                }
            });
        });

        function resetForm() {
            $('#searchForm')[0].reset();
            $('#filterTable').html(`
                <div class="card-body text-center py-5">
                    <div class="mb-2">
                        <i class="ti ti-filter-search" style="font-size:48px; color:#94a3b8;"></i>
                    </div>
                    <h6 class="mb-1">No data loaded yet</h6>
                    <p class="text-muted mb-0">Select filter options and click Filter to view registrations.</p>
                </div>
            `);
        }

        $('#exportExcel').on('click', function() {
            const formData = $('#searchForm').serializeArray();
            const hasFilter = formData.some(item => item.value && item.value.trim() !== '');

            if (!hasFilter) {
                alert('Please select at least one filter before exporting.');
                return;
            }

            const query = $.param(formData);
            window.location.href = '{{ route("registration.export") }}' + '?' + query;
        });

        $(document).on('change', '.registration-checkbox', function() {
            const total = $('.registration-checkbox').length;
            const checked = $('.registration-checkbox:checked').length;
            $('#selectAllRegistrations').prop('checked', total > 0 && total === checked);
            updateSelectedCount();
        });

        $(document).on('change', '#selectAllRegistrations', function() {
            $('.registration-checkbox').prop('checked', $(this).is(':checked'));
            updateSelectedCount();
        });

        function updateSelectedCount() {
            const checked = $('.registration-checkbox:checked').length;
            $('.selected-registration-count').text(checked);
            $('#stepOneSelectedCount').text(checked);
            $('#stepTwoSelectedCount').text(checked);
        }

        function setAdmissionStep(step) {
            $('.wizard-step').removeClass('active');
            $('.wizard-panel').removeClass('active');

            if (step === 1) {
                $('.wizard-step[data-step="1"]').addClass('active').removeClass('done');
                $('.wizard-step[data-step="2"]').removeClass('active done');
                $('#wizardPanelStep1').addClass('active');
            }

            if (step === 2) {
                $('.wizard-step[data-step="1"]').removeClass('active').addClass('done');
                $('.wizard-step[data-step="2"]').addClass('active');
                $('#wizardPanelStep2').addClass('active');
            }
        }

        $(document).on('click', '#goToBatchStep', function() {
            const selected = $('.registration-checkbox:checked').length;
            const courseId = $(this).data('course-id');

            if (!courseId) {
                Swal.fire('Warning', 'Please filter registrations by course first.', 'warning');
                return;
            }

            if (selected === 0) {
                Swal.fire('Warning', 'Please select at least one student to continue.', 'warning');
                return;
            }

            setAdmissionStep(2);
        });

        $(document).on('click', '#backToSelectionStep', function() {
            setAdmissionStep(1);
        });

        $(document).on('click', '#bulkAdmissionBtn', function() {
            const registrationIds = $('.registration-checkbox:checked').map(function() {
                return $(this).val();
            }).get();
            const batchId = $('#bulkBatchId').val();
            const courseId = $(this).data('course-id');

            if (!courseId) {
                Swal.fire('Warning', 'Please filter registrations by course first.', 'warning');
                return;
            }

            if (!batchId) {
                Swal.fire('Warning', 'Please select an open batch.', 'warning');
                return;
            }

            if (registrationIds.length === 0) {
                Swal.fire('Warning', 'Please select at least one student.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Confirm bulk admission?',
                text: 'Selected students will be admitted to the chosen batch.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, admit them',
            }).then((result) => {
                if (!result.isConfirmed) {
                    return;
                }

                toggleLoader(true);

                $.ajax({
                    type: 'POST',
                    url: '{{ route("registration.bulkAdmission") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        course_id: courseId,
                        batch_id: batchId,
                        registration_ids: registrationIds
                    },
                    success: function(response) {
                        Swal.fire('Success', response.message, 'success');
                        $('#search').click();
                    },
                    error: function(xhr) {
                        const message = xhr.responseJSON?.message || 'Bulk admission failed.';
                        Swal.fire('Error', message, 'error');
                    },
                    complete: function() {
                        toggleLoader(false);
                    }
                });
            });
        });

        $(document).on('change', '#bulkBatchId', function() {
            const selectedOption = $(this).find('option:selected');
            $('#selectedBatchSummary').text(selectedOption.val() ? selectedOption.text() : 'No batch selected');
        });
    </script>
@endpush
