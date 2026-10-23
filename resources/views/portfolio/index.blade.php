<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $portfolioCssVersion = filemtime(public_path('css/portfolio.css')) ?: 'dev';
        $portfolioJsVersion = filemtime(public_path('js/portfolio.js')) ?: 'dev';
        $portfolioTranslations = [
            'en' => require resource_path('lang/en/portfolio.php'),
            'id' => require resource_path('lang/id/portfolio.php'),
        ];
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title data-i18n="meta.title">Raffa Nur Musyaffa - Portfolio & Scholarship Dossier</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <!-- Keep the hero image discoverable early; Bootstrap and font styles load after first paint. -->
    <link rel="preload" as="image" href="{{ asset('images/profile/profilrappa_original_raw.webp') }}" fetchpriority="high">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" media="print" onload="this.onload=null;this.media='all'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></noscript>
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" media="print" onload="this.onload=null;this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"></noscript>
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}?v={{ $portfolioCssVersion }}">
</head>

<body>
    <div class="portfolio-splash" id="portfolioSplash" aria-hidden="true">
        <div class="portfolio-splash__content">
            <span class="portfolio-splash__eyebrow">Hello</span>
            <strong class="portfolio-splash__name">Raffa Nur Musyaffa</strong>
            <button type="button" class="portfolio-splash__skip" id="portfolioSplashSkip"><span data-i18n="meta.skipIntro">Skip intro</span> <span aria-hidden="true">â†’</span></button>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav" aria-label="Portfolio sections">
        <button type="button" class="logo sidebar-menu-toggle" id="sidebarMenuToggle" title="Open portfolio menu" aria-label="Open portfolio menu" aria-haspopup="dialog" aria-expanded="false" aria-controls="mobileMorePanel">
            <svg class="logo-svg" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Raffa Logo">
                <path d="M6 5H16.5C19.5376 5 22 7.46243 22 10.5C22 13.0978 20.1947 15.2736 17.75 15.8454L22.5 23H17.2L12.8 16H10.5V23H6V5Z" fill="url(#rLogoGrad)"/>
                <path d="M10.5 8.5V12.5H16C17.1046 12.5 18 11.6046 18 10.5C18 9.39543 17.1046 8.5 16 8.5H10.5Z" fill="#0a0f1d"/>
                <circle cx="21.5" cy="5.5" r="2.5" fill="#ec4899"/>
                <defs>
                    <linearGradient id="rLogoGrad" x1="6" y1="5" x2="22" y2="23" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#818cf8"/>
                        <stop offset="1" stop-color="#6366f1"/>
                    </linearGradient>
                </defs>
            </svg>
            <span>
                <i class="fas fa-bars" aria-hidden="true"></i>
                <span data-i18n="meta.menu">Menu</span>
            </span>
        </button>
        <ul class="nav-menu">
            <li><a href="#home" class="nav-dot active" aria-current="location" data-i18n-nav="home"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label">Home</span></a></li>
            <li><a href="#about" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.about">About</span></a></li>
            <li><a href="#education" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.education">Education</span></a></li>
            <li><a href="#skills" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.skills">Skills</span></a></li>
            <li><a href="#experience" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.experience">Experience</span></a></li>
            <li><a href="#projects" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.projects">Projects</span></a></li>
            <li><a href="#gallery" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.gallery">Gallery</span></a></li>
            <li><a href="#contact" class="nav-dot"><span class="nav-dot-marker" aria-hidden="true"></span><span class="nav-dot-label" data-i18n="nav.contact">Contact</span></a></li>
        </ul>
        <div class="social-links-sidebar">
            <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" aria-label="Open Raffa's GitHub profile"><i class="fab fa-github" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/rrapskuy/" target="_blank" rel="noopener noreferrer" aria-label="Open Raffa's Instagram profile"><i class="fab fa-instagram" aria-hidden="true"></i></a>
        </div>
        <button class="theme-toggle-btn" id="themeToggle" type="button" onclick="toggleTheme()" aria-label="Toggle Theme" title="Toggle Theme" data-i18n-label="meta.themeToggle">
            <i class="fas fa-sun" id="themeIcon"></i>
        </button>
        <button class="language-toggle-btn" id="languageToggle" type="button" aria-label="Switch language" title="Switch language">
            <span id="languageToggleLabel">ID</span>
        </button>
    </nav>

    <!-- Mobile Bottom Navigation Bar -->
    <nav class="mobile-bottom-nav" aria-label="Primary portfolio navigation">
        <a href="#home" class="mobile-nav-link active"><i class="fas fa-home" aria-hidden="true"></i><span data-i18n="nav.home">Home</span></a>
        <a href="#about" class="mobile-nav-link"><i class="fas fa-user" aria-hidden="true"></i><span data-i18n="nav.about">About</span></a>
        <a href="#experience" class="mobile-nav-link"><i class="fas fa-users" aria-hidden="true"></i><span data-i18n="nav.experience">Experience</span></a>
        <a href="#projects" class="mobile-nav-link"><i class="fas fa-code" aria-hidden="true"></i><span data-i18n="nav.projects">Projects</span></a>
        <a href="#contact" class="mobile-nav-link"><i class="fas fa-envelope" aria-hidden="true"></i><span data-i18n="nav.contact">Contact</span></a>
        <button type="button" class="mobile-nav-more-toggle" id="mobileMoreToggle" aria-haspopup="dialog" aria-expanded="false" aria-controls="mobileMorePanel">
            <i class="fas fa-ellipsis-h" aria-hidden="true"></i><span data-i18n="nav.more">More</span>
        </button>
    </nav>

    <div class="mobile-more-overlay" id="mobileMorePanel" hidden aria-hidden="true">
        <div class="mobile-more-dialog" role="dialog" aria-modal="true" aria-labelledby="mobileMoreTitle">
            <div class="mobile-more-header">
                <div>
                    <span class="mobile-more-kicker" data-i18n="nav.exploreGroup">Explore</span>
                    <h2 id="mobileMoreTitle">Portfolio</h2>
                </div>
                <button type="button" class="mobile-more-close" data-mobile-more-close aria-label="Close navigation menu">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="mobile-more-links">
                <p class="mobile-more-group-label" data-i18n="nav.exploreGroup">Explore</p>
                <a href="#home" class="mobile-more-link"><i class="fas fa-house" aria-hidden="true"></i><span data-i18n="nav.home">Home</span></a>
                <a href="#about" class="mobile-more-link"><i class="fas fa-user" aria-hidden="true"></i><span data-i18n="nav.about">About</span></a>
                <a href="#education" class="mobile-more-link"><i class="fas fa-graduation-cap" aria-hidden="true"></i><span data-i18n="nav.education">Education</span></a>
                <a href="#skills" class="mobile-more-link"><i class="fas fa-chart-bar" aria-hidden="true"></i><span data-i18n="nav.skills">Skills</span></a>
                <p class="mobile-more-group-label" data-i18n="nav.workGroup">Work</p>
                <a href="#experience" class="mobile-more-link"><i class="fas fa-users" aria-hidden="true"></i><span data-i18n="nav.experience">Experience</span></a>
                <a href="#projects" class="mobile-more-link"><i class="fas fa-code" aria-hidden="true"></i><span data-i18n="nav.projects">Projects</span></a>
                <a href="#gallery" class="mobile-more-link"><i class="fas fa-images" aria-hidden="true"></i><span data-i18n="nav.gallery">Gallery</span></a>
                <button type="button" class="mobile-language-toggle" id="mobileLanguageToggle" aria-label="Switch language">
                    <i class="fas fa-language" aria-hidden="true"></i><span id="mobileLanguageToggleLabel">ID</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Hero Section - Fullscreen Split -->
        <section id="home" class="hero-fullscreen">
            @php
                $heroProfileImages = [
                asset('images/profile/profilrappa_original_raw.webp'),
                asset('images/profile/profile.webp'),
                asset('images/profile/rapoy122345.webp'),
                ];
            @endphp
            <div class="hero-split-container">
                <div class="hero-left">
                    <div class="hero-content hero-content--focused">
                        <span class="hero-greeting" data-i18n="hero.greeting">Hello, I'm</span>
                        <h1 class="hero-name">Raffa Nur<br>Musyaffa</h1>
                        <div class="hero-role-wrapper">
                            <span class="hero-role-label" data-i18n="hero.rolePrefix">I'm a</span>
                            <span class="hero-role" id="roleRotator">Backend Engineer</span>
                        </div>
                        <div class="hero-buttons">
                            <a href="#projects" class="btn-primary-custom">
                                <i class="fas fa-layer-group"></i> <span data-i18n="hero.btnProjects">View Projects</span>
                            </a>
                            <a href="{{ asset('files/CV .pdf') }}" download class="btn-download-cv">
                                <i class="fas fa-download"></i> <span data-i18n="hero.btnCv">Download CV</span>
                            </a>
                            <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" class="btn-github-hero">
                                <i class="fab fa-github"></i> <span data-i18n="hero.btnGithub">GitHub</span>
                            </a>
                            <a href="#contact" class="btn-secondary-custom">
                                <i class="fas fa-paper-plane"></i> <span data-i18n="hero.btnHello">Say Hello</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="hero-image-wrapper">
                        <div class="hero-image-bg"></div>
                        <img src="{{ asset('images/profile/profilrappa_original_raw.webp') }}" alt="Raffa Nur Musyaffa" id="heroProfileImage" class="hero-image" width="480" height="480" fetchpriority="high" loading="eager" decoding="async" data-hero-images='@json($heroProfileImages)' onerror="this.src='{{ asset('images/profile/profile.webp') }}'">
                        <!-- Floating cards positioned above the profile image -->
                        <div class="floating-card card-top-1">
                            <i class="fas fa-code"></i>
                            <span data-i18n="hero.floatingCards.card1">Backend Dev</span>
                        </div>
                        <div class="floating-card card-top-2">
                            <i class="fas fa-users"></i>
                            <span data-i18n="hero.floatingCards.card2">Team Player</span>
                        </div>
                        <div class="floating-card card-top-3">
                            <i class="fas fa-lightbulb"></i>
                            <span data-i18n="hero.floatingCards.card3">Problem Solver</span>
                        </div>
                    </div>
                </div>
                <div class="hero-tech-stack">
                    <span class="tech-stack-label" data-i18n="hero.toolsLabel">Software & Tools I Use:</span>
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
                                <div class="tech-icon" title="Laravel"><img src="{{ asset('images/tech/laravel.svg') }}" alt="Laravel" width="32" height="32" loading="lazy" decoding="async"></div>
                                <div class="tech-icon" title="Supabase"><img src="{{ asset('images/tech/supabase.svg') }}" alt="Supabase" width="32" height="32" loading="lazy" decoding="async"></div>
                                <div class="tech-icon" title="Vercel"><img src="{{ asset('images/tech/vercel.svg') }}" alt="Vercel" width="32" height="32" loading="lazy" decoding="async"></div>
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
                                <div class="tech-icon" title="Laravel"><img src="{{ asset('images/tech/laravel.svg') }}" alt="" width="32" height="32" loading="lazy" decoding="async"></div>
                                <div class="tech-icon" title="Supabase"><img src="{{ asset('images/tech/supabase.svg') }}" alt="" width="32" height="32" loading="lazy" decoding="async"></div>
                                <div class="tech-icon" title="Vercel"><img src="{{ asset('images/tech/vercel.svg') }}" alt="" width="32" height="32" loading="lazy" decoding="async"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-indicator">
                <span data-i18n="hero.scrollDown">Scroll Down</span>
                <i class="fas fa-arrow-down"></i>
            </div>
        </section>

        <!-- About Section - Redesigned Layout -->
        <section id="about" class="about-section-new" data-section-reveal>
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number" data-i18n="about.sectionNum">01.</span>
                    <span class="title-text" data-i18n="about.sectionTitle">About Me</span>
                </h2>

                <div class="about-container-new">
                    <!-- Left Side - Main Content -->
                    <div class="about-main-content">
                        <div class="about-intro-card">
                            <div class="intro-header">
                                <h3 class="intro-title" data-i18n="about.introTitle">Hello!</h3>
                                <div class="intro-badge" data-i18n="about.badge">Student Developer & Scholar Aspirant</div>
                            </div>

                            <div class="intro-body">
                                <p class="intro-text" data-i18n="about.bio1">
                                    I am <strong>Raffa Nur Musyaffa</strong>, an 11th-grade student at <strong>SMKN 1 Depok</strong> majoring in Software Engineering and Game Development (PPLG).
                                </p>

                                <p class="intro-text" data-i18n="about.bio2">
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
                                <h4 data-i18n="about.studyGoalTitle">Study Goal</h4>
                                <p data-i18n="about.studyGoalDesc">I hope to earn a university scholarship to study Computer Science or Software Engineering and work toward becoming a Backend Systems Engineer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Education Section - Cards -->
        <section id="education" class="education-modern" data-section-reveal>
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number" data-i18n="education.sectionNum">02.</span>
                    <span class="title-text" data-i18n="education.sectionTitle">Education</span>
                </h2>

                <div class="education-grid">
                    @php
                        $educationTranslationKeys = [
                            'SDN Cibubur 10' => 'sd',
                            'SMPN 15 Depok' => 'smp',
                            'SMKN 1 Depok' => 'smk',
                        ];
                    @endphp
                    @forelse($educations as $education)
                    @php $educationTranslationKey = $educationTranslationKeys[$education->institution] ?? null; @endphp
                    <div class="education-card-modern">
                        <div class="education-year">{{ $education->start_year }} - {{ $education->end_year ?? 'Now' }}</div>
                        <h3 class="education-institution">{{ $education->institution }}</h3>
                        <p class="education-degree" @if($educationTranslationKey) data-i18n="education.{{ $educationTranslationKey }}.degree" @endif>{{ $education->degree }}</p>
                        <p class="education-field" @if($educationTranslationKey) data-i18n="education.{{ $educationTranslationKey }}.field" @endif>{{ $education->field_of_study }}</p>
                        @if($education->description)
                        <p class="education-desc" @if($educationTranslationKey) data-i18n="education.{{ $educationTranslationKey }}.desc" @endif>{{ $education->description }}</p>
                        @endif
                    </div>
                    @empty
                    <p class="text-muted">No education records found</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Skills Section - Competency List -->
        <section id="skills" class="skills-circular" data-section-reveal>
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number" data-i18n="skills.sectionNum">03.</span>
                    <span class="title-text" data-i18n="skills.sectionTitle">Skills</span>
                </h2>

                <div class="skills-panels">
                    <!-- Soft Skills Panel -->
                    <div class="skills-panel skills-panel--soft">
                        <div class="skills-panel-header">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                            <div>
                                <h3 class="skills-panel-title" data-i18n="skills.softTitle">Soft Skills &amp; Leadership</h3>
                                <p class="skills-panel-sub" data-i18n="skills.softSub">Interpersonal &amp; organizational competencies</p>
                            </div>
                        </div>
                        <ul class="skills-list" role="list">
                            @forelse($softSkills as $skill)
                            <li class="skill-row">
                                <div class="skill-row-meta">
                                    <span class="skill-row-name">{{ $skill->name }}</span>
                                    <span class="skill-row-pct" aria-hidden="true">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill"
                                         data-percent="{{ $skill->proficiency }}"
                                         role="progressbar"
                                         aria-valuenow="{{ $skill->proficiency }}"
                                         aria-valuemin="0"
                                         aria-valuemax="100"
                                         aria-label="{{ $skill->name }}: {{ $skill->proficiency }}%"></div>
                                </div>
                            </li>
                            @empty
                            <li class="skill-empty text-muted">No soft skills available</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Technical Skills Panel -->
                    <div class="skills-panel skills-panel--hard">
                        <div class="skills-panel-header">
                            <i class="fas fa-code" aria-hidden="true"></i>
                            <div>
                                <h3 class="skills-panel-title" data-i18n="skills.hardTitle">Technical &amp; Engineering Stack</h3>
                                <p class="skills-panel-sub" data-i18n="skills.hardSub">Languages, frameworks &amp; tools</p>
                            </div>
                        </div>
                        <ul class="skills-list" role="list">
                            @forelse($hardSkills as $skill)
                            <li class="skill-row">
                                <div class="skill-row-meta">
                                    <span class="skill-row-name">{{ $skill->name }}</span>
                                    <span class="skill-row-pct" aria-hidden="true">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="skill-bar-track">
                                    <div class="skill-bar-fill"
                                         data-percent="{{ $skill->proficiency }}"
                                         role="progressbar"
                                         aria-valuenow="{{ $skill->proficiency }}"
                                         aria-valuemin="0"
                                         aria-valuemax="100"
                                         aria-label="{{ $skill->name }}: {{ $skill->proficiency }}%"></div>
                                </div>
                            </li>
                            @empty
                            <li class="skill-empty text-muted">No technical skills available</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Experience Section - 2x2 Grid Layout -->
        <section id="experience" class="experience-section" data-section-reveal>
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number" data-i18n="experience.sectionNum">04.</span>
                    <span class="title-text" data-i18n="experience.sectionTitle">Experience</span>
                </h2>

                <div class="experience-grid-2x2">
                    <!-- Experience 1 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2022-2023</span>
                            <span class="experience-org-badge"><i class="fas fa-users" aria-hidden="true"></i> SMP Student Council (OSIS)</span>
                        </div>
                        <h3 class="experience-title" data-i18n="experience.exp1.role">Political & Civic Affairs Commission Member</h3>
                        <p class="experience-desc" data-i18n="experience.exp1.desc">Organized student social and civic engagement programs, fostering school community participation.</p>
                    </div>

                    <!-- Experience 2 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2023-2024</span>
                            <span class="experience-org-badge"><i class="fas fa-users" aria-hidden="true"></i> SMP Student Council (OSIS)</span>
                        </div>
                        <h3 class="experience-title" data-i18n="experience.exp2.role">Vice President II</h3>
                        <p class="experience-desc" data-i18n="experience.exp2.desc">Assisted the President in directing council initiatives, managing student welfare programs, and overseeing departmental task forces.</p>
                    </div>

                    <!-- Experience 3 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2024-2025</span>
                            <span class="experience-org-badge"><i class="fas fa-university" aria-hidden="true"></i> MPK SMKN 1 Depok</span>
                        </div>
                        <h3 class="experience-title" data-i18n="experience.exp3.role">Commission B Member</h3>
                        <p class="experience-desc" data-i18n="experience.exp3.desc">Executed legislative oversight, strategic program planning, and student aspiration governance.</p>
                    </div>

                    <!-- Experience 4 -->
                    <div class="experience-card-2x2 timeline-item-h">
                        <div class="experience-meta-row">
                            <span class="experience-year-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 2025-2026</span>
                            <span class="experience-org-badge"><i class="fas fa-award" aria-hidden="true"></i> MPK SMKN 1 Depok</span>
                        </div>
                        <h3 class="experience-title" data-i18n="experience.exp4.role">Senior Member, Commission B</h3>
                        <p class="experience-desc" data-i18n="experience.exp4.desc">Exercising sustained leadership, mentoring junior council delegates, and auditing student body program effectiveness.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- My Projects Section -->
        <section id="projects" class="projects-section" data-section-reveal>
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number" data-i18n="projects.sectionNum">05.</span>
                    <span class="title-text" data-i18n="projects.sectionTitle">My Projects</span>
                </h2>

                <p class="section-subtitle" data-i18n="projects.subtitle">Applied portfolio showcasing Backend Systems, Fullstack Web Applications, Mobile Tools, and 3D Modeling from Grade 10 to Present</p>

                <div class="projects-grid" id="projectsGrid">
                    @php
                        $projectTranslationKeys = [
                            'System E-vote' => 'evote',
                            '3D Classroom Environment' => 'classroom3d',
                            '3D Fantasy Sword Asset' => 'sword3d',
                            'Portfolio UI/UX Concept' => 'portoUi',
                            'Course Platform UI/UX — PT Komari' => 'komariUi',
                            "McDonald's Landing Page Clone" => 'mcdClone',
                            'SMKN 1 Depok School Canteen App' => 'canteenApp',
                            'Wandek Airlines Ticketing System' => 'wandekAirlines',
                            'PT Komari Online Learning Portal' => 'komariPortal',
                            'Sarpras School Asset Borrowing System' => 'sarpras',
                            'Notes Management RESTful API' => 'notesApi',
                            'Interactive Laravel AI Chatbot' => 'chatbot',
                            'Student Academic Assessment & CRUD System' => 'assessmentCrud',
                        ];
                    @endphp
                    @forelse($codingProjects as $codingProject)
                    @php $projectTranslationKey = $projectTranslationKeys[$codingProject->title] ?? null; @endphp
                    <article class="project-card-new"
                         data-title="{{ $codingProject->title }}" 
                         data-desc="{{ $codingProject->description }}"
                         @if($projectTranslationKey)
                         data-i18n-title-key="projects.items.{{ $projectTranslationKey }}.title"
                         data-i18n-desc-key="projects.items.{{ $projectTranslationKey }}.desc"
                         @endif
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
                                <h3 class="project-title-new" @if($projectTranslationKey) data-i18n="projects.items.{{ $projectTranslationKey }}.title" @endif>{{ $codingProject->title }}</h3>
                                @if($codingProject->category)
                                <span class="project-category">{{ ucfirst($codingProject->category) }}</span>
                                @endif
                            </div>

                            <p class="project-description-new" @if($projectTranslationKey) data-i18n="projects.items.{{ $projectTranslationKey }}.desc" @endif>{{ $codingProject->description }}</p>

                            @if($codingProject->technologies && count($codingProject->getTechnologiesArray()) > 0)
                            <div class="project-tech-stack">
                                @foreach($codingProject->getTechnologiesArray() as $tech)
                                <span class="tech-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @endif

                            <div class="project-links-new">
                                <button type="button" class="project-link-btn detail-btn project-card-open" data-project-modal-trigger aria-label="Open project summary for {{ $codingProject->title }}">
                                    <i class="fas fa-eye" aria-hidden="true"></i> <span data-i18n="projects.quickView">Quick View</span>
                                </button>
                                @if($codingProject->demo_url)
                                <a href="{{ $codingProject->demo_url }}" target="_blank" rel="noopener noreferrer" class="project-link-btn demo-btn">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                                @endif
                                @if($codingProject->github_url)
                                <a href="{{ $codingProject->github_url }}" target="_blank" rel="noopener noreferrer" class="project-link-btn github-btn">
                                    <i class="fab fa-github"></i> <span data-i18n="projects.repo">Repository</span>
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
                        <span class="btn-expand-text" data-i18n="projects.viewMore">View More</span>
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

        <!-- Gallery Section - Masonry Layout -->
        <section id="gallery" class="gallery-masonry" data-section-reveal>
            <div class="container-fluid px-4">
                <h2 class="section-title-modern">
                    <span class="title-number" data-i18n="gallery.sectionNum">06.</span>
                    <span class="title-text" data-i18n="gallery.sectionTitle">Gallery</span>
                </h2>

                <div class="masonry-grid" id="galleryGrid">
                    @php
                        $galleryTranslationKeys = [
                            "Master of Ceremony — One's Harmony 2.0" => 'item1',
                            'Event Committee — Bulan Bahasa 2025' => 'item2',
                            "Logistics Committee — One's Harmony 2025" => 'item3',
                            'Master of Ceremony — Project Kolaborasi Nusantara' => 'item4',
                            'Orientation Committee — MPLS SMKN 1 Depok' => 'item5',
                            'Organizing Chairman — Student Council Plenary Assembly 2025' => 'item6',
                        ];
                    @endphp
                    @forelse($projects as $index => $project)
                    @php $galleryTranslationKey = $galleryTranslationKeys[$project->title] ?? null; @endphp
                    <div class="masonry-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="project-card-modern">
                            <div class="project-image-wrapper">
                                <img src="{{ $project->formatted_image_url }}" alt="{{ $project->title }}" class="project-image" loading="lazy" decoding="async">
                                <div class="project-overlay">
                                    <div class="project-info">
                                        <h3 class="project-title" @if($galleryTranslationKey) data-i18n="gallery.{{ $galleryTranslationKey }}.title" @endif>{{ $project->title }}</h3>
                                        <p class="project-description" @if($galleryTranslationKey) data-i18n="gallery.{{ $galleryTranslationKey }}.desc" @endif>{{ $project->description }}</p>
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
                        <span class="btn-expand-text" data-i18n="gallery.viewMore">View More</span>
                        <span class="btn-expand-badge d-none" id="galleryExpandBadge"></span>
                        <i class="fas fa-chevron-down btn-expand-icon" aria-hidden="true"></i>
                    </button>
                </div>
                @endif
            </div>
        </section>

        <!-- Footer -->
        <footer id="contact" class="footer-modern" data-section-reveal>
            <div class="container-fluid px-4">
                <div class="footer-content">
                    <div class="footer-left footer-identity">
                        <h3 class="footer-name" data-i18n="footer.name">Raffa Nur Musyaffa</h3>
                        <p class="footer-tagline" data-i18n="footer.tagline">Aspiring Backend Systems Engineer | SMKN 1 Depok</p>
                        <p class="footer-description" data-i18n="footer.desc">Passionate about creating efficient backend solutions and always eager to learn new technologies.</p>
                    </div>

                    <div class="footer-actions">
                        <section class="footer-contact-group" aria-labelledby="footer-contact-title">
                            <h4 class="footer-title" id="footer-contact-title" data-i18n="footer.contactTitle">Contact</h4>
                            <div class="footer-contact">
                                <a href="mailto:raffanurmusyaffa0712@gmail.com" class="contact-item">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    <span>raffanurmusyaffa0712@gmail.com</span>
                                </a>
                                <a href="tel:+6281584760025" class="contact-item">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    <span>+62 815 8476 0025</span>
                                </a>
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    <span data-i18n="footer.location">Depok, West Java, Indonesia</span>
                                </div>
                            </div>
                        </section>

                        <section class="footer-social-group" aria-labelledby="footer-social-title">
                            <h4 class="footer-title" id="footer-social-title" data-i18n="footer.followTitle">Follow Me</h4>
                            <div class="footer-social">
                                <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Open Raffa's GitHub profile">
                                    <i class="fab fa-github" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.instagram.com/rrapskuy/" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Open Raffa's Instagram profile">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                            <a href="{{ asset('files/CV .pdf') }}" download class="btn-download-footer">
                                <i class="fas fa-download" aria-hidden="true"></i> <span data-i18n="footer.downloadCv">Download CV</span>
                            </a>
                        </section>
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

    <script>
        window.portfolioTranslations = @json($portfolioTranslations);
    </script>
    <script src="{{ asset('js/portfolio.js') }}?v={{ $portfolioJsVersion }}" defer></script>

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
