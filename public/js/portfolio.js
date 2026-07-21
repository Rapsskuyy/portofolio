// ===================================
//   RAFFA PORTFOLIO - JavaScript
// ===================================

document.addEventListener('DOMContentLoaded', function () {

    // ===== NAVIGATION DOTS =====
    const navDots = document.querySelectorAll('.nav-dot');
    const sections = document.querySelectorAll('section[id]');

    navDots.forEach(dot => {
        dot.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    });

    function updateActiveNav() {
        const scrollY = window.pageYOffset;
        sections.forEach(section => {
            const top = section.offsetTop - 120;
            const id = section.getAttribute('id');
            if (scrollY >= top && scrollY < top + section.clientHeight) {
                navDots.forEach(d => {
                    d.classList.remove('active');
                    if (d.getAttribute('href') === `#${id}`) d.classList.add('active');
                });
            }
        });
    }
    window.addEventListener('scroll', updateActiveNav);

    // ===== ROLE ROTATOR =====
    const roles = ['Web Developer', 'Backend Enthusiast', 'Problem Solver', 'Team Player', 'MC & Organizer'];
    const roleEl = document.getElementById('roleRotator');
    if (roleEl) {
        let i = 0;
        setInterval(() => {
            roleEl.style.opacity = '0';
            setTimeout(() => { i = (i + 1) % roles.length; roleEl.textContent = roles[i]; roleEl.style.opacity = '1'; }, 300);
        }, 3000);
    }

    // ===== CIRCULAR SKILL PROGRESS =====
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const circle = entry.target;
                const percent = circle.getAttribute('data-percent');
                const progressCircle = circle.querySelector('.progress-circle');
                if (progressCircle) {
                    const circumference = 2 * Math.PI * 60;
                    setTimeout(() => { progressCircle.style.strokeDashoffset = circumference - (percent / 100) * circumference; }, 100);
                }
                progressObserver.unobserve(circle);
            }
        });
    }, { threshold: 0.5 });
    document.querySelectorAll('.circle-progress').forEach(c => progressObserver.observe(c));

    // ===== TESTIMONIAL SLIDER =====
    const track = document.querySelector('.testimonials-track');
    const prev = document.querySelector('.prev-btn');
    const next = document.querySelector('.next-btn');
    if (track && prev && next) {
        prev.addEventListener('click', () => track.scrollBy({ left: -530, behavior: 'smooth' }));
        next.addEventListener('click', () => track.scrollBy({ left: 530, behavior: 'smooth' }));
    }

    // ===== SCROLL ANIMATIONS =====
    const animObs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.style.opacity = '1'; e.target.style.transform = 'translate(0,0) scale(1)'; }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    const fadeItems = [
        { sel: '.education-card-modern', init: 'opacity:0;transform:translateX(-30px)', delay: 0.1 },
        { sel: '.masonry-item',          init: 'opacity:0;transform:scale(0.9)',        delay: 0.05 },
        { sel: '.project-card-new',      init: 'opacity:0;transform:translateY(30px)',  delay: 0.08 },
        { sel: '.timeline-item-h',       init: 'opacity:0;transform:translateY(30px)',  delay: 0.1 },
        { sel: '.blog-card',             init: 'opacity:0;transform:translateY(30px)',  delay: 0.08 },
        { sel: '.api-endpoint-item',     init: 'opacity:0;transform:translateX(-20px)', delay: 0.05 },
    ];
    fadeItems.forEach(({ sel, init, delay }) => {
        document.querySelectorAll(sel).forEach((el, idx) => {
            el.style.cssText += init + `;transition:all 0.6s ease ${idx * delay}s`;
            animObs.observe(el);
        });
    });

    // ===== SCROLL INDICATOR =====
    const scrollInd = document.querySelector('.scroll-indicator');
    if (scrollInd) {
        window.addEventListener('scroll', () => {
            scrollInd.style.opacity = window.pageYOffset > 100 ? '0' : '1';
        });
    }

    // ===== MASONRY =====
    function adjustMasonry() {
        const m = document.querySelector('.masonry-grid');
        if (!m) return;
        m.style.columnCount = window.innerWidth <= 768 ? '1' : window.innerWidth <= 1200 ? '2' : '3';
    }
    window.addEventListener('resize', adjustMasonry);
    adjustMasonry();

    // ===== FORM ENHANCEMENTS =====
    document.querySelectorAll('.modern-form').forEach(form => {
        form.querySelectorAll('input, textarea, select').forEach(input => {
            input.addEventListener('focus',  () => input.parentElement.style.transform = 'translateY(-2px)');
            input.addEventListener('blur',   () => input.parentElement.style.transform = 'translateY(0)');
            if (input.tagName === 'TEXTAREA' && input.hasAttribute('maxlength')) {
                const max = input.getAttribute('maxlength');
                const ctr = document.createElement('div');
                ctr.style.cssText = 'text-align:right;font-size:12px;color:var(--gray);margin-top:5px';
                ctr.textContent = `0/${max}`;
                input.parentElement.appendChild(ctr);
                input.addEventListener('input', () => {
                    ctr.textContent = `${input.value.length}/${max}`;
                    ctr.style.color = input.value.length > max * 0.9 ? '#fbbf24' : 'var(--gray)';
                });
            }
        });
        form.addEventListener('submit', function () {
            const btn = this.querySelector('.btn-submit');
            if (btn) { btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...'; btn.disabled = true; }
        });
    });

    // ===== AUTO-OPEN MODAL IF SUCCESS =====
    if (document.querySelector('.modal-container .alert-success')) {
        openGuestbookModal();
        setTimeout(() => {
            const a = document.querySelector('.modal-container .alert-success');
            if (a) { a.style.opacity = '0'; setTimeout(() => a.remove(), 300); }
        }, 5000);
    }

    // ===== INIT THEME =====
    initTheme();

    // ===== GITHUB STATS =====
    fetchGitHubStats();

    // ===== PARALLAX =====
    window.addEventListener('scroll', () => {
        const heroRight = document.querySelector('.hero-right');
        const scrolled = window.pageYOffset;
        if (heroRight && scrolled < window.innerHeight) {
            heroRight.style.transform = `translateY(${scrolled * 0.3}px)`;
        }
    });

    // ===== CLOSE MODALS ON OVERLAY CLICK =====
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('project-detail-overlay')) {
            e.target.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        if (e.target.classList.contains('blog-modal-overlay')) {
            e.target.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        const gbModal = document.getElementById('guestbookModal');
        if (e.target === gbModal) closeGuestbookModal();
    });

    // ===== ESC KEY =====
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeGuestbookModal();
            document.querySelectorAll('.project-detail-overlay.active, .blog-modal-overlay.active').forEach(m => {
                m.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        }
    });

    console.log('🚀 Raffa Portfolio v2.0 Loaded!');
});

