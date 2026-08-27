@extends('layouts.portfolio')

@section('title', 'Toolkit & Skills // Raffa Nur Musyaffa — Backend Architect')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Section Header -->
    <div class="flex flex-col items-start space-y-3 mb-10 md:mb-12 animate-on-scroll">
        <div class="flex flex-wrap items-center gap-2">
            <span class="hud-badge text-xs text-cyan-300 border-cyan-500/40 bg-cosmic-900/80">
                <i data-lucide="cpu" class="w-3.5 h-3.5 text-cyan-400"></i>
                <span>[01 // TECHNICAL TOOLKIT]</span>
            </span>
            <span class="font-mono text-[11px] text-slate-400 tracking-wider hidden sm:inline">
                // SYSTEM CAPABILITIES, PROTOCOLS &amp; SOFTWARE STACK
            </span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
            Technical Arsenal &amp; 
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-cobalt-400 to-indigo-400">
                Core Competencies
            </span>
        </h1>

        <p class="text-sm sm:text-base text-slate-300 font-sans max-w-3xl leading-relaxed">
            Exhaustive inventory of backend engineering technologies, database concurrency mechanisms, cryptographic security patterns, and software development tooling.
        </p>
    </div>

    <!-- Hard Skills (Systems & Backend) Grid -->
    <div class="mb-14">
        <div class="flex items-center gap-2 mb-6 animate-on-scroll">
            <i data-lucide="server" class="w-4 h-4 text-cobalt-400"></i>
            <h2 class="font-mono text-sm font-bold text-slate-200 tracking-wider uppercase">Hard Skills // Systems &amp; Engineering</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($hardSkills as $skill)
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 flex flex-col justify-between h-full border-t border-cobalt-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">{{ $skill->name }}</span>
                        <span class="hud-badge text-[11px] text-cobalt-300 border-cobalt-500/40 bg-cosmic-950 font-mono">{{ $skill->proficiency }}%</span>
                    </div>

                    <!-- Progress Bar -->
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-cobalt-500 to-cyan-400 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Fallback Hard Skills -->
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-cobalt-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">PHP 8.3 &amp; Laravel 11/12</span>
                        <span class="hud-badge text-[11px] text-cobalt-300 border-cobalt-500/40 bg-cosmic-950 font-mono">95%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-cobalt-500 to-cyan-400 h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
            </div>
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-cobalt-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">MySQL / Pessimistic Row-Locking</span>
                        <span class="hud-badge text-[11px] text-cobalt-300 border-cobalt-500/40 bg-cosmic-950 font-mono">92%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-cobalt-500 to-cyan-400 h-2 rounded-full" style="width: 92%"></div>
                    </div>
                </div>
            </div>
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-cobalt-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">Kotlin Android &amp; SQLite Room</span>
                        <span class="hud-badge text-[11px] text-cobalt-300 border-cobalt-500/40 bg-cosmic-950 font-mono">88%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-cobalt-500 to-cyan-400 h-2 rounded-full" style="width: 88%"></div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Soft Skills (Leadership & Communication) -->
    <div class="mb-14">
        <div class="flex items-center gap-2 mb-6 animate-on-scroll">
            <i data-lucide="users" class="w-4 h-4 text-gold-400"></i>
            <h2 class="font-mono text-sm font-bold text-slate-200 tracking-wider uppercase">Soft Skills // Leadership &amp; Governance</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($softSkills as $skill)
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 flex flex-col justify-between h-full border-t border-gold-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">{{ $skill->name }}</span>
                        <span class="hud-badge text-[11px] text-gold-300 border-gold-500/40 bg-cosmic-950 font-mono">{{ $skill->proficiency }}%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-gold-500 to-amber-400 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                </div>
            </div>
            @empty
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-gold-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">Parliamentary Leadership (MPK)</span>
                        <span class="hud-badge text-[11px] text-gold-300 border-gold-500/40 bg-cosmic-950 font-mono">95%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-gold-500 to-amber-400 h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
            </div>
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-gold-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">Public Speaking &amp; Moderator</span>
                        <span class="hud-badge text-[11px] text-gold-300 border-gold-500/40 bg-cosmic-950 font-mono">90%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-gold-500 to-amber-400 h-2 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
            </div>
            <div class="hud-card group animate-on-scroll">
                <div class="hud-card-body p-6 bg-cosmic-900/90 border-t border-gold-500/30">
                    <div class="flex items-center justify-between mb-4">
                        <span class="font-bold text-white text-base">Cross-Team Collaboration</span>
                        <span class="hud-badge text-[11px] text-gold-300 border-gold-500/40 bg-cosmic-950 font-mono">92%</span>
                    </div>
                    <div class="w-full bg-cosmic-950 rounded-full h-2 overflow-hidden border border-white/10">
                        <div class="bg-gradient-to-r from-gold-500 to-amber-400 h-2 rounded-full" style="width: 92%"></div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Development Tools & Software Matrix -->
    <div class="pt-8 border-t border-white/10">
        <div class="flex items-center gap-2 mb-6 animate-on-scroll">
            <i data-lucide="wrench" class="w-4 h-4 text-cyan-400"></i>
            <h2 class="font-mono text-sm font-bold text-slate-200 tracking-wider uppercase">Toolchain &amp; Engineering Software</h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            <div class="p-4 rounded-xl bg-cosmic-900/80 border border-white/10 flex flex-col items-center justify-center gap-2 text-center hover:border-cobalt-500/40 transition-all group">
                <i data-lucide="code" class="w-7 h-7 text-cobalt-400 group-hover:scale-110 transition-transform"></i>
                <span class="font-mono text-xs font-semibold text-white">VS Code</span>
            </div>
            <div class="p-4 rounded-xl bg-cosmic-900/80 border border-white/10 flex flex-col items-center justify-center gap-2 text-center hover:border-cobalt-500/40 transition-all group">
                <i data-lucide="github" class="w-7 h-7 text-cobalt-400 group-hover:scale-110 transition-transform"></i>
                <span class="font-mono text-xs font-semibold text-white">Git &amp; GitHub</span>
            </div>
            <div class="p-4 rounded-xl bg-cosmic-900/80 border border-white/10 flex flex-col items-center justify-center gap-2 text-center hover:border-cyan-500/40 transition-all group">
                <i data-lucide="smartphone" class="w-7 h-7 text-cyan-400 group-hover:scale-110 transition-transform"></i>
                <span class="font-mono text-xs font-semibold text-white">Android Studio</span>
            </div>
            <div class="p-4 rounded-xl bg-cosmic-900/80 border border-white/10 flex flex-col items-center justify-center gap-2 text-center hover:border-gold-500/40 transition-all group">
                <i data-lucide="box" class="w-7 h-7 text-gold-400 group-hover:scale-110 transition-transform"></i>
                <span class="font-mono text-xs font-semibold text-white">Blender 3D</span>
            </div>
            <div class="p-4 rounded-xl bg-cosmic-900/80 border border-white/10 flex flex-col items-center justify-center gap-2 text-center hover:border-purple-500/40 transition-all group">
                <i data-lucide="figma" class="w-7 h-7 text-purple-400 group-hover:scale-110 transition-transform"></i>
                <span class="font-mono text-xs font-semibold text-white">Figma</span>
            </div>
            <div class="p-4 rounded-xl bg-cosmic-900/80 border border-white/10 flex flex-col items-center justify-center gap-2 text-center hover:border-emerald-500/40 transition-all group">
                <i data-lucide="send" class="w-7 h-7 text-emerald-400 group-hover:scale-110 transition-transform"></i>
                <span class="font-mono text-xs font-semibold text-white">Postman</span>
            </div>
        </div>
    </div>

</div>
@endsection
