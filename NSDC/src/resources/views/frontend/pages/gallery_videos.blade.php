@extends('frontend.template.template')

@section('ftitle', 'Video Gallery - Rajshahi Skill Development Center')

@section('header')
    @include('frontend.includes.header_two')
@endsection

@push('css')
    <style>
        .video-gallery-page {
            background: #f7f8fc;
            padding: 55px 0 70px;
        }

        .gallery-heading {
            margin-bottom: 30px;
            text-align: center;
        }

        .gallery-heading h1 {
            color: var(--secondary-color);
            font-size: clamp(2rem, 4vw, 2.8rem);
            margin-bottom: 10px;
        }

        .gallery-heading p {
            color: #6b7280;
            max-width: 620px;
            margin: 0 auto;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .video-card {
            overflow: hidden;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 12px 32px rgba(18, 25, 66, 0.09);
            border: 1px solid rgba(36, 47, 111, 0.08);
            cursor: pointer;
        }

        .video-thumb {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #111;
        }

        .video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.35s ease;
        }

        .video-card:hover .video-thumb img {
            transform: scale(1.05);
        }

        .video-play {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-play span {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: var(--primary-color);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 26px rgba(245, 122, 28, 0.3);
        }

        .video-title {
            padding: 14px 16px;
            color: var(--secondary-color);
            font-weight: 700;
            line-height: 1.35;
        }

        .video-modal {
            position: fixed;
            inset: 0;
            z-index: 10050;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: rgba(8, 13, 35, 0.82);
        }

        .video-modal.active {
            display: flex;
        }

        .video-modal-content {
            width: min(100%, 980px);
            aspect-ratio: 16 / 9;
            background: #000;
            border-radius: 8px;
            overflow: hidden;
        }

        .video-modal-content iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .video-modal-close {
            position: absolute;
            top: 18px;
            right: 22px;
            width: 44px;
            height: 44px;
            border: 0;
            border-radius: 50%;
            background: var(--primary-color);
            color: #fff;
            font-size: 22px;
            cursor: pointer;
        }

        @media (max-width: 991px) {
            .video-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .video-gallery-page {
                padding: 38px 0 48px;
            }

            .video-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="video-gallery-page">
        <div class="container">
            <div class="gallery-heading">
                <h1>Video Gallery</h1>
                <p>Watch featured training activities, events, and updates from our YouTube gallery.</p>
            </div>

            <div class="video-grid">
                @forelse($videos as $video)
                    <article class="video-card" data-video="{{ $video->youtube_embed_url }}" data-title="{{ $video->title }}">
                        <div class="video-thumb">
                            <img src="{{ $video->youtube_thumbnail_url }}" alt="{{ $video->title }}" loading="lazy">
                            <div class="video-play">
                                <span><i class="fas fa-play"></i></span>
                            </div>
                        </div>
                        <div class="video-title">{{ $video->title }}</div>
                    </article>
                @empty
                    <div style="grid-column: 1 / -1; background: #fff; padding: 44px 20px; border-radius: 8px; text-align: center; color: #6b7280;">
                        No videos available yet.
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $videos->links('frontend.pagination.custom') }}
            </div>
        </div>
    </section>

    <div class="video-modal" id="videoModal">
        <button type="button" class="video-modal-close" aria-label="Close video">&times;</button>
        <div class="video-modal-content">
            <iframe id="videoFrame" src="" title="Gallery video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <script>
        const videoModal = document.getElementById('videoModal');
        const videoFrame = document.getElementById('videoFrame');

        document.querySelectorAll('.video-card').forEach(card => {
            card.addEventListener('click', () => {
                videoFrame.src = card.dataset.video + '?autoplay=1';
                videoModal.classList.add('active');
            });
        });

        function closeVideoModal() {
            videoModal.classList.remove('active');
            videoFrame.src = '';
        }

        document.querySelector('.video-modal-close').addEventListener('click', closeVideoModal);
        videoModal.addEventListener('click', event => {
            if (event.target.id === 'videoModal') {
                closeVideoModal();
            }
        });
    </script>
@endsection
