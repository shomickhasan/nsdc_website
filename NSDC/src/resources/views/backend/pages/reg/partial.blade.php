@if(!$hasFilters)
    <div class="card-body text-center py-5">
        <div class="mb-2">
            <i class="ti ti-filter-search" style="font-size:48px; color:#94a3b8;"></i>
        </div>
        <h6 class="mb-1">No data loaded yet</h6>
        <p class="text-muted mb-0">Select filter options and click Filter to view registrations.</p>
    </div>
@elseif($registrations->count() === 0)
    <div class="card-body text-center py-5">
        <div class="mb-2">
            <i class="ti ti-database-off" style="font-size:48px; color:#94a3b8;"></i>
        </div>
        <h6 class="mb-1">No registrations found</h6>
        <p class="text-muted mb-0">Try changing the selected filter options.</p>
    </div>
@else
    @php
        $selectedCourseId = $filters['course_id'] ?? null;
    @endphp

    <div class="card-body admission-wizard">
        <div class="wizard-steps">
            <div class="wizard-step active" data-step="1">
                <div class="step-no">1</div>
                <div class="step-title">Select Students</div>
                <p class="step-text">
                    Filter course-wise registrations and choose students for admission.
                </p>
            </div>
            <div class="wizard-step" data-step="2">
                <div class="step-no">2</div>
                <div class="step-title">Choose Batch & Admit</div>
                <p class="step-text">
                    Select an available batch and confirm admission for
                    <strong id="stepTwoSelectedCount">0</strong> students.
                </p>
            </div>
        </div>

        <div id="wizardPanelStep1" class="wizard-panel active">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <div class="selected-counter">
                        Selected Students
                        <strong class="selected-registration-count" id="stepOneSelectedCount">0</strong>
                    </div>
                    <div class="bulk-help-text text-muted small mt-2">
                        First select the students you want to admit, then move to the next step.
                    </div>
                </div>

                <button type="button"
                        id="goToBatchStep"
                        class="btn btn-primary"
                        data-course-id="{{ $selectedCourseId }}">
                    Next Step <i class="ti ti-arrow-right ms-1"></i>
                </button>
            </div>
        </div>

        <div id="wizardPanelStep2" class="wizard-panel">
            <div class="row g-3 align-items-end">
                <div class="col-lg-5">
                    <label class="form-label">Select Batch</label>
                    <select id="bulkBatchId" class="form-select">
                        <option value="">Choose batch for admission</option>
                        @foreach($courseBatches as $batch)
                            <option value="{{ $batch->id }}"
                                    {{ (int) $batch->status === 2 ? 'disabled' : '' }}
                                    class="{{ (int) $batch->status === 2 ? 'batch-option-full' : '' }}">
                                {{ $batch->batch_name }} ({{ $batch->batch_code }})
                                - {{ (int) $batch->status === 1 ? 'Open' : 'Full' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <div class="selected-counter w-100 justify-content-between">
                        <span>Selected Count</span>
                        <strong class="selected-registration-count">0</strong>
                    </div>
                    <div class="bulk-help-text text-muted small mt-2" id="selectedBatchSummary">No batch selected</div>
                </div>
                <div class="col-lg-3 d-flex gap-2">
                    <button type="button" id="backToSelectionStep" class="btn btn-outline-secondary w-50">
                        Back
                    </button>
                    <button type="button"
                            id="bulkAdmissionBtn"
                            class="btn btn-primary w-50"
                            data-course-id="{{ $selectedCourseId }}">
                        Admit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-products table item_table table-hover">
            <thead class="border-top">
            <tr>
                <th width="40">
                    <input type="checkbox" id="selectAllRegistrations">
                </th>
                <th>#</th>
                <th>Reg Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Admission</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($registrations as $reg)
                <tr id="deleteitem_remove_{{ $reg->id }}">
                    <td>
                        <input type="checkbox" class="registration-checkbox" value="{{ $reg->id }}">
                    </td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reg->created_at->format('d M Y') }}</td>
                    <td>{{ $reg->full_name_en }}</td>
                    <td>{{ $reg->email }}</td>
                    <td>{{ $reg->phone }}</td>
                    <td>{{ $reg->course->title ?? 'N/A' }}</td>
                    <td>
                        @if(($reg->admission_status ?? 'pending') === 'admitted')
                            <span class="badge bg-label-success">Admitted</span>
                        @else
                            <span class="badge bg-label-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-inline-block text-nowrap">
                            <a href="{{ route('registration.pdf', $reg->id) }}" class="btn btn-sm btn-icon text-danger" title="Download PDF">
                                <i class="ti ti-file-download"></i>
                            </a>
                            <a href="{{ route('registration.edit', $reg->id) }}" class="btn btn-sm btn-icon text-primary" title="Edit Registration">
                                <i class="ti ti-edit"></i>
                            </a>
                            <a href="{{ route('registration.show', $reg->id) }}">
                                <button class="btn btn-sm btn-icon edit-i">
                                    <i class="ti ti-eye"></i>
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
        {{ $registrations->links('backend.pagination.custome') }}
    </div>
@endif
