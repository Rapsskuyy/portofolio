<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Raffa Nur Musyaffa — Backend Architect & Systems Engineer')</title>

    <meta name="description" content="Portfolio of Raffa Nur Musyaffa. Backend Architect, National Gold Medalist in Informatics, E-Voting Kiosk TPS Architect, and Türkiye Bursları 2027 Candidate.">
    <meta name="author" content="Raffa Nur Musyaffa">
    <meta name="theme-color" content="#09090b">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --void:    #09090b;
            --surface: #0f0f12;
            --panel:   #18181b;
            --border:  #27272a;
            --muted:   #52525b;
            --dim:     #a1a1aa;
            --hi:      #fafafa;
            --accent:  #4f46e5;
            --accent-l:#818cf8;
            --ok:      #22c55e;
            --warn:    #ca8a04;
            --err:     #ef4444;
        }

        html { scroll-behavior: smooth; scroll-padding-top: 80px; background: var(--void); }

        body {
            background: var(--void);
            color: var(--hi);
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        a { color: inherit; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--void); }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 2px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--accent); }

        /* ── NAV ── */
        .p-nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            height: 60px;
            display: flex; align-items: center;
            background: rgba(9,9,11,0.88);
            border-bottom: 1px solid #1c1c1f;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transition: border-color .25s, background .25s;
        }
        .p-nav.scrolled { background: rgba(9,9,11,1); border-bottom-color: var(--border); }

        .p-nav-inner {
            max-width: 1280px; margin: 0 auto; padding: 0 28px;
            width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 20px;
        }

        .p-logo {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700; font-size: 0.9rem; letter-spacing: -0.01em;
            color: var(--hi); text-decoration: none;
            display: flex; align-items: center; gap: 9px;
            flex-shrink: 0;
            transition: opacity .2s;
        }
        .p-logo:hover { opacity: 0.65; }
        .p-logo-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent); flex-shrink: 0; }

        .p-nav-links { display: flex; align-items: center; gap: 0; }

        .p-nav-link {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.68rem; font-weight: 500;
            letter-spacing: 0.07em; text-transform: uppercase;
            color: #52525b; text-decoration: none;
            padding: 6px 11px; border-radius: 4px;
            transition: color .2s;
            white-space: nowrap;
        }
        .p-nav-link:hover { color: var(--dim); }
        .p-nav-link.active { color: var(--hi); }

        .p-nav-right { display: flex; align-items: center; gap: 18px; flex-shrink: 0; }

        .p-status {
            display: flex; align-items: center; gap: 7px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase; color: #3f3f46;
        }

        .status-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--ok); flex-shrink: 0;
            animation: blink 2.4s ease-in-out infinite;
        }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.25} }

        /* ── BUTTONS ── */
        .btn-cv {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 8px 16px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.68rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase;
            color: var(--warn); text-decoration: none;
            border: 1px solid rgba(202,138,4,.35); border-radius: 4px;
            background: transparent;
            transition: border-color .2s, background .2s;
            white-space: nowrap;
        }
        .btn-cv:hover { border-color: rgba(202,138,4,.6); background: rgba(202,138,4,.06); }

        /* ── MAIN ── */
        main { padding-top: 60px; min-height: 100vh; }

        /* ── MOBILE NAV ── */
        .p-mobile-nav {
            position: fixed; bottom: 0; left: 0; right: 0; z-index: 100;
            background: rgba(9,9,11,.97);
            border-top: 1px solid var(--panel);
            backdrop-filter: blur(12px);
            display: none;
            padding: 6px 0 env(safe-area-inset-bottom, 6px);
        }

        .p-mobile-item {
            flex: 1; display: flex; flex-direction: column; align-items: center; gap: 3px;
            padding: 6px 4px; text-decoration: none;
            color: #3f3f46;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.52rem; letter-spacing: 0.05em; text-transform: uppercase;
            transition: color .15s;
        }
        .p-mobile-item:hover, .p-mobile-item.active { color: var(--accent-l); }

        /* ── RESPONSIVE ── */
        @media (max-width: 767px) {
            .p-mobile-nav { display: flex !important; }
            .p-nav-links { display: none !important; }
            .p-status { display: none !important; }
            main { padding-bottom: 68px; }
        }
        @media (min-width: 768px) {
            .p-mobile-nav { display: none !important; }
        }

        /* ── REVEAL ── */
        .reveal {
            opacity: 0; transform: translateY(16px);
            transition: opacity .6s cubic-bezier(.16,1,.3,1), transform .6s cubic-bezier(.16,1,.3,1);
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }
    </style>

    @yield('styles')
</head>

