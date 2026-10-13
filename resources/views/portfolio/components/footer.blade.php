{{-- Footer — Premium Technical Editorial --}}
<style>
    /* ── MARQUEE ── */
    @keyframes mq-run { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }

    .mq-wrap {
        overflow: hidden;
        border-top: 1px solid #18181b;
        border-bottom: 1px solid #18181b;
        background: #0a0a0d;
        padding: 10px 0;
        user-select: none;
    }
    .mq-track {
        display: inline-flex; width: max-content;
        animation: mq-run 42s linear infinite;
        will-change: transform;
    }
    .mq-track:hover { animation-play-state: paused; }

    .mq-item {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.63rem; letter-spacing: 0.08em; text-transform: uppercase;
        color: #2d2d30; padding: 0 26px; white-space: nowrap;
        display: flex; align-items: center; gap: 7px;
    }
    .mq-item.hi     { color: #52525b; }
    .mq-item.accent { color: #4f46e5; }
    .mq-item.ok     { color: #166534; }
    .mq-item.warn   { color: #854d0e; }

    .mq-sep {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.5rem; color: #1c1c1f;
        padding: 0 2px; display: flex; align-items: center; flex-shrink: 0;
    }

    /* ── FOOTER ── */
    .ft-root {
        background: #09090b;
        border-top: 1px solid #18181b;
    }
    .ft-body {
        max-width: 1280px; margin: 0 auto; padding: 52px 28px 40px;
    }
    .ft-grid {
        display: grid; grid-template-columns: 1fr; gap: 44px;
    }
    @media (min-width: 768px) {
        .ft-grid { grid-template-columns: 1fr 1fr 1fr; }
    }

    /* contact rows */
    .ft-contact-row {
        display: flex; align-items: center; justify-content: space-between;
        padding: 13px 0; border-bottom: 1px solid #18181b;
        text-decoration: none; gap: 12px;
        transition: background .12s;
    }
    .ft-contact-row:last-child { border-bottom: none; }

    .ft-contact-row .c-lbl {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
        color: #3f3f46; flex-shrink: 0; width: 72px;
    }
    .ft-contact-row .c-val {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.74rem; color: #71717a; flex: 1;
        transition: color .15s; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
    }
    .ft-contact-row:hover .c-val { color: #fafafa; }

    .ft-contact-row .c-arr {
        color: #27272a; flex-shrink: 0;
        transition: color .15s, transform .15s;
    }
    .ft-contact-row:hover .c-arr { color: #4f46e5; transform: translate(2px,-2px); }

    /* cv card */
    .ft-cv-card {
        border: 1px solid #18181b; border-radius: 6px;
        padding: 20px; display: flex; flex-direction: column; gap: 14px;
    }

    .ft-btn-cv {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        padding: 10px 20px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.72rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase;
        color: #ca8a04; text-decoration: none;
        border: 1px solid rgba(202,138,4,.3); border-radius: 4px; background: transparent;
        transition: border-color .2s, background .2s;
        white-space: nowrap;
    }
    .ft-btn-cv:hover { background: rgba(202,138,4,.06); border-color: rgba(202,138,4,.55); }

    .ft-quick-link {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.67rem; color: #3f3f46; text-decoration: none;
        display: flex; align-items: center; gap: 7px;
        transition: color .15s;
    }
    .ft-quick-link:hover { color: #818cf8; }
</style>

<footer class="ft-root" id="command-footer">
    <div id="contact" style="position:relative;"></div>

    {{-- MARQUEE --}}
    <div class="mq-wrap" aria-label="Portfolio highlights">
        <div class="mq-track">
            {{-- Buffer A --}}
            <span class="mq-item ok">Available for Opportunities</span>
            <span class="mq-sep">·</span>
            <span class="mq-item hi">Raffa Nur Musyaffa</span>
            <span class="mq-sep">·</span>
            <span class="mq-item accent">Backend Architect &amp; Systems Engineer</span>
            <span class="mq-sep">·</span>
            <span class="mq-item warn">National Gold Medal — Informatics</span>
            <span class="mq-sep">·</span>
            <span class="mq-item hi">Rank #1 Parallel — PPLG SMKN 1 Depok</span>
            <span class="mq-sep">·</span>
            <span class="mq-item">TOEIC International Certified</span>
            <span class="mq-sep">·</span>
            <span class="mq-item accent">E-Voting Kiosk TPS — Commercial Deployed</span>
            <span class="mq-sep">·</span>
            <span class="mq-item">ACID Row-Locking Concurrency</span>
            <span class="mq-sep">·</span>
            <span class="mq-item warn">Türkiye Bursları 2027 Candidate</span>
            <span class="mq-sep">·</span>
            <span class="mq-item">Latency &lt; 30ms · UTC+7</span>
            <span class="mq-sep">·</span>
            {{-- Buffer B --}}
            <span class="mq-item ok">Available for Opportunities</span>
            <span class="mq-sep">·</span>
            <span class="mq-item hi">Raffa Nur Musyaffa</span>
            <span class="mq-sep">·</span>
            <span class="mq-item accent">Backend Architect &amp; Systems Engineer</span>
            <span class="mq-sep">·</span>
            <span class="mq-item warn">National Gold Medal — Informatics</span>
            <span class="mq-sep">·</span>
            <span class="mq-item hi">Rank #1 Parallel — PPLG SMKN 1 Depok</span>
            <span class="mq-sep">·</span>
            <span class="mq-item">TOEIC International Certified</span>
            <span class="mq-sep">·</span>
            <span class="mq-item accent">E-Voting Kiosk TPS — Commercial Deployed</span>
            <span class="mq-sep">·</span>
            <span class="mq-item">ACID Row-Locking Concurrency</span>
            <span class="mq-sep">·</span>
            <span class="mq-item warn">Türkiye Bursları 2027 Candidate</span>
            <span class="mq-sep">·</span>
            <span class="mq-item">Latency &lt; 30ms · UTC+7</span>
            <span class="mq-sep">·</span>
        </div>
    </div>

    {{-- BODY --}}
    <div class="ft-body">
        <div class="ft-grid">

            {{-- COL 1: Identity --}}
            <div style="display:flex;flex-direction:column;gap:18px;">
                <div style="display:flex;align-items:center;gap:9px;">
                    <span style="width:7px;height:7px;border-radius:50%;background:#4f46e5;display:inline-block;flex-shrink:0;"></span>
                    <span style="font-family:'JetBrains Mono',monospace;font-weight:700;font-size:0.9rem;color:#fafafa;letter-spacing:-0.01em;">rnm.sys</span>
                </div>
                <p style="font-family:'Inter',sans-serif;font-size:0.8rem;color:#52525b;line-height:1.7;max-width:260px;margin:0;">
                    Backend Developer and Systems Architect. Specialized in high-concurrency database integrity and cryptographic protocols.
                </p>
                <div style="display:flex;align-items:center;gap:8px;font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.1em;text-transform:uppercase;color:#3f3f46;">
                    <span class="status-dot"></span>
                    <span>Available · Depok, ID</span>
                </div>
            </div>

            {{-- COL 2: Contact --}}
            <div style="display:flex;flex-direction:column;">
                <div style="font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.14em;text-transform:uppercase;color:#27272a;margin-bottom:18px;">
                    Contact
                </div>
                <a href="https://wa.me/6288214156641" target="_blank" rel="noopener noreferrer" class="ft-contact-row">
                    <span class="c-lbl">WhatsApp</span>
                    <span class="c-val">+62 882-1415-6641</span>
                    <i data-lucide="arrow-up-right" class="c-arr" style="width:14px;height:14px;"></i>
                </a>
                <a href="mailto:raffa.nur.musyaffa@gmail.com" class="ft-contact-row">
                    <span class="c-lbl">Email</span>
                    <span class="c-val">raffa.nur.musyaffa@gmail.com</span>
                    <i data-lucide="arrow-up-right" class="c-arr" style="width:14px;height:14px;"></i>
                </a>
                <a href="https://github.com/Rapsskuyy" target="_blank" rel="noopener noreferrer" class="ft-contact-row">
                    <span class="c-lbl">GitHub</span>
                    <span class="c-val">github.com/Rapsskuyy</span>
                    <i data-lucide="arrow-up-right" class="c-arr" style="width:14px;height:14px;"></i>
                </a>
                <a href="https://www.instagram.com/rrapskuy/" target="_blank" rel="noopener noreferrer" class="ft-contact-row">
                    <span class="c-lbl">Instagram</span>
                    <span class="c-val">@rrapskuy</span>
                    <i data-lucide="arrow-up-right" class="c-arr" style="width:14px;height:14px;"></i>
                </a>
            </div>

            {{-- COL 3: CV --}}
            <div style="display:flex;flex-direction:column;gap:18px;">
                <div style="font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.14em;text-transform:uppercase;color:#27272a;">
                    Documents
                </div>
                <div class="ft-cv-card">
                    <div style="display:flex;flex-direction:column;gap:5px;">
                        <span style="font-family:'JetBrains Mono',monospace;font-size:0.78rem;font-weight:600;color:#fafafa;">Curriculum Vitae</span>
                        <span style="font-family:'Inter',sans-serif;font-size:0.75rem;color:#52525b;line-height:1.55;">Official scholarship &amp; technical dossier — PDF format.</span>
                    </div>
                    <a href="{{ asset('files/CV .pdf') }}" download class="ft-btn-cv">
                        <i data-lucide="download" style="width:13px;height:13px;flex-shrink:0;"></i>
                        <span>Download CV.pdf</span>
                    </a>
                </div>
                <div style="display:flex;flex-direction:column;gap:10px;margin-top:4px;">
                    <a href="{{ route('portfolio.guestbook') }}" class="ft-quick-link">
                        <i data-lucide="message-square" style="width:13px;height:13px;flex-shrink:0;"></i>
                        <span>Leave a message</span>
                    </a>
                    <a href="{{ Request::routeIs('portfolio.home') ? '#flagship' : route('portfolio.home').'#flagship' }}" class="ft-quick-link">
                        <i data-lucide="shield-check" style="width:13px;height:13px;flex-shrink:0;"></i>
                        <span>View flagship project</span>
                    </a>
                </div>
            </div>

        </div>

        {{-- Bottom strip --}}
        <div style="margin-top:44px;padding-top:20px;border-top:1px solid #18181b;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px;">
            <span style="font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.07em;text-transform:uppercase;color:#27272a;">
                &copy; {{ date('Y') }} Raffa Nur Musyaffa
            </span>
            <span style="font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.07em;text-transform:uppercase;color:#1c1c1f;">
                Laravel · Tailwind · Vite
            </span>
        </div>
    </div>
</footer>
