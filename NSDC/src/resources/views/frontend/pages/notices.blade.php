@extends('frontend.template.template')

@section('ftitle', 'Notices - Rajshahi Skill Development Center')

@section('header')
    @include('frontend.includes.header_two')
@endsection

@push('css')
    <style>
        .notice-page {
            background: #f7f8fc;
            padding: 55px 0 70px;
        }

        .notice-list {
            display: grid;
            gap: 18px;
        }

        .notice-item {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            gap: 20px;
            background: #fff;
            border: 1px solid rgba(36, 47, 111, 0.08);
            border-left: 4px solid var(--primary-color);
            border-radius: 8px;
            padding: 22px 24px;
            box-shadow: 0 10px 30px rgba(18, 25, 66, 0.08);
        }

        .notice-title {
            color: var(--secondary-color);
            font-size: 18px;
            font-weight: 700;
            line-height: 1.35;
            text-decoration: none;
        }

        .notice-title:hover {
            color: var(--primary-color);
        }

        .notice-date {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            font-size: 14px;
            margin-top: 8px;
        }

        .notice-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 132px;
            min-height: 42px;
            padding: 10px 16px;
            border-radius: 6px;
            background: var(--primary-color);
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .notice-action:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(245, 122, 28, 0.26);
        }

        .notice-empty {
            background: #fff;
            border-radius: 8px;
            padding: 44px 20px;
            text-align: center;
            color: #6b7280;
            box-shadow: 0 10px 30px rgba(18, 25, 66, 0.08);
        }

        @media (max-width: 767px) {
            .notice-page {
                padding: 35px 0 45px;
            }

            .notice-item {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .notice-action {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <section class="notice-page">
        <div class="container">
            <div class="notice-list">
                @forelse($notices as $notice)
                    <article class="notice-item">
                        <div>
                            <a class="notice-title" href="{{ Storage::url($notice->pdf_file) }}" target="_blank" rel="noopener">
                                {{ $notice->title }}
                            </a>
                            <div class="notice-date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $notice->published_at->format('d M, Y') }}</span>
                            </div>
                        </div>
                        <a class="notice-action" href="{{ Storage::url($notice->pdf_file) }}" target="_blank" rel="noopener">
                            <i class="fas fa-file-pdf"></i>
                            <span>View PDF</span>
                        </a>
                    </article>
                @empty
                    <div class="notice-empty">
                        <h4>No notices published yet.</h4>
                        <p>Please check back later for new updates.</p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $notices->links('frontend.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
