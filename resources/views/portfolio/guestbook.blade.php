@extends('layouts.portfolio')

@section('title', 'Guestbook & Interaction - Raffa Nur Musyaffa Portfolio')

@section('content')
<!-- Blog & Catatan Section -->
<section id="blog" class="blog-section animate-on-scroll">
    <div class="container-fluid px-4">
        <h2 class="section-title-modern">
            <span class="title-number">01.</span>
            <span class="title-text">Blog & Catatan</span>
        </h2>
        <p class="section-subtitle">Artikel singkat tentang apa yang sedang saya pelajari dan kerjakan</p>

        @if($posts->count() > 0)
        <div class="blog-grid">
            @foreach($posts->take(6) as $post)
            <article class="blog-card glass-card" onclick="openBlogModal({{ $post->id }})">
                <div class="blog-card-body">
                    <div class="blog-meta">
                        @if($post->category)
                        <span class="blog-category">{{ $post->category }}</span>
                        @endif
                        <span class="blog-date">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="blog-title">{{ $post->title }}</h3>
                    <p class="blog-excerpt">{{ $post->excerpt }}</p>
                </div>
                <div class="blog-card-footer">
                    <span class="blog-read-more">Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i></span>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="col-12 py-5 text-center empty-state-box glass-card">
            <h5 class="text-white-50 fw-semibold mb-1">Belum Ada Artikel</h5>
            <p class="text-muted small">Catatan dan artikel teknis terbaru sedang disiapkan. Nantikan segera!</p>
        </div>
        @endif
    </div>
</section>

