@extends('layouts.portfolio')

@section('title', 'Experience & Projects - Raffa Nur Musyaffa Portfolio')

@section('content')
<style>
/* Premium Experience Page Styles */
.experience-section-premium {
    padding-bottom: 4rem;
}

/* Premium Segmented Controls (macOS style) */
.tab-control-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
}

.tab-control-capsule {
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 40px;
    padding: 6px;
    display: inline-flex;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.tab-control-btn {
    position: relative;
    background: transparent;
    border: none;
    color: #94a3b8;
    padding: 12px 32px;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 34px;
    cursor: pointer;
    transition: color 0.3s ease;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 8px;
}

.tab-control-btn.active {
    color: white;
}

/* The sliding background for active tab */
.tab-active-bg {
    position: absolute;
    top: 6px;
    bottom: 6px;
    left: 6px;
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    border-radius: 34px;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    z-index: 1;
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
}

/* Tab Content */
.main-tab-content {
    display: none;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.4s ease;
}

.main-tab-content.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Masonry Grid for zero cropping */
.projects-masonry {
    column-count: 3;
    column-gap: 24px;
    margin-top: 20px;
}

@media (max-width: 1200px) {
    .projects-masonry { column-count: 2; }
}
@media (max-width: 768px) {
    .projects-masonry { column-count: 1; }
}

/* Premium Project Card */
.project-card-premium {
    break-inside: avoid;
    margin-bottom: 24px;
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 24px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.project-card-premium:hover {
    transform: translateY(-8px);
    border-color: rgba(99, 102, 241, 0.4);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

/* Image container adapts to height, no cropping */
.project-img-wrapper {
    width: 100%;
    position: relative;
    background: rgba(0,0,0,0.2);
}

.project-img-wrapper img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.5s ease;
}

.project-card-premium:hover .project-img-wrapper img {
    transform: scale(1.03);
}

.project-content-premium {
    padding: 24px;
}

.project-title-premium {
    font-size: 1.3rem;
    font-weight: 700;
    color: white;
    margin-bottom: 10px;
    line-height: 1.3;
}

.project-desc-premium {
    font-size: 0.95rem;
    color: #cbd5e1;
    line-height: 1.6;
    margin-bottom: 20px;
}

.tech-stack-premium {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.tech-badge-premium {
    padding: 4px 12px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    font-size: 0.75rem;
    color: #94a3b8;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.project-actions-premium {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn-action-premium {
    flex: 1;
    padding: 10px 15px;
    background: rgba(99, 102, 241, 0.1);
    color: #a5b4fc;
    border: 1px solid rgba(99, 102, 241, 0.2);
    border-radius: 12px;
    text-align: center;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
}

.btn-action-premium:hover {
    background: rgba(99, 102, 241, 0.8);
    color: white;
}

.btn-action-secondary {
    background: rgba(255, 255, 255, 0.05);
    color: #cbd5e1;
    border-color: rgba(255, 255, 255, 0.1);
}

.btn-action-secondary:hover {
    background: rgba(255, 255, 255, 0.15);
    color: white;
}

/* Expandable Section Controls */
.expand-controls-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
    position: relative;
    z-index: 5;
    width: 100%;
}

.btn-expand-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 13px 30px;
    background: rgba(15, 23, 42, 0.75);
    color: #e2e8f0;
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 9999px;
    font-family: 'Inter', system-ui, sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.28);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    min-height: 48px;
    text-decoration: none;
    user-select: none;
}

.btn-expand-toggle:hover {
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.25) 0%, rgba(124, 58, 237, 0.25) 100%);
    border-color: rgba(99, 102, 241, 0.5);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 14px 35px rgba(79, 70, 229, 0.28);
}

.btn-expand-toggle:focus-visible {
    outline: 2px solid #6366f1;
    outline-offset: 3px;
}

.btn-expand-badge {
    background: rgba(99, 102, 241, 0.22);
    color: #a5b4fc;
    border: 1px solid rgba(99, 102, 241, 0.35);
    font-size: 0.78rem;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
    letter-spacing: 0.02em;
    transition: all 0.3s ease;
    line-height: 1.2;
}

.btn-expand-toggle:hover .btn-expand-badge {
    background: rgba(99, 102, 241, 0.45);
    color: #ffffff;
    border-color: rgba(99, 102, 241, 0.7);
}

