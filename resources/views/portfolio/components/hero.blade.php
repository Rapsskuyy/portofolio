{{-- ==========================================================================
     HERO COCKPIT COMPONENT (CYBER-TELEMETRY HUD)
     Authoritative Candidate: Raffa Nur Musyaffa (SMKN 1 Depok - PPLG)
     Design System: Cosmic Navy (#080D1A), Royal Cobalt (#2563EB), Trophy Gold (#FACC15)
     Iconography: Strict Zero-Emoji Standard (100% Lucide Vector Line Icons)
     ========================================================================== --}}

<section id="hero" class="relative min-h-[calc(100vh-5rem)] flex items-center justify-center py-12 lg:py-20 overflow-hidden">
    <div id="cockpit" class="scroll-mt-24"></div>
    
    <!-- Ambient Cockpit Atmospheric Glow Orbs -->
    <div class="cobalt-orb w-72 h-72 sm:w-96 sm:h-96 -top-20 -left-20 opacity-30 z-0"></div>
    <div class="gold-orb w-64 h-64 sm:w-80 sm:h-80 top-1/2 -right-20 opacity-20 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- ==============================================================
                 LEFT COLUMN: EXECUTIVE HOOK, TELEMETRY STATUS, CTAs, KPI CARDS
                 ============================================================== -->
            <div class="lg:col-span-7 flex flex-col justify-center space-y-6 animate-on-scroll">
                
                <!-- Telemetry Status Ribbon & Monospace Category Badge -->
                <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                    
                    <!-- Live Operational Status Tracker -->
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-cosmic-900/90 border border-emerald-500/30 backdrop-blur-md shadow-inner">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-radar-pulse absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span class="font-mono text-[11px] sm:text-xs font-semibold tracking-wider text-emerald-400">
                            SYS_TELEMETRY // LOC: DEPOK, ID // STATUS: ACTIVE
                        </span>
                    </div>

                    <!-- Micro-Header Systems Tag -->
                    <div class="hud-badge text-[11px] sm:text-xs text-cobalt-300 border-cobalt-500/40 bg-cosmic-900/70">
                        <i data-lucide="terminal" class="w-3.5 h-3.5 text-cobalt-400"></i>
                        <span>// SYSTEMS ARCHITECTURE & HIGH-CONCURRENCY BACKEND //</span>
                    </div>
                </div>

                <!-- Dual-Line Candidate Display Typography -->
                <div class="space-y-2">
                    <div class="font-mono text-xs sm:text-sm font-semibold tracking-widest text-cobalt-400 uppercase flex items-center gap-2">
                        <span class="inline-block w-6 h-[1px] bg-cobalt-500"></span>
                        <span>Candidate Profile & Scholarship Aspirant</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.08]">
                        Raffa Nur 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cobalt-400 via-cobalt-500 to-cyan-400 drop-shadow-sm">
                            Musyaffa
                        </span>
                    </h1>

                    <div class="text-lg sm:text-xl lg:text-2xl font-bold text-slate-200 tracking-tight leading-snug pt-1">
                        Engineering Resilient Backend Systems &amp; Cryptographic Architectures.
                    </div>
                </div>

                <!-- Executive Mission Statement -->
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-sans max-w-2xl">
                    Software Engineering scholar at <span class="text-white font-medium">SMKN 1 Depok</span>, National Gold Medalist in Informatics, and specialized backend developer. Focused on database concurrency control, cryptographic ballot verification, and distributed web architectures engineered for high-throughput institutional integrity.
                </p>

                <!-- Primary & Secondary Command CTAs (Zero Emojis / Strict Lucide Icons) -->
                <div class="flex flex-wrap items-center gap-3 sm:gap-4 pt-1">
                    
                    <!-- Primary CTA: Flagship Deep Dive -->
                    <a href="#flagship" 
                       class="hud-chamfer-sm inline-flex items-center gap-2.5 px-5 sm:px-6 py-3 text-xs sm:text-sm font-mono font-bold tracking-wider text-white bg-gradient-to-r from-cobalt-600 via-cobalt-700 to-cobalt-800 hover:from-cobalt-500 hover:to-cyan-600 border border-cobalt-400/50 shadow-lg shadow-cobalt-600/30 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] text-decoration-none">
                        <i data-lucide="zap" class="w-4 h-4 text-cyan-300"></i>
                        <span>Inspect Flagship Architecture</span>
                    </a>

                    <!-- Secondary CTA: Honors Spotlight -->
                    <a href="#honors" 
                       class="hud-chamfer-sm inline-flex items-center gap-2.5 px-4 sm:px-5 py-3 text-xs sm:text-sm font-mono font-bold tracking-wider text-gold-300 bg-cosmic-900/90 hover:bg-gold-500/10 border border-gold-400/40 hover:border-gold-400 shadow-md shadow-gold-500/10 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] text-decoration-none">
                        <i data-lucide="award" class="w-4 h-4 text-gold-400"></i>
                        <span>Review Honors &amp; Merit</span>
                    </a>

                    <!-- Direct CV Download Action -->
                    <a href="{{ asset('files/CV .pdf') }}" download 
                       class="hud-chamfer-sm inline-flex items-center gap-2 px-4 py-3 text-xs sm:text-sm font-mono font-medium tracking-wider text-slate-300 hover:text-white bg-cosmic-950/80 hover:bg-white/5 border border-white/10 hover:border-white/25 transition-all duration-300 text-decoration-none"
                       title="Download Executive CV (PDF)">
                        <i data-lucide="file-down" class="w-4 h-4 text-gold-400"></i>
                        <span>Executive CV</span>
                    </a>
                </div>

                <!-- 4 KPI Telemetry Cards Matrix -->
                <div class="pt-2">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-3.5">
                        
                        <!-- KPI Card 1: Concurrency / Double-Vote Hazard -->
                        <div class="hud-card group">
                            <div class="hud-card-body p-3 sm:p-3.5 flex flex-col justify-between h-full bg-cosmic-900/90 border-t border-cobalt-500/20">
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="font-mono text-[10px] text-slate-400 tracking-wider uppercase">Hazard Rate</span>
                                    <i data-lucide="shield-alert" class="w-3.5 h-3.5 text-rose-400 group-hover:scale-110 transition-transform"></i>
                                </div>
                                <div class="font-mono text-lg sm:text-xl font-bold text-white tracking-tight">
                                    0.000%
                                </div>
                                <div class="text-[11px] text-slate-400 font-sans leading-tight mt-0.5">
                                    Double-Vote Hazard
                                </div>
                                <div class="font-mono text-[9px] text-cobalt-400 mt-1 truncate">
                                    OTT + Row Locks
                                </div>
                            </div>
                        </div>

                        <!-- KPI Card 2: Parallel Standing -->
                        <div class="hud-card group">
                            <div class="hud-card-body p-3 sm:p-3.5 flex flex-col justify-between h-full bg-cosmic-900/90 border-t border-gold-500/20">
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="font-mono text-[10px] text-slate-400 tracking-wider uppercase">Academic</span>
                                    <i data-lucide="crown" class="w-3.5 h-3.5 text-gold-400 group-hover:scale-110 transition-transform"></i>
                                </div>
                                <div class="font-mono text-lg sm:text-xl font-bold text-gold-300 tracking-tight">
                                    Rank #1
                                </div>
                                <div class="text-[11px] text-slate-400 font-sans leading-tight mt-0.5">
                                    Parallel Standing
                                </div>
                                <div class="font-mono text-[9px] text-gold-400 mt-1 truncate">
                                    PPLG SMKN 1 Depok
                                </div>
                            </div>
                        </div>

                        <!-- KPI Card 3: National Olympiad -->
                        <div class="hud-card group">
                            <div class="hud-card-body p-3 sm:p-3.5 flex flex-col justify-between h-full bg-cosmic-900/90 border-t border-gold-500/20">
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="font-mono text-[10px] text-slate-400 tracking-wider uppercase">Competition</span>
                                    <i data-lucide="trophy" class="w-3.5 h-3.5 text-gold-400 group-hover:scale-110 transition-transform"></i>
                                </div>
                                <div class="font-mono text-lg sm:text-xl font-bold text-white tracking-tight flex items-center gap-1">
                                    Gold
                                </div>
                                <div class="text-[11px] text-slate-400 font-sans leading-tight mt-0.5">
                                    National Olympiad
                                </div>
                                <div class="font-mono text-[9px] text-cyan-400 mt-1 truncate">
                                    Informatics &amp; CS
                                </div>
                            </div>
                        </div>

                        <!-- KPI Card 4: MPK Mandate -->
                        <div class="hud-card group">
                            <div class="hud-card-body p-3 sm:p-3.5 flex flex-col justify-between h-full bg-cosmic-900/90 border-t border-cobalt-500/20">
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="font-mono text-[10px] text-slate-400 tracking-wider uppercase">Governance</span>
                                    <i data-lucide="gavel" class="w-3.5 h-3.5 text-cobalt-400 group-hover:scale-110 transition-transform"></i>
                                </div>
                                <div class="font-mono text-lg sm:text-xl font-bold text-white tracking-tight">
                                    2-Period
                                </div>
                                <div class="text-[11px] text-slate-400 font-sans leading-tight mt-0.5">
                                    MPK Mandate
                                </div>
                                <div class="font-mono text-[9px] text-cobalt-300 mt-1 truncate">
                                    Presidium Officer
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ==============================================================
                 RIGHT COLUMN: DUAL-LAYER CHAMFERED HUD PROFILE & TELEMETRY CHIPS
                 ============================================================== -->
            <div class="lg:col-span-5 flex items-center justify-center relative mt-6 lg:mt-0 animate-on-scroll">
                
                <!-- Outer Radial Atmosphere & Reticle HUD Framing -->
                <div class="relative w-full max-w-sm sm:max-w-md mx-auto">
                    
                    <!-- Ambient Glow Behind Frame -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-cobalt-600/30 via-transparent to-gold-500/20 rounded-full blur-2xl pointer-events-none"></div>

                    <!-- Dual-Layer Chamfered Polygon Container (Quad Symmetrical HUD Cut) -->
                    <div class="hud-card-quad p-[2px] shadow-2xl shadow-cobalt-950/80 group">
                        
                        <div class="hud-card-body bg-cosmic-900 relative overflow-hidden p-2 sm:p-3">
                            
                            <!-- Avionics Corner HUD Reticles / Brackets -->
                            <div class="hud-corner-brackets absolute inset-2 pointer-events-none z-20"></div>

                            <!-- Top Telemetry Micro-Bar -->
                            <div class="relative z-20 flex items-center justify-between px-2 py-1.5 mb-2 bg-cosmic-950/80 border border-white/10 rounded font-mono text-[10px] text-slate-400">
                                <div class="flex items-center gap-1.5">
                                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    <span class="text-white font-semibold">COCKPIT_ID:</span>
                                    <span>RNM-2026</span>
                                </div>
                                <div class="text-cyan-400 font-medium">
                                    PPLG // SMKN 1 DEPOK
                                </div>
                            </div>

                            <!-- Profile Cutout Frame with Image Switcher / Fallback Protection -->
                            <div class="relative aspect-[4/5] w-full overflow-hidden hud-chamfer-quad bg-cosmic-950 border border-cobalt-500/30">
                                
                                <img src="{{ asset('images/profile/profilrappa.jpeg') }}" 
                                     alt="Raffa Nur Musyaffa — Systems Architect & MPK Officer" 
                                     id="heroCutoutImage" 
                                     class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105"
                                     onerror="this.onerror=null; this.src='{{ asset('images/profile/profile.jpeg') }}';" />

                                <!-- CRT Scanline & Grid Texture Over Profile -->
                                <div class="absolute inset-0 telemetry-scanline opacity-30 pointer-events-none"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-cosmic-950 via-transparent to-transparent opacity-80 pointer-events-none"></div>

                                <!-- Live Viewfinder Crosshair Overlay -->
                                <div class="absolute top-3 right-3 font-mono text-cyan-400 text-xs pointer-events-none opacity-80">
                                    +
                                </div>
                                <div class="absolute bottom-3 left-3 font-mono text-cyan-400 text-xs pointer-events-none opacity-80">
                                    +
                                </div>

                                <!-- Target Coordinates Stamp -->
                                <div class="absolute bottom-3 right-3 px-2 py-0.5 rounded bg-cosmic-950/80 border border-white/10 font-mono text-[9px] text-slate-400 pointer-events-none">
                                    SEC_ENCR: SHA-256
                                </div>
                            </div>

                            <!-- Bottom Status Readout -->
                            <div class="mt-2.5 px-2 py-1.5 bg-cosmic-950/80 border border-white/10 rounded font-mono text-[10px] text-slate-300 flex items-center justify-between">
                                <div class="flex items-center gap-1.5">
                                    <i data-lucide="activity" class="w-3 h-3 text-emerald-400"></i>
                                    <span>SYSTEM_INTEGRITY:</span>
                                    <span class="text-emerald-400 font-bold">100% NOMINAL</span>
                                </div>
                                <span class="text-slate-500 text-[9px]">DEPOK // ID</span>
                            </div>

                        </div>
                    </div>

                    <!-- ==============================================================
                         3 FLOATING TELEMETRY CHIPS (AVIONICS HUD ATTACHMENTS)
                         ============================================================== -->
                    
                    <!-- Floating Chip 1: National Gold Medalist (Top-Left / Top-Start) -->
                    <div class="absolute -top-4 -left-3 sm:-left-6 z-30 animate-float-slow">
                        <div class="hud-chamfer-sm px-3 py-2 bg-cosmic-900/95 backdrop-blur-xl border border-gold-400/70 shadow-lg shadow-gold-500/25 flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-gold-500/20 border border-gold-400/50 flex items-center justify-center">
                                <i data-lucide="trophy" class="w-3.5 h-3.5 text-gold-400"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-mono text-[9px] text-gold-400 uppercase tracking-widest leading-none font-bold">Achievement</span>
                                <span class="font-mono text-xs font-bold text-white">National Gold Medalist</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Chip 2: Rank 1 Parallel (Top-Right / Mid-Right) -->
                    <div class="absolute top-1/3 -right-3 sm:-right-6 z-30 animate-float-slow" style="animation-delay: 1.8s;">
                        <div class="hud-chamfer-sm px-3 py-2 bg-cosmic-900/95 backdrop-blur-xl border border-cobalt-400/70 shadow-lg shadow-cobalt-500/25 flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-cobalt-500/20 border border-cobalt-400/50 flex items-center justify-center">
                                <i data-lucide="trending-up" class="w-3.5 h-3.5 text-cobalt-400"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-mono text-[9px] text-cobalt-400 uppercase tracking-widest leading-none font-bold">Academic Standing</span>
                                <span class="font-mono text-xs font-bold text-white">Rank 1 Parallel PPLG</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Chip 3: E-Voting Kiosk Architect (Bottom-Left) -->
                    <div class="absolute -bottom-4 -left-2 sm:-left-4 z-30 animate-float-slow" style="animation-delay: 3.2s;">
                        <div class="hud-chamfer-sm px-3 py-2 bg-cosmic-900/95 backdrop-blur-xl border border-cyan-400/70 shadow-lg shadow-cyan-500/25 flex items-center gap-2">
                            <div class="w-6 h-6 rounded bg-cyan-500/20 border border-cyan-400/50 flex items-center justify-center">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-cyan-400"></i>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-mono text-[9px] text-cyan-400 uppercase tracking-widest leading-none font-bold">Flagship System</span>
                                <span class="font-mono text-xs font-bold text-white">E-Voting Kiosk Architect</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
