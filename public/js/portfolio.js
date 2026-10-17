document.addEventListener('DOMContentLoaded', () => {
    const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    const prefersReducedMotion = () => motionQuery.matches;
    const navLinks = document.querySelectorAll('.nav-dot, .mobile-nav-link');
    const sections = document.querySelectorAll('section[id], footer[id]');
    const sidebarNav = document.querySelector('.sidebar-nav');

    initPortfolioSplash(prefersReducedMotion);
    initSidebarRail(sidebarNav);
    initHeroProfileRotation(prefersReducedMotion);

    navLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            const target = document.querySelector(link.getAttribute('href'));
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: prefersReducedMotion() ? 'auto' : 'smooth' });
            sidebarNav?.classList.remove('is-expanded');
        });
    });

    function updateActiveNav() {
        const scrollY = window.pageYOffset;
        let activeId = sections[0]?.id;
        if (window.innerHeight + scrollY >= document.documentElement.scrollHeight - 2) {
            activeId = sections[sections.length - 1]?.id;
        } else {
            sections.forEach((section) => {
                if (scrollY >= section.offsetTop - 120) activeId = section.id;
            });
        }
        navLinks.forEach((link) => {
            const isActive = link.getAttribute('href') === `#${activeId}`;
            link.classList.toggle('active', isActive);
            if (isActive) link.setAttribute('aria-current', 'location');
            else link.removeAttribute('aria-current');
        });
    }

    let scrollFrame;
    const handleScroll = () => {
        if (scrollFrame) return;
        scrollFrame = window.requestAnimationFrame(() => {
            updateActiveNav();

            const scrollIndicator = document.querySelector('.scroll-indicator');
            if (scrollIndicator) scrollIndicator.style.opacity = window.pageYOffset > 100 ? '0' : '1';

            const heroRight = document.querySelector('.hero-right');
            if (heroRight && !prefersReducedMotion() && window.innerWidth >= 1200 && window.pageYOffset < window.innerHeight) {
                heroRight.style.transform = `translateY(${window.pageYOffset * 0.3}px)`;
            } else if (heroRight) {
                heroRight.style.removeProperty('transform');
            }

            scrollFrame = undefined;
        });
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    updateActiveNav();

    const roles = ['Backend Engineer', 'Web Developer', 'Problem Solver', 'Team Player', 'Student Leader'];
    const roleEl = document.getElementById('roleRotator');
    if (roleEl && !prefersReducedMotion()) {
        let index = roles.indexOf(roleEl.textContent.trim());
        if (index === -1) index = 0;
        window.setInterval(() => {
            roleEl.classList.add('is-swapping');
            window.setTimeout(() => {
                index = (index + 1) % roles.length;
                roleEl.textContent = roles[index];
                roleEl.classList.remove('is-swapping');
            }, 220);
        }, 3400);
    }

    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const bar = entry.target;
            const percent = Math.min(100, Math.max(0, Number(bar.getAttribute('data-percent')) || 0));
            bar.style.width = prefersReducedMotion() ? `${percent}%` : '0%';
            if (!prefersReducedMotion()) {
                window.requestAnimationFrame(() => { bar.style.width = `${percent}%`; });
            }
            progressObserver.unobserve(bar);
        });
    }, { threshold: 0.3 });
    document.querySelectorAll('.skill-bar-fill').forEach((bar) => {
        bar.style.width = '0%';
        progressObserver.observe(bar);
    });

    const track = document.querySelector('.testimonials-track');
    document.querySelector('.prev-btn')?.addEventListener('click', () => track?.scrollBy({ left: -530, behavior: prefersReducedMotion() ? 'auto' : 'smooth' }));
    document.querySelector('.next-btn')?.addEventListener('click', () => track?.scrollBy({ left: 530, behavior: prefersReducedMotion() ? 'auto' : 'smooth' }));

    const revealSections = document.querySelectorAll('[data-section-reveal]');
    if (!prefersReducedMotion() && 'IntersectionObserver' in window) {
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                const section = entry.target;
                if (entry.isIntersecting) {
                    section.classList.add('is-visible');
                    section.classList.remove('is-exiting');
                } else if (section.classList.contains('is-visible')) {
                    section.classList.add('is-exiting');
                }
            });
        }, { threshold: [0.05, 0.3], rootMargin: '0px 0px -32px 0px' });

        revealSections.forEach((section) => {
            section.classList.add('section-motion-pending');
            animationObserver.observe(section);
        });
    }

    function adjustMasonry() {
        const grid = document.querySelector('.masonry-grid');
        if (grid) grid.style.columnCount = window.innerWidth <= 768 ? '1' : window.innerWidth <= 1200 ? '2' : '3';
    }
    window.addEventListener('resize', adjustMasonry, { passive: true });
    adjustMasonry();
    initTheme();
    initExpandableSections();

    document.querySelectorAll('[data-project-modal-trigger]').forEach((button) => {
        button.addEventListener('click', () => openProjectDetails(button.closest('.project-card-new'), button));
    });
    document.querySelectorAll('[data-project-detail-trigger]').forEach((button) => {
        button.addEventListener('click', () => openProjectDetail(button.dataset.projectDetailTrigger, button));
    });
    document.querySelectorAll('[data-close-modal]').forEach((button) => {
        button.addEventListener('click', () => closeModal(button.closest('[role="dialog"]')));
    });
    document.querySelectorAll('.project-detail-overlay, .modal-overlay').forEach((modal) => {
        modal.addEventListener('click', (event) => {
            if (event.target === modal) closeModal(modal);
        });
    });
    document.querySelectorAll('.project-detail-tabs').forEach((tabList) => {
        tabList.addEventListener('click', (event) => {
            const tab = event.target.closest('[role="tab"]');
            if (tab) switchTab(tab.closest('[role="dialog"]'), tab.dataset.projectTab, tab);
        });
        tabList.addEventListener('keydown', (event) => handleTabKeys(event, tabList));
    });
    document.addEventListener('keydown', (event) => {
        const modal = document.querySelector('[role="dialog"].active');
        if (!modal) return;
        if (event.key === 'Escape') {
            event.preventDefault();
            closeModal(modal);
        }
        if (event.key === 'Tab') trapFocus(event, modal);
    });
});

