<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BatchModel;
use App\Models\Backend\Course;
use App\Models\Backend\Regestration;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\User;
class DhashboardController extends Controller
{
    public function index()
    {
        $now = now();
        $startOfMonth = $now->copy()->startOfMonth();
        $startOfLastMonth = $now->copy()->subMonth()->startOfMonth();
        $endOfLastMonth = $now->copy()->subMonth()->endOfMonth();
        $months = collect(range(5, 0))->map(function ($monthOffset) use ($now) {
            return $now->copy()->subMonths($monthOffset)->startOfMonth();
        });

        $summary = [
            'courses' => Course::count(),
            'open_batches' => BatchModel::where('status', BatchModel::STATUS_OPEN)->count(),
            'pending_registrations' => Regestration::where('admission_status', 'pending')->count(),
            'admitted_students' => Regestration::where('admission_status', 'admitted')->count(),
            'users' => User::count(),
            'employees' => Employee::where('status', 1)->count(),
            'partners' => Partner::where('status', 1)->count(),
            'sliders' => Slider::where('status', 1)->count(),
        ];

        $monthlyGrowth = [
            'registrations' => [
                'current' => Regestration::whereBetween('created_at', [$startOfMonth, $now])->count(),
                'previous' => Regestration::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count(),
            ],
            'admissions' => [
                'current' => Regestration::where('admission_status', 'admitted')
                    ->whereBetween('admitted_at', [$startOfMonth, $now])
                    ->count(),
                'previous' => Regestration::where('admission_status', 'admitted')
                    ->whereBetween('admitted_at', [$startOfLastMonth, $endOfLastMonth])
                    ->count(),
            ],
        ];

        $registrationTrend = $months->map(function ($month) {
            return [
                'label' => $month->format('M Y'),
                'registrations' => Regestration::whereBetween('created_at', [
                    $month->copy()->startOfMonth(),
                    $month->copy()->endOfMonth(),
                ])->count(),
                'admissions' => Regestration::where('admission_status', 'admitted')
                    ->whereBetween('admitted_at', [
                        $month->copy()->startOfMonth(),
                        $month->copy()->endOfMonth(),
                    ])->count(),
            ];
        });

        $courseAnalytics = Course::withCount([
            'batches',
            'batches as open_batches_count' => fn ($query) => $query->where('status', BatchModel::STATUS_OPEN),
            'batches as full_batches_count' => fn ($query) => $query->where('status', BatchModel::STATUS_FULL),
        ])
            ->get()
            ->map(function ($course) {
                $registrationsCount = Regestration::where('course_id', $course->id)->count();
                $admittedCount = Regestration::where('course_id', $course->id)
                    ->where('admission_status', 'admitted')
                    ->count();

                return [
                    'title' => $course->title,
                    'registrations' => $registrationsCount,
                    'admitted' => $admittedCount,
                    'pending' => max($registrationsCount - $admittedCount, 0),
                    'batches' => $course->batches_count,
                    'open_batches' => $course->open_batches_count,
                    'full_batches' => $course->full_batches_count,
                ];
            })
            ->sortByDesc('registrations')
            ->values();

        $batchStatus = [
            'inactive' => BatchModel::where('status', BatchModel::STATUS_INACTIVE)->count(),
            'open' => BatchModel::where('status', BatchModel::STATUS_OPEN)->count(),
            'full' => BatchModel::where('status', BatchModel::STATUS_FULL)->count(),
            'complete' => BatchModel::where('status', BatchModel::STATUS_COMPLETE)->count(),
        ];

        $registrationStatus = [
            'pending' => Regestration::where('admission_status', 'pending')->count(),
            'admitted' => Regestration::where('admission_status', 'admitted')->count(),
        ];

        $recentRegistrations = Regestration::with(['course', 'batch'])
            ->latest()
            ->take(6)
            ->get();

        $recentStudents = Regestration::with(['course', 'batch'])
            ->where('admission_status', 'admitted')
            ->orderByDesc('admitted_at')
            ->take(6)
            ->get();

        $batchInsights = BatchModel::with('course')
            ->withCount([
                'registrations as admitted_students_count' => fn ($query) => $query->where('admission_status', 'admitted'),
                'registrations as pending_students_count' => fn ($query) => $query->where('admission_status', 'pending'),
            ])
            ->orderByRaw("FIELD(status, 1, 2, 3, 0)")
            ->orderBy('batch_name')
            ->get()
            ->map(function ($batch) {
                return [
                    'id' => $batch->id,
                    'batch_name' => $batch->batch_name,
                    'batch_code' => $batch->batch_code,
                    'course_title' => $batch->course->title ?? 'N/A',
                    'status' => $batch->status,
                    'status_label' => BatchModel::statusList()[$batch->status] ?? 'Unknown',
                    'admitted_students_count' => $batch->admitted_students_count,
                    'pending_students_count' => $batch->pending_students_count,
                    'open_at' => $batch->open_at,
                    'complete_at' => $batch->complete_at,
                ];
            });

        $courseBatchMatrix = $batchInsights
            ->groupBy('course_title')
            ->map(function ($batches, $courseTitle) {
                return [
                    'course_title' => $courseTitle,
                    'total_batches' => $batches->count(),
                    'total_admitted' => $batches->sum('admitted_students_count'),
                    'batches' => $batches->values(),
                ];
            })
            ->sortByDesc('total_admitted')
            ->values();

        $topCourses = $courseAnalytics->take(5)->values();

        $overview = [
            'admission_rate' => $summary['pending_registrations'] + $summary['admitted_students'] > 0
                ? round(($summary['admitted_students'] / ($summary['pending_registrations'] + $summary['admitted_students'])) * 100, 1)
                : 0,
            'avg_registrations_per_course' => $summary['courses'] > 0
                ? round(($summary['pending_registrations'] + $summary['admitted_students']) / $summary['courses'], 1)
                : 0,
            'open_batch_ratio' => array_sum($batchStatus) > 0
                ? round(($batchStatus['open'] / array_sum($batchStatus)) * 100, 1)
                : 0,
        ];

        return view('backend.pages.dashboard_analytics', compact(
            'summary',
            'monthlyGrowth',
            'registrationTrend',
            'courseAnalytics',
            'batchStatus',
            'registrationStatus',
            'recentRegistrations',
            'recentStudents',
            'batchInsights',
            'courseBatchMatrix',
            'topCourses',
            'overview'
        ));
    }
}