<!-- Testimonials Section - Carousel -->
<section id="testimonials" class="testimonials-carousel animate-on-scroll mt-5">
    <div class="container-fluid px-4">
        <h2 class="section-title-modern">
            <span class="title-number">02.</span>
            <span class="title-text">Testimonials</span>
        </h2>

        <div class="testimonials-slider">
            <div class="testimonials-track">
                @forelse($testimonials as $testimonial)
                <div class="testimonial-slide">
                    <div class="testimonial-card-modern glass-card">
                        <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="testimonial-text">{{ $testimonial->message }}</p>
                        <div class="testimonial-rating">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @for($i = $testimonial->rating; $i < 5; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                        <div class="testimonial-author">
                            @if($testimonial->image_url)
                                @php
                                    $imagePath = $testimonial->image_url;
                                    if (strpos($imagePath, 'storage/') === 0 || strpos($imagePath, 'images/') === 0) {
                                        $imageUrl = asset($imagePath);
                                    } elseif (strpos($imagePath, 'testimonials/') === 0) {
                                        $imageUrl = asset('images/' . $imagePath);
                                    } else {
                                        $imageUrl = asset('images/testimonials/' . $imagePath);
                                    }
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $testimonial->name }}">
                            @else
                                <div class="author-avatar">{{ substr($testimonial->name, 0, 1) }}</div>
                            @endif
                            <div class="author-info">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->position }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted text-center py-4">Belum ada testimoni</p>
                @endforelse
            </div>
            <button class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
        </div>

        <!-- Testimonial Form (Glassmorphic) -->
        <div class="testimonial-form-section glass-card p-5 rounded-4 mt-5">
            <h3 class="form-section-title text-white mb-4"><i class="far fa-comment-dots text-primary me-2"></i>Share Your Experience</h3>
            <form action="{{ route('public-api.testimonials.store') }}" method="POST" class="modern-form" data-public-form>
                @csrf
                <div class="form-row">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control bg-dark border-secondary text-white" name="name" placeholder="Your Name *" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control bg-dark border-secondary text-white" name="email" placeholder="Your Email *" required value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control bg-dark border-secondary text-white" name="position" placeholder="Your Position (contoh: Guru, Pengunjung)" value="{{ old('position') }}">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control bg-dark border-secondary text-white" name="message" rows="4" placeholder="Your Testimonial *" required>{{ old('message') }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <select class="form-select bg-dark border-secondary text-white" name="rating" required>
                        <option value="">Select Rating *</option>
                        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                        <option value="4">⭐⭐⭐⭐ Good</option>
                        <option value="3">⭐⭐⭐ Average</option>
                        <option value="2">⭐⭐ Below Average</option>
                        <option value="1">⭐ Poor</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary-custom border-0 w-100 py-3">Submit Testimonial</button>
                <p class="public-form-status" data-form-status role="status" aria-live="polite"></p>
            </form>
        </div>
    </div>
</section>

<!-- Guestbook Section - Chat Style -->
<section id="guestbook" class="guestbook-chat animate-on-scroll mt-5 mb-5">
    <div class="container-fluid px-4">
        <h2 class="section-title-modern">
            <span class="title-number">03.</span>
            <span class="title-text">Guestbook</span>
        </h2>

        <div class="chat-container glass-card p-4 rounded-4 text-center">
            <div class="chat-messages py-5">
                <div class="empty-state">
                    <i class="fas fa-lock text-primary fa-3x mb-3"></i>
                    <p class="text-white fs-5 fw-semibold">Messages are private and only visible to admin.</p>
                    <p class="text-muted">Feel free to leave a private message below!</p>
                </div>
            </div>

            <button class="btn-primary-custom border-0 px-5 py-3 rounded-pill" onclick="openGuestbookModal()">
                <i class="fas fa-pen me-2"></i> Write a Message
            </button>
        </div>
    </div>
</section>

<!-- Guestbook Modal (Glassmorphic) -->
<div class="modal-overlay" id="guestbookModal">
    <div class="modal-container glass-card">
        <button class="modal-close" onclick="closeGuestbookModal()"><i class="fas fa-times"></i></button>
        <h3 class="modal-title text-white mb-4"><i class="fas fa-envelope-open-text text-primary me-2"></i>Leave a Private Message</h3>
        <form action="{{ route('public-api.guestbook.store') }}" method="POST" class="modern-form" data-public-form>
            @csrf
            <div class="form-group mb-3">
                <input type="text" class="form-control bg-dark border-secondary text-white" name="name" placeholder="Your Name *" required value="{{ old('name') }}">
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control bg-dark border-secondary text-white" name="email" placeholder="Your Email (Optional)" value="{{ old('email') }}">
            </div>
            <div class="form-group mb-4">
                <textarea class="form-control bg-dark border-secondary text-white" name="message" rows="5" placeholder="Your Message *" required maxlength="1000">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn-primary-custom border-0 w-100 py-3">Send Message</button>
            <p class="public-form-status" data-form-status role="status" aria-live="polite"></p>
        </form>
    </div>
</div>

<!-- Blog Modals -->
@foreach($posts as $post)
<div class="blog-modal-overlay" id="blogModal{{ $post->id }}">
    <div class="blog-modal-container glass-card">
        <button class="blog-modal-close" onclick="closeBlogModal({{ $post->id }})"><i class="fas fa-times"></i></button>
        @if($post->category)
        <span class="blog-category mb-2 d-inline-block">{{ $post->category }}</span>
        @endif
        <h2 class="blog-modal-title text-white">{{ $post->title }}</h2>
        <div class="blog-modal-meta text-muted mb-4">
            <span><i class="fas fa-calendar me-2"></i>{{ $post->created_at->format('d M Y') }}</span>
        </div>
        <div class="blog-modal-content text-white-50">{!! $post->safe_content !!}</div>
    </div>
</div>
@endforeach
@endsection

@section('scripts')
<script src="{{ asset('js/public-forms.js') }}" defer></script>
<script>
    function openBlogModal(postId) {
        document.getElementById(`blogModal${postId}`)?.classList.add('active');
    }

    function closeBlogModal(postId) {
        document.getElementById(`blogModal${postId}`)?.classList.remove('active');
    }

    function openGuestbookModal() {
        document.getElementById('guestbookModal')?.classList.add('active');
    }

    function closeGuestbookModal() {
        document.getElementById('guestbookModal')?.classList.remove('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeGuestbookModal();
                document.querySelectorAll('.blog-modal-overlay.active').forEach((modal) => modal.classList.remove('active'));
            }
        });

        document.querySelectorAll('.modal-overlay, .blog-modal-overlay').forEach((overlay) => {
            overlay.addEventListener('click', (event) => {
                if (event.target === overlay) {
                    overlay.classList.remove('active');
                }
            });
        });
    });

</script>
@endsection