// ============================================================
//   GUESTBOOK MODAL
// ============================================================
function openGuestbookModal() {
    const modal = document.getElementById('guestbookModal');
    if (modal) { modal.classList.add('active'); document.body.style.overflow = 'hidden'; }
}
function closeGuestbookModal() {
    const modal = document.getElementById('guestbookModal');
    if (modal) { modal.classList.remove('active'); document.body.style.overflow = 'auto'; }
}

// ============================================================
//   PROJECT DETAIL MODAL (New - per-ID)
// ============================================================
function openProjectDetail(id) {
    const modal = document.getElementById('projectDetailModal' + id);
    if (modal) { modal.classList.add('active'); document.body.style.overflow = 'hidden'; }
}
function closeProjectDetail(id) {
    const modal = document.getElementById('projectDetailModal' + id);
    if (modal) { modal.classList.remove('active'); document.body.style.overflow = 'auto'; }
}

function switchTab(projectId, tabName) {
    // Hide all tab contents for this project
    document.querySelectorAll(`#projectDetailModal${projectId} .detail-tab-content`).forEach(c => c.classList.remove('active'));
    document.querySelectorAll(`#projectDetailModal${projectId} .detail-tab`).forEach(t => t.classList.remove('active'));

    // Show selected tab
    const content = document.getElementById(`tab-${projectId}-${tabName}`);
    if (content) content.classList.add('active');

    // Activate button
    event.target.classList.add('active');
}