function initHeroProfileRotation(prefersReducedMotion) {
    const profileImage = document.getElementById('heroProfileImage');
    if (!profileImage || prefersReducedMotion()) return;

    let imageSources;
    try {
        imageSources = JSON.parse(profileImage.dataset.heroImages || '[]');
    } catch (_) {
        return;
    }

    const sources = [...new Set(imageSources.filter(Boolean))];
    if (sources.length < 2) return;

    let currentIndex = Math.max(0, sources.indexOf(profileImage.getAttribute('src')));
    let rotationTimer;

    const rotateImage = () => {
        const nextIndex = (currentIndex + 1) % sources.length;
        const nextSource = sources[nextIndex];
        const nextImage = new Image();

        nextImage.addEventListener('load', () => {
            profileImage.classList.add('is-swapping');
            window.setTimeout(() => {
                profileImage.src = nextSource;
                currentIndex = nextIndex;
                profileImage.classList.remove('is-swapping');
            }, 180);
        }, { once: true });
        nextImage.src = nextSource;
    };

    const startRotation = () => {
        if (!rotationTimer) rotationTimer = window.setInterval(rotateImage, 6000);
    };
    const stopRotation = () => {
        if (!rotationTimer) return;
        window.clearInterval(rotationTimer);
        rotationTimer = undefined;
    };

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) stopRotation();
        else startRotation();
    });
    startRotation();
}

function initPortfolioSplash(prefersReducedMotion) {
    const splash = document.getElementById('portfolioSplash');
    const skipButton = document.getElementById('portfolioSplashSkip');
    const splashKey = 'portfolio-splash-complete';

    if (!splash || !skipButton || prefersReducedMotion()) return;

    try {
        if (window.sessionStorage.getItem(splashKey) === 'true') return;
    } catch (_) {
        // Storage can be unavailable in privacy-restricted browser sessions.
    }

    let dismissed = false;
    let dismissTimer;
    const previousFocus = document.activeElement;
    const backgroundElements = [...document.body.children]
        .filter((element) => element !== splash && element.tagName !== 'SCRIPT')
        .map((element) => ({ element, wasInert: element.inert }));

    const dismiss = () => {
        if (dismissed) return;
        dismissed = true;
        window.clearTimeout(dismissTimer);
        splash.classList.remove('is-visible');
        splash.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('splash-active');
        backgroundElements.forEach(({ element, wasInert }) => {
            element.inert = wasInert;
        });

        try {
            window.sessionStorage.setItem(splashKey, 'true');
        } catch (_) {
            // The portfolio stays functional even when session storage is unavailable.
        }

        document.removeEventListener('keydown', handleSplashKeydown);
        window.setTimeout(() => splash.remove(), 300);

        if (previousFocus instanceof HTMLElement && previousFocus !== document.body) {
            previousFocus.focus();
        }
    };

    const handleSplashKeydown = (event) => {
        if (event.key === 'Tab') {
            event.preventDefault();
            skipButton.focus();
            return;
        }

        if (event.key === 'Escape') {
            event.preventDefault();
            dismiss();
        }
    };

    splash.setAttribute('aria-hidden', 'false');
    splash.classList.add('is-visible');
    document.body.classList.add('splash-active');
    backgroundElements.forEach(({ element }) => {
        element.inert = true;
    });
    skipButton.addEventListener('click', dismiss, { once: true });
    document.addEventListener('keydown', handleSplashKeydown);
    window.requestAnimationFrame(() => skipButton.focus());
    dismissTimer = window.setTimeout(dismiss, 1150);
}

