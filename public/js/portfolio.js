document.addEventListener('DOMContentLoaded', () => {
    const motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    const prefersReducedMotion = () => motionQuery.matches;
    const navLinks = document.querySelectorAll('.nav-dot, .mobile-nav-link');
    const sections = document.querySelectorAll('section[id], footer[id]');

    navLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            const target = document.querySelector(link.getAttribute('href'));
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: prefersReducedMotion() ? 'auto' : 'smooth' });
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

    window.addEventListener('scroll', updateActiveNav, { passive: true });
    updateActiveNav();

    const roles = ['Backend Engineer', 'Web Developer', 'Problem Solver', 'Team Player', 'Student Leader'];
    const roleEl = document.getElementById('roleRotator');
    if (roleEl && !prefersReducedMotion()) {
        let index = 0;
        window.setInterval(() => {
            roleEl.style.opacity = '0';
            window.setTimeout(() => {
                index = (index + 1) % roles.length;
                roleEl.textContent = roles[index];
                roleEl.style.opacity = '1';
            }, 300);
        }, 3000);
    }

    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const circle = entry.target;
            const progressCircle = circle.querySelector('.progress-circle');
            if (progressCircle) {
                const circumference = 2 * Math.PI * 60;
                const percent = Number(circle.getAttribute('data-percent')) || 0;
                progressCircle.style.strokeDashoffset = circumference - (percent / 100) * circumference;
            }
            progressObserver.unobserve(circle);
        });
    }, { threshold: 0.5 });
    document.querySelectorAll('.circle-progress').forEach((circle) => progressObserver.observe(circle));

    const track = document.querySelector('.testimonials-track');
    document.querySelector('.prev-btn')?.addEventListener('click', () => track?.scrollBy({ left: -530, behavior: prefersReducedMotion() ? 'auto' : 'smooth' }));
    document.querySelector('.next-btn')?.addEventListener('click', () => track?.scrollBy({ left: 530, behavior: prefersReducedMotion() ? 'auto' : 'smooth' }));

    const fadeItems = [
        ['.section-title-modern', 'translateY(16px)', 0],
        ['.about-intro-card', 'translateY(16px)', 0.05],
        ['.info-card', 'translateY(16px)', 0.08],
        ['.education-card-modern', 'translateY(16px)', 0.05],
        ['.skill-circle-item', 'translateY(14px)', 0.03],
        ['.masonry-item', 'translateY(16px)', 0.03],
        ['.project-card-new', 'translateY(16px)', 0.04],
        ['.timeline-item-h', 'translateY(16px)', 0.05],
    ];
    if (prefersReducedMotion()) {
        document.querySelectorAll(fadeItems.map(([selector]) => selector).join(',')).forEach((element) => {
            element.style.opacity = '1';
            element.style.transform = 'none';
        });
    } else {
        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'none';
                animationObserver.unobserve(entry.target);
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        fadeItems.forEach(([selector, transform, delay]) => {
            document.querySelectorAll(selector).forEach((element, index) => {
                const itemDelay = Math.min(index * delay, 0.2);
                element.style.opacity = '0';
                element.style.transform = transform;
                element.style.transition = `opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1) ${itemDelay}s, transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) ${itemDelay}s`;
                animationObserver.observe(element);
            });
        });
    }

    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        window.addEventListener('scroll', () => {
            scrollIndicator.style.opacity = window.pageYOffset > 100 ? '0' : '1';
        }, { passive: true });
    }

    function adjustMasonry() {
        const grid = document.querySelector('.masonry-grid');
        if (grid) grid.style.columnCount = window.innerWidth <= 768 ? '1' : window.innerWidth <= 1200 ? '2' : '3';
    }
    window.addEventListener('resize', adjustMasonry, { passive: true });
    adjustMasonry();
    initTheme();
    initExpandableSections();

    if (!prefersReducedMotion()) {
        window.addEventListener('scroll', () => {
            const heroRight = document.querySelector('.hero-right');
            if (heroRight && window.pageYOffset < window.innerHeight) heroRight.style.transform = `translateY(${window.pageYOffset * 0.3}px)`;
        }, { passive: true });
    }

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
            desktopLimit: 9,
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

