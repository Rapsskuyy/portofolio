<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raffa Nur Musyaffa - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>

<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
        <div class="logo">
            <span class="logo-text">R</span>
        </div>
        <ul class="nav-menu">
            <li><a href="#home" class="nav-dot active" data-tooltip="Home"><span></span></a></li>
            <li><a href="#about" class="nav-dot" data-tooltip="About"><span></span></a></li>
            <li><a href="#education" class="nav-dot" data-tooltip="Education"><span></span></a></li>
            <li><a href="#skills" class="nav-dot" data-tooltip="Skills"><span></span></a></li>
            <li><a href="#gallery" class="nav-dot" data-tooltip="Gallery"><span></span></a></li>
            <li><a href="#projects" class="nav-dot" data-tooltip="Projects"><span></span></a></li>
            <li><a href="#experience" class="nav-dot" data-tooltip="Experience"><span></span></a></li>
            <li><a href="#testimonials" class="nav-dot" data-tooltip="Testimonials"><span></span></a></li>
            <li><a href="#guestbook" class="nav-dot" data-tooltip="Guestbook"><span></span></a></li>
        </ul>
        <div class="social-links-sidebar">
            <a href="https://github.com/Rapsskuyy" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://www.instagram.com/rrapskuy/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Hero Section - Fullscreen Split -->
        <section id="home" class="hero-fullscreen">
            <div class="hero-split-container">
                <div class="hero-left">
                    <div class="hero-content">
                        <span class="hero-greeting">Hello, I'm</span>
                        <h1 class="hero-name">Raffa Nur<br>Musyaffa</h1>
                        <div class="hero-role-wrapper">
                            <span class="hero-role-label">I'm a</span>
                            <span class="hero-role" id="roleRotator">Web Developer</span>
                        </div>
                        <p class="hero-description">Siswa SMK PPLG yang passionate dalam backend development. Suka ngulik kode, bikin project seru, dan aktif di organisasi sekolah.</p>
                        <div class="hero-buttons">
                            <a href="#gallery" class="btn-primary-custom">View Projects</a>
                            <a href="#guestbook" class="btn-secondary-custom">Say Hello</a>
                            <a href="{{ asset('files/CV .pdf') }}" download class="btn-download-cv">
                                <i class="fas fa-download"></i> Download CV
                            </a>
                        </div>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <span class="stat-number">{{ $projects->count() }}+</span>
                                <span class="stat-label">Projects</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">4+</span>
                                <span class="stat-label">Organizations</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">{{ $testimonials->count() }}+</span>
                                <span class="stat-label">Testimonials</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="hero-image-wrapper">
                        <div class="hero-image-bg"></div>
                        <img src="{{ asset('images/profile/profilrappa.jpeg') }}" alt="Raffa" class="hero-image" onerror="this.src='{{ asset('storage/profile/raffa.jpg') }}'">
                        <!-- Floating cards positioned above the profile image -->
                        <div class="floating-card card-top-1">
                            <i class="fas fa-code"></i>
                            <span>Backend Dev</span>
                        </div>
                        <div class="floating-card card-top-2">
                            <i class="fas fa-users"></i>
                            <span>Team Player</span>
                        </div>
                        <div class="floating-card card-top-3">
                            <i class="fas fa-lightbulb"></i>
                            <span>Problem Solver</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-indicator">
                <span>Scroll Down</span>
                <i class="fas fa-arrow-down"></i>
            </div>
        </section>

        <!-- About Section - Redesigned Layout -->
        <section id="about" class="about-section-new">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">01.</span>
                    <span class="title-text">About Me</span>
                </h2>

                <div class="about-container-new">
                    <!-- Left Side - Main Content -->
                    <div class="about-main-content">
                        <div class="about-intro-card">
                            <div class="intro-header">
                                <h3 class="intro-title">Hallo! </h3>
                                <div class="intro-badge">Student Developer</div>
                            </div>

                            <div class="intro-body">
                                <p class="intro-text">
                                    Saya <strong>Raffa Nur Musyaffa</strong>, siswa kelas 11 di <strong>SMKN 1 Depok</strong> jurusan PPLG (Pengembangan Perangkat Lunak dan Gim).
                                </p>

                                <p class="intro-text">
                                    Saya sangat passionate dalam dunia programming, khususnya <strong>Backend Development</strong>. Selain fokus pada pembelajaran akademik, saya juga aktif terlibat dalam berbagai kegiatan organisasi sekolah yang mengasah kemampuan leadership dan teamwork saya.
                                </p>

                                <p class="intro-text mb-0">
                                    Target saya adalah mendapatkan beasiswa untuk melanjutkan pendidikan ke universitas dan menjadi <strong>Backend Developer profesional</strong> yang handal. Saya percaya dengan dedikasi dan kerja keras, semua mimpi dapat terwujud!
                                </p>
                            </div>
                        </div>

                        <!-- Strengths Section - Soft Skills -->
                        <div class="about-strengths-card">
                            <div class="strengths-header">
                                <i class="fas fa-star"></i>
                                <h4>Kelebihan Saya</h4>
                            </div>
                            <div class="strengths-grid">
                                <div class="strength-item">
                                    <div class="strength-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="strength-content">
                                        <h5>Time Management</h5>
                                        <p>Mengatur waktu dengan efektif</p>
                                    </div>
                                </div>
                                <div class="strength-item">
                                    <div class="strength-icon">
                                        <i class="fas fa-microphone"></i>
                                    </div>
                                    <div class="strength-content">
                                        <h5>Public Speaking</h5>
                                        <p>Komunikasi di depan umum</p>
                                    </div>
                                </div>
                                <div class="strength-item">
                                    <div class="strength-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="strength-content">
                                        <h5>Teamwork</h5>
                                        <p>Kolaborasi tim yang solid</p>
                                    </div>
                                </div>
                                <div class="strength-item">
                                    <div class="strength-icon">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <div class="strength-content">
                                        <h5>Problem Solving</h5>
                                        <p>Analisa & solusi cepat</p>
                                    </div>
                                </div>
                                <div class="strength-item">
                                    <div class="strength-icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="strength-content">
                                        <h5>Leadership</h5>
                                        <p>Memimpin dengan baik</p>
                                    </div>
                                </div>
                                <div class="strength-item">
                                    <div class="strength-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="strength-content">
                                        <h5>Event Management</h5>
                                        <p>Mengelola acara & organisasi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Info Cards -->
                    <div class="about-sidebar">
                        <!-- Career Goal Card -->
                        <div class="info-card card-goal">
                            <div class="info-card-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="info-card-content">
                                <h4>Career Goal</h4>
                                <p>Backend Developer Professional</p>
                            </div>
                        </div>

                        <!-- Education Card -->
                        <div class="info-card card-education">
                            <div class="info-card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="info-card-content">
                                <h4>Scholarship</h4>
                                <p>Mendapatkan beasiswa ke luar negeri untuk melanjutkan pendidikan ke universitas terbaik.</p>
                            </div>
                        </div>

                        <!-- Hobbies Card -->
                        <div class="info-card card-hobbies">
                            <div class="info-card-icon">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="info-card-content">
                                <h4>Hobbies</h4>
                                <div class="hobbies-tags">
                                    <span class="hobby-tag"><i class="fas fa-gamepad"></i> Gaming</span>
                                    <span class="hobby-tag"><i class="fas fa-basketball-ball"></i> Basketball</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="info-card card-stats">
                            <div class="info-card-content">
                                <h4>Quick Stats</h4>
                                <div class="stats-list">
                                    <div class="stat-item-small">
                                        <span class="stat-label">Grade</span>
                                        <span class="stat-value">11</span>
                                    </div>
                                    <div class="stat-item-small">
                                        <span class="stat-label">School</span>
                                        <span class="stat-value">SMKN 1 Depok</span>
                                    </div>
                                    <div class="stat-item-small">
                                        <span class="stat-label">Major</span>
                                        <span class="stat-value">PPLG</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education Section - Cards -->
        <section id="education" class="education-modern">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">02.</span>
                    <span class="title-text">Education</span>
                </h2>

                <div class="education-grid">
                    @forelse($educations as $education)
                    <div class="education-card-modern">
                        <div class="education-year">{{ $education->start_year }} - {{ $education->end_year ?? 'Now' }}</div>
                        <h3 class="education-institution">{{ $education->institution }}</h3>
                        <p class="education-degree">{{ $education->degree }}</p>
                        <p class="education-field">{{ $education->field_of_study }}</p>
                        @if($education->description)
                        <p class="education-desc">{{ $education->description }}</p>
                        @endif
                    </div>
                    @empty
                    <p class="text-muted">Belum ada data pendidikan</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Skills Section - Circular Progress -->
        <section id="skills" class="skills-circular">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">03.</span>
                    <span class="title-text">Skills</span>
                </h2>

                <div class="skills-container">
                    <!-- Soft Skills -->
                    <div class="skills-category">
                        <h3 class="skills-category-title">
                            <i class="fas fa-user-tie"></i> Soft Skills
                        </h3>
                        <div class="skills-grid">
                            @forelse($softSkills as $skill)
                            <div class="skill-circle-item">
                                <div class="circle-progress" data-percent="{{ $skill->proficiency }}">
                                    <svg>
                                        <circle cx="70" cy="70" r="60"></circle>
                                        <circle cx="70" cy="70" r="60" class="progress-circle"></circle>
                                    </svg>
                                    <div class="circle-content">
                                        <span class="percent-text">{{ $skill->proficiency }}%</span>
                                    </div>
                                </div>
                                <h4 class="skill-name">{{ $skill->name }}</h4>
                            </div>
                            @empty
                            <p>Belum ada soft skills</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Hard Skills -->
                    <div class="skills-category">
                        <h3 class="skills-category-title">
                            <i class="fas fa-code"></i> Hard Skills
                        </h3>
                        <div class="skills-grid">
                            @forelse($hardSkills as $skill)
                            <div class="skill-circle-item">
                                <div class="circle-progress" data-percent="{{ $skill->proficiency }}">
                                    <svg>
                                        <circle cx="70" cy="70" r="60"></circle>
                                        <circle cx="70" cy="70" r="60" class="progress-circle"></circle>
                                    </svg>
                                    <div class="circle-content">
                                        <span class="percent-text">{{ $skill->proficiency }}%</span>
                                    </div>
                                </div>
                                <h4 class="skill-name">{{ $skill->name }}</h4>
                            </div>
                            @empty
                            <p>Belum ada hard skills</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section - Masonry Layout -->
        <section id="gallery" class="gallery-masonry">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">04.</span>
                    <span class="title-text">Gallery</span>
                </h2>

                <div class="masonry-grid">
                    @forelse($projects as $index => $project)
                    <div class="masonry-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="project-card-modern">
                            <div class="project-image-wrapper">
                                @php
                                    // Support multiple path formats
                                    $imagePath = $project->image_url;
                                    if (strpos($imagePath, 'storage/') === 0) {
                                        // Old format: storage/projects/file.jpg
                                        $imageUrl = asset($imagePath);
                                    } elseif (strpos($imagePath, 'images/') === 0) {
                                        // New format: images/projects/file.jpg
                                        $imageUrl = asset($imagePath);
                                    } elseif (strpos($imagePath, 'projects/') === 0) {
                                        // Storage format: projects/file.jpg
                                        $imageUrl = asset('storage/' . $imagePath);
                                    } else {
                                        // Direct filename: file.jpg
                                        $imageUrl = asset('images/projects/' . $imagePath);
                                    }
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $project->title }}" class="project-image">
                                <div class="project-overlay">
                                    <div class="project-info">
                                        <h3 class="project-title">{{ $project->title }}</h3>
                                        <p class="project-description">{{ $project->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted">Belum ada galeri</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- My Projects Section -->
        <section id="projects" class="projects-section">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">05.</span>
                    <span class="title-text">My Projects</span>
                </h2>

                <p class="section-subtitle">Project 3D Modeling, UI/UX Design, dan Programming dari kelas 10 hingga sekarang</p>

                <div class="projects-grid">
                    @forelse($codingProjects as $codingProject)
                    <div class="project-card-new">
                        <div class="project-image-container">
                            @php
                                // Support multiple path formats
                                $imagePath = $codingProject->image_url;
                                if (strpos($imagePath, 'storage/') === 0) {
                                    $imageUrl = asset($imagePath);
                                } elseif (strpos($imagePath, 'images/') === 0) {
                                    $imageUrl = asset($imagePath);
                                } elseif (strpos($imagePath, 'coding-projects/') === 0) {
                                    $imageUrl = asset('storage/' . $imagePath);
                                } else {
                                    $imageUrl = asset('images/coding-projects/' . $imagePath);
                                }
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $codingProject->title }}" class="project-img">
                            @if($codingProject->year)
                            <div class="project-year-badge">{{ $codingProject->year }}</div>
                            @endif
                        </div>

                        <div class="project-content-new">
                            <div class="project-header-new">
                                <h3 class="project-title-new">{{ $codingProject->title }}</h3>
                                @if($codingProject->category)
                                <span class="project-category">{{ ucfirst($codingProject->category) }}</span>
                                @endif
                            </div>

                            <p class="project-description-new">{{ $codingProject->description }}</p>

                            @if($codingProject->technologies && count($codingProject->getTechnologiesArray()) > 0)
                            <div class="project-tech-stack">
                                @foreach($codingProject->getTechnologiesArray() as $tech)
                                <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @endif

                            <div class="project-links-new">
                                @if($codingProject->demo_url)
                                <a href="{{ $codingProject->demo_url }}" target="_blank" class="project-link-btn demo-btn">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                                @endif
                                @if($codingProject->github_url)
                                <a href="{{ $codingProject->github_url }}" target="_blank" class="project-link-btn github-btn">
                                    <i class="fab fa-github"></i> GitHub
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-projects">
                        <i class="fas fa-code fa-4x"></i>
                        <p>Belum ada projects. Upload project Anda!</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Experience Section - Horizontal Timeline -->
        <section id="experience" class="experience-horizontal">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">06.</span>
                    <span class="title-text">Experience</span>
                </h2>

                <div class="timeline-horizontal">
                    <div class="timeline-track">
                        <!-- Experience 1 -->
                        <div class="timeline-item-h">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card-h">
                                <span class="timeline-year">2022-2023</span>
                                <h3 class="timeline-title">Anggota Seksi Bidang Politik</h3>
                                <p class="timeline-org">OSIS SMP</p>
                                <p class="timeline-desc">Bertugas dalam mengorganisir kegiatan-kegiatan sosial dan politik sekolah.</p>
                            </div>
                        </div>

                        <!-- Experience 2 -->
                        <div class="timeline-item-h">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card-h">
                                <span class="timeline-year">2023-2024</span>
                                <h3 class="timeline-title">Wakil Ketua OSIS 2</h3>
                                <p class="timeline-org">OSIS SMP</p>
                                <p class="timeline-desc">Memimpin dan  membantu ketua berbagai inisiatif dan program sekolah.</p>
                            </div>
                        </div>

                        <!-- Experience 3 -->
                        <div class="timeline-item-h">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card-h">
                                <span class="timeline-year">2024-2025</span>
                                <h3 class="timeline-title">Anggota Komisi B</h3>
                                <p class="timeline-org">MPK SMKN 1 Depok</p>
                                <p class="timeline-desc">Terlibat dalam perencanaan dan pelaksanaan program.</p>
                            </div>
                        </div>

                        <!-- Experience 4 -->
                        <div class="timeline-item-h">
                            <div class="timeline-dot"></div>
                            <div class="timeline-card-h">
                                <span class="timeline-year">2025-2026</span>
                                <h3 class="timeline-title">Anggota Komisi B</h3>
                                <p class="timeline-org">MPK SMKN 1 Depok</p>
                                <p class="timeline-desc">Melanjutkan peran dengan pengalaman yang lebih mendalam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section - Carousel -->
        <section id="testimonials" class="testimonials-carousel">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">07.</span>
                    <span class="title-text">Testimonials</span>
                </h2>

                <div class="testimonials-slider">
                    <div class="testimonials-track">
                        @forelse($testimonials as $testimonial)
                        <div class="testimonial-slide">
                            <div class="testimonial-card-modern">
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
                                            // Support multiple path formats
                                            $imagePath = $testimonial->image_url;
                                            if (strpos($imagePath, 'storage/') === 0) {
                                                $imageUrl = asset($imagePath);
                                            } elseif (strpos($imagePath, 'images/') === 0) {
                                                $imageUrl = asset($imagePath);
                                            } elseif (strpos($imagePath, 'testimonials/') === 0) {
                                                $imageUrl = asset('storage/' . $imagePath);
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
                        <p class="text-muted">Belum ada testimoni</p>
                        @endforelse
                    </div>
                    <button class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
                </div>

                <!-- Testimonial Form -->
                <div class="testimonial-form-section">
                    <h3 class="form-section-title">Share Your Experience</h3>
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('testimonial.store') }}" method="POST" class="modern-form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Name *" required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email *" required value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="position" placeholder="Your Position" value="{{ old('position') }}">
                        </div>
                        <div class="form-group">
                            <textarea name="message" rows="4" placeholder="Your Testimonial *" required>{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="rating" required>
                                <option value="">Select Rating *</option>
                                <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                                <option value="4">⭐⭐⭐⭐ Good</option>
                                <option value="3">⭐⭐⭐ Average</option>
                                <option value="2">⭐⭐ Below Average</option>
                                <option value="1">⭐ Poor</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-submit">Submit Testimonial</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Guestbook Section - Chat Style -->
        <section id="guestbook" class="guestbook-chat">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">08.</span>
                    <span class="title-text">Guestbook</span>
                </h2>

                <div class="chat-container">
                    <div class="chat-messages">
                        <div class="empty-state">
                            <i class="fas fa-lock"></i>
                            <p>Messages are private and only visible to admin.</p>
                            <p class="text-muted">Feel free to leave a message below!</p>
                        </div>
                    </div>

                    <button class="btn-write-message" onclick="openGuestbookModal()">
                        <i class="fas fa-pen"></i> Write a Message
                    </button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer-modern">
            <div class="container-fluid px-4">
                <div class="footer-content">
                    <div class="footer-left">
                        <h3 class="footer-name">Raffa Nur Musyaffa</h3>
                        <p class="footer-tagline">Backend Developer | SMK PPLG Student</p>
                        <p class="footer-description">Passionate about creating efficient backend solutions and always eager to learn new technologies.</p>
                    </div>

                    <div class="footer-center">
                        <h4 class="footer-title">Contact</h4>
                        <div class="footer-contact">
                            <a href="mailto:raffanurmusyaffa0712@gmail.com" class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>raffanurmusyaffa0712@gmail.com</span>
                            </a>
                            <a href="tel:+6281584760025" class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 815 8476 0025</span>
                            </a>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Depok, Jawa Barat, Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <div class="footer-right">
                        <h4 class="footer-title">Follow Me</h4>
                        <div class="footer-social">
                            <a href="https://github.com/Rapsskuyy" target="_blank" class="social-link" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.instagram.com/rrapskuy/" target="_blank" class="social-link" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <a href="{{ asset('files/CV .pdf') }}" download class="btn-download-footer">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p class="copyright">&copy; {{ date('Y') }} Raffa Nur Musyaffa. All rights reserved.</p>

                </div>
            </div>
        </footer>

    </main>

    <!-- Guestbook Modal -->
    <div class="modal-overlay" id="guestbookModal">
        <div class="modal-container">
            <button class="modal-close" onclick="closeGuestbookModal()"><i class="fas fa-times"></i></button>
            <h3 class="modal-title">Leave a Message</h3>
            @if(session('success_guestbook'))
            <div class="alert alert-success">{{ session('success_guestbook') }}</div>
            @endif
            <form action="{{ route('guestbook.store') }}" method="POST" class="modern-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name *" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email (Optional)" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <textarea name="message" rows="5" placeholder="Your Message *" required maxlength="1000">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
