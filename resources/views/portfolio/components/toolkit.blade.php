{{-- ==========================================================================
     ENGINEERING TOOLKIT & 2027 ROADMAP COMPONENT (CYBER-TELEMETRY HUD)
     Authoritative Candidate: Raffa Nur Musyaffa (SMKN 1 Depok - PPLG)
     Design System: Cosmic Navy (#080D1A), Royal Cobalt (#2563EB), Trophy Gold (#FACC15)
     Iconography: Strict Zero-Emoji Standard (100% Lucide Vector Line Icons)
     ========================================================================== --}}

<section id="toolkit" class="relative py-16 md:py-24 overflow-hidden">
    
    <!-- Ambient Atmospheric Glow Orbs -->
    <div class="cyan-orb w-96 h-96 -top-20 -right-20 opacity-20 z-0"></div>
    <div class="cobalt-orb w-80 h-80 top-1/3 -left-20 opacity-25 z-0"></div>
    <div class="gold-orb w-96 h-96 -bottom-20 right-1/4 opacity-20 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- ==============================================================
             PART A: ENGINEERING TOOLKIT MATRIX SECTION HEADER
             ============================================================== -->
        <div class="flex flex-col items-start space-y-3 mb-10 md:mb-12 animate-on-scroll">
            
            <div class="flex flex-wrap items-center gap-2">
                <span class="hud-badge text-xs text-cyan-300 border-cyan-500/40">
                    <i data-lucide="cpu" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>[06 // ENGINEERING TOOLKIT MATRIX]</span>
                </span>
                <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                    // HIGH-CONCURRENCY BACKENDS, DATABASES, CRYPTOGRAPHY &amp; 3D
                </span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                Architectural Competencies &amp; 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-cobalt-400 to-indigo-400">
                    Engineering Stack
                </span>
            </h2>

            <p class="text-sm sm:text-base text-slate-300 font-sans max-w-3xl leading-relaxed">
                Systematic engineering mastery across backend frameworks, atomic database concurrency protocols, cryptographic security invariants, and real-time 3D spatial asset workflows.
            </p>
        </div>

        <!-- ==============================================================
             4 HIGH-TECH HUD TOOLKIT CARDS MATRIX
             ============================================================== -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-20">
            
            <!-- HUD CARD 1: BACKEND & SYSTEMS -->
            <div class="hud-card group animate-on-scroll flex flex-col">
                <div class="hud-card-body p-6 flex flex-col justify-between h-full bg-cosmic-900 border-t border-cobalt-500/40">
                    <div>
                        <!-- Card Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-cobalt-500/20 border border-cobalt-400/50 flex items-center justify-center text-cobalt-400 group-hover:scale-110 transition-transform">
                                <i data-lucide="server" class="w-5 h-5 text-cobalt-400"></i>
                            </div>
                            <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 font-mono text-[10px] text-cobalt-300 font-semibold">
                                CORE.01
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-white tracking-tight mb-1 group-hover:text-cobalt-300 transition-colors">
                            Backend &amp; Systems
                        </h3>
                        <div class="font-mono text-xs text-cobalt-400 font-medium mb-4">
                            High-Throughput Services &amp; APIs
                        </div>

                        <!-- Competency Pills List -->
                        <div class="space-y-2 font-mono text-xs mb-5">
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cobalt-400 shrink-0"></i>
                                <span>PHP 8.3 (Strict Types / OOP)</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cobalt-400 shrink-0"></i>
                                <span>Laravel 11 &amp; 12 Architecture</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cobalt-400 shrink-0"></i>
                                <span>Kotlin (Android Native / Coroutines)</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cobalt-400 shrink-0"></i>
                                <span>Java SE (Object-Oriented Design)</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cobalt-400 shrink-0"></i>
                                <span>RESTful APIs &amp; Service Layer</span>
                            </div>
                        </div>
                    </div>

                    <!-- Telemetry Readout Footer -->
                    <div class="pt-3 border-t border-white/10 font-mono text-[10px] text-slate-400 flex items-center justify-between">
                        <span>LATENCY:</span>
                        <span class="text-emerald-400 font-bold">&lt; 50ms API P99</span>
                    </div>
                </div>
            </div>

            <!-- HUD CARD 2: DATABASE & CONCURRENCY -->
            <div class="hud-card group animate-on-scroll flex flex-col">
                <div class="hud-card-body p-6 flex flex-col justify-between h-full bg-cosmic-900 border-t border-cyan-500/40">
                    <div>
                        <!-- Card Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/20 border border-cyan-400/50 flex items-center justify-center text-cyan-400 group-hover:scale-110 transition-transform">
                                <i data-lucide="database" class="w-5 h-5 text-cyan-400"></i>
                            </div>
                            <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 font-mono text-[10px] text-cyan-300 font-semibold">
                                CORE.02
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-white tracking-tight mb-1 group-hover:text-cyan-300 transition-colors">
                            Database &amp; Concurrency
                        </h3>
                        <div class="font-mono text-xs text-cyan-400 font-medium mb-4">
                            ACID Transactions &amp; Row Locks
                        </div>

                        <!-- Competency Pills List -->
                        <div class="space-y-2 font-mono text-xs mb-5">
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cyan-400 shrink-0"></i>
                                <span>MySQL 8.0 &amp; MariaDB Engines</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="lock" class="w-3.5 h-3.5 text-rose-400 shrink-0"></i>
                                <span>Pessimistic Locking (FOR UPDATE)</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cyan-400 shrink-0"></i>
                                <span>ACID Transactions (DB::transaction)</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cyan-400 shrink-0"></i>
                                <span>B-Tree Indexing &amp; Query Tuning</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-cyan-400 shrink-0"></i>
                                <span>Migrations &amp; Deterministic Seeders</span>
                            </div>
                        </div>
                    </div>

                    <!-- Telemetry Readout Footer -->
                    <div class="pt-3 border-t border-white/10 font-mono text-[10px] text-slate-400 flex items-center justify-between">
                        <span>INTEGRITY:</span>
                        <span class="text-cyan-300 font-bold">0.000% RACE CONFLICT</span>
                    </div>
                </div>
            </div>

            <!-- HUD CARD 3: SECURITY & CRYPTOGRAPHY -->
            <div class="hud-card group animate-on-scroll flex flex-col">
                <div class="hud-card-body p-6 flex flex-col justify-between h-full bg-cosmic-900 border-t border-emerald-500/40">
                    <div>
                        <!-- Card Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 border border-emerald-400/50 flex items-center justify-center text-emerald-400 group-hover:scale-110 transition-transform">
                                <i data-lucide="shield-check" class="w-5 h-5 text-emerald-400"></i>
                            </div>
                            <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 font-mono text-[10px] text-emerald-300 font-semibold">
                                CORE.03
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-white tracking-tight mb-1 group-hover:text-emerald-300 transition-colors">
                            Security &amp; Protocols
                        </h3>
                        <div class="font-mono text-xs text-emerald-400 font-medium mb-4">
                            Cryptographic Proof &amp; RBAC Trees
                        </div>

                        <!-- Competency Pills List -->
                        <div class="space-y-2 font-mono text-xs mb-5">
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="key-round" class="w-3.5 h-3.5 text-emerald-400 shrink-0"></i>
                                <span>HMAC-SHA256 Kiosk Signatures</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 shrink-0"></i>
                                <span>CSPRNG 256-bit One-Time Tokens</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 shrink-0"></i>
                                <span>Role-Based Access Control (RBAC)</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 shrink-0"></i>
                                <span>SQLi / XSS / CSRF Sanitization</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 shrink-0"></i>
                                <span>Ballot Identity Decoupling Invariants</span>
                            </div>
                        </div>
                    </div>

                    <!-- Telemetry Readout Footer -->
                    <div class="pt-3 border-t border-white/10 font-mono text-[10px] text-slate-400 flex items-center justify-between">
                        <span>AUDIT SEAL:</span>
                        <span class="text-emerald-400 font-bold">100% UNFORGEABLE</span>
                    </div>
                </div>
            </div>

            <!-- HUD CARD 4: DEVOPS, TOOLING & 3D -->
            <div class="hud-card group animate-on-scroll flex flex-col">
                <div class="hud-card-body p-6 flex flex-col justify-between h-full bg-cosmic-900 border-t border-gold-500/40">
                    <div>
                        <!-- Card Header -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-10 h-10 rounded-lg bg-gold-500/20 border border-gold-400/50 flex items-center justify-center text-gold-400 group-hover:scale-110 transition-transform">
                                <i data-lucide="cpu" class="w-5 h-5 text-gold-400"></i>
                            </div>
                            <span class="px-2 py-0.5 rounded bg-cosmic-950 border border-white/10 font-mono text-[10px] text-gold-300 font-semibold">
                                CORE.04
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-white tracking-tight mb-1 group-hover:text-gold-200 transition-colors">
                            DevOps, Tooling &amp; 3D
                        </h3>
                        <div class="font-mono text-xs text-gold-400 font-medium mb-4">
                            Build Toolchains &amp; Spatial Labs
                        </div>

                        <!-- Competency Pills List -->
                        <div class="space-y-2 font-mono text-xs mb-5">
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-gold-400 shrink-0"></i>
                                <span>Git &amp; GitHub Version Control</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-gold-400 shrink-0"></i>
                                <span>Vite 7.x &amp; Tailwind CSS v4</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-gold-400 shrink-0"></i>
                                <span>Android Studio &amp; Gradle Pipelines</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-gold-400 shrink-0"></i>
                                <span>Postman API Test Automation</span>
                            </div>
                            <div class="flex items-center gap-2 p-2 rounded bg-cosmic-950/80 border border-white/10 text-slate-200">
                                <i data-lucide="box" class="w-3.5 h-3.5 text-gold-400 shrink-0"></i>
                                <span>Blender 3D (Cycles / PBR Shading)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Telemetry Readout Footer -->
                    <div class="pt-3 border-t border-white/10 font-mono text-[10px] text-slate-400 flex items-center justify-between">
                        <span>PIPELINE:</span>
                        <span class="text-gold-300 font-bold">AUTOMATED &amp; LINTED</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- ==============================================================
             PART B: 2027 STRATEGIC SCHOLARSHIP & PTN TRAJECTORY ROADMAP
             ============================================================== -->
        <div id="roadmap" class="pt-8 border-t border-white/10 animate-on-scroll">
            
            <!-- Roadmap Header -->
            <div class="flex flex-col items-start space-y-3 mb-10 md:mb-14">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="hud-badge-gold text-xs">
                        <i data-lucide="milestone" class="w-3.5 h-3.5 text-gold-400"></i>
                        <span>[STRATEGIC TRAJECTORY // 2024 - 2027+]</span>
                    </span>
                    <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                        // TÜRKİYE BURSLARI SCHOLARSHIP &amp; TOP PTN MATRICULATION
                    </span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                    2027 Strategic Scholarship &amp; 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 via-amber-300 to-yellow-500">
                        Academic Flight Plan
                    </span>
                </h2>

                <p class="text-sm sm:text-base text-slate-300 font-sans max-w-3xl leading-relaxed">
                    A rigorous multi-year flight plan tracking national competitive distinctions, enterprise software development under NDA, valedictorian graduation, and international undergraduate scholarship admission.
                </p>
            </div>

            <!-- 4-Milestone High-Tech Timeline Flight Path Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                
                <!-- MILESTONE 01: FOUNDATIONAL EMINENCE (2024 - 2025) [ACHIEVED] -->
                <div class="hud-card-gold flex flex-col justify-between group animate-on-scroll">
                    <div class="hud-card-body p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Top Period & Status Badge -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-gold-500/20 border border-gold-400/60 font-mono text-[11px] font-bold text-gold-300 flex items-center gap-1">
                                    <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400"></i>
                                    <span>ACHIEVED</span>
                                </span>
                                <span class="font-mono text-xs font-bold text-slate-400">2024 - 2025</span>
                            </div>

                            <!-- Milestone Tag & Title -->
                            <div class="font-mono text-xs text-gold-400 font-bold tracking-wider uppercase mb-1">
                                Milestone 01
                            </div>
                            <h3 class="text-xl font-extrabold text-white tracking-tight mb-3 group-hover:text-gold-200 transition-colors">
                                Foundational Eminence
                            </h3>

                            <!-- Milestone Narrative Points -->
                            <div class="space-y-3 font-sans text-xs text-slate-300 mb-6 leading-relaxed">
                                <div class="flex items-start gap-2">
                                    <i data-lucide="trophy" class="w-4 h-4 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span><strong>National Gold Medal:</strong> Juara 1 in Informatics &amp; Computational Logic (Olimpiade Sains / POSI).</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="crown" class="w-4 h-4 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Rank 1 Parallel:</strong> Sustained #1 standing across Software Engineering (PPLG) cohort.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="gavel" class="w-4 h-4 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span><strong>MPK Leadership:</strong> Presided as Ketua Pelaksana Sidang Triwulan parliamentary sessions.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Verification Tag -->
                        <div class="pt-4 border-t border-gold-400/20 flex items-center justify-between font-mono text-[10px]">
                            <span class="text-slate-400">VERIFICATION:</span>
                            <span class="text-emerald-400 font-bold flex items-center gap-1">
                                <i data-lucide="check-circle-2" class="w-3 h-3 text-emerald-400"></i>
                                <span>OFFICIAL RECORDS</span>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- MILESTONE 02: INDUSTRIAL RIGOR & TOEIC (2025 - 2026) [IN-PROGRESS] -->
                <div class="hud-card flex flex-col justify-between group animate-on-scroll">
                    <div class="hud-card-body p-6 flex flex-col justify-between bg-cosmic-900 border-t border-cobalt-500/40 relative overflow-hidden">
                        
                        <div>
                            <!-- Top Period & Status Badge -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-cobalt-500/20 border border-cobalt-400/50 font-mono text-[11px] font-bold text-cobalt-300 flex items-center gap-1">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-radar-pulse absolute inline-flex h-full w-full rounded-full bg-cobalt-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-cobalt-500"></span>
                                    </span>
                                    <span>IN-PROGRESS</span>
                                </span>
                                <span class="font-mono text-xs font-bold text-slate-400">2025 - 2026</span>
                            </div>

                            <!-- Milestone Tag & Title -->
                            <div class="font-mono text-xs text-cobalt-400 font-bold tracking-wider uppercase mb-1">
                                Milestone 02
                            </div>
                            <h3 class="text-xl font-extrabold text-white tracking-tight mb-3 group-hover:text-cobalt-200 transition-colors">
                                Industrial Rigor &amp; TOEIC
                            </h3>

                            <!-- Milestone Narrative Points -->
                            <div class="space-y-3 font-sans text-xs text-slate-300 mb-6 leading-relaxed">
                                <div class="flex items-start gap-2">
                                    <i data-lucide="building-2" class="w-4 h-4 text-cobalt-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Enterprise APIs (NDA):</strong> Architecting high-throughput backend services during vocational PKL.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="languages" class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span><strong>TOEIC B2/C1 Standard:</strong> Certified international workplace English proficiency (ETS/Kemendikbud).</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5"></i>
                                    <span><strong>E-Voting Kiosk TPS:</strong> Hardening cryptographic token &amp; pessimistic row-lock architecture.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Verification Tag -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between font-mono text-[10px]">
                            <span class="text-slate-400">PHASE:</span>
                            <span class="text-cobalt-300 font-bold flex items-center gap-1">
                                <i data-lucide="activity" class="w-3 h-3 text-cobalt-400"></i>
                                <span>PRODUCTION RIGOR</span>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- MILESTONE 03: TOP PTN ADMISSION & VALEDICTORIAN (2026 - 2027) [TARGET] -->
                <div class="hud-card flex flex-col justify-between group animate-on-scroll">
                    <div class="hud-card-body p-6 flex flex-col justify-between bg-cosmic-900 border-t border-cyan-500/40 relative overflow-hidden">
                        
                        <div>
                            <!-- Top Period & Status Badge -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-cyan-500/20 border border-cyan-400/50 font-mono text-[11px] font-bold text-cyan-300 flex items-center gap-1">
                                    <i data-lucide="target" class="w-3.5 h-3.5 text-cyan-400"></i>
                                    <span>TARGET HORIZON</span>
                                </span>
                                <span class="font-mono text-xs font-bold text-slate-400">2026 - 2027</span>
                            </div>

                            <!-- Milestone Tag & Title -->
                            <div class="font-mono text-xs text-cyan-400 font-bold tracking-wider uppercase mb-1">
                                Milestone 03
                            </div>
                            <h3 class="text-xl font-extrabold text-white tracking-tight mb-3 group-hover:text-cyan-200 transition-colors">
                                Top PTN Admission
                            </h3>

                            <!-- Milestone Narrative Points -->
                            <div class="space-y-3 font-sans text-xs text-slate-300 mb-6 leading-relaxed">
                                <div class="flex items-start gap-2">
                                    <i data-lucide="graduation-cap" class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Valedictorian Graduation:</strong> Target top graduation honors at SMKN 1 Depok (PPLG).</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="target" class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Premier State Universities:</strong> Computer Science / Informatics Engineering (UI / ITB / IPB).</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="file-text" class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Applied Research:</strong> Formulate academic publications on database concurrency protocols.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Verification Tag -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between font-mono text-[10px]">
                            <span class="text-slate-400">PATHWAY:</span>
                            <span class="text-cyan-300 font-bold flex items-center gap-1">
                                <i data-lucide="compass" class="w-3 h-3 text-cyan-400"></i>
                                <span>SNBP / SNBT MERIT</span>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- MILESTONE 04: TÜRKİYE BURSLARI GLOBAL SCHOLARSHIP (2027+) [GLOBAL HORIZON] -->
                <div class="hud-card-gold flex flex-col justify-between group animate-on-scroll">
                    <div class="hud-card-body p-6 flex flex-col justify-between bg-cosmic-900 relative overflow-hidden">
                        
                        <div>
                            <!-- Top Period & Status Badge -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-gold-500/20 border border-gold-400/60 font-mono text-[11px] font-bold text-gold-300 flex items-center gap-1 shadow-sm shadow-gold-500/20">
                                    <i data-lucide="globe" class="w-3.5 h-3.5 text-gold-400"></i>
                                    <span>GLOBAL HORIZON</span>
                                </span>
                                <span class="font-mono text-xs font-bold text-gold-300">2027+</span>
                            </div>

                            <!-- Milestone Tag & Title -->
                            <div class="font-mono text-xs text-gold-400 font-bold tracking-wider uppercase mb-1">
                                Milestone 04
                            </div>
                            <h3 class="text-xl font-extrabold text-white tracking-tight mb-3 group-hover:text-gold-200 transition-colors">
                                Türkiye Bursları Global
                            </h3>

                            <!-- Milestone Narrative Points -->
                            <div class="space-y-3 font-sans text-xs text-slate-300 mb-6 leading-relaxed">
                                <div class="flex items-start gap-2">
                                    <i data-lucide="milestone" class="w-4 h-4 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Full International Grant:</strong> Türkiye Bursları Undergraduate Scholarship in Computer Science.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="building-2" class="w-4 h-4 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Premier Turkish Institutions:</strong> Middle East Technical University (METU) / ITU / Boğaziçi.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i data-lucide="cpu" class="w-4 h-4 text-gold-400 shrink-0 mt-0.5"></i>
                                    <span><strong>Systems Specialization:</strong> Scalable distributed systems, cloud clusters &amp; cryptography.</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Verification Tag -->
                        <div class="pt-4 border-t border-gold-400/20 flex items-center justify-between font-mono text-[10px]">
                            <span class="text-slate-400">GOAL:</span>
                            <span class="text-gold-300 font-bold flex items-center gap-1">
                                <i data-lucide="sparkles" class="w-3 h-3 text-gold-400"></i>
                                <span>B.SC. COMPUTER SCIENCE</span>
                            </span>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
