<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio - Raffa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#home">
                <i class="fas fa-user-circle"></i> Raffa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pendidikan">Pendidikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pengalaman">Pengalaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bukutamu">Buku Tamu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Home/Profile Section -->
        <section id="home" class="hero-section hero-large text-center">
            <div class="hero-overlay"></div>
            <div class="container position-relative">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4 text-center mb-4">
                        <div class="profile-image mb-3 mx-auto">
                            <img src="{{ asset('storage/profile/raffa.jpg') }}" alt="Profile" class="rounded img-fluid profile-square" width="220">
                        </div>
                    </div>
                    <div class="col-lg-8 text-lg-start">
                        <h4 class="text-white mb-2 hero-welcome">Halo, saya</h4>
                        <h1 class="display-3 fw-bold hero-main">
                            <span class="hero-name">Raffa Nur Musyaffa</span>
                            <span class="hero-roles"> — <span id="role-rotator">Web Developer</span></span>
                        </h1>
                        <p class="lead text-white-90 mt-3 hero-subtitle">Hai! Aku Raffa Nur Musyaffa — siswa SMK PPLG yang suka ngulik kode, bikin project seru, dan lagi fokus belajar backend sambil ngopi. Yuk kolaborasi!</p>

                        <div class="mt-4 hero-ctas">
                            <a href="#galeri" class="btn btn-light btn-lg me-2">Lihat Galeri</a>
                            <a href="https://www.instagram.com/rrapskuy/" target="_blank" class="btn btn-outline-light btn-lg me-2">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                            <a href="https://github.com/Rapsskuyy" target="_blank" class="btn btn-outline-light btn-lg">
                                <i class="fab fa-github"></i> GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="tentang" class="section-about py-5">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-user"></i> Tentang Saya
                </h2>
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <div class="about-card p-5 bg-white rounded shadow-sm">
                            <h3 class="fw-bold mb-3 text-primary">Halo! 👋</h3>
                            <p class="text-muted mb-3">Saya adalah siswa kelas 11 di SMKN 1 Depok, jurusan PPLG (Pengembangan Perangkat Lunak dan Gim). Selain fokus pada pembelajaran akademik, saya sangat aktif terlibat dalam berbagai kegiatan organisasi sekolah.</p>

                            <h4 class="fw-bold mt-4 mb-3">Kelebihan Saya:</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success"></i> <strong>Teamwork</strong> - Sangat baik dalam bekerja sama dengan tim</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success"></i> <strong>Problem Solving</strong> - Cepat menemukan solusi terbaik</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success"></i> <strong>HTML/CSS</strong> - Expert dalam frontend development</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success"></i> <strong>MySQL</strong> - Kuasai database dengan sangat baik</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success"></i> <strong>Komunikasi</strong> - Komunikatif & mudah diajak bekerja</li>
                            </ul>

                            <h4 class="fw-bold mt-4 mb-3">Passion & Goals:</h4>
                            <p class="text-muted">Saya bercita-cita untuk mendapatkan beasiswa dan melanjutkan pendidikan ke jenjang universitas. Target karir saya adalah menjadi seorang <strong>Backend Developer</strong> yang handal dan berpengalaman. Saya percaya bahwa dengan dedikasi dan kerja keras, semua mimpi dapat terwujud.</p>

                            <h4 class="fw-bold mt-4 mb-3">Hobi & Kesenangan:</h4>
                            <p class="text-muted">Di luar dunia programming, saya gemar <strong>bermain game</strong> dan <strong>bermain basket</strong>. Kedua hobi ini mengajarkan saya pentingnya strategi, kerjasama tim, dan tidak pernah menyerah.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="about-highlights">
                            <div class="highlight-item mb-4 p-4 bg-light rounded border-start border-primary border-5">
                                <h5 class="text-primary fw-bold mb-2"><i class="fas fa-laptop-code"></i> Backend Developer Aspirant</h5>
                                <p class="text-muted mb-0">Fokus pada pengembangan sistem backend yang robust dan scalable</p>
                            </div>
                            <div class="highlight-item mb-4 p-4 bg-light rounded border-start border-success border-5">
                                <h5 class="text-success fw-bold mb-2"><i class="fas fa-users"></i> Team Player</h5>
                                <p class="text-muted mb-0">Aktif dalam organisasi & memiliki kemampuan kolaborasi yang tinggi</p>
                            </div>
                            <div class="highlight-item mb-4 p-4 bg-light rounded border-start border-info border-5">
                                <h5 class="text-info fw-bold mb-2"><i class="fas fa-lightbulb"></i> Problem Solver</h5>
                                <p class="text-muted mb-0">Cepat analisa masalah dan menemukan solusi yang efektif</p>
                            </div>
                            <div class="highlight-item p-4 bg-light rounded border-start border-warning border-5">
                                <h5 class="text-warning fw-bold mb-2"><i class="fas fa-graduation-cap"></i> Scholarship Seeker</h5>
                                <p class="text-muted mb-0">Bercita-cita mendapat beasiswa untuk melanjutkan pendidikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education Section -->
        <section id="pendidikan" class="section-pendidikan py-5">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-graduation-cap"></i> Riwayat Pendidikan
                </h2>
                <div class="row">
                    @forelse($educations as $education)
                    <div class="col-md-6 mb-4">
                        <div class="education-card p-4 border-start border-primary border-4 bg-light">
                            <h5 class="fw-bold text-primary">{{ $education->institution }}</h5>
                            <p class="text-muted mb-2">{{ $education->degree }} - {{ $education->field_of_study }}</p>
                            <small class="text-secondary">{{ $education->start_year }} - {{ $education->end_year ?? 'Sekarang' }}</small>
                            @if($education->description)
                            <p class="mt-3 mb-0">{{ $education->description }}</p>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada data pendidikan</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="galeri" class="section-galeri py-5 bg-light">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-images"></i> Galeri
                </h2>
                <div class="row g-5">
                    @forelse($projects as $project)
                    <div class="col-md-4 mb-4">
                        <div class="gallery-card">
                            <div class="gallery-frame">
                                <img src="{{ asset('storage/' . $project->image_url) }}" class="gallery-image" alt="{{ $project->title }}">
                            </div>
                            <div class="gallery-content mt-4">
                                <h5 class="gallery-title fw-bold text-dark">{{ $project->title }}</h5>
                                <p class="gallery-description text-muted">{{ $project->description }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada galeri</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Experience/Organisasi Timeline Section -->
        <section id="pengalaman" class="section-experience py-5 bg-light">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-history"></i> Pengalaman Organisasi
                </h2>

                <div class="timeline">
                    <!-- Timeline Item 1 -->
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-card p-4 bg-white rounded shadow-sm">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold text-primary mb-0">Anggota Seksi Bidang Politik</h5>
                                    <span class="badge bg-primary">2022-2023</span>
                                </div>
                                <p class="text-muted mb-2"><strong>Organisasi:</strong> OSIS SMP</p>
                                <p class="text-muted">Bertugas dalam mengorganisir kegiatan-kegiatan sosial dan politik sekolah. Belajar banyak tentang kepemimpinan, komunikasi, dan tanggung jawab.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-card p-4 bg-white rounded shadow-sm">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold text-success mb-0">Wakil Ketua OSIS 2</h5>
                                    <span class="badge bg-success">2023-2024</span>
                                </div>
                                <p class="text-muted mb-2"><strong>Organisasi:</strong> OSIS SMP</p>
                                <p class="text-muted">Dipercaya sebagai Wakil Ketua OSIS di tahun kedua. Memimpin berbagai inisiatif dan program sekolah, serta mengkoordinasikan dengan berbagai seksi. Pengalaman ini memperkuat kemampuan kepemimpinan dan manajemen.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-card p-4 bg-white rounded shadow-sm">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold text-info mb-0">Anggota Komisi B</h5>
                                    <span class="badge bg-info">2024-2025</span>
                                </div>
                                <p class="text-muted mb-2"><strong>Organisasi:</strong> MPK SMKN 1 Depok</p>
                                <p class="text-muted">Menjadi anggota Komisi B di tingkat sekolah menengah atas sebagai bagian dari MPK. Terlibat dalam perencanaan dan pelaksanaan program yang lebih matang dan professional.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <div class="timeline-card p-4 bg-white rounded shadow-sm">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold text-warning mb-0">Anggota Komisi B</h5>
                                    <span class="badge bg-warning text-dark">2025-2026</span>
                                </div>
                                <p class="text-muted mb-2"><strong>Organisasi:</strong> MPK SMKN 1 Depok</p>
                                <p class="text-muted">Melanjutkan peran di Komisi B MPK dengan pengalaman dan pemahaman yang lebih mendalam. Terus berkontribusi dalam pengembangan program dan kegiatan organisasi sekolah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="section-skills py-5">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-tools"></i> Skills
                </h2>

                <!-- Soft Skills -->
                <div class="row mb-5">
                    <div class="col-12 mb-4">
                        <h3 class="text-center mb-4">
                            <i class="fas fa-user-tie"></i> Soft Skills
                        </h3>
                    </div>
                    @forelse($softSkills as $skill)
                    <div class="col-md-6 mb-4">
                        <div class="skill-card">
                            <div class="d-flex justify-content-between mb-2 w-100">
                                <h6 class="fw-bold">{{ $skill->name }}</h6>
                                <span class="badge bg-success">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $skill->proficiency }}%" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada soft skills</p>
                    </div>
                    @endforelse
                </div>

                <!-- Hard Skills -->
                <div class="row">
                    <div class="col-12 mb-4">
                        <h3 class="text-center mb-4">
                            <i class="fas fa-code"></i> Hard Skills
                        </h3>
                    </div>
                    @forelse($hardSkills as $skill)
                    <div class="col-md-4 mb-4">
                        <div class="skill-card">
                            <div class="d-flex justify-content-between mb-2 w-100">
                                <h6 class="fw-bold">{{ $skill->name }}</h6>
                                <span class="badge bg-primary">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->proficiency }}%" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada hard skills</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimoni" class="section-testimoni py-5 bg-light">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-star"></i> Testimoni Klien
                </h2>

                <!-- Display Testimonials -->
                <div class="row g-4 mb-5">
                    @forelse($testimonials as $testimonial)
                    <div class="col-md-6 mb-4">
                        <div class="testimonial-card p-4 bg-white border-0 rounded shadow-sm h-100">
                            <div class="d-flex align-items-center mb-3">
                                <div class="testimonial-avatar me-3">
                                    @if($testimonial->image_url)
                                        <img src="{{ asset('storage/' . $testimonial->image_url) }}" alt="{{ $testimonial->name }}" class="rounded-circle" width="50" height="50">
                                    @else
                                        <div class="placeholder-avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <span class="fw-bold">{{ substr($testimonial->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $testimonial->name }}</h6>
                                    <small class="text-muted">{{ $testimonial->position }}</small>
                                </div>
                            </div>
                            <div class="rating mb-2">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="fas fa-star text-warning"></i>
                                @endfor
                                @for($i = $testimonial->rating; $i < 5; $i++)
                                    <i class="far fa-star text-warning"></i>
                                @endfor
                            </div>
                            <p class="mb-0 text-muted">{{ $testimonial->message }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada testimoni</p>
                    </div>
                    @endforelse
                </div>

                <hr class="my-5">

                <!-- Testimonial Form -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h3 class="text-center mb-4">Berikan Testimoni Anda</h3>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <form action="{{ route('testimonial.store') }}" method="POST" class="testimonial-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Posisi/Jabatan</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="Misal: CEO, Manager, Project Lead" value="{{ old('position') }}">
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Testimoni Anda <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" required placeholder="Bagikan pengalaman Anda bekerja dengan saya..." maxlength="1000">{{ old('message') }}</textarea>
                                <small class="text-muted">Minimal 10 karakter, maksimal 1000 karakter</small>
                                @error('message')
                                <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                                <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating" required>
                                    <option value="">-- Pilih Rating --</option>
                                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ Sangat Memuaskan (5)</option>
                                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ Memuaskan (4)</option>
                                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ Cukup Baik (3)</option>
                                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐ Kurang Baik (2)</option>
                                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐ Tidak Puas (1)</option>
                                </select>
                                @error('rating')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane"></i> Kirim Testimoni
                                </button>
                            </div>
                            <small class="text-muted d-block text-center mt-3">Testimoni Anda akan di-review sebelum ditampilkan di website</small>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Guestbook Section -->
        <section id="bukutamu" class="section-bukutamu py-5">
            <div class="container">
                <h2 class="section-title text-center mb-5">
                    <i class="fas fa-book"></i> Buku Tamu
                </h2>

                <div class="row">
                    <!-- Guestbook Form -->
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <div class="card border-0 shadow-sm p-4">
                            <h4 class="mb-4">Isi Buku Tamu</h4>
                            
                            @if(session('success_guestbook'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_guestbook') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            <form action="{{ route('guestbook.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="gb_name" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="gb_name" name="name" required value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gb_email" class="form-label">Email (Opsional)</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="gb_email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gb_message" class="form-label">Pesan <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="gb_message" name="message" rows="4" required placeholder="Tuliskan pesan Anda..." maxlength="1000">{{ old('message') }}</textarea>
                                    @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Guestbook Messages List -->
                    <div class="col-lg-7">
                        <div class="guestbook-list ps-lg-4">
                            <h4 class="mb-4">Pesan Terbaru</h4>
                            
                            <div class="guestbook-messages" style="max-height: 500px; overflow-y: auto;">
                                @forelse($guestbooks as $gb)
                                <div class="mb-4 p-3 bg-light rounded border-start border-primary border-4 shadow-sm">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0">{{ $gb->name }}</h6>
                                        <small class="text-muted">{{ $gb->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0 text-muted small">{{ $gb->message }}</p>
                                </div>
                                @empty
                                <div class="text-center py-5">
                                    <i class="fas fa-comment-slash fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada pesan di buku tamu.</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-3">Tentang Raffa</h5>
                    <p>Siswa SMK PPLG yang berdedikasi untuk menjadi Backend Developer handal. Suka memecahkan masalah kompleks melalui kode dan terus belajar teknologi terbaru.</p>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#home" class="text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="#tentang" class="text-decoration-none">Tentang</a></li>
                        <li class="mb-2"><a href="#galeri" class="text-decoration-none">Galeri</a></li>
                        <li class="mb-2"><a href="#skills" class="text-decoration-none">Skills</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            <a href="mailto:raffanurmusyaffa0712@gmail.com" class="text-decoration-none">raffanur@gmail.com</a>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2 text-primary"></i>
                            <a href="tel:+6281584760025" class="text-decoration-none">+62 815 8476 0025</a>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            <span class="text-muted">Depok, Indonesia</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Media Sosial</h5>
                    <p class="mb-3">Mari terhubung melalui platform media sosial saya.</p>
                    <div class="d-flex gap-2">
                        <a href="https://www.instagram.com/rrapskuy/" class="btn btn-outline-light btn-sm rounded-circle" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://github.com/Rapsskuyy" class="btn btn-outline-light btn-sm rounded-circle" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-12">
                    <p class="copyright mb-0">&copy; {{ date('Y') }} Raffa Nur Musyaffa. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/portfolio.js') }}"></script>
</body>
</html>
