{{-- ==========================================================================
     PROJECT ARSENAL & 3D SPATIAL LAB COMPONENT (CYBER-TELEMETRY HUD)
     Authoritative Candidate: Raffa Nur Musyaffa (SMKN 1 Depok - PPLG)
     Design System: Cosmic Navy (#080D1A), Royal Cobalt (#2563EB), Trophy Gold (#FACC15)
     Iconography: Strict Zero-Emoji Standard (100% Lucide Vector Line Icons)
     ========================================================================== --}}

<section id="projects" class="relative py-16 md:py-24 overflow-hidden">
    <div id="arsenal" class="scroll-mt-24"></div>
    
    <!-- Ambient Atmospheric Cockpit Glow Orbs -->
    <div class="cobalt-orb w-96 h-96 -top-20 -left-20 opacity-25 z-0"></div>
    <div class="cyan-orb w-80 h-80 top-1/2 -right-20 opacity-20 z-0"></div>
    <div class="gold-orb w-72 h-72 -bottom-20 left-1/3 opacity-15 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- ==============================================================
             SECTION HEADER: PROJECT ARSENAL & 3D SPATIAL LAB TELEMETRY
             ============================================================== -->
        <div class="flex flex-col items-start space-y-3 mb-10 md:mb-12 animate-on-scroll">
            
            <div class="flex flex-wrap items-center gap-2">
                <span class="hud-badge text-xs text-cobalt-300 border-cobalt-500/40">
                    <i data-lucide="layers" class="w-3.5 h-3.5 text-cobalt-400"></i>
                    <span>[05 // PROJECT ARSENAL &amp; 3D SPATIAL LAB]</span>
                </span>
                <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                    // FULLSTACK SYSTEMS, NATIVE MOBILE &amp; PROCEDURAL 3D ASSETS
                </span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                Mission Systems &amp; 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cobalt-400 via-cyan-400 to-emerald-400">
                    Spatial Arsenal
                </span>
            </h2>

            <p class="text-sm sm:text-base text-slate-300 font-sans max-w-3xl leading-relaxed">
                Engineered for high-concurrency resilience, native mobile efficiency, and photorealistic 3D spatial fidelity. Explore fullstack web platforms, native Kotlin architectures, and ray-traced Blender simulations.
            </p>
        </div>

        <!-- ==============================================================
             INTERACTIVE CATEGORY FILTER NAVIGATION TABS (HUD CONTROLLER)
             ============================================================== -->
        <div class="mb-10 animate-on-scroll" id="3d-lab">
            <div class="inline-flex flex-wrap items-center gap-1.5 p-1.5 rounded-2xl bg-cosmic-900/90 border border-white/10 backdrop-blur-xl shadow-xl shadow-black/60">
                
                <!-- Tab 1: All Arsenal -->
                <button type="button" 
                        onclick="filterProjects('all', this)"
                        id="filter-tab-all"
                        class="project-filter-btn px-4 py-2 rounded-xl font-mono text-xs font-bold tracking-wider transition-all duration-300 flex items-center gap-2 bg-cobalt-600 text-white shadow-md shadow-cobalt-600/30 border border-cobalt-400/50">
                    <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                    <span>[ALL ARSENAL]</span>
                    <span class="px-1.5 py-0.2 rounded-full bg-cosmic-950/80 text-[10px] text-cobalt-300 border border-white/10">6</span>
                </button>

                <!-- Tab 2: Fullstack Web -->
                <button type="button" 
                        onclick="filterProjects('web', this)"
                        id="filter-tab-web"
                        class="project-filter-btn px-4 py-2 rounded-xl font-mono text-xs font-semibold tracking-wider text-slate-300 hover:text-white hover:bg-white/5 border border-transparent transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="globe" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>[FULLSTACK WEB]</span>
                    <span class="px-1.5 py-0.2 rounded-full bg-cosmic-950/80 text-[10px] text-slate-400 border border-white/10">3</span>
                </button>

                <!-- Tab 3: Mobile Android -->
                <button type="button" 
                        onclick="filterProjects('mobile', this)"
                        id="filter-tab-mobile"
                        class="project-filter-btn px-4 py-2 rounded-xl font-mono text-xs font-semibold tracking-wider text-slate-300 hover:text-white hover:bg-white/5 border border-transparent transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="smartphone" class="w-3.5 h-3.5 text-emerald-400"></i>
                    <span>[MOBILE ANDROID]</span>
                    <span class="px-1.5 py-0.2 rounded-full bg-cosmic-950/80 text-[10px] text-slate-400 border border-white/10">1</span>
                </button>

                <!-- Tab 4: 3D Spatial Lab -->
                <button type="button" 
                        onclick="filterProjects('3d', this)"
                        id="filter-tab-3d"
                        class="project-filter-btn px-4 py-2 rounded-xl font-mono text-xs font-semibold tracking-wider text-slate-300 hover:text-white hover:bg-white/5 border border-transparent transition-all duration-300 flex items-center gap-2">
                    <i data-lucide="box" class="w-3.5 h-3.5 text-gold-400"></i>
                    <span>[3D SPATIAL LAB]</span>
                    <span class="px-1.5 py-0.2 rounded-full bg-cosmic-950/80 text-[10px] text-gold-400 border border-gold-400/30">2</span>
                </button>

            </div>
        </div>

        <!-- ==============================================================
             PROJECT ARSENAL GRID (6 COMPREHENSIVE CARDS)
             ============================================================== -->
        <div id="projects-catalog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            
            <!-- ==========================================================
                 PROJECT 1: CANTEEN SMKN 1 DEPOK (ANDROID MOBILE APP)
                 ========================================================== -->
            <div class="project-item-card transition-all duration-500 animate-on-scroll" data-category="mobile">
                <div class="hud-card h-full group flex flex-col justify-between">
                    <div class="hud-card-body p-5 sm:p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Media Frame with Scanline & Reticles -->
                            <div class="relative aspect-video w-full rounded-lg overflow-hidden border border-emerald-500/30 mb-4 bg-cosmic-950 group/img">
                                <img src="{{ asset('images/coding-projects/canteensmkn1depok.png') }}" 
                                     alt="Canteen SMKN 1 Depok Native Android App" 
                                     class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-500"
                                     onerror="this.src='{{ asset('images/coding-projects/porto1.png') }}';">
                                
                                <div class="absolute inset-0 telemetry-scanline opacity-25 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80"></div>
                                
                                <!-- Top Tags Overlay -->
                                <div class="absolute top-2 left-2 right-2 flex items-center justify-between font-mono text-[10px]">
                                    <span class="px-2 py-0.5 rounded bg-emerald-500/20 border border-emerald-400/50 text-emerald-300 font-bold flex items-center gap-1 backdrop-blur-md">
                                        <i data-lucide="smartphone" class="w-3 h-3"></i>
                                        <span>KOTLIN NATIVE</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 text-slate-300">
                                        2025
                                    </span>
                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between font-mono text-[9px] text-slate-300">
                                    <span class="text-emerald-400 flex items-center gap-1">
                                        <i data-lucide="check-circle-2" class="w-3 h-3 text-emerald-400"></i>
                                        <span>POS &amp; LEDGER SYNC</span>
                                    </span>
                                    <span class="text-slate-400">ROOM SQLITE</span>
                                </div>
                            </div>

                            <!-- Title & Subtitle -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight mb-1 group-hover:text-emerald-300 transition-colors">
                                Canteen SMKN 1 Depok
                            </h3>
                            
                            <div class="font-mono text-xs text-emerald-400 font-semibold mb-3 flex items-center gap-1.5">
                                <i data-lucide="smartphone" class="w-3.5 h-3.5 text-emerald-400"></i>
                                <span>Native Android Food Ordering &amp; Vendor POS</span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-slate-300 font-sans leading-relaxed mb-4">
                                Native Android point-of-sale and student food ordering application designed for SMKN 1 Depok's culinary canteen vendors. Features live menu browsing, cart state synchronization, digital receipt generation, and real-time transaction ledgers.
                            </p>

                            <!-- Architectural Highlights -->
                            <div class="space-y-1.5 mb-5 font-mono text-xs">
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Native Kotlin architecture with ViewModel &amp; LiveData state.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="database" class="w-3.5 h-3.5 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Room SQLite local database for offline menu caching &amp; queries.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="layout" class="w-3.5 h-3.5 text-cobalt-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Material Design 3 tactile UI optimized for mobile touchscreens.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack Badges & Action Footer -->
                        <div class="pt-4 border-t border-white/10 flex flex-col gap-3">
                            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Kotlin</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Java</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Android Studio</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Room SQLite</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">MD3</span>
                            </div>

                            <button type="button" 
                                    onclick="showProjectDetailModal('canteen')"
                                    class="w-full hud-chamfer-sm py-2 px-3 text-xs font-mono font-bold tracking-wider text-emerald-300 bg-emerald-500/10 hover:bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center gap-2 transition-all">
                                <i data-lucide="info" class="w-3.5 h-3.5 text-emerald-400"></i>
                                <span>Inspect Mobile Architecture</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ==========================================================
                 PROJECT 2: PT KOMARI ONLINE LEARNING PLATFORM (WEB)
                 ========================================================== -->
            <div class="project-item-card transition-all duration-500 animate-on-scroll" data-category="web">
                <div class="hud-card h-full group flex flex-col justify-between">
                    <div class="hud-card-body p-5 sm:p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Media Frame -->
                            <div class="relative aspect-video w-full rounded-lg overflow-hidden border border-cyan-500/30 mb-4 bg-cosmic-950 group/img">
                                <img src="{{ asset('images/coding-projects/Ptkomari.png') }}" 
                                     alt="PT Komari Online Learning Platform" 
                                     class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-500"
                                     onerror="this.src='{{ asset('images/coding-projects/porto1.png') }}';">
                                
                                <div class="absolute inset-0 telemetry-scanline opacity-25 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80"></div>
                                
                                <!-- Top Tags Overlay -->
                                <div class="absolute top-2 left-2 right-2 flex items-center justify-between font-mono text-[10px]">
                                    <span class="px-2 py-0.5 rounded bg-cyan-500/20 border border-cyan-400/50 text-cyan-300 font-bold flex items-center gap-1 backdrop-blur-md">
                                        <i data-lucide="globe" class="w-3 h-3"></i>
                                        <span>FULLSTACK WEB</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 text-slate-300">
                                        2025 - 2026
                                    </span>
                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between font-mono text-[9px] text-slate-300">
                                    <span class="text-cyan-400 flex items-center gap-1">
                                        <i data-lucide="shield-check" class="w-3 h-3 text-cyan-400"></i>
                                        <span>RBAC MULTI-TENANT</span>
                                    </span>
                                    <span class="text-slate-400">LARAVEL 11 / PHP 8.3</span>
                                </div>
                            </div>

                            <!-- Title & Subtitle -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight mb-1 group-hover:text-cyan-300 transition-colors">
                                PT Komari Learning Platform
                            </h3>
                            
                            <div class="font-mono text-xs text-cyan-400 font-semibold mb-3 flex items-center gap-1.5">
                                <i data-lucide="globe" class="w-3.5 h-3.5 text-cyan-400"></i>
                                <span>Enterprise Course &amp; Student Portal</span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-slate-300 font-sans leading-relaxed mb-4">
                                Fullstack course catalog, student enrollment, and digital learning portal for PT Komari. Includes student dashboard, syllabus progression tracker, admin course management, and simulated payment workflows.
                            </p>

                            <!-- Architectural Highlights -->
                            <div class="space-y-1.5 mb-5 font-mono text-xs">
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="database" class="w-3.5 h-3.5 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Normalized schema with course-to-module cascade integrity.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="lock" class="w-3.5 h-3.5 text-cobalt-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Multi-tier RBAC separating students, mentors, and administrators.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="cpu" class="w-3.5 h-3.5 text-emerald-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Modular Blade components with dynamic progression telemetry.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack Badges & Action Footer -->
                        <div class="pt-4 border-t border-white/10 flex flex-col gap-3">
                            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Laravel 11</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">PHP 8.3</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">MySQL</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">REST API</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Bootstrap 5</span>
                            </div>

                            <button type="button" 
                                    onclick="showProjectDetailModal('komari')"
                                    class="w-full hud-chamfer-sm py-2 px-3 text-xs font-mono font-bold tracking-wider text-cyan-300 bg-cyan-500/10 hover:bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center gap-2 transition-all">
                                <i data-lucide="info" class="w-3.5 h-3.5 text-cyan-400"></i>
                                <span>Inspect Web Architecture</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ==========================================================
                 PROJECT 3: WANDEK AIRLINES TICKET BOOKING (WEB)
                 ========================================================== -->
            <div class="project-item-card transition-all duration-500 animate-on-scroll" data-category="web">
                <div class="hud-card h-full group flex flex-col justify-between">
                    <div class="hud-card-body p-5 sm:p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Media Frame -->
                            <div class="relative aspect-video w-full rounded-lg overflow-hidden border border-cobalt-500/30 mb-4 bg-cosmic-950 group/img">
                                <img src="{{ asset('images/coding-projects/wandekairlines.png') }}" 
                                     alt="Wandek Airlines Ticket Booking Platform" 
                                     class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-500"
                                     onerror="this.src='{{ asset('images/coding-projects/porto1.png') }}';">
                                
                                <div class="absolute inset-0 telemetry-scanline opacity-25 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80"></div>
                                
                                <!-- Top Tags Overlay -->
                                <div class="absolute top-2 left-2 right-2 flex items-center justify-between font-mono text-[10px]">
                                    <span class="px-2 py-0.5 rounded bg-cobalt-500/20 border border-cobalt-400/50 text-cobalt-300 font-bold flex items-center gap-1 backdrop-blur-md">
                                        <i data-lucide="plane" class="w-3 h-3"></i>
                                        <span>CONCURRENCY MATRIX</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 text-slate-300">
                                        2025 - 2026
                                    </span>
                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between font-mono text-[9px] text-slate-300">
                                    <span class="text-cobalt-300 flex items-center gap-1">
                                        <i data-lucide="lock" class="w-3 h-3 text-cobalt-400"></i>
                                        <span>SEAT LOCKING ENGINE</span>
                                    </span>
                                    <span class="text-slate-400">ACID TRANSACTIONS</span>
                                </div>
                            </div>

                            <!-- Title & Subtitle -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight mb-1 group-hover:text-cobalt-300 transition-colors">
                                Wandek Airlines Booking
                            </h3>
                            
                            <div class="font-mono text-xs text-cobalt-400 font-semibold mb-3 flex items-center gap-1.5">
                                <i data-lucide="plane" class="w-3.5 h-3.5 text-cobalt-400"></i>
                                <span>High-Concurrency Flight Reservation Engine</span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-slate-300 font-sans leading-relaxed mb-4">
                                End-to-end airline ticketing and flight reservation system. Supports multi-city flight schedule queries, dynamic seat selection matrices, passenger manifest data validation, and e-ticket generation.
                            </p>

                            <!-- Architectural Highlights -->
                            <div class="space-y-1.5 mb-5 font-mono text-xs">
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="lock" class="w-3.5 h-3.5 text-rose-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Concurrency-safe seat allocation preventing double-booking race conditions.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="database" class="w-3.5 h-3.5 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Complex SQL joins indexing flight routes, cabin tiers, and manifests.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Dynamic interactive seat map with real-time occupancy updates.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack Badges & Action Footer -->
                        <div class="pt-4 border-t border-white/10 flex flex-col gap-3">
                            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Laravel 11</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">PHP 8.3</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">MySQL</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Row Locks</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">JavaScript</span>
                            </div>

                            <button type="button" 
                                    onclick="showProjectDetailModal('wandek')"
                                    class="w-full hud-chamfer-sm py-2 px-3 text-xs font-mono font-bold tracking-wider text-cobalt-300 bg-cobalt-500/10 hover:bg-cobalt-500/20 border border-cobalt-400/40 flex items-center justify-center gap-2 transition-all">
                                <i data-lucide="info" class="w-3.5 h-3.5 text-cobalt-400"></i>
                                <span>Inspect Concurrency Logic</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ==========================================================
                 PROJECT 4: SARPRAS SMKN 1 DEPOK (WEB ASSET LENDING)
                 ========================================================== -->
            <div class="project-item-card transition-all duration-500 animate-on-scroll" data-category="web">
                <div class="hud-card h-full group flex flex-col justify-between">
                    <div class="hud-card-body p-5 sm:p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Media Frame -->
                            <div class="relative aspect-video w-full rounded-lg overflow-hidden border border-cobalt-500/30 mb-4 bg-cosmic-950 group/img">
                                <img src="{{ asset('images/coding-projects/sarpras.png') }}" 
                                     alt="Sarpras SMKN 1 Depok Asset Management Platform" 
                                     class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-500"
                                     onerror="this.src='{{ asset('images/coding-projects/porto1.png') }}';">
                                
                                <div class="absolute inset-0 telemetry-scanline opacity-25 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80"></div>
                                
                                <!-- Top Tags Overlay -->
                                <div class="absolute top-2 left-2 right-2 flex items-center justify-between font-mono text-[10px]">
                                    <span class="px-2 py-0.5 rounded bg-cobalt-500/20 border border-cobalt-400/50 text-cobalt-300 font-bold flex items-center gap-1 backdrop-blur-md">
                                        <i data-lucide="boxes" class="w-3 h-3"></i>
                                        <span>ASSET GOVERNANCE</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 text-slate-300">
                                        2025 - 2026
                                    </span>
                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between font-mono text-[9px] text-slate-300">
                                    <span class="text-emerald-400 flex items-center gap-1">
                                        <i data-lucide="shield-check" class="w-3 h-3 text-emerald-400"></i>
                                        <span>MULTI-TIER APPROVAL</span>
                                    </span>
                                    <span class="text-slate-400">AUDIT TRAIL</span>
                                </div>
                            </div>

                            <!-- Title & Subtitle -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight mb-1 group-hover:text-cobalt-300 transition-colors">
                                Sarpras SMKN 1 Depok
                            </h3>
                            
                            <div class="font-mono text-xs text-cobalt-400 font-semibold mb-3 flex items-center gap-1.5">
                                <i data-lucide="boxes" class="w-3.5 h-3.5 text-cobalt-400"></i>
                                <span>School Logistics &amp; Hardware Lending System</span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-slate-300 font-sans leading-relaxed mb-4">
                                Web application for tracking and lending school facilities, audiovisual equipment, and IT hardware for SMKN 1 Depok. Features automated loan approval routing, asset tagging, and overdue return tracking.
                            </p>

                            <!-- Architectural Highlights -->
                            <div class="space-y-1.5 mb-5 font-mono text-xs">
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Multi-tier approval workflow (Student -> Teacher/Admin -> Custodian).</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="database" class="w-3.5 h-3.5 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Transactional loan status audit history and inventory depreciation.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="activity" class="w-3.5 h-3.5 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Automated notification telemetry for overdue equipment returns.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack Badges & Action Footer -->
                        <div class="pt-4 border-t border-white/10 flex flex-col gap-3">
                            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Laravel 11</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">PHP 8.3</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">MySQL</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">RBAC</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Bootstrap 5</span>
                            </div>

                            <button type="button" 
                                    onclick="showProjectDetailModal('sarpras')"
                                    class="w-full hud-chamfer-sm py-2 px-3 text-xs font-mono font-bold tracking-wider text-cobalt-300 bg-cobalt-500/10 hover:bg-cobalt-500/20 border border-cobalt-400/40 flex items-center justify-center gap-2 transition-all">
                                <i data-lucide="info" class="w-3.5 h-3.5 text-cobalt-400"></i>
                                <span>Inspect Logistics Schema</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ==========================================================
                 PROJECT 5: 3D SPATIAL LAB: SMKN 1 DEPOK CLASSROOM (BLENDER)
                 ========================================================== -->
            <div class="project-item-card transition-all duration-500 animate-on-scroll" data-category="3d">
                <div class="hud-card-gold h-full group flex flex-col justify-between">
                    <div class="hud-card-body p-5 sm:p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Media Frame with 3D Spatial Reticle -->
                            <div class="relative aspect-video w-full rounded-lg overflow-hidden border border-gold-400/40 mb-4 bg-cosmic-950 group/img cursor-pointer" onclick="open3DViewerModal('classroom')">
                                <img src="{{ asset('images/coding-projects/kelas.png') }}" 
                                     alt="3D Classroom Reconstruction in Blender Cycles" 
                                     class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-700"
                                     onerror="this.src='{{ asset('images/coding-projects/porto1.png') }}';">
                                
                                <div class="absolute inset-0 telemetry-scanline opacity-20 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80"></div>
                                
                                <!-- Top Tags Overlay -->
                                <div class="absolute top-2 left-2 right-2 flex items-center justify-between font-mono text-[10px]">
                                    <span class="px-2 py-0.5 rounded bg-gold-500/20 border border-gold-400/60 text-gold-300 font-bold flex items-center gap-1 backdrop-blur-md shadow-sm shadow-gold-500/20">
                                        <i data-lucide="box" class="w-3 h-3 text-gold-400"></i>
                                        <span>3D SPATIAL LAB</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 text-slate-300">
                                        2024 - 2025
                                    </span>
                                </div>

                                <!-- Center 3D Interactive Beacon -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover/img:opacity-100 transition-opacity bg-cosmic-950/60 backdrop-blur-xs">
                                    <span class="hud-chamfer-sm px-3.5 py-1.5 bg-gold-400 text-cosmic-950 font-mono text-xs font-bold flex items-center gap-2 shadow-lg shadow-gold-500/40 scale-95 group-hover/img:scale-100 transition-transform">
                                        <i data-lucide="maximize-2" class="w-3.5 h-3.5 text-cosmic-950"></i>
                                        <span>LAUNCH 3D SPATIAL VIEWER</span>
                                    </span>
                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between font-mono text-[9px] text-slate-300">
                                    <span class="text-gold-300 flex items-center gap-1">
                                        <i data-lucide="cpu" class="w-3 h-3 text-gold-400"></i>
                                        <span>CYCLES RAYTRACING</span>
                                    </span>
                                    <span class="text-slate-400">PBR TEXTURING</span>
                                </div>
                            </div>

                            <!-- Title & Subtitle -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight mb-1 group-hover:text-gold-200 transition-colors">
                                Classroom Reconstruction
                            </h3>
                            
                            <div class="font-mono text-xs text-gold-400 font-semibold mb-3 flex items-center gap-1.5">
                                <i data-lucide="box" class="w-3.5 h-3.5 text-gold-400"></i>
                                <span>3D Photorealistic Spatial Simulation</span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-slate-300 font-sans leading-relaxed mb-4">
                                High-detail 3D spatial simulation of a vocational classroom. Modeled with accurate physical dimensions, PBR material nodes, photorealistic Cycles lighting passes, and realistic classroom furnishings.
                            </p>

                            <!-- Architectural Highlights -->
                            <div class="space-y-1.5 mb-5 font-mono text-xs">
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="box" class="w-3.5 h-3.5 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Polygonal modeling with modular asset instancing for memory optimization.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="sparkles" class="w-3.5 h-3.5 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Custom UV unwrapping &amp; procedural PBR chalkboard/wood shaders.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="sun" class="w-3.5 h-3.5 text-gold-300 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Physically-based Cycles global illumination simulating natural sun bounce.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack Badges & Action Footer -->
                        <div class="pt-4 border-t border-gold-400/20 flex flex-col gap-3">
                            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-gold-400/30 text-gold-300">Blender 3D</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Cycles Engine</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">PBR Materials</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Lighting</span>
                            </div>

                            <button type="button" 
                                    onclick="open3DViewerModal('classroom')"
                                    class="w-full hud-chamfer-sm py-2 px-3 text-xs font-mono font-bold tracking-wider text-gold-300 bg-gold-400/10 hover:bg-gold-400/20 border border-gold-400/40 flex items-center justify-center gap-2 transition-all shadow-sm">
                                <i data-lucide="maximize-2" class="w-3.5 h-3.5 text-gold-400"></i>
                                <span>Launch 3D Spatial Viewer</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- ==========================================================
                 PROJECT 6: 3D SPATIAL LAB: HARD-SURFACE SWORD MODELING (BLENDER)
                 ========================================================== -->
            <div class="project-item-card transition-all duration-500 animate-on-scroll" data-category="3d">
                <div class="hud-card-gold h-full group flex flex-col justify-between">
                    <div class="hud-card-body p-5 sm:p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Media Frame -->
                            <div class="relative aspect-video w-full rounded-lg overflow-hidden border border-gold-400/40 mb-4 bg-cosmic-950 group/img cursor-pointer" onclick="open3DViewerModal('sword')">
                                <img src="{{ asset('images/coding-projects/pedang.png') }}" 
                                     alt="Hard-Surface Sword 3D Modeling and Procedural Texturing" 
                                     class="w-full h-full object-cover object-center group-hover/img:scale-105 transition-transform duration-700"
                                     onerror="this.src='{{ asset('images/coding-projects/porto1.png') }}';">
                                
                                <div class="absolute inset-0 telemetry-scanline opacity-20 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80"></div>
                                
                                <!-- Top Tags Overlay -->
                                <div class="absolute top-2 left-2 right-2 flex items-center justify-between font-mono text-[10px]">
                                    <span class="px-2 py-0.5 rounded bg-gold-500/20 border border-gold-400/60 text-gold-300 font-bold flex items-center gap-1 backdrop-blur-md shadow-sm shadow-gold-500/20">
                                        <i data-lucide="sword" class="w-3 h-3 text-gold-400"></i>
                                        <span>3D SPATIAL LAB</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 text-slate-300">
                                        2024 - 2025
                                    </span>
                                </div>

                                <!-- Center 3D Interactive Beacon -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover/img:opacity-100 transition-opacity bg-cosmic-950/60 backdrop-blur-xs">
                                    <span class="hud-chamfer-sm px-3.5 py-1.5 bg-gold-400 text-cosmic-950 font-mono text-xs font-bold flex items-center gap-2 shadow-lg shadow-gold-500/40 scale-95 group-hover/img:scale-100 transition-transform">
                                        <i data-lucide="maximize-2" class="w-3.5 h-3.5 text-cosmic-950"></i>
                                        <span>LAUNCH 3D SPATIAL VIEWER</span>
                                    </span>
                                </div>

                                <!-- Bottom Status Bar -->
                                <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between font-mono text-[9px] text-slate-300">
                                    <span class="text-gold-300 flex items-center gap-1">
                                        <i data-lucide="sword" class="w-3 h-3 text-gold-400"></i>
                                        <span>HARD-SURFACE TOPOLOGY</span>
                                    </span>
                                    <span class="text-slate-400">PROCEDURAL WEAR</span>
                                </div>
                            </div>

                            <!-- Title & Subtitle -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight mb-1 group-hover:text-gold-200 transition-colors">
                                Hard-Surface Sword Model
                            </h3>
                            
                            <div class="font-mono text-xs text-gold-400 font-semibold mb-3 flex items-center gap-1.5">
                                <i data-lucide="sword" class="w-3.5 h-3.5 text-gold-400"></i>
                                <span>Procedural Metallic Shaders &amp; High-Poly Detailing</span>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-slate-300 font-sans leading-relaxed mb-4">
                                Complex hard-surface 3D weapon model featuring intricate geometric bevels, realistic metallic roughness/metallic maps, and emissive blade runes designed for real-time graphics engines.
                            </p>

                            <!-- Architectural Highlights -->
                            <div class="space-y-1.5 mb-5 font-mono text-xs">
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="box" class="w-3.5 h-3.5 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Clean subdivision edge-flow with non-destructive modifier stacks.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="sparkles" class="w-3.5 h-3.5 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Procedural scratch &amp; curvature masking for realistic metallic wear.</span>
                                </div>
                                <div class="flex items-start gap-2 text-slate-300">
                                    <i data-lucide="zap" class="w-3.5 h-3.5 text-emerald-400 shrink-0 mt-0.5"></i>
                                    <span class="text-[11px] leading-tight">Emissive rune core optimized for bloom in post-processing passes.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tech Stack Badges & Action Footer -->
                        <div class="pt-4 border-t border-gold-400/20 flex flex-col gap-3">
                            <div class="flex flex-wrap gap-1.5 font-mono text-[10px]">
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-gold-400/30 text-gold-300">Blender 3D</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Hard-Surface</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Procedural Nodes</span>
                                <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 text-slate-300">Cycles</span>
                            </div>

                            <button type="button" 
                                    onclick="open3DViewerModal('sword')"
                                    class="w-full hud-chamfer-sm py-2 px-3 text-xs font-mono font-bold tracking-wider text-gold-300 bg-gold-400/10 hover:bg-gold-400/20 border border-gold-400/40 flex items-center justify-center gap-2 transition-all shadow-sm">
                                <i data-lucide="maximize-2" class="w-3.5 h-3.5 text-gold-400"></i>
                                <span>Launch 3D Spatial Viewer</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ==========================================================================
     INTERACTIVE 3D SPATIAL VIEWER & PROJECT DETAIL MODAL ENGINE
     ========================================================================== --}}
