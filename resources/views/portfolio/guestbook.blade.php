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

<!-- API Playground Section -->
<section id="api-playground" class="api-playground-section animate-on-scroll mt-5">
    <div class="container-fluid px-4">
        <h2 class="section-title-modern">
            <span class="title-number">02.</span>
            <span class="title-text">API Playground</span>
        </h2>
        <p class="section-subtitle">Coba langsung API endpoint yang saya buat — klik tombol Send dan lihat response-nya secara real-time.</p>

        <div class="api-playground-container glass-card rounded-4 p-1">
            <!-- Left: Endpoint List -->
            <div class="api-endpoint-list">
                @forelse($mockApis as $api)
                <div class="api-endpoint-item {{ $loop->first ? 'active' : '' }}"
                     data-endpoint="/api/v1/{{ $api->path }}"
                     data-method="{{ $api->method }}"
                     data-desc="{{ $api->description }}"
                     onclick="selectEndpoint(this)">
                    <span class="api-method-badge method-{{ strtolower($api->method) }}">{{ $api->method }}</span>
                    <div class="api-endpoint-info">
                        <span class="api-endpoint-path">/api/v1/{{ $api->path }}</span>
                        <span class="api-endpoint-desc">{{ $api->description ?? 'No description' }}</span>
                    </div>
                </div>
                @empty
                <div class="api-empty">
                    <i class="fas fa-plug fa-2x mb-2"></i>
                    <p>Belum ada API endpoint. Tambahkan melalui admin panel.</p>
                </div>
                @endforelse
            </div>

            <!-- Right: Request/Response Panel -->
            <div class="api-response-panel">
                <div class="api-request-header">
                    <div class="api-url-bar">
                        <span class="api-method-tag" id="currentMethod">GET</span>
                        <span class="api-url-text" id="currentEndpoint">Pilih endpoint di kiri</span>
                    </div>
                    <button class="api-send-btn" id="sendBtn" onclick="sendApiRequest()" disabled>
                        <i class="fas fa-paper-plane me-2"></i>Send Request
                    </button>
                </div>
                <div class="api-response-area">
                    <div class="api-response-header">
                        <span>Response</span>
                        <div class="api-response-meta">
                            <span class="api-status" id="apiStatus"></span>
                            <span class="api-time" id="apiTime"></span>
                        </div>
                    </div>
                    <pre class="api-response-body" id="apiResponseBody"><code class="api-code">// Pilih endpoint dan klik Send Request
// Response JSON akan muncul di sini...</code></pre>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section - Carousel -->
<section id="testimonials" class="testimonials-carousel animate-on-scroll mt-5">
    <div class="container-fluid px-4">
        <h2 class="section-title-modern">
            <span class="title-number">03.</span>
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
            <form action="{{ route('testimonial.store') }}" method="POST" class="modern-form">
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
            </form>
        </div>
    </div>
</section>

<!-- Guestbook Section - Chat Style -->
<section id="guestbook" class="guestbook-chat animate-on-scroll mt-5 mb-5">
    <div class="container-fluid px-4">
        <h2 class="section-title-modern">
            <span class="title-number">04.</span>
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
        <form action="{{ route('guestbook.store') }}" method="POST" class="modern-form">
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

    function selectEndpoint(element) {
        document.querySelectorAll('.api-endpoint-item').forEach((item) => item.classList.remove('active'));
        element.classList.add('active');

        document.getElementById('currentMethod').textContent = element.dataset.method;
        document.getElementById('currentEndpoint').textContent = element.dataset.endpoint;
        document.getElementById('sendBtn').disabled = false;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const firstApiEl = document.querySelector('.api-endpoint-item');
        if (firstApiEl) {
            selectEndpoint(firstApiEl);
        }

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

    // Send API Request custom execution
    function sendApiRequest() {
        const endpoint = document.getElementById('currentEndpoint').textContent;
        const method = document.getElementById('currentMethod').textContent;
        const apiStatus = document.getElementById('apiStatus');
        const apiTime = document.getElementById('apiTime');
        const responseBody = document.getElementById('apiResponseBody');

        responseBody.textContent = '// Sending request...';
        apiStatus.textContent = '';
        apiTime.textContent = '';

        const startTime = performance.now();

        fetch(endpoint, {
            method: method,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            const duration = Math.round(performance.now() - startTime);
            apiStatus.textContent = `${response.status} ${response.statusText}`;
            apiStatus.className = `api-status ${response.ok ? 'text-success' : 'text-danger'}`;
            apiTime.textContent = `${duration} ms`;
            return response.json();
        })
        .then(data => {
            responseBody.textContent = JSON.stringify(data, null, 4);
        })
        .catch(err => {
            const duration = Math.round(performance.now() - startTime);
            apiStatus.textContent = 'ERROR';
            apiStatus.className = 'api-status text-danger';
            apiTime.textContent = `${duration} ms`;
            responseBody.textContent = `Error: ${err.message}`;
        });
    }
</script>
@endsection