function initSidebarRail(sidebarNav) {
    if (!sidebarNav) return;

    sidebarNav.addEventListener('pointerenter', () => sidebarNav.classList.add('is-expanded'));
    sidebarNav.addEventListener('pointerleave', () => {
        if (!sidebarNav.contains(document.activeElement)) sidebarNav.classList.remove('is-expanded');
    });
    sidebarNav.addEventListener('focusin', () => sidebarNav.classList.add('is-expanded'));
    sidebarNav.addEventListener('focusout', () => {
        window.setTimeout(() => {
            if (!sidebarNav.contains(document.activeElement)) sidebarNav.classList.remove('is-expanded');
        });
    });
    sidebarNav.addEventListener('keydown', (event) => {
        if (event.key !== 'Escape') return;
        event.preventDefault();
        sidebarNav.classList.remove('is-expanded');
        if (document.activeElement instanceof HTMLElement) document.activeElement.blur();
    });
}

let lastFocusedElement = null;

function getFocusableElements(container) {
    return [...container.querySelectorAll('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])')]
        .filter((element) => !element.hidden && element.offsetParent !== null);
}

function openModal(modal, trigger) {
    if (!modal) return;
    lastFocusedElement = trigger || document.activeElement;
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    window.requestAnimationFrame(() => modal.querySelector('[data-close-modal]')?.focus());
}

function closeModal(modal) {
    if (!modal) return;
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    if (lastFocusedElement instanceof HTMLElement) lastFocusedElement.focus();
    lastFocusedElement = null;
}

function trapFocus(event, modal) {
    const focusable = getFocusableElements(modal);
    if (!focusable.length) return;
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
    }
}

function handleTabKeys(event, tabList) {
    const tabs = [...tabList.querySelectorAll('[role="tab"]')];
    const currentIndex = tabs.indexOf(document.activeElement);
    if (currentIndex < 0) return;
    let nextIndex = null;
    if (event.key === 'ArrowRight') nextIndex = (currentIndex + 1) % tabs.length;
    if (event.key === 'ArrowLeft') nextIndex = (currentIndex - 1 + tabs.length) % tabs.length;
    if (event.key === 'Home') nextIndex = 0;
    if (event.key === 'End') nextIndex = tabs.length - 1;
    if (nextIndex === null) return;
    event.preventDefault();
    tabs[nextIndex].focus();
    switchTab(tabList.closest('[role="dialog"]'), tabs[nextIndex].dataset.projectTab, tabs[nextIndex]);
}

function switchTab(modal, tabName, selectedTab) {
    if (!modal) return;
    modal.querySelectorAll('.detail-tab').forEach((tab) => {
        const selected = tab === selectedTab;
        tab.classList.toggle('active', selected);
        tab.setAttribute('aria-selected', String(selected));
        tab.tabIndex = selected ? 0 : -1;
    });
    modal.querySelectorAll('.detail-tab-content').forEach((panel) => {
        const selected = panel.id.endsWith(`-${tabName}`);
        panel.classList.toggle('active', selected);
        panel.hidden = !selected;
    });
}

function openProjectDetail(id, trigger) {
    openModal(document.getElementById(`projectDetailModal${id}`), trigger);
}

function initTheme() {
    applyTheme(localStorage.getItem('portfolio-theme') || 'dark');
}

function toggleTheme() {
    const nextTheme = (document.body.getAttribute('data-theme') || 'dark') === 'dark' ? 'light' : 'dark';
    applyTheme(nextTheme);
    localStorage.setItem('portfolio-theme', nextTheme);
}

function applyTheme(theme) {
    document.body.setAttribute('data-theme', theme);
    const icon = document.getElementById('themeIcon');
    if (icon) icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
}