.btn-expand-icon {
    font-size: 0.85rem;
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

.btn-expand-toggle[aria-expanded="true"] .btn-expand-icon {
    transform: rotate(180deg);
}

.expand-item-collapsed {
    display: none !important;
}

.expand-item-animating {
    animation: expandFadeIn 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes expandFadeIn {
    0% {
        opacity: 0;
        transform: translateY(22px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (prefers-reduced-motion: reduce) {
    .btn-expand-toggle,
    .btn-expand-icon {
        transition: none;
    }
    .expand-item-animating {
        animation: none !important;
    }
}
</style>

@include('portfolio.components.experience')

<section id="projects-legacy" class="experience-section-premium animate-on-scroll">
    <div class="container-fluid px-4 px-lg-5">
        <h2 class="section-title-modern mb-5">
            <span class="title-number">02.</span>
            <span class="title-text">Historical Project Archive</span>
        </h2>

        <!-- Premium Segmented Tab Control -->
        <div class="tab-control-wrapper">
            <div class="tab-control-capsule" id="tabContainer">
                <div class="tab-active-bg" id="tabBg"></div>
                <button class="tab-control-btn active" id="btn-organisasi" onclick="switchPremiumTab('organisasi', this)">
                    <i class="fas fa-users"></i> Organisasi & Kegiatan
                </button>
                <button class="tab-control-btn" id="btn-sekolah" onclick="switchPremiumTab('sekolah', this)">
                    <i class="fas fa-code"></i> Projek Sekolah & Pribadi
                </button>
            </div>
        </div>

        <!-- TAB 1: Organisasi -->
        <div class="main-tab-content active" id="content-organisasi">
            <div class="projects-masonry" id="organisasiGrid">
                @forelse($projects as $project)
                <div class="project-card-premium">
                    <div class="project-img-wrapper">
                        <img src="{{ $project->formatted_image_url }}" alt="{{ $project->title }}" loading="lazy" decoding="async" onerror="this.src='{{ asset('images/projects/default.png') }}'">
                    </div>
                    <div class="project-content-premium">
                        <h3 class="project-title-premium">{{ $project->title }}</h3>
                        <p class="project-desc-premium">{{ $project->description }}</p>
                        
                        @if($project->technologies && count(json_decode($project->technologies, true) ?? []) > 0)
                        <div class="tech-stack-premium">
                            @foreach(json_decode($project->technologies, true) as $tech)
                            <span class="tech-badge-premium">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada data organisasi/kegiatan.</p>
                </div>
                @endforelse
            </div>

            @if(count($projects) > 2)
            <div class="expand-controls-wrapper d-none" id="organisasiExpandControls">
                <button type="button" class="btn-expand-toggle" id="organisasiExpandBtn" aria-expanded="false" aria-controls="organisasiGrid">
                    <span class="btn-expand-text">Lihat Selengkapnya</span>
                    <span class="btn-expand-badge d-none" id="organisasiExpandBadge"></span>
                    <i class="fas fa-chevron-down btn-expand-icon" aria-hidden="true"></i>
                </button>
            </div>
            @endif
        </div>

        <!-- TAB 2: Projek Sekolah -->
        <div class="main-tab-content" id="content-sekolah">
            <div class="projects-masonry" id="sekolahGrid">
                @forelse($codingProjects as $codingProject)
                <div class="project-card-premium">
                    <div class="project-img-wrapper">
                        <img src="{{ $codingProject->formatted_image_url }}" alt="{{ $codingProject->title }}" loading="lazy" decoding="async" onerror="this.src='{{ asset('images/projects/default.png') }}'">
                    </div>
                    <div class="project-content-premium">
                        <h3 class="project-title-premium">{{ $codingProject->title }}</h3>
                        <p class="project-desc-premium">{{ $codingProject->description }}</p>
                        
                        @if($codingProject->technologies && count($codingProject->getTechnologiesArray()) > 0)
                        <div class="tech-stack-premium">
                            @foreach($codingProject->getTechnologiesArray() as $tech)
                            <span class="tech-badge-premium">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @endif

                        <div class="project-actions-premium">
                            @if($codingProject->demo_url)
                            <a href="{{ $codingProject->demo_url }}" target="_blank" class="btn-action-premium">
                                <i class="fas fa-external-link-alt"></i> Demo
                            </a>
                            @endif
                            @if($codingProject->github_url)
                            <a href="{{ $codingProject->github_url }}" target="_blank" class="btn-action-premium btn-action-secondary">
                                <i class="fab fa-github"></i> Source
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada project sekolah.</p>
                </div>
                @endforelse
            </div>

            @if(count($codingProjects) > 2)
            <div class="expand-controls-wrapper d-none" id="sekolahExpandControls">
                <button type="button" class="btn-expand-toggle" id="sekolahExpandBtn" aria-expanded="false" aria-controls="sekolahGrid">
                    <span class="btn-expand-text">Lihat Selengkapnya</span>
                    <span class="btn-expand-badge d-none" id="sekolahExpandBadge"></span>
                    <i class="fas fa-chevron-down btn-expand-icon" aria-hidden="true"></i>
                </button>
            </div>
            @endif
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
    // Initialize tab background position
    window.addEventListener('DOMContentLoaded', () => {
        const activeBtn = document.querySelector('.tab-control-btn.active');
        updateTabBg(activeBtn);
    });

    function updateTabBg(btn) {
        if(!btn) return;
        const bg = document.getElementById('tabBg');
        bg.style.width = btn.offsetWidth + 'px';
        bg.style.left = btn.offsetLeft + 'px';
    }

    function switchPremiumTab(tabId, btn) {
        // Update Buttons
        document.querySelectorAll('.tab-control-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        // Update Background Slider
        updateTabBg(btn);

        // Update Content
        document.querySelectorAll('.main-tab-content').forEach(c => {
            c.classList.remove('active');
        });
        
        setTimeout(() => {
            document.getElementById('content-' + tabId).classList.add('active');
        }, 150); // slight delay for smooth transition
    }

    // Handle window resize for tab background
    window.addEventListener('resize', () => {
        const activeBtn = document.querySelector('.tab-control-btn.active');
        updateTabBg(activeBtn);
    });

    function initExperienceExpandable() {
        const tabs = [
            {
                tabId: 'content-organisasi',
                gridId: 'organisasiGrid',
                itemSelector: '.project-card-premium',
                controlsId: 'organisasiExpandControls',
                buttonId: 'organisasiExpandBtn',
                badgeId: 'organisasiExpandBadge',
                desktopLimit: 9,
                tabletLimit: 2,
                mobileLimit: 2,
                itemLabel: 'Kegiatan'
            },
            {
                tabId: 'content-sekolah',
                gridId: 'sekolahGrid',
                itemSelector: '.project-card-premium',
                controlsId: 'sekolahExpandControls',
                buttonId: 'sekolahExpandBtn',
                badgeId: 'sekolahExpandBadge',
                desktopLimit: 9,
                tabletLimit: 2,
                mobileLimit: 2,
                itemLabel: 'Projek'
            }
        ];

        tabs.forEach((config) => {
            const tabEl = document.getElementById(config.tabId);
            const grid = document.getElementById(config.gridId);
            const controls = document.getElementById(config.controlsId);
            const button = document.getElementById(config.buttonId);
            const badge = document.getElementById(config.badgeId);
            const textSpan = button ? button.querySelector('.btn-expand-text') : null;

            if (!grid || !controls || !button) return;

            const items = Array.from(grid.querySelectorAll(config.itemSelector));
            if (items.length === 0) return;

            let isExpanded = false;

            function getActiveLimit() {
                const width = window.innerWidth;
                if (width >= 1200) return config.desktopLimit;
                if (width > 768) return config.tabletLimit;
                return config.mobileLimit;
            }

            function applyVisibility(animate = false) {
                const limit = getActiveLimit();
                const total = items.length;
                const hiddenCount = Math.max(0, total - limit);

                if (total <= limit) {
                    controls.classList.add('d-none');
                    items.forEach((item) => {
                        item.classList.remove('expand-item-collapsed', 'expand-item-animating');
                        item.style.opacity = '1';
                        item.style.transform = 'none';
                    });
                    return;
                }

                controls.classList.remove('d-none');

                if (isExpanded) {
                    button.setAttribute('aria-expanded', 'true');
                    if (textSpan) textSpan.textContent = 'Tampilkan Lebih Sedikit';
                    if (badge) {
                        badge.textContent = '';
                        badge.classList.add('d-none');
                    }
                    items.forEach((item) => {
                        const wasHidden = item.classList.contains('expand-item-collapsed');
                        item.classList.remove('expand-item-collapsed');
                        if (wasHidden && animate) {
                            item.classList.add('expand-item-animating');
                            window.setTimeout(() => item.classList.remove('expand-item-animating'), 500);
                        }
                        item.style.opacity = '1';
                        item.style.transform = 'none';
                    });
                } else {
                    button.setAttribute('aria-expanded', 'false');
                    if (textSpan) textSpan.textContent = 'Lihat Selengkapnya';
                    if (badge) {
                        badge.textContent = `+${hiddenCount} ${config.itemLabel}`;
                        badge.classList.remove('d-none');
                    }
                    items.forEach((item, index) => {
                        if (index >= limit) {
                            item.classList.add('expand-item-collapsed');
                            item.classList.remove('expand-item-animating');
                        } else {
                            item.classList.remove('expand-item-collapsed', 'expand-item-animating');
                            item.style.opacity = '1';
                            item.style.transform = 'none';
                        }
                    });
                }
            }

            button.addEventListener('click', () => {
                isExpanded = !isExpanded;
                applyVisibility(true);
                if (!isExpanded) {
                    const rect = tabEl.getBoundingClientRect();
                    if (rect.top < -50) {
                        tabEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });

            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => applyVisibility(false), 150);
            }, { passive: true });

            applyVisibility(false);
        });
    }

    window.addEventListener('DOMContentLoaded', initExperienceExpandable);
</script>
@endsection
