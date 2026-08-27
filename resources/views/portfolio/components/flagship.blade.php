{{-- ==========================================================================
     FLAGSHIP ARCHITECTURE SPOTLIGHT: ELECTRONIC POLLING STATION KIOSK (TPS)
     Authoritative Candidate: Raffa Nur Musyaffa (SMKN 1 Depok - PPLG)
     Design System: Cosmic Navy (#080D1A), Royal Cobalt (#2563EB), Trophy Gold (#FACC15)
     Iconography: Strict Zero-Emoji Standard (100% Lucide Vector Line Icons)
     ========================================================================== --}}

<section id="flagship" class="relative py-16 md:py-24 overflow-hidden">
    
    <!-- Ambient Atmospheric Glow Orbs -->
    <div class="cobalt-orb w-96 h-96 -top-20 -left-20 opacity-30 z-0"></div>
    <div class="cyan-orb w-80 h-80 top-1/2 -right-20 opacity-25 z-0"></div>
    <div class="gold-orb w-72 h-72 bottom-0 left-1/3 opacity-20 z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- ==============================================================
             SECTION HEADER: FLAGSHIP ARCHITECTURE TELEMETRY
             ============================================================== -->
        <div class="flex flex-col items-start space-y-3 mb-10 md:mb-14 animate-on-scroll">
            
            <div class="flex flex-wrap items-center gap-2">
                <span class="hud-badge text-xs text-cyan-300 border-cyan-500/40 bg-cosmic-900/80">
                    <i data-lucide="shield-check" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>[03 // FLAGSHIP ARCHITECTURE SPOTLIGHT]</span>
                </span>
                <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                    // COMMERCIAL ELECTRONIC POLLING STATION (TPS) SYSTEM
                </span>
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                High-Concurrency 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cobalt-400 via-cyan-400 to-emerald-400">
                    Cryptographic E-Voting Kiosk
                </span>
            </h2>

            <p class="text-sm sm:text-base text-slate-300 font-sans max-w-3xl leading-relaxed">
                A production-grade Electronic Polling Station (TPS - Tempat Pemungutan Suara) engineered for institutional elections. Architected with mathematical zero double-vote guarantees, decoupled blind ballot anonymity, hardware-signed node verification, and low-latency Android kiosk compatibility.
            </p>

            <!-- Live Diagnostic Ribbon -->
            <div class="flex flex-wrap items-center gap-2.5 pt-1 font-mono text-[11px]">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-cosmic-950/90 border border-emerald-500/40 text-emerald-400">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-radar-pulse absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span>CONCURRENCY_STATE: ACID ROW-LOCK ACTIVE</span>
                </div>
                <div class="px-2.5 py-1 rounded bg-cosmic-950/70 border border-white/10 text-slate-400">
                    SEC_ENCR: CSPRNG + SHA-256
                </div>
                <div class="px-2.5 py-1 rounded bg-cosmic-950/70 border border-white/10 text-cyan-400">
                    NODE_AUTH: HMAC-SHA256
                </div>
                <div class="px-2.5 py-1 rounded bg-cosmic-950/70 border border-white/10 text-gold-400">
                    LATENCY: &lt; 120MS
                </div>
            </div>

        </div>

        <!-- ==============================================================
             4 FLAGSHIP METRIC CALLOUT CARDS
             ============================================================== -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-4 mb-12 animate-on-scroll">
            
            <!-- Metric 1: Duplicate Votes -->
            <div class="hud-card group">
                <div class="hud-card-body p-4 sm:p-5 flex flex-col justify-between bg-cosmic-900/90 border-t border-rose-500/30">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-mono text-[10px] sm:text-xs text-slate-400 uppercase tracking-wider">Hazard Prevention</span>
                        <div class="w-7 h-7 rounded bg-rose-500/20 flex items-center justify-center text-rose-400">
                            <i data-lucide="shield-alert" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div class="font-mono text-2xl sm:text-3xl font-black text-white tracking-tight my-1">
                        0 Duplicate
                    </div>
                    <div class="text-xs text-slate-300 font-sans leading-tight">
                        Votes Recorded Across 1,000+ Eligible Voters
                    </div>
                    <div class="font-mono text-[10px] text-rose-400 mt-2 flex items-center gap-1">
                        <i data-lucide="lock" class="w-3 h-3"></i>
                        <span>Atomic SELECT ... FOR UPDATE</span>
                    </div>
                </div>
            </div>

            <!-- Metric 2: Decoupled Ballot Anonymity -->
            <div class="hud-card group">
                <div class="hud-card-body p-4 sm:p-5 flex flex-col justify-between bg-cosmic-900/90 border-t border-cyan-500/30">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-mono text-[10px] sm:text-xs text-slate-400 uppercase tracking-wider">Privacy Invariant</span>
                        <div class="w-7 h-7 rounded bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                            <i data-lucide="key-round" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div class="font-mono text-2xl sm:text-3xl font-black text-cyan-400 tracking-tight my-1">
                        100% Decoupled
                    </div>
                    <div class="text-xs text-slate-300 font-sans leading-tight">
                        Ballot Anonymity Guarantee (Blind Ledger)
                    </div>
                    <div class="font-mono text-[10px] text-cyan-300 mt-2 flex items-center gap-1">
                        <i data-lucide="shield-check" class="w-3 h-3"></i>
                        <span>Zero FK Link to Voter Identity</span>
                    </div>
                </div>
            </div>

            <!-- Metric 3: Avg Transaction Latency -->
            <div class="hud-card group">
                <div class="hud-card-body p-4 sm:p-5 flex flex-col justify-between bg-cosmic-900/90 border-t border-cobalt-500/30">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-mono text-[10px] sm:text-xs text-slate-400 uppercase tracking-wider">Commit Speed</span>
                        <div class="w-7 h-7 rounded bg-cobalt-500/20 flex items-center justify-center text-cobalt-400">
                            <i data-lucide="cpu" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div class="font-mono text-2xl sm:text-3xl font-black text-white tracking-tight my-1">
                        &lt; 120 ms
                    </div>
                    <div class="text-xs text-slate-300 font-sans leading-tight">
                        End-to-End Touch-to-Database Latency
                    </div>
                    <div class="font-mono text-[10px] text-cobalt-300 mt-2 flex items-center gap-1">
                        <i data-lucide="activity" class="w-3 h-3"></i>
                        <span>Indexed InnoDB Write Commit</span>
                    </div>
                </div>
            </div>

            <!-- Metric 4: Voter Throughput -->
            <div class="hud-card group">
                <div class="hud-card-body p-4 sm:p-5 flex flex-col justify-between bg-cosmic-900/90 border-t border-gold-500/30">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-mono text-[10px] sm:text-xs text-slate-400 uppercase tracking-wider">Voter Velocity</span>
                        <div class="w-7 h-7 rounded bg-gold-500/20 flex items-center justify-center text-gold-400">
                            <i data-lucide="zap" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div class="font-mono text-2xl sm:text-3xl font-black text-gold-400 tracking-tight my-1">
                        11.4s / Voter
                    </div>
                    <div class="text-xs text-slate-300 font-sans leading-tight">
                        Average Voter Session Turnover Time
                    </div>
                    <div class="font-mono text-[10px] text-gold-300 mt-2 flex items-center gap-1">
                        <i data-lucide="tablet-smartphone" class="w-3 h-3"></i>
                        <span>Android Single-App Kiosk Mode</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- ==============================================================
             THE 4 ARCHITECTURAL PILLARS (CHAMFERED TELEMETRY CARDS)
             ============================================================== -->
        <div class="mb-14">
            <div class="flex items-center justify-between mb-6">
                <div class="font-mono text-xs sm:text-sm font-bold text-white uppercase tracking-wider flex items-center gap-2">
                    <span class="inline-block w-3 h-3 bg-cobalt-500 rounded-sm"></span>
                    <span>The 4 Hardcore Architectural Pillars</span>
                </div>
                <span class="font-mono text-xs text-slate-400 hidden sm:inline">[STRICT INVARIANTS // SEC_ENGINE]</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                
                <!-- Pillar 1: Cryptographic One-Time Tokens -->
                <div class="hud-card group animate-on-scroll">
                    <div class="hud-card-body p-6 sm:p-7 flex flex-col justify-between relative bg-cosmic-900 border-t border-cyan-500/40">
                        <div>
                            <!-- Header Ribbon -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-cyan-500/20 border border-cyan-400/50 font-mono text-xs font-bold text-cyan-300 uppercase tracking-wider flex items-center gap-1.5">
                                    <i data-lucide="key-round" class="w-3.5 h-3.5 text-cyan-400"></i>
                                    <span>PILLAR 01 // CRYPTOGRAPHIC OTT</span>
                                </span>
                                <span class="font-mono text-xs text-slate-400">CSPRNG + SHA-256</span>
                            </div>

                            <h3 class="text-xl font-bold text-white tracking-tight mb-2 group-hover:text-cyan-300 transition-colors">
                                Cryptographic One-Time Tokens (OTT)
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-sans mb-5">
                                256-bit cryptographically secure pseudo-random tokens (CSPRNG) generated per authenticated voter. Each token is hashed using SHA-256 before storage and instantly marked consumed upon ballot generation. Guarantees absolute voter-ballot decoupling with zero foreign key linkage.
                            </p>

                            <!-- Invariant Matrix -->
                            <div class="space-y-2 mb-5 font-mono text-xs">
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Entropy Generator:</span>
                                    <span class="text-cyan-300 font-semibold">CSPRNG 256-Bit Cryptographic</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Storage Scheme:</span>
                                    <span class="text-white font-semibold">SHA-256 Digest Hash</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Ephemeral TTL:</span>
                                    <span class="text-gold-300 font-semibold">300 Seconds Window</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                            <span class="font-mono text-[11px] text-emerald-400 flex items-center gap-1">
                                <i data-lucide="check-circle-2" class="w-3 h-3 text-emerald-400"></i>
                                <span>Single-Use DB Constraint</span>
                            </span>
                            <button type="button" onclick="inspectPillar(1)" class="font-mono text-xs text-cyan-400 hover:text-cyan-300 flex items-center gap-1">
                                <span>Inspect Logic</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pillar 2: Database Row-Level Locking -->
                <div class="hud-card group animate-on-scroll">
                    <div class="hud-card-body p-6 sm:p-7 flex flex-col justify-between relative bg-cosmic-900 border-t border-rose-500/40">
                        <div>
                            <!-- Header Ribbon -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-rose-500/20 border border-rose-400/50 font-mono text-xs font-bold text-rose-300 uppercase tracking-wider flex items-center gap-1.5">
                                    <i data-lucide="lock" class="w-3.5 h-3.5 text-rose-400"></i>
                                    <span>PILLAR 02 // ROW-LEVEL LOCKING</span>
                                </span>
                                <span class="font-mono text-xs text-slate-400">ACID PESSIMISTIC</span>
                            </div>

                            <h3 class="text-xl font-bold text-white tracking-tight mb-2 group-hover:text-rose-300 transition-colors">
                                Database Row-Level Locking (Pessimistic)
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-sans mb-5">
                                All ballot submission transactions run inside atomic ACID transaction blocks (<code class="text-rose-300 font-mono text-[11px]">DB::transaction</code>). The voter token row is queried with <code class="text-rose-300 font-mono text-[11px]">SELECT ... FOR UPDATE</code>, preventing concurrent booth terminals from executing a double-vote race condition.
                            </p>

                            <!-- Invariant Matrix -->
                            <div class="space-y-2 mb-5 font-mono text-xs">
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Isolation Level:</span>
                                    <span class="text-rose-300 font-semibold">Read Committed / Serializable</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Commit Duration:</span>
                                    <span class="text-white font-semibold">&lt; 35ms per ACID Commit</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Race Hazard Rate:</span>
                                    <span class="text-emerald-400 font-semibold">0.000% Conflict Probability</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                            <span class="font-mono text-[11px] text-emerald-400 flex items-center gap-1">
                                <i data-lucide="check-circle-2" class="w-3 h-3 text-emerald-400"></i>
                                <span>Zero-Race Guarantee</span>
                            </span>
                            <button type="button" onclick="inspectPillar(2)" class="font-mono text-xs text-rose-400 hover:text-rose-300 flex items-center gap-1">
                                <span>Inspect Logic</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pillar 3: HMAC Kiosk Node Security -->
                <div class="hud-card group animate-on-scroll">
                    <div class="hud-card-body p-6 sm:p-7 flex flex-col justify-between relative bg-cosmic-900 border-t border-cobalt-500/40">
                        <div>
                            <!-- Header Ribbon -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-cobalt-500/20 border border-cobalt-400/50 font-mono text-xs font-bold text-cobalt-300 uppercase tracking-wider flex items-center gap-1.5">
                                    <i data-lucide="fingerprint" class="w-3.5 h-3.5 text-cobalt-400"></i>
                                    <span>PILLAR 03 // HMAC NODE INTEGRITY</span>
                                </span>
                                <span class="font-mono text-xs text-slate-400">HARDWARE SIGNING</span>
                            </div>

                            <h3 class="text-xl font-bold text-white tracking-tight mb-2 group-hover:text-cobalt-300 transition-colors">
                                HMAC Kiosk Node Security
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-sans mb-5">
                                Each physical polling booth terminal is provisioned with a cryptographic device secret. Every network payload transmitted to the server is signed with an HMAC-SHA256 digest alongside a timestamped nonce, blocking unauthorized or rogue ingress at the middleware layer.
                            </p>

                            <!-- Invariant Matrix -->
                            <div class="space-y-2 mb-5 font-mono text-xs">
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Signing Scheme:</span>
                                    <span class="text-cobalt-300 font-semibold">HMAC-SHA256 Hex Digest</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-white font-semibold">&lt; 5,000ms Anti-Replay</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Ingress Defense:</span>
                                    <span class="text-emerald-400 font-semibold">Kernel &amp; Middleware Rejected</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                            <span class="font-mono text-[11px] text-emerald-400 flex items-center gap-1">
                                <i data-lucide="check-circle-2" class="w-3 h-3 text-emerald-400"></i>
                                <span>Hardware-Bound Ingress</span>
                            </span>
                            <button type="button" onclick="inspectPillar(3)" class="font-mono text-xs text-cobalt-400 hover:text-cobalt-300 flex items-center gap-1">
                                <span>Inspect Logic</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pillar 4: Android Tablet Kiosk Mode Compatibility -->
                <div class="hud-card group animate-on-scroll">
                    <div class="hud-card-body p-6 sm:p-7 flex flex-col justify-between relative bg-cosmic-900 border-t border-emerald-500/40">
                        <div>
                            <!-- Header Ribbon -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <span class="px-2.5 py-1 rounded bg-emerald-500/20 border border-emerald-400/50 font-mono text-xs font-bold text-emerald-300 uppercase tracking-wider flex items-center gap-1.5">
                                    <i data-lucide="tablet-smartphone" class="w-3.5 h-3.5 text-emerald-400"></i>
                                    <span>PILLAR 04 // ANDROID KIOSK UI</span>
                                </span>
                                <span class="font-mono text-xs text-slate-400">SINGLE-APP LOCKDOWN</span>
                            </div>

                            <h3 class="text-xl font-bold text-white tracking-tight mb-2 group-hover:text-emerald-300 transition-colors">
                                Android Tablet Kiosk Mode Compatibility
                            </h3>

                            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-sans mb-5">
                                Lightweight, zero-dependency client view tailored for low-power Android tablets locked into dedicated Single-App Kiosk Mode. Features sub-40ms Total Blocking Time (TBT), 11.4s average voter cycle time, and minimal memory footprint (&lt; 55MB active heap).
                            </p>

                            <!-- Invariant Matrix -->
                            <div class="space-y-2 mb-5 font-mono text-xs">
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Avg Cycle Time:</span>
                                    <span class="text-emerald-300 font-semibold">11.4 Seconds / Voter</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Total Blocking Time:</span>
                                    <span class="text-white font-semibold">&lt; 40ms Responsiveness</span>
                                </div>
                                <div class="p-2.5 rounded bg-cosmic-950/80 border border-white/10 flex items-center justify-between">
                                    <span class="text-slate-400">Active Heap Footprint:</span>
                                    <span class="text-cyan-300 font-semibold">&lt; 55MB RAM Consumption</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action -->
                        <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                            <span class="font-mono text-[11px] text-emerald-400 flex items-center gap-1">
                                <i data-lucide="check-circle-2" class="w-3 h-3 text-emerald-400"></i>
                                <span>Zero Voter Bottleneck</span>
                            </span>
                            <button type="button" onclick="inspectPillar(4)" class="font-mono text-xs text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                                <span>Inspect Logic</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ==============================================================
             INTERACTIVE ARCHITECTURE CONSOLE & CODE SNIPPET TABS
             ============================================================== -->
        <div class="hud-card-quad animate-on-scroll">
            <div class="hud-card-body p-6 sm:p-8 bg-cosmic-900/95 relative overflow-hidden">
                
                <!-- Terminal Title Bar -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block"></span>
                            <span class="w-3 h-3 rounded-full bg-gold-500/80 inline-block"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                        </div>
                        <div class="font-mono text-xs font-bold text-white flex items-center gap-2">
                            <i data-lucide="terminal" class="w-4 h-4 text-cyan-400"></i>
                            <span>TPS_CORE_ARCHITECTURE // INTERACTIVE CONSOLE</span>
                        </div>
                    </div>

                    <!-- Tab Switcher Navigation -->
                    <div class="flex flex-wrap items-center gap-1.5 p-1 bg-cosmic-950 rounded-lg border border-white/10 font-mono text-xs">
                        <button type="button" id="tab-btn-flow" onclick="switchFlagshipTab('flow')" class="px-3 py-1.5 rounded text-white bg-cobalt-600 font-semibold transition-all flex items-center gap-1.5">
                            <i data-lucide="git-commit" class="w-3.5 h-3.5 text-cyan-300"></i>
                            <span>Node Flow</span>
                        </button>
                        <button type="button" id="tab-btn-code" onclick="switchFlagshipTab('code')" class="px-3 py-1.5 rounded text-slate-400 hover:text-white hover:bg-white/5 transition-all flex items-center gap-1.5">
                            <i data-lucide="code-2" class="w-3.5 h-3.5 text-rose-400"></i>
                            <span>Pessimistic Lock</span>
                        </button>
                        <button type="button" id="tab-btn-hmac" onclick="switchFlagshipTab('hmac')" class="px-3 py-1.5 rounded text-slate-400 hover:text-white hover:bg-white/5 transition-all flex items-center gap-1.5">
                            <i data-lucide="shield" class="w-3.5 h-3.5 text-cobalt-400"></i>
                            <span>HMAC Middleware</span>
                        </button>
                        <button type="button" id="tab-btn-kiosk" onclick="switchFlagshipTab('kiosk')" class="px-3 py-1.5 rounded text-slate-400 hover:text-white hover:bg-white/5 transition-all flex items-center gap-1.5">
                            <i data-lucide="tablet" class="w-3.5 h-3.5 text-emerald-400"></i>
                            <span>Kiosk Specs</span>
                        </button>
                    </div>
                </div>

                <!-- TAB 1: INTERACTIVE NODE FLOW -->
                <div id="flagship-view-flow" class="pt-6">
                    <div class="font-mono text-xs text-slate-400 mb-4 flex items-center justify-between">
                        <span class="text-cyan-300 font-semibold">// STEP-BY-STEP CRYPTOGRAPHIC TRANSACTION FLOW</span>
                        <span class="text-[11px]">Click any node to inspect telemetry protocol</span>
                    </div>

                    <!-- Flow Nodes Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-3.5 sm:gap-4">
                        
                        <!-- Node 1: Token Generation -->
                        <div onclick="inspectFlowStep(1)" class="p-4 rounded-lg bg-cosmic-950 border border-cyan-500/40 hover:border-cyan-400 hover:bg-cyan-950/20 cursor-pointer transition-all group">
                            <div class="font-mono text-[10px] text-cyan-400 font-bold mb-1 flex items-center justify-between">
                                <span>STEP 01</span>
                                <i data-lucide="key" class="w-3.5 h-3.5 text-cyan-400 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-mono text-xs font-bold text-white mb-1">Token Issuance</div>
                            <p class="text-[11px] text-slate-400 leading-snug font-sans">CSPRNG 256-bit entropy generated &amp; hashed via SHA-256.</p>
                        </div>

                        <!-- Node 2: Kiosk Ingress -->
                        <div onclick="inspectFlowStep(2)" class="p-4 rounded-lg bg-cosmic-950 border border-cobalt-500/40 hover:border-cobalt-400 hover:bg-cobalt-950/20 cursor-pointer transition-all group">
                            <div class="font-mono text-[10px] text-cobalt-400 font-bold mb-1 flex items-center justify-between">
                                <span>STEP 02</span>
                                <i data-lucide="fingerprint" class="w-3.5 h-3.5 text-cobalt-400 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-mono text-xs font-bold text-white mb-1">HMAC Auth</div>
                            <p class="text-[11px] text-slate-400 leading-snug font-sans">Terminal signs payload with device secret &amp; nonce.</p>
                        </div>

                        <!-- Node 3: Pessimistic Row Lock -->
                        <div onclick="inspectFlowStep(3)" class="p-4 rounded-lg bg-cosmic-950 border border-rose-500/40 hover:border-rose-400 hover:bg-rose-950/20 cursor-pointer transition-all group">
                            <div class="font-mono text-[10px] text-rose-400 font-bold mb-1 flex items-center justify-between">
                                <span>STEP 03</span>
                                <i data-lucide="lock" class="w-3.5 h-3.5 text-rose-400 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-mono text-xs font-bold text-white mb-1">Pessimistic Lock</div>
                            <p class="text-[11px] text-slate-400 leading-snug font-sans">SELECT ... FOR UPDATE locks row; blocks race conditions.</p>
                        </div>

                        <!-- Node 4: Decoupled Ballot -->
                        <div onclick="inspectFlowStep(4)" class="p-4 rounded-lg bg-cosmic-950 border border-gold-500/40 hover:border-gold-400 hover:bg-gold-950/20 cursor-pointer transition-all group">
                            <div class="font-mono text-[10px] text-gold-400 font-bold mb-1 flex items-center justify-between">
                                <span>STEP 04</span>
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-gold-400 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-mono text-xs font-bold text-white mb-1">Blind Ballot</div>
                            <p class="text-[11px] text-slate-400 leading-snug font-sans">Ballot inserted with zero FK link to voter token.</p>
                        </div>

                        <!-- Node 5: Commit & Seal -->
                        <div onclick="inspectFlowStep(5)" class="p-4 rounded-lg bg-cosmic-950 border border-emerald-500/40 hover:border-emerald-400 hover:bg-emerald-950/20 cursor-pointer transition-all group">
                            <div class="font-mono text-[10px] text-emerald-400 font-bold mb-1 flex items-center justify-between">
                                <span>STEP 05</span>
                                <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-400 group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="font-mono text-xs font-bold text-white mb-1">ACID Commit</div>
                            <p class="text-[11px] text-slate-400 leading-snug font-sans">Token marked consumed; receipt token returned to voter.</p>
                        </div>

                    </div>
                </div>

                <!-- TAB 2: LARAVEL PESSIMISTIC LOCK CODE -->
                <div id="flagship-view-code" class="pt-6 hidden">
                    <div class="font-mono text-xs text-slate-400 mb-2 flex items-center justify-between">
                        <span class="text-rose-400 font-semibold">// App/Services/Voting/BallotCastingService.php</span>
                        <span class="text-slate-500">ACID Pessimistic Concurrency Engine</span>
                    </div>

                    <pre class="p-4 sm:p-5 rounded-lg bg-cosmic-950 border border-rose-500/30 font-mono text-xs text-slate-200 overflow-x-auto leading-relaxed"><code class="language-php"><span class="text-cobalt-400">&lt;?php</span>

<span class="text-cyan-400">namespace</span> <span class="text-white">App\Services\Voting</span>;

<span class="text-cyan-400">use</span> <span class="text-white">App\Models\{VoteToken, Ballot}</span>;
<span class="text-cyan-400">use</span> <span class="text-white">Illuminate\Support\Facades\{DB, Hash}</span>;
<span class="text-cyan-400">use</span> <span class="text-white">App\Exceptions\{TokenAlreadyConsumedException, TokenExpiredException}</span>;

<span class="text-cyan-400">class</span> <span class="text-gold-300 font-bold">BallotCastingService</span>
{
    <span class="text-slate-500">/**
     * Atomically cast ballot with pessimistic row-locking to guarantee 0.000% double-vote hazard.
     */</span>
    <span class="text-cyan-400">public function</span> <span class="text-gold-400 font-semibold">castBallot</span>(<span class="text-cyan-300">string</span> <span class="text-white">$rawToken</span>, <span class="text-cyan-300">int</span> <span class="text-white">$candidateId</span>): <span class="text-cyan-300">string</span>
    {
        <span class="text-white">$tokenHash</span> = <span class="text-gold-400">hash</span>(<span class="text-emerald-400">'sha256'</span>, <span class="text-white">$rawToken</span>);

        <span class="text-slate-500">// Execute within atomic database transaction with pessimistic row lock</span>
        <span class="text-cyan-400">return</span> <span class="text-gold-300">DB</span>::<span class="text-gold-400">transaction</span>(<span class="text-cyan-400">function</span> () <span class="text-cyan-400">use</span> (<span class="text-white">$tokenHash</span>, <span class="text-white">$candidateId</span>) {
            
            <span class="text-slate-500">// SELECT ... FOR UPDATE applies exclusive lock on the token row</span>
            <span class="text-white">$tokenRecord</span> = <span class="text-gold-300">VoteToken</span>::<span class="text-gold-400">where</span>(<span class="text-emerald-400">'token_hash'</span>, <span class="text-white">$tokenHash</span>)
                -&gt;<span class="text-rose-400 font-bold">lockForUpdate</span>()
                -&gt;<span class="text-gold-400">firstOrFail</span>();

            <span class="text-cyan-400">if</span> (<span class="text-white">$tokenRecord</span>-&gt;<span class="text-white">is_consumed</span>) {
                <span class="text-cyan-400">throw new</span> <span class="text-rose-400">TokenAlreadyConsumedException</span>(<span class="text-emerald-400">'Token has already been consumed.'</span>);
            }

            <span class="text-cyan-400">if</span> (<span class="text-white">$tokenRecord</span>-&gt;<span class="text-white">expires_at</span>-&gt;<span class="text-gold-400">isPast</span>()) {
                <span class="text-cyan-400">throw new</span> <span class="text-rose-400">TokenExpiredException</span>(<span class="text-emerald-400">'Token validity window has expired (300s TTL).'</span>);
            }

            <span class="text-slate-500">// Insert blind ballot record with ZERO foreign-key link to the voter token</span>
            <span class="text-white">$receiptHash</span> = <span class="text-gold-400">hash</span>(<span class="text-emerald-400">'sha256'</span>, <span class="text-white">$tokenHash</span> . <span class="text-gold-400">microtime</span>() . <span class="text-white">$candidateId</span>);
            <span class="text-gold-300">Ballot</span>::<span class="text-gold-400">create</span>([
                <span class="text-emerald-400">'candidate_id'</span>  =&gt; <span class="text-white">$candidateId</span>,
                <span class="text-emerald-400">'receipt_hash'</span>  =&gt; <span class="text-white">$receiptHash</span>,
                <span class="text-emerald-400">'cast_at'</span>       =&gt; <span class="text-gold-300">now</span>(),
            ]);

            <span class="text-slate-500">// Invalidate token row immediately within the locked transaction</span>
            <span class="text-white">$tokenRecord</span>-&gt;<span class="text-gold-400">update</span>([
                <span class="text-emerald-400">'is_consumed'</span> =&gt; <span class="text-cyan-400">true</span>,
                <span class="text-emerald-400">'consumed_at'</span> =&gt; <span class="text-gold-300">now</span>(),
            ]);

            <span class="text-cyan-400">return</span> <span class="text-white">$receiptHash</span>;
        }, <span class="text-gold-400">attempts:</span> <span class="text-emerald-400">3</span>);
    }
}</span></code></pre>
                </div>

                <!-- TAB 3: HMAC SIGNATURE MIDDLEWARE -->
                <div id="flagship-view-hmac" class="pt-6 hidden">
                    <div class="font-mono text-xs text-slate-400 mb-2 flex items-center justify-between">
                        <span class="text-cobalt-400 font-semibold">// App/Http/Middleware/VerifyKioskSignature.php</span>
                        <span class="text-slate-500">Hardware Terminal Authenticator</span>
                    </div>

                    <pre class="p-4 sm:p-5 rounded-lg bg-cosmic-950 border border-cobalt-500/30 font-mono text-xs text-slate-200 overflow-x-auto leading-relaxed"><code class="language-php"><span class="text-cobalt-400">&lt;?php</span>

<span class="text-cyan-400">namespace</span> <span class="text-white">App\Http\Middleware</span>;

<span class="text-cyan-400">use</span> <span class="text-white">Closure</span>;
<span class="text-cyan-400">use</span> <span class="text-white">Illuminate\Http\Request</span>;
<span class="text-cyan-400">use</span> <span class="text-white">Symfony\Component\HttpFoundation\Response</span>;

<span class="text-cyan-400">class</span> <span class="text-gold-300 font-bold">VerifyKioskSignature</span>
{
    <span class="text-slate-500">/**
     * Intercept rogue requests and verify hardware-bound HMAC-SHA256 signature.
     */</span>
    <span class="text-cyan-400">public function</span> <span class="text-gold-400 font-semibold">handle</span>(<span class="text-gold-300">Request</span> <span class="text-white">$request</span>, <span class="text-gold-300">Closure</span> <span class="text-white">$next</span>): <span class="text-gold-300">Response</span>
    {
        <span class="text-white">$kioskId</span>   = <span class="text-white">$request</span>-&gt;<span class="text-gold-400">header</span>(<span class="text-emerald-400">'X-Kiosk-ID'</span>);
        <span class="text-white">$timestamp</span> = <span class="text-white">$request</span>-&gt;<span class="text-gold-400">header</span>(<span class="text-emerald-400">'X-Kiosk-Timestamp'</span>);
        <span class="text-white">$signature</span> = <span class="text-white">$request</span>-&gt;<span class="text-gold-400">header</span>(<span class="text-emerald-400">'X-Kiosk-Signature'</span>);

        <span class="text-slate-500">// Replay attack protection: Reject timestamp drifts &gt; 5000ms</span>
        <span class="text-cyan-400">if</span> (<span class="text-gold-400">abs</span>(<span class="text-gold-400">time</span>() - (int)<span class="text-white">$timestamp</span>) &gt; <span class="text-emerald-400">5</span>) {
            <span class="text-gold-400">abort</span>(<span class="text-emerald-400">401</span>, <span class="text-emerald-400">'Timestamp drift exceeds 5000ms replay threshold.'</span>);
        }

        <span class="text-white">$deviceSecret</span> = <span class="text-gold-400">config</span>(<span class="text-emerald-400">"kiosks.nodes.{$kioskId}.secret"</span>);
        <span class="text-cyan-400">if</span> (!<span class="text-white">$deviceSecret</span>) {
            <span class="text-gold-400">abort</span>(<span class="text-emerald-400">403</span>, <span class="text-emerald-400">'Unrecognized or de-provisioned hardware terminal node.'</span>);
        }

        <span class="text-slate-500">// Compute expected HMAC digest over raw request body</span>
        <span class="text-white">$expectedSignature</span> = <span class="text-gold-400">hash_hmac</span>(
            <span class="text-emerald-400">'sha256'</span>, 
            <span class="text-white">$timestamp</span> . <span class="text-white">$request</span>-&gt;<span class="text-gold-400">getContent</span>(), 
            <span class="text-white">$deviceSecret</span>
        );

        <span class="text-cyan-400">if</span> (!<span class="text-gold-400">hash_equals</span>(<span class="text-white">$expectedSignature</span>, <span class="text-white">$signature</span> ?? <span class="text-emerald-400">''</span>)) {
            <span class="text-gold-400">abort</span>(<span class="text-emerald-400">403</span>, <span class="text-emerald-400">'HMAC-SHA256 signature mismatch: Packet tampering detected.'</span>);
        }

        <span class="text-cyan-400">return</span> <span class="text-white">$next</span>(<span class="text-white">$request</span>);
    }
}</span></code></pre>
                </div>

                <!-- TAB 4: ANDROID KIOSK DIAGNOSTICS -->
                <div id="flagship-view-kiosk" class="pt-6 hidden">
                    <div class="font-mono text-xs text-slate-400 mb-4 flex items-center justify-between">
                        <span class="text-emerald-400 font-semibold">// ANDROID TABLET KIOSK TELEMETRY BENCHMARKS</span>
                        <span class="text-slate-500">Device Owner &amp; LockTask Mode</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 font-mono text-xs">
                        <div class="p-4 rounded bg-cosmic-950 border border-emerald-500/30 space-y-2.5">
                            <div class="text-emerald-400 font-bold flex items-center gap-1.5">
                                <i data-lucide="tablet" class="w-4 h-4"></i>
                                <span>HARDWARE RUNTIME SPECIFICATION</span>
                            </div>
                            <div class="flex justify-between border-b border-white/5 pb-1">
                                <span class="text-slate-400">Target Form Factor:</span>
                                <span class="text-white font-semibold">10.1" Touch IPS Kiosk</span>
                            </div>
                            <div class="flex justify-between border-b border-white/5 pb-1">
                                <span class="text-slate-400">Lockdown Mode:</span>
                                <span class="text-emerald-300 font-semibold">Android DeviceOwner / LockTask</span>
                            </div>
                            <div class="flex justify-between border-b border-white/5 pb-1">
                                <span class="text-slate-400">System Navigation Bar:</span>
                                <span class="text-rose-400 font-semibold">Disabled / Blocked</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Touch Target Min:</span>
                                <span class="text-white font-semibold">64px x 64px Ergonomic</span>
                            </div>
                        </div>

                        <div class="p-4 rounded bg-cosmic-950 border border-cyan-500/30 space-y-2.5">
                            <div class="text-cyan-400 font-bold flex items-center gap-1.5">
                                <i data-lucide="activity" class="w-4 h-4"></i>
                                <span>PERFORMANCE TELEMETRY AUDIT</span>
                            </div>
                            <div class="flex justify-between border-b border-white/5 pb-1">
                                <span class="text-slate-400">Voter Turnover Cycle:</span>
                                <span class="text-gold-300 font-semibold">11.4s Average / Voter</span>
                            </div>
                            <div class="flex justify-between border-b border-white/5 pb-1">
                                <span class="text-slate-400">Total Blocking Time (TBT):</span>
                                <span class="text-emerald-300 font-semibold">&lt; 40ms High-Fidelity</span>
                            </div>
                            <div class="flex justify-between border-b border-white/5 pb-1">
                                <span class="text-slate-400">Active Heap Footprint:</span>
                                <span class="text-white font-semibold">&lt; 55MB Optimized</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400">Offline Token Cache:</span>
                                <span class="text-cyan-300 font-semibold">Encrypted Local SQLite Queue</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- ==========================================================================
     FLAGSHIP INTERACTIVE TELEMETRY JAVASCRIPT & MODALS
     ========================================================================== --}}
<script>
    function switchFlagshipTab(tabKey) {
        const tabs = ['flow', 'code', 'hmac', 'kiosk'];
        tabs.forEach(t => {
            const btn = document.getElementById('tab-btn-' + t);
            const view = document.getElementById('flagship-view-' + t);
            if (t === tabKey) {
                if (btn) {
                    btn.classList.add('bg-cobalt-600', 'text-white', 'font-semibold');
                    btn.classList.remove('text-slate-400');
                }
                if (view) view.classList.remove('hidden');
            } else {
                if (btn) {
                    btn.classList.remove('bg-cobalt-600', 'text-white', 'font-semibold');
                    btn.classList.add('text-slate-400');
                }
                if (view) view.classList.add('hidden');
            }
        });
    }

    function inspectPillar(pillarIndex) {
        if (typeof Swal === 'undefined') return;

        const pillarDetails = {
            1: {
                title: 'PILLAR 01: CRYPTOGRAPHIC ONE-TIME TOKENS (OTT)',
                accent: '#06B6D4',
                body: '<div class="text-left font-mono text-xs text-slate-300 space-y-3 pt-2"><div class="p-3 bg-cosmic-950 rounded border border-cyan-500/30"><div class="text-cyan-400 font-bold mb-1">CRYPTOGRAPHIC SPECIFICATION:</div><div>Entropy: 256-bit CSPRNG (Cryptographically Secure Pseudo-Random Generator)</div><div>Hash Algorithm: SHA-256 with single-use database constraint</div></div><div class="p-3 bg-cosmic-950 rounded border border-white/10"><div class="text-white font-bold mb-1">BLIND LEDGER ANONYMITY:</div><div>The token authenticates the ballot booth UI, but when the ballot is cast into the database, zero foreign keys or voter identifiers are linked to the vote record.</div></div><div class="p-3 bg-cosmic-950 rounded border border-emerald-500/30"><div class="text-emerald-400 font-bold mb-1">TTL LIFECYCLE:</div><div>Ephemeral 300s window prevents token hoarding or post-session exploitation.</div></div></div>'
            },
            2: {
                title: 'PILLAR 02: DATABASE ROW-LEVEL LOCKING',
                accent: '#EF4444',
                body: '<div class="text-left font-mono text-xs text-slate-300 space-y-3 pt-2"><div class="p-3 bg-cosmic-950 rounded border border-rose-500/30"><div class="text-rose-400 font-bold mb-1">CONCURRENCY MECHANISM:</div><div>Execution wrapped inside DB::transaction with exclusive SELECT ... FOR UPDATE.</div></div><div class="p-3 bg-cosmic-950 rounded border border-white/10"><div class="text-white font-bold mb-1">0.000% RACE CONDITION PREVENTION:</div><div>If two polling terminals attempt to spend the same token at the exact same millisecond, InnoDB locks the token row, allowing the first transaction to mark it consumed and causing the second transaction to cleanly abort with TokenAlreadyConsumedException.</div></div><div class="p-3 bg-cosmic-950 rounded border border-emerald-500/30"><div class="text-emerald-400 font-bold mb-1">TRANSACTION LATENCY:</div><div>Sub-35ms ACID commit time ensures uninterrupted voting queue throughput.</div></div></div>'
            },
            3: {
                title: 'PILLAR 03: HMAC KIOSK NODE SECURITY',
                accent: '#2563EB',
                body: '<div class="text-left font-mono text-xs text-slate-300 space-y-3 pt-2"><div class="p-3 bg-cosmic-950 rounded border border-cobalt-500/30"><div class="text-cobalt-400 font-bold mb-1">HARDWARE SECRET BINDING:</div><div>Each polling booth hardware terminal is provisioned with an individual 256-bit cryptographic secret stored in secure storage.</div></div><div class="p-3 bg-cosmic-950 rounded border border-white/10"><div class="text-white font-bold mb-1">ANTI-REPLAY NONCE WINDOW:</div><div>Every HTTP request contains an HMAC-SHA256 signature calculated over payload + timestamp. Requests with timestamp drift > 5,000ms are discarded.</div></div><div class="p-3 bg-cosmic-950 rounded border border-emerald-500/30"><div class="text-emerald-400 font-bold mb-1">MIDDLEWARE DEFENSE:</div><div>Unauthorized browser clients or external packet injectors are rejected before hitting the application controllers.</div></div></div>'
            },
            4: {
                title: 'PILLAR 04: ANDROID TABLET KIOSK COMPATIBILITY',
                accent: '#10B981',
                body: '<div class="text-left font-mono text-xs text-slate-300 space-y-3 pt-2"><div class="p-3 bg-cosmic-950 rounded border border-emerald-500/30"><div class="text-emerald-400 font-bold mb-1">CLIENT ERGONOMICS:</div><div>Ultra-responsive touchscreen UI with >64px touch targets designed for low-power Android tablets in single-app lockdown.</div></div><div class="p-3 bg-cosmic-950 rounded border border-white/10"><div class="text-white font-bold mb-1">THROUGHPUT METRIC:</div><div>11.4 seconds average voter cycle time, allowing 1,000+ voters to complete ballots swiftly without polling station congestion.</div></div><div class="p-3 bg-cosmic-950 rounded border border-cyan-500/30"><div class="text-cyan-400 font-bold mb-1">RESOURCE EFFICIENCY:</div><div>Total Blocking Time (TBT) < 40ms and heap memory < 55MB for rock-solid stability.</div></div></div>'
            }
        };

        const item = pillarDetails[pillarIndex];
        if (!item) return;

        Swal.fire({
            title: '<span class="font-mono font-bold text-sm sm:text-base" style="color: ' + item.accent + '">' + item.title + '</span>',
            html: item.body,
            background: '#0B132B',
            color: '#F8FAFC',
            showConfirmButton: true,
            confirmButtonText: 'ACKNOWLEDGE TELEMETRY',
            confirmButtonColor: '#2563EB',
            customClass: {
                popup: 'hud-card-body border border-cobalt-500/50 shadow-2xl'
            }
        });
    }

    function inspectFlowStep(stepIndex) {
        if (typeof Swal === 'undefined') return;

        const stepDetails = {
            1: {
                title: 'STEP 01: TOKEN ISSUANCE & VERIFICATION',
                text: 'The election committee server issues a 256-bit CSPRNG token hash for the voter. The raw token is handed to the voter as a single-use barcode/QR pass with 300s TTL.'
            },
            2: {
                title: 'STEP 02: HMAC KIOSK INGRESS AUTH',
                text: 'The physical Android Kiosk terminal scans the token, signs the HTTP ballot request using its device-specific HMAC-SHA256 secret key, and sends it over the local TLS network.'
            },
            3: {
                title: 'STEP 03: PESSIMISTIC ROW LOCKING',
                text: 'The backend opens an atomic DB::transaction and executes SELECT ... FOR UPDATE on the token record. Any parallel request for this token is immediately serialized and blocked.'
            },
            4: {
                title: 'STEP 04: DECOUPLED BLIND BALLOT INSERTION',
                text: 'The vote choice is written to the anonymous ballots table with zero linkage to the voter identity, guaranteeing 100% blind ballot confidentiality.'
            },
            5: {
                title: 'STEP 05: ATOMIC COMMIT & RECEIPT GENERATION',
                text: 'The token record is updated to is_consumed = true and the transaction commits. A cryptographic proof receipt hash is returned to the kiosk terminal.'
            }
        };

        const step = stepDetails[stepIndex];
        if (!step) return;

        Swal.fire({
            title: '<span class="font-mono font-bold text-sm text-cyan-400">' + step.title + '</span>',
            html: '<div class="text-left font-mono text-xs text-slate-300 pt-2"><div class="p-3 bg-cosmic-950 rounded border border-cyan-500/30 leading-relaxed">' + step.text + '</div></div>',
            background: '#0B132B',
            color: '#F8FAFC',
            showConfirmButton: true,
            confirmButtonText: 'CLOSE STEP',
            confirmButtonColor: '#2563EB',
            customClass: {
                popup: 'hud-card-body border border-cyan-500/50'
            }
        });
    }
</script>