<script>
    // Project Category Filter Handler
    function filterProjects(category, buttonElement) {
        // Update Filter Buttons Styling
        const filterButtons = document.querySelectorAll('.project-filter-btn');
        filterButtons.forEach(btn => {
            btn.classList.remove('bg-cobalt-600', 'text-white', 'shadow-md', 'shadow-cobalt-600/30', 'border-cobalt-400/50');
            btn.classList.add('text-slate-300', 'border-transparent');
        });

        buttonElement.classList.add('bg-cobalt-600', 'text-white', 'shadow-md', 'shadow-cobalt-600/30', 'border-cobalt-400/50');
        buttonElement.classList.remove('text-slate-300', 'border-transparent');

        // Filter Project Cards
        const projectCards = document.querySelectorAll('.project-item-card');
        projectCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category');
            if (category === 'all' || cardCategory === category) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                }, 50);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(16px) scale(0.96)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    }

    // 3D Model Spatial Viewer Modal (Interactive Blender HUD Experience)
    function open3DViewerModal(modelKey) {
        if (typeof Swal === 'undefined') return;

        const isClassroom = modelKey === 'classroom';
        const modelTitle = isClassroom ? 'SMKN 1 DEPOK CLASSROOM RECONSTRUCTION' : 'HARD-SURFACE CYBER SWORD MODEL';
        const modelImage = isClassroom ? '{{ asset("images/coding-projects/kelas.png") }}' : '{{ asset("images/coding-projects/pedang.png") }}';
        const polyCount = isClassroom ? '48,520 Faces // 52,140 Verts' : '32,180 Faces // 34,900 Verts';
        const engineInfo = isClassroom ? 'Blender 4.x Cycles // 512 Samples' : 'Blender 4.x Cycles // Procedural Metallic Wear';
        const lightingMode = isClassroom ? 'Global Daylight Ray-Tracing &amp; Sun Bounce' : 'Studio HDRI 3-Point Emissive Bloom Lighting';

        Swal.fire({
            title: `<div class="flex items-center justify-between gap-2 border-b border-gold-400/30 pb-2 px-1 font-mono text-sm sm:text-base text-gold-400 font-bold">
                        <span class="flex items-center gap-2">
                            <i data-lucide="box" class="w-4 h-4 text-gold-400"></i>
                            <span>${modelTitle}</span>
                        </span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-gold-400/10 text-gold-300 border border-gold-400/30">3D SPATIAL LAB</span>
                    </div>`,
            html: `
                <div class="text-left font-mono text-xs space-y-4 pt-2">
                    
                    <!-- 3D Spatial Viewport Container -->
                    <div class="relative rounded-lg overflow-hidden border border-gold-400/40 bg-cosmic-950 shadow-2xl group/viewport">
                        <img id="viewer-3d-asset" 
                             src="${modelImage}" 
                             alt="${modelTitle}" 
                             class="w-full max-h-[380px] object-contain mx-auto transition-all duration-300" />
                        
                        <!-- Telemetry Grid & Reticle Overlay -->
                        <div class="absolute inset-0 telemetry-scanline opacity-20 pointer-events-none"></div>
                        <div class="absolute top-2 left-2 font-mono text-[9px] text-cyan-400 bg-cosmic-950/80 px-2 py-0.5 rounded border border-white/10">
                            VIEWPORT: CYCLES 4K PBR
                        </div>
                        <div class="absolute top-2 right-2 font-mono text-[9px] text-gold-400 bg-cosmic-950/80 px-2 py-0.5 rounded border border-white/10">
                            PASS: BEAUTY (RGBA)
                        </div>
                        <div class="absolute bottom-2 left-2 font-mono text-[9px] text-emerald-400 bg-cosmic-950/80 px-2 py-0.5 rounded border border-white/10 flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                            <span>SHADING: NOMINAL</span>
                        </div>
                    </div>

                    <!-- Viewport Shading / Pass Filter Pills -->
                    <div class="flex flex-wrap items-center justify-between gap-2 p-2 rounded bg-cosmic-950/90 border border-white/10 font-mono text-[10px]">
                        <span class="text-slate-400">VIEW MODE:</span>
                        <div class="flex flex-wrap gap-1">
                            <button type="button" onclick="setViewerPass('beauty')" class="px-2 py-1 rounded bg-cobalt-600 text-white font-bold border border-cobalt-400/50">[FULL BEAUTY]</button>
                            <button type="button" onclick="setViewerPass('metallic')" class="px-2 py-1 rounded bg-cosmic-900 text-slate-300 hover:text-white border border-white/10">[METALLIC / ROUGHNESS]</button>
                            <button type="button" onclick="setViewerPass('ao')" class="px-2 py-1 rounded bg-cosmic-900 text-slate-300 hover:text-white border border-white/10">[AO / NORMALS]</button>
                        </div>
                    </div>

                    <!-- Spatial Telemetry Metadata Matrix -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <div class="p-2.5 rounded bg-cosmic-950 border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase">Geometric Density:</div>
                            <div class="text-white font-bold text-xs mt-0.5">${polyCount}</div>
                        </div>
                        <div class="p-2.5 rounded bg-cosmic-950 border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase">Lighting Setup:</div>
                            <div class="text-gold-300 font-bold text-xs mt-0.5">${lightingMode}</div>
                        </div>
                        <div class="p-2.5 rounded bg-cosmic-950 border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase">Engine Architecture:</div>
                            <div class="text-cyan-300 font-bold text-xs mt-0.5">${engineInfo}</div>
                        </div>
                        <div class="p-2.5 rounded bg-cosmic-950 border border-white/10">
                            <div class="text-slate-400 text-[10px] uppercase">Texture Channels:</div>
                            <div class="text-emerald-400 font-bold text-xs mt-0.5">Albedo, Roughness, Normal, Metallic, AO</div>
                        </div>
                    </div>

                </div>
            `,
            background: '#0B132B',
            color: '#F8FAFC',
            showConfirmButton: true,
            confirmButtonText: 'CLOSE SPATIAL VIEWPORT',
            confirmButtonColor: '#2563EB',
            width: '720px',
            customClass: {
                popup: 'hud-card-body border border-gold-400/50 shadow-2xl shadow-gold-500/20'
            },
            didOpen: () => {
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }
        });
    }

    // Viewport Pass Simulation
    function setViewerPass(passType) {
        const img = document.getElementById('viewer-3d-asset');
        if (!img) return;
        if (passType === 'beauty') {
            img.style.filter = 'none';
        } else if (passType === 'metallic') {
            img.style.filter = 'contrast(1.6) grayscale(0.85) brightness(1.2)';
        } else if (passType === 'ao') {
            img.style.filter = 'grayscale(1) contrast(2.2) brightness(0.9)';
        }
    }

    // Comprehensive Project Architecture Deep-Dive Modal
    function showProjectDetailModal(projectKey) {
        if (typeof Swal === 'undefined') return;

        let title = '';
        let badge = '';
        let stack = '';
        let architecture = '';
        let security = '';

        if (projectKey === 'canteen') {
            title = 'CANTEEN SMKN 1 DEPOK // ARCHITECTURAL DOSSIER';
            badge = 'KOTLIN ANDROID NATIVE // ROOM SQLITE';
            stack = 'Kotlin, Java, Android Studio, Room SQLite, Material Design 3, LiveData, ViewModel';
            architecture = `
                <ul class="list-disc list-inside space-y-1.5 text-slate-300">
                    <li><strong class="text-white">MVVM Architecture:</strong> Strict separation of View, ViewModel, and Repository layers with observable LiveData streams.</li>
                    <li><strong class="text-white">Room SQLite Database:</strong> Offline menu caching, rapid index queries, and transactional receipt records stored locally.</li>
                    <li><strong class="text-white">Cart State Synchronization:</strong> Real-time recalculation of order totals, dynamic tax/discount evaluation, and instant receipt layout printing.</li>
                </ul>
            `;
            security = 'Local SQLite encryption support, zero-dependency sandboxed storage, and memory-safe Kotlin Coroutines.';
        } else if (projectKey === 'komari') {
            title = 'PT KOMARI LEARNING PLATFORM // ARCHITECTURAL DOSSIER';
            badge = 'LARAVEL 11 // RBAC // MYSQL';
            stack = 'Laravel 11, PHP 8.3, MySQL, Bootstrap 5, RESTful APIs, Blade Engine';
            architecture = `
                <ul class="list-disc list-inside space-y-1.5 text-slate-300">
                    <li><strong class="text-white">Relational Course Hierarchy:</strong> 3-tier database normalization (Courses -> Modules -> Lessons/Quizzes) with cascade integrity.</li>
                    <li><strong class="text-white">Role-Based Access Control:</strong> Custom middleware handling Student, Instructor, and Super-Admin capability trees.</li>
                    <li><strong class="text-white">Student Progression Telemetry:</strong> Automated progression tracking per course with dynamic completion percentage calculation.</li>
                </ul>
            `;
            security = 'CSRF token protection, prepared parameterized SQL queries, password hashing via Argon2id / Bcrypt, and granular authorization policies.';
        } else if (projectKey === 'wandek') {
            title = 'WANDEK AIRLINES // CONCURRENCY DOSSIER';
            badge = 'LARAVEL 11 // PESSIMISTIC SEAT LOCKS // ACID';
            stack = 'Laravel 11, PHP 8.3, MySQL, Bootstrap 5, JavaScript, ACID Transactions';
            architecture = `
                <ul class="list-disc list-inside space-y-1.5 text-slate-300">
                    <li><strong class="text-white">Seat Matrix Concurrency:</strong> Prevents dual-passenger seat collision using atomic transactions and row-level checks during checkout.</li>
                    <li><strong class="text-white">Multi-City Route Routing:</strong> Indexed flight schedule search handling departure/arrival airports, multi-tier seat classes, and baggage options.</li>
                    <li><strong class="text-white">Manifest Generation:</strong> Automated e-ticket generation with booking reference codes and passenger validation.</li>
                </ul>
            `;
            security = 'ACID transaction wrappers around all booking commits, eliminating orphan reservation rows on payment failure.';
        } else if (projectKey === 'sarpras') {
            title = 'SARPRAS SMKN 1 DEPOK // LOGISTICS DOSSIER';
            badge = 'LARAVEL 11 // MULTI-TIER APPROVAL // AUDIT LOGS';
            stack = 'Laravel 11, PHP 8.3, MySQL, Bootstrap 5, JavaScript, Role Middleware';
            architecture = `
                <ul class="list-disc list-inside space-y-1.5 text-slate-300">
                    <li><strong class="text-white">Multi-Tier Approval Pipeline:</strong> Loan requests propagate through Student Request -> Teacher Endorsement -> Sarpras Custodian Ratification.</li>
                    <li><strong class="text-white">Audit Trail Logging:</strong> Immutable log records for item condition checkout, timestamped return checks, and damages assessment.</li>
                    <li><strong class="text-white">Inventory Status Telemetry:</strong> Real-time categorization of available, loaned, and maintenance-quarantined hardware units.</li>
                </ul>
            `;
            security = 'Strict RBAC approval guards preventing unauthorized status overrides, with input sanitization on inventory tags.';
        }

        Swal.fire({
            title: `<div class="flex items-center justify-between gap-2 border-b border-cobalt-500/40 pb-2 px-1 font-mono text-sm sm:text-base text-cobalt-300 font-bold">
                        <span>${title}</span>
                    </div>`,
            html: `
                <div class="text-left font-mono text-xs space-y-3 pt-2">
                    <div class="p-2.5 bg-cosmic-950 rounded border border-cobalt-400/30">
                        <div class="text-cobalt-400 font-bold mb-1">SYSTEM SPECIFICATION:</div>
                        <div class="text-white">${badge}</div>
                    </div>
                    <div class="p-2.5 bg-cosmic-950 rounded border border-white/10">
                        <div class="text-cyan-400 font-bold mb-1">TECHNOLOGY MATRIX:</div>
                        <div class="text-slate-300">${stack}</div>
                    </div>
                    <div class="p-3 bg-cosmic-950 rounded border border-white/10">
                        <div class="text-gold-300 font-bold mb-2">CORE ARCHITECTURAL HIGHLIGHTS:</div>
                        ${architecture}
                    </div>
                    <div class="p-2.5 bg-cosmic-950 rounded border border-emerald-500/30">
                        <div class="text-emerald-400 font-bold mb-1">SECURITY &amp; INTEGRITY GUARANTEE:</div>
                        <div class="text-slate-300">${security}</div>
                    </div>
                </div>
            `,
            background: '#0B132B',
            color: '#F8FAFC',
            showConfirmButton: true,
            confirmButtonText: 'ACKNOWLEDGE SPECIFICATION',
            confirmButtonColor: '#2563EB',
            width: '680px',
            customClass: {
                popup: 'hud-card-body border border-cobalt-500/50 shadow-2xl shadow-cobalt-500/20'
            },
            didOpen: () => {
                if (typeof lucide !== 'undefined') lucide.createIcons();
            }
        });
    }
</script>
