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
            <div class="projects-masonry">
                @forelse($projects as $project)
                <div class="project-card-premium">
                    <div class="project-img-wrapper">
                        @php
                            $imagePath = $project->image_url;
                            if (strpos($imagePath, 'storage/') === 0 || strpos($imagePath, 'images/') === 0) {
                                $imageUrl = asset($imagePath);
                            } elseif (strpos($imagePath, 'projects/') === 0) {
                                $imageUrl = asset('images/' . $imagePath);
                            } else {
                                $imageUrl = asset('images/projects/' . $imagePath);
                            }
                        @endphp
                        <img src="{{ $imageUrl }}" alt="{{ $project->title }}" onerror="this.src='{{ asset('images/projects/default.png') }}'">
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
        </div>

        <!-- TAB 2: Projek Sekolah -->
        <div class="main-tab-content" id="content-sekolah">
            <div class="projects-masonry">
                @forelse($codingProjects as $codingProject)
                <div class="project-card-premium">
                    <div class="project-img-wrapper">
                        @php
                            $imagePath = $codingProject->image_url;
                            if (strpos($imagePath, 'storage/') === 0 || strpos($imagePath, 'images/') === 0) {
                                $imageUrl = asset($imagePath);
                            } elseif (strpos($imagePath, 'coding-projects/') === 0) {
                                $imageUrl = asset('images/' . $imagePath);
                            } else {
                                $imageUrl = asset('images/coding-projects/' . $imagePath);
                            }
                        @endphp
                        <img src="{{ $imageUrl }}" alt="{{ $codingProject->title }}" onerror="this.src='{{ asset('images/projects/default.png') }}'">
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
</script>
@endsection