function openProjectDetails(card, trigger) {
    if (!card) return;
    const getData = (name) => card.getAttribute(`data-${name}`) || '';
    const setText = (id, value) => {
        const element = document.getElementById(id);
        if (element) element.textContent = value;
    };
    setText('modal-proj-title', getData('title'));
    setText('modal-proj-desc', getData('desc'));

    const techContainer = document.getElementById('modal-proj-tech');
    if (techContainer) {
        techContainer.replaceChildren();
        getData('tech').split(',').filter(Boolean).forEach((technology) => {
            const badge = document.createElement('span');
            badge.className = 'tech-badge me-2 mb-2';
            badge.textContent = technology.trim();
            techContainer.appendChild(badge);
        });
    }
    [['architecture', 'sec-architecture', 'modal-proj-arch'], ['schema', 'sec-schema', 'modal-proj-schema'], ['snippet', 'sec-snippet', 'modal-proj-snippet']]
        .forEach(([dataName, sectionId, contentId]) => {
            const value = getData(dataName);
            document.getElementById(sectionId)?.classList.toggle('d-none', !value.trim());
            setText(contentId, value);
        });

    const github = getData('github');
    document.getElementById('sec-github-link')?.classList.toggle('d-none', !github.trim());
    const githubButton = document.getElementById('modal-proj-github');
    if (githubButton) githubButton.href = github || '#';
    openModal(document.getElementById('projectDetailModal'), trigger);
}

function initExpandableSections() {
    const sections = [
        {
            sectionId: 'gallery',
            gridSelector: '.masonry-grid',
            itemSelector: '.masonry-item',
            controlsId: 'galleryExpandControls',
            buttonId: 'galleryExpandBtn',
            badgeId: 'galleryExpandBadge',
            desktopLimit: 9,
            tabletLimit: 2,
            mobileLimit: 2,
            itemLabel: 'Foto'
        },
        {
            sectionId: 'projects',
            gridSelector: '.projects-grid',
            itemSelector: '.project-card-new',
            controlsId: 'projectsExpandControls',
            buttonId: 'projectsExpandBtn',
            badgeId: 'projectsExpandBadge',
            desktopLimit: 3,
            tabletLimit: 2,
            mobileLimit: 2,
            itemLabel: 'Proyek'
        }
    ];

    sections.forEach((config) => {
        const sectionEl = document.getElementById(config.sectionId);
        if (!sectionEl) return;

        const grid = sectionEl.querySelector(config.gridSelector);
        const controls = document.getElementById(config.controlsId);
        const button = document.getElementById(config.buttonId);
        const badge = document.getElementById(config.badgeId);
        const textSpan = button ? button.querySelector('.btn-expand-text') : null;

        if (!grid || !controls || !button) return;

        const items = Array.from(grid.querySelectorAll(config.itemSelector));
        if (items.length === 0) return;

        let isExpanded = false;

        function getActiveLimit() {
            const width = window.innerWidth;
            if (width >= 1200) {
                return config.desktopLimit;
            } else if (width > 768) {
                return config.tabletLimit;
            } else {
                return config.mobileLimit;
            }
        }

        function applyVisibility(animate = false) {
            const limit = getActiveLimit();
            const total = items.length;
            const hiddenCount = Math.max(0, total - limit);

            if (total <= limit) {
                controls.classList.add('d-none');
                items.forEach((item) => {
                    item.classList.remove('expand-item-collapsed', 'expand-item-animating');
                    item.style.opacity = '1';
                    item.style.transform = 'none';
                });
                return;
            }

            controls.classList.remove('d-none');

            if (isExpanded) {
                button.setAttribute('aria-expanded', 'true');
                if (textSpan) textSpan.textContent = 'Tampilkan Lebih Sedikit';
                if (badge) {
                    badge.textContent = '';
                    badge.classList.add('d-none');
                }

                items.forEach((item) => {
                    const wasHidden = item.classList.contains('expand-item-collapsed');
                    item.classList.remove('expand-item-collapsed');
                    if (wasHidden && animate) {
                        item.classList.add('expand-item-animating');
                        window.setTimeout(() => {
                            item.classList.remove('expand-item-animating');
                        }, 500);
                    }
                    item.style.opacity = '1';
                    item.style.transform = 'none';
                });
            } else {
                button.setAttribute('aria-expanded', 'false');
                if (textSpan) textSpan.textContent = 'Lihat Selengkapnya';
                if (badge) {
                    badge.textContent = `+${hiddenCount} ${config.itemLabel}`;
                    badge.classList.remove('d-none');
                }

                items.forEach((item, index) => {
                    if (index >= limit) {
                        item.classList.add('expand-item-collapsed');
                        item.classList.remove('expand-item-animating');
                    } else {
                        item.classList.remove('expand-item-collapsed', 'expand-item-animating');
                        item.style.opacity = '1';
                        item.style.transform = 'none';
                    }
                });
            }
        }

        button.addEventListener('click', () => {
            isExpanded = !isExpanded;
            applyVisibility(true);

            if (!isExpanded) {
                const sectionRect = sectionEl.getBoundingClientRect();
                if (sectionRect.top < -50) {
                    sectionEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                applyVisibility(false);
            }, 150);
        }, { passive: true });

        applyVisibility(false);
    });
}

