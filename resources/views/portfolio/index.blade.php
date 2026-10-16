<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raffa Nur Musyaffa - Portfolio & Scholarship Dossier</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <!-- Resource Preconnects & High-Priority LCP Preload -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preload" as="image" href="{{ asset('images/profile/profilrappa.webp') }}" fetchpriority="high">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"></noscript>
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}?v=20261016-smooth-transitions">
</head>

<body>
    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
        <div class="logo">
            <span class="logo-text">R</span>
        </div>
        <ul class="nav-menu">
            <li><a href="#home" class="nav-dot active" data-tooltip="Home" aria-label="Home" aria-current="location"><span></span></a></li>
            <li><a href="#about" class="nav-dot" data-tooltip="About" aria-label="About"><span></span></a></li>
            <li><a href="#education" class="nav-dot" data-tooltip="Education" aria-label="Education"><span></span></a></li>
            <li><a href="#skills" class="nav-dot" data-tooltip="Skills" aria-label="Skills"><span></span></a></li>
            <li><a href="#gallery" class="nav-dot" data-tooltip="Gallery" aria-label="Gallery"><span></span></a></li>
            <li><a href="#projects" class="nav-dot" data-tooltip="Projects" aria-label="Projects"><span></span></a></li>
            <li><a href="#experience" class="nav-dot" data-tooltip="Experience" aria-label="Experience"><span></span></a></li>
            <li><a href="#contact" class="nav-dot" data-tooltip="Contact" aria-label="Contact"><span></span></a></li>
        </ul>
        <div class="social-links-sidebar">
            <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer"><i class="fab fa-github"></i></a>
            <a href="https://www.instagram.com/rrapskuy/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
        </div>
        <!-- Theme Toggle -->
        <button class="theme-toggle-btn" id="themeToggle" onclick="toggleTheme()" title="Toggle Theme">
            <i class="fas fa-sun" id="themeIcon"></i>
        </button>
    </nav>

    <!-- Mobile Bottom Navigation Bar -->
    <nav class="mobile-bottom-nav">
        <a href="#home" class="mobile-nav-link active"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="#about" class="mobile-nav-link"><i class="fas fa-user"></i><span>About</span></a>
        <a href="#projects" class="mobile-nav-link"><i class="fas fa-code"></i><span>Projects</span></a>
        <a href="#experience" class="mobile-nav-link"><i class="fas fa-users"></i><span>Experience</span></a>
        <a href="#contact" class="mobile-nav-link"><i class="fas fa-envelope"></i><span>Contact</span></a>
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
                        <p class="hero-description">Software Engineering student at SMKN 1 Depok with a dedicated focus on Backend Architecture. Passionate about engineering scalable systems, exploring distributed technologies, and demonstrating leadership through student council governance.</p>
                        <div class="hero-buttons">
                            <a href="#projects" class="btn-primary-custom">
                                <i class="fas fa-layer-group"></i> View Projects
                            </a>
                            <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" class="btn-github-hero">
                                <i class="fab fa-github"></i> GitHub Profile
                            </a>
                            <a href="{{ asset('files/CV .pdf') }}" download class="btn-download-cv">
                                <i class="fas fa-download"></i> Download CV
                            </a>
                            <a href="#contact" class="btn-secondary-custom">
                                <i class="fas fa-paper-plane"></i> Say Hello
                            </a>
                        </div>
                        
                        <div class="hero-tech-stack">
                            <span class="tech-stack-label">Software & Tools I Use:</span>
                            <div class="tech-marquee-container">
                                <div class="tech-marquee">
                                    <div class="marquee-group">
                                        <div class="tech-icon" title="VS Code"><img src="{{ asset('images/tech/vscode.svg') }}" alt="VS Code" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="GitHub"><img src="{{ asset('images/tech/github.svg') }}" alt="GitHub" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Laragon"><img src="{{ asset('images/laragon.svg') }}" alt="Laragon" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Canva"><img src="{{ asset('images/tech/canva.svg') }}" alt="Canva" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Figma"><img src="{{ asset('images/tech/figma.svg') }}" alt="Figma" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Unity Hub"><img src="{{ asset('images/tech/unity.svg') }}" alt="Unity" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Apache NetBeans"><img src="{{ asset('images/tech/netbeans.svg') }}" alt="NetBeans" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Eclipse IDE"><img src="{{ asset('images/tech/eclipse.svg') }}" alt="Eclipse" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Team Viewer"><img src="{{ asset('images/tech/teamviewer.svg') }}" alt="TeamViewer" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Blender"><img src="{{ asset('images/tech/blender.svg') }}" alt="Blender" width="32" height="32" loading="lazy" decoding="async"></div>
                                    </div>
                                    <div class="marquee-group" aria-hidden="true">
                                        <div class="tech-icon" title="VS Code"><img src="{{ asset('images/tech/vscode.svg') }}" alt="VS Code" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="GitHub"><img src="{{ asset('images/tech/github.svg') }}" alt="GitHub" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Laragon"><img src="{{ asset('images/laragon.svg') }}" alt="Laragon" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Canva"><img src="{{ asset('images/tech/canva.svg') }}" alt="Canva" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Figma"><img src="{{ asset('images/tech/figma.svg') }}" alt="Figma" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Unity Hub"><img src="{{ asset('images/tech/unity.svg') }}" alt="Unity" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Apache NetBeans"><img src="{{ asset('images/tech/netbeans.svg') }}" alt="NetBeans" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Eclipse IDE"><img src="{{ asset('images/tech/eclipse.svg') }}" alt="Eclipse" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Team Viewer"><img src="{{ asset('images/tech/teamviewer.svg') }}" alt="TeamViewer" width="32" height="32" loading="lazy" decoding="async"></div>
                                        <div class="tech-icon" title="Blender"><img src="{{ asset('images/tech/blender.svg') }}" alt="Blender" width="32" height="32" loading="lazy" decoding="async"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="hero-image-wrapper">
                        <div class="hero-image-bg"></div>
                        <img src="{{ asset('images/profile/profilrappa.webp') }}" alt="Raffa Nur Musyaffa" id="heroProfileImage" class="hero-image" width="480" height="480" fetchpriority="high" decoding="sync" style="transition: opacity 0.5s ease-in-out;" onerror="this.src='{{ asset('images/profile/profilrappa.jpeg') }}'">
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
                                <h3 class="intro-title">Hello!</h3>
                                <div class="intro-badge">Student Developer & Scholar Aspirant</div>
                            </div>

                            <div class="intro-body">
                                <p class="intro-text">
                                    I am <strong>Raffa Nur Musyaffa</strong>, an 11th-grade student at <strong>SMKN 1 Depok</strong> majoring in Software Engineering and Game Development (PPLG).
                                </p>

                                <p class="intro-text">
                                    I have a deep commitment to programming, particularly in <strong>Backend Engineering and Systems Architecture</strong>. Beyond academic coursework, I actively serve in school governance organizations (MPK & OSIS), cultivating strong leadership, public communication, and collaborative problem-solving skills.
                                </p>

                            </div>
                        </div>

                    </div>

                    <!-- Right Side - Info Cards -->
                    <div class="about-sidebar">
                        <!-- Scholarship and study intention -->
                        <div class="info-card card-education">
                            <div class="info-card-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="info-card-content">
                                <h4>Study Goal</h4>
                                <p>I hope to earn a university scholarship to study Computer Science or Software Engineering and work toward becoming a Backend Systems Engineer.</p>
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
                    <p class="text-muted">No education records found</p>
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
                            <i class="fas fa-user-tie"></i> Soft Skills & Leadership
                        </h3>
                        <div class="skills-grid">
                            @forelse($softSkills as $skill)
                            <div class="skill-circle-item">
                                <div class="circle-progress" data-percent="{{ $skill->proficiency }}">
                                    <svg viewBox="0 0 140 140">
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
                            <p class="text-muted">No soft skills available</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Hard Skills -->
                    <div class="skills-category">
                        <h3 class="skills-category-title">
                            <i class="fas fa-code"></i> Technical & Engineering Stack
                        </h3>
                        <div class="skills-grid">
                            @forelse($hardSkills as $skill)
                            <div class="skill-circle-item">
                                <div class="circle-progress" data-percent="{{ $skill->proficiency }}">
                                    <svg viewBox="0 0 140 140">
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
                            <p class="text-muted">No technical skills available</p>
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

                <div class="masonry-grid" id="galleryGrid">
                    @forelse($projects as $index => $project)
                    <div class="masonry-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="project-card-modern">
                            <div class="project-image-wrapper">
                                <img src="{{ $project->formatted_image_url }}" alt="{{ $project->title }}" class="project-image" loading="lazy" decoding="async">
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
                    <div class="col-12 py-5 text-center empty-state-box">
                        <div class="empty-icon-wrapper mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-muted opacity-50 ms-auto me-auto d-block">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <h5 class="text-white-50 fw-semibold mb-1">Photo Gallery Coming Soon</h5>
                        <p class="text-muted small">Event, competition, and leadership documentation will be updated shortly.</p>
                    </div>
                    @endforelse
                </div>

                @if(count($projects) > 2)
                <div class="expand-controls-wrapper d-none" id="galleryExpandControls">
                    <button type="button" class="btn-expand-toggle" id="galleryExpandBtn" aria-expanded="false" aria-controls="galleryGrid">
                        <span class="btn-expand-text">Lihat Selengkapnya</span>
                        <span class="btn-expand-badge d-none" id="galleryExpandBadge"></span>
                        <i class="fas fa-chevron-down btn-expand-icon" aria-hidden="true"></i>
                    </button>
                </div>
                @endif
            </div>
        </section>

        <!-- My Projects Section -->
        <section id="projects" class="projects-section">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">05.</span>
                    <span class="title-text">My Projects</span>
                </h2>

                <p class="section-subtitle">Applied portfolio showcasing Backend Systems, Fullstack Web Applications, Mobile Tools, and 3D Modeling from Grade 10 to Present</p>

                <div class="projects-grid" id="projectsGrid">
                    @forelse($codingProjects as $codingProject)
                    <article class="project-card-new"
                         data-title="{{ $codingProject->title }}" 
                         data-desc="{{ $codingProject->description }}"
                         data-tech="{{ is_array($codingProject->technologies) ? implode(',', $codingProject->technologies) : '' }}"
                         data-arch="{{ $codingProject->architecture_diagram }}"
                         data-schema="{{ $codingProject->database_schema }}"
                         data-snippet="{{ $codingProject->code_snippet }}"
                         data-github="{{ $codingProject->github_url }}">
                        <div class="project-image-container">
                            <img src="{{ $codingProject->formatted_image_url }}" alt="{{ $codingProject->title }}" class="project-img" loading="lazy" decoding="async">
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
                                <button type="button" class="project-link-btn detail-btn project-card-open" data-project-modal-trigger aria-label="Open project summary for {{ $codingProject->title }}">
                                    <i class="fas fa-eye" aria-hidden="true"></i> Quick View
                                </button>
                                @if($codingProject->demo_url)
                                <a href="{{ $codingProject->demo_url }}" target="_blank" rel="noopener noreferrer" class="project-link-btn demo-btn">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                                @endif
                                @if($codingProject->github_url)
                                <a href="{{ $codingProject->github_url }}" target="_blank" rel="noopener noreferrer" class="project-link-btn github-btn">
                                    <i class="fab fa-github"></i> Repository
                                </a>
                                @endif
                                @if($codingProject->projectDetail)
                                <button type="button" class="project-link-btn detail-btn" data-project-detail-trigger="{{ $codingProject->id }}">
                                    <i class="fas fa-layer-group"></i> View Details
                                </button>
                                @endif
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="empty-projects">
                        <i class="fas fa-code fa-4x"></i>
                        <p>No projects uploaded yet.</p>
                    </div>
                    @endforelse
                </div>

                @if(count($codingProjects) > 2)
                <div class="expand-controls-wrapper d-none" id="projectsExpandControls">
                    <button type="button" class="btn-expand-toggle" id="projectsExpandBtn" aria-expanded="false" aria-controls="projectsGrid">
                        <span class="btn-expand-text">Lihat Selengkapnya</span>
                        <span class="btn-expand-badge d-none" id="projectsExpandBadge"></span>
                        <i class="fas fa-chevron-down btn-expand-icon" aria-hidden="true"></i>
                    </button>
                </div>
                @endif
            </div>
        </section>

        <!-- ==================== PROJECT DETAIL MODALS ==================== -->
        @foreach($codingProjects as $cp)
        @if($cp->projectDetail)
        @php $detail = $cp->projectDetail; @endphp
        <div class="project-detail-overlay" id="projectDetailModal{{ $cp->id }}" role="dialog" aria-modal="true" aria-labelledby="projectDetailTitle{{ $cp->id }}" aria-hidden="true">
            <div class="project-detail-modal" tabindex="-1">
                <button type="button" class="project-detail-close" data-close-modal aria-label="Close {{ $cp->title }} details"><i class="fas fa-times" aria-hidden="true"></i></button>

                <div class="project-detail-header">
                    <div>
                        <h2 class="project-detail-title" id="projectDetailTitle{{ $cp->id }}">{{ $cp->title }}</h2>
                        <div class="project-detail-meta">
                            <span class="project-year-badge">{{ $cp->year }}</span>
                            @if($cp->category)<span class="project-category ms-2">{{ ucfirst($cp->category) }}</span>@endif
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="project-detail-tabs" role="tablist" aria-label="{{ $cp->title }} details">
                    <button type="button" class="detail-tab active" id="tab-control-{{ $cp->id }}-overview" role="tab" aria-selected="true" aria-controls="tab-{{ $cp->id }}-overview" data-project-tab="overview">Overview</button>
                    @if($detail->system_architecture)<button type="button" class="detail-tab" id="tab-control-{{ $cp->id }}-architecture" role="tab" aria-selected="false" aria-controls="tab-{{ $cp->id }}-architecture" tabindex="-1" data-project-tab="architecture">Architecture</button>@endif
                    @if($detail->database_schema)<button type="button" class="detail-tab" id="tab-control-{{ $cp->id }}-database" role="tab" aria-selected="false" aria-controls="tab-{{ $cp->id }}-database" tabindex="-1" data-project-tab="database">Database</button>@endif
                    @if($detail->code_snippets)<button type="button" class="detail-tab" id="tab-control-{{ $cp->id }}-code" role="tab" aria-selected="false" aria-controls="tab-{{ $cp->id }}-code" tabindex="-1" data-project-tab="code">Code Snippets</button>@endif
                    @if($detail->technical_specs)<button type="button" class="detail-tab" id="tab-control-{{ $cp->id }}-specs" role="tab" aria-selected="false" aria-controls="tab-{{ $cp->id }}-specs" tabindex="-1" data-project-tab="specs">Tech Specs</button>@endif
                </div>

                <!-- Tab: Overview -->
                <div class="detail-tab-content active" id="tab-{{ $cp->id }}-overview" role="tabpanel" aria-labelledby="tab-control-{{ $cp->id }}-overview">
                    <p class="project-detail-desc">{{ $cp->description }}</p>
                    @if(count($cp->getTechnologiesArray()) > 0)
                    <div class="project-tech-stack mt-3">
                        @foreach($cp->getTechnologiesArray() as $tech)
                        <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="project-links-new mt-3">
                        @if($cp->demo_url)<a href="{{ $cp->demo_url }}" target="_blank" rel="noopener noreferrer" class="project-link-btn demo-btn"><i class="fas fa-external-link-alt"></i> Live Demo</a>@endif
                        @if($cp->github_url)<a href="{{ $cp->github_url }}" target="_blank" rel="noopener noreferrer" class="project-link-btn github-btn"><i class="fab fa-github"></i> GitHub</a>@endif
                    </div>
                </div>

                <!-- Tab: Architecture -->
                @if($detail->system_architecture)
                <div class="detail-tab-content" id="tab-{{ $cp->id }}-architecture" role="tabpanel" aria-labelledby="tab-control-{{ $cp->id }}-architecture" hidden>
                    <div class="architecture-content">
                        <pre class="architecture-text">{{ $detail->system_architecture }}</pre>
                    </div>
                </div>
                @endif

                <!-- Tab: Database -->
                @if($detail->database_schema)
                <div class="detail-tab-content" id="tab-{{ $cp->id }}-database" role="tabpanel" aria-labelledby="tab-control-{{ $cp->id }}-database" hidden>
                    @php $schemas = is_array($detail->database_schema) ? $detail->database_schema : json_decode($detail->database_schema, true); @endphp
                    <div class="database-schema">
                        @foreach($schemas as $schema)
                        @if(!empty($schema['table']))
                        <div class="schema-table">
                            <div class="schema-table-header"><i class="fas fa-table me-2"></i>{{ $schema['table'] }}</div>
                            <div class="schema-columns">
                                @foreach(explode(',', $schema['columns'] ?? '') as $col)
                                <span class="schema-col">{{ trim($col) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Tab: Code Snippets -->
                @if($detail->code_snippets)
                <div class="detail-tab-content" id="tab-{{ $cp->id }}-code" role="tabpanel" aria-labelledby="tab-control-{{ $cp->id }}-code" hidden>
                    @php $snippets = is_array($detail->code_snippets) ? $detail->code_snippets : json_decode($detail->code_snippets, true); @endphp
                    @foreach($snippets as $snippet)
                    @if(!empty($snippet['code']))
                    <div class="code-snippet-block">
                        <div class="snippet-header">
                            <span class="snippet-title">{{ $snippet['title'] ?? 'Code Snippet' }}</span>
                            <span class="snippet-lang">{{ strtoupper($snippet['language'] ?? 'CODE') }}</span>
                        </div>
                        <pre class="snippet-code"><code>{{ $snippet['code'] }}</code></pre>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif

                <!-- Tab: Tech Specs -->
                @if($detail->technical_specs)
                <div class="detail-tab-content" id="tab-{{ $cp->id }}-specs" role="tabpanel" aria-labelledby="tab-control-{{ $cp->id }}-specs" hidden>
                    <pre class="specs-text">{{ $detail->technical_specs }}</pre>
                </div>
                @endif

            </div>
        </div>
        @endif
        @endforeach

        <!-- Experience Section - 2x2 Grid Layout -->
        <section id="experience" class="experience-section">
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number">06.</span>
                    <span class="title-text">Experience</span>
                </h2>

                <div class="experience-grid-2x2">
                    <!-- Experience 1 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2022-2023</span>
                            <span class="experience-org-badge"><i class="fas fa-users" aria-hidden="true"></i> SMP Student Council (OSIS)</span>
                        </div>
                        <h3 class="experience-title">Political & Civic Affairs Commission Member</h3>
                        <p class="experience-desc">Organized student social and civic engagement programs, fostering school community participation.</p>
                    </div>

                    <!-- Experience 2 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2023-2024</span>
                            <span class="experience-org-badge"><i class="fas fa-users" aria-hidden="true"></i> SMP Student Council (OSIS)</span>
                        </div>
                        <h3 class="experience-title">Vice President II</h3>
                        <p class="experience-desc">Assisted the President in directing council initiatives, managing student welfare programs, and overseeing departmental task forces.</p>
                    </div>

                    <!-- Experience 3 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2024-2025</span>
                            <span class="experience-org-badge"><i class="fas fa-university" aria-hidden="true"></i> MPK SMKN 1 Depok</span>
                        </div>
                        <h3 class="experience-title">Commission B Member</h3>
                        <p class="experience-desc">Executed legislative oversight, strategic program planning, and student aspiration governance.</p>
                    </div>

                    <!-- Experience 4 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2025-2026</span>
                            <span class="experience-org-badge"><i class="fas fa-award" aria-hidden="true"></i> MPK SMKN 1 Depok</span>
                        </div>
                        <h3 class="experience-title">Senior Member, Commission B</h3>
                        <p class="experience-desc">Exercising sustained leadership, mentoring junior council delegates, and auditing student body program effectiveness.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="contact" class="footer-modern">
            <div class="container-fluid px-4">
                <div class="footer-content">
                    <div class="footer-left">
                        <h3 class="footer-name">Raffa Nur Musyaffa</h3>
                        <p class="footer-tagline">Aspiring Backend Systems Engineer | SMKN 1 Depok</p>
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
                                <span>Depok, West Java, Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <div class="footer-right">
                        <h4 class="footer-title">Follow Me</h4>
                        <div class="footer-social">
                            <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" class="social-link" title="GitHub">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://www.instagram.com/rrapskuy/" target="_blank" rel="noopener noreferrer" class="social-link" title="Instagram">
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

    <!-- Project Technical Detail Modal -->
    <div class="modal-overlay" id="projectDetailModal" role="dialog" aria-modal="true" aria-labelledby="modal-proj-title" aria-hidden="true">
        <div class="modal-container project-detail-modal" tabindex="-1">
            <button type="button" class="modal-close" data-close-modal aria-label="Close project summary"><i class="fas fa-times" aria-hidden="true"></i></button>
            <h3 class="modal-title" id="modal-proj-title">Project Title</h3>
            <div class="project-tags-row mb-3" id="modal-proj-tech">
                <!-- Tech badges will be appended here -->
            </div>
            
            <div class="modal-scroll-body">
                <div class="modal-section mb-4">
                    <h4 class="modal-sec-title"><i class="fas fa-align-left me-2"></i> Description</h4>
                    <p id="modal-proj-desc" class="modal-sec-content">Project description goes here...</p>
                </div>
                
                <div class="modal-section mb-4 d-none" id="sec-architecture">
                    <h4 class="modal-sec-title"><i class="fas fa-network-wired me-2"></i> System Architecture</h4>
                    <pre class="modal-sec-content text-box-spec" id="modal-proj-arch"></pre>
                </div>
                
                <div class="modal-section mb-4 d-none" id="sec-schema">
                    <h4 class="modal-sec-title"><i class="fas fa-database me-2"></i> Database Schema</h4>
                    <pre class="modal-sec-content text-box-spec" id="modal-proj-schema"></pre>
                </div>
                
                <div class="modal-section mb-4 d-none" id="sec-snippet">
                    <h4 class="modal-sec-title"><i class="fas fa-code me-2"></i> Featured Code Snippet</h4>
                    <pre class="modal-sec-content code-box-spec"><code id="modal-proj-snippet"></code></pre>
                </div>
                
                <div class="modal-section mb-4 d-none" id="sec-github-link">
                    <h4 class="modal-sec-title"><i class="fab fa-github me-2"></i> Source Code Repository</h4>
                    <a id="modal-proj-github" href="#" target="_blank" rel="noopener noreferrer" class="project-link-btn github-btn d-inline-flex align-items-center" style="padding: 10px 20px; font-size: 15px;">
                        <i class="fab fa-github me-2"></i> View on GitHub
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/portfolio.js') }}?v=20261016-smooth-transitions" defer></script>

    @if(session('success') || session('success_guestbook') || (isset($errors) && $errors->any()))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                background: '#1e293b',
                color: '#fff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            @if(session('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{!! addslashes(session('success')) !!}"
                });
            @endif

            @if(isset($errors) && $errors->any())
                Toast.fire({
                    icon: 'error',
                    title: "{!! addslashes($errors->first()) !!}"
                });
            @endif
        });
    </script>
    @endif
</body>
</html>