// ============================================================
//   BLOG MODAL (New - per-ID)
// ============================================================
function openBlogModal(id) {
    const modal = document.getElementById('blogModal' + id);
    if (modal) { modal.classList.add('active'); document.body.style.overflow = 'hidden'; }
}
function closeBlogModal(id) {
    const modal = document.getElementById('blogModal' + id);
    if (modal) { modal.classList.remove('active'); document.body.style.overflow = 'auto'; }
}

// ============================================================
//   API PLAYGROUND (New clean version)
// ============================================================
function selectEndpoint(el) {
    // Remove active from all
    document.querySelectorAll('.api-endpoint-item').forEach(e => e.classList.remove('active'));
    el.classList.add('active');

    const endpoint = el.getAttribute('data-endpoint');
    const method   = el.getAttribute('data-method');

    document.getElementById('currentEndpoint').textContent = endpoint;
    document.getElementById('currentMethod').textContent   = method;
    document.getElementById('currentMethod').className = 'api-method-tag method-' + method.toLowerCase();
    document.getElementById('sendBtn').disabled = false;
}

function sendApiRequest() {
    const endpoint = document.getElementById('currentEndpoint').textContent;
    if (!endpoint || endpoint === 'Pilih endpoint di kiri') return;

    const responseBody = document.getElementById('apiResponseBody');
    const statusEl     = document.getElementById('apiStatus');
    const timeEl       = document.getElementById('apiTime');
    const btn          = document.getElementById('sendBtn');

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
    responseBody.innerHTML = '<code class="api-code">// Sending request...</code>';

    const start = performance.now();
    const url   = window.location.origin + endpoint;

    fetch(url)
        .then(res => {
            const ms = Math.round(performance.now() - start);
            timeEl.textContent = ms + 'ms';
            statusEl.textContent = res.status + ' ' + res.statusText;
            statusEl.className = 'api-status ' + (res.ok ? 'status-ok' : 'status-err');
            return res.json();
        })
        .then(data => {
            const json = JSON.stringify(data, null, 2);
            responseBody.innerHTML = `<code class="api-code">${syntaxHighlight(json)}</code>`;
        })
        .catch(err => {
            responseBody.innerHTML = `<code class="api-code api-error">// Error: ${err.message}</code>`;
            statusEl.textContent = 'ERROR';
            statusEl.className = 'api-status status-err';
            timeEl.textContent = '–';
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Send Request';
        });
}

function syntaxHighlight(json) {
    return json
        .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
        .replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, match => {
            let cls = 'json-number';
            if (/^"/.test(match)) cls = /:$/.test(match) ? 'json-key' : 'json-string';
            else if (/true|false/.test(match)) cls = 'json-bool';
            else if (/null/.test(match)) cls = 'json-null';
            return `<span class="${cls}">${match}</span>`;
        });
}

// ============================================================
//   THEME TOGGLE
// ============================================================
function initTheme() {
    const saved = localStorage.getItem('portfolio-theme') || 'dark';
    applyTheme(saved);
}

function toggleTheme() {
    const current = document.body.getAttribute('data-theme') || 'dark';
    const next = current === 'dark' ? 'light' : 'dark';
    applyTheme(next);
    localStorage.setItem('portfolio-theme', next);
}

function applyTheme(theme) {
    document.body.setAttribute('data-theme', theme);
    const icon = document.getElementById('themeIcon');
    if (icon) {
        icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
    }
}

// ============================================================
//   GITHUB STATS
// ============================================================
function fetchGitHubStats() {
    const el = document.getElementById('github-public-repos');
    if (!el) return;
    fetch('https://api.github.com/users/Rapsskuyy')
        .then(r => r.ok ? r.json() : null)
        .then(data => { if (data) el.textContent = data.public_repos; })
        .catch(() => { el.textContent = '10+'; });
}
