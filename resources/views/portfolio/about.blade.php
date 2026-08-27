@extends('layouts.portfolio')

@section('title', 'About // Raffa Nur Musyaffa — Backend Architect & Systems Engineer')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Section Header -->
    <div class="flex flex-col items-start space-y-3 mb-10 md:mb-12 animate-on-scroll">
        <div class="flex flex-wrap items-center gap-2">
            <span class="hud-badge text-xs text-cobalt-300 border-cobalt-500/40 bg-cosmic-900/80">
                <i data-lucide="user" class="w-3.5 h-3.5 text-cobalt-400"></i>
                <span>[01 // CANDIDATE DOSSIER]</span>
            </span>
            <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                // SCHOLARSHIP ASPIRANT, BACKEND ENGINEER &amp; MPK LEADER
            </span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
            Engineering Identity &amp; 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cobalt-400 via-cyan-400 to-emerald-400">
                Academic Trajectory
            </span>
        </h1>

        <p class="text-sm sm:text-base text-slate-300 font-sans max-w-3xl leading-relaxed">
            Detailed profile of Raffa Nur Musyaffa: Software Engineering scholar at SMKN 1 Depok, National Gold Medalist in Informatics, Class Rank 1 Parallel Standing, and parliamentary leader targeting Türkiye Bursları 2027 and top Indonesian State Universities (PTN).
        </p>
    </div>

    <!-- 12-Column Cyber-Telemetry Bento Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-16">
        
        <!-- Main Intro Card (Span 8) -->
        <div class="lg:col-span-8 hud-card group animate-on-scroll">
            <div class="hud-card-body p-6 sm:p-8 bg-cosmic-900/90 flex flex-col justify-between h-full border-t border-cobalt-500/30">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-cobalt-600/20 border border-cobalt-400/40 flex items-center justify-center text-cobalt-400">
                                <i data-lucide="terminal" class="w-5 h-5"></i>
                            </div>
                            <span class="font-mono text-xs font-bold text-slate-200 tracking-wider uppercase">Executive Overview</span>
                        </div>
                        <span class="hud-badge text-[10px] text-emerald-400 border-emerald-500/30 bg-cosmic-950">STATUS: ACTIVE</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-4">
                        High-Concurrency Backend Architect &amp; Systems Builder
                    </h3>

                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed mb-4">
                        Saya <span class="text-white font-semibold">Raffa Nur Musyaffa</span>, seorang siswa kelas 11 di <span class="text-white font-semibold">SMKN 1 Depok</span> jurusan Pengembangan Perangkat Lunak dan Gim (PPLG), peraih <span class="text-gold-400 font-semibold">National Gold Medal in Computer Science</span> dan pemegang <span class="text-gold-300 font-semibold">Peringkat 1 Paralel</span>.
                    </p>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Fokus utama saya adalah perancangan backend berkemampuan konkurensi tinggi, integritas data transaksional (ACID &amp; Row-Level Locking), verifikasi kriptografi token satu kali pakai (CSPRNG &amp; SHA-256), serta kepemimpinan parlemen sekolah melalui mandat 2 periode MPK (Majelis Perwakilan Kelas).
                    </p>
                </div>

                <div class="pt-6 mt-6 border-t border-white/10 flex flex-wrap items-center gap-3 font-mono text-xs text-slate-400">
                    <span class="flex items-center gap-1.5 text-cobalt-300">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-cobalt-400"></i>
                        <span>Depok, West Java, ID</span>
                    </span>
                    <span class="text-slate-600">◈</span>
                    <span class="flex items-center gap-1.5 text-gold-300">
                        <i data-lucide="trophy" class="w-3.5 h-3.5 text-gold-400"></i>
                        <span>Juara 1 Nasional Informatika</span>
                    </span>
                    <span class="text-slate-600">◈</span>
                    <span class="flex items-center gap-1.5 text-cyan-300">
                        <i data-lucide="languages" class="w-3.5 h-3.5 text-cyan-400"></i>
                        <span>TOEIC Certified</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Target & Quick Stats (Span 4) -->
        <div class="lg:col-span-4 flex flex-col gap-6">
            
            <!-- Target Card -->
            <div class="hud-card group animate-on-scroll flex-1">
                <div class="hud-card-body p-6 bg-cosmic-900/90 flex flex-col justify-between h-full border-t border-gold-500/40">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-8 h-8 rounded-lg bg-gold-500/20 border border-gold-400/40 flex items-center justify-center text-gold-400">
                                <i data-lucide="target" class="w-4 h-4"></i>
                            </div>
                            <span class="hud-badge text-[10px] text-gold-400 border-gold-500/30 bg-cosmic-950">HORIZON 2027</span>
                        </div>
                        <h4 class="text-base font-bold text-white mb-2">Global Scholarship Goal</h4>
                        <p class="text-xs text-slate-300 leading-relaxed mb-0">
                            Meraih beasiswa penuh <span class="text-gold-300 font-semibold">Türkiye Bursları</span> untuk program Sarjana Computer Science di universitas teknik terkemuka Turki (METU / ITU / Boğaziçi) serta jalur SNBP/SNBT di PTN terbaik Indonesia (UI / ITB).
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Telemetry Specs Card -->
            <div class="hud-card group animate-on-scroll flex-1">
                <div class="hud-card-body p-6 bg-cosmic-900/90 flex flex-col justify-between h-full border-t border-cyan-500/40">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-8 h-8 rounded-lg bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center text-cyan-400">
                                <i data-lucide="activity" class="w-4 h-4"></i>
                            </div>
                            <span class="hud-badge text-[10px] text-cyan-400 border-cyan-500/30 bg-cosmic-950">TELEMETRY</span>
                        </div>
                        <div class="space-y-2 font-mono text-xs">
                            <div class="flex justify-between items-center py-1 border-b border-white/5">
                                <span class="text-slate-400">Specialization:</span>
                                <span class="text-white font-medium">Backend Architecture</span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-white/5">
                                <span class="text-slate-400">Academic Standing:</span>
                                <span class="text-gold-400 font-bold">Rank #1 Parallel</span>
                            </div>
                            <div class="flex justify-between items-center py-1 border-b border-white/5">
                                <span class="text-slate-400">Parliamentary Role:</span>
                                <span class="text-cobalt-300 font-medium">MPK Presidium (2 Period)</span>
                            </div>
                            <div class="flex justify-between items-center py-1">
                                <span class="text-slate-400">English Standard:</span>
                                <span class="text-cyan-300 font-medium">ETS TOEIC (B2/C1)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Competencies & Focus Areas (Span 12) -->
        <div class="lg:col-span-12 hud-card group animate-on-scroll">
            <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-cobalt-500/30">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="sparkles" class="w-4 h-4 text-cobalt-400"></i>
                    <h4 class="font-mono text-xs font-bold text-slate-200 tracking-wider uppercase">Core Pillars &amp; Interdisciplinary Competencies</h4>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
                    <div class="p-3 rounded-lg bg-cosmic-950/80 border border-white/10 flex items-center gap-2 text-xs font-mono text-slate-200 hover:border-cobalt-500/40 transition-colors">
                        <i data-lucide="server" class="w-4 h-4 text-cobalt-400"></i>
                        <span>Backend Dev</span>
                    </div>
                    <div class="p-3 rounded-lg bg-cosmic-950/80 border border-white/10 flex items-center gap-2 text-xs font-mono text-slate-200 hover:border-cyan-500/40 transition-colors">
                        <i data-lucide="lock" class="w-4 h-4 text-cyan-400"></i>
                        <span>Cryptography</span>
                    </div>
                    <div class="p-3 rounded-lg bg-cosmic-950/80 border border-white/10 flex items-center gap-2 text-xs font-mono text-slate-200 hover:border-gold-500/40 transition-colors">
                        <i data-lucide="gavel" class="w-4 h-4 text-gold-400"></i>
                        <span>MPK Governance</span>
                    </div>
                    <div class="p-3 rounded-lg bg-cosmic-950/80 border border-white/10 flex items-center gap-2 text-xs font-mono text-slate-200 hover:border-emerald-500/40 transition-colors">
                        <i data-lucide="mic" class="w-4 h-4 text-emerald-400"></i>
                        <span>Public Speaking</span>
                    </div>
                    <div class="p-3 rounded-lg bg-cosmic-950/80 border border-white/10 flex items-center gap-2 text-xs font-mono text-slate-200 hover:border-purple-500/40 transition-colors">
                        <i data-lucide="box" class="w-4 h-4 text-purple-400"></i>
                        <span>Blender 3D</span>
                    </div>
                    <div class="p-3 rounded-lg bg-cosmic-950/80 border border-white/10 flex items-center gap-2 text-xs font-mono text-slate-200 hover:border-rose-500/40 transition-colors">
                        <i data-lucide="smartphone" class="w-4 h-4 text-rose-400"></i>
                        <span>Kotlin Native</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Education Timeline Section -->
    <div class="pt-8 border-t border-white/10">
        <div class="flex items-center gap-2 mb-8 animate-on-scroll">
            <span class="hud-badge text-xs text-gold-400 border-gold-500/40 bg-cosmic-900/80">
                <i data-lucide="graduation-cap" class="w-3.5 h-3.5 text-gold-400"></i>
                <span>[02 // ACADEMIC TIMELINE]</span>
            </span>
            <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                // FORMAL EDUCATION &amp; VOCATIONAL SPECIALIZATION
            </span>
        </div>

        <div class="space-y-6 max-w-4xl mx-auto">
            @forelse($educations as $education)
            <div class="hud-card animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-l-2 border-l-cobalt-500 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 font-mono text-xs text-gold-400">
                            <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                            <span>{{ $education->start_year }} — {{ $education->end_year ?? 'Present' }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">{{ $education->institution }}</h3>
                        <div class="text-sm font-medium text-cobalt-300">{{ $education->degree }} • {{ $education->field_of_study }}</div>
                        @if($education->description)
                        <p class="text-xs text-slate-400 pt-1 leading-relaxed">{{ $education->description }}</p>
                        @endif
                    </div>
                    <div class="flex sm:flex-col items-end justify-between sm:justify-center">
                        <span class="hud-badge text-[10px] text-emerald-400 border-emerald-500/30 bg-cosmic-950">[VERIFIED]</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="hud-card animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-l-2 border-l-cobalt-500 space-y-1">
                    <div class="flex items-center gap-2 font-mono text-xs text-gold-400">
                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        <span>2023 — 2026 (Expected)</span>
                    </div>
                    <h3 class="text-lg font-bold text-white">SMKN 1 Depok</h3>
                    <div class="text-sm font-medium text-cobalt-300">Vocational High School • Pengembangan Perangkat Lunak &amp; Gim (PPLG)</div>
                    <p class="text-xs text-slate-400 pt-1 leading-relaxed">
                        Top parallel student (Rank #1 Parallel). Specializing in backend software development, database design, enterprise software architecture, and competitive informatics.
                    </p>
                </div>
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