<body>

    {{-- NAV --}}
    <header>
        <nav id="p-nav" class="p-nav">
            <div class="p-nav-inner">

                <a href="{{ route('portfolio.home') }}" class="p-logo">
                    <span class="p-logo-dot"></span>
                    <span>rnm.sys</span>
                </a>

                <div class="p-nav-links">
                    <a href="{{ Request::routeIs('portfolio.home') ? '#cockpit' : route('portfolio.home').'#cockpit' }}"
                       class="p-nav-link {{ Request::routeIs('portfolio.home') ? 'active' : '' }}">Home</a>
                    <a href="{{ Request::routeIs('portfolio.home') ? '#honors' : route('portfolio.home').'#honors' }}"
                       class="p-nav-link">Honors</a>
                    <a href="{{ Request::routeIs('portfolio.home') ? '#flagship' : route('portfolio.home').'#flagship' }}"
                       class="p-nav-link">Flagship</a>
                    <a href="{{ Request::routeIs('portfolio.home') ? '#experience' : route('portfolio.home').'#experience' }}"
                       class="p-nav-link">Experience</a>
                    <a href="{{ Request::routeIs('portfolio.home') ? '#projects' : route('portfolio.home').'#projects' }}"
                       class="p-nav-link">Projects</a>
                    <a href="{{ Request::routeIs('portfolio.home') ? '#toolkit' : route('portfolio.home').'#toolkit' }}"
                       class="p-nav-link">Toolkit</a>
                    <a href="{{ route('portfolio.guestbook') }}"
                       class="p-nav-link {{ Request::routeIs('portfolio.guestbook') ? 'active' : '' }}">Connect</a>
                </div>

                <div class="p-nav-right">
                    <div class="p-status">
                        <span class="status-dot"></span>
                        <span>Available</span>
                    </div>
                    <a href="{{ asset('files/CV .pdf') }}" download class="btn-cv">
                        <i data-lucide="file-down" style="width:13px;height:13px;flex-shrink:0;"></i>
                        <span>CV.pdf</span>
                    </a>
                </div>

            </div>
        </nav>
    </header>

    <main>@yield('content')</main>

    @hasSection('footer')
        @yield('footer')
    @else
        @include('portfolio.components.footer')
    @endif

    {{-- MOBILE NAV --}}
    <nav class="p-mobile-nav" aria-label="Mobile navigation">
        <a href="{{ Request::routeIs('portfolio.home') ? '#cockpit' : route('portfolio.home') }}"
           class="p-mobile-item {{ Request::routeIs('portfolio.home') ? 'active' : '' }}">
            <i data-lucide="home" style="width:19px;height:19px;"></i>
            <span>Home</span>
        </a>
        <a href="{{ Request::routeIs('portfolio.home') ? '#honors' : route('portfolio.home').'#honors' }}" class="p-mobile-item">
            <i data-lucide="trophy" style="width:19px;height:19px;"></i>
            <span>Honors</span>
        </a>
        <a href="{{ Request::routeIs('portfolio.home') ? '#flagship' : route('portfolio.home').'#flagship' }}" class="p-mobile-item">
            <i data-lucide="shield-check" style="width:19px;height:19px;"></i>
            <span>Flagship</span>
        </a>
        <a href="{{ Request::routeIs('portfolio.home') ? '#projects' : route('portfolio.home').'#projects' }}" class="p-mobile-item">
            <i data-lucide="code-2" style="width:19px;height:19px;"></i>
            <span>Projects</span>
        </a>
        <a href="{{ route('portfolio.guestbook') }}"
           class="p-mobile-item {{ Request::routeIs('portfolio.guestbook') ? 'active' : '' }}">
            <i data-lucide="send" style="width:19px;height:19px;"></i>
            <span>Connect</span>
        </a>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lucide icons
            if (typeof lucide !== 'undefined') lucide.createIcons();

            // Nav scroll effect
            const nav = document.getElementById('p-nav');
            const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 10);
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();

            // Scroll reveal
            const reveals = document.querySelectorAll('.reveal');
            if (reveals.length > 0) {
                const obs = new IntersectionObserver((entries) => {
                    entries.forEach(e => {
                        if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
                    });
                }, { threshold: 0.06, rootMargin: '0px 0px -24px 0px' });
                reveals.forEach(el => obs.observe(el));
            }

            // SweetAlert2 toasts
            const Toast = Swal.mixin({
                toast: true, position: 'top-end',
                showConfirmButton: false, timer: 4000, timerProgressBar: true,
                background: '#0f0f12', color: '#fafafa',
                customClass: { popup: 'font-mono text-xs' },
                didOpen: (t) => {
                    t.addEventListener('mouseenter', Swal.stopTimer);
                    t.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
            @if(session('success'))
                Toast.fire({ icon: 'success', title: "{!! addslashes(session('success')) !!}" });
            @endif
            @if(session('success_guestbook'))
                Toast.fire({ icon: 'success', title: "{!! addslashes(session('success_guestbook')) !!}" });
            @endif
            @if($errors->any())
                Toast.fire({ icon: 'error', title: "{!! addslashes($errors->first()) !!}" });
            @endif
        });
    </script>

    @yield('scripts')
</body>
</html>
