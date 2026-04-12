@extends('backend.template.template')
@section('title', 'Dashboard')

@section('main')
    <div class="dashboard-hero card mb-4">
        <div class="card-body p-4 p-lg-5">
            <div class="row g-4 align-items-center">
                <div class="col-xl-8">
                    <span class="dashboard-badge">Operational Analytics</span>
                    <h3 class="dashboard-title mt-3 mb-2">Training, Registration, Batch and Student Overview</h3>
                    <p class="dashboard-subtitle mb-0">
                        A live operational snapshot of courses, registrations, admissions, batch capacity and support resources.
                        This helps the admin team quickly see demand, conversion and workload.
                    </p>
                </div>
                <div class="col-xl-4">
                    <div class="hero-metrics">
                        <div class="hero-metric">
                            <span>Admission Rate</span>
                            <strong>{{ $overview['admission_rate'] }}%</strong>
                        </div>
                        <div class="hero-metric">
                            <span>Avg. Reg/Course</span>
                            <strong>{{ $overview['avg_registrations_per_course'] }}</strong>
                        </div>
                        <div class="hero-metric">
                            <span>Open Batch Ratio</span>
                            <strong>{{ $overview['open_batch_ratio'] }}%</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card metric-card h-100">
                <div class="card-body">
                    <div class="metric-icon bg-label-primary"><i class="ti ti-book-2"></i></div>
                    <div>
                        <span class="metric-label">Total Courses</span>
                        <h3 class="metric-value">{{ $summary['courses'] }}</h3>
                        <small class="metric-note">{{ $summary['open_batches'] }} open batches linked</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card metric-card h-100">
                <div class="card-body">
                    <div class="metric-icon bg-label-success"><i class="ti ti-user-plus"></i></div>
                    <div>
                        <span class="metric-label">Pending Registrations</span>
                        <h3 class="metric-value">{{ $summary['pending_registrations'] }}</h3>
                        <small class="metric-note">{{ $monthlyGrowth['registrations']['current'] }} this month</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card metric-card h-100">
                <div class="card-body">
                    <div class="metric-icon bg-label-warning"><i class="ti ti-school"></i></div>
                    <div>
                        <span class="metric-label">Admitted Students</span>
                        <h3 class="metric-value">{{ $summary['admitted_students'] }}</h3>
                        <small class="metric-note">{{ $monthlyGrowth['admissions']['current'] }} admitted this month</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card metric-card h-100">
                <div class="card-body">
                    <div class="metric-icon bg-label-info"><i class="ti ti-layout-grid"></i></div>
                    <div>
                        <span class="metric-label">Batch Capacity</span>
                        <h3 class="metric-value">{{ $summary['open_batches'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Registration vs Admission Trend</h5>
                    <small class="text-muted">Last 6 months comparison</small>
                </div>
                <div class="card-body">
                    <div id="registrationTrendChart" class="dashboard-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Batch Status Distribution</h5>
                    <small class="text-muted">Current operational breakdown</small>
                </div>
                <div class="card-body">
                    <div id="batchStatusChart" class="dashboard-chart-sm"></div>
                    <div class="summary-grid mt-3">
                        <div class="summary-box"><span>Inactive</span><strong>{{ $batchStatus['inactive'] }}</strong></div>
                        <div class="summary-box"><span>Open</span><strong>{{ $batchStatus['open'] }}</strong></div>
                        <div class="summary-box"><span>Full</span><strong>{{ $batchStatus['full'] }}</strong></div>
                        <div class="summary-box"><span>Complete</span><strong>{{ $batchStatus['complete'] }}</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Admission Funnel</h5>
                    <small class="text-muted">Pending vs admitted ratio</small>
                </div>
                <div class="card-body">
                    <div id="admissionRateChart" class="dashboard-chart-sm"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Support Resources</h5>
                    <small class="text-muted">Admin support and public assets</small>
                </div>
                <div class="card-body">
                    <div class="summary-grid">
                        <div class="summary-box"><span>Users</span><strong>{{ $summary['users'] }}</strong></div>
                        <div class="summary-box"><span>Employees</span><strong>{{ $summary['employees'] }}</strong></div>
                        <div class="summary-box"><span>Partners</span><strong>{{ $summary['partners'] }}</strong></div>
                        <div class="summary-box"><span>Sliders</span><strong>{{ $summary['sliders'] }}</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Monthly Comparison</h5>
                    <small class="text-muted">Current month vs previous month</small>
                </div>
                <div class="card-body">
                    <div class="comparison-box">
                        <div>
                            <span>Registrations</span>
                            <strong>{{ $monthlyGrowth['registrations']['current'] }}</strong>
                        </div>
                        <div class="comparison-trend {{ $monthlyGrowth['registrations']['current'] >= $monthlyGrowth['registrations']['previous'] ? 'up' : 'down' }}">
                            {{ $monthlyGrowth['registrations']['previous'] }} last month
                        </div>
                    </div>
                    <div class="comparison-box mt-3">
                        <div>
                            <span>Admissions</span>
                            <strong>{{ $monthlyGrowth['admissions']['current'] }}</strong>
                        </div>
                        <div class="comparison-trend {{ $monthlyGrowth['admissions']['current'] >= $monthlyGrowth['admissions']['previous'] ? 'up' : 'down' }}">
                            {{ $monthlyGrowth['admissions']['previous'] }} last month
                        </div>
                    </div>
                    <div class="comparison-box mt-3">
                        <div>
                            <span>Pending Load</span>
                            <strong>{{ $summary['pending_registrations'] }}</strong>
                        </div>
                        <div class="comparison-trend {{ $summary['pending_registrations'] > 0 ? 'down' : 'up' }}">
                            Needs action from admin team
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-7">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Course Performance Analytics</h5>
                    <small class="text-muted">Registrations, admissions and batch availability by course</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                            <tr>
                                <th>Course</th>
                                <th>Registrations</th>
                                <th>Admitted</th>
                                <th>Pending</th>
                                <th>Batches</th>
                                <th>Open</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($courseAnalytics as $course)
                                <tr>
                                    <td class="fw-semibold">{{ $course['title'] }}</td>
                                    <td>{{ $course['registrations'] }}</td>
                                    <td><span class="badge bg-label-success">{{ $course['admitted'] }}</span></td>
                                    <td><span class="badge bg-label-warning">{{ $course['pending'] }}</span></td>
                                    <td>{{ $course['batches'] }}</td>
                                    <td>{{ $course['open_batches'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">No analytics data available.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Top Courses by Registrations</h5>
                    <small class="text-muted">Highest demand courses</small>
                </div>
                <div class="card-body">
                    <div id="topCoursesChart" class="dashboard-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Batch Operations Snapshot</h5>
                    <small class="text-muted">Current status and admitted student count for each batch</small>
                </div>
                <div class="card-body">
                    <div class="batch-ops-list">
                        @forelse($batchInsights->take(8) as $batch)
                            <div class="batch-ops-item">
                                <div class="batch-ops-main">
                                    <h6 class="mb-1">{{ $batch['batch_name'] }} <span class="text-muted">({{ $batch['batch_code'] }})</span></h6>
                                    <p class="mb-0">{{ $batch['course_title'] }}</p>
                                </div>
                                <div class="batch-ops-side">
                                    <span class="status-pill status-{{ strtolower(str_replace(' ', '-', $batch['status_label'])) }}">
                                        {{ $batch['status_label'] }}
                                    </span>
                                    <strong>{{ $batch['admitted_students_count'] }} admitted</strong>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No batch data available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Course to Batch Admission Matrix</h5>
                    <small class="text-muted">See which course has which batches and how many students are admitted</small>
                </div>
                <div class="card-body">
                    <div class="course-batch-matrix">
                        @forelse($courseBatchMatrix as $courseGroup)
                            <div class="matrix-course-card">
                                <div class="matrix-course-head">
                                    <div>
                                        <h6 class="mb-1">{{ $courseGroup['course_title'] }}</h6>
                                        <small class="text-muted">{{ $courseGroup['total_batches'] }} batches</small>
                                    </div>
                                    <div class="matrix-total">
                                        <span>Total Admitted</span>
                                        <strong>{{ $courseGroup['total_admitted'] }}</strong>
                                    </div>
                                </div>
                                <div class="matrix-batch-list">
                                    @foreach($courseGroup['batches'] as $batch)
                                        <div class="matrix-batch-item">
                                            <div>
                                                <div class="fw-semibold">{{ $batch['batch_name'] }} <span class="text-muted">({{ $batch['batch_code'] }})</span></div>
                                                <small class="text-muted">
                                                    Pending: {{ $batch['pending_students_count'] }}
                                                </small>
                                            </div>
                                            <div class="matrix-batch-metrics">
                                                <span class="status-pill status-{{ strtolower(str_replace(' ', '-', $batch['status_label'])) }}">
                                                    {{ $batch['status_label'] }}
                                                </span>
                                                <strong>{{ $batch['admitted_students_count'] }} students</strong>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No course batch data available.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Recent Registrations</h5>
                    <small class="text-muted">Latest incoming applications</small>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        @forelse($recentRegistrations as $registration)
                            <div class="activity-item">
                                <div class="activity-icon bg-label-primary"><i class="ti ti-user-plus"></i></div>
                                <div class="activity-content">
                                    <h6 class="mb-1">{{ $registration->full_name_en }}</h6>
                                    <p class="mb-1">{{ $registration->course->title ?? 'N/A' }} | {{ $registration->phone }}</p>
                                    <small class="text-muted">{{ optional($registration->created_at)->format('d M Y, h:i A') }}</small>
                                </div>
                                <span class="badge {{ $registration->admission_status === 'admitted' ? 'bg-label-success' : 'bg-label-warning' }}">
                                    {{ ucfirst($registration->admission_status ?? 'pending') }}
                                </span>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No recent registrations found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-1">Recent Admitted Students</h5>
                    <small class="text-muted">Latest students assigned to batches</small>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        @forelse($recentStudents as $student)
                            <div class="activity-item">
                                <div class="activity-icon bg-label-success"><i class="ti ti-school"></i></div>
                                <div class="activity-content">
                                    <h6 class="mb-1">{{ $student->full_name_en }}</h6>
                                    <p class="mb-1">{{ $student->course->title ?? 'N/A' }} | Batch: {{ $student->batch->batch_name ?? '-' }}</p>
                                    <small class="text-muted">{{ optional($student->admitted_at)->format('d M Y, h:i A') }}</small>
                                </div>
                                <span class="badge bg-label-success">Admitted</span>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No admitted students found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .dashboard-hero {
            border: 0;
            overflow: hidden;
            background:
                radial-gradient(circle at top right, rgba(105,108,255,.18), transparent 32%),
                radial-gradient(circle at bottom left, rgba(40,199,111,.12), transparent 28%),
                linear-gradient(135deg, #f8fbff 0%, #ffffff 46%, #eef4ff 100%);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
        }

        .dashboard-badge {
            display: inline-flex;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(105,108,255,.12);
            color: #696cff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .dashboard-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2a37;
        }

        .dashboard-subtitle {
            color: #6b7280;
            max-width: 720px;
            line-height: 1.7;
        }

        .hero-metrics {
            display: grid;
            gap: 12px;
        }

        .hero-metric,
        .summary-box,
        .comparison-box {
            padding: 16px 18px;
            border-radius: 16px;
            background: rgba(255,255,255,.9);
            border: 1px solid #e7edf6;
        }

        .hero-metric span,
        .summary-box span,
        .comparison-box span,
        .metric-label {
            display: block;
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .hero-metric strong,
        .summary-box strong,
        .comparison-box strong,
        .metric-value {
            color: #1f2a37;
            font-size: 1.45rem;
            font-weight: 700;
            margin: 0;
        }

        .metric-card {
            border: 0;
            box-shadow: 0 10px 30px rgba(15,23,42,.06);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .metric-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 36px rgba(15,23,42,.1);
        }

        .metric-card .card-body {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px;
        }

        .metric-icon,
        .activity-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .metric-note {
            color: #94a3b8;
        }

        .dashboard-chart {
            min-height: 330px;
        }

        .dashboard-chart-sm {
            min-height: 280px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .comparison-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .comparison-trend {
            font-size: 13px;
            font-weight: 600;
        }

        .comparison-trend.up {
            color: #16a34a;
        }

        .comparison-trend.down {
            color: #dc2626;
        }

        .activity-list {
            display: grid;
            gap: 14px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border: 1px solid #edf1f7;
            border-radius: 16px;
            background: #fff;
        }

        .batch-ops-list,
        .course-batch-matrix {
            display: grid;
            gap: 14px;
        }

        .batch-ops-item,
        .matrix-course-card {
            padding: 16px;
            border-radius: 18px;
            border: 1px solid #e9eef6;
            background: linear-gradient(180deg, #ffffff 0%, #f9fbff 100%);
        }

        .batch-ops-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .batch-ops-main p,
        .batch-ops-main h6 {
            margin-bottom: 0;
        }

        .batch-ops-side,
        .matrix-batch-metrics,
        .matrix-total {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .matrix-course-head {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid #edf2f7;
        }

        .matrix-total span {
            color: #6b7280;
            font-size: 12px;
        }

        .matrix-total strong {
            font-size: 1.3rem;
            color: #1f2a37;
        }

        .matrix-batch-list {
            display: grid;
            gap: 10px;
        }

        .matrix-batch-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 12px 14px;
            border-radius: 14px;
            background: #fff;
            border: 1px solid #eef2f7;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-open {
            background: rgba(40,199,111,.15);
            color: #16a34a;
        }

        .status-full {
            background: rgba(255,159,67,.15);
            color: #d97706;
        }

        .status-batch-complete,
        .status-complete {
            background: rgba(0,207,232,.15);
            color: #0891b2;
        }

        .status-inactive {
            background: rgba(234,84,85,.14);
            color: #dc2626;
        }

        .activity-content {
            flex: 1;
            min-width: 0;
        }

        .activity-content h6,
        .activity-content p {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 767px) {
            .dashboard-title {
                font-size: 1.55rem;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .batch-ops-item,
            .matrix-course-head,
            .matrix-batch-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .batch-ops-side,
            .matrix-batch-metrics,
            .matrix-total {
                align-items: flex-start;
            }
        }
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const trendLabels = @json($registrationTrend->pluck('label')->values());
            const registrationSeries = @json($registrationTrend->pluck('registrations')->values());
            const admissionSeries = @json($registrationTrend->pluck('admissions')->values());
            const topCourseLabels = @json($topCourses->pluck('title')->values());
            const topCourseValues = @json($topCourses->pluck('registrations')->values());

            new ApexCharts(document.querySelector('#registrationTrendChart'), {
                chart: { type: 'area', height: 330, toolbar: { show: false } },
                series: [
                    { name: 'Registrations', data: registrationSeries },
                    { name: 'Admissions', data: admissionSeries }
                ],
                colors: ['#696cff', '#28c76f'],
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 3 },
                fill: {
                    type: 'gradient',
                    gradient: { opacityFrom: 0.28, opacityTo: 0.04, stops: [0, 90, 100] }
                },
                xaxis: { categories: trendLabels },
                grid: { borderColor: '#eef2f7', strokeDashArray: 6 },
                legend: { position: 'top', horizontalAlign: 'left' }
            }).render();

            new ApexCharts(document.querySelector('#batchStatusChart'), {
                chart: { type: 'donut', height: 280 },
                labels: ['Inactive', 'Open', 'Full', 'Complete'],
                series: @json(array_values($batchStatus)),
                colors: ['#ea5455', '#28c76f', '#ff9f43', '#00cfe8'],
                stroke: { width: 0 },
                legend: { position: 'bottom' }
            }).render();

            new ApexCharts(document.querySelector('#admissionRateChart'), {
                chart: { type: 'radialBar', height: 280 },
                series: [{{ $overview['admission_rate'] }}],
                colors: ['#28c76f'],
                labels: ['Admission Rate'],
                plotOptions: {
                    radialBar: {
                        hollow: { size: '62%' },
                        dataLabels: {
                            name: { offsetY: 18, color: '#6b7280' },
                            value: {
                                fontSize: '28px',
                                fontWeight: 700,
                                color: '#1f2a37',
                                formatter: function (val) { return val + '%'; }
                            }
                        }
                    }
                }
            }).render();

            new ApexCharts(document.querySelector('#topCoursesChart'), {
                chart: { type: 'bar', height: 330, toolbar: { show: false } },
                series: [{ name: 'Registrations', data: topCourseValues }],
                colors: ['#7367f0'],
                plotOptions: {
                    bar: {
                        horizontal: true,
                        borderRadius: 8,
                        barHeight: '52%'
                    }
                },
                dataLabels: { enabled: false },
                xaxis: { categories: topCourseLabels },
                grid: { borderColor: '#eef2f7', strokeDashArray: 6 }
            }).render();
        });
    </script>
@endpush
