{{-- Hero — Premium Technical Editorial --}}
<style>
    /* ── HERO ── */
    .hero-section {
        min-height: calc(100vh - 60px);
        display: flex; align-items: center;
        padding: 80px 0 64px;
        position: relative;
    }

    .hero-wrap {
        max-width: 1280px; margin: 0 auto; padding: 0 28px; width: 100%;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 56px;
        align-items: center;
    }

    @media (min-width: 900px) {
        .hero-grid { grid-template-columns: 1.15fr 0.85fr; }
    }

    /* name */
    .hero-name {
        font-family: 'Inter', sans-serif;
        font-size: clamp(3rem, 7.5vw, 6.2rem);
        font-weight: 800;
        line-height: 0.94;
        letter-spacing: -0.04em;
        color: #fafafa;
        margin: 0;
    }
    .hero-name .accent { color: #4f46e5; }

    /* eyebrow */
    .hero-eyebrow {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.68rem; letter-spacing: 0.14em; text-transform: uppercase;
        color: #3f3f46;
        display: flex; align-items: center; gap: 12px;
    }
    .hero-eyebrow::before {
        content: ''; display: block; width: 26px; height: 1px; background: #4f46e5; flex-shrink: 0;
    }

    /* tagline */
    .hero-tagline {
        font-family: 'JetBrains Mono', monospace;
        font-size: clamp(0.75rem, 1.3vw, 0.88rem);
        color: #3f3f46; letter-spacing: 0.01em; line-height: 1.75;
        border-left: 2px solid #27272a;
        padding-left: 16px;
        margin: 0;
    }

    /* CTA row */
    .hero-ctas { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; }

    .btn-p {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 11px 22px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.73rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase;
        text-decoration: none; border-radius: 4px; white-space: nowrap;
        transition: background .2s, box-shadow .2s, border-color .2s, color .2s;
        cursor: pointer;
    }
    .btn-p.primary {
        background: #4f46e5; color: #fafafa;
        border: 1px solid #6366f1;
    }
    .btn-p.primary:hover { background: #4338ca; box-shadow: 0 0 0 3px rgba(79,70,229,.18); }

    .btn-p.ghost {
        background: transparent; color: #71717a;
        border: 1px solid #27272a;
    }
    .btn-p.ghost:hover { border-color: #52525b; color: #fafafa; }

    .btn-p.amber {
        background: transparent; color: #ca8a04;
        border: 1px solid rgba(202,138,4,.3);
    }
    .btn-p.amber:hover { background: rgba(202,138,4,.06); border-color: rgba(202,138,4,.55); }

    /* data table */
    .ach-table { width: 100%; border-collapse: collapse; }
    .ach-table thead tr { border-bottom: 1px solid #18181b; }
    .ach-table thead td {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.6rem; letter-spacing: 0.12em; text-transform: uppercase;
        color: #27272a; padding: 0 10px 10px;
    }
    .ach-table tbody tr { border-bottom: 1px solid #18181b; transition: background .12s; }
    .ach-table tbody tr:last-child { border-bottom: none; }
    .ach-table tbody tr:hover { background: #0f0f12; }
    .ach-table td { padding: 14px 10px; vertical-align: middle; }

    .td-lbl {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase;
        color: #3f3f46; white-space: nowrap; width: 100px;
    }
    .td-val {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.84rem; font-weight: 600; color: #fafafa;
    }
    .td-sub {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.62rem; color: #52525b; letter-spacing: 0.03em; margin-top: 2px;
    }
    .td-right { text-align: right; }

    .badge {
        display: inline-flex; align-items: center; gap: 4px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.58rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase;
        padding: 3px 8px; border-radius: 3px; white-space: nowrap;
    }
    .badge.ok    { background: rgba(34,197,94,.08);  color: #22c55e; border: 1px solid rgba(34,197,94,.2); }
    .badge.warn  { background: rgba(202,138,4,.09);  color: #ca8a04; border: 1px solid rgba(202,138,4,.22); }
    .badge.blue  { background: rgba(79,70,229,.1);   color: #818cf8; border: 1px solid rgba(79,70,229,.25); }
    .badge.muted { background: rgba(39,39,42,.6);    color: #71717a; border: 1px solid #27272a; }

    /* profile */
    .profile-outer {
        position: relative; max-width: 340px; width: 100%; margin: 0 auto;
    }
    .profile-shadow {
        position: absolute; top: 10px; left: 10px; right: -10px; bottom: -10px;
        border: 1px solid #18181b; border-radius: 6px; pointer-events: none;
    }
    .profile-frame {
        position: relative; z-index: 1;
        border: 1px solid #27272a; border-radius: 6px; overflow: hidden;
    }
    .profile-frame img {
        width: 100%; aspect-ratio: 3/4; object-fit: cover; object-position: top;
        display: block; filter: grayscale(10%) contrast(1.04);
    }
    .profile-fade {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(9,9,11,.88) 0%, rgba(9,9,11,.05) 55%, transparent 100%);
        pointer-events: none;
    }
    .profile-corner {
        position: absolute; top: 11px; right: 12px; z-index: 2;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.58rem; letter-spacing: 0.1em; text-transform: uppercase;
        color: #3f3f46;
        display: flex; align-items: center; gap: 5px;
    }
    .profile-meta {
        position: absolute; bottom: 0; left: 0; right: 0; z-index: 2;
        padding: 12px 14px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.58rem; letter-spacing: 0.09em; text-transform: uppercase;
        color: #52525b;
        display: flex; align-items: center; justify-content: space-between;
    }
    .profile-tag {
        position: absolute; bottom: -18px; right: -14px; z-index: 3;
        background: #0f0f12; border: 1px solid #27272a; border-radius: 4px;
        padding: 8px 12px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.6rem; letter-spacing: 0.08em; text-transform: uppercase;
        color: #52525b;
        display: flex; align-items: center; gap: 7px;
        white-space: nowrap;
    }
</style>

<section class="hero-section">
    <div id="cockpit" style="position:absolute;top:0;"></div>

    <div class="hero-wrap">
        <div class="hero-grid reveal">

            {{-- LEFT --}}
            <div style="display:flex;flex-direction:column;gap:30px;">

                <div class="hero-eyebrow">
                    <span class="status-dot"></span>
                    <span>Backend Architect · SMKN 1 Depok · Depok, ID</span>
                </div>

                <h1 class="hero-name">
                    Raffa Nur<br>
                    <span class="accent">Musyaffa</span>
                </h1>

                <p class="hero-tagline">
                    Engineering resilient backend systems &amp; cryptographic architectures.<br>
                    High-concurrency databases · Distributed web · Ballot integrity protocols.
                </p>

                <div class="hero-ctas">
                    <a href="#flagship" class="btn-p primary">
                        <i data-lucide="arrow-right" style="width:14px;height:14px;flex-shrink:0;"></i>
                        <span>Flagship Project</span>
                    </a>
                    <a href="#honors" class="btn-p ghost">
                        <i data-lucide="trophy" style="width:13px;height:13px;flex-shrink:0;"></i>
                        <span>Honors</span>
                    </a>
                    <a href="{{ asset('files/CV .pdf') }}" download class="btn-p amber">
                        <i data-lucide="file-down" style="width:13px;height:13px;flex-shrink:0;"></i>
                        <span>Download CV</span>
                    </a>
                </div>

                {{-- Achievement Data Grid --}}
                <div style="border-top:1px solid #18181b;padding-top:24px;">
                    <table class="ach-table">
                        <thead>
                            <tr>
                                <td class="td-lbl" style="padding-bottom:10px;color:#27272a;">Metric</td>
                                <td style="padding-bottom:10px;font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.12em;text-transform:uppercase;color:#27272a;">Value</td>
                                <td style="padding-bottom:10px;font-family:'JetBrains Mono',monospace;font-size:0.6rem;letter-spacing:0.12em;text-transform:uppercase;color:#27272a;text-align:right;">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-lbl">Hazard Rate</td>
                                <td>
                                    <div class="td-val">0.000%</div>
                                    <div class="td-sub">Double-Vote · OTT + Row Locks</div>
                                </td>
                                <td class="td-right"><span class="badge ok">Verified</span></td>
                            </tr>
                            <tr>
                                <td class="td-lbl">Academic</td>
                                <td>
                                    <div class="td-val">Rank #1 Parallel</div>
                                    <div class="td-sub">PPLG · SMKN 1 Depok</div>
                                </td>
                                <td class="td-right"><span class="badge warn">Active</span></td>
                            </tr>
                            <tr>
                                <td class="td-lbl">Competition</td>
                                <td>
                                    <div class="td-val">Gold Medal</div>
                                    <div class="td-sub">National Olympiad · Informatics &amp; CS</div>
                                </td>
                                <td class="td-right"><span class="badge warn">National</span></td>
                            </tr>
                            <tr>
                                <td class="td-lbl">Governance</td>
                                <td>
                                    <div class="td-val">2-Period Term</div>
                                    <div class="td-sub">MPK Presidium Officer</div>
                                </td>
                                <td class="td-right"><span class="badge blue">Mandate</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            {{-- /LEFT --}}

            {{-- RIGHT: Photo --}}
            <div style="display:flex;justify-content:center;align-items:flex-start;">
                <div class="profile-outer">
                    <div class="profile-shadow"></div>
                    <div class="profile-frame">
                        <img src="{{ asset('images/profile/profilrappa_original_raw.webp') }}"
                             alt="Raffa Nur Musyaffa — Backend Architect"
                             onerror="this.onerror=null;this.src='{{ asset('images/profile/profile.webp') }}';">
                        <div class="profile-fade"></div>
                        <div class="profile-corner">
                            <span class="status-dot" style="width:5px;height:5px;"></span>
                            <span>RNM-2026</span>
                        </div>
                        <div class="profile-meta">
                            <span>PPLG // SMKN 1 DEPOK</span>
                            <span>-6.38° · 106.83°</span>
                        </div>
                    </div>
                    <div class="profile-tag">
                        <i data-lucide="shield-check" style="width:12px;height:12px;color:#4f46e5;flex-shrink:0;"></i>
                        <span>E-Voting · TPS Deployed</span>
                    </div>
                </div>
            </div>
            {{-- /RIGHT --}}

        </div>
    </div>
</section>
