<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Raffa Nur Musyaffa — Backend Architect & Systems Engineer | Cyber-Telemetry Cockpit')</title>

    <!-- Meta Telemetry SEO & Verification -->
    <meta name="description" content="Official Cyber-Telemetry Portfolio of Raffa Nur Musyaffa (SMKN 1 Depok - PPLG). High-concurrency Backend Architect, National Gold Medal in Computer Science, Rank 1 Parallel, E-Voting Kiosk TPS Architect, and Türkiye Bursları 2027 Candidate.">
    <meta name="keywords" content="Raffa Nur Musyaffa, Backend Developer, Systems Engineer, Laravel, Kotlin, E-Voting TPS, Türkiye Bursları, PPLG, SMKN 1 Depok, Gold Medal Computer Science">
    <meta name="author" content="Raffa Nur Musyaffa">
    <meta name="theme-color" content="#080D1A">

    <!-- Cyber-Telemetry Typography (Plus Jakarta Sans, JetBrains Mono, Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite Compiled Assets (Tailwind CSS v4 & JS Engine) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Official Lucide Icons System (Zero-Emoji Vector Policy) -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- SweetAlert2 Modal Notifications Engine -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('styles')
</head>

<body class="bg-cosmic-950 text-slate-100 min-h-screen flex flex-col relative overflow-x-hidden selection:bg-cobalt-600 selection:text-white font-sans antialiased">

    <!-- ==========================================================================
         BACKGROUND TELEMETRY MESH & CRT SCANLINE OVERLAYS
         ========================================================================== -->
    <div id="telemetry-grid" class="fixed inset-0 pointer-events-none telemetry-grid opacity-70 z-0" aria-hidden="true"></div>
    <div class="fixed inset-0 pointer-events-none telemetry-scanline opacity-35 z-0" aria-hidden="true"></div>

    <!-- Ambient Radial Atmospheric Orbs -->
    <div class="fixed -top-32 -left-32 w-96 h-96 cobalt-orb opacity-35 z-0" aria-hidden="true"></div>
    <div class="fixed top-1/3 -right-32 w-96 h-96 gold-orb opacity-20 z-0" aria-hidden="true"></div>
    <div class="fixed -bottom-32 left-1/4 w-96 h-96 cyan-orb opacity-20 z-0" aria-hidden="true"></div>

    <!-- ==========================================================================
         FLOATING GLASS HUD NAVIGATION CAPSULE (DESKTOP & TABLET)
         ========================================================================== -->
    <header class="fixed top-3 md:top-6 left-0 right-0 z-50 flex justify-center px-3 sm:px-6 pointer-events-none">
        <nav id="hud-navigation" class="hud-nav hud-nav-desktop pointer-events-auto w-full max-w-6xl backdrop-blur-2xl bg-cosmic-900/85 border border-white/10 rounded-full px-3.5 sm:px-5 py-2 sm:py-2.5 shadow-2xl shadow-black/80 flex items-center justify-between gap-2 md:gap-4 transition-all duration-300 hover:border-cobalt-500/40">
            
            <!-- Left: Brand Monogram & Live Telemetry Radar Beacon -->
            <div class="flex items-center gap-3">
                <a href="{{ route('portfolio.home') }}" class="flex items-center gap-2.5 text-decoration-none group">
                    <div class="hud-chamfer-sm w-8 h-8 sm:w-9 sm:h-9 bg-gradient-to-br from-cobalt-600 to-cobalt-800 border border-cobalt-400/50 flex items-center justify-center font-mono font-bold text-white text-sm shadow-md shadow-cobalt-600/30 group-hover:from-cobalt-500 group-hover:to-cyan-500 transition-all">
                        R
                    </div>
                    <div class="flex flex-col">
                        <span class="font-mono font-bold text-xs sm:text-sm tracking-wider text-white group-hover:text-cobalt-300 transition-colors flex items-center gap-1">
                            RNM<span class="text-cobalt-500 font-extrabold">.SYS</span>
                        </span>
                        <span class="font-mono text-[9px] text-slate-400 tracking-tight hidden sm:inline">COCKPIT v2026</span>
                    </div>
                </a>

                <!-- Live Radar Status Beacon Ribbon -->
                <div class="hidden md:flex items-center gap-2 px-2.5 py-1 rounded-full bg-cosmic-950/80 border border-white/10 font-mono text-[10px] tracking-wider text-slate-300">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-radar-pulse absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="text-emerald-400 font-semibold">STATUS:</span>
                    <span class="text-slate-300 font-medium">OPERATIONAL // RESEARCH & ENGINEERING</span>
                </div>
            </div>

            <!-- Center: Primary Section Navigation Matrix -->
            <div class="hidden lg:flex items-center gap-1 font-mono text-xs">
                <a href="{{ Request::routeIs('portfolio.home') ? '#hero' : route('portfolio.home') . '#hero' }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5 {{ Request::routeIs('portfolio.home') ? 'bg-cobalt-600/20 text-cobalt-300 border-cobalt-500/30' : '' }}">
                    <i data-lucide="terminal" class="w-3.5 h-3.5 text-cobalt-400"></i>
                    <span>Cockpit</span>
                </a>
                <a href="{{ Request::routeIs('portfolio.home') ? '#honors' : route('portfolio.home') . '#honors' }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5 {{ Request::routeIs('portfolio.about') ? 'bg-gold-500/20 text-gold-300 border-gold-500/30' : '' }}">
                    <i data-lucide="trophy" class="w-3.5 h-3.5 text-gold-400"></i>
                    <span>Honors</span>
                </a>
                <a href="{{ Request::routeIs('portfolio.home') ? '#flagship' : route('portfolio.home') . '#flagship' }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5">
                    <i data-lucide="shield-check" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>E-Vote TPS</span>
                </a>
                <a href="{{ Request::routeIs('portfolio.home') ? '#experience' : route('portfolio.home') . '#experience' }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5 {{ Request::routeIs('portfolio.experience') ? 'bg-cobalt-600/20 text-cobalt-300 border-cobalt-500/30' : '' }}">
                    <i data-lucide="building-2" class="w-3.5 h-3.5 text-cobalt-400"></i>
                    <span>Experience</span>
                </a>
                <a href="{{ Request::routeIs('portfolio.home') ? '#projects' : route('portfolio.home') . '#projects' }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5">
                    <i data-lucide="code-2" class="w-3.5 h-3.5 text-cobalt-400"></i>
                    <span>Arsenal</span>
                </a>
                <a href="{{ Request::routeIs('portfolio.home') ? '#toolkit' : route('portfolio.home') . '#toolkit' }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5 {{ Request::routeIs('portfolio.skills') ? 'bg-cobalt-600/20 text-cobalt-300 border-cobalt-500/30' : '' }}">
                    <i data-lucide="cpu" class="w-3.5 h-3.5 text-cyan-400"></i>
                    <span>Toolkit</span>
                </a>
                <a href="{{ Request::routeIs('portfolio.home') ? '#guestbook' : route('portfolio.guestbook') }}" 
                   class="px-3 py-1.5 rounded-full text-slate-300 hover:text-white hover:bg-white/5 border border-transparent hover:border-white/10 transition-all flex items-center gap-1.5 {{ Request::routeIs('portfolio.guestbook') ? 'bg-cobalt-600/20 text-cobalt-300 border-cobalt-500/30' : '' }}">
                    <i data-lucide="send" class="w-3.5 h-3.5 text-emerald-400"></i>
                    <span>Connect</span>
                </a>
            </div>

            <!-- Right: Trophy Gold Quick CV Download Action -->
            <div class="flex items-center gap-2">
                <a href="{{ asset('files/CV .pdf') }}" download 
                   class="hud-chamfer-sm inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 text-xs font-mono font-bold tracking-wider text-cosmic-950 bg-gradient-to-r from-gold-400 via-gold-300 to-gold-500 hover:from-gold-300 hover:to-gold-400 border border-gold-300 shadow-md shadow-gold-500/25 transition-all hover:scale-105 active:scale-95 text-decoration-none"
                   title="Download Official Curriculum Vitae (PDF)">
                    <i data-lucide="file-down" class="w-3.5 h-3.5 text-cosmic-950"></i>
                    <span>CV.PDF</span>
                </a>
            </div>
        </nav>
    </header>

    <!-- ==========================================================================
         MOBILE FLOATING BOTTOM HUD NAVIGATION (TOUCH TARGETS >= 44px)
         ========================================================================== -->
    <nav id="hud-navigation-mobile" class="hud-nav hud-nav-mobile fixed bottom-3 left-3 right-3 z-50 lg:hidden flex justify-center pointer-events-none">
        <div class="hud-nav-capsule pointer-events-auto w-full max-w-md backdrop-blur-2xl bg-cosmic-900/90 border border-white/10 rounded-2xl px-1.5 py-1.5 shadow-2xl shadow-black/90 flex items-center justify-around">
            
            <a href="{{ Request::routeIs('portfolio.home') ? '#hero' : route('portfolio.home') . '#hero' }}" 
               class="min-w-[54px] min-h-[46px] flex flex-col items-center justify-center rounded-xl p-1 text-slate-400 hover:text-white hover:bg-white/5 transition-all {{ Request::routeIs('portfolio.home') ? 'text-cobalt-400 bg-cobalt-600/15' : '' }}">
                <i data-lucide="terminal" class="w-4 h-4 mb-0.5"></i>
                <span class="text-[9px] font-mono font-medium tracking-tight">Cockpit</span>
            </a>

            <a href="{{ Request::routeIs('portfolio.home') ? '#honors' : route('portfolio.home') . '#honors' }}" 
               class="min-w-[54px] min-h-[46px] flex flex-col items-center justify-center rounded-xl p-1 text-slate-400 hover:text-white hover:bg-white/5 transition-all">
                <i data-lucide="trophy" class="w-4 h-4 mb-0.5 text-gold-400"></i>
                <span class="text-[9px] font-mono font-medium tracking-tight">Honors</span>
            </a>

            <a href="{{ Request::routeIs('portfolio.home') ? '#flagship' : route('portfolio.home') . '#flagship' }}" 
               class="min-w-[54px] min-h-[46px] flex flex-col items-center justify-center rounded-xl p-1 text-slate-400 hover:text-white hover:bg-white/5 transition-all">
                <i data-lucide="shield-check" class="w-4 h-4 mb-0.5 text-cyan-400"></i>
                <span class="text-[9px] font-mono font-medium tracking-tight">E-Vote</span>
            </a>

            <a href="{{ Request::routeIs('portfolio.home') ? '#projects' : route('portfolio.home') . '#projects' }}" 
               class="min-w-[54px] min-h-[46px] flex flex-col items-center justify-center rounded-xl p-1 text-slate-400 hover:text-white hover:bg-white/5 transition-all">
                <i data-lucide="code-2" class="w-4 h-4 mb-0.5 text-cobalt-400"></i>
                <span class="text-[9px] font-mono font-medium tracking-tight">Arsenal</span>
            </a>

            <a href="{{ Request::routeIs('portfolio.home') ? '#guestbook' : route('portfolio.guestbook') }}" 
               class="min-w-[54px] min-h-[46px] flex flex-col items-center justify-center rounded-xl p-1 text-slate-400 hover:text-white hover:bg-white/5 transition-all {{ Request::routeIs('portfolio.guestbook') ? 'text-emerald-400 bg-emerald-600/15' : '' }}">
                <i data-lucide="send" class="w-4 h-4 mb-0.5 text-emerald-400"></i>
                <span class="text-[9px] font-mono font-medium tracking-tight">Connect</span>
            </a>
        </div>
    </nav>

    <!-- ==========================================================================
         MAIN COCKPIT VIEWPORT
         ========================================================================== -->
    <main id="cockpit-content" class="flex-grow pt-20 md:pt-28 pb-24 lg:pb-12 z-10 relative">
        <div class="page-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- ==========================================================================
         COMMAND CENTER TELEMETRY FOOTER & INFINITE MARQUEE
         ========================================================================== -->
    @hasSection('footer')
        @yield('footer')
    @else
        <footer id="command-footer" class="border-t border-cobalt-600/20 bg-cosmic-900/60 backdrop-blur-xl relative z-10">
            <!-- Double-Buffered Kinetic Telemetry Marquee Ticker -->
            <div class="telemetry-marquee-container">
                <div class="telemetry-marquee-track font-mono text-xs tracking-widest text-slate-300 flex items-center gap-6">
                    <span class="text-emerald-400 font-bold flex items-center gap-1.5"><i data-lucide="radio" class="w-3.5 h-3.5 text-emerald-400"></i> [SYS_STATUS: 100% NOMINAL]</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-white font-semibold">RAFFA NUR MUSYAFFA</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-cobalt-400 font-medium">BACKEND ARCHITECT & SYSTEMS ENGINEER</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-gold-400 font-semibold flex items-center gap-1"><i data-lucide="trophy" class="w-3.5 h-3.5 text-gold-400"></i> NATIONAL GOLD MEDAL IN COMPUTER SCIENCE</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-gold-300 font-medium flex items-center gap-1"><i data-lucide="crown" class="w-3.5 h-3.5 text-gold-300"></i> CLASS RANK 1 PARALLEL (PPLG)</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-cyan-400 font-medium flex items-center gap-1"><i data-lucide="languages" class="w-3.5 h-3.5 text-cyan-400"></i> OFFICIAL TOEIC CERTIFIED</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-cobalt-300 font-medium flex items-center gap-1"><i data-lucide="shield-check" class="w-3.5 h-3.5 text-cobalt-300"></i> COMMERCIAL E-VOTING KIOSK TPS</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-rose-400 font-medium flex items-center gap-1"><i data-lucide="lock" class="w-3.5 h-3.5 text-rose-400"></i> ACID ROW-LOCKING CONCURRENCY</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-gold-400 font-semibold flex items-center gap-1"><i data-lucide="milestone" class="w-3.5 h-3.5 text-gold-400"></i> TÜRKİYE BURSLARI 2027 CANDIDATE</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-emerald-400 font-medium">LATENCY &lt; 20MS</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-slate-400 font-medium">ZERO-EMOJI RIGOR</span>
                    <span class="text-slate-600">◈</span>

                    <!-- Duplicate Buffer for Seamless Loop -->
                    <span class="text-emerald-400 font-bold flex items-center gap-1.5"><i data-lucide="radio" class="w-3.5 h-3.5 text-emerald-400"></i> [SYS_STATUS: 100% NOMINAL]</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-white font-semibold">RAFFA NUR MUSYAFFA</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-cobalt-400 font-medium">BACKEND ARCHITECT & SYSTEMS ENGINEER</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-gold-400 font-semibold flex items-center gap-1"><i data-lucide="trophy" class="w-3.5 h-3.5 text-gold-400"></i> NATIONAL GOLD MEDAL IN COMPUTER SCIENCE</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-gold-300 font-medium flex items-center gap-1"><i data-lucide="crown" class="w-3.5 h-3.5 text-gold-300"></i> CLASS RANK 1 PARALLEL (PPLG)</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-cyan-400 font-medium flex items-center gap-1"><i data-lucide="languages" class="w-3.5 h-3.5 text-cyan-400"></i> OFFICIAL TOEIC CERTIFIED</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-cobalt-300 font-medium flex items-center gap-1"><i data-lucide="shield-check" class="w-3.5 h-3.5 text-cobalt-300"></i> COMMERCIAL E-VOTING KIOSK TPS</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-rose-400 font-medium flex items-center gap-1"><i data-lucide="lock" class="w-3.5 h-3.5 text-rose-400"></i> ACID ROW-LOCKING CONCURRENCY</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-gold-400 font-semibold flex items-center gap-1"><i data-lucide="milestone" class="w-3.5 h-3.5 text-gold-400"></i> TÜRKİYE BURSLARI 2027 CANDIDATE</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-emerald-400 font-medium">LATENCY &lt; 20MS</span>
                    <span class="text-slate-600">◈</span>
                    <span class="text-slate-400 font-medium">ZERO-EMOJI RIGOR</span>
                    <span class="text-slate-600">◈</span>
                </div>
            </div>

            <!-- Footer Command Center Telemetry Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    
                    <!-- Left: Identity & Status -->
                    <div class="flex flex-col items-center md:items-start text-center md:text-left">
                        <div class="flex items-center gap-2 font-mono text-sm font-bold text-white mb-1">
                            <span class="hud-chamfer-sm px-2 py-0.5 bg-cobalt-600 text-[11px]">RNM.SYS</span>
                            <span>Raffa Nur Musyaffa</span>
                        </div>
                        <p class="font-mono text-xs text-slate-400 mb-0">
                            SMKN 1 Depok — Software Engineering (PPLG) // Systems & Backend Architect
                        </p>
                    </div>

                    <!-- Center: Direct Telemetry Contact Channels -->
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/6288214156641" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-xl bg-cosmic-800/80 hover:bg-emerald-600/20 border border-white/10 hover:border-emerald-500/50 flex items-center justify-center text-slate-300 hover:text-emerald-400 transition-all shadow-sm group"
                           title="WhatsApp Telemetry Channel">
                            <i data-lucide="message-square" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                        </a>
                        <a href="mailto:raffa.nur.musyaffa@gmail.com" 
                           class="w-10 h-10 rounded-xl bg-cosmic-800/80 hover:bg-cyan-600/20 border border-white/10 hover:border-cyan-500/50 flex items-center justify-center text-slate-300 hover:text-cyan-400 transition-all shadow-sm group"
                           title="Direct Email Dispatch">
                            <i data-lucide="mail" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                        </a>
                        <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-xl bg-cosmic-800/80 hover:bg-cobalt-600/20 border border-white/10 hover:border-cobalt-500/50 flex items-center justify-center text-slate-300 hover:text-cobalt-400 transition-all shadow-sm group"
                           title="GitHub Repository Command">
                            <i data-lucide="github" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                        </a>
                        <a href="https://www.instagram.com/rrapskuy/" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 rounded-xl bg-cosmic-800/80 hover:bg-pink-600/20 border border-white/10 hover:border-pink-500/50 flex items-center justify-center text-slate-300 hover:text-pink-400 transition-all shadow-sm group"
                           title="Instagram Profile">
                            <i data-lucide="instagram" class="w-4 h-4 group-hover:scale-110 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Right: Build Signature & Copyright -->
                    <div class="flex flex-col items-center md:items-end text-center md:text-right font-mono text-xs text-slate-400">
                        <div class="flex items-center gap-1 text-slate-300 font-semibold mb-1">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
                            <span>ZERO-EMOJI SPEC CERTIFIED</span>
                        </div>
                        <span>&copy; {{ date('Y') }} Raffa Nur Musyaffa. All Rights Reserved.</span>
                    </div>
                </div>
            </div>
        </footer>
    @endif

    <!-- ==========================================================================
         TELEMETRY INITIALIZATION SCRIPTS
         ========================================================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Render Lucide Vector Icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Scroll Animation Observer
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            if (animatedElements.length > 0) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.08,
                    rootMargin: '0px 0px -40px 0px'
                });

                animatedElements.forEach(el => observer.observe(el));
            }

            // Cyber-Telemetry SweetAlert2 Toast Engine
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                background: '#0B132B',
                color: '#F8FAFC',
                customClass: {
                    popup: 'hud-card-body border border-cobalt-500/40 font-mono text-xs'
                },
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

            @if(session('success_guestbook'))
                Toast.fire({
                    icon: 'success',
                    title: "{!! addslashes(session('success_guestbook')) !!}"
                });
            @endif

            @if($errors->any())
                Toast.fire({
                    icon: 'error',
                    title: "{!! addslashes($errors->first()) !!}"
                });
            @endif
        });
    </script>

    @yield('scripts')
</body>
</html>
