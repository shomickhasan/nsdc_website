@extends('frontend.template.template')

@section('ftitle', 'Pictures Gallery - Rajshahi Skill Development Center')

@section('header')
    @include('frontend.includes.header_two')
@endsection

@push('css')
    <style>
        .gallery-page {
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

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .gallery-card {
            overflow: hidden;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 12px 32px rgba(18, 25, 66, 0.09);
            border: 1px solid rgba(36, 47, 111, 0.08);
            cursor: pointer;
        }

        .gallery-card img {
            width: 100%;
            aspect-ratio: 3 / 2;
            object-fit: cover;
            display: block;
            transition: transform 0.35s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.05);
        }

        .gallery-card-title {
            padding: 14px 16px;
            color: var(--secondary-color);
            font-weight: 700;
            line-height: 1.35;
        }

        .gallery-lightbox {
            position: fixed;
            inset: 0;
            z-index: 10050;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: rgba(8, 13, 35, 0.82);
        }

        .gallery-lightbox.active {
            display: flex;
        }

        .gallery-lightbox img {
            max-width: min(100%, 1100px);
            max-height: 82vh;
            object-fit: contain;
            border-radius: 8px;
            background: #fff;
        }

        .gallery-lightbox-close {
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
            .gallery-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .gallery-page {
                padding: 38px 0 48px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="gallery-page">
        <div class="container">
            <div class="gallery-heading">
                <h1>Pictures Gallery</h1>
                <p>Explore recent moments, activities, and training highlights from Rajshahi Skill Development Center.</p>
            </div>

            <div class="gallery-grid">
                @forelse($pictures as $picture)
                    <article class="gallery-card" data-full-image="{{ Storage::url($picture->image) }}" data-title="{{ $picture->title }}">
                        <img src="{{ Storage::url($picture->image) }}" alt="{{ $picture->title }}" loading="lazy">
                        <div class="gallery-card-title">{{ $picture->title }}</div>
                    </article>
                @empty
                    <div class="notice-empty" style="grid-column: 1 / -1; background: #fff; padding: 44px 20px; border-radius: 8px; text-align: center; color: #6b7280;">
                        No pictures available yet.
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $pictures->links('frontend.pagination.custom') }}
            </div>
        </div>
    </section>

    <div class="gallery-lightbox" id="galleryLightbox">
        <button type="button" class="gallery-lightbox-close" aria-label="Close preview">&times;</button>
        <img src="" alt="" id="galleryLightboxImage">
    </div>

    <script>
        document.querySelectorAll('.gallery-card').forEach(card => {
            card.addEventListener('click', () => {
                const lightbox = document.getElementById('galleryLightbox');
                const image = document.getElementById('galleryLightboxImage');
                image.src = card.dataset.fullImage;
                image.alt = card.dataset.title;
                lightbox.classList.add('active');
            });
        });

        document.querySelector('.gallery-lightbox-close').addEventListener('click', () => {
            document.getElementById('galleryLightbox').classList.remove('active');
        });

        document.getElementById('galleryLightbox').addEventListener('click', event => {
            if (event.target.id === 'galleryLightbox') {
                event.currentTarget.classList.remove('active');
            }
        });
    </script>
@endsection
